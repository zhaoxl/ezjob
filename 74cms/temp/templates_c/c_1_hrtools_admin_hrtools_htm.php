<?php require_once('/Users/zhaoxiaolong/php_work/74cms/include/template_lite/plugins/modifier.default.php'); $this->register_modifier("default", "tpl_modifier_default",false);  require_once('/Users/zhaoxiaolong/php_work/74cms/include/template_lite/plugins/modifier.cat.php'); $this->register_modifier("cat", "tpl_modifier_cat",false);  require_once('/Users/zhaoxiaolong/php_work/74cms/include/template_lite/plugins/modifier.qishi_parse_url.php'); $this->register_modifier("qishi_parse_url", "tpl_modifier_qishi_parse_url",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2013-07-11 23:44 CST */  $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_header.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
<script type="text/javascript">
$(document).ready(function()
{
	//点击批量取消	
	$("#ButDel").click(function(){
		if (confirm('你确定要删除吗？'))
		{
			$("form[name=form1]").submit()
		}
	});
		
});
</script>
<div class="admin_main_nr_dbox">
<div class="pagetit">
	<div class="ptit"> <?php echo $this->_vars['pageheader']; ?>
</div>
	<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("hrtools/admin_hrtools_nav.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
  <div class="clear"></div>
</div>
<div class="seltpye_x">
		<div class="left">分类选择</div>	
		<div class="right">
		<a href="<?php echo $this->_run_modifier("h_typeid:", 'qishi_parse_url', 'plugin', 1); ?>
" <?php if ($_GET['h_typeid'] == ""): ?>class="select"<?php endif; ?>>不限</a>
		<?php if (count((array)$this->_vars['category'])): foreach ((array)$this->_vars['category'] as $this->_vars['list']): ?>
	  <a href="<?php echo $this->_run_modifier($this->_run_modifier("h_typeid:", 'cat', 'plugin', 1, $this->_vars['list']['c_id']), 'qishi_parse_url', 'plugin', 1); ?>
"  <?php if ($_GET['h_typeid'] == $this->_vars['list']['c_id']): ?>class="select"<?php endif; ?>><?php echo $this->_vars['list']['c_name']; ?>
</a> 
	  <?php endforeach; endif; ?>
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
</div>
  <form id="form1" name="form1" method="post" action="?act=hrtools_del">
  <?php echo $this->_vars['inputtoken']; ?>

  <table width="100%" border="0" cellpadding="0" cellspacing="0" id="list" class="link_lan">
    <tr>
      <td  class="admin_list_tit admin_list_first">
      <label id="chkAll"><input type="checkbox" name="chkAll"  id="chk" title="全选/反选" />
      文档名称</label>
	  </td>
      <td  class="admin_list_tit"> 文档路径 </td>
      <td align="center" class="admin_list_tit" width="130">所属分类</td>
      <td  align="center"  class="admin_list_tit" width="100">排序</td>
      <td  align="center"  class="admin_list_tit" width="100">操作</td>
    </tr>
	<?php if (count((array)$this->_vars['hrtools'])): foreach ((array)$this->_vars['hrtools'] as $this->_vars['list']): ?>
	<tr>
      <td  class="admin_list admin_list_first">
      
	  <input name="id[]" type="checkbox" id="id" value="<?php echo $this->_vars['list']['h_id']; ?>
"  />
<a href="?act=edit&id=<?php echo $this->_vars['list']['h_id']; ?>
" ><?php echo $this->_vars['list']['h_filename']; ?>
</a>
		 
	  
	  </td>
      <td  class="admin_list">
	    <a href="<?php echo $this->_vars['list']['h_fileurl']; ?>
" target="_blank"><?php echo $this->_vars['list']['h_fileurl']; ?>
</a></td>
      <td align="center" class="admin_list">
	  <a href="?h_typeid=<?php echo $this->_vars['list']['h_typeid']; ?>
" ><?php echo $this->_vars['list']['c_name']; ?>
</a>
	  
	  &nbsp;
	  </td>
      <td  align="center"  class="admin_list">
	  <?php echo $this->_vars['list']['h_order']; ?>

	  </td>
      <td  align="center"  class="admin_list">
	 <a href="?act=edit&id=<?php echo $this->_vars['list']['h_id']; ?>
" >修改</a>
	  </td>
    </tr>
	 <?php endforeach; endif; ?>
  </table>
   </form>
   <?php if (! $this->_vars['hrtools']): ?>
<div class="admin_list_no_info">没有任何信息！</div>
<?php endif; ?>
<table width="100%" border="0" cellspacing="10" cellpadding="0" class="admin_list_btm">
      <tr>
        <td>
<input type="button" class="admin_submit" id="ButAudit" value="添加"  onclick="window.location='?act=add'"/>
<input type="button" class="admin_submit" id="ButDel" value="删除"/>
		</td>
        <td width="305" align="right">
		<form id="formseh" name="formseh" method="get" action="?">	
			<div class="seh">
			    <div class="keybox"><input name="key" type="text"   value="<?php echo $_GET['key']; ?>
" /></div>
			    <div class="selbox">
					<input name="key_type_cn"  id="key_type_cn" type="text" value="<?php echo $this->_run_modifier($_GET['key_type_cn'], 'default', 'plugin', 1, "名称"); ?>
" readonly="true"/>
						<div>
								<input name="key_type" id="key_type" type="hidden" value="<?php echo $this->_run_modifier($_GET['key_type'], 'default', 'plugin', 1, "1"); ?>
" />
												 
						</div>				
				</div>
				<div class="sbtbox">
				<input name="act" type="hidden" value="list" />
				<input type="submit" name="" class="sbt" id="sbt" value="搜索"/>
				</div>
				<div class="clear"></div>
		  </div>
		  </form>
		
	    </td>
      </tr>
  </table>
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