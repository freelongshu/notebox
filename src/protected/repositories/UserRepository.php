<?php

class UserRepository extends Repository
{
    private $_table = 'user';

    public function getChineseCharacter(){
		$unidec = rand(19968, 40869);
		$unichr = '&#' . $unidec . ';';
		$zhcnchr = mb_convert_encoding($unichr, "UTF-8", "HTML-ENTITIES");
		return $zhcnchr;
	}
	
	public function getSalt(){
		$str = '';
		$str = $str . $this->getChineseCharacter();
		$str = $str . $this->getChineseCharacter();
		$str = $str . $this->getChineseCharacter();
		$str = $str . $this->getChineseCharacter();
		$str = $str . $this->getChineseCharacter();
		$str = $str . $this->getChineseCharacter();
		return $str;
	}
	
	public function hashPassword($password,$salt){
        return md5($salt.$password);
    }
    
    public function validatePassword($password){
        return $this->hashPassword($password,$this->salt)===$this->password;
    }
    
    public function create($form){
        $salt=$this->getSalt();
        $hashPassword=$this->hashPassword($form->password,$salt);
        $this->dbCommand()
            ->insert('user',array(
                'nickname'=>$form['nickname'],
                'email'=>$form['email'],
                'salt'=>$salt,
                'password'=>$hashPassword,
				'createTime'=>time(),
				'updateTime'=>time(),
                'emailVerifyCode'=>$form['emailVerifyCode'],
            ));
        $id = $this->getDb()->getLastInsertID();
        return $id;
    }

    public function get($id){
        $user = $this->dbCommand()
            ->from('user')
            ->where('id=:id', array(':id' => intval($id)))
            ->select('*')
            ->queryRow();
        return $user;
    }
	
    public function update($id,$params){
        $model=$this->get($id);
        $change = false;;
        foreach ($params as $colName=>$value) {
            if($value!=$model[$colName]){
                $change = true;
                break;
            }
        }
        if($change==false) return true;
		$num=$this->dbCommand()->update($this->_table,$params,'id=:id',array(':id'=>intval($id)));
		if($num!=1) throw new UpdateUserError(array('id'=>$id));
		return true;
	}
    
    public function isSignUp($email){
    	$id = $this->dbCommand()
            ->select('id')
            ->from('user')
            ->where('email=:email',array(':email'=>$email))
            ->queryRow();
        if($id==false) return false;
        else return true;
    }
    
    public function updateIsEmailVerify($id){
    	$result=$this->update($id,array('isEmailVerify'=>1));
        return $result;
    }
    
    public function getUserByEmail($email){
    	$user=$this->dbCommand()
            ->select('*')
            ->from('user')
            ->where('email=:email',array(':email'=>$email))
            ->queryRow();
        return $user;
    }
    
    public function getByEmailVerifyCode($code){
    	$user=$this->dbCommand()
            ->select('*')
            ->from('user')
            ->where('emailVerifyCode=:code',array(':code'=>$code))
            ->queryRow();
        return $user;
    }
    
	public function getUserByPlatformUserId($platform_user_id){
		$user=$this->dbCommand()
			->from('user')
			->where('platform_user_id=:platform_user_id',array(':platform_user_id'=>$platform_user_id))
			->select('*')
			->queryRow();
		return $user;
	}

    public function updateUserLastLoginTime($id)
    {
        $last_login_time = time();
        $this->dbCommand()->update(
            'user', array('last_login_time' => $last_login_time),
            'id=:id', array('id' => intval($id)));
    }
    
    public function sendEmail($to,$subject,$msgBody,$smtpUser,$smtpPassword){
    	
         $mail = new SaeMail();
                
         $mail->setOpt(array(
         	'from'=>$smtpUser,
            'to'=>$to,
            'smtp_username'=>$smtpUser,
            'smtp_password'=>$smtpPassword,
            'smtp_host'=>'smtp.sina.cn',
            'subject'=>$subject,
            'content'=>$msgBody,
            'callback_url'=>"http://notebox.sinaapp.com/site/index",
            'content_type'=>'HTML',
          ));
       
          $isOk = $mail->send();// 发送邮件
          if (!$isOk) {
                var_dump($mail->errmsg());
                var_dump($mail->errno());
          }else{
          		return true;
          }
    }
    
    public function sendMsg($tel,$msg){
		 $sms = apibus::init( "sms"); //创建短信服务对象
         $obj = $sms->send( $tel, $msg , "UTF-8"); 

         //错误输出 Tips: 亲，如果调用失败是不收费的 
        if ( $sms->isError( $obj ) ) { 
         print_r( $obj->ApiBusError->errcode ); 
         print_r( $obj->ApiBusError->errdesc );
         }
	}

    public function addNoteNum($userId){
        $user = $this->get($userId);
        return $this->update($userId,array('noteNum'=>$user['noteNum']+1));
    }

    public function reduceNoteNum($userId){
        $user = $this->get($userId);
        return $this->update($userId,array('noteNum'=>$user['noteNum']-1));
    }

    public function addBoxNum($userId){
        $user = $this->get($userId);
        return $this->update($userId,array('boxNum'=>$user['boxNum']+1));
    }

    public function reduceBoxNum($userId){
        $user = $this->get($userId);
        return $this->update($userId,array('boxNum'=>$user['boxNum']-1));
    }

    public function getBy($colName,$value){
        $model = $this->dbCommand()
            ->select('*')
            ->from('user')
            ->where($colName.'=:value',array(':value'=>$value))
            ->queryRow();
        return $model;
    }

    public function nameExist($name){
        $model = $this->getBy('nickname',$name);
        if(empty($model)) return false;
        else return true;
    }
}

