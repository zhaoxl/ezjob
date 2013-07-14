<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if(($_title)  !=  ""): ?><?php echo ($_title); ?> - <?php echo ($site["site_name"]); ?><?php else: ?><?php echo ($site["site_name"]); ?> - <?php echo ($site["site_slogan"]); ?><?php endif; ?></title>
<meta content="<?php if(($_keywords)  !=  ""): ?><?php echo ($_keywords); ?><?php else: ?><?php echo ($site["site_header_keywords"]); ?><?php endif; ?>" name="keywords">
<meta content="<?php if(($_description)  !=  ""): ?><?php echo ($_description); ?><?php else: ?><?php echo ($site["site_header_description"]); ?><?php endif; ?>" name="description">
<?php echo Addons::hook('public_meta');?>
<link href="__THEME__/image/favicon.ico?v=<?php echo ($site["sys_version"]); ?>" type="image/x-icon" rel="shortcut icon">
<!-- <link href="__THEME__/css/global.css?v=<?php echo ($site["sys_version"]); ?>" rel="stylesheet" type="text/css" />
<link href="__THEME__/css/module.css?v=<?php echo ($site["sys_version"]); ?>" rel="stylesheet" type="text/css" />
<link href="__THEME__/css/menu.css?v=<?php echo ($site["sys_version"]); ?>" rel="stylesheet" type="text/css" />
<link href="__THEME__/css/form.css?v=<?php echo ($site["sys_version"]); ?>" rel="stylesheet" type="text/css" />
<link href="__THEME__/css/jquery.atwho.css?v=<?php echo ($site["sys_version"]); ?>" rel="stylesheet" type="text/css" /> -->
<link href="__THEME__/css/css.php?t=css&f=global.css,module.css,menu.css,form.css,jquery.atwho.css&v=<?php echo ($site["sys_version"]); ?>.css" rel="stylesheet" type="text/css" />
<?php if(!empty($appCssList)): ?>
<?php if(is_array($appCssList)): ?><?php $i = 0;?><?php $__LIST__ = $appCssList?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$cl): ?><?php ++$i;?><?php $mod = ($i % 2 )?><link href="<?php echo APP_PUBLIC_URL;?>/<?php echo ($cl); ?>?v=<?php echo ($site["sys_version"]); ?>" rel="stylesheet" type="text/css"/><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
<?php endif; ?>
<script>
/**
 * 全局变量
 */
var SITE_URL  = '<?php echo SITE_URL; ?>';
var UPLOAD_URL= '<?php echo UPLOAD_URL; ?>';
var THEME_URL = '__THEME__';
var APPNAME   = '<?php echo APP_NAME; ?>';
var MID		  = '<?php echo $mid; ?>';
var UID		  = '<?php echo $uid; ?>';
var initNums  =  '<?php echo $initNums; ?>';
var SYS_VERSION = '<?php echo $site["sys_version"]; ?>'
// Js语言变量
var LANG = new Array();
</script>
<?php if(!empty($langJsList)) { ?>
<?php if(is_array($langJsList)): ?><?php $i = 0;?><?php $__LIST__ = $langJsList?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><script src="<?php echo ($vo); ?>?v=<?php echo ($site["sys_version"]); ?>"></script><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
<?php } ?>
<!-- <script src="__THEME__/js/jquery-1.7.1.min.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/jquery.form.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/common.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/core.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/module.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/module.common.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/jwidget_1.0.0.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/jquery.atwho.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/jquery.caret.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/ui.core.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<script src="__THEME__/js/ui.draggable.js?v=<?php echo ($site["sys_version"]); ?>"></script> -->
<script src="__THEME__/js/js.php?t=js&f=jquery-1.7.1.min.js,jquery.form.js,common.js,core.js,module.js,module.common.js,jwidget_1.0.0.js,jquery.atwho.js,jquery.caret.js,ui.core.js,ui.draggable.js&v=<?php echo ($site["sys_version"]); ?>.js"></script>
<script src="__THEME__/js/plugins/core.comment.js?v=<?php echo ($site["sys_version"]); ?>"></script>
<?php echo Addons::hook('public_head',array('uid'=>$uid));?>
</head>
<body>

<div id="body_page" name='body_page'>
    <div id="body-bg">
    <div id="header" name="header">
    	<?php echo constant(" 未登录时 *");?>
    	<?php if( !isset($_SESSION["mid"])): ?><div class="header-wrap">
        	<div class="head-bd">
                <!-- logo -->
                <div class="reg">
                    <a href="<?php echo U('public/Register');?>"><?php echo L('PUBLIC_REGISTER');?></a>
                    <i class="vline"> | </i>
                    <a href="<?php echo U('public/Passport/login');?>"><?php echo L('PUBLIC_LOGIN');?></a>
                </div>
                <div class="logo" <?php if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 6.0') !== false): ?>style="_filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo ($site["logo"]); ?>', sizingMethod='crop');_background:none;"<?php else: ?>style="background:url(<?php echo ($site["logo"]); ?>) no-repeat;"<?php endif; ?>><a href="<?php echo SITE_URL;?>"></a></div>
                <!-- logo -->
            </div>
		</div><?php endif; ?>

		<?php echo constant(" 登录后 *");?>
		<?php if(isset($_SESSION["mid"])): ?><div class="header-wrap">
        	<div class="head-bd">
                <!-- logo -->
                <div class="logo" <?php if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 6.0') !== false): ?>style="_filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php echo ($site["logo"]); ?>', sizingMethod='crop');_background:none;"<?php else: ?>style="background:url(<?php echo ($site["logo"]); ?>) no-repeat;"<?php endif; ?>>
                    <a href="<?php echo SITE_URL;?>"></a>
                </div>
                <!-- logo -->
                <?php if($user['is_init'] == 1): ?>
                <div class="nav">
                    <ul>
                        <?php if(is_array($site_top_nav)): ?><?php $i = 0;?><?php $__LIST__ = $site_top_nav?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$st): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li <?php if(APP_NAME == $st['app_name'] || $_GET['page'] == $st['app_name']): ?> class="current" <?php endif; ?> ><a href="<?php echo ($st["url"]); ?>" target="<?php echo ($st["target"]); ?>" class="app"><?php echo ($st["navi_name"]); ?></a>
                            <?php if(isset($st['child'])): ?><div model-node="drop_menu_list" class="dropmenu" style="width:100px;display:none;">
                                <dl class="acc-list" >
                                    <?php if(is_array($st["child"])): ?><?php $i = 0;?><?php $__LIST__ = $st["child"]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$stc): ?><?php ++$i;?><?php $mod = ($i % 2 )?><dd><a href="<?php echo ($stc["url"]); ?>" target="<?php echo ($stc["target"]); ?>"><?php echo (getShort($stc["navi_name"],6)); ?></a></dd><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
                                </dl>
                            </div><?php endif; ?>
                          </li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
                        <li style="*z-index:100;">
                        <a href="###" class="app">应用</a>
                        <div model-node="drop_menu_list" class="dropmenu" style="width:370px;left:-50px;display:none;z-index:100;">
                            <ul class="acc-list app-list clearfix">
                                <?php if(is_array($site_nav_apps)): ?><?php $i = 0;?><?php $__LIST__ = $site_nav_apps?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$li): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li><a href="<?php echo U($li['app_name']);?>"><img src="<?php echo empty($li['icon_url_large']) ? APPS_URL.'/'.$li['app_name'].'/Appinfo/icon_app_large.png':$li['icon_url_large']; ?>" width="50" height="50" /><?php echo (getShort($li["app_alias"],4)); ?></a></li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
                                <li><a href="<?php echo U('public/App/addapp');?>"><img src="__THEME__/image/more.png" width="50" height="50" />更多应用</a></li>
                            </ul>
                        </div>
                        </li>
                    </ul>
                </div>
                <?php endif; ?>
                 <?php if(($user["is_init"])  ==  "0"): ?><div class="person">
                    <ul>
                        <li model-node="person" class="dorp-right"><a href="javascript:void(0);" class="app name" style="cursor:default">欢迎，<?php echo ($user['uname']); ?></a></li>
                        <li class="dorp-right"><a href="<?php echo U('public/Passport/logout');?>" class="app name">退出</a></li>
                    </ul>
                  </div>
                <?php else: ?>
                <div class="search">
                    <div id="mod-search" model-node="drop_search">
                    <form name="search_feed" id="search_feed" method="get" action="<?php echo U('public/Search/index');?>">
                        <input name="app" value="public" type="hidden"/>
                        <input name="mod" value="Search" type="hidden"/>
                        <input type="hidden" name="t" value="2"/>
                        <input type="hidden" name="a" value="public"/>
                        <dl>
                            <dt class="clearfix"><input id="search_input" class="s-txt left"  type="text" value="搜微博 / 昵称 / 标签" onfocus="this.value=''" onblur="setTimeout(function(){ $('#search-box').remove();} , 200);if(this.value=='') this.value='搜微博 / 昵称 / 标签';" event-node="searchKey" name='k'  autocomplete="off"><a href="javascript:void(0)" class="ico-search left" onclick="if(getLength($('#search_input').val()) && $('#search_input').val()!=='搜微博 / 昵称 / 标签'){ $('#search_feed').submit(); return false;}"></a>
                            </dt>
                        </dl>
                    </form>
                    </div>
                </div> 
                <div class="person">
                    <ul>
                        <li model-node="person" class="dorp-right">
                            <a href="<?php echo ($user['space_url']); ?>" class="username"><?php echo (getShort($user['uname'],6)); ?></a>
                        </li>                       
                        <li model-node="notice" class="dorp-right"><a href="javascript:void(0);" class="app"><?php echo L('PUBLIC_MESSAGE');?></a>
                            <div  class="dropmenu" model-node="drop_menu_list">
                            	<ul class="message_list_container message_list_new"  style="display:none">
                                    <li rel="new_folower_count" style="display:none">
                                        <span></span>，<a href="<?php echo U('public/Index/follower',array('uid'=>$mid));?>"><?php echo L('PUBLIC_FOLLOWERS_REMIND');?></a></li>
                                    <li rel="unread_comment" style="display:none"><span></span>，<a href="<?php echo U('public/Comment/index',array('type'=>'receive'));?>">
                                        <?php echo L('PUBLIS_MESSAGE_REMIND');?></a></li>
                                    <li rel="unread_message" style="display:none"><span></span>，<a href="<?php echo U('public/Message');?>" ><?php echo L('PUBLIS_MESSAGE_REMIND');?></a></li>
                                    <li rel="unread_atme" style="display:none"><span></span>，<a href="<?php echo U('public/Mention');?>"><?php echo L('PUBLIS_MESSAGE_REMIND');?></a></li>
                                    <li rel="unread_notify" style="display:none"><span></span>，<a href="<?php echo U('public/Message/notify');?>"><?php echo L('PUBLIS_MESSAGE_REMIND');?></a></li>
                                </ul>
                                <dl class="acc-list W-message" >
                                    <dd><a  href="<?php echo U('public/Mention/index');?>">@提到我的</a></dd>
                                    <dd><a  href="<?php echo U('public/Comment/index', array('type'=>'receive'));?>">收到的评论</a></dd>
                                    <dd><a  href="<?php echo U('public/Comment/index', array('type'=>'send'));?>">发出的评论</a></dd>
                                    <dd><a  href="<?php echo U('public/Message/index');?>">我的私信</a></dd>
                                    <dd><a  href="<?php echo U('public/Message/notify');?>">系统消息</a></dd>
                                    <!-- 消息菜单钩子 -->
                                    <?php echo Addons::hook('header_message_dropmenu');?>
                                <?php if(CheckPermission('core_normal','send_message')){ ?>
                                <dd class="border"><a event-node="postMsg" href="javascript:void(0)" onclick="ui.sendmessage()"><?php echo L('PUBLIC_SEND_PRIVATE_MESSAGE');?>&raquo;</a></dd>
                                <?php } ?>
                                </dl>
                            </div>
                        </li>
                        <li model-node="account" class="dorp-right"><a href="javascript:void(0);" class="app"><?php echo L('PUBLIC_ACCOUNT');?></a>
                            <div model-node="drop_menu_list" class="dropmenu" style="width:100px">
                                <dl class="acc-list">
                                <dd><a href="<?php echo U('public/Account/index');?>"><?php echo L('PUBLIC_SETTING');?></a></dd>
                                
                                <?php if(CheckTaskSwitch()): ?>
                                <dd><a href="<?php echo U('public/Task/index');?>">任务中心</a></dd>
                                <dd><a href="<?php echo U('public/Medal/index');?>">勋章馆</a></dd>
                                <?php endif; ?>
                                
                                <dd><a href="<?php echo U('public/Rank/weibo');?>">排行榜</a></dd>
                                <?php if(isInvite() && CheckPermission('core_normal','invite_user')): ?>
                                <dd><a href="<?php echo U('public/Invite/invite');?>"><?php echo L('PUBLIC_INVITE_COLLEAGUE');?></a></dd>
                                <?php endif; ?>
                                <!-- 个人设置菜单钩子 -->
                                <?php echo Addons::hook('header_account_dropmenu');?>
                                <?php if(CheckPermission('core_admin','admin_login')){ ?>
                                <dd><a href="<?php echo U('admin');?>"><?php echo L('PUBLIC_SYSTEM_MANAGEMENT');?></a></dd>
                                <?php } ?>

                                <dd class="border"><a href="<?php echo U('public/Passport/logout');?>"><?php echo L('PUBLIC_LOGOUT');?>&raquo;</a></dd>
                                <dd></dd>
                                </dl>
                            </div>
                        </li>
                    </ul>
                </div>        
                <?php if(MODULE_NAME !='Register'): ?>
                <div id="message_container" class="layer-massage-box" style="display:none">
                	<ul class="message_list_container" >
                        <li rel="new_folower_count" style="display:none"><span></span>，<a href="<?php echo U('public/Index/follower',array('uid'=>$mid));?>"><?php echo L('PUBLIC_FOLLOWERS_REMIND');?></a></li>
                		<li rel="unread_comment" style="display:none"><span></span>，<a href="<?php echo U('public/Comment/index',array('type'=>'receive'));?>"><?php echo L('PUBLIS_MESSAGE_REMIND');?></a></li>
                        <li rel="unread_message" style="display:none"><span></span>，<a href="<?php echo U('public/Message');?>" ><?php echo L('PUBLIS_MESSAGE_REMIND');?></a></li>
 	                    <li rel="unread_atme" style="display:none"><span></span>，<a href="<?php echo U('public/Mention');?>"><?php echo L('PUBLIS_MESSAGE_REMIND');?></a></li>
     	                <li rel="unread_notify" style="display:none"><span></span>，<a href="<?php echo U('public/Message/notify');?>"><?php echo L('PUBLIS_MESSAGE_REMIND');?></a></li>
     	                <li rel="unread_group_atme" style="display:none"><span></span>，<a href="<?php echo U('group/SomeOne/index');?>"><?php echo L('PUBLIS_MESSAGE_REMIND');?></a></li>
     	                <li rel="unread_group_comment" style="display:none"><span></span>，<a href="<?php echo U('group/SomeOne/index');?>"><?php echo L('PUBLIS_MESSAGE_REMIND');?></a></li> 
                	</ul>
                <a href="javascript:void(0)" onclick="core.dropnotify.closeParentObj()" class="ico-close1"></a>
                </div>
                <?php endif; ?><?php endif; ?>
        	</div>
        </div>
        <?php if(MODULE_NAME != 'Search'): ?>
        <div id="search"  class="mod-at-wrap search_footer" model-node='search_footer' style="display:none;z-index:-1">
            <div class="search-wrap">
                <div class="input">
                     <form id="search_form" action="<?php echo U('public/Search/index');?>" method="GET">
                        <div class="search-menu" model-node='search_menu' model-args='a=<?php echo ($curApp); ?>&t=<?php echo ($curType); ?>'>
                            <a href="javascript:;" id='search_cur_menu'><?php echo (($curTypeName)?($curTypeName):"全站"); ?><i class="ico-more"></i></a>
                        </div>
                        <input name="app" value="public" type="hidden" />
                        <input name="mod" value="Search" type="hidden" />
                        <input name="a" value="<?php echo ($curApp); ?>" id='search_a' type="hidden"/>
                        <input name="t" value="<?php echo ($curType); ?>" id='search_t' type="hidden"/>
                        <input name="k" value="<?php echo (t($_GET['k'])); ?>" type="text" class="s-txt" onblur="this.className='s-txt'" onfocus="this.className='s-txt-focus'" autocomplete="off">
                        <a class="btn-red left" href="javascript:void(0);" onclick="$('#search_form').submit();"><span class="ico-search"></span></a>
                    </form>
                </div>
            </div>
        </div>
        <div class="mod-at-wrap" id="search_menu" ison='no' style="display:none" model-node="search_menu_ul">
        <div class="mod-at">
            <div class="mod-at-list">
                <ul class="at-user-list">
                    <li onclick="core.search.doShowCurMenu(this)" a='public' t='' typename='<?php echo L('PUBLIC_ALL_WEBSITE');?>'><?php echo L('PUBLIC_ALL_WEBSITE');?></li>
                <?php if(is_array($menuList)): ?><?php $i = 0;?><?php $__LIST__ = $menuList?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$m): ?><?php ++$i;?><?php $mod = ($i % 2 )?><?php if($m['app_name'] == $curApp && $m['type_id'] == $curType){
                            $curTypeName = $m['type'];
                        } ?>
                    <li onclick="core.search.doShowCurMenu(this)" a='<?php echo ($m["app_name"]); ?>' t='<?php echo ($m["type_id"]); ?>' typename='<?php echo ($m["type"]); ?>'><?php echo ($m["type"]); ?></li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>   
                </ul>
            </div>
        </div>
        </div>
       <?php endif; ?> 
    <script type="text/javascript">
    $(document).ready(function(){
        $("#mod-product dd").hover(function() {
            $(this).addClass("hover");
        },function() {
            $(this).removeClass("hover");
        });
        core.plugInit('search');
    });
    core.plugFunc('dropnotify',function(){
        setTimeout(function(){
            core.dropnotify.init('message_list_container','message_container');
        },320);   
    });
    </script><?php endif; ?>
    </div>
<?php //出现注册提示的页面
$show_register_tips = array('public/Profile','public/Topic','weiba/Index');
if(!$mid && in_array(APP_NAME.'/'.MODULE_NAME,$show_register_tips)){ ?>
<?php $registerConf = model('Xdata')->get('admin_Config:register'); ?>
<!--未登录前-->
<div class="login-no-bg">
  <div class="login-no-box boxShadow clearfix">       
    <div class="login-reg right">
        <?php if($registerConf['register_type'] == 'open'){ ?>
        <a href="<?php echo U('public/Register/index');?>" class="btn-reg">立即注册</a>
        <?php } ?>
        <span>已有帐号？<a href="javascript:quickLogin()">立即登录</a></span>
    </div>
    <p class="left"><span>欢迎来到<?php echo ($site["site_name"]); ?></span>赶紧注册与朋友们分享快乐点滴吧！</p>
  </div>
</div>
<?php } ?>
    <div id="page-wrap">
        <div id="main-wrap">
            <div class="profile-title  boxShadow">
                <div class="person-info-face">
    <a href="<?php echo U('public/Profile/index', array('uid'=>$uid));?>" title="<?php echo ($user_info[$uid]['uname']); ?>"><img src="<?php echo ($user_info[$uid]['avatar_big']); ?>" /></a>
</div>
<div class="person-info clearfix">
    <dl class="person-info-t clearfix">
        <dd>
            <div class="name">
                <strong><a href="<?php echo U('public/Profile/index', array('uid'=>$uid));?>"><?php echo ($user_info[$uid]['uname']); ?></a></strong>
                <div class="person-icon"><?php if(is_array($userGroupData[$user_info[$uid]['uid']])): ?><?php $i = 0;?><?php $__LIST__ = $userGroupData[$user_info[$uid]['uid']]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><img style="width:auto;height:auto;display:inline;cursor:pointer;vertical-align:-2px;" src="<?php echo ($vo['user_group_icon_url']); ?>" title="<?php echo ($vo['user_group_name']); ?>" />&nbsp;<?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
                <a href="<?php echo U('public/Index/scoredetail');?>" target="_blank"><img style="width:auto;height:auto;display:inline;cursor:pointer;vertical-align:0;" src="<?php echo ($userCredit["level"]["src"]); ?>" event-node='ico_level_right' /></a></div>

            </div>
            
            <div class="grade"><?php if($user_info[$uid]['sex'] == 1): ?><i class="ico-male"></i><?php else: ?><i class="ico-female"></i><?php endif; ?>&nbsp;<?php echo ($user_info[$uid]['location']); ?></div>
            <?php if(!empty($user_info[$uid]['intro'])){ ?>
                <div class="grade">个人简介：<?php echo (getShort($user_info[$uid]['intro'],100)); ?></div>
            <?php } ?>
            <?php if($user_tag[$user_info[$uid]['uid']]){ ?>
                <div class="grade tag-lists">
                        个人标签：
                        <?php if(is_array($user_tag[$user_info[$uid]['uid']])): ?><?php $i = 0;?><?php $__LIST__ = $user_tag[$user_info[$uid]['uid']]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$u_t_v): ?><?php ++$i;?><?php $mod = ($i % 2 )?><a href="<?php echo U('public/Search/index',array('t'=>3,'a'=>'public','k'=>$u_t_v));?>"><?php echo ($u_t_v); ?></a>&nbsp;&nbsp;<?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
                    
                </div>
            <?php } ?>
            
            <div class="btn"><p class="left">
                <?php if($mid != $user_info[$uid]['uid'] && $mid){ ?>
                    <?php echo W('FollowBtn', array('fid'=>$user_info[$uid]['uid'], 'uname'=>$user_info[$uid]['uname'], 'follow_state'=>$follow_state[$user_info[$uid]['uid']], 'isrefresh'=>1));?>
                    <?php if(CheckPermission('core_normal','send_message')){ ?>
                    <?php if(($userPrivacy["message"])  ==  "0"): ?><a onclick="ui.sendmessage(<?php echo ($user_info[$uid]['uid']); ?>, 0)" href="javascript:void(0)" event-node="postMsg" class="ml5 btn-cancel"><span>发私信</span></a><?php endif; ?>&nbsp;
                    <?php } ?>
                    <div class="more-box"><span class="ml5"><a href="javascript:;" event-node="more_operation" class="ml5">更多</a></span>
                    <div id="more_operation" class="layer-list more-drop" style="display:none;">    
                        <ul onmouseover="$('#more_operation').show();" onmouseout="$('#more_operation').hide()">
                            <li id="blacklist"><?php echo W('Blacklist',array('tpl'=>'btn', 'fid'=>$user_info[$uid]['uid'], 'isrefresh'=>1));?></li>
                            <?php if($follow_state[$user_info[$uid]['uid']]['following'] == 1){ ?>
                                <li><a href="javascript:void(0)" onclick="setFollowGroup(<?php echo ($user_info[$uid]['uid']); ?>, 1)">设置分组</a></li>
                            <?php } ?>
                        </ul>
                    </div></div>

                <?php } ?>
            </p></div>
            
        </dd>
        
    </dl>
    <ul class="person-info-b clearfix">
        <li><a href="<?php echo U('public/Profile/index',array('type'=>$type,'feed_type'=>'','uid'=>$uid));?>" <?php if(ACTION_NAME=='index'||ACTION_NAME=='feed'){ ?>class="current"<?php } ?>><span>微博</span><strong event-node="weibo_count" event-args="uid=<?php echo ($user_info[$uid]['uid']); ?>"><?php echo (($userData["weibo_count"])?($userData["weibo_count"]):0); ?></strong></a></li>
        <li><a href="<?php echo U('public/Profile/following',array('uid'=>$user_info[$uid]['uid']));?>" <?php if((ACTION_NAME)  ==  "following"): ?>class="current"<?php endif; ?>><span>关注</span><strong event-node="<?php if($user_info[$uid]['uid']==$mid){ ?>following<?php } ?>_count" event-args="uid=<?php echo ($user_info[$uid]['uid']); ?>"><?php echo (($userData["following_count"])?($userData["following_count"]):0); ?></a></strong></li>
        <li class="no-border"><a href="<?php echo U('public/Profile/follower',array('uid'=>$user_info[$uid]['uid']));?>"
         <?php if((ACTION_NAME)  ==  "follower"): ?>class="current"<?php endif; ?>><span>粉丝</span><strong event-node="<?php if($user_info[$uid]['uid']!=$mid){ ?>following<?php } ?>_count" event-args="uid=<?php echo ($user_info[$uid]['uid']); ?>"><?php echo (($userData["follower_count"])?($userData["follower_count"]):0); ?></a></strong></li>
        <!-- <li class="no-border <?php if(($current)  ==  "collection"): ?>current<?php endif; ?>"><a href="<?php echo U('public/Collection/index');?>"><span>收藏</span><?php echo (($userData["favorite_count"])?($userData["favorite_count"]):0); ?></a></li> -->
    </ul>
</div>

<script type="text/javascript">
// 事件监听
M.addEventFns({
    ico_level_right: {
        load: function() {
            var offset = $(this).offset();
            var top = offset.top + 23;
            var left = offset.left - 10;
            var html = '<div id="layer_level_right" class="layer-open experience" style="display:none;position:absolute;top:'+top+'px;left:'+left+'px;">\
                        <dl>\
                        <dd><?php echo L('PUBLIC_USER_LEVEL');?>：<?php echo ($userCredit["level"]["name"]); ?></dd>\
                        <dd><?php echo L('PUBLIC_USER_POINTS_CALCULATION',array('num'=>$userCredit['credit']['experience']['value'],'experience'=>$userCredit['creditType'][$userCredit['level']['level_type']]));?></dd>\
                        <dd class="textb"><?php echo L('PUBLI_USER_UPGRADE_TIPS',array('num'=>$userCredit['level']['nextNeed'],'experience'=>$userCredit['creditType'][$userCredit['level']['level_type']]));?></dd>\
                        </dl>\
                        </div>';
            $("body").append(html);

            this._model = document.getElementById("layer_level_right");
        },
        mouseenter: function() {
            $(this._model).css('display', 'block');
        },
        mouseleave: function() {
            $(this._model).css('display', 'none');
        }
    },
    ico_wallet_right: {
        load: function() {
            var offset = $(this).offset();
            var top = offset.top + 23;
            var left = offset.left - 20;
            var html = '<div id="layer_wallet_right" class="layer-open scale" style="display:none;position:absolute;top:'+top+'px;left:'+left+'px;">\
                        <dl>\
                        <dt></dt>\
                        <dd><?php echo L('PUBLIC_USER_POINTS_CALCULATION',array('num'=>intval($userCredit['credit']['score']['value']),'experience'=>$userCredit['creditType']['score']));?></dd>\
                        </dl>\
                        </div>';
            $("body").append(html);
            this._model = document.getElementById("layer_wallet_right");
        },
        mouseenter: function() {
            $(this._model).css('display', 'block');
        },
        mouseleave: function() {
            $(this._model).css('display', 'none');
        }
    },
    more_operation: {
        load: function() {
            var offset = $(this).offset();
            $('#more_operation').css({'left': 8 + 'px','top': 13 + 'px','padding-top': 0 + 'px', 'position':'absolute', 'width':'85px', 'z-index':5});
        },
        click: function() {
            if($('#more_operation').css('display') == 'none') {
                $('#more_operation').css('display', '');
            } else {
                $('#more_operation').css('display', 'none');
            }
            $('body').bind('click', function(event) {
                if($(event.target).attr('event-node') != 'more_operation' && $(event.target).attr('id') != 'blacklist') {
                    setTimeout("$('#more_operation').css('display', 'none')",500);
                }
            });
        }
        // mouseleave: function(){
        //     $('#more_operation').css('display', 'none');
        // }
    }
}); 
</script>              
                
            </div>
            
            <div id="col" class="st-grid boxShadow minh content-bg">
                <?php if($userPrivacy['space'] != 1){ ?>
                <div id="col3" class="st-index-right">
   <div class="right-wrap">
    <?php if($verifyInfo){ ?>
        <div class="official-aut mb20 border-b">
            <p class="aut-bg"><img src="__THEME__/image/authentication.png" /></p>
            <p class="aut-info"><?php echo ($verifyInfo); ?></p>
        </div>
    <?php } ?>
    <?php echo W('MedalList',array('uid'=>$user_info[$uid]['uid']));?>
    <?php if($sidebar_following_list['data']){ ?>
        <div class="right-box mb20 clearfix border-b">
            <h3><a href="<?php echo U('public/Profile/following',array('uid'=>$user_info[$uid]['uid']));?>" class="right f12">更多</a><?php if($user_info[$uid]['uid']==$mid){ ?>我<?php }else{ ?>TA<?php } ?>的关注(<?php echo (($userData["following_count"])?($userData["following_count"]):0); ?>)</h3>
            <ul>
                <?php if(is_array($sidebar_following_list['data'])): ?><?php $i = 0;?><?php $__LIST__ = $sidebar_following_list['data']?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li><a href="<?php echo U('public/Profile/index',array('uid'=>$vo['fid']));?>" class="face" uid="<?php echo ($vo['fid']); ?>" event-node="face_card"><img src="<?php echo ($user_info[$vo['fid']]['avatar_small']); ?>" /></a><a href="<?php echo U('public/Profile/index',array('uid'=>$vo['fid']));?>" class="face" uid="<?php echo ($vo['fid']); ?>" event-node="face_card"><span><?php echo (getShort($user_info[$vo['fid']]['uname'],4)); ?></span></a></li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
            </ul>
        </div>
    <?php } ?>
    <?php if($sidebar_follower_list['data']){ ?>
        <div class="right-box mb20 clearfix border-b">
            <h3><a href="<?php echo U('public/Profile/follower',array('uid'=>$user_info[$uid]['uid']));?>" class="right f12">更多</a><?php if($user_info[$uid]['uid']==$mid){ ?>我<?php }else{ ?>TA<?php } ?>的粉丝(<?php echo (($userData["follower_count"])?($userData["follower_count"]):0); ?>)</h3>
            <ul>
                <?php if(is_array($sidebar_follower_list['data'])): ?><?php $i = 0;?><?php $__LIST__ = $sidebar_follower_list['data']?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li><a href="<?php echo U('public/Profile/index',array('uid'=>$vo['fid']));?>" class="face"><img src="<?php echo ($user_info[$vo['fid']]['avatar_small']); ?>" uid="<?php echo ($vo['fid']); ?>" event-node="face_card" /></a><a href="<?php echo U('public/Profile/index',array('uid'=>$vo['fid']));?>" class="face" uid="<?php echo ($vo['fid']); ?>" event-node="face_card"><span><?php echo (getShort($user_info[$vo['fid']]['uname'],4)); ?></span></a></li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
            </ul>
        </div>
    <?php } ?>
    <!-- 主页右下广告 -->
    <div style="width:230px;overflow:hidden;">
    <?php echo Addons::hook('show_ad_space', array('place'=>'profile_right'));?>    
    </div>
    </div>
</div>
                    <div id="col5" class="st-index-main">
                        <div class="extend-foot">
                            <?php if(ACTION_NAME=='index'){ $tabClass['public'] = 'current'; }
      elseif(ACTION_NAME=='data'){ $tabClass['public_data'] = 'current'; }
	  else{ $tabClass[$type] = 'current'; } ?>
<div class="tab-menu clearfix">
  <ul>
    <li class="<?php echo ($tabClass["public"]); ?>"><span><a href="<?php echo U('public/Profile/index',array('type'=>$type,'feed_type'=>'','uid'=>$uid));?>">微博</a></span></li>
    <li class="<?php echo ($tabClass["public_data"]); ?>"><span><a href="<?php echo U('public/Profile/data',array('uid'=>$uid));?>">资料</a></span></li>
	<?php if(is_array($appArr)): ?><?php $i = 0;?><?php $__LIST__ = $appArr?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><li class="<?php echo ($tabClass[$key]); ?>"><span><a href="<?php echo U('public/Profile/appList',array('type'=>$key,'uid'=>$uid));?>"><?php echo ($vo); ?></a></span></li><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
  </ul>
</div>
  
                            <div class="mod-feed-tab">
                                <ul class="inner-feed-nav">
                                    <li <?php if(($feed_type)  ==  ""): ?>class="current"<?php endif; ?>><a href="<?php echo U('public/Profile/index',array('type'=>$type,'feed_type'=>'','feed_key'=>$feed_key,'uid'=>$uid));?>">全部</a></li>
                                    <li <?php if(($feed_type)  ==  "post"): ?>class="current"<?php endif; ?>><a href="<?php echo U('public/Profile/index',array('type'=>$type,'feed_type'=>'post','feed_key'=>$feed_key,'uid'=>$uid));?>">原创</a></li>
                                    <li <?php if(($feed_type)  ==  "repost"): ?>class="current"<?php endif; ?>><a href="<?php echo U('public/Profile/index',array('type'=>$type,'feed_type'=>'repost','feed_key'=>$feed_key,'uid'=>$uid));?>">转发</a></li>
                                    <li <?php if(($feed_type)  ==  "postimage"): ?>class="current"<?php endif; ?>><a href="<?php echo U('public/Profile/index',array('type'=>$type,'feed_type'=>'postimage','feed_key'=>$feed_key,'uid'=>$uid));?>">图片</a></li>
                                    <li <?php if(($feed_type)  ==  "postfile"): ?>class="current"<?php endif; ?>><a href="<?php echo U('public/Profile/index',array('type'=>$type,'feed_type'=>'postfile','feed_key'=>$feed_key,'uid'=>$uid));?>">附件</a></li>
                                    <li <?php if(($feed_type)  ==  "postvideo"): ?>class="current"<?php endif; ?>><a href="<?php echo U('public/Profile/index',array('type'=>$type,'feed_type'=>'postvideo','feed_key'=>$feed_key,'uid'=>$uid));?>">视频</a></li>
                                </ul>
                                <span class="right">
                                    <form action="<?php echo U('public/Profile/index',array('uid'=>$uid));?>" method="post" id="searchfeed">
                                    <div class="feed-search">
                                    <input type="hidden" name="type" value="<?php echo ($type); ?>">
                                    <input type="hidden" name="feed_type" value="<?php echo ($feed_type); ?>">
                                    <!-- <input type="hidden" name="uid" value="<?php echo ($uid); ?>"> -->
                                    <input class="s-txt left"  type="text" name='feed_key' value="<?php echo ($feed_key); ?>" id='feed_key'><a href="javascript:void(0)" class="ico-search left" onclick="if(getLength($('#feed_key').val())){ $('#searchfeed').submit(); return false;}"></a>
                                    </div>
                                    </form>
                                </span>
                            </div>
                            <!--feed list-->
                            <!-- 查看他人微博  用于伪静态 FeedList中靠$_REQUEST中的uid取得用户信息 没有$_REQUEST取自己 -->
                            <?php $_REQUEST['uid'] = $uid; ?>
                            <?php echo W('FeedList',array('type'=>'space','feedApp'=>t($_GET['feedApp']),'feed_type'=>$feed_type,'feed_key'=>$feed_key,'loadnew'=>0));?>
                        </div>
                    </div>
                <?php }else{ ?>
                    <p class="extend">-_-。sorry！根据对方隐私设置，您无权查看TA的主页</p>
                <?php } ?>
            </div>
            
        </div>
    </div>
<div class="footer">
   <div class="login-footer">
    <?php if(!empty($site_bottom_nav) && $site_bottom_child_nav){ ?>
      <div class="foot clearfix">
         <?php if(is_array($site_bottom_nav)): ?><?php $i = 0;?><?php $__LIST__ = $site_bottom_nav?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$nv): ?><?php ++$i;?><?php $mod = ($i % 2 )?><dl>
            <dt><a href="<?php echo ($nv["url"]); ?>" target="<?php echo ($nv["target"]); ?>"><?php echo ($nv['navi_name']); ?></a></dt>
            <?php if(is_array($nv["child"])): ?><?php $i = 0;?><?php $__LIST__ = $nv["child"]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$cv): ?><?php ++$i;?><?php $mod = ($i % 2 )?><dd><a href="<?php echo ($cv["url"]); ?>" target="<?php echo ($cv["target"]); ?>"><?php echo ($cv['navi_name']); ?></a></dd><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
         </dl><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
      </div>
    <?php } else if(!empty($site_bottom_nav)) { ?>
      <div class="foot foot1 clearfix">
         <?php if(is_array($site_bottom_nav)): ?><?php $i = 0;?><?php $__LIST__ = $site_bottom_nav?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$nv): ?><?php ++$i;?><?php $mod = ($i % 2 )?><dl>
            <dt><a href="<?php echo ($nv["url"]); ?>" target="<?php echo ($nv["target"]); ?>"><?php echo ($nv['navi_name']); ?></a></dt>
         </dl><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
      </div>
    <?php } ?>
    <p>
      <span class="right">Powered By <a href="http://www.thinksns.com" title="开源微博系统,开源微社区" target="_blank">ThinkSNS</a></span>
      <?php echo ($GLOBALS["ts"]["site"]["site_footer"]); ?>
    </p>
  </div>
</div><!--footer end-->

</div><!--page end-->
<?php echo Addons::hook('public_footer');?>
<!-- 统计代码-->
<div id="site_analytics_code" style="display:none;">
<?php echo (base64_decode($site["site_analytics_code"])); ?>
</div>
<?php if(($site["site_online_count"])  ==  "1"): ?><script src="<?php echo SITE_URL;?>/online_check.php?uid=<?php echo ($mid); ?>&uname=<?php echo ($user["uname"]); ?>&mod=<?php echo MODULE_NAME;?>&app=<?php echo APP_NAME;?>&act=<?php echo ACTION_NAME;?>&action=trace"></script><?php endif; ?>
</body>
</html>
<script src="__THEME__/js/module.weibo.js"></script>