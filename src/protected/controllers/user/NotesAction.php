<?php

class NotesAction extends PageAction
{	
	public function runPage(){
        $this->requireLogin();
        $notes=$this->repo('note')->allWithAuthor(Yii::app()->user->id);
        return array(
            'subtitle'=>Yii::app()->user->name.'的笔记',
            'notes'=>$notes,
        );
	}
}