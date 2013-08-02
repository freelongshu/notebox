<?php /* Smarty version Smarty-3.1.13, created on 2013-06-06 00:50:33
         compiled from "D:\develop\www\pipashu\src\protected\views\organization\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2610451af6c594b7583-55798622%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb9215f93213d29cb58e53d0201c15e63e367140' => 
    array (
      0 => 'D:\\develop\\www\\pipashu\\src\\protected\\views\\organization\\login.tpl',
      1 => 1370186417,
      2 => 'file',
    ),
    'c11c5f5a34967b1e57db1eabb0491072457424cd' => 
    array (
      0 => 'D:\\develop\\www\\pipashu\\src\\protected\\views\\layouts\\main_without_top_nav.tpl',
      1 => 1370422612,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2610451af6c594b7583-55798622',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'static' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51af6c597339c1_22808187',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51af6c597339c1_22808187')) {function content_51af6c597339c1_22808187($_smarty_tpl) {?><html>
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
		<h4 class="gray_h3">机构登录</h4>
		<?php echo CHtml::beginForm();?>

		<div class='login_form'>
			<div class='line'>
				<label class='col'>邮箱：</label><?php echo CHtml::activeTextField($_smarty_tpl->tpl_vars['form']->value,'email');?>

				<div class='input_error'><?php echo CHtml::error($_smarty_tpl->tpl_vars['form']->value,'email');?>
</div>
				<div class='clear'></div>
			</div>
			<div class='line'>
				<label class='col'>密码：</label><?php echo CHtml::activePasswordField($_smarty_tpl->tpl_vars['form']->value,'password');?>

				<div class='input_error'><?php echo CHtml::error($_smarty_tpl->tpl_vars['form']->value,'password');?>
</div>
				<div class='clear'></div>
			</div>
			<div class='line'>
				<input id="ytLoginForm_rememberMe" type="hidden" name="LoginForm[rememberMe]" value="0">
				<input class='check_box' id="LoginForm_rememberMe" type="checkbox" value="1" name="LoginForm[rememberMe]">
				<span>下次自动登录</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/organization/findPassword">忘记密码？</a>
				<div class='clear'></div>
			</div>
			<div class='line'>
				<div class='login_button'> 
				<?php echo CHtml::submitButton('登录');?>

				</div>
			</div>
		</div>
		<?php echo CHtml::endForm();?>

	</div>
	<div class="span4 mt40">
		<p>>还没注册？<a href='/organization/register'>马上注册</a></p>
	</div>
</div>

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