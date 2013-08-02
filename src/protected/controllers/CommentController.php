<?php

class CommentController extends Controller
{
    
   	private $_dir='application.controllers.comment';
    
	public function actions(){
    	return array(
            'index'=>$this->_dir.'.IndexAction',
        	'create'=>$this->_dir.'.CreateAction',
            'view'=>$this->_dir.'.ViewAction',
            'delete'=>$this->_dir.'.DeleteAction',
            'update'=>$this->_dir.'.UpdateAction',
        );
    }
    
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform
				'actions'=>array('view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

}