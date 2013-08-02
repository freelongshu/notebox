<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    	<meta charset="utf-8">
    	<meta name="copyright" content="notebox.sinaapp.com">
    	<title>{{$subtitle}}-笔记盒-notebox.sinaapp.com</title>
        <link rel='stylesheet' type='text/css' href="{{$static}}/css/bootstrap.min.css"/>
        <link rel='stylesheet' type='text/css' href="{{$static}}/css/styles.css"/> 
    	<script src="{{$static}}/js/jquery-1.9.0.js"></script>
        <script src="{{$static}}/js/tabby.js"></script>
  	</head>
    <body>
        <div class='container'>
            <div class='row'>
                <div class='span12'>
                    <div class='header'>
                        <a href='/site/index'>
                            <div class='logo'>
                                <img src="{{$static}}/img/logo.png" class='logoImg'/>
                                <p class='logoText'>笔记盒</p>
                                <div class='clear'></div>
                            </div>
                        </a>
                        <ul class='topUl'>
                            {{if $user['isGuest'] eq true}}
                            <a href='/user/login'><li>登录</li></a>
                            <a href='/user/signUp'><li>注册</li></a>
                            {{else}}
                            <span>欢迎回来，{{$user['nickname']}}</span>
                            <a href='/user/logout'><li>登出</li></a>
                            <a href='/box/create'><li>盒子＋1</li></a>
                            <a href='/note/create'><li>笔记＋1</li></a>
                            <a href='/note/index'><li>笔记池</li></a>
                            {{/if}}           
                        </ul>
                        <div class='clear'></div>
                    </div>
                    <div class='middle'>                       
                        <div class='leftCol'>{{block name=leftCol}}{{/block}}</div>
                        <div class='rightCol'>
                        	<div class='userInfo' id='userInfo'>
                                <div class='avatarInfo' id='avatarInfo'>
                                    <p class='nickname' id='nickname'>{{$user['nickname']}}</p>
                                    <div class='avatar'>
                                        <img src="{{$static}}/img/avatar.png" class='avatarImg img-rounded'/>	
                                    </div>
                                </div>
                                <div class='noteInfo' id='noteInfo'>                              
                                    <p class='noteInfoCol'>
                                        <a href="/user/boxes/{{$user['id']}}" id='noteInfoLeft'>
                                            {{$user['boxNum']}}<br>
                                            盒子
                                        </a>
                                        <a class='hide' id='saveUpdateUser'>保存</a>
                                    </p>                                                                      
                                    <p class='noteInfoCol'>
                                        <a href="/user/notes/{{$user['id']}}" id='noteInfoRight'>
                                            {{$user['noteNum']}}<br>
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
                    <img src="{{$static}}/img/avatar.png" class='avatarImg img-rounded'/> 
                    <a href="javascript:void(0)" id='changeAvatar' class='changeAvatar'>更换头像</a> 
                    <input type='file' name="UserForm[avatarUrl]" id="UserForm_avatarUrl" class='avatarUrlInput'> 
                </div>
                <input name="UserForm[id]" id="UserForm_id" type='hidden' value="{{$user['id']}}"> 
                <input name="UserForm[nickname]" id="UserForm_nickname" type='text' placeholder='昵称' value="{{$user['nickname']}}">
                <div class='inputError' id='nicknameError'></div>
                <input name="UserForm[qq]" id="UserForm_qq" type='text' placeholder='QQ' value="{{$user['qq']}}">
                <div class='inputError' id='qqError'></div>
                <input name="UserForm[tel]" id="UserForm_tel" type='text' placeholder='联系方式' value="{{$user['tel']}}">
                <div class='inputError' id='telError'></div>
                <input name="UserForm[residence]" id="UserForm_residence" type='text' placeholder='现居地' value="{{$user['residence']}}">
                <div class='inputError' id='residenceError'></div>
                <input name="UserForm[favorite]" id="UserForm_favorite" type='text' placeholder='最爱' value="{{$user['favorite']}}">
                <div class='inputError' id='favoriteError'></div>
                <input name="UserForm[sex]" id="UserForm_sex" type='hidden' class='radioButton' value='1'>
                {{if $user['sex'] eq 1}}
                <input type='button' class='button current' id='UserForm_boy' value='男'>
                <input type='button' class='button' id='UserForm_girl' value='女'>
                {{else}}
                <input type='button' class='button' id='UserForm_boy' value='男'>
                <input type='button' class='button current' id='UserForm_girl' value='女'>
                {{/if}}               
            </form>
    </body> 
    <script>
    /*ajax文件上传函数*/
    function ajaxFileUpload(){
        $('#upload_post').attr({'src':'{{$static}}/img/loading.gif'});
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
                    $('#upload_post').attr({'src':'{{$static}}/img/upload_post.png'});
                    alert('上传出错了，请稍后重试');
                }
            },
            error: function (data, status, e){                   
                    alert(e);
                    $('#upload_post').attr({'src':'{{$static}}/img/upload_post.png'});
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
