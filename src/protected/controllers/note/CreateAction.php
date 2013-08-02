<?php

class CreateAction extends PageAction{
    public function runPage(){
    	$this->requireLogin();
        $myBoxes=$this->repo('box')->myBoxes(Yii::app()->user->id);
        $form=new NoteForm();
        $boxForm=new BoxForm();
        if(isset($_POST['NoteForm'])){
            $form->attributes=$_POST['NoteForm'];
            $form->authorId=Yii::app()->user->id;
            if($form->validate()){
            	$this->repo('note')->create($form);
                $this->repo('user')->addNoteNum(Yii::app()->user->id);
                $this->redirect('/note/index');
            }
        }
        return array(
        	'title'=>'笔记盒',
            'subtitle'=>'发布笔记',
            'myBoxes'=>$myBoxes,
            'boxForm'=>$boxForm,
            'form'=>$form,
        );
    }
}
?>