$(function(){
	// var editor = new baidu.editor.Editor({
	// 	textarea:editorTextareaName?editorTextareaName:'content',//'Diary[content]',
	// 	contextMenu:[],
	// 	// toolbars:[],
	// 	initialContent:initialContent?initialContent:'',
	// });
	// editor.render('editor_wrapper');

	function clearAttach(){
		$('.uploadify-queue').empty();
	}

	$('#add_link button').click(function(){
		$('#add_link .error_remind').text('');
		var linkUrl = $('#link_url').val();
		var linkTitle = $('#link_title').val();
		if(!linkUrl) return false;
		var reUrl = /(^|\s)((https?:\/\/)?[\w-]+(\.[\w-]+)+\.?(:\d+)?(\/\S*)?)/gi;
		if((!linkUrl) || !reUrl.test(linkUrl)) {
			$('#add_link .error_remind').text('链接地址有误, 请检查并重新输入');
			return false;	
		}
		$.fancybox.close();
		clearAttach();
		$('#editor_actions').trigger('insertlink',{url:linkUrl,title:linkTitle});
		$('#link_url').val('');
		$('#link_title').val('');
		return false;
	});

	$('#add_video button').click(function(){
		$('#add_video .error_remind').text('');
		var video_url = $('#video_url').val();
		if(!video_url) return false;
		$.post('/square/common/parsevideo',{url:video_url},function(data){
			if(!data || !data.url || !data.swf) {
				$('#add_video .error_remind').text('视频链接地址有误, 请检查并重新输入');
				return false;
			}
			$.fancybox.close();
			$('#editor_actions').trigger('insertvideo',data);
			$('#video_url').val('');
		},'json');
		return false;
	});

	$('#editor-image-uploader').live('uploaded',function(e,data){
		$.fancybox.close();
		clearAttach();
		$('#editor_actions').trigger('insertimage','http://kibey-editor.b0.upaiyun.com'+data.url);
	});

	$('#btn_online_img').click(function(){
		$('#add_image .error_remind').text('');
		var online_img_url = $('#online_img_url').val();
		if(!online_img_url) return false;
		$.post('/square/common/copyimage',{url:online_img_url},function(data){
			if(data.url){
				$('#editor_actions').trigger('insertimage','http://square.b0.upaiyun.com'+data.url);
				$('#online_img_url').val('');
				$.fancybox.close();
			}else{
				$('#add_image .error_remind').text('图片链接地址有误, 请检查并重新输入');
				return false;
			}
		},'json');
	});
});
