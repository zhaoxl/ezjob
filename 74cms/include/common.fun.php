<?php
 /*
 * 74cms 共用函数
 * ============================================================================
 * 版权所有: 骑士网络，并保留所有权利。
 * 网站地址: http://www.74cms.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
*/
if(!defined('IN_QISHI')) die('Access Denied!');
function addslashes_deep($value)
{
    if (empty($value))
    {
        return $value;
    }
    else
    {
		if (!get_magic_quotes_gpc())
		{
		$value=is_array($value) ? array_map('addslashes_deep', $value) : addslashes($value);
		}
		$value=is_array($value) ? array_map('addslashes_deep', $value) : mystrip_tags($value);
		return $value;
    }
}
function mystrip_tags($string)
{
	$string = str_replace(array('&amp;', '&quot;', '&lt;', '&gt;'), array('&', '"', '<', '>'), $string);
	$string = strip_tags($string);
	return $string;
}
function table($table)
{
 	global $pre;
    return $pre .$table ;
}
function showmsg($msg_detail, $msg_type = 0, $links = array(), $auto_redirect = true,$seconds=3)
{
	global $smarty;
    if (count($links) == 0)
    {
        $links[0]['text'] = '返回上一页';
        $links[0]['href'] = 'javascript:history.go(-1)';
    }
   $smarty->assign('ur_here',     '系统提示');
   $smarty->assign('msg_detail',  $msg_detail);
   $smarty->assign('msg_type',    $msg_type);
   $smarty->assign('links',       $links);
   $smarty->assign('default_url', $links[0]['href']);
   $smarty->assign('auto_redirect', $auto_redirect);
   $smarty->assign('seconds', $seconds);
   $smarty->display('showmsg.htm');
exit;
}
function get_smarty_request($str)
{
$str=rawurldecode($str);
$strtrim=rtrim($str,']');
	if (substr($strtrim,0,4)=='GET[')
	{
	$getkey=substr($strtrim,4);
	return $_GET[$getkey];
	}
	elseif (substr($strtrim,0,5)=='POST[')
	{
	$getkey=substr($strtrim,5);
	return $_POST[$getkey];
	}
	else
	{
	return $str;
	}
}
function get_cache($cachename)
{
	$cache_file_path =QISHI_ROOT_PATH. "data/cache_".$cachename.".php";
	@include($cache_file_path);
	return $data;
}
function exectime(){ 
	$time = explode(" ", microtime());
	$usec = (double)$time[0]; 
	$sec = (double)$time[1]; 
	return $sec + $usec; 
}
function check_word($noword,$content)
{
	$word=explode('|',$noword);
	if (!empty($word) && !empty($content))
	{
		foreach($word as $str)
		{
			if(!empty($str) && strstr($content,$str))
			{
			return true;
			}

		}
	}
	return false;
}
function getip()
{
	if (getenv('HTTP_CLIENT_IP') and strcasecmp(getenv('HTTP_CLIENT_IP'),'unknown')) {
		$onlineip=getenv('HTTP_CLIENT_IP');
	}elseif (getenv('HTTP_X_FORWARDED_FOR') and strcasecmp(getenv('HTTP_X_FORWARDED_FOR'),'unknown')) {
		$onlineip=getenv('HTTP_X_FORWARDED_FOR');
	}elseif (getenv('REMOTE_ADDR') and strcasecmp(getenv('REMOTE_ADDR'),'unknown')) {
		$onlineip=getenv('REMOTE_ADDR');
	}elseif (isset($_SERVER['REMOTE_ADDR']) and $_SERVER['REMOTE_ADDR'] and strcasecmp($_SERVER['REMOTE_ADDR'],'unknown')) {
		$onlineip=$_SERVER['REMOTE_ADDR'];
	}
	preg_match("/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/",$onlineip,$match);
	return $onlineip = $match[0] ? $match[0] : 'unknown';
}
function inserttable($tablename, $insertsqlarr, $returnid=0, $replace = false, $silent=0) {
	global $db;
	$insertkeysql = $insertvaluesql = $comma = '';
	foreach ($insertsqlarr as $insert_key => $insert_value) {
		$insertkeysql .= $comma.'`'.$insert_key.'`';
		$insertvaluesql .= $comma.'\''.$insert_value.'\'';
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
function updatetable($tablename, $setsqlarr, $wheresqlarr, $silent=0) {
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
function wheresql($wherearr='')
{
	$wheresql="";
	if (is_array($wherearr))
		{
		$where_set=' WHERE ';
			foreach ($wherearr as $key => $value)
			{
			$wheresql .=$where_set. $comma.$key.'="'.$value.'"';
			$comma = ' AND ';
			$where_set=' ';
			}
		}
	return $wheresql;
}
function convert_datefm ($date,$format,$separator="-")
{
	 if ($format=="1")
	 {
	 return date("Y-m-d", $date);
	 }
	 else
	 {
		if (!preg_match("/^[0-9]{4}(\\".$separator.")[0-9]{1,2}(\\1)[0-9]{1,2}(|\s+[0-9]{1,2}(|:[0-9]{1,2}(|:[0-9]{1,2})))$/",$date))  return false;
		$date=explode($separator,$date);
		return mktime(0,0,0,$date[1],$date[2],$date[0]);
	 }
}
function sub_day($endday,$staday,$range='')
{
	$value = $endday - $staday;
	if($value < 0)
	{
		return '';
	}
	elseif($value >= 0 && $value < 59)
	{
		return ($value+1)."秒";
	}
	elseif($value >= 60 && $value < 3600)
	{
		$min = intval($value / 60);
		return $min."分钟";
	}
	elseif($value >=3600 && $value < 86400)
	{
		$h = intval($value / 3600);
		return $h."小时";
	}
	elseif($value >= 86400 && $value < 86400*30)
	{
		$d = intval($value / 86400);
		return intval($d)."天";
	}
	elseif($value >= 86400*30 && $value < 86400*30*12)
	{
		$mon  = intval($value / (86400*30));
		return $mon."月";
	}
	else{	
		$y = intval($value / (86400*30*12));
		return $y."年";
	}
}
function daterange($endday,$staday,$format='Y-m-d',$color='',$range=3)
{
	$value = $endday - $staday;
	if($value < 0)
	{
		return '';
	}
	elseif($value >= 0 && $value < 59)
	{
		$return=($value+1)."秒前";
	}
	elseif($value >= 60 && $value < 3600)
	{
		$min = intval($value / 60);
		$return=$min."分钟前";
	}
	elseif($value >=3600 && $value < 86400)
	{
		$h = intval($value / 3600);
		$return=$h."小时前";
	}
	elseif($value >= 86400)
	{
		$d = intval($value / 86400);
		if ($d>$range)
		{
		return date($format,$staday);
		}
		else
		{
		$return=$d."天前";
		}
	}
	if ($color)
	{
	$return="<span style=\"color:{$color}\">".$return."</span>";
	}
	return $return;	 
}
function cut_str($string, $length, $start=0,$dot='') 
{
		$length=$length*2;
		if(strlen($string) <= $length) {
			return $string;
		}
		$string = str_replace(array('&amp;', '&quot;', '&lt;', '&gt;'), array('&', '"', '<', '>'), $string);
		$strcut = '';	 
			for($i = 0; $i < $length; $i++) {
				$strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
			}
		$strcut = str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $strcut);
		return $strcut.$dot;
}
function smtp_mail($sendto_email,$subject,$body,$From='',$FromName='')
{	
	global $_CFG;
	require_once(QISHI_ROOT_PATH.'phpmailer/class.phpmailer.php');
	$mail = new PHPMailer();
	$mailconfig=get_cache('mailconfig');
	$mailconfig['smtpservers']=explode('|-_-|',$mailconfig['smtpservers']);
	$mailconfig['smtpusername']=explode('|-_-|',$mailconfig['smtpusername']);
	$mailconfig['smtppassword']=explode('|-_-|',$mailconfig['smtppassword']);
	$mailconfig['smtpfrom']=explode('|-_-|',$mailconfig['smtpfrom']);
	$mailconfig['smtpport']=explode('|-_-|',$mailconfig['smtpport']);
	for ($i=0; $i<count($mailconfig['smtpservers']); $i++)
	{
	$mailconfigarray[]=array('smtpservers'=>$mailconfig['smtpservers'][$i],'smtpusername'=>$mailconfig['smtpusername'][$i],'smtppassword'=>$mailconfig['smtppassword'][$i],'smtpfrom'=>$mailconfig['smtpfrom'][$i],'smtpport'=>$mailconfig['smtpport'][$i]);
	}
	$mc=array_rand($mailconfigarray,1);
	$mc=$mailconfigarray[$mc];
	$mailconfig['smtpservers']=$mc['smtpservers'];
	$mailconfig['smtpusername']=$mc['smtpusername'];
	$mailconfig['smtppassword']=$mc['smtppassword'];
	$mailconfig['smtpfrom']=$mc['smtpfrom'];
	$mailconfig['smtpport']=$mc['smtpport'];
	$From=$From?$From:$mailconfig['smtpfrom'];
	$FromName=$FromName?$FromName:$_CFG['site_name'];
	if ($mailconfig['method']=="1")
	{
		if (empty($mailconfig['smtpservers']) || empty($mailconfig['smtpusername']) || empty($mailconfig['smtppassword']) || empty($mailconfig['smtpfrom']))
		{
		write_syslog(2,'MAIL',"邮件配置信息不完整");
		return false;
		}
	$mail->IsSMTP();
	$mail->Host = $mailconfig['smtpservers'];
	$mail->SMTPDebug= 0; 
	$mail->SMTPAuth = true;
	$mail->Username = $mailconfig['smtpusername']; 
	$mail->Password = $mailconfig['smtppassword']; 
	$mail->Port =$mailconfig['smtpport'];
	$mail->From =$mailconfig['smtpfrom']; 
	$mail->FromName =$FromName;
	}
	elseif($mailconfig['method']=="2")
	{
	$mail->IsSendmail();
	}
	elseif($mailconfig['method']=="3")
	{
	$mail->IsMail();
	}
	$mail->CharSet = QISHI_CHARSET;
	$mail->Encoding = "base64";
	$mail->AddReplyTo($From,$FromName);
	$mail->AddAddress($sendto_email,"");
	$mail->IsHTML(true);
	$mail->Subject = $subject;
	$mail->Body =$body;
	$mail->AltBody ="text/html";
	if($mail->Send())  
	{
	return true;
	}
	else
	{
	write_syslog(2,'MAIL',$mail->ErrorInfo);
	return false;
	}
}
function dfopen($url,$limit = 0, $post = '', $cookie = '', $bysocket = FALSE	, $ip = '', $timeout = 15, $block = TRUE, $encodetype  = 'URLENCOD')
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
function send_sms($mobile,$content)
{
	global $db;
	$sms=get_cache('sms_config');
	if ($sms['open']!="1" || empty($sms['sms_name']) || empty($sms['sms_key']) || empty($mobile) || empty($content))
	{
	return false;
	}
	else
	{
	return dfopen("http://www.74cms.com/SMSsend.php?sms_name={$sms['sms_name']}&sms_key={$sms['sms_key']}&mobile={$mobile}&content={$content}");
	}	
}
function execution_crons()
{
	global $db;
	$crons=$db->getone("select * from ".table('crons')." WHERE (nextrun<".time()." OR nextrun=0) AND available=1 LIMIT 1  ");
	if (!empty($crons))
	{
		require_once(QISHI_ROOT_PATH."include/crons/".$crons['filename']);
	}
}
function get_tpl($type,$id)
{
	global $db,$_CFG,$smarty;
	$id=intval($id);
	$tarr=array("jobs","company_profile","resume","companycommentshow","companynewsshow");
	if (!in_array($type,$tarr)) exit();
	if ($type=='companynewsshow')
	{
	$utpl=$db->getone("SELECT p.tpl FROM ".table('company_news')."  AS c LEFT JOIN ".table('company_profile')."  AS p ON c.company_id=p.id WHERE c.id='{$id}' limit 1");
	}
	else
	{
	$utpl=$db->getone("SELECT tpl FROM ".table($type)." WHERE id='{$id}' limit 1");
	}
	$thistpl=$utpl['tpl'];
	if (!empty($_GET['style']))
	{
	$thistpl=$_GET['style'];
	}
	if (empty($thistpl))
	{
		if ($type=='resume')
		{
		$thistpl="../tpl_resume/{$_CFG['tpl_personal']}/";
		$smarty->assign('user_tpl',$_CFG['site_dir']."templates/tpl_resume/{$_CFG['tpl_personal']}/");
		return $thistpl;
		}
		else
		{
		$thistpl="../tpl_company/{$_CFG['tpl_company']}/";
		$smarty->assign('user_tpl',$_CFG['site_dir']."templates/tpl_company/{$_CFG['tpl_company']}/");
		return $thistpl;
		}
	}
	else
	{
		if ($type=='resume')
		{
		$smarty->assign('user_tpl',$_CFG['site_dir']."templates/tpl_resume/{$thistpl}/");
		return "../tpl_resume/{$thistpl}/";
		}
		else
		{
		$smarty->assign('user_tpl',$_CFG['site_dir']."templates/tpl_company/{$thistpl}/");
		return "../tpl_company/{$thistpl}/";
		}		
	}	
}
function url_rewrite($alias=NULL,$get=NULL,$rewrite=true)
{
	global $_CFG,$_PAGE;
	$url ='';
	if ($_PAGE[$alias]['url']=='0' || $rewrite==false)//原始链接
	{
			if (!empty($get))
			{
				foreach($get as $k=>$v)
				{
				$url .="{$k}={$v}&";
				}
			}
			$url=!empty($url)?"?".rtrim($url,'&'):'';
			return $_CFG['site_dir'].$_PAGE[$alias]['file'].$url;
	}
	else 
	{
			$url =$_CFG['site_dir'].$_PAGE[$alias]['rewrite'];
			if ($_PAGE[$alias]['pagetpye']=='2' && empty($get['page']))
			{
			$get['page']=1;
			}
			foreach($get as $k=>$v)
			{
			$url=str_replace('($'.$k.')',$v,$url);
			}
			return preg_replace('/\(\$(.+?)\)/','',$url);
	}
}
function get_member_url($type,$dirname=false)
{
	global $_CFG;
	$type=intval($type);
	if ($type===0) 
	{
	return "";
	}
	elseif ($type===1)
	{
	$return=$_CFG['site_dir']."user/company/company_index.php";
	}
	elseif ($type===2) 
	{
	$return=$_CFG['site_dir']."user/personal/personal_index.php";
	}
	if ($dirname)
	{
	return dirname($return).'/';
	}
	else
	{
	return $return;
	}
}
function subsiteinfo(&$_CFG)
{
	if ($_CFG['subsite']=="0")
	{
	return false;
	}
	else
	{
		$_SUBSITE=get_cache('subsite');
			foreach($_SUBSITE as $key=> $sub)
			{
			$_CFG['district_array'][]=array('subsite'=>$sub['districtname'],'url'=>"http://".$key);
			}
		$host=$_SERVER['HTTP_HOST'];
		if (array_key_exists($host,$_SUBSITE))
		{
			$subsite=$_SUBSITE[$host];
			$_CFG['site_domain']="http://".$host;
			$_CFG['subsite_districtname']=$subsite['districtname'];
			$_CFG['site_name']=$subsite['sitename'];
			if (empty($_GET['district_cn']))
			{
			$_GET['district_cn']=$_CFG['subsite_districtname'];
			}
			$_CFG['subsite_id']=$subsite['id'];
			$subsite['logo']?$_CFG['web_logo']=$subsite['logo']:'';
			$subsite['tpl']?$_CFG['template_dir']=$subsite['tpl'].'/':'';
			$subsite['filter_notice']?$_CFG['subsite_filter_notice']=$subsite['filter_notice']:'';
			$subsite['filter_jobs']?$_CFG['subsite_filter_jobs']=$subsite['filter_jobs']:'';
			$subsite['filter_resume']?$_CFG['subsite_filter_resume']=$subsite['filter_resume']:'';
			$subsite['filter_ad']?$_CFG['subsite_filter_ad']=$subsite['filter_ad']:'';
			$subsite['filter_links']?$_CFG['subsite_filter_links']=$subsite['filter_links']:'';
			$subsite['filter_news']?$_CFG['subsite_filter_news']=$subsite['filter_news']:'';
			$subsite['filter_explain']?$_CFG['subsite_filter_explain']=$subsite['filter_explain']:'';
			$subsite['filter_jobfair']?$_CFG['subsite_filter_jobfair']=$subsite['filter_jobfair']:'';
			$subsite['filter_simple']?$_CFG['subsite_filter_simple']=$subsite['filter_simple']:'';
		}
	}
}
function fulltextpad($str)
{
	if (empty($str))
	{
	return '';
	}
	$leng=strlen($str);
	if ($leng>=8)
		{
		return $str;
	}
	else
	{
		$l=4-($leng/2);
		return str_pad($str,$leng+$l,'0');
	}
}
function asyn_userkey($uid)
{
	global $db;
	$sql = "select * from ".table('members')." where uid = '".intval($uid)."' LIMIT 1";
	$user=$db->getone($sql);
	return md5($user['username'].$user['pwd_hash'].$user['password']);
}
function write_syslog($type,$type_name,$str)
{
 	global $db,$online_ip;
	$l_page = addslashes(request_url());
	$str = addslashes($str);
 	$sql = "INSERT INTO ".table('syslog')." (l_type, l_type_name, l_time,l_ip,l_page,l_str) VALUES ('{$type}', '{$type_name}', '".time()."','{$online_ip}','{$l_page}','{$str}')"; 
	return $db->query($sql);
}
function write_memberslog($uid,$utype,$type,$username,$str)
{
 	global $db,$online_ip;
 	$sql = "INSERT INTO ".table('members_log')." (log_uid,log_username,log_utype,log_type,log_addtime,log_ip,log_value) VALUES ( '{$uid}','{$username}','{$utype}','{$type}', '".time()."','{$online_ip}','{$str}')";
	return $db->query($sql);
}
function request_url()
{     
  	if (isset($_SERVER['REQUEST_URI']))     
    {        
   	 $url = $_SERVER['REQUEST_URI'];    
    }
	else
	{    
		  if (isset($_SERVER['argv']))        
			{           
			$url = $_SERVER['PHP_SELF'] .'?'. $_SERVER['argv'][0];      
			}         
		  else        
			{          
			$url = $_SERVER['PHP_SELF'] .'?'.$_SERVER['QUERY_STRING'];
			}  
    }    
    return urlencode($url); 
}
function label_replace($templates)
{
	global $_CFG;
	$templates=str_replace('{sitename}',$_CFG['site_name'],$templates);
	$templates=str_replace('{sitedomain}',$_CFG['site_domain'].$_CFG['site_dir'],$templates);
	$templates=str_replace('{username}',$_GET['sendusername'],$templates);
	$templates=str_replace('{password}',$_GET['sendpassword'],$templates);
	$templates=str_replace('{newpassword}',$_GET['newpassword'],$templates);
	$templates=str_replace('{personalfullname}',$_GET['personal_fullname'],$templates);
	$templates=str_replace('{jobsname}',$_GET['jobs_name'],$templates);
	$templates=str_replace('{companyname}',$_GET['companyname'],$templates);
	$templates=str_replace('{paymenttpye}',$_GET['paymenttpye'],$templates);
	$templates=str_replace('{amount}',$_GET['amount'],$templates);
	$templates=str_replace('{oid}',$_GET['oid'],$templates);
	return $templates;
}
function make_dir($path)
{ 
	if(!file_exists($path))
	{
	make_dir(dirname($path));
	@mkdir($path,0777);
	@chmod($path,0777);
	}
}
?>