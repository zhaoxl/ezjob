<?php
 /*
 * 74cms 邮件设置
 * ============================================================================
 * 版权所有: 骑士网络，并保留所有权利。
 * 网站地址: http://www.74cms.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
*/
define('IN_QISHI', true);
require_once(dirname(__FILE__).'/../data/config.php');
require_once(dirname(__FILE__).'/include/admin_common.inc.php');
$act = !empty($_GET['act']) ? trim($_GET['act']) : 'email_set';
check_permissions($_SESSION['admin_purview'],"site_mail");
$smarty->assign('pageheader',"邮件设置");
if($act == 'email_set')
{
	get_token();
	$mailconfig=get_cache('mailconfig');
	$mailconfig['smtpservers']=explode('|-_-|',$mailconfig['smtpservers']);
	$mailconfig['smtpusername']=explode('|-_-|',$mailconfig['smtpusername']);
	$mailconfig['smtppassword']=explode('|-_-|',$mailconfig['smtppassword']);
	$mailconfig['smtpfrom']=explode('|-_-|',$mailconfig['smtpfrom']);
	$mailconfig['smtpport']=explode('|-_-|',$mailconfig['smtpport']);
	for ($i=0; $i<count($mailconfig['smtpservers']); $i++)
	{
	$mailconfigli[]=array('smtpservers'=>$mailconfig['smtpservers'][$i],'smtpusername'=>$mailconfig['smtpusername'][$i],'smtppassword'=>$mailconfig['smtppassword'][$i],'smtpfrom'=>$mailconfig['smtpfrom'][$i],'smtpport'=>$mailconfig['smtpport'][$i]);
	}
	$smarty->assign('mailconfig',$mailconfig);
	$smarty->assign('mailconfigli',$mailconfigli);
	$smarty->assign('navlabel','set');
	$smarty->display('mail/admin_mail_set.htm');
}
elseif($act == 'email_set_save')
{
	check_token();
	header("Cache-control: private");
	if (intval($_POST['method'])=="1")
	{
		for ($i=0; $i<count($_POST['smtpservers']); $i++)
		{
			 if (empty($_POST['smtpservers'][$i]) || empty($_POST['smtpusername'][$i]) || empty($_POST['smtppassword'][$i]) || empty($_POST['smtpfrom'][$i]) || empty($_POST['smtpport'][$i]))
			{
			adminmsg('您填写的资料不完整!',1);
			}
		}
		$_POST['smtpservers']=implode('|-_-|',$_POST['smtpservers']);
		$_POST['smtpusername']=implode('|-_-|',$_POST['smtpusername']);
		$_POST['smtppassword']=implode('|-_-|',$_POST['smtppassword']);
		$_POST['smtpfrom']=implode('|-_-|',$_POST['smtpfrom']);
		$_POST['smtpport']=implode('|-_-|',$_POST['smtpport']);
	}
	foreach($_POST as $k => $v){
	!$db->query("UPDATE ".table('mailconfig')." SET value='$v' WHERE name='$k'")?adminmsg('更新站点设置失败', 1):"";
	}
	refresh_cache('mailconfig');
	adminmsg("保存成功！",2);
}
if($act == 'testing')
{
	get_token();
	$smarty->assign('navlabel','testing');
	$smarty->display('mail/admin_mail_testing.htm');
}
elseif($act == 'email_testing')
{
	check_token();
	$mailconfig=get_cache('mailconfig');
	$txt="您好！这是一封检测邮件服务器设置的测试邮件。收到此邮件，意味着您的邮件服务器设置正确！您可以进行其它邮件发送的操作了！";
	$check_smtp=trim($_POST['check_smtp'])?trim($_POST['check_smtp']):adminmsg('收件人地址必须填写', 1);
	if (!preg_match("/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/",$check_smtp))adminmsg('email格式错误！',1);
	if (smtp_mail($check_smtp,"骑士CMS测试邮件",$txt))
	{
	adminmsg('测试邮件发送成功！',2);
	}
	else
	{
	adminmsg('测试邮件发送失败！',1);
	}
}
elseif($act == 'email_set_templates')
{
	get_token();
	$smarty->assign('navlabel','templates');
	$smarty->assign('mailconfig',get_cache('mailconfig'));
	$smarty->display('mail/admin_mail_templates.htm');
}
elseif($act == 'rule')
{
	get_token();
	$smarty->assign('navlabel','rule');
	$smarty->assign('mailconfig',get_cache('mailconfig'));
	$smarty->display('mail/admin_mail_rule.htm');
}
elseif($act == 'email_rule_save')
{
	check_token();
	foreach($_POST as $k => $v)
	{
	!$db->query("UPDATE ".table('mailconfig')." SET value='$v' WHERE name='$k'")?adminmsg('更新站点设置失败', 1):"";
	}
	refresh_cache('mailconfig');
	adminmsg("保存成功！",2);
}
elseif($act == 'mail_templates_edit')
{
	get_token();
	$templates_name=trim($_GET['templates_name']);
	$label=array();
	$label[]=array('{sitename}','网站名称');
	$label[]=array('{sitedomain}','网站域名');
	//生成标签
	if ($templates_name=='set_reg')
	{
	$label[]=array('{username}','用户名');
	$label[]=array('{password}','密码');
	}
	elseif ($templates_name=='set_applyjobs')
	{
	$label[]=array('{personalfullname}','申请人');
	$label[]=array('{jobsname}','申请职位名称');
	}
	elseif ($templates_name=='set_invite')
	{
	$label[]=array('{companyname}','邀请方(公司名称)');
	}
	elseif ($templates_name=='set_order')
	{
	$label[]=array('{paymenttpye}','付款方式');
	$label[]=array('{amount}','金额');
	$label[]=array('{oid}','订单号');
	}
	elseif ($templates_name=='set_editpwd')
	{
	$label[]=array('{newpassword}','新密码');
	}
	elseif ($templates_name=='set_jobsallow' || $templates_name=='set_jobsnotallow')
	{
	$label[]=array('{jobsname}','职位名称');
	}
	//-end
	if ($templates_name)
	{
		$sql = "select * from ".table('mail_templates')." where name='".$templates_name."'";
	$info=$db->getone($sql);
		$sql = "select * from ".table('mail_templates')." where name='".$templates_name."_title'";
	$title=$db->getone($sql);
	}
	$info['thisname']=trim($_GET['thisname']);
	$smarty->assign('info',$info);
	$smarty->assign('title',$title);
	$smarty->assign('label',$label);
	$smarty->assign('navlabel','templates');
	$smarty->display('mail/admin_mail_templates_edit.htm');
}
elseif($act == 'templates_save')
{
	check_token();
	$templates_value=trim($_POST['templates_value']);
	$templates_name=trim($_POST['templates_name']);
	$title=trim($_POST['title']);
	!$db->query("UPDATE ".table('mail_templates')." SET value='".$templates_value."' WHERE name='".$templates_name."'")?adminmsg('设置失败', 1):"";
	!$db->query("UPDATE ".table('mail_templates')." SET value='".$title."' WHERE name='".$templates_name."_title'")?adminmsg('设置失败', 1):"";
	$link[0]['text'] = "返回上一页";
	$link[0]['href'] ="?act=email_set_templates";
	refresh_cache('mail_templates');
	adminmsg("保存成功！",2,$link);
}
?>