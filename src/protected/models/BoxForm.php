<?php

class BoxForm extends CFormModel
{
	public $id;
    public $name;
    public $notes;
    public $userId;
    public $noteNum;
    public $isDelete;  
    public $isPublic;
    public $createTime;
    public $updateTime;
    public $description;
    public $parentBoxId;
    

	public function attributeLabels(){
		return array(
			'name'=>'盒子名',
            'noteNum'=>'笔记数目',
            'isPublic'=>'是否公开',
            'createTime'=>'创建时间',
            'updateTime'=>'更新时间',
            'description'=>'描述',
		);
	}
	
    public function rules(){
		return array(
            array('name,userId','required'),
            array('description,isPublic,notes','safe'),
		);
    }
}