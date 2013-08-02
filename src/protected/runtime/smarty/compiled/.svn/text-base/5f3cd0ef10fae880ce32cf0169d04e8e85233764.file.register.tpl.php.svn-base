<?php /* Smarty version Smarty-3.1.13, created on 2013-06-12 23:45:35
         compiled from "D:\develop\www\pipashu_sae\4\pipashu\src\protected\views\organization\register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2551651b8979f9124f5-50158145%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f3cd0ef10fae880ce32cf0169d04e8e85233764' => 
    array (
      0 => 'D:\\develop\\www\\pipashu_sae\\4\\pipashu\\src\\protected\\views\\organization\\register.tpl',
      1 => 1370488770,
      2 => 'file',
    ),
    'b9abd834f435aa5334c659ed04cded5a0ecb6186' => 
    array (
      0 => 'D:\\develop\\www\\pipashu_sae\\4\\pipashu\\src\\protected\\views\\layouts\\main_without_top_nav.tpl',
      1 => 1371035953,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2551651b8979f9124f5-50158145',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'static' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51b897a0275c81_67514147',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b897a0275c81_67514147')) {function content_51b897a0275c81_67514147($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <title>枇杷树 pipashu.com</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/css/bootstrap.min.css"/>
    <link rel="stylesheet/less" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/css/styles.less">
    <script src="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/js/less-1.3.1.min.js"></script>	  
    <script src="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/js/jquery-1.10.1.js"></script>
  </head>
  <body>
	<div class="container mt10">
	<div class="row">
		<div class="span12">
			<a href='/site/index'><img class="col logo" src='<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/img/logo.png'></a><p class="col logo_text">&nbsp;|&nbsp;培训机构</p>
		</div>
	</div>
	
<div class="row register_tip">
	<div class="span8">
		<h4 class="gray_h3">机构注册</h4>
		<div class="completing col">1.填写信息</div>
		<img class='col' src='<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/img/arrow1.png'/>
		<div class="uncompleted col">2.审核</div>
		<img class='col' src='<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/img/arrow2.png'/>
		<div class="uncompleted col">3.认证成功</div>
	</div>
	<div class="span4 mt40">
		<p class="">>已注册？<a href='/organization/login'>立即登录</a></p>
	</div>
</div>
<div class="row">
	<div class="span12">
	<form method="post" action="/organization/register" id='organization_form' name='OrganizationForm'>
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
			<?php echo CHtml::submitButton('提交');?>

			</div>
		</div>
	</form>
	</div>
</div>
<div class="row"></div>

	</div>
  </body>
<script>
$('#organization_form').on('submit',function(){
	$('#OrganizationForm_center_city').val($('#center_city_select option:selected').html());
});
$('#OrganizationForm_password').on('change',function(){
	if($('#OrganizationForm_password').val().length<6){
		$('#password_len_error').html('密码长度不能小于6位');
	}else{
		$('#password_len_error').html('');
	}
});
$('#check_password').on('change',function(){
	if($('#check_password').val()!=$('#OrganizationForm_password').val()){		
		$('#check_password_error').html('两次输入的密码不一致');
	}else{
		$('#check_password_error').html('');
	}
});
$('#set_password_form').on('submit',function(){
	if($('#OrganizationForm_password').val()==''){
		$('#password_len_error').html('密码不能为空');
		return false;
	}else{
		$('#password_len_error').html('');
		if($('#OrganizationForm_password').val().length<6){
			$('#password_len_error').html('密码长度不能小于6位');
			return false;
		}else{
			$('#password_len_error').html('');
			if($('#check_password').val()!=$('#OrganizationForm_password').val()){		
				$('#check_password_error').html('两次输入的密码不一致');
				return false;
			}else{
				$('#check_password_error').html('');
				return true;
			}
		}
	}
});
</script>
</html>
<?php }} ?>