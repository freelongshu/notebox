<?php
require_once __DIR__.'/KEditor.php';

class KUEditor extends KEditor
{
	public function run()
	{
		$this->generateScript();
		$this->render('ueditor',array('textareaName'=>$this->textareaName));
	}

	protected function publishAssets()
	{
		$assetsPath = dirname(__FILE__) . '/assets';

		if (YII_DEBUG)
			$this->assetsUrl = Yii::app()->assetManager->publish($assetsPath, false, -1, true);
		else
			$this->assetsUrl = Yii::app()->assetManager->publish($assetsPath);
				
		if (is_dir($assetsPath)) {
			// Yii::app()->clientScript->registerCssFile($this->assetsUrl . '/themes/default/ueditor.css');
			Yii::app()->clientScript->registerScriptFile($this->assetsUrl . '/editor_config.js', CClientScript::POS_END);
			Yii::app()->clientScript->registerScriptFile($this->assetsUrl . '/ueditor.custom.min.js', CClientScript::POS_END);
			// Yii::app()->clientScript->registerScriptFile($this->assetsUrl . '/plugins.js', CClientScript::POS_END);

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
			// 'toolbars'=>array(array('Bold', 'Italic', 'Underline')),
			'iframeCssUrl'=>$this->assetsUrl.'/themes/default/iframe.css',
		);
		$options = array_merge($defaultOptions,$this->options);

		$options=CJavaScript::encode($options);
		$script = "
		var rendered = false;
		if(!window.editors){window.editors={};} 
		var editor = window.editors['{$this->wrapperID}'] = new UE.ui.Editor({$options});";
		if($this->fancyboxButton){
			$script .= "
$('".$this->fancyboxButton."').fancybox({
	afterClose : function() {
		UE.getEditor('editor-content').destroy();
	},
    beforeShow : function() {
    	if(!window.editors){window.editors={};} 
    	var editor = window.editors['{$this->wrapperID}'] = new UE.ui.Editor({$options});
    	editor.render('editor-content');
    	$('#editor-content').prev().attr('style','')

    }
});
";
		}else{
			$script .= "editor.render('editor-content');";
		}
		
		Yii::app()->clientScript->registerScript(__CLASS__.'#'.$this->id, $script, CClientScript::POS_READY);
		$this->minitoolbarScript();
	}
}