<?php require_once('/Users/zhaoxiaolong/php_work/ezjob/job/include/template_lite/plugins/function.qishi_explain_list.php'); $this->register_function("qishi_explain_list", "tpl_function_qishi_explain_list",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2013-08-03 16:54 CST */ ?>
<div class="footer">
<div class="link_bk"><a onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('<?php echo $this->_vars['QISHI']['site_domain']; ?>
');" href="javascript:">设为首页</a>&nbsp;|&nbsp;<a href="javascript:" onclick="window.external.addFavorite(parent.location.href,document.title);">加入收藏</a>
<?php echo tpl_function_qishi_explain_list(array('set' => "列表名:explain,分类ID:1"), $this); if (count((array)$this->_vars['explain'])): foreach ((array)$this->_vars['explain'] as $this->_vars['list']): ?>&nbsp;|&nbsp;<a href="<?php echo $this->_vars['list']['url']; ?>
" target="_blank"><?php echo $this->_vars['list']['title']; ?>
</a><?php endforeach; endif; ?></div>
<div class="link_bk">
联系地址：<?php echo $this->_vars['QISHI']['address']; ?>
 联系电话：<?php echo $this->_vars['QISHI']['bootom_tel']; ?>
 网站备案：<a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo $this->_vars['QISHI']['icp']; ?>
</a>  <?php echo $this->_vars['QISHI']['statistics']; ?>
</div>
<div class="link_bk"><?php echo $this->_vars['QISHI']['bottom_other']; ?>
</div>
<div class="link_bk" style="font-size:10px;"> Powered by <a href="http://www.74cms.com/" target="_blank" style="color:#009900"><em> 74cms v<?php echo $this->_vars['QISHI']['version']; ?>
</em></a></div>
</div>
