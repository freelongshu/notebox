<?php

class DeleteAction extends PageAction{
	
	public function runPage(){
		$this->requireLogin();
		$id = $_GET['id'];
		var_dump($id);exit;
		$this->repo('note')->delete($id);
		$this->repo('user')->reduceNoteNum(Yii::app()->user->id);
		$this->redirect('/note/index');
	}
}