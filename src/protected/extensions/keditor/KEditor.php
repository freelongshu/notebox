<?php

class KEditor extends CWidget
{
	public $fancyboxButton = '';
	public $textareaName = 'content';
	public $initialContent = '';
	public $wrapperID = 'editor_wrapper';
	public $options = array();

	protected $assetsUrl;
	
	public function init()
	{
		parent::init();
		$this->publishAssets();
	}
	
	public function run()
	{
		$this->generateScript();
		$this->render('minieditor',array('textareaName'=>$this->textareaName));
	}
	
	protected function publishAssets()
	{
		$assetsPath = dirname(__FILE__) . '/assets';

		if (YII_DEBUG)
			$this->assetsUrl = Yii::app()->assetManager->publish($assetsPath, false, -1, true);
		else
			$this->assetsUrl = Yii::app()->assetManager->publish($assetsPath);

		if (is_dir($assetsPath)) {
			Yii::app()->clientScript->registerScriptFile($this->assetsUrl . '/editor_config.js', CClientScript::POS_END);
			Yii::app()->clientScript->registerScriptFile($this->assetsUrl . '/ueditor.all.min.js', CClientScript::POS_END);
			// Yii::app()->clientScript->registerScript('DefineTextareaName',"var editorTextareaName = '$this->textareaName'; var initialContent = '$this->initialContent'",CClientScript::POS_HEAD);
			Yii::app()->clientScript->registerScriptFile($this->assetsUrl . '/minitoolbar.js', CClientScript::POS_END);
		} else {
			throw new CHttpException(500, 'KUpload - Error: Couldn\'t find assets to publish.');
		}
	}

	protected function generateScript()
	{
		$defaultOptions = array(
			'textarea'=>$this->textareaName,
			'UEDITOR_HOME_URL'=>$this->assetsUrl.'/',
			'toolbars'=>array(),
			'contextMenu'=>array(),
			'iframeCssUrl'=>$this->assetsUrl.'/themes/default/iframe.css',
			// 'langPath'=>$this->assetsUrl.'/lang/',
			'autoFloatEnabled'=>false,
			'autoHeightEnabled'=>false,
			// 'initialContent'=>"",
			'pasteplain'=>true,
			'initialFrameHeight'=>400,
			'zIndex'=>10,
			// 'pasteplain'=>true,
		);
		$options = array_merge($defaultOptions,$this->options);
		$options=CJavaScript::encode($options);
		$script = "var editor = UE.getEditor('{$this->wrapperID}',{$options});
			if(!window.editors){window.editors={};}window.editors['{$this->wrapperID}']=editor;";
		Yii::app()->clientScript->registerScript(__CLASS__.'#'.$this->id, $script, CClientScript::POS_READY);
		$this->minitoolbarScript();
	}

	protected function minitoolbarScript()
	{
		$bindingScript = <<<EOD
	$('#editor_actions').bind('insertlink',function(event,link){
		var linkHtml = '<a href="'+link.url+'">'+link.title+'</a>';
		editor.execCommand('inserthtml',linkHtml);
	});
	$('#editor_actions').bind('insertvideo',function(event,video){
		var embed = '<embed type="application/x-shockwave-flash" class="edui-faked-video" pluginspage="http://www.macromedia.com/go/getflashplayer"' +
		' src="' + video.swf + '" wmode="transparent" play="true" loop="false" menu="false" allowscriptaccess="never" allowfullscreen="true" >';
		editor.execCommand('inserthtml',embed);
	});
	$('#editor_actions').bind('insertimage',function(event,imageUrl){
		var imageHtml = '<img src="'+imageUrl+'"/>';
		editor.execCommand('inserthtml',imageHtml);
	});
EOD;
		Yii::app()->clientScript->registerScript('editor_binding',$bindingScript,CClientScript::POS_READY);
	}
}
