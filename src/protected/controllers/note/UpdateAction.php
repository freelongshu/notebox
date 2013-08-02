<?php

class UpdateAction extends PageAction{
	
	public function runPage(){
		$this->requireLogin();
		$noteId = $_GET['noteId'];
		$note = $this->repo('note')->withAuthorBoxBy('id',$noteId);
		$myBoxes = $this->repo('box')->myBoxes(Yii::app()->user->id);
		$boxForm = new BoxForm();
		$form = new NoteForm();
		$form->attributes = $note;
		if(isset($_POST['NoteForm'])){
			$form->attributes = $_POST['NoteForm'];
			if($form->validate()){
				$this->repo('note')->update($note['id'],array(
					'boxId'=>$form->boxId,
					'title'=>$form->title,
					'content'=>$form->content,
					'isPublic'=>$form->isPublic,
					'updateTime'=>time(),
				));
				$this->redirect('/note/index');
			}
		}
		return array(
			'title'=>'笔记盒',
			'subtitle'=>'更改笔记',
			'myBoxes'=>$myBoxes,
			'boxForm'=>$boxForm,
			'form'=>$form,
			'note'=>$note,
		);
	}
}