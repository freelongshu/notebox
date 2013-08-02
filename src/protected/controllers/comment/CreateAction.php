<?php

class CreateAction extends AjaxAction{
	
	public function runAjax(){
		$this->repo('comment')->create(array(
			'noteId'=>$_POST['noteId'],
			'content'=>$_POST['content'],
			'authorId'=>Yii::app()->user->id,
			'authorName'=>Yii::app()->user->name,
			'commentId'=>$_POST['commentId'],
		));
		$html = $this->controller->renderPartial('comment',array('comment'=>$comment,'noteId'=>$_POST['noteId']),true);
		return array(
			'createStatus'=>'success',
			'html'=>$html,
		);
	}
}