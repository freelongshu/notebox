<?php

class TempAddAction extends AjaxAction{
	
	public function runAjax(){
		$addStatus = 'fail';
		$boxId=null;
		$this->requireLogin();
		$boxName = $_POST['boxName'];
		$form = new BoxForm();
		$form->name = $boxName;
		$form->userId = Yii::app()->user->id;
		$form->isPublic = 1;
		if($form->validate()){	
			$boxId=$this->repo('box')->create($form);
			$this->repo('user')->addBoxNum(Yii::app()->user->id);
			$addStatus = 'success';
		}
		return array(
			'addStatus'=>$addStatus,
			'boxId'=>$boxId,
		);
	}
}