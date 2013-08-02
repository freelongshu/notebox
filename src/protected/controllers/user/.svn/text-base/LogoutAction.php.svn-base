<?php

class LogoutAction extends PageAction{
	
    public function runPage(){
		$webuser=Yii::app()->user;
        Yii::getLogger()->info('application.user.logout', array(
            'user_id' => Yii::app()->user->id,
           'user_name' => Yii::app()->user->name,
        ));

        $webuser->logout();
        $this->controller->redirect('/site/index');
	}
}