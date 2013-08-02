<?php
class SendVerifyEmailAction extends AjaxAction{
	public function runAjax(){
        $to=$_POST['email'];
        $user=$this->repo('user')->getUserByEmail($to);
		$res=$this->sendVerifyEmail($to,$user['emailVerifyCode']);
		if($res==true){
			return array('sendStatus'=>'success');	
		}else{
			return array('sendStatus'=>'fail');
		}
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
?>