<?php require_once('/Users/zhaoxiaolong/php_work/ezjob/job/include/template_lite/plugins/function.qishi_get_classify.php'); $this->register_function("qishi_get_classify", "tpl_function_qishi_get_classify",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2013-08-02 15:46 CST */  $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_header.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
<script type="text/javascript">
$(document).ready(function()
{
	$("#add_form").click(function()
	{
	$("#html").append($("#html_tpl").html());
	});
	
});
</script>
<div class="admin_main_nr_dbox">
<div class="pagetit">
	<div class="ptit"> <?php echo $this->_vars['pageheader']; ?>
</div>
	<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("category/admin_category_nav.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
  <div class="clear"></div>
</div>
<div class="toptip">
	<h2>��ʾ��</h2>
	<p>
	������������ӡ���ť����ͬʱ���Ӷ�����࣡<br />
</p>
</div>
<div class="toptit">��������</div>
<form id="form1" name="form1" method="post" action="?act=add_category_jobs_save">
<?php echo $this->_vars['inputtoken']; ?>

<div id="html_tpl">
<table width="100%" border="0" cellspacing="6" cellpadding="0" style="border-bottom:1px #93AEDD  dashed">
 <tr>
    <td width="120" align="right">��������:</td>
    <td>
	<select name="parentid[]">
	  <option value="0" <?php if ("0" == $_GET['parentid']): ?>selected="selected"<?php endif; ?>>��������</option>
	  <?php echo tpl_function_qishi_get_classify(array('set' => "�б���:jobs,����:QS_jobs,id:0"), $this); if (count((array)$this->_vars['jobs'])): foreach ((array)$this->_vars['jobs'] as $this->_vars['list']): ?>
	  <option value="<?php echo $this->_vars['list']['id']; ?>
" <?php if ($this->_vars['list']['id'] == $_GET['parentid']): ?>selected="selected"<?php endif; ?>><?php echo $this->_vars['list']['categoryname']; ?>
</option>
	<?php endforeach; endif; ?>
	
	</select>
	</td>
 </tr>
  <tr>
    <td width="120" align="right">����:</td>
    <td><input name="categoryname[]" type="text" class="input_text_200"  value=""/></td>
  </tr>
   <tr>
    <td width="120" align="right">����:</td>
    <td><input name="category_order[]" type="text" class="input_text_200"  value="0"/></td>
  </tr>
</table>
</div>
		 <div id="html"></div>
<table width="100%" border="0" cellspacing="6" cellpadding="0">
  <tr>
    <td width="120"> </td>
    <td>
	<input type="submit" name="addsave" value="����" class="admin_submit" />
	<input type="button" name="add_form" id="add_form" value="��������" class="admin_submit" />
		  <input name="submit22" type="button" class="admin_submit"    value="�� ��" onclick="window.location='?act=jobs'"/>
	
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