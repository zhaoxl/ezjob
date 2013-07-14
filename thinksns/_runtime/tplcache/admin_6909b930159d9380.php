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
<script type="text/javascript">
// 鼠标移动表格效果
$(document).ready(function(){
    $("tr[overstyle='on']").hover(
      function () {
        $(this).addClass("bg_hover");
      },
      function () {
        $(this).removeClass("bg_hover");
      }
    );
});

function move(id, direction) {
	var baseid  = direction == 'up' ? $('#'+id).prev().attr('id') : $('#'+id).next().attr('id');
    if(!baseid) {
        direction == 'up' ? ui.error(L('PUBLIC_ALREADY_TOP')) : ui.error('<?php echo L('PUBLIC_LAST');?>');
    }else {
        $.post("<?php echo U('admin/Plugin/doMedalOrder');?>", {id:id, baseid:baseid}, function(res){
            if(res == '1') {
                //交换位置
                direction == 'up' ? $('#'+id).insertBefore('#'+baseid) : $("#"+id).insertAfter('#'+baseid);
                ui.success('<?php echo L('PUBLIC_SAVE_SUCCESS');?>');
            }else {
                ui.error('<?php echo L('PUBLIC_SAVE_FAIL');?>');
            }
        });
    }
}
</script>

<?php foreach($list as $type=>$value) { ?>
<div class="so_main">
    <div class="page_tit"><?php echo ($value['name']); ?></div>
    <div class="Toolbar_inbox"></div>
    <div class="list">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <th class="line_l"><?php echo L('PUBLIC_PLUGIN_NAME');?></th>
            <th class="line_l"><?php echo L('PUBLIC_PROSEN');?></th>    
            <th class="line_l"><?php echo L('PUBLIC_VERSION_NUM');?></th>
            <th class="line_l"><?php echo L('PUBLIC_DESCRIPTION');?></th>
            <th class="line_l"><?php echo L('PUBLIC_OPERATION');?></th>
        </tr>
        <?php if(empty($value['data'])) { ?>
        <tr>
            <td><?php echo L('PUBLIC_NO_MORE');?><?php echo ($value['name']); ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <?php } ?>
        <?php if(is_array($value["data"])): ?><?php $i = 0;?><?php $__LIST__ = $value["data"]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><tr overstyle='on' id="<?php echo ($vo['name']); ?>">
            <td><?php echo ($vo['pluginName']); ?></td>
            <td><?php echo ($vo['author']); ?><?php if(isset($vo['site'])): ?><br /><a href="<?php echo ($vo['site']); ?>"><?php echo ($vo['site']); ?></a><?php endif; ?></td>
            <td><?php echo ($vo['version']); ?></td>
            <td><?php echo ($vo['info']); ?></td>
            <td>
                <?php if($type == "valid"){ ?>
             	<?php $uninstall_href = U('admin/Addons/stopAddon',array('addonId'=>$vo['addonId']));
    	        $uninstall_alert_1 = '确定停用该插件?'; ?>
                <a href="javascript:void(0);" onclick="if(confirm('<?php echo ($uninstall_alert_1); ?>')) location.href='<?php echo ($uninstall_href); ?>';return false;">停用</a>
                <?php }else{ ?>
                <?php $install_href = U('admin/Addons/startAddon',array('name'=>$vo['name']));
                if($vo['sqlfile']){
                	$install_alert_1 = '初次启用该插件时将会进行sql操作，且无法恢复，强烈建议您备份数据库后再启用，确定继续?';
                }else{
                	$install_alert_1 = '确定启用该插件？';
                } ?>
                <a href="javascript:void(0);" onclick="if(confirm('<?php echo ($install_alert_1); ?>')) location.href='<?php echo ($install_href); ?>';return false;">启用</a>
                <?php } ?>
                <?php if($vo['admin'] && $type == "valid"){ ?>
                <?php $href = U('admin/Addons/admin',array('pluginid'=>$vo['addonId'])); ?>
                <a href="javascript:void(0);" onclick="location.href='<?php echo ($href); ?>';return false;"><?php echo L('PUBLIC_MANAGEMENT');?></a>
                <?php } ?>
            </td>
        </tr><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
    </table>
    </div>
    <div class="Toolbar_inbox"></div>
</div>
<?php } ?>

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