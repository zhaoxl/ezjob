<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2013-07-28 09:47 CST */ ?>
<div class="topnav">
<a href="?" <?php if ($this->_vars['navlabel'] == 'backup'): ?>class="select"<?php endif; ?>><u>备份</u></a>
<a href="?act=restore" <?php if ($this->_vars['navlabel'] == 'restore'): ?>class="select"<?php endif; ?>><u>恢复</u></a>
<a href="?act=optimize" <?php if ($this->_vars['navlabel'] == 'optimize'): ?>class="select"<?php endif; ?>><u>优化</u></a>
<div class="clear"></div>
</div>