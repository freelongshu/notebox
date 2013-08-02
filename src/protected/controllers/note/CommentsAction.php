<?php
 class CommentsAction extends AjaxAction{

 	public function runAjax(){
 		$noteId = $_POST['noteId'];
 		$comments = $this->repo('comment')->getAllWithAuthorByNoteId($noteId);
 		$html = $this->controller->renderPartial('/comment/comments',array(
 			'noteId'=>$noteId,
 			'comments'=>$comments,
 			'static'=>Yii::app()->request->baseUrl.'/static',
 		),true);
 		return array(
 			'html'=>$html,
 		);
 	}
 }