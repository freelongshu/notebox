<?php

class Repository extends CComponent
{

    private $_table='';

    public $dbCommand=null;
    
    public function getDb()
    {
        return Yii::app()->db;
    }

    public function dbCommand($sql='')
    {
        $this->dbCommand = Yii::app()->db->createCommand($sql);
        return $this->dbCommand;
    }

    protected function dbQuery($query)
    {
        return Yii::app()->db->createCommand($query);
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

    public function getBy($colName,$value){
        $model = $this->dbCommand()
            ->select('*')
            ->from($this->_table)
            ->where($colName.'=:value',array(':value'=>$value))
            ->queryRow();
        return $model;
    }

    public function getAllBy($colName,$value){
        $models = $this->dbCommand()
            ->select('*')
            ->from($this->_table)
            ->where($colName.'=:value',array(':value'=>$value))
            ->queryAll();
        return $models;
    }

}
