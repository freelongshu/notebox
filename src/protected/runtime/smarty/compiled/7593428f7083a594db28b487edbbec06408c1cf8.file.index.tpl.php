<?php /* Smarty version Smarty-3.1.13, created on 2013-06-12 23:41:30
         compiled from "D:\develop\www\pipashu_sae\4\pipashu\src\protected\views\organization\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3144851b896aa3fb4f8-23640007%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7593428f7083a594db28b487edbbec06408c1cf8' => 
    array (
      0 => 'D:\\develop\\www\\pipashu_sae\\4\\pipashu\\src\\protected\\views\\organization\\index.tpl',
      1 => 1370488770,
      2 => 'file',
    ),
    'bf6ac52d4d230ab70f19d3473c697fc6e15c763a' => 
    array (
      0 => 'D:\\develop\\www\\pipashu_sae\\4\\pipashu\\src\\protected\\views\\layouts\\main.tpl',
      1 => 1371046161,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3144851b896aa3fb4f8-23640007',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'sub_title' => 0,
    'static' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51b896aa8f9c71_32459535',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b896aa8f9c71_32459535')) {function content_51b896aa8f9c71_32459535($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['sub_title']->value;?>
</title>
    <link rel='stylesheet' type='text/css' href='<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/css/pickaday.css'/>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/css/bootstrap.min.css"/>
    <link rel="stylesheet/less" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/css/styles.less">
    <script src="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/js/less-1.3.1.min.js"></script>	  
    <script src="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/js/jquery-1.9.0.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/js/pickaday.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/js/area.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/js/ajaxFileUpload.js"></script>
  </head>
  <body>
	<div class="container">
	<div class="row">
		<div class="span3 mt10">
			<a href='/site/index'><img class="col logo" src='<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/img/logo.png'></a><p class="col logo_text">&nbsp;|&nbsp;培训机构</p>
			<div class='clear'></div>
		</div>
		<div class="span9">
			<ul class="top_nav">
				<a href='/site/index'><li class='active'>首页</li></a>
				<a href='/site/users'><li>谁在使用</li></a>
				<a href='/site/help'><li>帮助中心</li></a>
				<a href='/site/contact'><li>联系我们</li></a>
				<li class="message">欢迎回来，<?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
</li>
				<a href='/organization/index'><li class='active'>管理中心</li></a>
				<a href='/organization/logout'><li>退出</li></a>
			</ul>
		</div>
	</div>
	<div class='row'>
		<div class='span12'>
			<p class='big_title mt30'>管理中心&nbsp;&nbsp;-&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['sub_title']->value;?>
</p>
		</div>
	</div>
	<div class='row'>
		<div class='span12'>
		<div class='left_column'>
			<div class='left_menu'>
				<div class='menu_item'><a href='/organization/index'>管理中心首页</a></div>
				<div class='menu_item'><a href='/activity/manage'>活动管理</a></div>
				<div class='menu_item'><a href='/privilege/manage'>特权兑换管理</a></div>
				<div class='menu_item'><a href='/promotion/manage'>推广文案管理</a></div>
				<div class='menu_item'><a href='/user/manage'>会员管理</a></div>
				<div class='menu_item'><a href='/organization/getCode'>获取嵌入代码</a></div>
				<div class='menu_item'><a href='/organization/statistics'>数据统计</a></div>
				<div class='menu_item'><a href='/organization/update'>基本信息设置</a></div>
			</div>
			<div class='left_menu'>
				<div class='menu_item'>
					<p>在线帮助</p>
					<p>QQ:<p>
					<p>782570386（商务）</p>
					<p>782570386（技术）</p>
					<p>782570386（技术）</p>
					<p>QQ群:</p>
					<p>782570386</p>
					<p>782570386</p>
					<p>782570386</p>
				</div>
			</div>
		</div>
		<div class='right_column'>
<div class='content_box'>
	<div class='row'>
		<div class='span6'>
			<h4>欢迎语</h4>
			<p>概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要
			概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概
			</p>
		</div>
		<div class='span3'>
			<div class='stage_info'>
				<p>您上次登录是：<?php echo $_smarty_tpl->tpl_vars['user']->value['lastLoginTime'];?>
</p>
				<p>Ip：<?php echo $_smarty_tpl->tpl_vars['user']->value['lastLoginIp'];?>
</p>
				<p>最近7天内，共有：</p>
				<p><?php echo $_smarty_tpl->tpl_vars['user']->value['new_member_num'];?>
&nbsp;人成为了本机构的会员</p>
				<p><?php echo $_smarty_tpl->tpl_vars['user']->value['new_joined_activity_member_num'];?>
&nbsp;参加了您的活动</p>
				<p><?php echo $_smarty_tpl->tpl_vars['user']->value['new_pub_promotion_member_num'];?>
&nbsp;推广了您的文案</p>
				<p><a href='/organization/statistics'>查看数据统计</a></p>
			</div>
		</div>
	</div>
	<div class='row'>
		<div class='span4'>
			<h4>先试试看：</h4>
			<p><a href='/organization/settings'>设置邀请注册奖励积分</a><p>
			<p><a href='/activity/createActivity'>发布一个活动</a></p>
			<p><a href='/previlige/pubPrevilige'>发布一个特权兑换</a></p>
			<p><a href='/promotion/pubPromotion'>发布一个推广文案</a></p>
		</div>
	</div>
	<div class='row'>
		<div class='span7'>
			<h4>主要规则和功能介绍</h4>
			<h6>规则1</h6>
			<p>概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍
			概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍
			概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介
			概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍
			概要介绍</p>
			<h6>规则2</h6>
			<p>概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍
			概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍
			概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介绍概要介
			</p>
		</div>
	</div>
</div>
</div>
		<div class='clear'></div>
		</div>
	</div>
	</div>
  </body>

</html>
<?php }} ?>