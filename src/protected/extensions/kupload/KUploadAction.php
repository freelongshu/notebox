<?php
/**
* example:
class DiaryController extends CController
{
	public function actions()
	{
		return array(
			'imageuploaded'=>array(
				'class'=>'ext.kupload.KUploadAction',
				'secretKey' => 'RoM7QXQaVORJB/zjvkfIxtccAzo=',
			),
		);
	}
}
*/


class KUploadAction extends CAction
{
	public $secretKey;
	
	public function run($code='',$url='',$time='',$message='',$sign='')
	{
		if($code){
			if($code == '200'){
				if(md5($code.'&'.$message.'&'.$url.'&'.$time.'&'.$this->secretKey) === $sign){
					echo json_encode($_GET);
				}else{
					throw new CHttpException('401','invalid upload');
				}
			}else{
				throw new CHttpException($code,$message);
			}
		}
	}
}