<?php 
class SendVerifyCodeAction extends AjaxAction{
	 public function randCode($length){
    	$randCode = '';  
        for ($i = 0; $i < $length; $i++)  {  
            $randCode .= mt_rand(0, 9);  
        }  
        return $randCode; 
    }
	public function runAjax(){
		$tel=$_POST['tel'];
		$randCode=$this->randCode(6);
		$res=$this->repo('user')->sendMsg($tel,'欢迎加入枇杷树！您的手机验证码是：'.$randCode.'请在页面填写验证码完成验证。(如非本人操作，可不予理会)');
        Yii::app()->session['telVerifyCode']=array('randCode'=>$randCode,'timestamp'=>time());
		if($res==true){
			return array(
				'sendStatus'=>'Success',
				'randCode'=>$randCode,
			);
		}else{
			return array(
				'sendStatus'=>'Fail',	
			);
		}
	}
}
?>