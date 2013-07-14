<?php /* V2.10 Template Lite 4 January 2007  (c) 2005-2007 Mark Dickenson. All rights reserved. Released LGPL. 2013-07-11 23:24 CST */ ?>
<div class="topnav">
<a href="?act=list" <?php if ($_GET['act'] == "list" || $_GET['act'] == ""): ?>class="select"<?php endif; ?>><u>广告列表</u></a>
<a href="?act=ad_add" <?php if ($_GET['act'] == "ad_add"): ?>class="select"<?php endif; ?>><u>添加广告</u></a>
<a href="?act=ad_category" <?php if ($_GET['act'] == "ad_category" || $_GET['act'] == "ad_category_add" || $_GET['act'] == "edit_ad_category"): ?>class="select"<?php endif; ?>><u>广告位管理</u></a>
<div class="clear"></div>
</div>