{{extends file='application.views.layouts.main_without_top_nav'}}
{{block name=middle}}
	<h4>用户登录</h4>
    <div class='userForm'>
        {{CHtml::beginForm()}}
        <div>
            <p class='inputLabel'>邮箱：</p>
            <div class='input'>{{CHtml::activeTextField($form,'email')}}</div>
            <div class='inputError'>{{CHtml::error($form,'email')}}</div>
            <div class='clear'></div>
        </div>
        <div>
            <p class='inputLabel'>密码：</p>
            <div class='input'>{{CHtml::activePasswordField($form,'password')}}</div>
            <div class='inputError'>{{CHtml::error($form,'password')}}</div>
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
        {{CHtml::endForm()}}
    </div>
{{/block}}