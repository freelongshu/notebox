<?php 

class NoteCollectorRepository extends Repository{
	
	private $_table='noteCollector';
    
    public function create($form){
        $this->dbCommand()
            ->insert($this->_table,array(
                'noteId'=>$form['noteId'],
                'collectorId'=>$form['boxId'],
                'boxName'=>$form['boxName'],
                'content'=>$form['content'],
				'createTime'=>time(),
				'updateTime'=>time(),
                'authorId'=>$form['authorId'],
                'authorName'=>$form['authorName'],
            ));
        $id = $this->getDb()->getLastInsertID();
        return $id;
    }

    public function get($id){
        $model = $this->dbCommand()
            ->select('*')
            ->from($this->_table)
            ->where('id=:id', array(':id' => intval($id)))
            ->queryRow();
        return $model;
    }
	
    public function update($id,$params){
        $model=$this->get($id);
		$num=$this->dbCommand()->update($this->_table,$params,'id=:id',array(':id'=>intval($id)));
		if($num!=1) throw new UpdateNoteError(array('id'=>$id));
		return true;
	}
    
    public function delete($id){
        return $this->update($id,array('isDelete'=>1));
    }

}