<?php /* Smarty version Smarty-3.1.13, created on 2013-08-02 01:26:13
         compiled from "/users/xiaolong/notebox/1/src/protected/views/user/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76432902951fa9a35c403b7-26944406%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87985f369ebc0ebdb68706f99f703b7e74ac6e5a' => 
    array (
      0 => '/users/xiaolong/notebox/1/src/protected/views/user/login.tpl',
      1 => 1374718965,
      2 => 'file',
    ),
    '58b1b18b016b031e2d7bf2976170502d084ac85b' => 
    array (
      0 => '/users/xiaolong/notebox/1/src/protected/views/layouts/main_without_top_nav.tpl',
      1 => 1375029101,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76432902951fa9a35c403b7-26944406',
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
  'unifunc' => 'content_51fa9a35d69b73_29399128',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51fa9a35d69b73_29399128')) {function content_51fa9a35d69b73_29399128($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
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
                        
	<h4>用户登录</h4>
    <div class='userForm'>
        <?php echo CHtml::beginForm();?>

        <div>
            <p class='inputLabel'>邮箱：</p>
            <div class='input'><?php echo CHtml::activeTextField($_smarty_tpl->tpl_vars['form']->value,'email');?>
</div>
            <div class='inputError'><?php echo CHtml::error($_smarty_tpl->tpl_vars['form']->value,'email');?>
</div>
            <div class='clear'></div>
        </div>
        <div>
            <p class='inputLabel'>密码：</p>
            <div class='input'><?php echo CHtml::activePasswordField($_smarty_tpl->tpl_vars['form']->value,'password');?>
</div>
            <div class='inputError'><?php echo CHtml::error($_smarty_tpl->tpl_vars['form']->value,'password');?>
</div>
            <div class='clear'></div>
        </div>
        <div>
            <input class='checkBox' id="LoginForm_rememberMe" type="checkbox" value="1" name="LoginForm[rememberMe]" checked/>
            <p class='inputLabel'>记住我</p>
            <div class='clear'></div>
        </div>
        <div>
            <input type='submit' class='button col' value='登录'/>
            <a class='loginTip' href='/user/signUp'>>还没有帐号？赶快注册一个！</a>
            <div class='clear'></div>
        </div>
        <?php echo CHtml::endForm();?>

    </div>

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