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
$act = !empty($_GET['act']) ? trim($_GET['act']) : 'set_sms';
check_permissions($_SESSION['admin_purview'],"set_sms");
$smarty->assign('pageheader',"短信设置");
if($act == 'set_sms')
{
	get_token();
	$smarty->assign('sms',get_cache('sms_config'));
	$smarty->assign('navlabel','set');
	$smarty->display('sms/admin_sms_set.htm');
}
elseif($act == 'set_save')
{
	check_token();
	header("Cache-control: private");
	if (intval($_POST['open'])=="1")
	{
	empty($_POST['sms_name']) ? adminmsg('请填写短信通帐户名',1) :'' ;
	empty($_POST['sms_key']) ? adminmsg('请填写S短信通密钥',1) :'' ;
	}
	foreach($_POST as $k => $v){
	!$db->query("UPDATE ".table('sms_config')." SET value='$v' WHERE name='$k'")?adminmsg('更新站点设置失败', 1):"";
	}
	refresh_cache('sms_config');
	adminmsg("保存成功！",2);
}
if($act == 'testing')
{
	get_token();
	$smarty->assign('navlabel','testing');
	$smarty->display('sms/admin_sms_testing.htm');
}
elseif($act == 'sms_testing')
{
	check_token();
	$txt="您好！这是一条检测短信模块配置的短信。收到此短信，意味着您的短信模块设置正确！您可以进行其它操作了！";
	$mobile=$_POST['mobile'];
	if (!preg_match("/^(13|15|18)\d{9}$/",$mobile))
	{
	adminmsg("手机号填写错误，请重新填写!",0);
	}
	$r=send_sms($mobile,$txt);
	if ($r=="success")
	{
	adminmsg('短信发送成功！',2);
	}
	else
	{
	adminmsg("短信发送失败！$r",1);
	}
}
elseif($act == 'set_tpl')
{
	get_token();
	$smarty->assign('navlabel','templates');
	$smarty->assign('mailconfig',get_cache('mailconfig'));
	$smarty->display('sms/admin_sms_templates.htm');
}
elseif($act == 'rule')
{
	get_token();
	$smarty->assign('navlabel','rule');
	$smarty->assign('sms_config',get_cache('sms_config'));
	$smarty->display('sms/admin_sms_rule.htm');
}
elseif($act == 'sms_rule_save')
{
	check_token();
	foreach($_POST as $k => $v)
	{
	!$db->query("UPDATE ".table('sms_config')." SET value='$v' WHERE name='$k'")?adminmsg('更新站点设置失败', 1):"";
	}
	refresh_cache('sms_config');
	adminmsg("保存成功！",2);
}
elseif($act == 'edit_tpl')
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
	$label[]=array('{oid}','订单号');
	$label[]=array('{amount}','金额');
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
		$sql = "select * from ".table('sms_templates')." where name='".$templates_name."'";
		$info=$db->getone($sql);
	}
	$info['thisname']=trim($_GET['thisname']);
	$smarty->assign('info',$info);
	$smarty->assign('label',$label);
	$smarty->assign('navlabel','templates');
	$smarty->display('sms/admin_sms_templates_edit.htm');
}
elseif($act == 'templates_save')
{
	check_token();
	$templates_value=trim($_POST['templates_value']);
	$templates_name=trim($_POST['templates_name']);
	!$db->query("UPDATE ".table('sms_templates')." SET value='{$templates_value}' WHERE name='{$templates_name}'")?adminmsg('设置失败', 1):"";
	$link[0]['text'] = "返回上一页";
	$link[0]['href'] ="?act=set_tpl";
	refresh_cache('sms_templates');
	adminmsg("保存成功！",2,$link);
}
?>