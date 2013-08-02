<?php /* Smarty version Smarty-3.1.13, created on 2013-06-05 08:48:14
         compiled from "D:\develop\www\pipashu\src\protected\views\organization\setPasswordSuccess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:794951ae8ace0fbaa4-70768036%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9f32a15faa7f07377bb5be41cf8726824a6e98a' => 
    array (
      0 => 'D:\\develop\\www\\pipashu\\src\\protected\\views\\organization\\setPasswordSuccess.tpl',
      1 => 1370230552,
      2 => 'file',
    ),
    'c11c5f5a34967b1e57db1eabb0491072457424cd' => 
    array (
      0 => 'D:\\develop\\www\\pipashu\\src\\protected\\views\\layouts\\main_without_top_nav.tpl',
      1 => 1370226896,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '794951ae8ace0fbaa4-70768036',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'static' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51ae8ace2f5dc0_81334046',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ae8ace2f5dc0_81334046')) {function content_51ae8ace2f5dc0_81334046($_smarty_tpl) {?><html>
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
	<div class="span8">
		<div>
			<img class='col' src='<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/img/set_password_success.png'/>
			<h4 class='col'>恭喜您，密码设置成功！</h4>
			<div class='clear'></div>
		</div>
		<div>
			<p class='gray_txt'>>将在<span id='change_time'></span>秒内转到<a href='/organization/index'>管理中心</a></p>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	var second=4;
	setInterval(function(){
		$('#change_time').html(--second);
		if(second==0) document.location='/organization/index';
	},1000);
})
</script>

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