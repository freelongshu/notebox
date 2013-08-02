<?php

class BoxRepository extends Repository{
    
    private $_tabel='box';
    
    public function create($form){
        $this->dbCommand()
            ->insert($this->_tabel,array(
                'name'=>$form['name'],
				'createTime'=>time(),
				'updateTime'=>time(),
                'userId'=>$form['userId'],
                'isPublic'=>$form['isPublic'],
            ));
        $id = $this->getDb()->getLastInsertID();
        return $id;
    }

    public function get($id){
        $model = $this->dbCommand()
            ->from($this->_tabel)
            ->where('id=:id', array(':id' => intval($id)))
            ->select('*')
            ->queryRow();
        return $model;
    }
	
    public function update($id,$params){
        $model=$this->get($id);
		$num=$this->dbCommand()->update($this->_tabel,$params,'id=:id',array(':id'=>intval($id)));
		if($num!=1) throw new UpdateNoteError(array('id'=>$id));
		return true;
	}
    
    public function recent(){
    	$models=$this->dbCommand()
            ->select('*')
            ->from($this->_tabel)
            ->where('isDelete==0 order by createTime desc')
            ->queryAll();
  		return $models;      
    }
    
    public function myBoxes($userId){
    	$models=$this->dbCommand()
            ->select('*')
            ->from('box')
            ->where('userId=:userId order by createTime',array(':userId'=>$userId))
            ->queryAll();
        return $models;
    }
    
    public function nameById($id){
    	$model = $this->dbCommand()
            ->select('name')
            ->from('box')
            ->where('id=:id',array(':id'=>$id))
            ->queryRow();
        return $model['name'];
    }
    
    public function myBoxesWithNotes($userId){
        $sql='select box.*,note.* from box FULL JOIN note ON box.id=note.boxId where box.userId='.intval($userId).' order by box.createTime desc';
    	$models=$this->dbCommand($sql)->queryAll();
        return $models;
    }
}
