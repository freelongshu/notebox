<?php /* Smarty version Smarty-3.1.13, created on 2013-06-09 16:52:50
         compiled from "D:\develop\www\pipashu_sae\4\pipashu\src\protected\views\user\completeMsg.tpl" */ ?>
<?php /*%%SmartyHeaderCode:511851b44262d4a951-22287431%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b9b79add1780efc79a6148e85c145797486262e' => 
    array (
      0 => 'D:\\develop\\www\\pipashu_sae\\4\\pipashu\\src\\protected\\views\\user\\completeMsg.tpl',
      1 => 1370691143,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '511851b44262d4a951-22287431',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'sub_title' => 0,
    'static' => 0,
    'form' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51b44263171502_32079651',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b44263171502_32079651')) {function content_51b44263171502_32079651($_smarty_tpl) {?><html>
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
		<img src='/static/img/banner.png'/>
		<div class='row mt30'>
			<div class='span12'>
				<div class='user_form'>
				<!--有问题-->
				<form method="post" action="/user/completeMsg">
					<div class='line'>
					<label class='middle_title input_label'>完善资料</label>
					<?php echo CHtml::errorSummary($_smarty_tpl->tpl_vars['form']->value);?>

					<div class='clear'></div>
					</div>
					<div class='line'>
					<?php echo CHtml::activeHiddenField($_smarty_tpl->tpl_vars['form']->value,'social_platform_type');?>

					<div class='clear'></div>
					</div>
					<div class='line'>
					<?php echo CHtml::activeHiddenField($_smarty_tpl->tpl_vars['form']->value,'organization_id');?>

					<div class='clear'></div>
					</div>
					<div class='line'>
					<?php echo CHtml::activeHiddenField($_smarty_tpl->tpl_vars['form']->value,'weibo_avatar_url');?>

					<div class='clear'></div>
					</div>
					<div class='line'>
					<?php echo CHtml::activeHiddenField($_smarty_tpl->tpl_vars['form']->value,'platform_user_id');?>

					<div class='clear'></div>
					</div>
					<div class='line'>
					<label class='input_label'>您的昵称：</label><?php echo CHtml::activeTextField($_smarty_tpl->tpl_vars['form']->value,'nickname');?>

					<div class='input_error'><?php echo CHtml::error($_smarty_tpl->tpl_vars['form']->value,'nickname');?>
</div>
					<div class='clear'></div>
					</div>
					<div class='line'>
					<label class='input_label'>Email：</label><?php echo CHtml::activeTextField($_smarty_tpl->tpl_vars['form']->value,'email');?>

					<div class='input_error'><?php echo CHtml::error($_smarty_tpl->tpl_vars['form']->value,'email');?>
</div>
					<div class='clear'></div>
					</div>
					<div class='line'>
					<label class='input_label'>手机：</label><?php echo CHtml::activeTextField($_smarty_tpl->tpl_vars['form']->value,'tel');?>

					<input type='button' class='ml20 send_identifying_code' value='发送验证码'/>
					<div class='input_error'><?php echo CHtml::error($_smarty_tpl->tpl_vars['form']->value,'tel');?>
</div>
					<div class='clear'></div>
					</div>
					<div class='line'>
					<label class='input_label'>手机验证码：</label>
					<input id="identifying_code_input" type="text" class='identifying_code'>
					<div class='input_error'></div>
					<div class='clear'></div>
					</div>
					<div class='line'>
						<input type='submit' class='bind_button' value='绑定'/>
						<div class='clear'></div>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
  </body>

</html>
<?php }} ?>