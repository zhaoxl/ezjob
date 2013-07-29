<?php 
define('IN_QISHI', true);
set_time_limit(0);
$common_path ="../include/common.inc.php";
	if (file_exists($common_path))
	{
	include($common_path);
	}
	else
	{
	exit("没有找到74CMS的程序目录！");
	}
require_once(dirname(__FILE__).'/mysql.class.php');
$db = new mysql($dbhost,$dbuser,$dbpass,$dbname);
$version_old = '3.2';
$version_new = '3.3';
$step=isset($_GET['step'])?$_GET['step']:1;
if ($_GET['act']=="update")
{
	if ($version_old<>QISHI_VERSION )
	{
	exit("本程序仅用于升级 74cms v".$version_old."到74cms v".$version_new);
	}
	$Field=$db->getone("SHOW COLUMNS FROM ".table('jobs_search_key')." WHERE Field = 'likekey' ");
	if (!empty($Field))
	{
	exit("您的数据库已经执行过升级了，请先将数据库恢复到 {$version_old} 版本，然后再运行本程序!");
	}
	if (empty($_POST['key']))
	{
	exit("<script language=javascript>alert('请填写授权码！');window.location='index.php?step=3'</script>");
	}
$sql=updataopen("http://www.74cms.com/updata/3.2_3.3.php?key={$_POST['key']}&domain={$_SERVER['SERVER_NAME']}");
if (empty($sql))
{
exit("<script language=javascript>alert('获取升级数据失败，请联系骑士客服协助升级！');window.location='index.php?step=3'</script>");
}
else
{
	if ($sql=="err_1")
	{
	exit("<script language=javascript>alert('授权码错误！');window.location='index.php?step=3'</script>");
	}
	elseif ($sql=="err_2")
	{
	exit("<script language=javascript>alert('此版本的升级已经超过1次');window.location='index.php?step=3'</script>");
	}
	elseif ($sql=="err_3")
	{
	exit("<script language=javascript>alert('域名(".$_SERVER['SERVER_NAME'].")未授权！');window.location='index.php?step=3'</script>");
	}
	else
	{
		runquery($sql);
		$db->query("UPDATE  ".table('resume_search_key')." AS a,".table('resume')."  AS b SET a.likekey = CONCAT(b.intention_jobs,b.recentjobs,b.specialty) WHERE  a.id = b.id");
		$db->query("UPDATE  ".table('jobs_search_key')." AS a,".table('jobs')."  AS b SET a.likekey = CONCAT(b.jobs_name,b.companyname) WHERE  a.id = b.id");
		$db->query("UPDATE  ".table('members')." AS a,".table('members_info')."  AS b SET a.avatars = b.avatars WHERE  a.uid = b.uid");
		$db->query("ALTER TABLE  ".table('members_info')." DROP `avatars`");
	}
}
//
header("Location: index.php?step=4");
exit();
}
if ($_GET['act']=="check")
{
 $need_check_dirs = array(
                    'data',
                    'data/certificate',
                    'data/images',
					'data/images/thumb',
                    'data/photo',
					'data/photo/thumb',
					'data/backup',
					'temp/caches',
					'temp/templates_c',		
					'temp/backup_templates',			
					'templates'			
 );
$dir_check = check_dirs($need_check_dirs);
$step="2";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>骑士CMS升级程序 </title>
<script src="images/jquery.js" type="text/javascript"></script>
<style type="text/css">
<!--
body,td,th {
	font-size: 12px;
 
	color: #006699;
}
h1{ margin-bottom:10px; margin-top:10px;}
.txt{ line-height:200%; padding-left:10px; padding-top:10px;}
.txt span{ color:#FF0000}
input{ font-size:12px; padding:3px;}
-->
</style>
</head>
<body>
<table width="60%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td  height="100" ><img src="images/logo.gif" /></td>
  </tr>
</table>
<?php if ($step=="1") {?>
			<table width="60%" border="0" align="center" cellpadding="0" cellspacing="0">
 <tr>
        <td height="30" bgcolor="#EFF9FE"  style=" border-bottom:1px #C6E6F4 solid;border-top:1px #C6E6F4  solid;"><strong>&nbsp;&nbsp;升级提示</strong></td>
      </tr>
 <tr>
   <td  class="txt">
    ·本升级程序仅适用于74cms企业版 v<?php echo  $version_old ?> 升级到 74cms企业版 v<?php echo $version_new ?> <br />
	 ·如果您修改过网站程序文件,特别是数据库结构，请不要运行此程序，否则将会导致程序错误。<br />
·此次升级可能需要较长时间，升级整个过程是自动完成的，升级过程中不要关闭窗口！<br>
<span>·升级之前务必备份数据库资料,否则可能产生无法恢复的后果!<br /></span>
  ·当升级程序运行完成后，请删除(除data目录外)所有文件和文件夹，然后上传<?php echo $version_new ?>覆盖所有文件和文件夹。<br> 
  ·当升级程序运行完成后，请给相关文件夹或文件设置读写权限,详细请看《升级必读》<br> 
 ·升级完毕后请务必删除此文件!<br>
   ·如果您使用的不是官方默认模版，升级后可能出现页面空白，请在后台将模版设置成为官方默认模版。<br>
  ·升级遇到问题请联系骑士客服处理!<br>

  </td>
 </tr>
 <tr>
   <td align="center"   class="txt">
   <input type="button" value="我知道了"  onclick="window.location='?act=check'"/>   </td>
 </tr>
</table>
 

	  <?php }?>
	  <?php if ($step=="2") {?>
	    <table width="60%" border="0" align="center" cellpadding="0" cellspacing="0" id="update">

 <tr>
        <td height="30" bgcolor="#EFF9FE"  style=" border-bottom:1px  #C6E6F4  solid;border-top:1px #C6E6F4  solid;"><strong>&nbsp;&nbsp;目录权限检查</strong></td>
      </tr>
 <tr>
   <td   >
   
   
   
   
     <table width="100%" border="0" cellspacing="0" cellpadding="3">
          <tr>
            <td width="200" height="30"   style="border-bottom:1px  #CADFF0 solid; padding-left:20px;"><strong>目录</strong></td>
            <td align="center" style="border-bottom:1px #CADFF0 solid"><strong>读取权限</strong></td>
            <td align="center" style="border-bottom:1px #CADFF0 solid"><strong>写入权限</strong></td>
          </tr>
		  <?php
		  foreach ($dir_check as $val)
		  {
		  ?>
          <tr>
            <td style="padding-left:20px;" height="23"><?php echo $val['dir']?></td>
            <td align="center"><?php echo $val['read']?></td>
            <td align="center"><?php echo $val['write']?></td>
          </tr>
		  <?php }?>
      </table>
		<div align="center"  style="color:#FF0000; margin-top:15px; margin-bottom:10px;">
	如果您已确认以上目录权限正常,请点击开始升级，升级过程中请不要关闭窗口<br /><br />

<input type="button" value="下一步"   onclick="window.location='?step=3'"  id="BTNupdate"/>
		</div>
   
   
   <!--<input type="button" value="开始升级"  onclick="window.location='?act=update'" id="BTNupdate"/> -->
   
   
   </td>
 </tr>
</table>
 
 <?php }?> 
   <?php if ($step=="3") {?>
	    <table width="60%" border="0" align="center" cellpadding="0" cellspacing="0" id="update">

 <tr>
        <td height="30" bgcolor="#EFF9FE"  style=" border-bottom:1px  #C6E6F4  solid;border-top:1px #C6E6F4  solid;"><strong>&nbsp;&nbsp;请输入商业用户授权码</strong></td>
      </tr>
 <tr>
   <td   >
   <br /><br />
     
     <form id="form1" name="form1" method="post" action="index.php?act=update">
	  <div align="center"  style="color:#FF0000; margin-top:15px; margin-bottom:10px;">
	  <table width="500" border="0" align="center" cellpadding="0" cellspacing="5">
       <tr>
         <td width="180" align="right">请输入您的授权码：</td>
         <td align="left"><label>
             <input name="key" type="text" id="key" size="30" />
         </label></td>
       </tr>
     </table>
	如果您不知道您的授权码，请找骑士客服获取。每个版本升级授权码只可以使用1次，遇到问题请及时联系骑士客服处理。
	<br />
	点击开始升级，升级过程中请不要关闭窗口<br /><br />

<input name="提交" type="submit"    value="开始升级"  id="BTNupdate"/>
	  </div>
   
   
    
      </form>
      <!--<input type="button" value="开始升级"  onclick="window.location='?act=update'" id="BTNupdate"/> -->
   
   
   </td>
 </tr>
</table>
<table width="60%" border="0" align="center" cellpadding="0" cellspacing="0" style=" display:none;" id="updatewait">

 <tr>
        <td height="30" bgcolor="#EFF9FE"  style=" border-bottom:1px  #C6E6F4  solid;border-top:1px #C6E6F4  solid;"><strong>&nbsp;&nbsp;升级中</strong></td>
  </tr>
 <tr>
   <td align="center"  style="color:#009900"   >
   
   <br />
   <img src="images/30.gif" />   <br />
   <br />
   正在升级，请不要关闭窗口</td>
 </tr>
</table>
<script type="text/javascript"> 
$(document).ready(function()
{
 		$("#BTNupdate").click(function(){
		$("#update").hide();
		$("#updatewait").show();
				 
				});	
});
</script>
 <?php }?> 
<?php if ($step=="4")
 {
 ?>
	    <table width="60%" border="0" align="center" cellpadding="0" cellspacing="0"  >

 <tr>
        <td height="30" bgcolor="#EFF9FE"  style=" border-bottom:1px  #C6E6F4  solid;border-top:1px #C6E6F4  solid;"><strong>&nbsp;&nbsp;升级成功</strong></td>
      </tr>
 <tr>
   <td align="center"  style="color: #FF0000"   >
   
   <br />
   <br />
  恭喜，数据库升级成功！请上传骑士人才系统<?php echo $version_new?>文件，覆盖<?php echo $version_old?>完成升级,升级后请登录后台更新缓存！</td>
 </tr>
</table>
	    <?php
		 }
		 ?>	
</body>
</html>
<?php
function runquery($query)
{
	global $db, $pre;
	$query = str_replace("\r\n", "\n",$query);
	$query = str_replace("\r", "\n", str_replace(' qs_', ' '.$pre, $query));
	$query = str_replace("AS a,qs_", "AS a,".$pre,$query);
	$expquery = explode(";\n", $query);
	foreach($expquery as $sql)
	{
		$sql = trim($sql);
		if($sql == '' || $sql[0] == '#') continue;
		if(strtoupper(substr($sql, 0, 12)) == 'CREATE TABLE')
		{
		$db->query(createtable($sql, QISHI_DBCHARSET));
		}
		else
		{
		$db->query($sql);
		}
	}
	return true;
}
function createtable($sql, $dbcharset)
{
	$type = strtoupper(preg_replace("/^\s*CREATE TABLE\s+.+\s+\(.+?\).*(ENGINE|TYPE)\s*=\s*([a-z]+?).*$/isU", "\\2", $sql));
	$type = in_array($type, array('MYISAM', 'HEAP')) ? $type : 'MYISAM';
	return preg_replace("/^\s*(CREATE TABLE\s+.+\s+\(.+?\)).*$/isU", "\\1", $sql).
		(mysql_get_server_info() > '4.1' ? " ENGINE=$type DEFAULT CHARSET=$dbcharset" : " TYPE=$type");
}
function check_dirs($dirs)
{
    $checked_dirs = array();
    foreach ($dirs AS $k=> $dir)
    {
	$checked_dirs[$k]['dir'] = $dir;
        if (!file_exists(QISHI_ROOT_PATH .'/'. $dir))
        {
            $checked_dirs[$k]['read'] = '<span style="color:red;">目录不存在</span>';
			$checked_dirs[$k]['write'] = '<span style="color:red;">目录不存在</span>';
        }
		else
		{		
        if (is_readable(QISHI_ROOT_PATH.'/'.$dir))
        {
            $checked_dirs[$k]['read'] = '<span style="color:green;">√可读</span>';
        }else{
            $checked_dirs[$k]['read'] = '<span sylt="color:red;">×不可读</span>';
        }
        if(is_writable(QISHI_ROOT_PATH.'/'.$dir)){
        	$checked_dirs[$k]['write'] = '<span style="color:green;">√可写</span>';
        }else{
        	$checked_dirs[$k]['write'] = '<span style="color:red;">×不可写</span>';
        }
		}
    }
    return $checked_dirs;
}  
function updataopen($url,$limit = 0, $post = '', $cookie = '', $bysocket = FALSE	, $ip = '', $timeout = 15, $block = TRUE, $encodetype  = 'URLENCOD')
{
		$return = '';
		$matches = parse_url($url);
		$host = $matches['host'];
		$path = $matches['path'] ? $matches['path'].($matches['query'] ? '?'.$matches['query'] : '') : '/';
		$port = !empty($matches['port']) ? $matches['port'] : 80;

		if($post) {
			$out = "POST $path HTTP/1.0\r\n";
			$out .= "Accept: */*\r\n";
			//$out .= "Referer: $boardurl\r\n";
			$out .= "Accept-Language: zh-cn\r\n";
			$boundary = $encodetype == 'URLENCODE' ? '' : ';'.substr($post, 0, trim(strpos($post, "\n")));
			$out .= $encodetype == 'URLENCODE' ? "Content-Type: application/x-www-form-urlencoded\r\n" : "Content-Type: multipart/form-data$boundary\r\n";
			$out .= "User-Agent: $_SERVER[HTTP_USER_AGENT]\r\n";
			$out .= "Host: $host:$port\r\n";
			$out .= 'Content-Length: '.strlen($post)."\r\n";
			$out .= "Connection: Close\r\n";
			$out .= "Cache-Control: no-cache\r\n";
			$out .= "Cookie: $cookie\r\n\r\n";
			$out .= $post;
		} else {
			$out = "GET $path HTTP/1.0\r\n";
			$out .= "Accept: */*\r\n";
			//$out .= "Referer: $boardurl\r\n";
			$out .= "Accept-Language: zh-cn\r\n";
			$out .= "User-Agent: $_SERVER[HTTP_USER_AGENT]\r\n";
			$out .= "Host: $host:$port\r\n";
			$out .= "Connection: Close\r\n";
			$out .= "Cookie: $cookie\r\n\r\n";
		}

		if(function_exists('fsockopen')) {
			$fp = @fsockopen(($ip ? $ip : $host), $port, $errno, $errstr, $timeout);
		} elseif (function_exists('pfsockopen')) {
			$fp = @pfsockopen(($ip ? $ip : $host), $port, $errno, $errstr, $timeout);
		} else {
			$fp = false;
		}

		if(!$fp) {
			return '';
		} else {
			stream_set_blocking($fp, $block);
			stream_set_timeout($fp, $timeout);
			@fwrite($fp, $out);
			$status = stream_get_meta_data($fp);
			if(!$status['timed_out']) {
				while (!feof($fp)) {
					if(($header = @fgets($fp)) && ($header == "\r\n" ||  $header == "\n")) {
						break;
					}
				}

				$stop = false;
				while(!feof($fp) && !$stop) {
					$data = fread($fp, ($limit == 0 || $limit > 8192 ? 8192 : $limit));
					$return .= $data;
					if($limit) {
						$limit -= strlen($data);
						$stop = $limit <= 0;
					}
				}
			}
			@fclose($fp);
			return $return;
		}
}
function update_inserttable($tablename, $insertsqlarr, $returnid=0, $replace = false, $silent=0) {
	global $db;
	$insertkeysql = $insertvaluesql = $comma = '';
	foreach ($insertsqlarr as $insert_key => $insert_value) {
		$insertkeysql .= $comma.'`'.$insert_key.'`';
		$insertvaluesql .= $comma.'\''.addslashes($insert_value).'\'';
		$comma = ', ';
	}
	$method = $replace?'REPLACE':'INSERT';
	$state = $db->query($method." INTO $tablename ($insertkeysql) VALUES ($insertvaluesql)", $silent?'SILENT':'');
	if($returnid && !$replace) {
		return $db->insert_id();
	}else {
	    return $state;
	} 
}
function update_updatetable($tablename, $setsqlarr, $wheresqlarr, $silent=0) {
	global $db;
	$setsql = $comma = '';
	foreach ($setsqlarr as $set_key => $set_value) {
		if(is_array($set_value)) {
			$setsql .= $comma.'`'.$set_key.'`'.'='.$set_value[0];
		} else {
			$setsql .= $comma.'`'.$set_key.'`'.'=\''.$set_value.'\'';
		}
		$comma = ', ';
	}
	$where = $comma = '';
	if(empty($wheresqlarr)) {
		$where = '1';
	} elseif(is_array($wheresqlarr)) {
		foreach ($wheresqlarr as $key => $value) {
			$where .= $comma.'`'.$key.'`'.'=\''.$value.'\'';
			$comma = ' AND ';
		}
	} else {
		$where = $wheresqlarr;
	}
	return $db->query("UPDATE ".($tablename)." SET ".$setsql." WHERE ".$where, $silent?"SILENT":"");
}
?>