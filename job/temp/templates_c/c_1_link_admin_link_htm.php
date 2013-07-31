<?php require_once('/Users/zhaoxiaolong/php_work/ezjob/job/include/template_lite/plugins/modifier.default.php'); $this->register_modifier("default", "tpl_modifier_default",false);  require_once('/Users/zhaoxiaolong/php_work/ezjob/job/include/template_lite/plugins/modifier.cat.php'); $this->register_modifier("cat", "tpl_modifier_cat",false);  require_once('/Users/zhaoxiaolong/php_work/ezjob/job/include/template_lite/plugins/modifier.qishi_parse_url.php'); $this->register_modifier("qishi_parse_url", "tpl_modifier_qishi_parse_url",false);  /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2013-07-31 14:08 CST */  $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_header.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
<script type="text/javascript">
$(document).ready(function()
{
	//点击批量删除	
	$("#ButDlete").click(function(){
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
echo $this->_fetch_compile_include("link/admin_link_nav.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
  <div class="clear"></div>
</div>
 <div class="seltpye_x">
		<div class="left">链接状态</div>	
		<div class="right">
		<a href="<?php echo $this->_run_modifier("alias:", 'qishi_parse_url', 'plugin', 1); ?>
" <?php if ($_GET['alias'] == ""): ?>class="select"<?php endif; ?>>不限</a>
		 <?php if (count((array)$this->_vars['get_link_category'])): foreach ((array)$this->_vars['get_link_category'] as $this->_vars['li']): ?>
		<a href="<?php echo $this->_run_modifier($this->_run_modifier("alias:", 'cat', 'plugin', 1, $this->_vars['li']['c_alias']), 'qishi_parse_url', 'plugin', 1); ?>
" <?php if ($_GET['alias'] == $this->_vars['li']['c_alias']): ?>class="select"<?php endif; ?>><?php echo $this->_vars['li']['categoryname']; ?>
</a>
		 <?php endforeach; endif; ?>
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
</div>
 <div class="seltpye_x">
		<div class="left">添加类型</div>	
		<div class="right">
		<a href="<?php echo $this->_run_modifier("type_id:", 'qishi_parse_url', 'plugin', 1); ?>
" <?php if ($_GET['type_id'] == ""): ?>class="select"<?php endif; ?>>不限</a>
		<a href="<?php echo $this->_run_modifier("type_id:1", 'qishi_parse_url', 'plugin', 1); ?>
" <?php if ($_GET['type_id'] == "1"): ?>class="select"<?php endif; ?>>非自助申请</a>
		<a href="<?php echo $this->_run_modifier("type_id:2", 'qishi_parse_url', 'plugin', 1); ?>
" <?php if ($_GET['type_id'] == "2"): ?>class="select"<?php endif; ?>>自助申请</a>
		<div class="clear"></div>
		</div>
		<div class="clear"></div>
</div>
 <form id="form1" name="form1" method="post" action="?act=del_link">
 <?php echo $this->_vars['inputtoken']; ?>

   <table width="100%" border="0" cellpadding="0" cellspacing="0"  id="list" class="link_lan">
    <tr>
      <td width="30%" class="admin_list_tit admin_list_first">
      <label id="chkAll"><input type="checkbox" name="chkAll"  id="chk" title="全选/反选" />链接标题</label>	  </td>
      <td class="admin_list_tit"> 地址 </td>
      <td   align="center" class="admin_list_tit">顺序</td>
      <td   align="center"  class="admin_list_tit">位置</td>
      <td   align="center"   class="admin_list_tit">状态</td>
      <td width="130" align="center"  class="admin_list_tit" >操作</td>
    </tr>
	 <?php if (count((array)$this->_vars['link'])): foreach ((array)$this->_vars['link'] as $this->_vars['list']): ?>
    <tr>
      <td   class="admin_list admin_list_first">
	  <input name="id[]" type="checkbox"  value="<?php echo $this->_vars['list']['link_id']; ?>
" />
	  <a href="<?php echo $this->_vars['list']['link_url']; ?>
" target="_blank"  <?php if ($this->_vars['list']['display'] <> "1"): ?>style="color:#CCCCCC"<?php endif; ?>><?php echo $this->_vars['list']['link_name']; ?>
</a>	
	   <?php if ($this->_vars['list']['Notes'] <> ""): ?>
	  <img src="images/comment_alert.gif" border="0"  class="vtip" title="<?php echo $this->_vars['list']['Notes']; ?>
" />
	  <?php endif; ?>
	   <?php if ($this->_vars['list']['link_logo'] <> ""): ?>
	  <span style="color:#FF6600" title="<img src=<?php echo $this->_vars['list']['link_logo']; ?>
 border=0/>" class="vtip">[logo]</span>
	  <?php endif; ?>
	  <?php if ($this->_vars['list']['display'] <> "1"): ?>
	  <span style="color: #999999">[不显示]</span>
	  <?php endif; ?>
      </td>
      <td  class="admin_list">
	    <a href="<?php echo $this->_vars['list']['link_url']; ?>
" target="_blank"><?php echo $this->_vars['list']['link_url']; ?>
</a>	  </td>
      <td align="center"  class="admin_list"><?php echo $this->_vars['list']['show_order']; ?>
</td>
      <td align="center"  class="admin_list">
	  <?php echo $this->_vars['list']['categoryname']; ?>

	  </td>
      <td align="center"   class="admin_list">
	  <?php if ($this->_vars['list']['type_id'] == "1"): ?>非自助<?php endif; ?>
	  <?php if ($this->_vars['list']['type_id'] == "2"): ?>自助申请<?php endif; ?>
	  </td>
      <td align="center"   class="admin_list">
	  <a href="?act=edit&id=<?php echo $this->_vars['list']['link_id']; ?>
">修改</a> <a href="?act=del_link&id=<?php echo $this->_vars['list']['link_id']; ?>
&<?php echo $this->_vars['urltoken']; ?>
" onclick="return confirm('你确定要删除吗？')">删除</a>	  </td>
    </tr>
	 <?php endforeach; endif; ?>
  </table>
  </form>
  <?php if (! $this->_vars['link']): ?>
<div class="admin_list_no_info">没有任何信息！</div>
<?php endif; ?>
<table width="100%" border="0" cellspacing="10" cellpadding="0" class="admin_list_btm">
      <tr>
        <td>
<input type="button" class="admin_submit" id="ButAudit" value="添加"  onclick="window.location='?act=add'"/>
<input type="button" class="admin_submit" id="ButDlete" value="删除"/>
		</td>
        <td width="305" align="right">
		<form id="formseh" name="formseh" method="get" action="?">	
			<div class="seh">
			    <div class="keybox"><input name="key" type="text"   value="<?php echo $_GET['key']; ?>
" /></div>
			    <div class="selbox">
					<input name="key_type_cn"  id="key_type_cn" type="text" value="<?php echo $this->_run_modifier($_GET['key_type_cn'], 'default', 'plugin', 1, "标题"); ?>
" readonly="true"/>
						<div>
								<input name="key_type" id="key_type" type="hidden" value="<?php echo $this->_run_modifier($_GET['key_type'], 'default', 'plugin', 1, "1"); ?>
" />
												<div id="sehmenu" class="seh_menu">
														<ul>
														<li id="1" title="标题">标题</li>
														<li id="2" title="URL">URL</li>
														</ul>
												</div>
						</div>				
				</div>
				<div class="sbtbox">
				<input name="act" type="hidden" value="list" />
				<input type="submit" name="" class="sbt" id="sbt" value="搜索"/>
				</div>
				<div class="clear"></div>
		  </div>
		  </form>
		  <script type="text/javascript">$(document).ready(function(){showmenu("#key_type_cn","#sehmenu","#key_type");});	</script>

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