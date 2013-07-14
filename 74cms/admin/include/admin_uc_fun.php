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
 if(!defined('IN_QISHI'))
 {
 	die('Access Denied!');
 }
function uc_open($url, $limit = 0, $post = '', $cookie = '', $bysocket = FALSE, $ip = '', $timeout = 15, $block = true)
{
	$return = '';
	$matches = parse_url($url);
	$host = $matches['host'];
	$path = $matches['path'] ? $matches['path'].($matches['query'] ? '?'.$matches['query'] : '') : '/';
	$port = !empty($matches['port']) ? $matches['port'] : 80;
	if($post)
	{
		$out = "POST $path HTTP/1.0\r\n";
		$out .= "Accept: */*\r\n";
		$out .= "Accept-Language: zh-cn\r\n";
		$out .= "Content-Type: application/x-www-form-urlencoded\r\n";
		$out .= "User-Agent: $_SERVER[HTTP_USER_AGENT]\r\n";
		$out .= "Host: $host\r\n";
		$out .= 'Content-Length: '.strlen($post)."\r\n";
		$out .= "Connection: Close\r\n";
		$out .= "Cache-Control: no-cache\r\n";
		$out .= "Cookie: $cookie\r\n\r\n";
		$out .= $post;
	}else{
		$out = "GET $path HTTP/1.0\r\n";
		$out .= "Accept: */*\r\n";
		$out .= "Accept-Language: zh-cn\r\n";
		$out .= "User-Agent: $_SERVER[HTTP_USER_AGENT]\r\n";
		$out .= "Host: $host\r\n";
		$out .= "Connection: Close\r\n";
		$out .= "Cookie: $cookie\r\n\r\n";
	}
    $fp = @fsockopen(($host ? $host : $ip), $port, $errno, $errstr, $timeout);
	if(!$fp)
	{
		return '';
	}else{
		stream_set_blocking($fp, $block);
		stream_set_timeout($fp, $timeout);
		@fwrite($fp,$out);
		$status = stream_get_meta_data($fp);
		if(!$status['timed_out'])
		{
			while (!feof($fp))
			{
				if(($header = @fgets($fp)) && ($header == "\r\n" ||  $header == "\n"))
				{
					break;
				}
			}

			$stop = false;
			while(!feof($fp) && !$stop)
			{
				$data = fread($fp, ($limit == 0 || $limit > 8192 ? 8192 : $limit));
				$return .= $data;
				if($limit)
				{
					$limit -= strlen($data);
					$stop = $limit <= 0;
				}
			}
		}
		@fclose($fp);
		return $return;
	}
}
function uc_write_config($config, $file)
{
	$success = false;
	if(!empty($config)){
		foreach ($config as $key =>$value){
			$$key=$value;
		}
	}
	//list($appauthkey, $appid, $ucdbhost, $ucdbname, $ucdbuser, $ucdbpw, $ucdbcharset, $uctablepre, $uccharset, $ucapi, $ucip) = explode('|', $config);
	if($content = file_get_contents($file))
	{
		$content = trim($content);
		$content = substr($content, -2) == '?>' ? substr($content, 0, -2) : $content;
		$link = mysql_connect($ucdbhost, $ucdbuser, $ucdbpw, 1);
		$uc_connnect = $link && mysql_select_db($ucdbname, $link) ? 'mysql' : '';
		$content = uc_insert_config($content, "/define\('UC_CONNECT',\s*'.*?'\);/i", "define('UC_CONNECT', '$uc_connnect');");
		$content = uc_insert_config($content, "/define\('UC_DBHOST',\s*'.*?'\);/i", "define('UC_DBHOST', '$ucdbhost');");
		$content = uc_insert_config($content, "/define\('UC_DBUSER',\s*'.*?'\);/i", "define('UC_DBUSER', '$ucdbuser');");
		$content = uc_insert_config($content, "/define\('UC_DBPW',\s*'.*?'\);/i", "define('UC_DBPW', '$ucdbpw');");
		$content = uc_insert_config($content, "/define\('UC_DBNAME',\s*'.*?'\);/i", "define('UC_DBNAME', '$ucdbname');");
		$content = uc_insert_config($content, "/define\('UC_DBCHARSET',\s*'.*?'\);/i", "define('UC_DBCHARSET', 'GBK');");
		$content = uc_insert_config($content, "/define\('UC_DBTABLEPRE',\s*'.*?'\);/i", "define('UC_DBTABLEPRE', '$ucdbtablepre');");
		$content = uc_insert_config($content, "/define\('UC_DBCONNECT',\s*'.*?'\);/i", "define('UC_DBCONNECT', '0');");
		$content = uc_insert_config($content, "/define\('UC_KEY',\s*'.*?'\);/i", "define('UC_KEY', '$uckey');");
		$content = uc_insert_config($content, "/define\('UC_API',\s*'.*?'\);/i", "define('UC_API', '$ucapi');");
		$content = uc_insert_config($content, "/define\('UC_CHARSET',\s*'.*?'\);/i", "define('UC_CHARSET', 'gb2312');");
		$content = uc_insert_config($content, "/define\('UC_IP',\s*'.*?'\);/i", "define('UC_IP', '$ucip');");
		$content = uc_insert_config($content, "/define\('UC_APPID',\s*'?.*?'?\);/i", "define('UC_APPID', '$appid');");
		$content = uc_insert_config($content, "/define\('UC_PPP',\s*'?.*?'?\);/i", "define('UC_PPP', '20');");
		$content .= "\r\n".'?>';
		
		if(@file_put_contents($file, $content))
		{
			$success = true;
		}
	}
	return $success;
}
function uc_insert_config($s, $find, $replace)
{
	if(preg_match($find, $s))
	{
		$s = preg_replace($find, $replace, $s);
	}else{
		$s .= "\r\n".$replace;
	}
	return $s;
}
?>