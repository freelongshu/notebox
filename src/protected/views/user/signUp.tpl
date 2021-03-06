{{extends file="application.views.layouts.main_without_top_nav"}}
{{block name=middle}}
   	<h4>用户注册</h4>
    <div class='userForm'>
        <form action="/user/signUp" id='userForm' method="post">
        <div>
            <p class="inputLabel">昵称：</p>
            <div class="input"><input name="UserForm[nickname]" id="UserForm_nickname" type="text"></div>
            <div class="inputError" id='emailError'>{{CHtml::error($form,'nickname')}}</div>
            <div class="clear"></div>
        </div>
        <div>
            <p class="inputLabel">邮箱：</p>
            <div class="input"><input name="UserForm[email]" id="UserForm_email" type="text"></div>
            <div class="inputError" id='emailError'>{{CHtml::error($form,'email')}}</div>
            <div class="clear"></div>
        </div>
        <div>
            <p class="inputLabel">密码：</p>
            <div class="input"><input name="UserForm[password]" id="UserForm_password" type="password"></div>
            <div class="inputError" id='passwordError'>{{CHtml::error($form,'password')}}</div>
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
{{/block}}

 