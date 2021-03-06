<?php

class NoteForm extends CFormModel
{
	public $id;
    public $title;
    public $boxId;
    public $viewNum;
    public $content;
    public $authorId;
    public $isDelete;  
    public $isPublic;
    public $isFreeze;   
    public $createTime;
    public $updateTime;
    public $commentNum;
    
	public function attributeLabels(){
		return array(
			'title'=>'标题',
            'content'=>'内容',
            'isPublic'=>'是否公开',
		);
	}
	
    public function rules(){
		return array(
            array('content,authorId,boxId,isPublic','required'),
            array('title','safe'),
		);
    }
}