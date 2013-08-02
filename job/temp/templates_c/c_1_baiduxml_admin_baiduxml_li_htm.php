<?php require_once('/Users/zhaoxiaolong/php_work/ezjob/job/include/template_lite/plugins/modifier.date_format.php'); $this->register_modifier("date_format", "tpl_modifier_date_format",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2013-08-02 16:14 CST */  $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_header.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
<div class="admin_main_nr_dbox">
 <div class="pagetit">
	<div class="ptit"> <?php echo $this->_vars['pageheader']; ?>
</div>
	<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("baiduxml/admin_baiduxml_nav.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
  <div class="clear"></div>
</div>
<div class="toptip">
	<h2>提示：</h2>
	<p>
计划任务中可设置定期生成资源文档。<br />
您可以通过修改配置信息来调整生成结果。<br />
</p>
</div>
 <form id="form1" name="form1" method="post" action="?act=del">
  <?php echo $this->_vars['inputtoken']; ?>

  <table width="100%" border="0" cellpadding="0" cellspacing="0"  id="list" class="link_lan">
    <tr>
      <td width="15%" class="admin_list_tit admin_list_first" >
	  <label id="chkAll"><input type="checkbox" name="chkAll"  id="chk" title="全选/反选" />类型</label></td>
	       
            <td class="admin_list_tit">文档路径</td>
		    <td width="180" align="center"  class="admin_list_tit">生成时间</td>
        <td width="160" align="center"   class="admin_list_tit">文档大小<em  style="font-size:10px;">MB</em></td>
	
      </tr>
	 <?php if (count((array)$this->_vars['flist'])): foreach ((array)$this->_vars['flist'] as $this->_vars['li']): ?>
	 <tr> 
      <td  class="admin_list admin_list_first">
      <input name="file_name[]" type="checkbox" id="file_name" value="<?php echo $this->_vars['li']['file_name']; ?>
" />
	<?php echo $this->_vars['li']['file_type']; ?>
</a>
	        
        <td  class="admin_list"><a href="<?php echo $this->_vars['li']['file_url']; ?>
" target="_blank"><?php echo $this->_vars['li']['file_url']; ?>
</a></td>
			<td align="center"  class="admin_list">
			<?php echo $this->_run_modifier($this->_vars['li']['file_time'], 'date_format', 'plugin', 1, "%Y-%m-%d %H:%M:%S"); ?>

			</td>
        <td align="center"  class="admin_list">
		<?php echo $this->_vars['li']['file_size']; ?>
<em  style="font-size:10px;">MB</em>
		</td>
	
      </tr>
	 <?php endforeach; endif; ?>
  </table>
	  <?php if (! $this->_vars['flist']): ?>
<div class="admin_list_no_info">没有任何信息！</div>
<?php endif; ?>
<table width="100%" border="0" cellspacing="10" cellpadding="0" class="admin_list_btm">
      <tr>
        <td>
		  <input name="But" type="button" class="admin_submit" id="But" value="生成文档"  onclick="window.location='?act=make'"/>
<input name="del" type="submit" class="admin_submit" id="ButDel" value="删除所选" onclick="return confirm('你确定要删除吗？')"/>
		</td>
        <td width="305" align="right">		
	    </td>
      </tr>
  </table>
  </form>
<div class="page link_bk"><?php echo $this->_vars['page']; ?>
</div>
</div>
<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_footer.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
</body>
</html>