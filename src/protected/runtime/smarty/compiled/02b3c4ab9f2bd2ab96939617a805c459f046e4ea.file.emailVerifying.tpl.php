<?php /* Smarty version Smarty-3.1.13, created on 2013-06-05 08:45:59
         compiled from "D:\develop\www\pipashu\src\protected\views\organization\emailVerifying.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1694251ae8a47919179-74936694%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '02b3c4ab9f2bd2ab96939617a805c459f046e4ea' => 
    array (
      0 => 'D:\\develop\\www\\pipashu\\src\\protected\\views\\organization\\emailVerifying.tpl',
      1 => 1370360151,
      2 => 'file',
    ),
    'c11c5f5a34967b1e57db1eabb0491072457424cd' => 
    array (
      0 => 'D:\\develop\\www\\pipashu\\src\\protected\\views\\layouts\\main_without_top_nav.tpl',
      1 => 1370226896,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1694251ae8a47919179-74936694',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'static' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51ae8a47b36017_00707270',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ae8a47b36017_00707270')) {function content_51ae8a47b36017_00707270($_smarty_tpl) {?><html>
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
/img/arrow3.png'/>
		<div class="completing col">2.审核</div>
		<img class='col' src='<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/img/arrow1.png'/>
		<div class="uncompleted col">3.认证成功</div>
	</div>
	<div class="span4 mt40">
		<p class="">>已注册？<a href='/register/login'>立即登录</a></p>
	</div>
</div>
<div class="row">
	<div class="span12">
		<p>验证邮件已经发送到您的Email:<a href='<?php echo $_smarty_tpl->tpl_vars['email_unverified']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['email_unverified']->value;?>
</a>,请先验证。</p>
		<br/>
		<br/>
		<p>我们会尽快审核您提交的新公司信息……<br/>
		请耐心等待，审核一通过，我们会发送通知邮件到您的Email:
		<a href='<?php echo $_smarty_tpl->tpl_vars['email_unverified']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['email_unverified']->value;?>
</a>，请注意查收。</p>
		<br>
		<br>
		<p>
		没有收到确认信怎么办？<br>
		检查一下之前的信息是否填写正确，特别是Email地址，错了的话就<a href='/organization/register'>重新填写</a>吧<br>
		看看是否在邮箱的垃圾邮件里<br>
		<br>
		<br>
		没有收到验证邮件？<a href=''>再发一封</a>
		</p>
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