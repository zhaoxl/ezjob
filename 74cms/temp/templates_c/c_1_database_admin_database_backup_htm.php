<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2013-07-28 09:47 CST */  $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_header.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
<script type="text/javascript">
$(document).ready(function()
{
	$("#selectAll").click(function()
	{	
		$("form :checkbox").attr("checked",true);
		setbg();
	});
	$("#uncheckAll").click(function()
	{	
		$("form :checkbox").attr("checked",false);
		setbg();
	});
	$("#opposite").click(function()
	{	
		$("form :checkbox").each(function()
		{
		$(this).attr("checked")?$(this).attr("checked",false):$(this).attr("checked",true);
		});
		setbg();
	});
});
</script>
<div class="admin_main_nr_dbox">
<div class="pagetit">
	<div class="ptit"> <?php echo $this->_vars['pageheader']; ?>
</div>
	<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("database/admin_database_nav.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
  <div class="clear"></div>
</div>
<div class="toptip">
	<h2>提示：</h2>
	<p>
数据备份功能根据您的选择备份网站数据库的数据，导出的数据文件可用“数据恢复”功能或 phpMyAdmin 导入。<br />
        全部备份均不包含模板文件和附件文件。模板、附件的备份只需通过 FTP 等下载 ./templates, ./data 目录即可，74cms 不提供单独备份。
</p>
</div>
<div class="toptit">生成备份数据库</div>
	  <form id="form1" name="form1" method="post" action="">
	  <?php echo $this->_vars['inputtoken']; ?>

	<table width="100%" border="0" cellspacing="0" cellpadding="4" id="backupshow">
    <tr>
      <td style=" line-height:180%; color:#666666; padding-left:20px;">
	  <ul style="margin:0px; padding:3px;">
	  <?php if (isset($this->_sections['list'])) unset($this->_sections['list']);
$this->_sections['list']['name'] = 'list';
$this->_sections['list']['loop'] = is_array($this->_vars['list']) ? count($this->_vars['list']) : max(0, (int)$this->_vars['list']);
$this->_sections['list']['show'] = true;
$this->_sections['list']['max'] = $this->_sections['list']['loop'];
$this->_sections['list']['step'] = 1;
$this->_sections['list']['start'] = $this->_sections['list']['step'] > 0 ? 0 : $this->_sections['list']['loop']-1;
if ($this->_sections['list']['show']) {
	$this->_sections['list']['total'] = $this->_sections['list']['loop'];
	if ($this->_sections['list']['total'] == 0)
		$this->_sections['list']['show'] = false;
} else
	$this->_sections['list']['total'] = 0;
if ($this->_sections['list']['show']):

		for ($this->_sections['list']['index'] = $this->_sections['list']['start'], $this->_sections['list']['iteration'] = 1;
			 $this->_sections['list']['iteration'] <= $this->_sections['list']['total'];
			 $this->_sections['list']['index'] += $this->_sections['list']['step'], $this->_sections['list']['iteration']++):
$this->_sections['list']['rownum'] = $this->_sections['list']['iteration'];
$this->_sections['list']['index_prev'] = $this->_sections['list']['index'] - $this->_sections['list']['step'];
$this->_sections['list']['index_next'] = $this->_sections['list']['index'] + $this->_sections['list']['step'];
$this->_sections['list']['first']	  = ($this->_sections['list']['iteration'] == 1);
$this->_sections['list']['last']	   = ($this->_sections['list']['iteration'] == $this->_sections['list']['total']);
?>
	<li style=" list-style:none; padding:0px; margin:0px; float:left; width:260px; height:26px; display:block">
	 <label>
	  <input name="tables[]" type="checkbox" style=" vertical-align: middle" value="<?php echo $this->_vars['list'][$this->_sections['list']['index']]['0']; ?>
" checked="checked"/> 
	 <?php echo $this->_vars['list'][$this->_sections['list']['index']]['0']; ?>

	 </label>
	 </li>
	  <?php endfor; endif; ?>
	  <li class="clear" style="list-style:none"></li>
	  </ul>	
	  </td>
    </tr>
	<tr>
      <td height="30" bgcolor="#F1F8FA" style=" line-height:180%; color:#666666; padding-left:20px;border-bottom:1px  #DFEDF7 solid;border-top:1px #DFEDF7 solid;">
	  &nbsp;&nbsp;&nbsp;
	  <span id="selectAll" style="color:#0066CC; cursor:pointer">[全选]</span>
	  &nbsp;&nbsp;&nbsp;
	  <span id="uncheckAll" style="color:#0066CC; cursor:pointer">[全不选]</span>
	  &nbsp;&nbsp;&nbsp;
 <span id="opposite" style="color:#0066CC; cursor:pointer">[反选]</span>
  &nbsp;&nbsp;&nbsp;
	  分卷备份：
          <input name="limit_size" type="text" id="limit_size"   value="1024" maxlength="20" onkeyup="if(event.keyCode !=37 && event.keyCode != 39) value=value.replace(/\D/g,'');"  onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/\D/g,''))" class="input_text_100"/> KB&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      建表语句格式:
	   <label><input type="radio" name="mysql_type" value="" checked  style="vertical-align:middle"/>默认</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 <label><input type="radio" name="mysql_type" value="mysql40"  style="vertical-align:middle" />MySQL 3.23/4.0.x</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    <label><input type="radio" name="mysql_type" value="mysql41"  style="vertical-align:middle"/>MySQL 4.1.x/5.x</label>	  </td>
    </tr>
	<tr>
	  <td height="80" align="center"  ><input type="hidden" name="act" value="do_backup" />
	   <input type="submit" name="Submit22" value="开始备份" class="admin_submit"    onclick="document.getElementById('backupshow').style.display='none';document.getElementById('hide').style.display='block';"/>	  </td>
	  </tr>
  </table>
   <table width="600" height="100" border="0" cellpadding="5" cellspacing="0" id="hide" style="display:none">
          <tr>
            <td align="center" valign="bottom"><img src="images/ajax_loader.gif"  border="0" /></td>
          </tr>
          <tr>
            <td align="center" valign="top" style="color: #009900">正在备份，请稍候......</td>
          </tr>
        </table>
  </form>
</div>
<script type="text/javascript">
function CheckAll(form)
{
for (var i=0;i<form.elements.length;i++)
{
var e = form.elements[i];
if (e.Name != "chkAll"&&e.disabled!=true)
e.checked = form.chkAll.checked;
}
}
</script>
<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_footer.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
</body>
</html>