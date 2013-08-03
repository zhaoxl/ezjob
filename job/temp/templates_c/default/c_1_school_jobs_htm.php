<?php require_once('/Users/zhaoxiaolong/php_work/ezjob/job/include/template_lite/plugins/function.qishi_pageinfo.php'); $this->register_function("qishi_pageinfo", "tpl_function_qishi_pageinfo",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2013-08-03 23:33 CST */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" /><?php echo tpl_function_qishi_pageinfo(array('set' => "列表名:page,调用:QS_jobs"), $this);?>
<title><?php echo $this->_vars['page']['title']; ?>
</title>
<meta name="description" content="<?php echo $this->_vars['page']['description']; ?>
">
<meta name="keywords" content="<?php echo $this->_vars['page']['keywords']; ?>
">
<meta name="author" content="骑士CMS" />
<meta name="copyright" content="74cms.com" />
<meta http-equiv="X-UA-Compatible" content="IE=7">
<link rel="shortcut icon" href="<?php echo $this->_vars['QISHI']['site_dir']; ?>
favicon.ico" />
<link href="<?php echo $this->_vars['QISHI']['site_template']; ?>
css/common.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_vars['QISHI']['site_template']; ?>
css/school_jobs.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $this->_vars['QISHI']['site_template']; ?>
js/jquery.js" type='text/javascript' ></script>
<script src="<?php echo $this->_vars['QISHI']['site_dir']; ?>
data/cache_classify.js" type='text/javascript' charset="utf-8"></script>
</head>
<body>
<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("header.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
<div id="school_jobs_body">
  <div id="adv_job_search">
    <div class="step step_trade">
      <input type="text" class="input2" />
    </div>
    <div class="step step_category">
      <input type="text" class="input2" />
    </div>
    <div class="step step_address">
      <input type="text" class="input1" />
    </div>
    <div class="step step_key">
      <input type="text" class="input_key_type" />
      <input type="text" class="input3" />
    </div>
    <div class="step step_date">
      <input type="text" class="input1" />
    </div>
    <input type="submit" class="submit" value=""/>
    <a href="#" class="reset">清空条件</a>
  </div>
  <div class="clear"></div>
  <div class="practice_base">
    <div class="title">
      易聘实习基地
    </div>
    <div class="list">
      <ul>
        <li><a href="#"><img src="/templates/default/images/school-jobs-temp_1.jpg" /></a></li>
        <li><a href="#"><img src="/templates/default/images/school-jobs-temp_2.jpg" /></a></li>
        <li><a href="#"><img src="/templates/default/images/school-jobs-temp_1.jpg" /></a></li>
        <li><a href="#"><img src="/templates/default/images/school-jobs-temp_2.jpg" /></a></li>
        <li><a href="#"><img src="/templates/default/images/school-jobs-temp_2.jpg" /></a></li>
        <li><a href="#"><img src="/templates/default/images/school-jobs-temp_1.jpg" /></a></li>
        <li><a href="#"><img src="/templates/default/images/school-jobs-temp_2.jpg" /></a></li>
        <li><a href="#"><img src="/templates/default/images/school-jobs-temp_1.jpg" /></a></li>
        <li><a href="#"><img src="/templates/default/images/school-jobs-temp_2.jpg" /></a></li>
      </ul>
    </div>
    <div class="clear"></div>
  </div>
  <div class="right_ad">
    <div class="title"></div>
    <div class="body">
      <a href="#"><img src="/templates/default/images/school_jobs-right-ad-1.jpg" /></a>
      <div class="tel">
        联系电话：010-1234567890
      </div>
      <div class="article">
        <a href="#">职慧卡能干什么？ | 我可以申请职慧卡</a>
        <a href="#">职慧卡能干什么？ | 我可以申请职慧卡</a>
      </div>
    </div>
  </div>
  <div class="clear"></div>
  
  
  
  
</div>
<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("footer.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
</body>
</html>
