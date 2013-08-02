<?php /* Smarty version Smarty-3.1.13, created on 2013-06-12 19:41:59
         compiled from "D:\develop\www\pipashu_sae\4\pipashu\src\protected\views\organization\update.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1799351b85e87a195c4-58599954%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be4c06e033e8e73419357570bcb3b96631ffe655' => 
    array (
      0 => 'D:\\develop\\www\\pipashu_sae\\4\\pipashu\\src\\protected\\views\\organization\\update.tpl',
      1 => 1370488770,
      2 => 'file',
    ),
    'bf6ac52d4d230ab70f19d3473c697fc6e15c763a' => 
    array (
      0 => 'D:\\develop\\www\\pipashu_sae\\4\\pipashu\\src\\protected\\views\\layouts\\main.tpl',
      1 => 1371037294,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1799351b85e87a195c4-58599954',
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
  'unifunc' => 'content_51b85e880fef98_98102246',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b85e880fef98_98102246')) {function content_51b85e880fef98_98102246($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
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
				<div class='menu_item'><a href='/organization/members'>会员管理</a></div>
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
	<div class='row'>
		<div class='span10'>
			<form method="post" action="/organization/update" id='organization_form' name='OrganizationForm'>
				<div class='line'>
					<p class='input_label'>机构全称：</p><?php echo CHtml::activeTextField($_smarty_tpl->tpl_vars['form']->value,'organization_name');?>

					<div class='input_error'><?php echo CHtml::error($_smarty_tpl->tpl_vars['form']->value,'organization_name');?>
</div>
					<div class='clear'></div>
				</div>
				<div class='line'>
					<p class='input_label'>网址：</p><?php echo CHtml::activeTextFIeld($_smarty_tpl->tpl_vars['form']->value,'url');?>

					<div class='input_error'><?php echo CHtml::error($_smarty_tpl->tpl_vars['form']->value,'url');?>
</div>
					<div class='clear'></div>
				</div>
				<div class='line'>
					<p class='input_label'>您的姓名：</p><?php echo CHtml::activeTextField($_smarty_tpl->tpl_vars['form']->value,'username');?>

					<div class='input_error'><?php echo CHtml::error($_smarty_tpl->tpl_vars['form']->value,'username');?>
</div>
					<div class='clear'></div>
				</div>
				<div class='line'>
					<p class='input_label'>手机：</p><?php echo CHtml::activeTextField($_smarty_tpl->tpl_vars['form']->value,'tel');?>

					<div class='input_error'><?php echo CHtml::error($_smarty_tpl->tpl_vars['form']->value,'tel');?>
</div>
					<div class='clear'></div>
				</div>
				<div class='line'>
					<p class='input_label'>Email：</p><?php echo CHtml::activeTextField($_smarty_tpl->tpl_vars['form']->value,'email');?>

					<div class='input_error'><?php echo CHtml::error($_smarty_tpl->tpl_vars['form']->value,'email');?>
</div>
					<div class='clear'></div>
				</div>
				<div class='line'>
					<p class='input_label'>部门/职位：</p><?php echo CHtml::activeTextField($_smarty_tpl->tpl_vars['form']->value,'job');?>

					<div class='input_error'><?php echo CHtml::error($_smarty_tpl->tpl_vars['form']->value,'job');?>
</div>
					<div class='clear'></div>
				</div>
				<div class='line'>
					<?php echo CHtml::activeHiddenField($_smarty_tpl->tpl_vars['form']->value,'center_city');?>

					<p class='input_label'>总部所在城市：</p>
					<select id='center_city_select'>
						<option>北京</option>
						<option>上海</option>
						<option>广州</option>
						<option>深圳</option>
						<option>郑州</option>
						<option>长沙</option>
						<option>苏州</option>
						<option>武汉</option>
						<option>成都</option>
						<option>杭州</option>
						<option>南京</option>
						<option>西安</option>
						<option>重庆</option>
						<option>天津</option>
					</select>
					<div class='clear'></div>
				</div>
				<div class='line'>
					<div class='register_button'> 
					<?php echo CHtml::submitButton('保存');?>

					</div>
				</div>
			</form>
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