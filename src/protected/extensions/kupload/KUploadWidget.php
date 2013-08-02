<?php

class KUploadWidget extends CWidget
{
	public $htmlOptions=array();
	public $bucketname ='kibey-avatar';
	public $returnUrl;
	public $secretKey = 'RoM7QXQaVORJB/zjvkfIxtccAzo=';
	public $withForm = true;
	
	public $api_domain = 'v0.api.upyun.com';
	public $saveKey = ' {year}/{mon}/{day}/{random}{.suffix}';
	public $expiration = 3600;//expire time in second
	public $allowFileType = 'jpg,jpeg,gif,png';
	public $contentLengthRange='1,5120000';
	
	protected $_url;
	protected $_policy;
	protected $_signature;
	
	public function init()
	{
		parent::init();
		$this->_url = "http://{$this->api_domain}/{$this->bucketname}/";
		$this->htmlOptions['id']=$this->getId();
		$this->setPolicy();
	}
	
	protected function setPolicy()
	{
		$options['bucket'] = $this->bucketname; /// 空间名
		$options['expiration'] = time()+$this->expiration; /// 授权过期时间
		$options['save-key'] = $this->saveKey;//"/2012/03/test101.jpg";
		$options['allow-file-type'] = $this->allowFileType;
		$options['content-length-range'] = $this->contentLengthRange;
		if($this->returnUrl) $options['return-url'] = $this->returnUrl; /// 页面跳转型回调地址

		$this->_policy = base64_encode(json_encode($options));
		$this->_signature = md5($this->_policy.'&'.$this->secretKey);
	}
	
	public function run()
	{
		if(!isset($this->htmlOptions['enctype'])) $this->htmlOptions['enctype']='multipart/form-data';
		if($this->withForm) echo CHtml::beginForm($this->_url, 'post', $this->htmlOptions);
		echo CHtml::fileField('file');
		echo CHtml::hiddenField('policy',$this->_policy);
    echo CHtml::hiddenField('signature',$this->_signature);
		if(!$this->withForm) return;
		echo CHtml::submitButton();
		echo CHtml::endForm();
	}
}
