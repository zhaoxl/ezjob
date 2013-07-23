<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2013-07-23 11:27 CST */  $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_header.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
<script type="text/javascript">
$(document).ready(function()
{
	$("#SetUrl").QSdialog({
	DialogTitle:"请选择",
	DialogContent:"#UrlHtml",
	DialogContentType:"id",
	DialogAddObj:"#OpUrl",
	DialogAddType:"html"	
	});
	$("#SetCaching").QSdialog({
	DialogTitle:"请选择",
	DialogContent:"#CachingHtml",
	DialogContentType:"id",
	DialogAddObj:"#OpCaching",	
	DialogAddType:"html"	
	});	
 	//点击批量删除	
	$("#ButDel").click(function(){
		if (confirm('你确定要删除吗？'))
		{
			$("form[name=form1]").attr("action","?act=del_page");
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
echo $this->_fetch_compile_include("page/admin_page_nav.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
  <div class="clear"></div>
</div>
<div class="toptip">
	<h2>提示：</h2>
	<p>
你可以通过全选来设置所有页面的链接方式和缓存时间<br />
        职位列表页，人才列表页，会员中心，职位对比页面均不能开启缓存
		<br />系统内内置页面无法删除！
		<br />强烈建议开启页面缓存，缓存让系统性能显著提高！
</p>
</div>
  <form action="?act=set_page" method="post"  name="form1" id="form1">
  <?php echo $this->_vars['inputtoken']; ?>

    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="link_lan"   id="list">
     <tr>
      <td   class="admin_list_tit admin_list_first">
      <label id="chkAll"><input type="checkbox" name="chkAll"  id="chk" title="全选/反选" />页面名称</label>
	  </td>
      <td class="admin_list_tit"> 调用名 </td>
      <td   align="center" class="admin_list_tit">类型</td>
      <td   align="center"  class="admin_list_tit">链接</td>
      <td   align="center"   class="admin_list_tit">缓存</td>
      <td width="130" align="center"  class="admin_list_tit" >编辑</td>
    </tr>
	 <?php if (count((array)$this->_vars['list'])): foreach ((array)$this->_vars['list'] as $this->_vars['li']): ?>
	<tr>
      <td class="admin_list admin_list_first">  
	  <input type="checkbox" name="id[]" value="<?php echo $this->_vars['li']['id']; ?>
"/>   
	 <?php echo $this->_vars['li']['pname']; ?>

	  </td>
      <td class="admin_list"> 
	  <?php echo $this->_vars['li']['alias']; ?>
	   </td>
      <td   align="center" class="admin_list">
	  
	  <?php if ($this->_vars['li']['systemclass'] == "1"): ?>
		<span style="color: #FF6600">系统内置</span>
		<?php else: ?>
		自定义页面
		<?php endif; ?>
		</td>
      <td   align="center"  class="admin_list">
	   <?php if ($this->_vars['li']['url'] == "0"): ?>原始链接<?php endif; ?>
		 <?php if ($this->_vars['li']['url'] == "1"): ?>伪静态<?php endif; ?>
	  </td>
      <td   align="center"   class="admin_list">
	  <?php if ($this->_vars['li']['caching'] == "0"): ?>
		<span style="color:#999999">已关闭</span>
		<?php else: ?>
		<em><?php echo $this->_vars['li']['caching']; ?>
</em> 分
		<?php endif; ?>	
	  </td>
      <td   align="center"  class="admin_list" >
	  <a href="?act=edit_page&id=<?php echo $this->_vars['li']['id']; ?>
">修改</a><?php if ($this->_vars['li']['systemclass'] != "1"): ?> <a href="?act=del_page&id=<?php echo $this->_vars['li']['id']; ?>
&<?php echo $this->_vars['urltoken']; ?>
" onclick="return confirm('你确定要删除吗？')">删除</a> <?php endif; ?>
	  </td>
    </tr>
	<?php endforeach; endif; ?>
    </table> 
    <table width="100%" border="0" cellspacing="10" cellpadding="0" class="admin_list_btm">
      <tr>
        <td>
<input name="add" type="button" class="admin_submit" id="add"    value="添加页面"  onclick="window.location='?act=add_page'"/>
<input type="button" name="open" value="设置链接" class="admin_submit"  id="SetUrl"/>
<input type="button" name="open1" value="设置缓存" class="admin_submit"  id="SetCaching"/>
<input type="button" name="ButDel" id="ButDel" value="删除页面" class="admin_submit"   />
		</td>
        <td width="305" align="right">
		
	    </td>
      </tr>
  </table>
  <span id="OpUrl"></span>
  <span id="OpCaching"></span>
   </form>
<div class="page link_bk"><?php echo $this->_vars['page']; ?>
</div>
</div>
<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_footer.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
  <!--弹出层的内容-->
<div id="UrlHtml" style="display: none" >
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="6" >
    <tr>
      <td width="20" height="30">&nbsp;</td>
      <td height="30"><strong  style="color:#0066CC; font-size:14px;">将所选页面链接设置为：</strong></td>
    </tr>
	      <tr>
      <td height="25">&nbsp;</td>
      <td>
	  <label >
                      <input name="url" type="radio" value="0" checked="checked"  />
                      原始链接 </label>	  </td>
    </tr>
    <tr>
      <td height="25">&nbsp;</td>
      <td><label >
                      <input type="radio" name="url" value="1"  />
                      伪静态</label></td>
    </tr>

	  <tr>
	    <td height="25">&nbsp;</td>
	    <td><input type="submit" name="set_url" value="确定" class="admin_submit"    /></td>
      </tr>
  </table>
</div>
<!--弹出层的内容结束--> 
<div id="CachingHtml" style="display: none" >
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="6" >
    <tr>
      <td height="30">&nbsp;</td>
      <td height="30"><strong  style="color:#0066CC; font-size:14px;">将所选页面缓存设置为：</strong></td>
    </tr>
	      <tr>
      <td width="20" height="25">&nbsp;</td>
      <td>
	 <input name="caching" type="text"  class="input_text_200" id="caching" value="0" maxlength="30"/>

            分钟 <br /><br />

			<span style="color:#666666">(0为不缓存,建议设为180 以上) </span></td>
    </tr>
 
	      <tr>
	        <td height="25">&nbsp;</td>
	        <td><input type="submit" name="set_caching" value="确定" class="admin_submit"></td>
    </tr>
  </table>
</div>
<!--弹出层的内容结束-->
</body>
</html>