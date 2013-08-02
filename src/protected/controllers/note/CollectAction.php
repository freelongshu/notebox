<?php

class CollectAction extends PageAction{
	
	public function runPage(){
		$this->requireLogin();
		$id = $_GET['id'];
		$note = $this->repo('note')->get($id);
		$myBoxes = $this->repo('box')->myBoxes(Yii::app()->user->id);
		$boxForm = new BoxForm();
		$form = new NoteForm();
		$form->attributes = $note;
		if(isset($_POST['NoteForm'])){
			$form->attributes = $_POST['NoteForm'];
			if($form->validate()){
				$this->repo('note')->update($note['id'],array(
					'boxId'=>$form->boxId,
					'boxName'=>$form->boxName,
					'title'=>$form->title,
					'content'=>$form->content,
					'isPublic'=>$form->isPublic,
					'isOriginal'=>0,
					'origiNoteId'=>$note['id'],
					'origiTitle'=>$note['title'],
					'origiAuthorName'=>$note['authorName'],
					'origiAuthorId'=>$note['authorId'],
					'collectTime'=>time(),
				));
				$this->redirect('/note/index');
			}
		}
		return array(
			'title'=>'笔记盒',
			'subtitle'=>'转采笔记',
			'myBoxes'=>$myBoxes,
			'boxForm'=>$boxForm,
			'form'=>$form
		);
	}
}