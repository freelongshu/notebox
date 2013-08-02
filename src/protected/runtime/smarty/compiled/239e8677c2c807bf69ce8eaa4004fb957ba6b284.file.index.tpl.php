<?php /* Smarty version Smarty-3.1.13, created on 2013-08-02 11:17:42
         compiled from "/users/xiaolong/notebox/1/src/protected/views/note/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:178376179951fb24d60da7c2-41016398%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '239e8677c2c807bf69ce8eaa4004fb957ba6b284' => 
    array (
      0 => '/users/xiaolong/notebox/1/src/protected/views/note/index.tpl',
      1 => 1375349876,
      2 => 'file',
    ),
    '33239f3a272086874a02ff02b94d9167d5907ed5' => 
    array (
      0 => '/users/xiaolong/notebox/1/src/protected/views/layouts/main.tpl',
      1 => 1375411084,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178376179951fb24d60da7c2-41016398',
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
  'unifunc' => 'content_51fb24d6361b39_80900578',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51fb24d6361b39_80900578')) {function content_51fb24d6361b39_80900578($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
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
<?php  $_smarty_tpl->tpl_vars['note'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['note']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recentNotes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['note']->key => $_smarty_tpl->tpl_vars['note']->value){
$_smarty_tpl->tpl_vars['note']->_loop = true;
?>
<div class='noteItem' id="noteItem<?php echo $_smarty_tpl->tpl_vars['note']->value['id'];?>
">
	<div class='boxInfo'>
		来自<a href="/user/view/<?php echo $_smarty_tpl->tpl_vars['note']->value['authorId'];?>
"><?php echo $_smarty_tpl->tpl_vars['note']->value['authorName'];?>
</a>的笔记盒: 
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
        <div class='operations'>
            <div class='operationItem'>
                <a href='javascript:void(0)' class='commentLink' data-noteId="<?php echo $_smarty_tpl->tpl_vars['note']->value['id'];?>
" id="commentLink<?php echo $_smarty_tpl->tpl_vars['note']->value['id'];?>
">评论(<?php echo $_smarty_tpl->tpl_vars['note']->value['commentNum'];?>
)</a>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['note']->value['authorId']==Yii::app()->user->id){?>
        	<div class='operationItem'>
        	   <a href="/note/update/<?php echo $_smarty_tpl->tpl_vars['note']->value['id'];?>
">编辑</a>
            </div>
            <div class='operationItem'>
        	   <a href="/note/delete/<?php echo $_smarty_tpl->tpl_vars['note']->value['id'];?>
" onclick="confirm('确定删除该条笔记吗?')">删除</a>
            </div>
            <div class='operationItem'>
                <a href="/note/collect/<?php echo $_smarty_tpl->tpl_vars['note']->value['id'];?>
" class='collectNote'>转采</a>
            </div>
            <?php }else{ ?>           
            <div class='operationItem'>
                <a href="/note/feed/<?php echo $_smarty_tpl->tpl_vars['note']->value['id'];?>
">订阅</a>
            </div>           
            <?php }?>
            <div class='clear'></div>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['note']->value['isOriginal']==0){?>
        <div class='fromInfo'>
            转采自<a href="/user/view/<?php echo $_smarty_tpl->tpl_vars['note']->value['origiAuthorId'];?>
"><?php echo $_smarty_tpl->tpl_vars['note']->value['origiAuthorName'];?>
</a>的笔记: 
            <a href="/note/view/<?php echo $_smarty_tpl->tpl_vars['note']->value['origiNoteId'];?>
"><?php echo $_smarty_tpl->tpl_vars['note']->value['origiNoteTitle'];?>
</a>
        </div>
        <?php }?>
        <div class='clear'></div>
    </div>  
</div>
<?php } ?>
<div class='clear'></div>
<script>
    $('.commentLink').on('click',function(){
        var noteId = $(this).attr('data-noteId');
        $.ajax({
            url:'/note/comments',
            type:'post',
            dataType:'json',
            data:{'noteId':noteId},
            success:function(result){
                if(result.status=='success'){
                    $('#noteItem'+noteId).append(result.data.html);
                    $('#noteItem'+noteId+' .commentForm textarea').focus();    
                }else{
                    $('#noteItem'+noteId).html("<div class='loadError'>评论加载出错了……</div>");
                }               
            },
        });
    })
    function noteReply(noteId){
        var content = $('#noteItem'+noteId+' .commentForm textarea').val();       
        if(content=='') return false;
        $(this).html('发布中...');
      
        $.ajax({
            url:'/note/reply/',
            type:'post',
            dataType:'json',
            data:{'noteId':noteId,'content':content},
            success:function(result){
                if(result.status=='success'&&result.data.replyStatus=='success'){
                    $(this).html('回复');
                    $('#commentLink'+noteId).html('评论('+result.data.commentNum+')');
                    $('#noteItem'+noteId+' #note'+noteId+'Comments').append(result.data.html);
                }else{
                    $(this).html('回复');
                }
            }
        });
        return false;        
    }
</script>
</div>
                        <div class='rightCol'>
                        	<div class='userInfo' id='userInfo'>
                                <div class='avatarInfo' id='avatarInfo'>
                                    <p class='nickname' id='nickname'><?php echo $_smarty_tpl->tpl_vars['user']->value['nickname'];?>
</p>
                                    <div class='avatar'>
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/img/avatar.png" class='avatarImg img-rounded'/>	
                                    </div>
                                </div>
                                <div class='noteInfo' id='noteInfo'>                              
                                    <p class='noteInfoCol'>
                                        <a href="/user/boxes/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
" id='noteInfoLeft'>
                                            <?php echo $_smarty_tpl->tpl_vars['user']->value['boxNum'];?>
<br>
                                            盒子
                                        </a>
                                        <a class='hide' id='saveUpdateUser'>保存</a>
                                    </p>                                                                      
                                    <p class='noteInfoCol'>
                                        <a href="/user/notes/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
" id='noteInfoRight'>
                                            <?php echo $_smarty_tpl->tpl_vars['user']->value['noteNum'];?>
<br>
                                            笔记
                                        </a>
                                        <a class='hide' id='cancelUpdateUser'>取消</a>
                                    </p>
                                    <div class='clear'></div>
                                </div>
                                <div class='userInfoUpdate' id='updateUserInfoBox'>
                                    <a href='javascript:void(0)' id='updateUserInfo'>更改个人资料</a>
                                    <p id='updateUserSuccess' class='updateUserSuccess hide'>资料修改成功！</p>
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
            <form method='post' id='updateUserForm' class='updateUserForm hide'>
                <div class='avatar'>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/img/avatar.png" class='avatarImg img-rounded'/> 
                    <a href="javascript:void(0)" id='changeAvatar' class='changeAvatar'>更换头像</a> 
                    <input type='file' name="UserForm[avatarUrl]" id="UserForm_avatarUrl" class='avatarUrlInput'> 
                </div>
                <input name="UserForm[id]" id="UserForm_id" type='hidden' value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
"> 
                <input name="UserForm[nickname]" id="UserForm_nickname" type='text' placeholder='昵称' value="<?php echo $_smarty_tpl->tpl_vars['user']->value['nickname'];?>
">
                <div class='inputError' id='nicknameError'></div>
                <input name="UserForm[qq]" id="UserForm_qq" type='text' placeholder='QQ' value="<?php echo $_smarty_tpl->tpl_vars['user']->value['qq'];?>
">
                <div class='inputError' id='qqError'></div>
                <input name="UserForm[tel]" id="UserForm_tel" type='text' placeholder='联系方式' value="<?php echo $_smarty_tpl->tpl_vars['user']->value['tel'];?>
">
                <div class='inputError' id='telError'></div>
                <input name="UserForm[residence]" id="UserForm_residence" type='text' placeholder='现居地' value="<?php echo $_smarty_tpl->tpl_vars['user']->value['residence'];?>
">
                <div class='inputError' id='residenceError'></div>
                <input name="UserForm[favorite]" id="UserForm_favorite" type='text' placeholder='最爱' value="<?php echo $_smarty_tpl->tpl_vars['user']->value['favorite'];?>
">
                <div class='inputError' id='favoriteError'></div>
                <input name="UserForm[sex]" id="UserForm_sex" type='hidden' class='radioButton' value='1'>
                <?php if ($_smarty_tpl->tpl_vars['user']->value['sex']==1){?>
                <input type='button' class='button current' id='UserForm_boy' value='男'>
                <input type='button' class='button' id='UserForm_girl' value='女'>
                <?php }else{ ?>
                <input type='button' class='button' id='UserForm_boy' value='男'>
                <input type='button' class='button current' id='UserForm_girl' value='女'>
                <?php }?>               
            </form>
    </body> 
    <script>
    /*ajax文件上传函数*/
    function ajaxFileUpload(){
        $('#upload_post').attr({'src':'<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/img/loading.gif'});
        $.ajaxFileUpload({
            url:'/activity/ajaxFileUpload',
            secureuri:false,
            fileElementId:'ActivityForm_post_url',
            dataType: 'json',
            success: function (result, status){
                if(result.data.post_url!=''){
                    $('#upload_post').attr({'src':result.data.post_url});
                    $('#ytActivityForm_post_url').val(result.data.post_url);
                }else{
                    $('#upload_post').attr({'src':'<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/img/upload_post.png'});
                    alert('上传出错了，请稍后重试');
                }
            },
            error: function (data, status, e){                   
                    alert(e);
                    $('#upload_post').attr({'src':'<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/img/upload_post.png'});
            }
        });
        return false;
    }
    $('#updateUserInfo').on('click',function(){
        $('#noteInfo').slideUp(500);        
        $(this).parent('.userInfoUpdate').slideUp(500);
        $('#avatarInfo').slideUp(500,function(){
            $('#updateUserForm').prependTo('#userInfo');
            $('#updateUserForm').slideDown(600); 
            $('#noteInfoLeft').hide();
            $('#saveUpdateUser').show().css({display:'block'});
            $('#noteInfoRight').hide();
            $('#cancelUpdateUser').show().css({display:'block'});
            $('#noteInfo').slideDown(1000);
        });
    })
    $('#cancelUpdateUser').on('click',function (){
        $('#updateUserForm').slideUp(500);
        $('#avatarInfo').slideDown(500);
        $('#noteInfo').slideDown(1000);
        $('#saveUpdateUser').hide();
        $('#noteInfoLeft').show();       
        $('#cancelUpdateUser').hide();
        $('#noteInfoRight').show();
        $('#updateUserInfoBox').slideDown(2000);
    });
    $('#UserForm_boy').click(function(){
        $(this).addClass('current');
        $('#UserForm_girl').removeClass('current');
        $('#UserForm_sex').val('1');
    });
    $('#UserForm_girl').click(function(){
        $(this).addClass('current');
        $('#UserForm_boy').removeClass('current');
        $('#UserForm_sex').val('0');
    });
    $('#saveUpdateUser').click(function(){
        var nickname = $('#UserForm_nickname').val();
        if(nickname==''){
            $('#nickname_error').html('昵称不能为空');
        }else{
            $.ajax({
                url:'/user/update',
                type:'post',
                dataType:'json',
                data:{
                    'userId':$('#UserForm_id').val(),
                    'nickname':$('#UserForm_nickname').val(),
                    'qq':$('#UserForm_qq').val(),
                    'tel':$('#UserForm_tel').val(),
                    'residence':$('#UserForm_residence').val(),
                    'favorite':$('#UserForm_favorite').val(),
                    'sex':$('#UserForm_sex').val(),
                },
                success:function(result){
                    if(result.status=='success'&&result.data.updateStatus=='success'){
                        $('#updateUserForm').slideUp(500);
                        $('#avatarInfo').slideDown(500);
                        $('#nickname').html(nickname);
                        $('#noteInfo').slideDown(1000);
                        $('#saveUpdateUser').hide();
                        $('#noteInfoLeft').show();       
                        $('#cancelUpdateUser').hide();
                        $('#noteInfoRight').show();
                        $('#updateUserInfoBox').slideDown(2000);
                        $('#updateUserSuccess').show(); 
                        $('#updateUserSuccess').fadeOut(6000,function(){
                            $('#updateUserInfo').show();
                        });                      
                    }
                }
            })
        }
    }) 
    </script>
</html>
<?php }} ?>