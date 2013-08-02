<?php /* Smarty version Smarty-3.1.13, created on 2013-07-29 18:22:33
         compiled from "/users/xiaolong/notebox/1/src/protected/views/user/notes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171464323451f642693884d4-81174547%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'afde02076b7702ce68babe1c16f2fc932d63af1b' => 
    array (
      0 => '/users/xiaolong/notebox/1/src/protected/views/user/notes.tpl',
      1 => 1374938738,
      2 => 'file',
    ),
    '33239f3a272086874a02ff02b94d9167d5907ed5' => 
    array (
      0 => '/users/xiaolong/notebox/1/src/protected/views/layouts/main.tpl',
      1 => 1375091713,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171464323451f642693884d4-81174547',
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
  'unifunc' => 'content_51f642694c6ac2_64079179',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51f642694c6ac2_64079179')) {function content_51f642694c6ac2_64079179($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
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
/js/tabby.js"></script>
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
<div class='blockTitle'>我的笔记</div>
<?php  $_smarty_tpl->tpl_vars['note'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['note']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['note']->key => $_smarty_tpl->tpl_vars['note']->value){
$_smarty_tpl->tpl_vars['note']->_loop = true;
?>
<div class='noteItem'>
	<div class='boxInfo'>
		来自我的笔记盒: 
        <a href="/box/view/<?php echo $_smarty_tpl->tpl_vars['note']->value['boxId'];?>
"><?php echo $_smarty_tpl->tpl_vars['note']->value['boxName'];?>
</a>
	</div>
	<?php if ($_smarty_tpl->tpl_vars['note']->value['title']==''){?>
	<?php }else{ ?>
    <div class='title'>
		<h4><?php echo $_smarty_tpl->tpl_vars['note']->value['title'];?>
</h4>       
    </div>
    <?php }?>
    <div class='content'>
    	<p><pre><?php echo $_smarty_tpl->tpl_vars['note']->value['content'];?>
</pre></p>
    </div>
    <div>
        <div    class='operations'>
        	<div class='operationItem'>
        	   <a href="/note/update/<?php echo $_smarty_tpl->tpl_vars['note']->value['id'];?>
">编辑</a>
            </div>
            <div class='operationItem'>
        	   <a href="/note/delete/<?php echo $_smarty_tpl->tpl_vars['note']->value['id'];?>
" onclick="confirm('确定删除该条笔记吗?')">删除</a>
            </div>
            <div class='clear'></div>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['note']->value['isOriginal']==0){?>
        <div class='fromInfo'>
            转采自<a href="/user/view/<?php echo $_smarty_tpl->tpl_vars['note']->value['origiAuthorId'];?>
"><?php echo $_smarty_tpl->tpl_vars['note']->value['origiAuthorName'];?>
</a>的笔记: 
            <a href="/note/view/<?php echo $_smarty_tpl->tpl_vars['note']->value['origiNoteId'];?>
"><?php echo $_smarty_tpl->tpl_vars['note']->value['origiTitle'];?>
</a>
        </div>
        <?php }?>
        <div class='clear'></div>
    </div>
</div>
<?php } ?>
<div class='clear'></div>
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