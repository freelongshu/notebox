<?php

class LoginAction extends PageAction
{
    const LOGIN_DURATION = 2592000; // 30 days

	public function hashPassword($password,$salt)
    {
        return md5($salt.$password);
    }
    
    public function runPage()
    {
        $webuser = Yii::app()->user;

        $form = new LoginForm();

        if (isset($_POST['LoginForm'])) {
            $form->attributes = $_POST['LoginForm'];
            if ($form->validate()) {
                $auth = $this->repo('user')->getUserByEmail($form->email);
                if ($auth) {
                    if ($this->hashPassword($form->password,$auth['salt']) === $auth['password']) {
                        $identity = new UserIdentity(
                            $auth['id'],
                            $auth['nickname'],
							true);
                        $webuser->login($identity, $form->rememberMe?self::LOGIN_DURATION:0);
                        Yii::getLogger()->info('application.user.login', array(
                            'user_id' => Yii::app()->user->id,
                            'user_name' => Yii::app()->user->name,
                        ));
                        $this->controller->redirect('/note/index');
                    }
                    else {
                        $form->addError('password', '密码错误');
                    }
                }
                else {
                    $form->addError('email', '该邮箱尚未注册');
                }
            }
        }
        
        return array(
            'title' => '笔记盒',
            'subtitle' => '用户登录',
            'form' => $form,
        );
    }
}