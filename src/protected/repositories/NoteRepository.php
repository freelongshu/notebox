<?php

class NoteRepository extends Repository{
    
    private $_table='note';

    public function create($form){
        $this->dbCommand()
            ->insert($this->_table,array(
                'title'=>$form['title'],
                'boxId'=>$form['boxId'],
                'content'=>$form['content'],
				'createTime'=>time(),
				'updateTime'=>time(),
                'authorId'=>$form['authorId'],
                'isPublic'=>$form['isPublic'],
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
        $change = false;;
        foreach ($params as $colName=>$value) {
            var_dump($colName);exit;
            if($value!=$model[$colName]){
                $change = true;
                break;
            }
        }
        if($change==false) return true;
		$num=$this->dbCommand()->update($this->_table,$params,'id=:id',array(':id'=>intval($id)));
		if($num!=1) throw new UpdateNoteError(array('id'=>$id));
		return true;
	}
    
    public function delete($id){
        return $this->update($id,array('isDelete'=>1));
    } 

    public function recent(){
        $models = $this->dbCommand()
            ->select('note.*, user.nickname as authorName, user.id as authorId, box.name as boxName, box.id as boxId, 
                origiNote.id as origiNoteId, origiNote.title as origiNoteTitle, origiAuthor.id as origiAuthorId,
                origiAuthor.nickname as origiAuthorName')
            ->from('note')
            ->leftJoin('user','note.authorId=user.id')
            ->leftJoin('box','note.boxId=box.id')
            ->leftJoin('note as origiNote','note.origiNoteId=origiNote.id')
            ->leftJoin('user as origiAuthor','note.origiAuthorId=origiAuthor.id')
            ->where('note.isDelete = 0')
            ->order('note.updateTime desc')
            ->queryAll();
        return $models;
    }

    public function withAuthorBoxBy($colName,$value){
        $models = $this->dbCommand()
            ->select('note.*, user.nickname as authorName, user.id as authorId, box.name as boxName, box.id as boxId')
            ->from($this->_table)
            ->leftJoin('user','note.authorId=user.id')
            ->leftJoin('box','note.boxId=box.id')
            ->where('note.'.$colName.'=:value and note.isDelete = 0',array(':value'=>$value))
            ->order('updateTime desc')
            ->queryRow();
        return $models;   
    }

    public function addCommentNum($noteId){
        $note = $this->get($noteId);
        $this->update($noteId,array('commentNum'=>$note['commentNum']+1));
        return $note['commentNum']+1;
    }
}
?>