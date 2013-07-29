<?php
function tpl_function_qishi_jobfair_show($params, &$smarty)
{
global $db;
$arr=explode(',',$params['set']);
foreach($arr as $str)
{
$a=explode(':',$str);
	switch ($a[0])
	{
	case "招聘会ID":
		$aset['id'] = $a[1];
		break;
	case "列表名":
		$aset['listname'] = $a[1];
		break;
	case "参会企业页":
		$aset['exhibitorspage'] = $a[1];
		break;
	}
}
$aset=array_map("get_smarty_request",$aset);
$aset['id']=$aset['id']?intval($aset['id']):0;
$aset['listname']=$aset['listname']?$aset['listname']:"list";
$aset['exhibitorspage']=isset($aset['exhibitorspage'])?$aset['exhibitorspage']:'QS_jobfairexhibitors';
unset($arr,$str,$a,$params);
$sql = "select * from ".table('jobfair')." WHERE  id=".intval($aset['id'])." AND  display=1 LIMIT 1";
$val=$db->getone($sql);
if (empty($val))
{
	header("HTTP/1.1 404 Not Found"); 
	$smarty->display("404.htm");
	exit();
}
$val['exhibitorsurl'] = url_rewrite($aset['exhibitorspage'],array('id'=>$val['id']));
$time=time();
if ($val['predetermined_status']=="1" && $val['holddates']>$time && $time>$val['predetermined_start'] && ($val['predetermined_end']=="0" || $val['predetermined_end']>$time))
	{
	$val['predetermined_ok']=1;
	}
	else
	{
	$val['predetermined_ok']=0;
	}
$val['keywords']=$val['title'];
$val['description']=str_replace('&nbsp;','',$val['introduction']);
$val['description']=cut_str(strip_tags($val['description']),60,0,"");
$smarty->assign($aset['listname'],$val);
}
?>