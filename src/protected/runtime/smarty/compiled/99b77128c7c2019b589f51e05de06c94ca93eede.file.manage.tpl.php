<?php /* Smarty version Smarty-3.1.13, created on 2013-06-05 23:47:16
         compiled from "D:\develop\www\pipashu\src\protected\views\promotion\manage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:176651af5d84edb304-20712583%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99b77128c7c2019b589f51e05de06c94ca93eede' => 
    array (
      0 => 'D:\\develop\\www\\pipashu\\src\\protected\\views\\promotion\\manage.tpl',
      1 => 1370447133,
      2 => 'file',
    ),
    '212d1b8a294f0ebea61a9f86d08b0eee137c994e' => 
    array (
      0 => 'D:\\develop\\www\\pipashu\\src\\protected\\views\\layouts\\main.tpl',
      1 => 1370423740,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176651af5d84edb304-20712583',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'sub_title' => 0,
    'static' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51af5d85240448_34186614',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51af5d85240448_34186614')) {function content_51af5d85240448_34186614($_smarty_tpl) {?><html>
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
				<li class="message">
				</li>
				<a href='/organization/register'><li class='hot'>机构注册</li></a>
				<a href='/organization/login'><li>登录</li></a>
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
				<div class='menu_item'><a href='/user/index'>会员管理</a></div>
				<div class='menu_item'><a href='/organization/code'>获取嵌入代码</a></div>
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
	<div>
			<div class='col'><p class='middle_title pt5'>已发布的推广文案&nbsp;&nbsp;&nbsp;</p></div>
			<div class='col'><a href='/promotion/createPromotion'><div class='col short_button'>发布推广文案</div></a></div>
			<br/>
			<div class='divide_line'></div>
			<div class='promotion_list_item'>
				<div class='content_col'><p class='gray_txt'>推广文案</p></div>
				<div class='credits_col'><p class='gray_txt'>分享奖励</p></div>
				<div class='num_col'><p class='gray_txt'>已分享</p></div>
				<div class='operation_col'><p class='gray_txt'>可操作</p></div>
				<div class='clear'></div>
			</div>
	</div>
	<div>
			<?php  $_smarty_tpl->tpl_vars['promotion'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['promotion']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recentPromotions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['promotion']->key => $_smarty_tpl->tpl_vars['promotion']->value){
$_smarty_tpl->tpl_vars['promotion']->_loop = true;
?>
			<div class='promotion_list_item'>
				<div class='content_col'><a href="/promotion/view/id/<?php echo $_smarty_tpl->tpl_vars['promotion']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['promotion']->value['content'];?>
</a></div>
				<div class='credits_col'><p><?php echo $_smarty_tpl->tpl_vars['promotion']->value['pub_weibo_credits'];?>
</p></div>
				<div class='num_col'><p><?php echo $_smarty_tpl->tpl_vars['promotion']->value['transmit_num'];?>
</p></div>
				<div class='operation_col'>
					<p>
						<a href="/promotion/update/id/<?php echo $_smarty_tpl->tpl_vars['promotion']->value['id'];?>
">修改</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/promotion/viewEffection/id/<?php echo $_smarty_tpl->tpl_vars['promotion']->value['id'];?>
">查看分享效果</a><br>
					</p>
				</div>
				<div class='clear'></div>
			</div>
			<div class='dotted_line'></div>
			<?php } ?>
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