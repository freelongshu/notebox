<?php /* Smarty version Smarty-3.1.13, created on 2013-08-01 14:21:54
         compiled from "/users/xiaolong/notebox/1/src/protected/views/user/signUp.tpl" */ ?>
<?php /*%%SmartyHeaderCode:59809239851f9fe82d91184-60922821%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53e60dc7042b5c5104b7d47eb159d3d15457eb98' => 
    array (
      0 => '/users/xiaolong/notebox/1/src/protected/views/user/signUp.tpl',
      1 => 1375004176,
      2 => 'file',
    ),
    '58b1b18b016b031e2d7bf2976170502d084ac85b' => 
    array (
      0 => '/users/xiaolong/notebox/1/src/protected/views/layouts/main_without_top_nav.tpl',
      1 => 1375029101,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59809239851f9fe82d91184-60922821',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'subtitle' => 0,
    'static' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51f9fe82e5c7f5_28156789',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51f9fe82e5c7f5_28156789')) {function content_51f9fe82e5c7f5_28156789($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    	<meta charset="utf-8">
    	<meta name="copyright" content="notebox.sinaapp.com">
    	<title><?php echo $_smarty_tpl->tpl_vars['subtitle']->value;?>
-笔记盒-notebox.sinaapp.com</title>
        <link rel='stylesheet' type='text/css' href="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/css/bootstrap.min.css"/>
        <link rel='stylesheet' type='text/css' href="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/css/styles.css"/> 
    	<script src="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/js/jquery-1.9.0.js"></script>
        <script src="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/js/baiduTemplate.js"></script>
  	</head>
    <body>
        <div class='container'>
            <div class='row'>
                <div class='span12'>
                    <div class='header'>
                        <a href='/site/index'>
                            <div class='logo'>
                                <img src="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/img/logo.png" class='logoImg'/>
                                <p class='logoText'>笔记盒</p>
                                <div class='clear'></div>
                            </div>
                        </a>
                        <ul class='topUl'>
                            <a href='/user/login'><li>登录</li></a>
                            <a href='/user/signUp'><li>注册</li></a>
                            <div class='clear'></div>
                        </ul>
                        <div class='clear'></div>
                    </div>
                    <div class='middle'>
                        
   	<h4>用户注册</h4>
    <div class='userForm'>
        <form action="/user/signUp" id='userForm' method="post">
        <div>
            <p class="inputLabel">昵称：</p>
            <div class="input"><input name="UserForm[nickname]" id="UserForm_nickname" type="text"></div>
            <div class="inputError" id='emailError'><?php echo CHtml::error($_smarty_tpl->tpl_vars['form']->value,'nickname');?>
</div>
            <div class="clear"></div>
        </div>
        <div>
            <p class="inputLabel">邮箱：</p>
            <div class="input"><input name="UserForm[email]" id="UserForm_email" type="text"></div>
            <div class="inputError" id='emailError'><?php echo CHtml::error($_smarty_tpl->tpl_vars['form']->value,'email');?>
</div>
            <div class="clear"></div>
        </div>
        <div>
            <p class="inputLabel">密码：</p>
            <div class="input"><input name="UserForm[password]" id="UserForm_password" type="password"></div>
            <div class="inputError" id='passwordError'><?php echo CHtml::error($_smarty_tpl->tpl_vars['form']->value,'password');?>
</div>
            <div class="clear"></div>
        </div>
        <div>
            <p class="inputLabel">确认密码：</p>
            <div class="input"><input type="password" id='checkPasswordInput'/></div>
            <div class="inputError" id='checkPasswordError'></div>
            <div class="clear"></div>
        </div>
        <div>
            <input type="submit" class="button" value="注册">
            <a href='/user/login' class='loginTip'>已有帐号？直接登录</a>
            <div class="clear"></div>
        </div>
        </form>
    </div>
<script>
    $('#userForm').on('submit',function(){
    	if($('#UserForm_email').val()==''){
        	$('#emailError').html('邮箱不能为空');
        	return false;
    	}else{
    		$('#emailError').html('');
            if($('#UserForm_password').val()==''){
            	$('#passwordError').html('密码不能为空');
                return false;
            }else{
                if($('#UserForm_password').val().length<6){
                	$('#passwordError').html('密码不能少于6位');
                    return false;
                }else{
                    $('#passwordError').html('');
                    if($('#checkPasswordInput').val()==''){
                    	$('#checkPasswordError').html('请输入确认密码');
                        return false;
                    }else{
                        if($('#UserForm_password').val()!=$('#checkPasswordInput').val()){
                        	$('#checkPasswordError').html('两次输入的密码不一致');
                            return false;
                        }else{
                            $('#checkPasswordError').html('');
                            return true;
                        }
                    }
                
                }
            }
    	}
    });
</script>

                    </div>
                    <div class='footer'>
                    	<a href='#'>关于我们</a>
                        <a href="http://sae.sina.com.cn"><img src="http://static.sae.sina.com.cn/image/poweredby/117X12px.gif" alt="sae"></a> 
                        <a href='#'>联系我们</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php }} ?>