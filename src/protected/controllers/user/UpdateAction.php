<?php

class UpdateAction extends AjaxAction{
	
	public function runAjax(){
		$this->repo('user')->update($_POST['userId'],array(
			'nickname'=>$_POST['nickname'],
			'qq'=>$_POST['qq'],
			'tel'=>$_POST['tel'],
			'residence'=>$_POST['residence'],
			'favorite'=>$_POST['favorite'],
			'sex'=>$_POST['sex'],
		));
		return array(
			'updateStatus'=>'success',
		);
	}
}