<?php require_once('/Users/zhaoxiaolong/php_work/ezjob/job/include/template_lite/plugins/modifier.date_format.php'); $this->register_modifier("date_format", "tpl_modifier_date_format",false);  require_once('/Users/zhaoxiaolong/php_work/ezjob/job/include/template_lite/plugins/function.qishi_jobs_list.php'); $this->register_function("qishi_jobs_list", "tpl_function_qishi_jobs_list",false);  require_once('/Users/zhaoxiaolong/php_work/ezjob/job/include/template_lite/plugins/function.qishi_pageinfo.php'); $this->register_function("qishi_pageinfo", "tpl_function_qishi_pageinfo",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2013-08-03 17:10 CST */ ?>
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
css/jobs.css" rel="stylesheet" type="text/css" />
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
<div id="jobs_body">
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
  <div class="job_list">
    <div class="title">
      <div class="field_count"></div>
      <input type="text" />
      <input type="text" />
      <input type="text" />
    </div>
    <div class="title_right_border"></div>
    <div class="clear"></div>
    <div class="content">
      <table cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th><input type="checkbox" /></th>
            <th>职位名称</th>
            <th>公司名称</th>
            <th>学历要求</th>
            <th>工作经验</th>
            <th>刷新时间</th>
          </tr>
        </thead> 
        <tbody>
          <?php echo tpl_function_qishi_jobs_list(array('set' => "列表名:list,显示数目:8,分页显示:6,描述长度:105,填补字符:..."), $this);?>
        	<?php if (count((array)$this->_vars['list'])): foreach ((array)$this->_vars['list'] as $this->_vars['li']): ?>
          <tr>
            <th rowspan="3"><input type="checkbox" /></th>
            <th class="short job_name"><?php echo $this->_vars['li']['jobs_name']; ?>
</th>
            <td class="short"><?php echo $this->_vars['li']['companyname']; ?>
</td>
            <td class="short"><?php echo $this->_vars['li']['education_cn']; ?>
</td>
            <td class="short"><?php echo $this->_vars['li']['experience_cn']; ?>
</td>
            <td class="short"><?php echo $this->_run_modifier($this->_vars['li']['refreshtime'], 'date_format', 'plugin', 1, "%Y-%m-%d"); ?>
</td>
          </tr>
          <tr>
            <td colspan="4" class="info">招聘人数： <?php echo $this->_vars['li']['amount']; ?>
人 | 月薪： <?php echo $this->_vars['li']['wage_cn']; ?>
 | 职位性质：<?php echo $this->_vars['li']['nature_cn']; ?>
   | 工作地点：<?php echo $this->_vars['li']['district_cn']; ?>
</td>
            <td rowspan="2">
              <a href="<?php echo $this->_vars['li']['jobs_url']; ?>
" class="btn_show"></a>
              <a href="#" class="btn_apply"></a>
            </td>
          </tr>
          <tr>
            <td colspan="4" class="desc">职位描述：<?php echo $this->_vars['li']['briefly']; ?>
</td>
          </tr>
          <tr>
            <td colspan="6" class="bottom_border"></td>
          </tr>
        	<?php endforeach; endif; ?>
        </tbody>
      </table>
      <div id="pager">
        <?php echo $this->_vars['page']; ?>

      </div>
      <div class="clear"></div>
    </div>
  </div>
  <div class="company_list">
    <div class="company_box">
      <a href="#"><img src="../templates/default/images/jobs-company_list-1.jpg" /></a>
    </div>
    <div class="company_box">
      <a href="#"><img src="../templates/default/images/jobs-company_list-2.jpg" /></a>
    </div>
    <div class="company_box">
      <a href="#"><img src="../templates/default/images/jobs-company_list-3.jpg" /></a>
    </div>
    <div class="company_box">
      <a href="#"><img src="../templates/default/images/jobs-company_list-1.jpg" /></a>
    </div>
    <div class="company_box">
      <a href="#"><img src="../templates/default/images/jobs-company_list-2.jpg" /></a>
    </div>
    <div class="company_box">
      <a href="#"><img src="../templates/default/images/jobs-company_list-3.jpg" /></a>
    </div>
  </div>
  <div class="clear"></div>
  <div class="commend_list">
    <div class="commend_1_title"></div>
    <div class="commend_content">
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
    </div>
  </div>
  <div class="commend_list">
    <div class="commend_2_title"></div>
    <div class="commend_content">
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
    </div>
  </div>
  <div class="commend_list">
    <div class="commend_3_title"></div>
    <div class="commend_content">
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
      <a href="#">北京招聘</a>
    </div>
  </div>
  <div class="clear"></div>
  <div class="friend_link">
    <div class="title"></div>
    <div class="list_box">
      <a href="#">中国广州人事网</a>
      <a href="#">广州市军队转业干部服务平台</a>
      <a href="#">广州留学人员服务管理中心</a>
      <a href="#">广州市高校毕业生就业指导中心</a>
      <a href="#">广州考试信息网</a>
      <a href="#">广州市高校毕业生就业指导中心</a>
      <a href="#">山东人才网</a>
      <a href="#">中国济南人才网</a>
      <a href="#">烟台人才热线网</a>
      <a href="#">苏州人才网</a>
      <a href="#">苏州高新人才网</a>
      <a href="#">扬州人才网</a>
    </div>
</div>
<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("footer.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
</body>
</html>
