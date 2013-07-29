<?php
 /*
 * 74cms 管理中心 生成HTML
 * ============================================================================
 * 版权所有: 骑士网络，并保留所有权利。
 * 网站地址: http://www.74cms.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
*/
 if(!defined('IN_QISHI'))die('Access Denied!');
function html_output($alias=NULL,$getarr=NULL)
{
	global $db,$smarty,$_CFG,$_PAGE,$_NAV;
	if (is_array($getarr)) extract($getarr);
	$mypage=$_PAGE[$alias];
	if ($mypage['url']=='2')
	{
	$page_select=$mypage['tag'];
	$id0?$_GET['id']=$id0:'';
	$page?$_GET['page']=$page:'';
	$smarty -> template_dir ='../templates/'.$_CFG['template_dir']; 
	$smarty -> compile_id = substr($_CFG['template_dir'],0,-1);
	$smarty -> assign('page_select',$page_select);
	$id=intval($_GET['id']);
	if ($mypage['alias']=="QS_companyshow")
	{		
		$content=$smarty->fetch(get_tpl("company_profile",$id));
	}
	elseif ($mypage['alias']=="QS_jobsshow")
	{
	$content=$smarty->fetch(get_tpl("jobs",$id));
	}
	elseif ($mypage['alias']=="QS_resumeshow")
	{
	$content=$smarty->fetch(get_tpl("resume",$id));
	}
	else
	{
	$content=$smarty->fetch($mypage['tpl']);
	}	
	$file_name=url_rewrite($alias,$getarr);
	strrchr($file_name,'/')=='/'?$file_name=$file_name."index.html":'';
	$dir=substr(QISHI_ROOT_PATH,0,"-".strlen($_CFG['site_dir'])).$file_name;
	makehtmlkile($dir,$content);
	return $file_name;
	}
	else
	{
	return "生成失败，对应页面未开启生成HTML，请在页面管理中开启";
	}
}
//生成文件
function makehtmlkile($file_name,$content) 
     {
	 $dir=dirname($file_name);
         if (!file_exists($dir))
		 {
  		 make_dir($dir);	 
         }
          if(!$fp = fopen($file_name,"w")) return false;
          if(!fwrite($fp,$content))
		  { 
          return false;
          } 
         fclose($fp);
         chmod($file_name,0777);
      }
//输出进度条
function process_output($i,$file_name) 
{
		$html ="";
		$html.= "<script type=\"text/jscript\">\n";
		$html.= "document.getElementById(\"file_name\").innerHTML='".$file_name." 生成完毕！已生成 <strong>".$i."</strong> 个文件!';\n";
		$html.= "</script>";
		return $html;
}
//输出完毕进度条
function process_output_end($count,$file_name_show) 
{
		$html ="";
		$html.= "<script type=\"text/jscript\">\n";
		$html.= "document.getElementById(\"make_tip\").innerHTML='已生成完毕！共计<strong> ".$count."</strong> 个';\n";
		$html.= "document.getElementById(\"make\").style.display =\"none\";\n";
		$html.= "document.getElementById(\"make_end\").style.display =\"\";\n";		
		$html.= "document.getElementById(\"show\").innerHTML='".$file_name_show."';\n";
		$html.= "</script>"; 
		return $html;
}
function get_make_info($makeinfo) 
{
	global $_CFG;
$info=array();
switch ($makeinfo)
{
case "QS_jobsshow": 
	$info['table'] = "jobs";
	$info['urlrewrite_act'] = "jobs-show";
	$info['page_select'] = "jobs"; 
	$info['wheresql'] = ""; 
	if ($_CFG['outdated_jobs']=="1") $info['wheresql'].=" AND deadline>".time()." ";
break;
case "QS_companyshow": 
	$info['table'] = "company_profile";
	$info['urlrewrite_act'] = "company-show";
	$info['page_select'] = "jobs";
	$info['wheresql'] = "  user_status=1 "; 
break;
case "QS_companymapshow": 
	$info['table'] = "company_profile";
	$info['urlrewrite_act'] = "company-map";
	$info['wheresql'] = "  map_open=1 AND  user_status=1 ";
break;
case "QS_resumeshow": 
	$info['table'] = "resume";
	$info['urlrewrite_act'] = "resume-show";
	$info['page_select'] = "resume";
	$info['wheresql'] = "";
	if ($_CFG['outdated_resume']=="1") $info['wheresql'].=" AND  deadline>".time()." ";
break;
case "QS_newsshow": 
	$info['table'] = "article";
	$info['urlrewrite_act'] = "news-show";
	$info['page_select'] = "news";
	$info['wheresql'] = " is_display=1";
break;
case "QS_explainshow": 
	$info['table'] = "explain";
	$info['urlrewrite_act'] = "explain-show";
	$info['page_select'] = "explain";
	$info['wheresql'] = " is_display=1 ";
break;
case "QS_noticeshow": 
	$info['table'] = "notice";
	$info['urlrewrite_act'] = "notice-show";
	$info['page_select'] = "notice";
	$info['wheresql'] = " is_display=1 ";
break;
case "QS_jobfairshow": 
	$info['table'] = "jobfair";
	$info['urlrewrite_act'] = "jobfair-show";
	$info['page_select'] = "jobfair";
	$info['wheresql'] = " display=1 ";
break;
}
return $info;
}	
?>