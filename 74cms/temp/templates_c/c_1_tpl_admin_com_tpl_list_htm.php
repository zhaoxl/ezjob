<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2013-07-23 10:38 CST */  $_templatelite_tpl_vars = $this->_vars;
echo $this->_fetch_compile_include("sys/admin_header.htm", array());
$this->_vars = $_templatelite_tpl_vars;
unset($_templatelite_tpl_vars);
 ?>
<script type="text/javascript"> 
$(document).ready(function()
{
	$(".tpl_list").hover(
  function () {
    $(this).css("background-color","#E4F4FC");
  },
  function () {
    $(this).css("background-color","");
  }
);
});
</script>
<div class="admin_main_nr_dbox">
<div class="pagetit">
	<div class="ptit"><?php echo $this->_vars['pageheader']; ?>
</div>
  <div class="clear"></div>
</div>
<div class="toptip">
	<h2>��ʾ��</h2>
	<p>
������ҵģ��ֻ�轫ģ���ļ��ϴ��� ./templates/tpl_companyĿ¼�£�����ģ���뵽 <a href="http://www.74cms.com/bbs" target="_blank" style="color:#009900">[��̳]</a> ��ȡ��<br />
���ӻ�ɾ��ģ��������·�<strong>ˢ��</strong>��ť��<br />
      �������Ϥhtml�﷨������Բο� <a href="http://www.74cms.com/handbook" target="_blank" style="color:#009900">[ģ�濪���ֲ�]</a> �Զ�����ģ�档
</p>
</div>
<div class="toptit">��ҵģ������</div>
<form id="form1" name="form1" method="post" action="?act=com_tpl_save">
<?php echo $this->_vars['inputtoken']; ?>

	<?php if (count((array)$this->_vars['list'])): foreach ((array)$this->_vars['list'] as $this->_vars['li']): ?>
	<div style=" line-height:180%; padding:5px; border-bottom:1px #D0E2F0 solid"  class="link_lan tpl_list">
	<table width="100%" border="0" cellspacing="5" cellpadding="0">
  <tr>
    <td width="225"><img src="../templates/tpl_company/<?php echo $this->_vars['li']['tpl_dir']; ?>
/thumbnail.jpg" alt="<?php echo $this->_vars['li']['info']['name']; ?>
" width="225" height="136" border="1"  style="border: #CCCCCC;"/></td>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
        <td width="50" align="right">���ƣ�</td>
        <td><input name="tpl_id[]" type="hidden" value="<?php echo $this->_vars['li']['tpl_id']; ?>
" />
          <input name="tpl_name[]" type="text" value="<?php echo $this->_vars['li']['tpl_name']; ?>
"  class="input_text_200" />
		  
		  </td>
      </tr>
      <tr>
        <td width="50" align="right">Ĭ�ϣ�</td>
        <td><label>
          <input name="tpl_company" type="radio" value="<?php echo $this->_vars['li']['tpl_dir']; ?>
" <?php if ($this->_vars['li']['tpl_dir'] == $this->_vars['QISHI']['tpl_company']): ?>checked="checked" <?php endif; ?>/>
        </label></td>
      </tr>
	  <tr>
        <td align="right">���ã�</td>
        <td><label>
         <input name="tpl_display[]" type="checkbox" value="1" <?php if ($this->_vars['li']['tpl_display'] == "1"): ?>checked="checked" <?php endif; ?>/>
        </label></td>
      </tr>
      <tr>
        <td align="right">�ۼۣ�</td>
        <td><input type="text" class="input_text_200" maxlength="3" value="<?php echo $this->_vars['li']['tpl_val']; ?>
" name="tpl_val[]"/>
		�����
		
		
		<span class="admin_note">��ҵ��Աʹ�ô�ģ����Ҫ֧���Ļ��֣�0Ϊ���</span></td>
      </tr>
	  <tr>
        <td align="right">�汾��</td>
        <td><?php echo $this->_vars['li']['info']['version']; ?>
</td>
      </tr>
	        <tr>
        <td align="right">���ߣ�</td>
        <td><a href="<?php echo $this->_vars['li']['info']['authorurl']; ?>
" target="_blank"><?php echo $this->_vars['li']['info']['author']; ?>
</a></td>
      </tr>
    </table></td>
  </tr>
</table>
</div>
	<?php endforeach; endif; ?>
	<table width="100%" border="0" cellspacing="10" cellpadding="0" class="admin_list_btm">
      <tr>
        <td>
		 <input type="submit" name="" value="����" class="admin_submit" />
		 <input type="button" name="Submit22" value="ˢ��" class="admin_submit"    onclick="window.location='?act=refresh_tpl&type=1&tpl_dir=tpl_company&<?php echo $this->_vars['urltoken']; ?>
'"/>
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