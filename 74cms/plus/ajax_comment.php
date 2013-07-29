<?php
 /*
 * 74cms ajax 加载评论
 * ============================================================================
 * 版权所有: 骑士网络，并保留所有权利。
 * 网站地址: http://www.74cms.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
*/
define('IN_QISHI', true);
require_once(dirname(dirname(__FILE__)).'/include/plus.common.inc.php');
if ($_CFG['open_comment']=='0')
{
exit();
}
$act = !empty($_POST['act']) ? trim($_POST['act']) :trim($_GET['act']);
if ($act=='')
{
$id=intval($_GET['id']);
$jobs=$db->getone("select * from ".table('jobs')." where id='{$id}' LIMIT 1");
$captcha=get_cache('captcha');
$html="";
$html.="<div class=\"commentbox\">";
$html.="<div class=\"commenttopbox\">";
if ($_SESSION['uid']=='' || $_SESSION['username']=='' || intval($_SESSION['uid'])===0)
{
$html.="<div class=\"loginbox link_lan\">";
$html.="您还没有登录！请 <a href=\"".url_rewrite('QS_login')."\">登录</a> 或 <a href=\"".$_CFG['site_dir']."user/user_reg.php\">注册</a>";
$html.="</div>";
}
$html.="<div class=\"titbox\">";
$html.="<div class=\"tleft\">发表评论：</div><div class=\"tright link_bk\"><a  href=\"".url_rewrite('QS_companycommentshow',array('id'=>$id))."\" target=\"_blank\">共<span id=\"countcomment\">{$jobs['comment']}</span>条评论</a></div><div class=\"clear\"></div>";
$html.="</div>";
$html.="<div class=\"textareabox\">";
$html.="<textarea name=\"\" cols=\"\" rows=\"\" id=\"content\" >文明上网，理性发言</textarea>";
$html.="</div>";
$html.="<div class=\"buttonbox\">";
$html.="<div class=\"bleft\">";
if ($captcha['verify_comment']=='1')
{
$html.="<script type=\"text/javascript\">";
$html.="$(document).ready(function()";
$html.="{";
$html.="function imgcaptcha(inputID,imgdiv)";
$html.="{";
$html.="$(inputID).focus(function(){";
$html.="if ($(inputID).val()==\"点击获取验证码\")";
$html.="{";
$html.="$(inputID).val(\"\");";
$html.="$(inputID).css(\"color\",\"#333333\");";
$html.="}";
$html.="$(inputID).parent(\"div\").css(\"position\",\"relative\");";
$html.="$(imgdiv).css({ position: \"absolute\", left:  $(inputID).width(), \"bottom\": \"0px\" , \"z-index\": \"10\", \"background-color\": \"#FFFFFF\", \"border\": \"1px #A3C8DC solid\",\"display\": \"none\",\"margin-left\": \"15px\"});";
$html.="$(imgdiv).show();";
$html.="if ($(imgdiv).html()=='')";
$html.="{";
$html.="var tsTimeStamp= new Date().getTime();";
$html.="$(imgdiv).append(\"<img src='{$_CFG['site_dir']}include/imagecaptcha.php?t='\"+tsTimeStamp+\" id='getcode' align='absmiddle'  style='cursor:pointer; margin:3px;' title='看不请验证码？点击更换一张' border='0'/>\");";
$html.="}";
$html.="$(imgdiv+\" img\").click(function()";
$html.="{";
$html.="$(imgdiv+\" img\").attr(\"src\",$(imgdiv+\" img\").attr(\"src\")+\"1\");";
$html.="});";
$html.="$(document).unbind().click(function(event)";
$html.="{";
$html.="var clickid=$(event.target).attr(\"id\");";
$html.="if (clickid!=\"getcode\" &&  clickid!=\"postcaptcha\")";
$html.="{";
$html.="$(imgdiv).hide();";
$html.="$(inputID).parent(\"div\").css(\"position\",\"\");";
$html.="$(document).unbind();";
$html.="}";		
$html.="});";
$html.="});";
$html.="}";
$html.="imgcaptcha(\"#postcaptcha\",\"#imgdiv\");";
$html.="});";
$html.="</script>";
$html.="<div><div id=\"imgdiv\"></div>";
$html.="<input type=\"text\" name=\"postcaptcha\" id=\"postcaptcha\" value=\"点击获取验证码\"/>";
$html.="</div>";
}
$html.="</div>";
$html.="<div class=\"bcenter\" id=\"posterr\"></div>";
$html.="<div class=\"bright\"><input name=\"\" type=\"submit\" class=\"button\" value=\"发表\" id=\"submitcomment\" />";
$html.="</div>";
$html.="<div class=\"clear\"></div>";
$html.="</div>";
$html.="</div>";
$html.="<div id=\"comment_list_box\">";
$commentarray=$db->getall("select  c.*,m.avatars,m.username from ".table('comment')." as c LEFT JOIN  ".table('members')." AS m ON c.uid=m.uid where jobs_id = '{$id}' ORDER BY c.id DESC LIMIT 5");
if (!empty($commentarray))
{
	foreach($commentarray as $li)
	{
		$html.="<div class=\"listbox\" id=\"li-0\"><div class=\"leftimgbox\">";
			if ($li['avatars'])
			{
			$html.="<img src=\"{$_CFG['site_dir']}data/avatar/48/{$li['avatars']}\" border=\"0\" width=\"48\" height=\"48\"/>";
			}
			else
			{
			$html.="<img src=\"{$_CFG['site_dir']}data/avatar/_no_photo.gif\" border=\"0\" width=\"48\" height=\"48\"/>";
			}
		$html.="</div><div class=\"txtbox\"><strong>{$li['username']}</strong><span>".date('Y-m-d H:i',$li['addtime'])."</span><br />{$li['content']}</div><div class=\"clear\"></div></div>";
}
$html.="</div>";
$html.="<div class=\"comment_more\" ><span>加载更多...</span></div>";
}
else
{
$html.="</div>";
$html.="<div class=\"noinfo\">目前还没有人发表评论！</div>";
$html.="<div class=\"comment_more\" style=\"display:none\"><span>加载更多...</span></div>";
}
$html.="</div>";
$html.="<script type=\"text/javascript\">";
$html.="$(document).ready(function()";
$html.="{";
$html.="$(\"#content\").focus(function(){";
$html.="if ($(\"#content\").val()==\"文明上网，理性发言\")";
$html.="{";
$html.="$(\"#content\").val('');";
$html.="} "; 
$html.="});";
$html.="$(\"#submitcomment\").click(function(){";
$html.="$(\"#posterr\").html('');";
$html.="var content=$(\"#content\").val();";
$html.="var postcaptcha=$(\"#postcaptcha\").val();";
$html.="if (content=='' || content=='文明上网，理性发言')";
$html.="{";
$html.="$(\"#posterr\").html('请填写内容');";
$html.="}";
$html.="else if (content.length<5 || content.length>300)";
$html.="{";
$html.="$(\"#posterr\").html('内容长度为必须为5-300个字符！');";
$html.="}";
if ($captcha['verify_comment']=='1')
{
$html.="else if (postcaptcha=='' || postcaptcha=='点击获取验证码')";
$html.="{";
$html.="$(\"#posterr\").html('请填写验证码');";
$html.="}";
}
$html.="else";
$html.="{";
$html.="$(\"#submitcomment\").val('提交中').attr(\"disabled\",\"disabled\");";
$html.="$.post(\"{$_CFG['site_dir']}plus/ajax_comment.php\", {\"content\": $(\"#content\").val(),\"postcaptcha\": $(\"#postcaptcha\").val(),\"jobs_id\": \"{$jobs['id']}\",\"company_id\": \"{$jobs['company_id']}\",\"time\": new Date().getTime(),\"act\":\"comment_save\"},";
$html.="function (data,textStatus)";
$html.="{";
$html.="if (data==\"err\" || data==\"errcaptcha\" || data==\"err1\")";
$html.="{";		
$html.="$(\"#submitcomment\").val('提交').attr(\"disabled\",\"\");";
$html.="$(\"#posterr\").html('');";
$html.="if (data==\"err\")";
$html.="{";
$html.="errinfo=\"发表失败！\";";
$html.="}";
$html.="else if(data==\"errcaptcha\")";
$html.="{";
$html.="$(\"#imgdiv img\").attr(\"src\",$(\"#imgdiv img\").attr(\"src\")+\"1\");";
$html.="errinfo=\"验证码错误\";";
$html.="}";
$html.="if (data==\"err1\")";
$html.="{";
$html.="errinfo=\"您今天发表的评论过多，明天再来试试吧！\";";
$html.="}";
$html.="$(\"#posterr\").html(errinfo);";
$html.="}";
$html.="else";
$html.="{";
$html.="$(\"#submitcomment\").val('提交').attr(\"disabled\",\"\");";
$html.="$(\"#countcomment\").html(data);";
$html.="$(\"#content\").val('');";
$html.="$(\"#postcaptcha\").val('点击获取验证码');";
$html.="$(\"#imgdiv img\").attr(\"src\",$(\"#imgdiv img\").attr(\"src\")+\"1\");";
$html.="var tsTimeStamp= new Date().getTime();";
$html.="$.get(\"{$_CFG['site_dir']}plus/ajax_comment.php\", { \"id\": \"{$jobs['id']}\",\"time\":tsTimeStamp,\"act\":\"show_list\",\"offset\":\"0\",\"rows\":\"5\"},";
$html.="function (data,textStatus)";
$html.="{";
$html.="$(\"#comment_list_box\").html(data);";
$html.="$(\".comment_more\").show();";
$html.="$(\".noinfo\").remove();";
$html.="$(\".comment_more span\").html('加载更多...');";
$html.="}";
$html.=");";
$html.="alert('发表成功');";
$html.="}";
$html.="})	";
$html.="}";
$html.="});";
//加载更多
$html.="$(\".comment_more\").click(function(){";
$html.="$(\".comment_more\").show();";
$html.="$(\".comment_more span\").html('正在加载，请稍后...');";
$html.="var offset=$(\"#comment_list_box div[class='listbox']:last-child\").attr('id');";
$html.="offset=parseInt(offset.substr(3));";
$html.="var tsTimeStamp= new Date().getTime();";
$html.="$.get(\"{$_CFG['site_dir']}plus/ajax_comment.php\", { \"id\": \"{$jobs['id']}\",\"time\":tsTimeStamp,\"act\":\"show_list\",\"offset\":offset+5,\"rows\":\"5\"},";
$html.="function (data,textStatus)";
$html.="{";
$html.="if (data=='empty!')";
$html.="{";
$html.="$(\".comment_more span\").html('已加载所有数据！');";
//$html.="$(\".comment_more\").unbind();";
$html.="}";
$html.="else";
$html.="{";
$html.="$(\".comment_more span\").html('加载更多...');";
$html.="$(\"#comment_list_box\").append(data);";
$html.="}";
$html.="}";
$html.=");";
$html.="});";
$html.="});";
$html.="</script>";
exit($html);
}
elseif ($act=='comment_save')
{
	if ($_SESSION['uid']=='' || $_SESSION['username']=='' || intval($_SESSION['uid'])===0)
	{
	exit('err');
	}
	$today=mktime(0,0,0,date("m"),date("d"),date("Y"));
	$n=$db->get_total("SELECT COUNT(*) AS num FROM ".table('comment')." WHERE uid='".intval($_SESSION['uid'])."' AND addtime>{$today}");
	if($n>=30)
	{
	 exit('err1');
	}
	$captcha=get_cache('captcha');
	if ($captcha['verify_comment']=="1")
	{
			$postcaptcha=$_POST['postcaptcha'];
			if ($captcha['captcha_lang']=="cn" && strcasecmp(QISHI_DBCHARSET,"utf8")!=0)
			{
			$postcaptcha=iconv("utf-8",QISHI_DBCHARSET,$postcaptcha);
			}
			if (empty($postcaptcha) || empty($_SESSION['imageCaptcha_content']) || strcasecmp($_SESSION['imageCaptcha_content'],$postcaptcha)!=0)
			{
			unset($_SESSION['imageCaptcha_content']);
			exit("errcaptcha");
			}
			unset($_SESSION['imageCaptcha_content']);
	}
	$setsqlarr['content']=trim($_POST['content']);
	if (strcasecmp(QISHI_DBCHARSET,"utf8")!=0)
	{
	$setsqlarr['content']=iconv("utf-8",QISHI_DBCHARSET,$setsqlarr['content']);
	}
	$setsqlarr['uid']=intval($_SESSION['uid']);
	$setsqlarr['jobs_id']=intval($_POST['jobs_id']);
	$setsqlarr['company_id']=intval($_POST['company_id']);
	$setsqlarr['addtime']=time();
	inserttable(table('comment'),$setsqlarr);
	$sql="update ".table('jobs')." set comment=comment+1 WHERE id='{$setsqlarr['jobs_id']}'  LIMIT 1";
	$db->query($sql);
	$jobs=$db->getone("select comment from ".table('jobs')." where id='{$setsqlarr['jobs_id']}' LIMIT 1");
	exit($jobs['comment']);
}
elseif ($act=='show_list')
{
$commenthtml="";
$rows=intval($_GET['rows']);
$offset=intval($_GET['offset']); 
$id=intval($_GET['id']); 
$commentarray=$db->getall("select  c.*,m.avatars,m.username from ".table('comment')." as c LEFT JOIN  ".table('members')." AS m ON c.uid=m.uid where jobs_id = '{$id}' ORDER BY c.id DESC LIMIT {$offset},{$rows}");
if (!empty($commentarray) && $offset<=100)
{
	foreach($commentarray as $li)
	{
		$commenthtml.="<div class=\"listbox\" id=\"li-{$offset}\"><div class=\"leftimgbox\">";
			if ($li['avatars'])
			{
			$commenthtml.="<img src=\"{$_CFG['site_dir']}data/avatar/48/{$li['avatars']}\" border=\"0\" width=\"48\" height=\"48\"/>";
			}
			else
			{
			$commenthtml.="<img src=\"{$_CFG['site_dir']}data/avatar/_no_photo.gif\" border=\"0\" width=\"48\" height=\"48\"/>";
			}
		$commenthtml.="</div><div class=\"txtbox\"><strong>{$li['username']}</strong><span>".date('Y-m-d H:i',$li['addtime'])."</span><br />{$li['content']}</div><div class=\"clear\"></div></div>";
	}
	exit($commenthtml);
}
else
{
	exit('empty!');
}
}
?>