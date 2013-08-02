<?php /* Smarty version Smarty-3.1.13, created on 2013-07-28 00:04:06
         compiled from "/users/xiaolong/notebox/1/src/protected/views/user/boxes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:50613644051f3ef76325f72-83455809%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f92cbd7d00a397749e8e98ceee1ef5d85fdf6d7' => 
    array (
      0 => '/users/xiaolong/notebox/1/src/protected/views/user/boxes.tpl',
      1 => 1374718965,
      2 => 'file',
    ),
    '33239f3a272086874a02ff02b94d9167d5907ed5' => 
    array (
      0 => '/users/xiaolong/notebox/1/src/protected/views/layouts/main.tpl',
      1 => 1374938886,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '50613644051f3ef76325f72-83455809',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'subtitle' => 0,
    'static' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51f3ef764316b5_09033059',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51f3ef764316b5_09033059')) {function content_51f3ef764316b5_09033059($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    	<meta charset="utf-8">
    	<meta name="copyright" content="notebox.sinaapp.com">
    	<title><?php echo $_smarty_tpl->tpl_vars['subtitle']->value;?>
-笔记盒-notebox.tk</title>
        <link rel='stylesheet' type='text/css' href="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/css/bootstrap.min.css"/>
        <link rel='stylesheet' type='text/css' href="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/css/styles.css"/> 
    	<script src="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/js/jquery-1.9.0.js"></script>
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
                            <?php if ($_smarty_tpl->tpl_vars['user']->value['isGuest']==true){?>
                            <a href='/user/login'><li>登录</li></a>
                            <a href='/user/signUp'><li>注册</li></a>
                            <?php }else{ ?>
                            <span>欢迎回来，<?php echo $_smarty_tpl->tpl_vars['user']->value['nickname'];?>
</span>
                            <a href='/user/logout'><li>登出</li></a>
                            <a href='/box/create'><li>盒子＋1</li></a>
                            <a href='/note/create'><li>笔记＋1</li></a>
                            <a href='/note/index'><li>笔记池</li></a>
                            <?php }?>           
                        </ul>
                        <div class='clear'></div>
                    </div>
                    <div class='middle'>                       
                        <div class='leftCol'>
<div class='myBoxes'>
    <?php  $_smarty_tpl->tpl_vars['myBox'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['myBox']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['myBoxes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['myBox']->key => $_smarty_tpl->tpl_vars['myBox']->value){
$_smarty_tpl->tpl_vars['myBox']->_loop = true;
?>
    <div class='boxItem'>
        <div class='itemHead'>
            <div class='boxTime'>
                <p>
                    <?php echo date('Y',$_smarty_tpl->tpl_vars['myBox']->value['createTime']);?>
<br>
                    <?php echo date('n月',$_smarty_tpl->tpl_vars['myBox']->value['createTime']);?>

                    <span class='daySpan'><?php echo date('j',$_smarty_tpl->tpl_vars['myoBx']->value['createTime']);?>
</span>日
                </p>
            </div>
            <div class='boxName'><?php echo $_smarty_tpl->tpl_vars['myBox']->value['name'];?>
</div>
            <div class='clear'></div>
        </div>
        <div class='itemMiddle'>
            <div class='noteNum'><?php echo $_smarty_tpl->tpl_vars['myBox']->value['noteNum'];?>
<br>笔记</div>
            <div class='notes'>
                <a href='/note/create'><div class='noteItem'>笔记＋1</div></a>
                <?php  $_smarty_tpl->tpl_vars[$_smarty_tpl->tpl_vars['note']->value] = new Smarty_Variable; $_smarty_tpl->tpl_vars[$_smarty_tpl->tpl_vars['note']->value]->_loop = false;
 $_from = CJSON::decode($_smarty_tpl->tpl_vars['myBox']->value['notes']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars[$_smarty_tpl->tpl_vars['note']->value]->key => $_smarty_tpl->tpl_vars[$_smarty_tpl->tpl_vars['note']->value]->value){
$_smarty_tpl->tpl_vars[$_smarty_tpl->tpl_vars['note']->value]->_loop = true;
?>
                <div class='noteItem'>
                    <?php echo $_smarty_tpl->tpl_vars['note']->value['title'];?>

                </div>
                <?php } ?>
            </div>
            <div class='clear'></div>
        </div>
    </div>
    <?php } ?>
    <div class='clear'></div>
</div>
</div>
                        <div class='rightCol'>
                        	<div class='userInfo'>
                                <div class='avatarInfo'>
                                    <p class='nickname'><?php echo $_smarty_tpl->tpl_vars['user']->value['nickname'];?>
</p>
                                    <div class='avatar'>
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/img/avatar.png" class='avatarImg img-rounded'/>	
                                    </div>
                                </div>
                                <div class='noteInfo'>
                                    
                                    <p class='noteInfoCol'>
                                        <a href="/user/boxes/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">
                                            <?php echo $_smarty_tpl->tpl_vars['user']->value['boxNum'];?>
<br>
                                            盒子
                                        </a>
                                    </p>                                                                      
                                    <p class='noteInfoCol'>
                                        <a href="/user/notes/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">
                                            <?php echo $_smarty_tpl->tpl_vars['user']->value['noteNum'];?>
<br>
                                            笔记
                                        </a>
                                    </p>
                                    <div class='clear'></div>
                                </div>
                            </div>
                        </div>
                        <div class='clear'></div>
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