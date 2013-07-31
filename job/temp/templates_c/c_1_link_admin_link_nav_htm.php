<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2013-07-31 14:08 CST */ ?>
<div class="topnav">
<a href="?act=list" <?php if ($this->_vars['navlabel'] == 'list'): ?>class="select"<?php endif; ?>><u>链接列表</u></a>
<a href="?act=add" <?php if ($this->_vars['navlabel'] == 'add'): ?>class="select"<?php endif; ?>><u>添加链接</u></a>
<a href="?act=category" <?php if ($this->_vars['navlabel'] == 'category'): ?>class="select"<?php endif; ?>><u>链接分类</u></a>
<a href="?act=link_set" <?php if ($this->_vars['navlabel'] == 'link_set'): ?>class="select"<?php endif; ?>><u>自助申请设置</u></a>
<div class="clear"></div>
</div>