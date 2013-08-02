<?php
/**
 * example:
$this->widget('ext.kupload.KUploadAjaxWidget', array(
	'bucketname' =>'square',
	'secretKey' => 'RoM7QXQaVORJ8/zjvkfIxtccAzo=',
	'id'=>'editor-image-upload',//HTML中的ID
	'saveKey'=>'/{year}/{mon}/{day}/{random}{.suffix}',
	'onDone'=>'js:function (e, data) {Kibey.Editor.imageUploaded(data.result)}',
	'htmlOptions'=>array(
		'class'=>'real_upload opacity_0','size'=>50,
	),
));
*/


Yii::import('ext.kupload.KUploadWidget');

class KUploadAjaxWidget extends KUploadWidget
{
	public $onDone;
	public $multi = true;
	public $options = array();
	protected $swf;
	
	public function init()
	{
		if(!$this->onDone) 
			$this->onDone = 'js:function (file, data, response) {data = $.parseJSON(data);$("#'.$this->getId().'").trigger("uploaded",[data,file]);}';
		parent::init();
		$this->publishAssets();
		$this->typeLimit();
		$this->sizeLimit();
	}

	protected function typeLimit()
	{
		if(!$this->allowFileType) return;
		$fileTypes = explode(',', $this->allowFileType);
		$exts = array();
		foreach ($fileTypes as $fileType) {
			$exts[]='*.'.$fileType;
		}
		$this->options['fileTypeExts'] = implode(';', $exts);
	}

	protected function sizeLimit()
	{
		if(!$this->contentLengthRange) return;
		$sizeRange = explode(',', $this->contentLengthRange);
		$maxSize = intval($sizeRange[1]);
		if($maxSize<=0) return;
		$this->options['fileSizeLimit'] = ($maxSize/1024).'KB';
	}
	
	protected function publishAssets()
	{
		$assets = dirname(__FILE__) . '/assets';
		if (YII_DEBUG)
			$baseUrl = Yii::app()->assetManager->publish($assets, false, -1, true);
		else
			$baseUrl = Yii::app()->assetManager->publish($assets);
		if (is_dir($assets)) {
			Yii::app()->clientScript->registerCssFile($baseUrl . '/uploadify.css');
			Yii::app()->clientScript->registerScriptFile($baseUrl . '/jquery.uploadify.js', CClientScript::POS_END);
			$this->swf = $baseUrl.'/uploadify.swf';
		} else {
			throw new CHttpException(500, 'KUpload - Error: Couldn\'t find assets to publish.');
		}
	}
	
	protected function generateScript()
	{
		$id=$this->getId();
		$options = array(
			'swf'=>$this->swf,
			'uploader'=>$this->_url,//'http://local.ideaworks.cn/site/login',//
			'formData'=>array(
				'policy'=>$this->_policy,
				'signature'=>$this->_signature,
			),
			'fileObjName'=>'file',
			'removeTimeout'=>0,
			'buttonText'=>'点此选取图片',
			'width'=>151,
			'height'=>32,
			'onUploadSuccess'=>$this->onDone,
		);
		if(!$this->multi) $options['multi'] = false;
		$options = array_merge($options,$this->options);
		//$options['onUploadSuccess']= "js:function(file, data, response) {console.log(file,data);}";
		$options=CJavaScript::encode($options);
		Yii::app()->clientScript->registerScript(__CLASS__.'#'.$id, "jQuery('#{$id}').uploadify({$options});", CClientScript::POS_READY);
	}
	
	public function run()
	{
		$this->generateScript();
		echo CHtml::fileField('file','',$this->htmlOptions);
	}
}
