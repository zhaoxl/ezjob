<?php require_once('/Users/zhaoxiaolong/php_work/ezjob/job/include/template_lite/plugins/function.qishi_ad.php'); $this->register_function("qishi_ad", "tpl_function_qishi_ad",false);  require_once('/Users/zhaoxiaolong/php_work/ezjob/job/include/template_lite/plugins/function.qishi_link.php'); $this->register_function("qishi_link", "tpl_function_qishi_link",false);  require_once('/Users/zhaoxiaolong/php_work/ezjob/job/include/template_lite/plugins/function.qishi_companyjobs_list.php'); $this->register_function("qishi_companyjobs_list", "tpl_function_qishi_companyjobs_list",false);  require_once('/Users/zhaoxiaolong/php_work/ezjob/job/include/template_lite/plugins/modifier.date_format.php'); $this->register_modifier("date_format", "tpl_modifier_date_format",false);  require_once('/Users/zhaoxiaolong/php_work/ezjob/job/include/template_lite/plugins/function.qishi_news_list.php'); $this->register_function("qishi_news_list", "tpl_function_qishi_news_list",false);  require_once('/Users/zhaoxiaolong/php_work/ezjob/job/include/template_lite/plugins/function.qishi_jobs_list.php'); $this->register_function("qishi_jobs_list", "tpl_function_qishi_jobs_list",false);  require_once('/Users/zhaoxiaolong/php_work/ezjob/job/include/template_lite/plugins/function.qishi_get_classify.php'); $this->register_function("qishi_get_classify", "tpl_function_qishi_get_classify",false);  require_once('/Users/zhaoxiaolong/php_work/ezjob/job/include/template_lite/plugins/function.qishi_pageinfo.php'); $this->register_function("qishi_pageinfo", "tpl_function_qishi_pageinfo",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2013-08-04 00:20 CST */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" /><?php echo tpl_function_qishi_pageinfo(array('set' => "列表名:page,调用:QS_index"), $this);?>
<title><?php echo $this->_vars['page']['title']; ?>
</title>
<meta name="description" content="<?php echo $this->_vars['page']['description']; ?>
">
<meta name="keywords" content="<?php echo $this->_vars['page']['keywords']; ?>
">
<meta http-equiv="X-UA-Compatible" content="IE=7">
<link rel="shortcut icon" href="<?php echo $this->_vars['QISHI']['site_dir']; ?>
favicon.ico" />
<meta name="author" content="骑士CMS" />
<meta name="copyright" content="74cms.com" />
<link href="<?php echo $this->_vars['QISHI']['site_template']; ?>
css/common.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_vars['QISHI']['site_template']; ?>
css/default.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_vars['QISHI']['site_template']; ?>
css/index.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $this->_vars['QISHI']['site_template']; ?>
js/jquery-1.8.3.js" type='text/javascript' ></script>
<script src="<?php echo $this->_vars['QISHI']['site_template']; ?>
js/jquery.KinSlideshow.min.js" type="text/javascript"></script>
<script src="<?php echo $this->_vars['QISHI']['site_template']; ?>
js/jquery.lazyload.js" type="text/javascript"></script>
<script src="<?php echo $this->_vars['QISHI']['site_template']; ?>
js/jquery.comtip-min.js" type="text/javascript"></script>
<script src="<?php echo $this->_vars['QISHI']['site_template']; ?>
js/jquery.vtip-min.js" type='text/javascript' ></script>
<script src="<?php echo $this->_vars['QISHI']['site_template']; ?>
js/jquery.index.js" type='text/javascript' ></script>
<script src="<?php echo $this->_vars['QISHI']['site_template']; ?>
js/jquery.ui.core.js" type='text/javascript' ></script>
<script src="<?php echo $this->_vars['QISHI']['site_template']; ?>
js/jquery.ui.widget.js" type='text/javascript' ></script>
<script src="<?php echo $this->_vars['QISHI']['site_template']; ?>
js/jquery.ui.tabs.js" type='text/javascript' ></script>
<script src="<?php echo $this->_vars['QISHI']['site_template']; ?>
js/jquery.user.selectlayer.js" type='text/javascript' language="javascript"></script>
<script src="<?php echo $this->_vars['QISHI']['site_dir']; ?>
data/cache_classify.js" type='text/javascript' charset="utf-8"></script>
<script type="text/javascript"> 
$(document).ready(function()
{
	index("<?php echo $this->_vars['QISHI']['site_dir']; ?>
","<?php echo $this->_vars['QISHI']['site_template']; ?>
");
	//紧急招聘
				$(function(){
				var _wrap=$('#emergencybox');
				var _interval=2000;
				var _moving;
				_wrap.hover(function(){
				clearInterval(_moving);
				},function(){
				_moving=setInterval(function(){
				var _field=_wrap.find('div:first');
				var _h=_field.height();
				_field.animate({marginTop:-_h+'px'},600,function(){
				_field.css('marginTop',0).appendTo(_wrap);
				})
				},_interval)
				}).trigger('mouseleave');
				});
});
</script>
</head>
<body>
<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("header.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
<div id="index_body">
  <div class="index_banner">
    <img src="/templates/default/images/index_banner.jpg" width="593" height="320" alt="banner" />
  </div>
  <div id="login_panel" class="login">
    
  </div>
  <div class="clear"></div>
  <div class="search">
    <form id="Form1" action="/jobs/jobs-list.php">
      <script src="<?php echo $this->_vars['QISHI']['site_template']; ?>
js/jquery.autocomplete.js" type="text/javascript"></script>
      <div class="left_search_box">
        <input type="text" class="key" type="text" id="index-search-key" maxlength="25" value="请输入职位名称、公司名称<?php if ($this->_vars['QISHI']['jobsearch_type'] == '1'): ?>、技能特长、学校等<?php endif; ?>关键字..." />
        <div style="position: relative;">
          <input type="text" id="trade_cn" name="trade_cn" class="short_input industry" value="选择行业" readonly="readonly" />
        	<input name="trade" id="trade" type="hidden" value="<?php echo $this->_vars['company_profile']['trade']; ?>
" />
        	<div id="menu2" class="dmenu shadow">
        		<ul>
        		<?php echo tpl_function_qishi_get_classify(array('set' => "类型:QS_trade,列表名:c_trade"), $this); if (count((array)$this->_vars['c_trade'])): foreach ((array)$this->_vars['c_trade'] as $this->_vars['list']): ?>
        		<li id="<?php echo $this->_vars['list']['id']; ?>
" title="<?php echo $this->_vars['list']['categoryname']; ?>
"><?php echo $this->_vars['list']['categoryname']; ?>
</li>
        		<?php endforeach; endif; ?>
        		</ul>
        	</div>
        </div>
        <div style="position: relative;">
          <input type="text" id="category_cn" name="category_cn" class="short_input profession" value="选择职位" readonly="readonly" />
      		<input name="category" id="category" type="hidden" value="<?php echo $this->_vars['company_profile']['category']; ?>
" />
      		<div id="menu1" class="dmenu shadow">
      			<ul>
      			<?php echo tpl_function_qishi_get_classify(array('set' => "类型:QS_jobs,id:0,列表名:c_province"), $this); if (count((array)$this->_vars['c_province'])): foreach ((array)$this->_vars['c_province'] as $this->_vars['list']): ?>
      			<li id="<?php echo $this->_vars['list']['id']; ?>
" title="<?php echo $this->_vars['list']['categoryname']; ?>
"><?php echo $this->_vars['list']['categoryname']; ?>
</li>
      			<?php endforeach; endif; ?>
      			</ul>
      		</div>
      		<div id="menu3_s" class="dmenu shadow" style="display:none"></div>
        </div>
        <div style="position: relative;">
          <input type="text" id="district_cn" class="short_input city"  readonly="readonly" name="district_cn" value="城市频道" />
      		<input name="district" id="district" type="hidden" value="<?php echo $this->_vars['company_profile']['district']; ?>
" />
      		<input name="sdistrict" id="sdistrict" type="hidden" value="<?php echo $this->_vars['company_profile']['sdistrict']; ?>
" />
      		<div id="menu3" class="dmenu shadow">
      			<ul>
      			<?php echo tpl_function_qishi_get_classify(array('set' => "类型:QS_district,id:0,列表名:c_province"), $this); if (count((array)$this->_vars['c_province'])): foreach ((array)$this->_vars['c_province'] as $this->_vars['list']): ?>
      			<li id="<?php echo $this->_vars['list']['id']; ?>
" title="<?php echo $this->_vars['list']['categoryname']; ?>
"><?php echo $this->_vars['list']['categoryname']; ?>
</li>
      			<?php endforeach; endif; ?>
      			</ul>
      		</div>
      		<div id="menu3_s" class="dmenu shadow" style="display:none"></div>
        </div>
      
        <div class="clear"></div>
        <input type="submit" class="submit" value="" id="index-search-button" />
      </form>
    </div>
	
		<script language="javascript" type="text/javascript">
		 $(document).ready(function()
		{
			  var a = $('#index-search-key').autocomplete({ 
				serviceUrl:'<?php echo $this->_vars['QISHI']['site_dir']; ?>
plus/ajax_common.php?act=hotword',
				minChars:1, 
				maxHeight:400,
				width:360,
				zIndex: 9999,
				deferRequestBy: 0 
			  });
		    ////行业
        //$.each(QS_trade, function(key, value){
        //  var trade = value.split(",");
        //  $("#index-search-trade").append("<option value='"+ trade[0] +"'>"+ trade[1] +"</option>");
        //});
		    ////职位
        //$.each(QS_jobs_parent, function(key, value){
        //  var job = value.split(",");
        //  $("#index-search-jobs").append("<option value='"+ job[0] +"'>"+ job[1] +"</option>");
        //});
		    ////城市
        //$.each(QS_city_parent, function(key, value){
        //  var city = value.split(",");
        //  $("#index-search-city").append("<option value='"+ city[0] +"'>"+ city[1] +"</option>");
        //});
        ////性质
        //$.each(QS_jobsnature, function(key, value){
        //  var nature = value.split(",");
        //  $("#index-search-nature").append("<label><input type='radio' name='nature' value='"+ nature[0] +"' />"+ nature[1] +"</label>");
        //});
		});
		</script>
    <div class="right_panel_box">
      <a class="write" href="#">写简历</a>
      <a class="tel" href="#">010-12345678</a>
    </div>
  </div>
  <div class="clear"></div>
  <div id="hot_job_category_tag" class="hot_job">
    <div class="category">
      <ul>
        <li><a href="#hot_job_category_list_1">热门职位</a></li>
        <li><a href="#hot_job_category_list_2">行业分类</a></li>
        <li><a href="#hot_job_category_list_3">易聘英才报</a></li>
      </ul>
    </div>
    <div id="hot_job_category_list_1" class="job_list">
      <div class="top">
        <div id="hot_job_tabs_1" class="tag">
          <ul class="buttons">
            <li><a href="#hot_job_tabs_1_tabs-1">房地产 装潢</a></li>
            <li><a href="#hot_job_tabs_1_tabs-2">教育咨询</a></li>
            <li><a href="#hot_job_tabs_1_tabs-3">市场传媒</a></li>
            <li><a href="#hot_job_tabs_1_tabs-4">计算机电子</a></li>
            <li><a href="#hot_job_tabs_1_tabs-5" class="last">财务金融</a></li>
          </ul>
          <div id="hot_job_tabs_1_tabs-1" class="list">
        		<?php echo tpl_function_qishi_jobs_list(array('set' => "列表名:job_list,显示数目:32,职位分类:1.182,职位名长度:4,排序:refreshtime>desc"), $this);?>
        		<?php if (count((array)$this->_vars['job_list'])): foreach ((array)$this->_vars['job_list'] as $this->_vars['list']): ?>
         		  <a href="<?php echo $this->_vars['list']['jobs_url']; ?>
" target="_blank"><?php echo $this->_vars['list']['jobs_name']; ?>
</a> 
        		<?php endforeach; endif; ?>
          </div>
          <div id="hot_job_tabs_1_tabs-2" class="list">
        		<?php echo tpl_function_qishi_jobs_list(array('set' => "列表名:job_list,显示数目:32,职位分类:317.324,职位名长度:4,排序:refreshtime>desc"), $this);?>
        		<?php if (count((array)$this->_vars['job_list'])): foreach ((array)$this->_vars['job_list'] as $this->_vars['list']): ?>
         		  <a href="<?php echo $this->_vars['list']['jobs_url']; ?>
" target="_blank"><?php echo $this->_vars['list']['jobs_name']; ?>
</a> 
        		<?php endforeach; endif; ?>
          </div>
          <div id="hot_job_tabs_1_tabs-2" class="list">
            <a href="#">房地产开发策划</a>
            <a href="#">装潢设计</a>
            <a href="#">建筑工程管理</a>
            <a href="#">制冷暖通</a>
            <a href="#">建筑工程管理</a>
            <a href="#">装潢设计</a>
            <a href="#">建筑工程管理</a>
            <a href="#">建筑工程管理</a>
          </div>
        </div>
      </div>
      <div class="bottom">
        <div class="tag">
          <ul class="buttons">
            <li><a href="#" class="current">房地产 装潢</a></li>
            <li><a href="#">教育咨询</a></li>
            <li><a href="#">市场传媒</a></li>
            <li><a href="#">计算机电子</a></li>
            <li><a href="#" class="last">财务金融</a></li>
          </ul>
          <div class="list">
            <a href="#">装潢设计</a>
            <a href="#">房地产开发策划</a>
            <a href="#">建筑工程管理</a>
            <a href="#">制冷暖通</a>
            <a href="#">装潢设计</a>
            <a href="#">房地产开发策划</a>
            <a href="#">建筑工程管理</a>
            <a href="#">制冷暖通</a>
          </div>
        </div>
      </div>
    </div>
	<div id="hot_job_category_list_2" class="job_list">
    <ul class="trade_list">
  		<?php echo tpl_function_qishi_get_classify(array('set' => "类型:QS_trade,列表名:c_trade,显示数目:33"), $this); if (count((array)$this->_vars['c_trade'])): foreach ((array)$this->_vars['c_trade'] as $this->_vars['list']): ?>
  		<li><a href="jobs/jobs-list.php?trade=<?php echo $this->_vars['list']['id']; ?>
"><?php echo $this->_vars['list']['categoryname']; ?>
</a></li>
  		<?php endforeach; endif; ?>
    </ul>
  </div>
	<div id="hot_job_category_list_3" class="job_list">易聘英才报</div>
  </div>
  <div id="article_tab" class="article">
    <ul class="buttons">
      <li><a href="#article_tab-1">动态</a></li>
      <li><a href="#article_tab-2">职场资讯</a></li>
      <li><a href="#article_tab-3">招聘会</a></li>
    </ul>
    <div id="article_tab-1" class="list">
  		<?php echo tpl_function_qishi_news_list(array('set' => "列表名:article_list,显示数目:7,资讯小类:8,排序:article_order>desc"), $this);?>
  		<?php if (count((array)$this->_vars['article_list'])): foreach ((array)$this->_vars['article_list'] as $this->_vars['list']): ?>
        <div class="row">
          <div class="list_title"></div><a href="<?php echo $this->_vars['list']['url']; ?>
"><?php echo $this->_vars['list']['title']; ?>
</a>
        </div>
  		<?php endforeach; endif; ?>
    </div>
    <div id="article_tab-2" class="list">
  		<?php echo tpl_function_qishi_news_list(array('set' => "列表名:article_list,显示数目:7,资讯小类:9,排序:article_order>desc"), $this);?>
  		<?php if (count((array)$this->_vars['article_list'])): foreach ((array)$this->_vars['article_list'] as $this->_vars['list']): ?>
        <div class="row">
          <div class="list_title"></div><a href="<?php echo $this->_vars['list']['url']; ?>
"><?php echo $this->_vars['list']['title']; ?>
</a>
        </div>
  		<?php endforeach; endif; ?>
    </div>
    <div id="article_tab-3" class="list">
  		<?php echo tpl_function_qishi_news_list(array('set' => "列表名:article_list,显示数目:7,资讯小类:10,排序:article_order>desc"), $this);?>
  		<?php if (count((array)$this->_vars['article_list'])): foreach ((array)$this->_vars['article_list'] as $this->_vars['list']): ?>
        <div class="row">
          <div class="list_title"></div><a href="<?php echo $this->_vars['list']['url']; ?>
"><?php echo $this->_vars['list']['title']; ?>
</a>
        </div>
  		<?php endforeach; endif; ?>
    </div>
  </div>
  <div class="clear"></div>
  <div class="ad1">
    <img src="/templates/default/images/index-ad1.jpg" alt="ad1" />
  </div>
  <div class="clear"></div>
  <div class="company">
    <a href="#"><img src="/templates/default/images/index-company-1.jpg" /></a>
    <a href="#"><img src="/templates/default/images/index-company-3.jpg" /></a>
    <a href="#"><img src="/templates/default/images/index-company-3.jpg" /></a>
    <a href="#"><img src="/templates/default/images/index-company-3.jpg" /></a>
    <a href="#"><img src="/templates/default/images/index-company-3.jpg" /></a>
    <a href="#"><img src="/templates/default/images/index-company-3.jpg" /></a>
    <a href="#"><img src="/templates/default/images/index-company-3.jpg" /></a>
  </div>
  <div class="clear"></div>
  <div class="recommend_crash">
    <div class="recommend">
      <div class="list_title"></div>
      <div class="list_box">
    		<?php echo tpl_function_qishi_jobs_list(array('set' => "列表名:jobs,显示数目:7,推荐:1,排序:refreshtime>desc"), $this);?>
    		<?php if (count((array)$this->_vars['jobs'])): foreach ((array)$this->_vars['jobs'] as $this->_vars['list']): ?>
        <div class="row">
          <div class="title">
            <a class="company_name" href="<?php echo $this->_vars['list']['jobs_url']; ?>
" target="_blank"><?php echo $this->_vars['list']['jobs_name']; ?>
</a>
            <p class="peoples">(<?php echo $this->_vars['list']['amount']; ?>
人)</p>
          </div>
          <a class="desc" href="<?php echo $this->_vars['list']['company_url']; ?>
" target="_blank"><?php echo $this->_vars['list']['companyname']; ?>
</a> 
          <p class="desc">更新日期:<?php echo $this->_run_modifier($this->_vars['list']['refreshtime'], 'date_format', 'plugin', 1, "%Y-%m-%d"); ?>
</p>
          <p class="desc">待遇:<?php echo $this->_vars['list']['wage_cn']; ?>
</p>
        </div>
    		<?php endforeach; endif; ?>
      </div>
    </div>
    <div class="crash">
      <div class="list_title"></div>
      <div id="crash_jobs" class="list_box">
    		<?php echo tpl_function_qishi_jobs_list(array('set' => "列表名:jobs,显示数目:10,紧急招聘:1,排序:refreshtime>desc"), $this);?>
    		<?php if (count((array)$this->_vars['jobs'])): foreach ((array)$this->_vars['jobs'] as $this->_vars['list']): ?>
        <div class="row">
          <div class="title">
            <a class="company_name" href="<?php echo $this->_vars['list']['jobs_url']; ?>
" target="_blank"><?php echo $this->_vars['list']['jobs_name']; ?>
</a>
            <p class="peoples">(<?php echo $this->_vars['list']['amount']; ?>
人)</p>
          </div>
          <a class="desc" href="<?php echo $this->_vars['list']['company_url']; ?>
" target="_blank"><?php echo $this->_vars['list']['companyname']; ?>
</a> 
          <p class="desc">更新日期:<?php echo $this->_run_modifier($this->_vars['list']['refreshtime'], 'date_format', 'plugin', 1, "%Y-%m-%d"); ?>
</p>
          <p class="desc">待遇:<?php echo $this->_vars['list']['wage_cn']; ?>
</p>
        </div>
    		<?php endforeach; endif; ?>
      </div>
    </div>
		<div class="clear"></div>
  </div>
  <div class="clear"></div>
  <div class="new_jobs">
    <div class="title"></div>
    <div class="list_box">
      
  		<?php echo tpl_function_qishi_companyjobs_list(array('set' => "列表名:company,显示数目:40,显示职位:2,职位名长度:10,企业名长度:12,排序:refreshtime>desc"), $this);?>
  		<?php if (count((array)$this->_vars['company'])): foreach ((array)$this->_vars['company'] as $this->_vars['list']): ?>
      <div class="job_box">
        <a href="<?php echo $this->_vars['list']['company_url']; ?>
" target="_blank"><?php echo $this->_vars['list']['companyname']; ?>
</a>
        <p class="txt_desc">诚聘：
          <?php if (count((array)$this->_vars['list']['jobs'])): foreach ((array)$this->_vars['list']['jobs'] as $this->_vars['jobslist']): ?>
          <a href="<?php echo $this->_vars['jobslist']['jobs_url']; ?>
" target="_blank"><?php echo $this->_vars['jobslist']['jobs_name']; ?>
</a> 
          <?php endforeach; endif; ?>
        </p>
      </div>
  		<?php endforeach; endif; ?>
      
      
      <div class="clear"></div>
    </div>
  </div>
  <div class="clear"></div>
  <div class="friend_link">
    <div class="title"></div>
    <div class="list_box">
      <?php echo tpl_function_qishi_link(array('set' => "列表名:list,类型:1,调用名称:QS_index,显示数目:5"), $this);?>
      <!--   以下为循环读取 -->
      <?php if (count((array)$this->_vars['list'])): foreach ((array)$this->_vars['list'] as $this->_vars['list']): ?>
      <a href="<?php echo $this->_vars['list']['link_url']; ?>
" target="_blank"><?php echo $this->_vars['list']['title']; ?>
</a>
      <?php endforeach; endif; ?>
       <!-- 循环结束 -->
    </div>
  </div>
  <div class="clear"></div>
</div>
<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("footer.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
<?php echo tpl_function_qishi_ad(array('set' => "显示数目:10,调用名称:QS_indexfloat,列表名:ad"), $this); if (count((array)$this->_vars['ad'])): foreach ((array)$this->_vars['ad'] as $this->_vars['float']):  echo $this->_vars['float'];  endforeach; endif; ?>
</div>		  
<script type="text/javascript" charset="utf-8">
$(function(){
  //tabs
	$( "#hot_job_category_tag" ).tabs();
	$( "#hot_job_tabs_1" ).tabs();
	$( "#article_tab" ).tabs();
  
  //登陆框
  $.get("<?php echo $this->_vars['QISHI']['site_dir']; ?>
plus/ajax_user.php", {"act":"user_login_panel"},
    function (data,textStatus)
    {			
    $("#login_panel").html(data);
    }
  );
  //菜单层
  showmenu("#category_cn","#menu1","#category","#Form1","#category");
  showmenu("#trade_cn","#menu2","#trade","#Form1","#trade");
  showmenulayer("#district_cn","#menu3","#district","#sdistrict",QS_city);
  //多行应用@Mr.Think
	var _wrap=$('#crash_jobs');//定义滚动区域
	var _interval=3000;//定义滚动间隙时间
	var _moving;//需要清除的动画
	_wrap.hover(function(){
		clearInterval(_moving);//当鼠标在滚动区域中时,停止滚动
	},function(){
		_moving=setInterval(function(){
			var _field=_wrap.find('div:first');//此变量不可放置于函数起始处,li:first取值是变化的
			var _h=_field.height();//取得每次滚动高度
			_field.animate({marginTop:-_h+'px'},600,function(){//通过取负margin值,隐藏第一行
				_field.css('marginTop',0).appendTo(_wrap);//隐藏后,将该行的margin值置零,并插入到最后,实现无缝滚动
			})
		},_interval)//滚动间隔时间取决于_interval
	}).trigger('mouseleave');//函数载入时,模拟执行mouseleave,即自动滚动
});
</script>
</body>
</html>