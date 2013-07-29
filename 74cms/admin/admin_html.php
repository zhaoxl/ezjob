<?php
 /*
 * 74cms 生成HTML
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
require_once(ADMIN_ROOT_PATH.'include/admin_html_fun.php');
require_once(ADMIN_ROOT_PATH.'include/admin_page_fun.php');
$act = !empty($_REQUEST['act']) ? trim($_REQUEST['act']) : 'output';
$smarty->assign('act',$act);
$smarty->assign('pageheader',"生成HTML");
if($act == 'output')
{
	get_token();
check_permissions($_SESSION['admin_purview'],"html_set");
$smarty->assign('pageindex',get_page(0,300," WHERE pagetpye=1 AND url=2"));
$smarty->assign('pagelist',get_page(0,300," WHERE pagetpye=2 AND url=2"));
$smarty->assign('pageshow',get_page(0,300," WHERE pagetpye=3 AND url=2"));
$smarty->display('html/admin_html_output.htm');
}
elseif($act == 'make_index')
{	
	check_token();
	check_permissions($_SESSION['admin_purview'],"html_set");
		if (empty($_POST['alias']))
		{
		adminmsg("您没有选择任何项目！",1);
		exit();
		}
	ob_end_clean();
	$smarty -> template_dir = ADMIN_ROOT_PATH."templates/default/";
	$smarty->display('html/admin_html_make.htm');
	$alias=$_POST['alias'];
	$i=0;
	$file_name_show="";
	foreach ($alias as $list)
	{
		$file_name=html_output($list);
		$file_name_show.="<a href=\"".$file_name."\" target=\"_blank\">".$file_name."</a><br />";
		$i++;
		echo process_output($i,$file_name);
		ob_flush();
		flush();
	}
	echo process_output_end($i,$file_name_show);
}
elseif($act == 'make_show')
{
		check_token();
		check_permissions($_SESSION['admin_purview'],"html_set");
		if (empty($_POST['alias']))
		{
		adminmsg("您没有选择任何项目！",1);
		exit();
		}
		set_time_limit(0);
		$type=$_POST['type'];
		$wheresql=$ordersql='';
		if ($type=="today")
		{
		$wheresql =" WHERE addtime>".mktime(0,0,0);
		$ordersql = "";
		}
		if ($type=="all")
		{
		$wheresql ="";
		$ordersql = "";
		}
		if ($type=="newest")
		{
		$wheresql ="";
		$ordersql ="  order BY id DESC LIMIT 0,".intval($_POST['newest_num'])." ";
		}
		if ($type=="id")
		{
		$wheresql =" WHERE id >=".intval($_POST['id_min'])." AND id <=".intval($_POST['id_max'])." ";
		$ordersql = "";
		}
		//设置日期范围
		if ($type=="dates")
		{
			if ( !preg_match("/^[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}$/",$_POST['dates_min']) || !preg_match("/^[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}$/",$_POST['dates_max'])) 
			{
			adminmsg("日期范围错误！",0);
			exit();
			}
			$dates_min_arr=explode('-',$_POST['dates_min']);
			$dates_max_arr=explode('-',$_POST['dates_max']);
			$dates_min = mktime(0,0,0,$dates_min_arr[1],$dates_min_arr[2],$dates_min_arr[0]); 
			$dates_max = mktime(0,0,0,$dates_max_arr[1],$dates_max_arr[2],$dates_max_arr[0]); 
			if ($dates_min<$dates_max)
			{
			$wheresql =" WHERE addtime >=".$dates_min." AND addtime <=".$dates_max." ";
			$ordersql = "";
			}
			else
			{
			adminmsg("日期范围错误！",0);
			exit();
			}
		}
	ob_end_clean();
	$smarty -> template_dir = ADMIN_ROOT_PATH."templates/default/"; //模板存放目录 
	$smarty->assign('pageheader',"74CMS 管理中心 - 生成HTML");
	$smarty->display('html/admin_html_make.htm');
		$i=0;
			foreach($_POST['alias'] as $val)
			{ 
				$info=get_make_info($val);
				if ($wheresql)
				{
				$result = $db->query("SELECT id,addtime FROM ".table($info['table']).$wheresql.($info['wheresql']?" AND ".$info['wheresql']:'').$ordersql);
				}
				else
				{
				$result = $db->query("SELECT id,addtime FROM ".table($info['table'])." ".($info['wheresql']?" WHERE ".$info['wheresql']:'').$ordersql);
				}
				ob_end_clean();
				while($row = $db->fetch_array($result))
				{
				$file_name=html_output($val,array('id0'=>$row['id'],'addtime'=>$row['addtime']));
				$i++;	
				echo process_output($i,$file_name);
				$file_name_show.="<a href=\"{$file_name}\" target=\"_blank\">{$file_name}</a><br />";
				ob_flush();
				flush();
				}
			}
		echo process_output_end($i,$file_name_show);
}
elseif($act == 'make_list')
{
	check_token();
	check_permissions($_SESSION['admin_purview'],"html_set");
	if (empty($_POST['alias'])) adminmsg("您没有选择任何项目！",1);
	$smarty -> template_dir = ADMIN_ROOT_PATH."templates/default/";
	$smarty->display('html/admin_html_make.htm');
			$i=0;
			if (in_array("QS_newslist",$_POST['alias']))
			{
						require_once(ADMIN_ROOT_PATH.'include/admin_article_fun.php');
						ob_end_clean();				 
						$list=get_article_category($parent['id']);
						foreach($list as $list_val)
						{
							if ($list_val['parentid']<>"0")
							{
								$_GET['id']=$list_val['id'];
								$_GET['page']=1;
								$file_name=html_output('QS_newslist',array('id0'=>$_GET['id'],'page'=>$_GET['page']));//生成列表首页，并获取总页数	
								$i++;				
								echo process_output($i,$file_name);
								ob_flush();
								flush();
								$file_name_show.="<a href=\"{$file_name}\" target=\"_blank\">{$file_name}</a><br />";			
								  if ($_SESSION['html_totalpage'])
									{
										for($p=2;$p<=$_SESSION['html_totalpage'];$p++)//从第二页开始生成
										{ 
											$_GET['page']=$p;
											$_GET['id']=$list_val['id'];							
											$i++;
											$file_name=html_output('QS_newslist',array('id0'=>$list_val['id'],'page'=>$_GET['page']));
											echo process_output($i,$file_name);
											ob_flush();
											flush();
											$file_name_show.="<a href=\"".$file_name."\" target=\"_blank\">".$file_name."</a><br />";
											$_GET['page']='';
										}	
										unset($_SESSION['html_totalpage']);
									}
							}
						}
			}
			if (in_array("QS_noticelist",$_POST['alias']))
			{
					ob_end_clean();
					require_once(ADMIN_ROOT_PATH.'include/admin_notice_fun.php');
					$nid=get_notice_category();
					foreach ($nid as $id)
					{
						$_GET['id']=$id['id'];
						$_GET['page']=1;
						$file_name=html_output('QS_noticelist',array('id0'=>$id['id'],'page'=>$_GET['page']));
						$file_name_show.="<a href=\"".$file_name."\" target=\"_blank\">".$file_name."</a><br />";
						$i++;
						echo process_output($i,$file_name);
						ob_flush();
						flush();
							if ($_SESSION['html_totalpage'])
							{
								for($p=2;$p<=$_SESSION['html_totalpage'];$p++)//从第二页开始生成
								{ 
									$_GET['page']=$p;
									$_GET['id']=$id['id'];							
									$i++;
									$file_name=html_output('QS_noticelist',array('id0'=>$id['id'],'page'=>$_GET['page']));
									echo process_output($i,$file_name);
									ob_flush();
									flush();
									$file_name_show.="<a href=\"".$file_name."\" target=\"_blank\">".$file_name."</a><br />";
									$_GET['page']='';
								}	
								unset($_SESSION['html_totalpage']);
							} 
					}
			}
			if (in_array("QS_hrtoolslist",$_POST['alias']))
			{
					ob_end_clean();
					require_once(ADMIN_ROOT_PATH.'include/admin_hrtools_fun.php');
					$nid=get_hrtools_category();
					foreach ($nid as $id)
					{
						$_GET['id']=$id['c_id'];
						$_GET['page']=1;
						$file_name=html_output('QS_hrtoolslist',array('id0'=>$id['c_id'],'page'=>$_GET['page']));
						$file_name_show.="<a href=\"".$file_name."\" target=\"_blank\">".$file_name."</a><br />";
						$i++;
						echo process_output($i,$file_name);
						ob_flush();
						flush();
							if ($_SESSION['html_totalpage'])
							{
								for($p=2;$p<=$_SESSION['html_totalpage'];$p++)//从第二页开始生成
								{ 
									$_GET['page']=$p;
									$_GET['id']=$id['c_id'];							
									$i++;
									$file_name=html_output('QS_hrtoolslist',array('id0'=>$id['c_id'],'page'=>$_GET['page']));
									echo process_output($i,$file_name);
									ob_flush();
									flush();
									$file_name_show.="<a href=\"".$file_name."\" target=\"_blank\">".$file_name."</a><br />";
									$_GET['page']='';
								}	
								unset($_SESSION['html_totalpage']);
							} 
					}
			}
			if (in_array("QS_jobfairlist",$_POST['alias']))
			{
						ob_end_clean();
						$_GET['id']=$id['id'];
						$_GET['page']=1;
						$file_name=html_output('QS_jobfairlist',array('id0'=>$id['id'],'page'=>$_GET['page']));
						$file_name_show.="<a href=\"".$file_name."\" target=\"_blank\">".$file_name."</a><br />";
						$i++;
						echo process_output($i,$file_name);
						ob_flush();
						flush();
						if ($_SESSION['html_totalpage'])
						{
								for($p=2;$p<=$_SESSION['html_totalpage'];$p++)//从第二页开始生成
								{ 
									$_GET['page']=$p;
									$_GET['id']=$id['id'];							
									$i++;
									$file_name=html_output('QS_jobfairlist',array('id0'=>$id['id'],'page'=>$_GET['page']));
									echo process_output($i,$file_name);
									ob_flush();
									flush();
									$file_name_show.="<a href=\"".$file_name."\" target=\"_blank\">".$file_name."</a><br />";
									$_GET['page']='';
								}	
								unset($_SESSION['html_totalpage']);
						} 
			}
			if (in_array("QS_jobfairexhibitors",$_POST['alias']))
			{
					ob_end_clean();
					require_once(ADMIN_ROOT_PATH.'include/admin_jobfair_fun.php');
					$nid=get_jobfair_display();
					foreach ($nid as $id)
					{
						$_GET['id']=$id['id'];
						$_GET['page']=1;
						$file_name=html_output('QS_jobfairexhibitors',array('id0'=>$id['id'],'page'=>$_GET['page']));
						$file_name_show.="<a href=\"{$file_name}\" target=\"_blank\">{$file_name}</a><br />";
						$i++;
						echo process_output($i,$file_name);
						ob_flush();
						flush();
							if ($_SESSION['html_totalpage'])
							{
								for($p=2;$p<=$_SESSION['html_totalpage'];$p++)//从第二页开始生成
								{ 
									$_GET['page']=$p;
									$_GET['id']=$id['id'];							
									$i++;
									$file_name=html_output('QS_jobfairexhibitors',array('id0'=>$id['id'],'page'=>$_GET['page']));
									echo process_output($i,$file_name);
									ob_flush();
									flush();
									$file_name_show.="<a href=\"{$file_name}\" target=\"_blank\">{$file_name}</a><br />";
									$_GET['page']='';
								}	
								unset($_SESSION['html_totalpage']);
							} 
					}
			}
		echo process_output_end($i,$file_name_show);
}
?>