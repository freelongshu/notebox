<?php

class DeleteAction extends PageAction{
	
	public function runPage(){
		$this->requireLogin();
		$id = $_GET['id'];
		$this->repo('box')->delete($id);
		$this->repo('user')->reduceBoxNum(Yii::app()->user->id);
		$this->redirect('/user/notes/'.Yii::app()->user->id);
	}
}