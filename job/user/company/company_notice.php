<?php
/*
 * 74cms ��ҵ��Ա����
 * ============================================================================
 * ��Ȩ����: ��ʿ���磬����������Ȩ����
 * ��վ��ַ: http://www.74cms.com��
 * ----------------------------------------------------------------------------
 * �ⲻ��һ��������������ֻ���ڲ�������ҵĿ�ĵ�ǰ���¶Գ����������޸ĺ�
 * ʹ�ã��������Գ���������κ���ʽ�κ�Ŀ�ĵ��ٷ�����
 * ============================================================================
*/
define('IN_QISHI', true);
require_once(dirname(__FILE__).'/company_common.php');
$smarty->assign('leftmenu',"index");
if ($act=='notice')
{
	require_once(QISHI_ROOT_PATH.'include/page.class.php');
	$wheresql=" WHERE type_id='2' AND is_display='1'";
	$perpage=10;
	$total_sql="SELECT COUNT(*) AS num FROM ".table('notice').$wheresql;
	$total_val=$db->get_total($total_sql);
	$page = new page(array('total'=>$total_val, 'perpage'=>$perpage));
	$currenpage=$page->nowindex;
	$offset=($currenpage-1)*$perpage;
	$smarty->assign('title','���� - ��Ա���� - '.$_CFG['site_name']);
	$smarty->assign('notice',get_notice($offset, $perpage,$wheresql,30));
	if ($total_val>$perpage)$smarty->assign('page',$page->show(3));//��ҳ��
	$smarty->display('member_company/company_notice.htm');
}
elseif ($act=='notice_show')
{
	$smarty->assign('show',get_notice_one($_GET['id']));
 	$smarty->assign('title','���� - ��Ա���� - '.$_CFG['site_name']); 
	$smarty->display('member_company/company_notice_show.htm');
}
unset($smarty);
?>