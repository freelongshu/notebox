<?php /* Smarty version Smarty-3.1.13, created on 2013-06-05 08:47:56
         compiled from "D:\develop\www\pipashu\src\protected\views\organization\setPassword.tpl" */ ?>
<?php /*%%SmartyHeaderCode:376251ae8abcf35278-34513527%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6687a308c2c03451a28b1e79c033710968686452' => 
    array (
      0 => 'D:\\develop\\www\\pipashu\\src\\protected\\views\\organization\\setPassword.tpl',
      1 => 1370226282,
      2 => 'file',
    ),
    'c11c5f5a34967b1e57db1eabb0491072457424cd' => 
    array (
      0 => 'D:\\develop\\www\\pipashu\\src\\protected\\views\\layouts\\main_without_top_nav.tpl',
      1 => 1370226896,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '376251ae8abcf35278-34513527',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'static' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51ae8abd253131_27623832',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ae8abd253131_27623832')) {function content_51ae8abd253131_27623832($_smarty_tpl) {?><html>
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
		<div class="span3">
			<img class="logo" src='<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/img/logo.png'>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<span class="gray_h3">培训机构</span>
		</div>
		<div class="span9">
		</div>
	</div>
	
<div class="row register_tip">
	<div class="span8">
		<h4 class="gray_h3">机构注册</h4>
		<div class="completed col">1.填写信息</div>
		<img class='col' src='<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/img/arrow4.png'/>
		<div class="completed col">2.审核</div>
		<img class='col' src='<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/img/arrow5.png'/>
		<div class="completing col">3.认证成功</div>
	</div>
	<div class="span4 mt40">
		<p class="">>已注册？<a href='/inst/login'>立即登录</a></p>
	</div>
</div>
<div class="row">
	<div class="span12">
		<p>感谢您的耐心等待，您提交的新公司信息已经通过审核。</p>
		<br/>
		<br/>
		<p>现在您需要为您的账号设置一个密码</p>
		<div id='set_password_form'>
		<?php echo CHtml::beginForm();?>

		<div class='set_password_form'>
			<div classs='line'>
				<?php echo CHtml::activeHiddenField($_smarty_tpl->tpl_vars['form']->value,'email');?>

			</div>
			<div class='line'>
			<label class='input_label'>密码：</label><?php echo CHtml::activePasswordField($_smarty_tpl->tpl_vars['form']->value,'password');?>

			<div id='password_len_error' class='input_error'><?php echo CHtml::error($_smarty_tpl->tpl_vars['form']->value,'password');?>
</div>
			<div class='clear'></div>
			</div>
			<div class='line'>
			<label class='input_label'>确认密码：</label><input id='check_password' type='password'/>
			<div id='check_password_error' class='input_error'></div>
			<div class='clear'></div>
			</div>
			<div class='line'>
				<label class='input_label'></label>
				<div class='set_password_button'>
				<?php echo CHtml::submitButton('提交');?>

				</div>
				<div class='clear'></div>
			</div>
		</div>
		<?php echo CHtml::endForm();?>

		</div>
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