<?php
return array (
  'S_admin_Content_feed' => 
  array (
    'key' => 
    array (
      'feed_id' => 'feed_id',
      'uid' => 'uid',
      'type' => 'type',
      'rec' => 'rec',
    ),
    'key_name' => 
    array (
      'feed_id' => '动态ID',
      'uid' => '用户ID',
      'type' => '动态类型',
      'rec' => '回收站',
    ),
    'key_type' => 
    array (
      'feed_id' => 'text',
      'uid' => 'text',
      'type' => 'select',
      'rec' => 'hidden',
    ),
    'key_tishi' => 
    array (
      'feed_id' => '多个id之间用英文的","隔开',
      'uid' => '多个id之间用英文的","隔开',
      'type' => '',
      'rec' => '',
    ),
    'key_javascript' => 
    array (
      'feed_id' => '',
      'uid' => '',
      'type' => '',
      'rec' => '',
    ),
  ),
  'S_admin_Content_comment' => 
  array (
    'key' => 
    array (
      'comment_id' => 'comment_id',
      'uid' => 'uid',
      'app_uid' => 'app_uid',
    ),
    'key_name' => 
    array (
      'comment_id' => '评论ID',
      'uid' => '评论者ID',
      'app_uid' => '作者ID',
    ),
    'key_type' => 
    array (
      'comment_id' => 'text',
      'uid' => 'text',
      'app_uid' => 'text',
    ),
    'key_tishi' => 
    array (
      'comment_id' => '多个id之间用英文的","隔开',
      'uid' => '多个id之间用英文的","隔开',
      'app_uid' => '多个id之间用英文的","隔开',
    ),
    'key_javascript' => 
    array (
      'comment_id' => '',
      'uid' => '',
      'app_uid' => '',
    ),
  ),
  'S_admin_Home_invatecount' => 
  array (
    'key' => 
    array (
      'inviter_uid' => 'inviter_uid',
      'receiver_uid' => 'receiver_uid',
    ),
    'key_name' => 
    array (
      'inviter_uid' => '邀请人ID',
      'receiver_uid' => '被邀请人ID',
    ),
    'key_type' => 
    array (
      'inviter_uid' => 'text',
      'receiver_uid' => 'text',
    ),
    'key_tishi' => 
    array (
      'inviter_uid' => '',
      'receiver_uid' => '',
    ),
    'key_javascript' => 
    array (
      'inviter_uid' => '',
      'receiver_uid' => '',
    ),
  ),
  'S_admin_Home_invateTop' => 
  array (
    'key' => 
    array (
      'inviter_uid' => 'inviter_uid',
    ),
    'key_name' => 
    array (
      'inviter_uid' => '邀请人ID',
    ),
    'key_type' => 
    array (
      'inviter_uid' => 'text',
    ),
    'key_tishi' => 
    array (
      'inviter_uid' => '',
    ),
    'key_javascript' => 
    array (
      'inviter_uid' => '',
    ),
  ),
  'S_admin_Content_message' => 
  array (
    'key' => 
    array (
      'from_uid' => 'from_uid',
      'mix_man' => 'mix_man',
      'content' => 'content',
    ),
    'key_name' => 
    array (
      'from_uid' => '私信发送者ID',
      'mix_man' => '私信成员ID',
      'content' => '私信内容',
    ),
    'key_type' => 
    array (
      'from_uid' => 'text',
      'mix_man' => 'text',
      'content' => 'text',
    ),
    'key_tishi' => 
    array (
      'from_uid' => '',
      'mix_man' => '',
      'content' => '',
    ),
    'key_javascript' => 
    array (
      'from_uid' => '',
      'mix_man' => '',
      'content' => '',
    ),
  ),
  'S_admin_Home_logs' => 
  array (
    'key' => 
    array (
      'uname' => 'uname',
      'app_name' => 'app_name',
      'ctime' => 'ctime',
      'isAdmin' => 'isAdmin',
      'keyword' => 'keyword',
    ),
    'key_name' => 
    array (
      'uname' => '用户帐号',
      'app_name' => '操作详情',
      'ctime' => '时间范围',
      'isAdmin' => '日志类型',
      'keyword' => '查询关键字',
    ),
    'key_type' => 
    array (
      'uname' => 'text',
      'app_name' => 'select',
      'ctime' => 'date',
      'isAdmin' => 'checkbox',
      'keyword' => 'text',
    ),
    'key_tishi' => 
    array (
      'uname' => '',
      'app_name' => '',
      'ctime' => '',
      'isAdmin' => '',
      'keyword' => '',
    ),
    'key_javascript' => 
    array (
      'uname' => '',
      'app_name' => 'admin.selectLog(this.value)',
      'ctime' => '',
      'isAdmin' => '',
      'keyword' => '',
    ),
  ),
  'S_admin_Home_tag' => 
  array (
    'key' => 
    array (
      'name' => 'name',
      'table' => 'table',
    ),
    'key_name' => 
    array (
      'name' => '标签名',
      'table' => '标签类型',
    ),
    'key_type' => 
    array (
      'name' => 'text',
      'table' => 'select',
    ),
    'key_tishi' => 
    array (
      'name' => '',
      'table' => '',
    ),
    'key_javascript' => 
    array (
      'name' => '',
      'table' => '',
    ),
  ),
  'S_admin_User_online' => 
  array (
    'key' => 
    array (
      'uid' => 'uid',
      'uname' => 'uname',
      'email' => 'email',
      'sex' => 'sex',
      'user_group' => 'user_group',
      'ctime' => 'ctime',
    ),
    'key_name' => 
    array (
      'uid' => 'UID',
      'uname' => '用户昵称',
      'email' => 'Email',
      'sex' => '性别',
      'user_group' => '用户组',
      'ctime' => '注册时间',
    ),
    'key_type' => 
    array (
      'uid' => 'text',
      'uname' => 'text',
      'email' => 'text',
      'sex' => 'radio',
      'user_group' => 'select',
      'ctime' => 'date',
    ),
    'key_tishi' => 
    array (
      'uid' => '',
      'uname' => '',
      'email' => '',
      'sex' => '',
      'user_group' => '',
      'ctime' => '',
    ),
    'key_javascript' => 
    array (
      'uid' => '',
      'uname' => '',
      'email' => '',
      'sex' => '',
      'user_group' => '',
      'ctime' => '',
    ),
  ),
  'S_admin_User_dellist' => 
  array (
    'key' => 
    array (
      'uid' => 'uid',
      'uname' => 'uname',
      'email' => 'email',
      'sex' => 'sex',
      'user_group' => 'user_group',
      'user_category' => 'user_category',
      'ctime' => 'ctime',
    ),
    'key_name' => 
    array (
      'uid' => '用户ID',
      'uname' => '用户帐号',
      'email' => 'Email',
      'sex' => '性别',
      'user_group' => '用户组',
      'user_category' => '',
      'ctime' => '注册时间',
    ),
    'key_type' => 
    array (
      'uid' => 'text',
      'uname' => 'text',
      'email' => 'text',
      'sex' => 'radio',
      'user_group' => 'select',
      'user_category' => 'text',
      'ctime' => 'date',
    ),
    'key_tishi' => 
    array (
      'uid' => '',
      'uname' => '',
      'email' => '',
      'sex' => '',
      'user_group' => '',
      'user_category' => '',
      'ctime' => '',
    ),
    'key_javascript' => 
    array (
      'uid' => '',
      'uname' => '',
      'email' => '',
      'sex' => '',
      'user_group' => '',
      'user_category' => '',
      'ctime' => '',
    ),
  ),
  'S_weiba_Admin_postList' => 
  array (
    'key' => 
    array (
      'post_id' => 'post_id',
      'title' => 'title',
      'post_uid' => 'post_uid',
      'recommend' => 'recommend',
      'digest' => 'digest',
      'top' => 'top',
      'weiba_id' => 'weiba_id',
    ),
    'key_name' => 
    array (
      'post_id' => '帖子ID',
      'title' => '帖子标题',
      'post_uid' => '发帖人ID',
      'recommend' => '是否推荐',
      'digest' => '是否精华',
      'top' => '是否置顶',
      'weiba_id' => '所属微吧',
    ),
    'key_type' => 
    array (
      'post_id' => 'text',
      'title' => 'text',
      'post_uid' => 'text',
      'recommend' => 'radio',
      'digest' => 'radio',
      'top' => 'radio',
      'weiba_id' => 'select',
    ),
    'key_tishi' => 
    array (
      'post_id' => '',
      'title' => '',
      'post_uid' => '',
      'recommend' => '',
      'digest' => '',
      'top' => '',
      'weiba_id' => '',
    ),
    'key_javascript' => 
    array (
      'post_id' => '',
      'title' => '',
      'post_uid' => '',
      'recommend' => '',
      'digest' => '',
      'top' => '',
      'weiba_id' => '',
    ),
  ),
  'S_weiba_Admin_postRecycle' => 
  array (
    'key' => 
    array (
      'post_id' => 'post_id',
      'title' => 'title',
      'post_uid' => 'post_uid',
      'weiba_id' => 'weiba_id',
    ),
    'key_name' => 
    array (
      'post_id' => '帖子ID',
      'title' => '帖子标题',
      'post_uid' => '发帖人ID',
      'weiba_id' => '所属微吧',
    ),
    'key_type' => 
    array (
      'post_id' => 'text',
      'title' => 'text',
      'post_uid' => 'text',
      'weiba_id' => 'select',
    ),
    'key_tishi' => 
    array (
      'post_id' => '',
      'title' => '',
      'post_uid' => '',
      'weiba_id' => '',
    ),
    'key_javascript' => 
    array (
      'post_id' => '',
      'title' => '',
      'post_uid' => '',
      'weiba_id' => '',
    ),
  ),
  'S_weiba_Admin_index' => 
  array (
    'key' => 
    array (
      'weiba_id' => 'weiba_id',
      'weiba_name' => 'weiba_name',
      'uid' => 'uid',
      'admin_uid' => 'admin_uid',
      'recommend' => 'recommend',
    ),
    'key_name' => 
    array (
      'weiba_id' => '微吧ID',
      'weiba_name' => '微吧名称',
      'uid' => '创建者UID',
      'admin_uid' => '吧主UID',
      'recommend' => '是否推荐',
    ),
    'key_type' => 
    array (
      'weiba_id' => 'text',
      'weiba_name' => 'text',
      'uid' => 'text',
      'admin_uid' => 'text',
      'recommend' => 'radio',
    ),
    'key_tishi' => 
    array (
      'weiba_id' => '',
      'weiba_name' => '',
      'uid' => '',
      'admin_uid' => '',
      'recommend' => '',
    ),
    'key_javascript' => 
    array (
      'weiba_id' => '',
      'weiba_name' => '',
      'uid' => '',
      'admin_uid' => '',
      'recommend' => '',
    ),
  ),
  'S_admin_Config_getInviteAdminList' => 
  array (
    'key' => 
    array (
      'invite_type' => 'invite_type',
    ),
    'key_name' => 
    array (
      'invite_type' => '邀请类型',
    ),
    'key_type' => 
    array (
      'invite_type' => 'radio',
    ),
    'key_tishi' => 
    array (
      'invite_type' => '',
    ),
    'key_javascript' => 
    array (
      'invite_type' => '',
    ),
  ),
  'S_admin_Content_topic' => 
  array (
    'key' => 
    array (
      'topic_id' => 'topic_id',
      'topic_name' => 'topic_name',
      'recommend' => 'recommend',
      'essence' => 'essence',
      'lock' => 'lock',
    ),
    'key_name' => 
    array (
      'topic_id' => '话题ID',
      'topic_name' => '话题名称',
      'recommend' => '是否推荐',
      'essence' => '是否精华',
      'lock' => '是否屏蔽',
    ),
    'key_type' => 
    array (
      'topic_id' => 'text',
      'topic_name' => 'text',
      'recommend' => 'radio',
      'essence' => 'radio',
      'lock' => 'radio',
    ),
    'key_tishi' => 
    array (
      'topic_id' => '',
      'topic_name' => '',
      'recommend' => '',
      'essence' => '',
      'lock' => '',
    ),
    'key_javascript' => 
    array (
      'topic_id' => '',
      'topic_name' => '',
      'recommend' => '',
      'essence' => '',
      'lock' => '',
    ),
  ),
  'S_admin_Medal_userMedal' => 
  array (
    'key' => 
    array (
      'user' => 'user',
      'medal' => 'medal',
    ),
    'key_name' => 
    array (
      'user' => '用户',
      'medal' => '勋章',
    ),
    'key_type' => 
    array (
      'user' => 'user',
      'medal' => 'select',
    ),
    'key_tishi' => 
    array (
      'user' => '',
      'medal' => '',
    ),
    'key_javascript' => 
    array (
      'user' => '',
      'medal' => '',
    ),
  ),
  'S_admin_Content_attach' => 
  array (
    'key' => 
    array (
      'attach_id' => 'attach_id',
      'name' => 'name',
      'from' => 'from',
    ),
    'key_name' => 
    array (
      'attach_id' => '附件ID',
      'name' => '附件名称',
      'from' => '来源类型',
    ),
    'key_type' => 
    array (
      'attach_id' => 'text',
      'name' => 'text',
      'from' => 'text',
    ),
    'key_tishi' => 
    array (
      'attach_id' => '多个id之间用英文的","隔开',
      'name' => '',
      'from' => '',
    ),
    'key_javascript' => 
    array (
      'attach_id' => '',
      'name' => '',
      'from' => '',
    ),
  ),
  'S_tipoff_Admin_index' => 
  array (
    'key' => 
    array (
      'tipoff_id' => 'tipoff_id',
      'content' => 'content',
      'uid' => 'uid',
      'status' => 'status',
    ),
    'key_name' => 
    array (
      'tipoff_id' => '爆料ID',
      'content' => '内容',
      'uid' => '发布者',
      'status' => '状态',
    ),
    'key_type' => 
    array (
      'tipoff_id' => 'text',
      'content' => 'text',
      'uid' => 'text',
      'status' => 'select',
    ),
    'key_tishi' => 
    array (
      'tipoff_id' => '',
      'content' => '',
      'uid' => '',
      'status' => '',
    ),
    'key_javascript' => 
    array (
      'tipoff_id' => '',
      'content' => '',
      'uid' => '',
      'status' => '',
    ),
  ),
  'S_tipoff_Admin_open' => 
  array (
    'key' => 
    array (
      'tipoff_id' => 'tipoff_id',
      'content' => 'content',
      'uid' => 'uid',
      'status' => 'status',
    ),
    'key_name' => 
    array (
      'tipoff_id' => '爆料ID',
      'content' => '内容',
      'uid' => '发布者',
      'status' => '状态',
    ),
    'key_type' => 
    array (
      'tipoff_id' => 'text',
      'content' => 'text',
      'uid' => 'text',
      'status' => 'select',
    ),
    'key_tishi' => 
    array (
      'tipoff_id' => '',
      'content' => '',
      'uid' => '',
      'status' => '',
    ),
    'key_javascript' => 
    array (
      'tipoff_id' => '',
      'content' => '',
      'uid' => '',
      'status' => '',
    ),
  ),
  'S_tipoff_Admin_bonus' => 
  array (
    'key' => 
    array (
      'tipoff_id' => 'tipoff_id',
      'content' => 'content',
      'uid' => 'uid',
    ),
    'key_name' => 
    array (
      'tipoff_id' => '爆料ID',
      'content' => '内容',
      'uid' => '发布者',
    ),
    'key_type' => 
    array (
      'tipoff_id' => 'text',
      'content' => 'text',
      'uid' => 'text',
    ),
    'key_tishi' => 
    array (
      'tipoff_id' => '',
      'content' => '',
      'uid' => '',
    ),
    'key_javascript' => 
    array (
      'tipoff_id' => '',
      'content' => '',
      'uid' => '',
    ),
  ),
  'S_tipoff_Admin_recycle' => 
  array (
    'key' => 
    array (
      'tipoff_id' => 'tipoff_id',
      'content' => 'content',
      'uid' => 'uid',
      'status' => 'status',
    ),
    'key_name' => 
    array (
      'tipoff_id' => '爆料ID',
      'content' => '内容',
      'uid' => '发布者',
      'status' => '状态',
    ),
    'key_type' => 
    array (
      'tipoff_id' => 'text',
      'content' => 'text',
      'uid' => 'text',
      'status' => 'select',
    ),
    'key_tishi' => 
    array (
      'tipoff_id' => '',
      'content' => '',
      'uid' => '',
      'status' => '',
    ),
    'key_javascript' => 
    array (
      'tipoff_id' => '',
      'content' => '',
      'uid' => '',
      'status' => '',
    ),
  ),
  'S_tipoff_Admin_archive' => 
  array (
    'key' => 
    array (
      'tipoff_id' => 'tipoff_id',
      'content' => 'content',
      'uid' => 'uid',
      'status' => 'status',
    ),
    'key_name' => 
    array (
      'tipoff_id' => '爆料ID',
      'content' => '内容',
      'uid' => '发布者',
      'status' => '状态',
    ),
    'key_type' => 
    array (
      'tipoff_id' => 'text',
      'content' => 'text',
      'uid' => 'text',
      'status' => 'select',
    ),
    'key_tishi' => 
    array (
      'tipoff_id' => '',
      'content' => '',
      'uid' => '',
      'status' => '',
    ),
    'key_javascript' => 
    array (
      'tipoff_id' => '',
      'content' => '',
      'uid' => '',
      'status' => '',
    ),
  ),
  'S_admin_User_index' => 
  array (
    'key' => 
    array (
      'uid' => 'uid',
      'uname' => 'uname',
      'email' => 'email',
      'sex' => 'sex',
      'user_group' => 'user_group',
      'user_category' => 'user_category',
      'ctime' => 'ctime',
    ),
    'key_name' => 
    array (
      'uid' => 'UID',
      'uname' => '用户名',
      'email' => 'Email',
      'sex' => '性别',
      'user_group' => '用户组',
      'user_category' => '标签',
      'ctime' => '注册时间',
    ),
    'key_type' => 
    array (
      'uid' => 'text',
      'uname' => 'text',
      'email' => 'text',
      'sex' => 'radio',
      'user_group' => 'select',
      'user_category' => 'select',
      'ctime' => 'date',
    ),
    'key_tishi' => 
    array (
      'uid' => '',
      'uname' => '',
      'email' => '',
      'sex' => '0',
      'user_group' => '',
      'user_category' => '',
      'ctime' => '',
    ),
    'key_javascript' => 
    array (
      'uid' => '',
      'uname' => '',
      'email' => '',
      'sex' => '',
      'user_group' => '',
      'user_category' => '',
      'ctime' => '',
    ),
  ),
  'S_admin_Config_lang' => 
  array (
    'key' => 
    array (
      'key' => 'key',
      'appname' => 'appname',
      'filetype' => 'filetype',
      'content' => 'content',
    ),
    'key_name' => 
    array (
      'key' => '语言KEY',
      'appname' => '应用名称',
      'filetype' => '文件类型',
      'content' => '语言内容',
    ),
    'key_type' => 
    array (
      'key' => 'text',
      'appname' => 'text',
      'filetype' => 'radio',
      'content' => 'text',
    ),
    'key_tishi' => 
    array (
      'key' => '',
      'appname' => '',
      'filetype' => '',
      'content' => '',
    ),
    'key_javascript' => 
    array (
      'key' => '',
      'appname' => '',
      'filetype' => '',
      'content' => '',
    ),
  ),
  'S_admin_User_pending' => 
  array (
    'key' => 
    array (
      'uid' => 'uid',
      'uname' => 'uname',
      'email' => 'email',
      'sex' => 'sex',
      'user_group' => 'user_group',
      'user_category' => 'user_category',
      'ctime' => 'ctime',
    ),
    'key_name' => 
    array (
      'uid' => 'UID',
      'uname' => '用户名',
      'email' => 'Email',
      'sex' => '性别',
      'user_group' => '用户组',
      'user_category' => '用户标签',
      'ctime' => '注册时间',
    ),
    'key_type' => 
    array (
      'uid' => 'text',
      'uname' => 'text',
      'email' => 'text',
      'sex' => 'radio',
      'user_group' => 'hidden',
      'user_category' => 'select',
      'ctime' => 'date',
    ),
    'key_tishi' => 
    array (
      'uid' => '',
      'uname' => '',
      'email' => '',
      'sex' => '',
      'user_group' => '',
      'user_category' => '',
      'ctime' => '',
    ),
    'key_javascript' => 
    array (
      'uid' => '',
      'uname' => '',
      'email' => '',
      'sex' => '',
      'user_group' => '',
      'user_category' => '',
      'ctime' => '',
    ),
  ),
  'S_weiba_Admin_weibaAdminAudit' => 
  array (
    'key' => 
    array (
      'follower_uid' => 'follower_uid',
      'weiba_name' => 'weiba_name',
    ),
    'key_name' => 
    array (
      'follower_uid' => '用户ID',
      'weiba_name' => '微吧名称',
    ),
    'key_type' => 
    array (
      'follower_uid' => 'text',
      'weiba_name' => 'text',
    ),
    'key_tishi' => 
    array (
      'follower_uid' => '',
      'weiba_name' => '',
    ),
    'key_javascript' => 
    array (
      'follower_uid' => '',
      'weiba_name' => '',
    ),
  ),
  'S_vtask_Admin_index' => false,
  'S_vtask_Admin_open' => false,
  'S_vtask_Admin_bonus' => false,
  'S_vtask_Admin_recycle' => false,
  'S_vtask_Admin_archive' => false,
);
?>