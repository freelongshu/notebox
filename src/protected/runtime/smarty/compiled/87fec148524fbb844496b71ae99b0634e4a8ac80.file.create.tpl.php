<?php /* Smarty version Smarty-3.1.13, created on 2013-08-01 14:35:43
         compiled from "/users/xiaolong/notebox/1/src/protected/views/note/create.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20263707251fa01bf0dfb24-76397143%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87fec148524fbb844496b71ae99b0634e4a8ac80' => 
    array (
      0 => '/users/xiaolong/notebox/1/src/protected/views/note/create.tpl',
      1 => 1375091757,
      2 => 'file',
    ),
    '33239f3a272086874a02ff02b94d9167d5907ed5' => 
    array (
      0 => '/users/xiaolong/notebox/1/src/protected/views/layouts/main.tpl',
      1 => 1375324108,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20263707251fa01bf0dfb24-76397143',
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
  'unifunc' => 'content_51fa01bf25a472_56304063',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51fa01bf25a472_56304063')) {function content_51fa01bf25a472_56304063($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
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
<div class='noteForm'>
    <form method='post' id='NoteForm'>
    <div class='line'>
        <div class='inputLabel'>新增笔记到：</div>
        <div class='input'>
            <input name="NoteForm[boxName]" type='text' class='boxNameInput' id='boxNameInput' value="<?php echo $_smarty_tpl->tpl_vars['myBoxes']->value[0]['name'];?>
"/>
            <input name="NoteForm[boxId]" id="NoteForm_boxId" type="hidden" class="error" value="<?php echo $_smarty_tpl->tpl_vars['myBoxes']->value[0]['id'];?>
">
            <div class='boxIdSelect' id='changeBox'>换个盒子</div>
            <div class='clear'></div>
        </div>
        <div class='inputError'><?php echo CHtml::error($_smarty_tpl->tpl_vars['form']->value,'boxId');?>
</div>
        <div class='clear'></div>
    </div>
    <div class='line'>
        <div class='inputLabel'>标题：</div>
        <div class='input'>
            <input name="NoteForm[title]" id="NoteForm_title" type="text">
        </div>
        <div class='inputError'><?php echo CHtml::error($_smarty_tpl->tpl_vars['form']->value,'title');?>
</div>
        <div class='clear'></div>
    </div>
    <div class='line'>
        <div class='inputLabel'>内容：</div>
        <div class='contentInput'>
            <textarea name="NoteForm[content]" id="NoteForm_content"></textarea>
        </div>
        <div class='inputError'><?php echo CHtml::error($_smarty_tpl->tpl_vars['form']->value,'content');?>
</div>
        <div class='clear'></div>
    </div>
    <div class='line'>
        <div class='isPublicLabel'>
            <input class='checkBox' id="NoteForm_isPublic" type="checkbox" value="1" name="NoteForm[isPublic]" checked/>
            <span>其他人可见</span>
        </div>
        <input type='submit' class='button' value='发布'/>
        <div class='clear'></div>
    </div>
    </form>
</div>
<div class='boxIdHide'  id='boxIdHide'>
    <img class='triangleImg' src="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/img/triangleImg.png"/>
	<div class='addBox' id='addBox'>盒子+1</div>  
    <div class='boxOption hide' id='addBoxLoading'><img class='loadingImg' src='<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/img/loading.gif'/></div>  
    <div class='smallBoxForm' id='smallBoxForm'>
        <form method='post' id='BoxForm'>
        	<?php echo CHtml::activeTextField($_smarty_tpl->tpl_vars['boxForm']->value,'name');?>

            <input type='submit' value='确定' class='createButton'/>
            <div class='clear'></div>
        </form>
    </div> 
    <?php  $_smarty_tpl->tpl_vars['myBox'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['myBox']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['myBoxes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['myBox']->key => $_smarty_tpl->tpl_vars['myBox']->value){
$_smarty_tpl->tpl_vars['myBox']->_loop = true;
?>
    <div class='boxOption' id="myBox<?php echo $_smarty_tpl->tpl_vars['myBox']->value['id'];?>
" data-boxId='<?php echo $_smarty_tpl->tpl_vars['myBox']->value['id'];?>
' data-boxName="<?php echo $_smarty_tpl->tpl_vars['myBox']->value['name'];?>
">
        <?php echo $_smarty_tpl->tpl_vars['myBox']->value['name'];?>

    </div>
    <?php } ?>
</div>
<script>
    function chooseBox(boxId){
        var boxName=$('#myBox'+boxId).attr('data-boxName');
        $('#NoteForm').val(boxId);
        $('#boxNameInput').val(boxName);
        $('#boxIdHide').hide();
    }
    $('#changeBox').hover(function(){
    	$('#boxIdHide').show();
        $('#addBox').show();
    });
    $('#addBox').on('click',function(){
    	$('#addBox').hide();
        $('#smallBoxForm').show();
        $('#smallBoxForm #BoxForm_name').focus();
    });
    $('.boxOption').on('click',function(){
        var boxId=$(this).attr('data-boxId');
        var boxName=$(this).attr('data-boxName');
        $('#NoteForm').val(boxId);
        $('#boxNameInput').val(boxName);
        $('#boxIdHide').hide();
    });
    $('#BoxForm').submit(function(){ 
        var boxName=$('#BoxForm_name').val();
        if(boxName=='') return false;
        $('#smallBoxForm').hide();
        $('#addBoxLoading').show();
        $.ajax({
            url:'/box/tempAdd',
            type:'post',
            dataType:'json',
            data:{'boxName':boxName},
            success:function(result){
                if(result.status=='success'&&result.data.addStatus=='success'){
                    $('#addBoxLoading').hide();                  
                    $('#boxIdHide').append(
                        "<div class='boxOption' id='myBox"+result.data.boxId+"' data-boxId='"+result.data.boxId+"' data-boxName='"+boxName+"' onclick=\"chooseBox("+result.data.boxId+")\">"+boxName+"</div>");
                }else{
                    $('#addBoxLoading').replaceWith("<div class='boxOption errorTxt'>出错了，请稍后重试</div>");
                }          	
            }
        });
        return false;
    });
    $('#NoteForm_content').tabby();
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
        $(this).css({backgroundColor:'#888'});
        $('#UserForm_girl').css({backgroundColor:'#fff'});
        $('#UserForm_sex').val('1');
    });
    $('#UserForm_girl').click(function(){
        $(this).css({backgroundColor:'#888'});
        $('#UserForm_boy').css({backgroundColor:'#fff'});
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