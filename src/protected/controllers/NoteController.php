<?php

class NoteController extends Controller
{
    
   	private $_dir='application.controllers.note';
    
	public function actions(){
    	return array(
            'index'=>$this->_dir.'.IndexAction',
        	'create'=>$this->_dir.'.CreateAction',
            'view'=>$this->_dir.'.ViewAction',
            'delete'=>$this->_dir.'.DeleteAction',
            'update'=>$this->_dir.'.UpdateAction',
            'collect'=>$this->_dir.'.CollectAction',
            'comments'=>$this->_dir.'.CommentsAction',
            'reply'=>$this->_dir.'.ReplyAction',
        );
    }

    public function tranTime($time){
   		$nowTime = time();
	   	$dur = abs($nowTime - $time);
	   	if($dur < 60){
	     	return '刚刚';
	    }elseif($dur < 3600){
	      	return floor($dur/60).'分钟前';
	    }elseif($dur < 86400){	      	
	       	return floor($dur/3600).'小时前';
	    }elseif($dur < 259200){//3天内	       	
	        return floor($dur/86400).'天前';
	    }else{
	        return date('Y-n-j H:i',$time);
	    }
    }
}