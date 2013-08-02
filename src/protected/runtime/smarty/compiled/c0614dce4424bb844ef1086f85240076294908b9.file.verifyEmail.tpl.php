<?php /* Smarty version Smarty-3.1.13, created on 2013-08-01 14:25:10
         compiled from "/users/xiaolong/notebox/1/src/protected/views/user/verifyEmail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27949865051f9ff46baa2b7-51527166%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0614dce4424bb844ef1086f85240076294908b9' => 
    array (
      0 => '/users/xiaolong/notebox/1/src/protected/views/user/verifyEmail.tpl',
      1 => 1374999977,
      2 => 'file',
    ),
    '58b1b18b016b031e2d7bf2976170502d084ac85b' => 
    array (
      0 => '/users/xiaolong/notebox/1/src/protected/views/layouts/main_without_top_nav.tpl',
      1 => 1375029101,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27949865051f9ff46baa2b7-51527166',
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
  'unifunc' => 'content_51f9ff46cdcac8_22515316',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51f9ff46cdcac8_22515316')) {function content_51f9ff46cdcac8_22515316($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
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
                        
<p>欢迎加入笔记盒！</p>
<P>我们已经向你的邮箱<a href="http://mailto:<?php echo $_smarty_tpl->tpl_vars['unverifyEmail']->value;?>
" target='_blank'><?php echo $_smarty_tpl->tpl_vars['unverifyEmail']->value;?>
</a>发送了一封邮箱验证邮件，请立即前往<a href="http://mailto:<?php echo $_smarty_tpl->tpl_vars['unverifyEmail']->value;?>
" target='_blank'><?php echo $_smarty_tpl->tpl_vars['unverifyEmail']->value;?>
</a>验证。</p>
<br>
<br>
<p>没有收到邮箱验证邮件？注意看一下是否在邮件垃圾箱里，或者<a href='javascript:void(0)' id='sendEmail' onclick="sendVerifyEmail()">再发一封</a></p>
<input type='hidden' id='unverifyEmail' value="<?php echo $_smarty_tpl->tpl_vars['unverifyEmail']->value;?>
"/>
<script>
    function sendVerifyEmail(){
        var email=$('#unverifyEmail').val();
        $('#sendEmail').replaceWith("<img id='loadingImg' src='<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/img/loading.gif'>");
        $.ajax({
            url:'/user/sendVerifyEmail',
            method:'post',
            dataType:'json',
            data:{'email':email},
            success:function(result){
                if(result.status=='success'&&result.data.sendStatus=='success'){
                    $('#loadingImg').replaceWith("<span id='haveSentTip' class='haveSentTip'>已发送(<span id='timeLeft'>60</span>秒后可重新发送)</span>");
                    startTiming();
                }else{
                	$('#sendError').html('出错啦，请稍后重试⋯⋯');	
                }
            }
        });	
    }
    function startTiming(){
        var i=60;
        var int=self.setInterval(function(){
        	i--;
            $('#timeLeft').html(i);
            if(i==0){
            	window.clearInterval(int);
                $('#haveSentTip').replaceWith("<a href='javascript:void(0)' id='sendEmail' onclick='sendVerifyEmail()'>再发一封</a>");
            }       	
        },1000);
    }
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