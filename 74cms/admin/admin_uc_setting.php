<?php
 /*
 * 74cms uc整合
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
require_once(ADMIN_ROOT_PATH.'include/admin_uc_fun.php');
$act = !empty($_REQUEST['act']) ? trim($_REQUEST['act']) : 'uc_install';
check_permissions($_SESSION['admin_purview'],"UCenter");
if($act=='uc_install')
{
	//include('data/config.php');
	$UC_config=array(
	            'appid'=>UC_APPID,
				'ucapi'=>UC_API,
				'ucip'=>UC_IP,
				'uckey'=>UC_KEY,
				'ucconnect'=>UC_CONNECT,
				'ucdbhost'=>UC_DBHOST,
				'ucdbuser'=>UC_DBUSER,
				'ucdbpw'=>UC_DBPW,
				'ucdbname'=>UC_DBNAME,
				'ucdbtablepre'=>UC_DBTABLEPRE,
	);
	$smarty->assign('uc_config',$UC_config);
	$smarty->assign('pageheader',"74CMS 管理中心 - 整合UCenter");
	$smarty->display('uc/admin_uc_setting.htm');
}
else if($act=='uc_set_save')
{
	//print_r($_POST['uc_config']);
	if(uc_write_config($_POST['uc_config'],dirname(__FILE__).'/../data/config.php')){adminmsg('修改成功！',2);}else{
		adminmsg('修改失败！');
	};
}
?>