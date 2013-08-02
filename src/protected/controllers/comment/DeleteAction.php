<?php

class DeleteAction extends AjaxAction{
	
	public function runAjax(){
		$this->repo('comment')->delete($_POST['id']);
		return array(
			'deleteStatus'=>'success',
		);
	}
}