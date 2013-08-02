<?php

class UserForm extends CFormModel
{
	public $tel;
    public $salt;
	public $email;
    public $password;
	public $nickname;
	public $socialPlatformType;
	public $avatarUrl;
	public $platformUserId;
    public $telVerifyCode;
    public $emailVerifyCode;
	public function attributeLabels(){
		return array(
            'tel'=>'手机',
            'email'=>'邮箱',
            'nickname'=>'昵称',
            'password'=>'密码',
		);
	}
	
    public function rules(){
		return array(
			array('nickname,email,password','required'),
			array('email','email','message'=>'邮箱格式不正确'),
		);
    }
}