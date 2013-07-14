<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="<?php echo APPS_URL;?>/admin/_static/admin.css" rel="stylesheet" type="text/css">
<script>
/**
 * 全局变量
 */
var SITE_URL  = '<?php echo SITE_URL; ?>';
var THEME_URL = '__THEME__';
var APPNAME   = '<?php echo APP_NAME; ?>';
var UPLOAD_URL ='<?php echo UPLOAD_URL;?>';
var MID		  = '<?php echo $mid; ?>';
var UID		  = '<?php echo $uid; ?>';
// Js语言变量
var LANG = new Array();
</script>
<script type="text/javascript" src="__THEME__/js/jquery.js"></script>
<script type="text/javascript" src="__THEME__/js/core.js"></script>
<script src="__THEME__/js/module.js"></script>
<script src="__THEME__/js/common.js"></script>
<script src="__THEME__/js/module.common.js"></script>
<script src="__THEME__/js/module.weibo.js"></script>
<script type="text/javascript" src="<?php echo APPS_URL;?>/admin/_static/admin.js?t=11"></script>
<script type="text/javascript" src = "__THEME__/js/ui.core.js"></script>
<script type="text/javascript" src = "__THEME__/js/ui.draggable.js"></script>
<?php /* 非admin应用的后台js脚本统一写在  模板风格对应的app目录下的admin.js中*/
if(APP_NAME != 'admin' && file_exists(APP_PUBLIC_PATH.'/admin.js')){ ?>
<script type="text/javascript" src="<?php echo APP_PUBLIC_URL;?>/admin.js"></script>
<?php } ?>
<?php if(!empty($langJsList)) { ?>
<?php if(is_array($langJsList)): ?><?php $i = 0;?><?php $__LIST__ = $langJsList?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><script src="<?php echo ($vo); ?>"></script><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
<?php } ?>
</head>
<body>
<div id="container" class="so_main">
    <div class="page_tit"><?php echo L('PUBLIC_WELCOME');?></div>
    <div class="form2">
	    
        <h4><?php echo L('PUBLIC_FOLD_TIPS');?>&nbsp;&nbsp;&nbsp;<span style="display:none; color:#FF0000" id="updateInfo">您有新的升级包需要升级【<a href="<?php echo U('admin/Update/index');?>">点这里升级</a>】</span></h4>
         <h3 onclick="admin.fold('app_1');"><?php echo L('PUBLIC_USER＿INFORMATION');?></h3>
         <div id='app_1' class="list">
         	<table width="100%" cellspacing="0" cellpadding="0" border="0">
         		<tr >
         			<th><?php echo L('PUBLIC_TOTAL_REGISTERED_USERS');?></th><th class="line_l"><?php echo L('PUBLIC_TOTAL_ACTIVE_USERS');?></th><th class="line_l"><?php echo L('PUBLIC_LARGEST_ONLINE_YESTERDAY');?></th><th class="line_l"><?php echo L('PUBLIC_ONLINE_CURRENT');?></th><th class="line_l"><?php echo L('PUBLIC_LARGEST_ONLINE_WEEK');?></th>
         		</tr>
         		<tr>
         			<td><?php echo (($userInfo["totalUser"])?($userInfo["totalUser"]):0); ?></td>
         			<td><?php echo (($userInfo["activeUser"])?($userInfo["activeUser"]):0); ?></td>
         			<td><?php echo (($userInfo["yesterdayUser"])?($userInfo["yesterdayUser"]):0); ?></td>
         			<td><?php echo (($userInfo["onlineUser"])?($userInfo["onlineUser"]):0); ?></td>
         			<td><?php echo (($userInfo["weekAvg"])?($userInfo["weekAvg"]):0); ?></td>
         		</tr>
         	</table>
         </div>
         <h3 onclick="admin.fold('app_2');"><?php echo L('PUBLIC_ACCESS_INFORMATION');?></h3>
         <div id='app_2' class="list">
         	<table width="100%" cellspacing="0" cellpadding="0" border="0">
         		<tr>
         			<th><?php echo L('PUBLIC_TIME');?></th><th class="line_l"><?php echo L('PUBLIC_PAGE_VIEWS');?></th><th class="line_l"><?php echo L('PUBLIC_INDEPENDENT_VISITORS');?></th><th class="line_l"><?php echo L('PUBLIC_PER_CAPITA_VIEWS');?></th>
         		</tr>
         		<tr>
         			<td><?php echo L('PUBLIC_TODAY');?></td>
         			<td><?php echo (($visitCount["today"]["pv"])?($visitCount["today"]["pv"]):0); ?></td>
         			<td><?php echo (($visitCount["today"]["pu"])?($visitCount["today"]["pu"]):0); ?></td>
         			<td><?php echo round($visitCount['today']['pv']/$visitCount['today']['pu'],2);?></td>
         		</tr>
         		<tr>
         			<td><?php echo L('PUBLIC_YESTERDAY');?></td>
         			<td><?php echo (($visitCount["yesterday"]["pv"])?($visitCount["yesterday"]["pv"]):0); ?></td>
         			<td><?php echo (($visitCount["yesterday"]["pu"])?($visitCount["yesterday"]["pu"]):0); ?></td>
         			<td><?php echo round($visitCount['yesterday']['pv']/$visitCount['yesterday']['pu'],2);?></td>
         		</tr>
         		<tr>
         			<td><?php echo L('PUBLIC_ONE_WEEK_AVERAGE');?></td>
         			<td><?php echo (($visitCount["weekAvg"]["pv"])?($visitCount["weekAvg"]["pv"]):0); ?></td>
         			<td><?php echo (($visitCount["weekAvg"]["pu"])?($visitCount["weekAvg"]["pu"]):0); ?></td>
         			<td><?php echo round($visitCount['weekAvg']['pv']/$visitCount['weekAvg']['pu'],2);?></td>
         		</tr>
         	</table>
         </div>
        <?php $id = 3; ?>
        <?php if(is_array($statistics)): ?><?php $i = 0;?><?php $__LIST__ = $statistics?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$channel): ?><?php ++$i;?><?php $mod = ($i % 2 )?><?php $index = $id++; ?>
            <h3 onclick="admin.fold('app_<?php echo ($index); ?>');"><?php echo ($key); ?></h3>
            <div id="app_<?php echo ($index); ?>">
            <?php if(is_array($channel)): ?><?php $i = 0;?><?php $__LIST__ = $channel?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><dl><dt><strong><?php echo ($key); ?>：</strong></dt><dd><?php echo ($vo); ?></dd></dl><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
            </div><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
    </div>
</div>
<?php if(!empty($onload)){ ?>
<script type="text/javascript">
/**
 * 初始化对象
 */
//表格样式
$(document).ready(function(){
    <?php foreach($onload as $v){ echo $v,';';} ?>
});
</script>
<?php } ?>
</body>
</html>
<script>
var postURL = "<?php echo U('admin/Update/step01_checkVersionByAjax');?>";
$.post(postURL, {isCheck:1}, function(res){
	if(res==1)  $('#updateInfo').show();
});
</script>