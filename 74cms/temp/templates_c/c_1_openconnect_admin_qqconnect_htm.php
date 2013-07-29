<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2013-07-23 18:18 CST */  $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_header.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
<script  charset="utf-8" src="kindeditor/kindeditor.js"></script>
<div class="admin_main_nr_dbox">
 <div class="pagetit">
	<div class="ptit"> <?php echo $this->_vars['pageheader']; ?>
</div>
  <?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("openconnect/admin_openconnect_nav.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
  <div class="clear"></div>
</div>
<div class="toptip link_lan"  >
	<h2>提示：</h2>
	<p>
网站接入QQ登录后，用户只需要使用QQ账号密码就可登录，简化用户注册流程，更有效率的提高转化用户流量；
<br />
接入QQ登录前，网站需首先进行申请，获得对应的appid与appkey，以保证后续流程中可正确对网站与用户进行验证与授权。 
现在就去<a href="http://connect.opensns.qq.com/apply" target="_blank">申请</a></p>
</div>

<div class="toptit">QQ互设置</div>
 
    <form action="?act=set_qq_save" method="post" name="form1" id="form1">
 <?php echo $this->_vars['inputtoken']; ?>

    <table width="700" border="0" cellspacing="6" cellpadding="1" style=" margin-bottom:3px;">
	<tr>
      <td width="150" align="right">开启QQ登录：</td>
      <td  >
	  <label>
        <input name="qq_apiopen" type="radio"  value="1"  <?php if ($this->_vars['config']['qq_apiopen'] == "1"): ?>checked=checked <?php endif; ?>/>开启</label>
&nbsp;&nbsp;
<label>
        <input name="qq_apiopen" type="radio"  value="0"  <?php if ($this->_vars['config']['qq_apiopen'] == "0"): ?>checked=checked <?php endif; ?>/>关闭</label>
		&nbsp;&nbsp;
</td>
    </tr>
	<tr>
      <td width="150" align="right">验证方式：</td>
      <td  >
	  <label>
        <input name="qq_logintype" type="radio"  value="1"  <?php if ($this->_vars['config']['qq_logintype'] == "1"): ?>checked=checked <?php endif; ?>/>client-side模式
</label>
&nbsp;&nbsp;
<label>
        <input name="qq_logintype" type="radio"  value="2"  <?php if ($this->_vars['config']['qq_logintype'] == "2"): ?>checked=checked <?php endif; ?>/>server-side模式
</label>
		&nbsp;&nbsp;
</td>
    </tr>
	<tr>
      <td width="150" align="right">appid：</td>
      <td  >
	 <input name="qq_appid" type="text"  class="input_text_400"  value="<?php echo $this->_vars['config']['qq_appid']; ?>
"  />
</td>
    </tr>
	<tr>
      <td width="150" align="right">appkey：</td>
      <td  >
	 <input name="qq_appkey" type="text"  class="input_text_400"  value="<?php echo $this->_vars['config']['qq_appkey']; ?>
"  />
</td>
    </tr>
	<tr>
	  <td align="right" valign="top">&nbsp;</td>
	  <td> 
	    <input name="submit" type="submit" class="admin_submit"    value="保存"/>
	  </td>
	  </tr>
  </table>
    <br />
    <br />
    <br />
    <br />
    <br />
    </form>
</div>
<?php $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_footer.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
</body>
</html>