<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2013-07-23 18:17 CST */ ?>
<div class="topnav">
<a href="?act=captcha" <?php if ($this->_vars['navlabel'] == 'captcha'): ?>class="select"<?php endif; ?>><u>验证码</u></a>
<a href="?act=filte" <?php if ($this->_vars['navlabel'] == 'filte'): ?>class="select"<?php endif; ?>><u>关键字过滤</u></a>
<a href="?act=ip" <?php if ($this->_vars['navlabel'] == 'ip'): ?>class="select"<?php endif; ?>><u>禁止IP</u></a>
<a href="?act=csrf" <?php if ($this->_vars['navlabel'] == 'csrf'): ?>class="select"<?php endif; ?>><u>CSRF防御</u></a>
<div class="clear"></div>
</div>