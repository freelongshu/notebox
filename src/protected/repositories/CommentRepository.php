<?php

class CommentRepository extends Repository{
    
    private $_table='comment';
    
    public function create($form){
        $this->dbCommand()
            ->insert($this->_table,array(
                'content'=>$form['content'],
                'authorId'=>$form['authorId'],
                'noteId'=>$form['noteId'],
                'createTime'=>time(),
                'updateTime'=>time(),           
        ));
        $id = $this->getDb()->getLastInsertID();
        return $id;
    }   

    public function getAllWithAuthorByNoteId($noteId){
        $models = $this->dbCommand()
            ->select('comment.*, user.id as authorId, user.nickname as authorName, user.avatarUrl as authorAvatar')
            ->from('comment')
            ->leftJoin('user','comment.authorId=user.id')
            ->where('comment.noteId=:id',array(':id'=>$noteId))
            ->queryAll();
        return $models;
    }
}
?>