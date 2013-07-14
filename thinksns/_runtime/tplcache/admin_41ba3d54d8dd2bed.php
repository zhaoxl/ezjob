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
	<div class="page_tit">
    <?php if(C('DEVELOP_MODE')==true){ ?>
    <span onclick="admin.fold('page_config')"><?php echo L('PUBLIC_PAGE_CONFIGURATION');?></span><?php if(!empty($searchKeyList)): ?>
		<span onclick="admin.fold('search_config')"><?php echo L('PUBLIC_SEARCH_PAGE');?></span><?php endif; ?>
    <?php } ?>
    <?php echo ($pageTitle); ?> 
	</div>
	<!-- START 页面配置 -->
	<div id='page_config' class = "form2 list" >
  		<div class="hd"><?php echo L('PUBLIC_CHECH_IS');?></div>
  		<form action="<?php echo U('admin/Index/savePageConfig');?>" method="POST">
  		<input type="hidden" name='pageKey' value="<?php echo ($pageKey); ?>"  class="s-txt"/>
  		<input type="hidden" name='pageTitle' value="<?php echo ($pageTitle); ?>" />
  		<table width="100%" cellspacing="0" cellpadding="0" border="0">
  			<tr>
  				<th><?php echo L('PUBLIC_SYSTEM_FIELD');?></th>
  				<th class="line_l"><?php echo L('PUBLIC_ADMIN_TITLE');?></th>
  				<th class="line_l"><?php echo L('PUBLIC_HEIDDEN_TIPS');?></th>
  			  <th class="line_l"><?php echo L('PUBLIC_CLICK_TIPES');?></th>
  			</tr>
  			<?php if(is_array($pageKeyList)): ?><?php $i = 0;?><?php $__LIST__ = $pageKeyList?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$pk): ?><?php ++$i;?><?php $mod = ($i % 2 )?><?php $key = $pk;$keyType = $pageKeyData['key_type'][$key]; ?>
  			<tr overstyle="on" >
  				<td width="20%"> <input type="hidden" name='key[]' value='<?php echo ($pk); ?>'> <?php echo ($pk); ?></td>
  				<td width="30%"><input type="text" name='key_name[]' value='<?php echo ($pageKeyData['key_name'][$key]); ?>'  class="s-txt" style="width:200px" onblur="this.className='s-txt'" onfocus="this.className='s-txt-focus'" /></td>
  				<td width="20%">
  				<select name="key_hidden[]">
  					<option value="0" <?php if($pageKeyData['key_hidden'][$key]=='0'){ echo 'selected="selected"';} ?>><?php echo L('PUBLIC_SHOW');?></option>
  					<option value="1" <?php if($pageKeyData['key_hidden'][$key]=='1'){ echo 'selected="selected"';} ?>><?php echo L('PUBLIC_HIDDEN');?></option>
  				</select>
  				</td>
  				<td width="30%"><input type='text' name='key_javascript[]' value='<?php echo ($pageKeyData['key_javascript'][$key]); ?>'  class="s-txt" style="width:200px" onblur="this.className='s-txt'" onfocus="this.className='s-txt-focus'" ></td>
  				<!-- <td style="background-color:#1E325C">
  				<a onclick="admin.moveUp($(this))" class="ico_top" title="上移"><img src="<?php echo THEME_PUBLIC_URL;?>/admin/image/zw_img.gif"></a> &nbsp;&nbsp;
  				<a onclick="admin.moveDown($(this))" class="ico_btm" title="下移"><img src="<?php echo THEME_PUBLIC_URL;?>/admin/image/zw_img.gif"></a>
  				</td> -->
  			</tr><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
  		</table>
  		<div class="page_btm">
	      <input type="submit" class="btn_b" value="确定" />
	    </div>
	    </form>
  	</div>
	<!-- END 页面配置 -->
	
	<!-- START 搜索配置 -->
	<div id='search_config' class = "form2 list" >
  		<div class="hd">提示:checkbox如果默认有多个值,请以","隔开。</div>
  		<form action="<?php echo U('admin/Index/saveSearchConfig');?>" method="POST">
  		<input type="hidden" name='searchPageKey' value="<?php echo ($searchPageKey); ?>" />
  		<input type="hidden" name='pageTitle' value="<?php echo ($pageTitle); ?>" />
  		<table width="100%" cellspacing="0" cellpadding="0" border="0">
  			<tr>
  				<th>字段</th>
  				<th class="line_l">名称</th>
  				<th class="line_l">输入类型</th>
  				<th class="line_l">提示信息</th>
  				<th class="line_l">验证事件</th>
  			</tr>
  			<?php if(is_array($searchKeyList)): ?><?php $i = 0;?><?php $__LIST__ = $searchKeyList?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$pk): ?><?php ++$i;?><?php $mod = ($i % 2 )?><?php $key = is_array($pk) ? $pk[0] : $pk;
  			$keyType = $searchKeyData['key_type'][$key];
  			if(is_array($pk)){ $pk = $pk[0];} ?>
  			<tr overstyle="on" >
  				<td width="15%"><input type="hidden" name='key[]' value='<?php echo ($pk); ?>'> <?php echo ($pk); ?></td>
  				<td width="20%"><input type="text" name='key_name[]' value='<?php echo ($searchKeyData['key_name'][$key]); ?>' class="s-txt"   style="width:200px" onblur="this.className='s-txt'" onfocus="this.className='s-txt-focus'" /></td>
  				<td width="20%"><select name='key_type[]'>
  					<option value='text' <?php if(($keyType)  ==  "text"): ?>selected="selected"<?php endif; ?>>文本框:input_text</option>
  					<option value='select' <?php if(($keyType)  ==  "select"): ?>selected="selected"<?php endif; ?>>下拉框:select</option>
  					<option value='radio' <?php if(($keyType)  ==  "radio"): ?>selected="selected"<?php endif; ?>>单选框:radio</option>
  					<option value='checkbox' <?php if(($keyType)  ==  "checkbox"): ?>selected="selected"<?php endif; ?>>多选框:checkbox</option>
  					<option value='date' <?php if(($keyType)  ==  "date"): ?>selected="selected"<?php endif; ?>>日期插件:date</option>
  					<option value='hidden' <?php if(($keyType)  ==  "hidden"): ?>selected="selected"<?php endif; ?>>隐藏值:input_hidden</option>
            <option value='department' <?php if(($keyType)  ==  "department"): ?>selected="selected"<?php endif; ?>>部门选择:department</option>
            <option value='user' <?php if(($keyType)  ==  "user"): ?>selected="selected"<?php endif; ?>>用户选择:selectUser</option>
  				</select></td>
  				<td width="20%"><input type='text' name='key_tishi[]' value='<?php echo ($searchKeyData['key_tishi'][$key]); ?>' class="s-txt"  style="width:200px"  onblur="this.className='s-txt'" onfocus="this.className='s-txt-focus'" ></td>
  				<td width="20%"><input type='text' name='key_javascript[]' value='<?php echo ($searchKeyData['key_javascript'][$key]); ?>' class="s-txt"  style="width:200px" onblur="this.className='s-txt'" onfocus="this.className='s-txt-focus'" ></td>
  			</tr><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
  		</table>
  		<div class="page_btm">
	      <input type="submit" class="btn_b" value="确定" />
	    </div>
	    </form>
  	</div>
  	<!-- END 搜索配置 -->
  	
	<!-- START 搜索框 -->
	<div class="form2" id='search_form' <?php echo $_REQUEST['dosearch'] =='1'? "style='display:block;'":''; ?>>
	<form action="<?php echo ($searchPostUrl); ?>&dosearch=1" method="post">
	<?php if(is_array($searchKeyList)): ?><?php $i = 0;?><?php $__LIST__ = $searchKeyList?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$pk): ?><?php ++$i;?><?php $mod = ($i % 2 )?><?php $_pk = $pk;
  	is_array($pk) && $pk = $pk[0];
  	$key = is_array($pk) ? $pk[0] : $pk;
  	$keyName = $searchKeyData['key_name'][$key] ? $searchKeyData['key_name'][$key] :$pk; 
  	$defaultS = isset($searchData[$pk]) ? $searchData[$pk] : '';
  	$keyType = $searchKeyData['key_type'][$key] ? $searchKeyData['key_type'][$key] :'text';
  	$event = $searchKeyData['key_javascript'][$key];
  	if($keyType != 'hidden'):/*非隐藏域*/ ?>
    <dl class="lineD" id='dl_<?php echo ($pk); ?>'>
      <dt><?php echo ($keyName); ?>：</dt>
      <dd>
    <?php endif; /*非隐藏域*/ ?>
  
       	<?php /* text 支持一行多个 */
       	if($keyType == 'text'):
       	if(is_array($_pk)){
       		foreach($_pk as $v=>$vv){ ?>
       		<input name="<?php echo ($pk); ?>[]" id="form_<?php echo ($pk); ?>_<?php echo ($v); ?>" type="text" value="<?php echo ($defaultS[$v]); ?>" <?php if(($event)  !=  ""): ?>onfocus = "<?php echo ($event); ?>"<?php endif; ?>  class='s-txt' style="width:200px" onblur="this.className='s-txt'" onfocus="this.className='s-txt-focus'" > 
       		<?php echo $v = (count($_pk)-1) ? '':' - '; ?>
       	<?php }
       	}else{ ?>
       	<input name="<?php echo ($pk); ?>" id="form_<?php echo ($pk); ?>" type="text" value="<?php echo (t($defaultS)); ?>" <?php if(($event)  !=  ""): ?>onfocus = "<?php echo ($event); ?>"<?php endif; ?> class='s-txt' style="width:200px" onblur="this.className='s-txt'" onfocus="this.className='s-txt-focus'" >
       	<?php }endif; ?>
       	
        <?php if($keyType == 'department'): ?>
        <?php echo W('Department',array('inputName'=>$pk,'canChange'=>1,'tpl'=>'input','notop'=>1,'defaultName'=>$searchData['department_show'],'defaultId'=>intval($defaultS)));?>
        <?php endif; ?>

       	<?php if($keyType == 'select'): ?>
      	<select name="<?php echo ($pk); ?>" id="form_<?php echo ($pk); ?>" <?php if(($event)  !=  ""): ?>onchange = "<?php echo ($event); ?>"<?php endif; ?> class='s-select' style="width:200px">
      		<?php foreach($opt[$pk] as $sk=>$sv): ?>
      			<option value="<?php echo ($sk); ?>" <?php if($sk == $defaultS): ?> selected="selected" <?php endif; ?>><?php echo ($sv); ?></option>
      		<?php endforeach; ?>
      	</select>
      	<?php endif; ?>

        <?php if($keyType == 'user'): ?>
         <?php echo W('SearchUser', array('uids'=>$defaultS, 'name'=>$pk,'follow'=>0, 'noself'=>0, 'max'=>0));?>  
      	<?php endif; ?>
        
      	<?php if($keyType == 'radio'):
      		$nums = count($opt[$pk]);
      		$tempi = 1;
      		foreach($opt[$pk] as $sk=>$sv):
      		  $br = $nums >=6  && $tempi%3==0 ? '<br/>':'';
      		  $tempi++; ?>
        <label><input type="radio" name="<?php echo ($pk); ?>" value='<?php echo ($sk); ?>' <?php if($sk == $defaultS): ?> checked="checked"<?php endif; ?> <?php if(($event)  !=  ""): ?>onfocus = "<?php echo ($event); ?>"<?php endif; ?> ><?php echo ($sv); ?> </label> <?php echo ($br); ?>           		
      	<?php endforeach; endif; ?>
      	
      		<?php /* checkBox 默认值是以","隔开的字符串,表示可以选多个  */
      	if($keyType == 'checkbox'):
      		empty($defaultS) && $defaultS = array(); 
      		$defaultS = !is_array($defaultS) ? explode(',',trim($defaultS,',')) : $defaultS;
      		foreach($opt[$pk] as $sk=>$sv): ?>	
      	<label><input type="checkbox" name="<?php echo ($pk); ?>[]" value='<?php echo ($sk); ?>' <?php if(in_array($sk,$defaultS)): ?> checked="checked"<?php endif; ?> <?php if(($event)  !=  ""): ?>onfocus = "<?php echo ($event); ?>"<?php endif; ?> ><?php echo ($sv); ?> </label>
      	<?php endforeach; endif; ?>
      	
      	
      		<?php /* 日期插件 支持一行多个*/
      	if($keyType == 'date'):	
      	if(is_array($_pk)){
       		foreach($_pk as $v=>$vv){ ?> 
          <?php echo W('DateSelect',array('name'=>$pk."[]",'class'=>'s-txt','id'=>'from_'.$pk.'_'.$v,'value'=>$defaultS[$v],'dtype'=>'full'));?>
       		<?php echo $v == (count($_pk)-1) ? '':' — '; ?>
       	<?php }
       	}else{ ?>
       	<input name="<?php echo ($pk); ?>" type="text" class="s-txt" id="form_<?php echo ($pk); ?>" value='<?php echo ($defaultS); ?>' onfocus="core.rcalendar(this,'full');" readonly="readonly" style="width:200px;" onblur="this.className='s-txt'" onfocus="this.className='s-txt-focus'" />
       	<?php }endif; ?>
       	
       	 <?php if($keyType == 'hidden'): ?>
      	<input name="<?php echo ($pk); ?>" id="form_<?php echo ($pk); ?>" type="hidden" value="<?php echo ($defaultS); ?>"  class='s-txt'>
      	<?php endif; ?>
      	
      	 <?php if(!empty($searchKeyData['key_tishi'][$key])){ ?>
        <p><?php echo ($searchKeyData['key_tishi'][$key]); ?></p>
        <?php } ?>
     
       <?php if($keyType != 'hidden'): /*非隐藏域*/ ?> 
        </dd>
    </dl>
    <?php endif; /*隐藏域*/ ?><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
    <div class="page_btm">
      <input type="submit" value="确定" class="btn_b"> &nbsp;&nbsp;<input type="button" value="关闭" class="btn_w" onclick="admin.fold('search_form')">
    </div>
    </form>
   </div> 
	<!-- END 搜索框 -->

  <!-- START TAB框 -->
  <?php if(!empty($pageTab)): ?>
  <div class="tit_tab">
    <ul>
    <?php !$_REQUEST['tabHash'] && $_REQUEST['tabHash'] =  $pageTab[0]['tabHash']; ?>
    <?php if(is_array($pageTab)): ?><?php $i = 0;?><?php $__LIST__ = $pageTab?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$t): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li><a href="<?php echo ($t["url"]); ?>&tabHash=<?php echo ($t["tabHash"]); ?>" <?php if($t['tabHash'] == $_REQUEST['tabHash']){ echo 'class="on"';} ?>><?php echo ($t["title"]); ?></a></li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
    </ul>
  </div>
  <?php endif; ?>
  <!-- END TAB框 -->

 <!-- START TOOLBAR -->
  <div class="Toolbar_inbox">
    <div class="page right">
    <?php echo ($listData["html"]); ?>
    </div>  
  	<?php if(is_array($pageButton)): ?><?php $i = 0;?><?php $__LIST__ = $pageButton?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$b): ?><?php ++$i;?><?php $mod = ($i % 2 )?><a onclick="<?php echo ($b["onclick"]); ?>" class="btn_a"><span><?php echo ($b["title"]); ?></span></a><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>

  </div>
  <!-- END TOOLBAR -->
  
  <!-- START LIST -->
  <div class="list" id='list'>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
 	
 	<?php if($allSelected): ?>
    <th style="width:30px;">
        <input type="checkbox" id="checkbox_handle" onclick="admin.checkAll(this)" value="0">
    </th>
    <?php endif; ?>
    
   <?php if(is_array($pageKeyList)): ?><?php $i = 0;?><?php $__LIST__ = $pageKeyList?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$pk): ?><?php ++$i;?><?php $mod = ($i % 2 )?><?php $key = $pk;
   	if($pageKeyData['key_hidden'][$key]=='1'){ continue;}
   	$name = $pageKeyData['key_name'][$key] ? $pageKeyData['key_name'][$key] : $pk; ?>
    <th class="line_l"><?php echo ($name); ?></th><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
  </tr>
  <?php if(empty($listData['data'])){ ?>
  <tr><td colspan='100' align="center">没有需要显示的数据!</td></tr>
  <?php }else{ ?>
  
  <?php if(is_array($listData["data"])): ?><?php $i = 0;?><?php $__LIST__ = $listData["data"]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><tr overstyle="on" id="tr<?php echo $vo[$_listpk]; ?>">
  
  <?php if($allSelected): ?>
  <td><input type="checkbox" value="<?php echo $vo[$_listpk]; ?>" onclick="admin.checkon(this)"  name="checkbox"></td>
  <?php endif; ?>
  <?php if(is_array($pageKeyList)): ?><?php $i = 0;?><?php $__LIST__ = $pageKeyList?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$pk): ?><?php ++$i;?><?php $mod = ($i % 2 )?><?php $key = $pk;
  if($pageKeyData['key_hidden'][$key]=='1'){ continue;}
  $event = $pageKeyData['key_javascript'][$key]; ?>
  <td <?php if(($event)  !=  ""): ?>onclick = "<?php echo ($event); ?>"<?php endif; ?>>
  <?php echo $vo[$pk]; ?>
  </td><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
  </tr><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
  <?php } ?>
  
  </table>
  </div>
  <!-- END LIST -->
  
  <!-- START BOTTOMBAR -->
  <div class="Toolbar_inbox">
    <div class="page right">
    <?php echo ($listData["html"]); ?>
    </div>   
   	<?php if(is_array($pageButton)): ?><?php $i = 0;?><?php $__LIST__ = $pageButton?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$b): ?><?php ++$i;?><?php $mod = ($i % 2 )?><a onclick="<?php echo ($b["onclick"]); ?>" class="btn_a"><span><?php echo ($b["title"]); ?></span></a><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
  </div>
  <!-- END BOTTOMBAR -->
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