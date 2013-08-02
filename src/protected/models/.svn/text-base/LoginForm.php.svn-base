<?php

class LoginForm extends CFormModel
{
    public $email;
    public $password;
	public $rememberMe;
    public function rules()
    {
        return array(
            array('email, password', 'required'),
			array('rememberMe','boolean'),
			array('email','email','message'=>'邮箱格式不正确'),
        );
    }
}