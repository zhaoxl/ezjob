<?php
 /*
 * 74cms 计划任务 清除缓存
 * ============================================================================
 * 版权所有: 骑士网络，并保留所有权利。
 * 网站地址: http://www.74cms.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
*/
if(!defined('IN_QISHI'))
{
die('Access Denied!');
}
	global $_CFG,$_PAGE;
	$alias='QS_index';
	$mypage=$_PAGE[$alias];
	$page_select=$mypage['tag'];
	if ($mypage['url']=='2')
	{
		$_CFG['web_logo']=$_CFG['web_logo']?$_CFG['web_logo']:'logo.gif';
		$_CFG['upfiles_dir']=$_CFG['site_dir']."data/".$_CFG['updir_images']."/";
		$_CFG['thumb_dir']=$_CFG['site_dir']."data/".$_CFG['updir_thumb']."/";
		$_CFG['certificate_dir']=$_CFG['site_dir']."data/".$_CFG['updir_certificate']."/";
		$_CFG['resume_photo_dir']=$_CFG['site_dir']."data/".$_CFG['resume_photo_dir']."/";
		$_CFG['resume_photo_dir_thumb']=$_CFG['site_dir']."data/".$_CFG['resume_photo_dir_thumb']."/";		
		include_once(QISHI_ROOT_PATH.'include/template_lite/class.template.php');
		$cronstpl = new Template_Lite; 
		$cronstpl -> cache_dir = QISHI_ROOT_PATH.'temp/caches/'.$_CFG['template_dir'];
		$cronstpl -> compile_dir =  QISHI_ROOT_PATH.'temp/templates_c/'.$_CFG['template_dir'];
		$cronstpl -> template_dir = QISHI_ROOT_PATH.'templates/'.$_CFG['template_dir'];
		$cronstpl -> left_delimiter = "{#";
		$cronstpl -> right_delimiter = "#}";
		$cronstpl -> assign('QISHI', $_CFG);
		$cronstpl -> assign('page_select',$page_select);
		$content  =  $cronstpl->fetch($mypage['tpl']);
		$file_name=url_rewrite($alias);
		strrchr($file_name,'/')=='/'?$file_name=$file_name."index.html":'';
		$file_name=substr(QISHI_ROOT_PATH,0,"-".strlen($_CFG['site_dir'])).$file_name;
		$fp = fopen($file_name,"w");
        fwrite($fp,$content);
        fclose($fp);
        chmod($file_name,0777);	
	}
	//更新任务时间表
	if ($crons['weekday']>=0)
	{
	$weekday=array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	$nextrun=strtotime("Next ".$weekday[$crons['weekday']]);
	}
	elseif ($crons['day']>0)
	{
	$nextrun=strtotime('+1 months'); 
	$nextrun=mktime(0,0,0,date("m",$nextrun),$crons['day'],date("Y",$nextrun));
	}
	else
	{
	$nextrun=time();
	}
	if ($crons['hour']>=0)
	{
	$nextrun=strtotime('+1 days',$nextrun); 
	$nextrun=mktime($crons['hour'],0,0,date("m",$nextrun),date("d",$nextrun),date("Y",$nextrun));
	}
	if (intval($crons['minute'])>0)
	{
	$nextrun=strtotime('+1 hours',$nextrun); 
	$nextrun=mktime(date("H",$nextrun),$crons['minute'],0,date("m",$nextrun),date("d",$nextrun),date("Y",$nextrun));
	}
	$setsqlarr['nextrun']=$nextrun;
	$setsqlarr['lastrun']=time();
	updatetable(table('crons'), $setsqlarr," cronid ='".intval($crons['cronid'])."'");	
?>