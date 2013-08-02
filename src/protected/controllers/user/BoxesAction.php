<?php
class BoxesAction extends PageAction{
	
    public function runPage(){
    	$this->requireLogin();
        $myBoxes=$this->repo('box')->myBoxes(Yii::app()->user->id);
        return array(
        	'title'=>'笔记盒子',
            'subTitle'=>'我的盒子',
            'myBoxes'=>$myBoxes,
        );
    }
}
?>