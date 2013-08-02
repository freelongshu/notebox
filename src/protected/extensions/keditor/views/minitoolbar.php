<div id="editor_actions">
	<a class="icon_m follow_icon fancybox_text" href="#add_link">添加链接</a>
	<a class="icon_s video_icon fancybox_text" href="#add_video">添加视频</a>
	<a class="icon_l photo_icon fancybox_text" href="#add_img">添加图片</a>
</div>

<div class="hide">
	<div id="add_link" class="fancy_box bg_7">
	<h2>添加链接</h2>
	<dl><input id="link_title" type="text" class="g_input_text white radius_5 shadow_in_5_c shadow_25_focus" placeholder="输入链接名称, 如启维网"/>
	<span class="explain">如不填则显示为链接地址</span></dl>
	<dl><input id="link_url" type="text" class="g_input_text white radius_5 shadow_in_5_c shadow_25_focus" placeholder="输入链接地址, 如http://www.kibey.com"/></dl>
	<button type="submit" class="greenbtn right bg_88_77 radius_5 shadow_in_5_a shadow_in_10_e_h bg_65_54_hover bg_69_7a_active" onclick="">添加</button>
	
	<span class="error_remind"></span>
	<div class="clear"></div>
	</div>
	
	<div id="add_video" class="fancy_box bg_7">
	<h2>添加在线视频</h2>
	<dl><input type="text" name="video_url" id="video_url" class="g_input_text white radius_5 shadow_in_5_c shadow_25_focus" autocomplete="off" placeholder="输入视频链接地址"/>
	
	<span class="explain">支持链接以下网站的视频<br/>若尚未上传视频, 请前往以下网站上传视频, 再将视频链接添加到启维</span>
	<span class="explain"><a class="icon_s logo_tudou" href="http://www.tudou.com" target="_blank">土豆</a></span>
	<span class="explain"><a class="icon_s logo_youku" href="http://www.youku.com" target="_blank">优酷</a></span>
	<span class="explain"><a class="icon_s logo_youtube" href="http://www.youtube.com" target="_blank">YouTube</a></span>
	<span class="explain"><a class="icon_s logo_vimeo" href="http://vimeo.com/" target="_blank">Vimeo</a></span>
	<span class="explain"><a class="icon_s logo_sina" href="http://video.sina.com.cn/" target="_blank">新浪视频</a></span>
	<span class="explain"><a class="icon_s logo_souhu" href="http://tv.sohu.com/" target="_blank">搜狐视频</a></span>
	<span class="explain"><a class="icon_s logo_tencent" href="http://v.qq.com/" target="_blank">腾讯视频</a></span>
	<span class="explain"><a class="icon_s logo_ifeng" href="http://v.ifeng.com/" target="_blank">凤凰视频</a></span>
	<span class="explain"><a class="icon_s logo_pptv" href="http://www.pptv.com/" target="_blank">PPTV网络电视</a></span>
	<span class="explain"><a class="icon_s logo_pps" href="http://www.pps.tv/" target="_blank">PPS网络电视</a></span>
	<span class="explain"><a class="icon_s logo_iqiyi" href="http://www.iqiyi.com/" target="_blank">爱奇艺</a></span>
	<span class="explain"><a class="icon_s logo_letv" href="http://www.letv.com/" target="_blank">乐视</a></span>
	<span class="explain"><a class="icon_s logo_ku6" href="http://www.ku6.com/" target="_blank">酷6</a></span>
	<span class="explain"><a class="icon_s logo_bilibili" href="http://www.bilibili.tv/" target="_blank">BiliBili</a></span>
	</dl>
	
	<span class="error_remind"></span>
	
	<button type="submit" class="greenbtn right bg_88_77 radius_5 shadow_in_5_a shadow_in_10_e_h bg_65_54_hover bg_69_7a_active" onclick="">添加</button>
	<div class="clear"></div>
	</div>
	
	<div id="add_img" class="fancy_box bg_7">
	<h2>上传图片</h2>
	<dl class="upload">
	<?php
		$this->widget('ext.kupload.KUploadAjaxWidget', array(
			'bucketname' =>'kibey-editor',
			'secretKey' => 'pKxqg+qd3j5GUt4s1BpAepEiUiA=',
			// 'returnUrl' => Yii::app()->createAbsoluteUrl("/square/upload/editorImage"),
			'id'=>'editor-image-uploader',//HTML中的ID
			'saveKey'=>'/{year}/{mon}/{day}/{random}{.suffix}',
			'multi'=>false,
			'htmlOptions'=>array(
				'class'=>'real_upload opacity_0','size'=>50,
			),
		));
	?>
	</dl>
	
	<p class="explain clear">支持上传后缀格式为 .jpg .jpeg .png .gif, 大小不超过5M的图片</p>
	<div class="clear"></div>
	
	<dl>
	<h2>或添加在线图片</h2>
	<input type="text" id="online_img_url" class="g_input_text white radius_5 shadow_in_5_c shadow_25_focus" autocomplete="off" name="work_title" placeholder="输入图片链接地址"/></dl>
	
	<span class="error_remind"></span>
	<button id="btn_online_img" type="submit" class="greenbtn right bg_88_77 radius_5 shadow_in_5_a shadow_in_10_e_h bg_65_54_hover bg_69_7a_active">添加</button>
	<div class="clear"></div>
	</div>
</div>
	
</dl>
<dl>