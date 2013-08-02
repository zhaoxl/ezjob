<?php require_once('/Users/zhaoxiaolong/php_work/ezjob/job/include/template_lite/plugins/function.qishi_news_property.php'); $this->register_function("qishi_news_property", "tpl_function_qishi_news_property",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2013-08-02 13:18 CST */  $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_header.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
<div class="admin_main_nr_dbox">
<div class="pagetit">
	<div class="ptit"> <?php echo $this->_vars['pageheader']; ?>
</div>
	<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("article/admin_article_nav.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
  <div class="clear"></div>
</div>
<div class="toptip">
	<h2>提示：</h2>
	<p>
系统默认分类不能删除！<br />
</p>
</div>
  <form id="form1" name="form1" method="post" action="?act=del_property">
  <?php echo $this->_vars['inputtoken']; ?>

    <table width="100%" border="0" cellpadding="0" cellspacing="0" id="list" class="link_lan"  >
    <tr>
      <td height="26" class="admin_list_tit admin_list_first" >
      <label id="chkAll"><input type="checkbox" name=" " title="全选/反选" id="chk"/>属性名称</label></td>
	  <td width="160"   align="center"  class="admin_list_tit">类型</td>
      <td width="160"   align="center"  class="admin_list_tit">排序</td>
      <td width="100"   class="admin_list_tit">操作</td>
    </tr>
	<?php echo tpl_function_qishi_news_property(array('set' => "列表名:property"), $this);?>
	  <?php if (count((array)$this->_vars['property'])): foreach ((array)$this->_vars['property'] as $this->_vars['list']): ?>
     <tr>
      <td   class="admin_list admin_list_first" >
      <input type="checkbox" name="id[]" value="<?php echo $this->_vars['list']['id']; ?>
" id="<?php echo $this->_vars['list']['id']; ?>
"  class="Bcheck"/>
	  <?php echo $this->_vars['list']['categoryname']; ?>

	  <span style="color:#CCCCCC">(id:<?php echo $this->_vars['list']['id']; ?>
)</span>
	  </td>
	   <td align="center"  class="admin_list">
	    <?php if ($this->_vars['list']['admin_set'] == "1"): ?>
			   系统分类
			   <?php else: ?>
			     自定义属性
			   <?php endif; ?>
	   </td>
      <td align="center"  class="admin_list">
	  <?php echo $this->_vars['list']['category_order']; ?>

	  </td>
      <td class="admin_list">
	 <a href="?act=edit_property&id=<?php echo $this->_vars['list']['id']; ?>
">修改</a>&nbsp;&nbsp;
			  <?php if ($this->_vars['list']['admin_set'] <> "1"): ?>
			  |&nbsp;&nbsp;<a onclick="return confirm('你确定要删除吗？')" href="?act=del_property&id=<?php echo $this->_vars['list']['id']; ?>
&<?php echo $this->_vars['urltoken']; ?>
">删除</a>
			  <?php endif; ?>	  </td>
    </tr>
	 <?php endforeach; endif; ?>
	</table>
	<table width="100%" border="0" cellspacing="10"  class="admin_list_btm">
<tr>
        <td>
        <input name="ButADD" type="button" class="admin_submit" id="ButADD" value="添加属性"  onclick="window.location='?act=property_add'"/>
		<input name="ButDel" type="submit" class="admin_submit" id="ButDel"  value="删除所选" onclick="return confirm('你确定要删除吗？')"/>
		</td>
        <td width="305" align="right">
	  
	    </td>
      </tr>
  </table>
  </form>
</div>
<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_footer.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
</body>
</html>