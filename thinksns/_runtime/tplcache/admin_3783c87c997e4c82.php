<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="__APP__/admin_header.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo ($site["site_name"]); ?> - <?php echo ($site["site_slogan"]); ?></title>
<script type="text/javascript" src="__THEME__/js/jquery.js"></script>
<script type="text/javascript">
var SITE_URL ='<?php echo SITE_URL; ?>';
var APPNAME   = '<?php echo APP_NAME; ?>';
/* 按下F5时仅刷新iframe页面 */
function inactiveF5(e) {
	e=window.event||e;
	var key = e.keyCode;
	if (key == 116){
		parent.MainIframe.location.reload();
		if(document.all) {
			e.keyCode = 0;
			e.returnValue = false;
		}else {
			e.cancelBubble = true;
			e.preventDefault();
		}
	}
}

function nof5() {
    return ;
	if(window.frames&&window.frames[0]) {
		window.frames[0].focus();
		for (var i_tem = 0; i_tem < window.frames.length; i_tem++) {
			if (document.all) {
				window.frames[i_tem].document.onkeydown = new Function("var e=window.frames[" + i_tem + "].event; if(e.keyCode==116){parent.MainIframe.location.reload();e.keyCode = 0;e.returnValue = false;};");
			}else {
				window.frames[i_tem].onkeypress = new Function("e", "if(e.keyCode==116){parent.MainIframe.location.reload();e.cancelBubble = true;e.preventDefault();}");
			}
		} //END for()
	} //END if()
}
//模拟ts U函数 需要预先定义JS全局变量 SITE_URL 和 APPNAME

var U =function(url,params){
	var website = SITE_URL+'/index.php';
	url = url.split('/');
	if(url[0]=='' || url[0]=='@')
		url[0] = APPNAME;
	if (!url[1])
		url[1] = 'Index';
	if (!url[2])
		url[2] = 'index';
	website = website+'?app='+url[0]+'&mod='+url[1]+'&act='+url[2];
	if(params){
		params = params.join('&');
		website = website + '&' + params;
	}
	return website;
};

function refresh() {
	parent.MainIframe.location.reload();
}

function addTonav(name,url){
	var appname = url.split('/');
	$('.main_nav').append('<a href="#" onclick="gotoApp(this,\''+url+'\')" appname="'+appname[0]+'">'+name+'</a>');
	$.post(U('admin/Home/addNav'),{appname:appname[0],url:url},function(){});}

function removeFromNav(app){
	$('.main_nav').find('a').each(function(){
		if($(this).attr('appname') == app){
			$(this).remove();
			$.post(U('admin/Home/removeNav'),{appname:app},function(){});}
	});
}

function gotoApp(obj,url){
	
	switchChannel('apps');

	$('.main_nav').find('a').removeClass('on');

	$(obj).addClass('on');

	obj.className = 'on';

	parent.MainIframe.location = U(url);

}

document.onkeydown=inactiveF5;

</script>
</head>

<body scroll="no" style="margin:0; padding:0;" onLoad="nof5()">

<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3">
		<div class="header"><!-- 头部 begin -->
		    <div class="logo">
		    	<a href="<?php echo U('admin/Index/index');?>"><strong style="font-size:18px;"><?php echo L('SYSTEM_MANAGEMENT_CENTER');?></strong></a>
		    </div>
		    <div class="nav_sub">
		    	<?php echo L('PUBLIC_HELLO');?>,<?php echo ($user["uname"]); ?>&nbsp; | <a href="<?php echo U('public/Index/index');?>"><?php echo L('SYSTEM_BACK_TO_FRONT');?></a> | <a href="javascript:void(0);" onClick="refresh();"><?php echo L('SYSTEM_REFRESH');?></a> | <a href="<?php echo U('admin/Public/logout');?>"><?php echo L('PUBLIC_LOGOUT');?></a><br/>
		    	<div id="TopTime"></div>
		    </div>
		    <div class="main_nav">
		    	<?php if(is_array($channel)): ?><?php $i = 0;?><?php $__LIST__ = $channel?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><a id="channel_<?php echo ($key); ?>" <?php if(($key)  ==  "index"): ?>class="on"<?php endif; ?> href="javascript:void(0)" onclick="switchChannel('<?php echo ($key); ?>');" hidefocus="true" style="outline:none;"><?php echo ($vo); ?></a><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
		    	<?php if(is_array($nav)): ?><?php $i = 0;?><?php $__LIST__ = $nav?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><a href="#" onclick="gotoApp(this,'<?php echo ($vo[url]); ?>')" appname="<?php echo ($vo["appname"]); ?>"><?php echo ($vo["name"]); ?></a><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>	
			</div>                   
		</div>
		<div class="header_line"><span>&nbsp;</span></div>
	</td>
  </tr>
  <tr>
  	<td width="200px" height="100%" valign="top" id="FrameTitle" background="__APP__/image/left_bg.gif">
  		<div class="LeftMenu">
		<?php $iterator = 1;
		  $home_url = ''; ?>
  		<!-- 第一级菜单，即大频道 -->
  		<?php foreach($menu as $menu_1_name => $menu_2) { ?>
	      	<ul class="MenuList" id="root_<?php echo ($menu_1_name); ?>" <?php if(($menu_1_name)  !=  "index"): ?>style="display:none;"<?php endif; ?>>
	      	<!-- 第二级菜单 -->
	      	<?php foreach($menu_2 as $menu_2_name => $menu_3) { ?>
		        <li class="treemenu">
		          <a id="root_<?php echo ($iterator); ?>" class="actuator" href="javascript:void(0)" onClick="switch_root_menu('<?php echo ($iterator); ?>');" hidefocus="true" style="outline:none;"><?php echo ($menu_2_name); ?></a>
		          <ul id="tree_<?php echo ($iterator); ?>" class="submenu">
		            <?php ++ $iterator; ?>
		          	<!-- 第三级菜单 -->
		          	<?php foreach($menu_3 as $menu_3_name => $menu_3_url) { ?>
                        <?php $home_url = empty($home_url) ? $menu_3_url : $home_url; ?>
		            	<li><a id="menu_<?php echo ($iterator); ?>" href="javascript:void(0)" onClick="switch_sub_menu('<?php echo ($iterator); ?>', '<?php echo ($menu_3_url); ?>');" class="submenuA" hidefocus="true" style="outline:none;"><?php echo ($menu_3_name); ?></a></li>
						<?php ++ $iterator; ?>
					<?php } ?>
		          </ul>
		        </li>
			<?php } ?>
	      	</ul>
		<?php } ?>
		</div>
	</td>

    <td>
   	  <iframe onload="nof5()" id="MainIframe" name="MainIframe" scrolling="yes"  width="100%" height="100%" frameborder="0" noresize> </iframe>
	</td>
  </tr>
</table>

</body>

<script type="text/javascript">
	var current_channel   = null;
	var current_menu_root = null;
	var current_menu_sub  = null;
	var viewed_channel	  = new Array();
	
	$(document).ready(function(){
		switchChannel('index');
	});
	
	//切换频道（即头部的tab）
	function switchChannel(channel) {

		//if(current_channel == channel) return false;
		$('.main_nav').find('a').removeClass('on');

		$('#channel_'+current_channel).removeClass('on');
		$('#channel_'+channel).addClass('on');
		
		$('#root_'+current_channel).css('display', 'none');
		$('#root_'+channel).css('display', 'block');
		
		var tmp_menulist = $('#root_'+channel).find('a');
		tmp_menulist.each(function(i, n) {
			// 防止重复点击ROOT菜单
			if( i == 0 && $.inArray($(n).attr('id'), viewed_channel) == -1 ) {
				$(n).click();
				viewed_channel.push($(n).attr('id'));
			}
			if ( i == 1 ) {
				$(n).click();
			}
		});

		current_channel = channel;
	}
	
	function switch_root_menu(root) {
		root = $('#tree_'+root);
		if (root.css('display') == 'block') {
			root.css('display', 'none');
			root.parent().css('backgroundImage', 'url(__APP__/image/ArrOn.png)');
		}else {
			root.css('display', 'block');
			root.parent().css('backgroundImage', 'url(__APP__/image/ArrOff.png)');
		}
	}
	
	function switch_sub_menu(sub, url) {
		if(current_menu_sub) {
			$('#menu_'+current_menu_sub).attr('class', 'submenuA');
		}
		$('#menu_'+sub).attr('class', 'submenuB');
		current_menu_sub = sub;
		
		parent.MainIframe.location = url;
	}
	
	
</script>
</html>