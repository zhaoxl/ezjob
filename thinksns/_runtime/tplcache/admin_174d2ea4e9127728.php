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

<style type="text/css">
.ico_top, .ico_btm {
    background: url("__THEME__/admin/image/ico_top_btm.gif") no-repeat scroll 0 0 transparent;
    height: 14px;
    width: 12px;
}
.ico_top, .ico_btm {
    display: inline-block;
    vertical-align: middle;
}
.ico_top {
    background-position: -12px 0;
}
.ico_btm {
    background-position: -24px 0;
}
.ico_top:hover {
    background-position: 0 0;
}
.ico_btm:hover {
    background-position: -35px 0;
}
</style>

<div id="container" class="so_main">
  <div class="page_tit"><?php echo ($pageTitle); ?> </div>

  <!-- START TAB框 -->
  <?php if(!empty($pageTab)): ?>
  <div class="tit_tab">
    <ul>
      <?php !$_REQUEST['tabHash'] && $_REQUEST['tabHash'] = $pageTab[0]['tabHash']; ?>
      <?php if(is_array($pageTab)): ?><?php $i = 0;?><?php $__LIST__ = $pageTab?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$t): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li><a href="<?php echo ($t["url"]); ?>&tabHash=<?php echo ($t["tabHash"]); ?>" <?php if($t['tabHash'] == $_REQUEST['tabHash']){ echo 'class="on"';} ?>><?php echo ($t["title"]); ?></a></li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
    </ul>
  </div>
  <?php endif; ?>
  <!-- END TAB框 -->

  <!-- START TOOLBAR -->
  <div class="Toolbar_inbox">
    <a href="javascript:void(0);" class="btn_a" onclick="admin.addTreeCategory(0, '<?php echo ($stable); ?>', '<?php echo ($limit); ?>');"><span>添加一级分类</span></a>
  </div>
  <!-- END TOOLBAR -->
  
  <!-- START LIST -->
  <div class="list">
    <ul class="sort">
      <li class="title">
        <div class="line-l c1">分类名称</div>
        <div class="line-l c2">操作</div>
      </li>
    </ul>
    
    <?php if(empty($tree)): ?>
    <span class="textC" style="line-height:26px;display:block"><?php echo L('PUBLIC_NO_RELATE_DATA');?>!</span>
    <?php else: ?>
    <?php echo showTreeCategory($tree, $stable, 0, $delParam, $level, $extra, 1, $limit);?>
    <?php endif; ?> 
  </div>
  <!-- END LIST -->
  
  <!-- START BOTTOMBAR -->
  <div class="Toolbar_inbox">
    <a href="javascript:void(0);" class="btn_a" onclick="admin.addTreeCategory(0, '<?php echo ($stable); ?>', '<?php echo ($limit); ?>');"><span>添加一级分类</span></a>
  </div>
  <!-- END BOTTOMBAR -->
</div>

<script type="text/javascript">
/**
 * 收起与展开效果
 * @param integer cid 分类ID
 * @return boolean false
 */
admin.foldCategory = function(cid)
{
  var offImg = THEME_URL + '/admin/image/off.png';
  var onImg = THEME_URL + '/admin/image/on.png';
  $('#sub_'+cid).slideToggle('fast');
  $img = $('#img_'+cid);
  if($img.attr('src') == offImg) {
    $img.attr('src', onImg);
  } else {
    $img.attr('src', offImg);
  }
  return false;
};
/**
 * 移动分类位置
 * @param integer cid 分类ID
 * @param string type 移动类型
 * @param string stable 所操作的数据表
 * @return boolean false
 */
admin.moveTreeCategory = function(cid, type, stable)
{
  // 验证数据正确性
  if(typeof cid === "undefined" || typeof type === "undefined" || typeof stable === "undefined") {
    return false;
  }
  // 提交数据，修改排序位置
  $.post(U('admin/Public/moveTreeCategory'), {cid:cid, type:type, stable:stable}, function(msg) {
    if(msg.status == 1) {
      ui.success(msg.data);
      var $category = $('#' + stable + '_' + cid);
      if (type === 'up') {
        var size = $category.prev().size();
        if (size > 0) {
          var otherId = $category.prev().attr('id');
          if (otherId.search(/^sub_[0-9]+$/) !== -1) {
            otherId = otherId.split('_').pop();
            $('#' + stable + '_' + otherId).before($category);
            $('#' + stable + '_' + otherId).before($('#sub_' + cid));
          } else {
            otherId = otherId.split('_').pop();
            $('#' + stable + '_' + otherId).before($category);
          }
        }
      } else if (type === 'down') {
        var size = $category.next().size();
        if (size > 0) {
          var otherId = $category.next().attr('id');
          if (otherId.search(/^sub_[0-9]+$/) !== -1) {
            otherId = otherId.split('_').pop();
            $('#' + stable + '_' + otherId).after($category);
            $('#' + stable + '_' + otherId).after($('#sub_' + cid));
          } else {
            otherId = otherId.split('_').pop();
            $('#' + stable + '_' + otherId).after($category);
          }
        }
      }
    } else {
      ui.error(msg.data);
    }
  }, 'json');
  return false;
};
/**
 * 添加子分类
 * @parma integer cid 分类ID
 * @param string stable 所操作的数据表
 * @parma integer limit 字数限制
 * @return boolean false
 */
admin.addTreeCategory = function(cid, stable, limit)
{
  if(typeof cid === "undefined" || typeof stable === "undefined") {
    return false;
  }
  admin.foldCategory(cid);
  ui.box.load(U('admin/Public/addTreeCategory')+'&cid='+cid+'&stable='+stable+'&limit='+limit, "添加分类");
  return false;
};
/**
 * 编辑分类
 * @param integer cid 分类ID
 * @return boolean false
 */
admin.upTreeCategory = function(cid, stable, limit)
{
  if(typeof cid === "undefined" || typeof stable === "undefined") {
    return false;
  }
  ui.box.load(U('admin/Public/upTreeCategory')+'&cid='+cid+'&stable='+stable+'&limit='+limit, "编辑分类");
  return false;
};
/**
 * 删除分类
 * @param integer cid 分类ID
 * @return boolean false
 */
admin.rmTreeCategory = function(cid, stable, app, module, method)
{
  if(typeof cid === "undefined") {
    return false;
  }
  // 删除操作
  if(confirm("是否删除该分类？")) {
    $.post(U('admin/Public/rmTreeCategory'), {cid:cid, stable:stable, _app:app, _module:module, _method:method}, function(msg) {
      if(msg.status == 1) {
        ui.success(msg.data);
        location.href = location.href;
        return false;
      } else {
        ui.error(msg.data);
        return false;
      }
    }, 'json');
  }
  return false;
};
</script>

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