<?php 
class CreateAction extends PageAction{
	public function runPage(){
		$this->requireLogin();
        $userName=Yii::app()->user->name;
		$form=new BoxForm;
		if (isset($_POST['BoxForm'])) {
            $form->attributes = $_POST['BoxForm'];
            $form->userId=Yii::app()->user->id;
            if ($form->validate()) {
                $id=$this->repo('box')->create($form);
                $this->repo('user')->addBoxNum(Yii::app()->user->id);
                $this->redirect('/user/boxes/');
            }
        }
        return array(
            'subtitle'=>'新建一个盒子',
			'form' => $form,
        );
	}
}
?>
