<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2013-07-23 18:17 CST */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta http-equiv="X-UA-Compatible" content="IE=7">
<link rel="shortcut icon" href="<?php echo $this->_vars['QISHI']['site_dir']; ?>
favicon.ico" />
<title>Powered by 74CMS</title>
<link href="css/common.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
$("li").first().addClass("hover");
$("li>a").click(function(){
	$("li").removeClass("hover");
	$(this).parent().addClass("hover");
	$(this).blur();
	})
})
</script>
</head>
<body>
<div class="admin_left_box">
<ul>
<li><a href="admin_set.php"  target="mainFrame"  >��վ����</a></li>
<li><a href="admin_set_com.php"  target="mainFrame"  >��ҵ���� </a></li>
<li><a href="admin_set_per.php"  target="mainFrame"  >�������� </a></li>
<li><a href="admin_set_simple.php"  target="mainFrame"  >΢��Ƹ </a></li>
<li><a href="admin_mail.php" target="mainFrame" >�ʼ�����</a></li>
<li><a href="admin_sms.php" target="mainFrame" >��������</a></li>
<li><a href="admin_safety.php" target="mainFrame"  >��ȫ����</a></li>
<li><a href="admin_set.php?act=search"  target="mainFrame">�������� </a></li>
<li><a href="admin_page.php" target="mainFrame"   >ҳ�����</a></li>
<li><a href="admin_nav.php" target="mainFrame"  >��������</a></li>
<li><a href="admin_category.php" target="mainFrame" >�������</a></li>
<li><a href="admin_subsite.php" target="mainFrame" >��վ����</a></li>
<li><a href="admin_hotword.php" target="mainFrame" >���Źؼ���</a></li>
<li><a href="admin_memberslog.php" target="mainFrame" >��Ա��־</a></li>
<li><a href="admin_syslog.php" target="mainFrame">ϵͳ������־</a></li>
</ul>
</div>
</body>
</html>