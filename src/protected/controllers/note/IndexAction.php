<?php

class IndexAction extends PageAction
{	
	public function runPage(){
        $this->requireLogin();
        $user=$this->repo('user')->get(Yii::app()->user->id);
        $recentNotes=$this->repo('note')->recent();
        $myBoxes = $this->repo('box')->myBoxes(Yii::app()->user->id);
        $boxForm = new BoxForm();
        return array(
            'title'=>'笔记盒',
            'subtitle'=>'所有笔记',
        	'user'=>$user,
            'recentNotes'=>$recentNotes,
            'myBoxes'=>$myBoxes,
            'boxForm'=>$boxForm,
        );
	}
}