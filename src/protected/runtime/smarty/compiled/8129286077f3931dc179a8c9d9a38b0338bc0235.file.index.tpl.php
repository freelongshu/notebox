<?php /* Smarty version Smarty-3.1.13, created on 2013-08-02 01:26:09
         compiled from "/users/xiaolong/notebox/1/src/protected/views/site/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:70712231551fa9a31a38a45-49602496%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8129286077f3931dc179a8c9d9a38b0338bc0235' => 
    array (
      0 => '/users/xiaolong/notebox/1/src/protected/views/site/index.tpl',
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
  'nocache_hash' => '70712231551fa9a31a38a45-49602496',
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
  'unifunc' => 'content_51fa9a31ab8417_53544440',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51fa9a31ab8417_53544440')) {function content_51fa9a31ab8417_53544440($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
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
                        
<h4>笔记盒</h4>
<p>笔记盒是一个简单的在线笔记应用。</p>

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