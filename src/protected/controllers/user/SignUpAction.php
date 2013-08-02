<?php
class SignUpAction extends PageAction
{
    public function randCode($length){
    	$randCode = '';  
        for ($i = 0; $i < $length; $i++)  {  
            $randCode .= chr(mt_rand(65, 90));  
        }  
        return $randCode; 
    }
    
    public function runPage()
    {
        $form = new UserForm();

        if (isset($_POST['UserForm'])) {           
            $form->attributes = $_POST['UserForm'];                                   
            $form->emailVerifyCode=$this->randCode(60);
            if ($form->validate()) {
                if($this->repo('user')->nameExist($form->nickname)){
                    $form->addError('nickname','这名字被抢走了……换一个吧');
                    return array(
                        'form'=>$form,
                    );
                }
                /*if($this->repo('user')->isSignUp($form->email)){
            		$form->addError('email','该邮箱已被注册，请更换另一个邮箱！');
                    return array(
                        'form'=>$form,
                    );
                }*/
                $id=$this->repo('user')->create($form);
			    $this->view='verifyEmail';
                
                $this->sendVerifyEmail($form->email,$form->emailVerifyCode);
                /*
                $this->repo('user')->sendEmail($form->email, '笔记盒注册用户邮箱验证' , 
				"您好！<br>欢迎注册<a href='http://notebox.sinaapp.com'>笔记盒子</a>! 请点击以下链接完成邮箱验证：
				<a href='http://notebox.sinaapp.com/user/verifyEmail/".$form->emailVerifyCode."'>http://notebox.sinaapp.com/user/setPassword/".$form->emailVerifyCode."</a><br>
                --<br>
                笔记盒<br>
                notebox.sinaapp.com" , 
				'notebox@sina.cn' , 'notebox2013');
                */

                return array(
                    'subtitle'=>'用户注册成功',
				    'form'=>$form,
				    'unverifyEmail'=>$form->email,
				);
            }
        }
        return array(
            'subtitle' => '用户注册',
			'form' => $form,
        );
    }

    public function sendVerifyEmail($to,$emailVerifyCode){
        $message = "您好！<br>欢迎注册<a href='http://notebox.sinaapp.com'>笔记盒子</a>! 请点击以下链接完成邮箱验证：
        <a href='http://notebox.sinaapp.com/user/verifyEmail/".$emailVerifyCode."'>http://notebox.sinaapp.com/user/verifyEmail/".$emailVerifyCode."</a><br>
        --<br>
        笔记盒<br>
        notebox.sinaapp.com";
        Yii::app()->mailer->CharSet = 'UTF-8';
        Yii::app()->mailer->Host = Yii::app()->params['smtp_host'];
        Yii::app()->mailer->IsSMTP();
        Yii::app()->mailer->SMTPAuth = true;
        Yii::app()->mailer->Username = Yii::app()->params['smtp_username'];
        Yii::app()->mailer->Password = Yii::app()->params['smtp_password'];
        Yii::app()->mailer->From = 'notebox@sina.cn';
        Yii::app()->mailer->FromName = Yii::app()->params['siteUrl'];
        Yii::app()->mailer->AddAddress($to);
        Yii::app()->mailer->Subject = Yii::app()->name.'注册用户邮箱验证';
        Yii::app()->mailer->IsHTML(true);
        Yii::app()->mailer->Body = $message;
        Yii::app()->mailer->SingleTo = true;
        $sent = Yii::app()->mailer->Send();
        return $sent;
    }
}
