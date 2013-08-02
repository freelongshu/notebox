<?php /* Smarty version Smarty-3.1.13, created on 2013-06-08 00:09:56
         compiled from "D:\develop\www\pipashu_sae\4\pipashu\src\protected\views\promotion\createPromotion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:239451b205d42293c5-00046882%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '663f458abfe910badfa32fe131c58bddd35258b1' => 
    array (
      0 => 'D:\\develop\\www\\pipashu_sae\\4\\pipashu\\src\\protected\\views\\promotion\\createPromotion.tpl',
      1 => 1370488771,
      2 => 'file',
    ),
    'bf6ac52d4d230ab70f19d3473c697fc6e15c763a' => 
    array (
      0 => 'D:\\develop\\www\\pipashu_sae\\4\\pipashu\\src\\protected\\views\\layouts\\main.tpl',
      1 => 1370488770,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '239451b205d42293c5-00046882',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'sub_title' => 0,
    'static' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51b205d4615361_94957810',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b205d4615361_94957810')) {function content_51b205d4615361_94957810($_smarty_tpl) {?><html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
-<?php echo $_smarty_tpl->tpl_vars['sub_title']->value;?>
</title>
    <link rel='stylesheet' type='text/css' href='<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/css/pickaday.css'/>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/css/bootstrap.min.css"/>
    <link rel="stylesheet/less" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/css/styles.less">
    <script src="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/js/less-1.3.1.min.js"></script>	  
    <script src="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/js/jquery-1.9.0.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/js/pickaday.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/js/area.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/js/ajaxFileUpload.js"></script>
  </head>
  <body>
	<div class="container">
	<div class="row">
		<div class="span3 mt10">
			<a href='/site/index'><img class="col logo" src='<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/img/logo.png'></a><p class="col logo_text">&nbsp;|&nbsp;培训机构</p>
			<div class='clear'></div>
		</div>
		<div class="span9">
			<ul class="top_nav">
				<a href='/site/index'><li class='active'>首页</li></a>
				<a href='/site/users'><li>谁在使用</li></a>
				<a href='/site/help'><li>帮助中心</li></a>
				<a href='/site/contact'><li>联系我们</li></a>
				<li class="message">欢迎回来，<?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
</li>
				<a href='/organization/index'><li class='active'>管理中心</li></a>
				<a href='/organization/logout'><li>退出</li></a>
			</ul>
		</div>
	</div>
	<div class='row'>
		<div class='span12'>
			<p class='big_title mt30'>管理中心&nbsp;&nbsp;-&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['sub_title']->value;?>
</p>
		</div>
	</div>
	<div class='row'>
		<div class='span12'>
		<div class='left_column'>
			<div class='left_menu'>
				<div class='menu_item'><a href='/organization/index'>管理中心首页</a></div>
				<div class='menu_item'><a href='/activity/manage'>活动管理</a></div>
				<div class='menu_item'><a href='/privilege/manage'>特权兑换管理</a></div>
				<div class='menu_item'><a href='/promotion/manage'>推广文案管理</a></div>
				<div class='menu_item'><a href='/user/index'>会员管理</a></div>
				<div class='menu_item'><a href='/organization/code'>获取嵌入代码</a></div>
				<div class='menu_item'><a href='/organization/statistics'>数据统计</a></div>
				<div class='menu_item'><a href='/organization/update'>基本信息设置</a></div>
			</div>
			<div class='left_menu'>
				<div class='menu_item'>
					<p>在线帮助</p>
					<p>QQ:<p>
					<p>782570386（商务）</p>
					<p>782570386（技术）</p>
					<p>782570386（技术）</p>
					<p>QQ群:</p>
					<p>782570386</p>
					<p>782570386</p>
					<p>782570386</p>
				</div>
			</div>
		</div>
		<div class='right_column'>
<div class='content_box'>
	<div class='row'>
		<div class='span10'>
			<div class='promotion_form' id='promotion_form'>
				<?php echo CHtml::beginForm();?>

					<?php echo CHtml::errorSummary($_smarty_tpl->tpl_vars['form']->value);?>

					<div class='line'>
						<p class='middle_title'>发布推广文案：</p>
						<textarea id="PromotionForm_content" name="PromotionForm[content]"></textarea>
						<div class='input_error'><?php echo CHtml::error($_smarty_tpl->tpl_vars['form']->value,'content');?>
</div>
						<div class='clear'></div>
					</div>
					<div class='line'>
						<div>上传图片：</div>
						<img id='upload_post' class='col' src='<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/img/upload_img.png'/>
						<div class='col upload_tips'>
							<p>从电脑中选择有吸引力的图片作为特权兑换海报图片</p>
							<p>你可以上传JPG、JPEG、GIF、PNG或BMP文件。文件小于5M</p>
							<div class='upload_button'>选择图片</div>
						</div> 
						<input id="ytPromotionForm_photo_url" type="hidden" name="PromotionForm[photo_url]" value="">
						<input onchange='ajaxFileUpload()' id="PromotionForm_post_url" type="file" name="PromotionForm[post_url]">
						<div class='clear'></div>
					</div>
					<div class='line'>
						<label>分享奖励：</label>
						<input id="PromotionForm_pub_weibo_credits" class='short_input' type="text" name="PromotionForm[pub_weibo_credits]">
						<p class='col input_tips'>给发微博推广该特权兑换者的奖励积分，只奖励一次。</p>
						<div class='input_error'><?php echo CHtml::error($_smarty_tpl->tpl_vars['form']->value,'pub_weibo_credits');?>
</div>
						<div class='clear'></div>
					</div>
					<div class='line'>
						<input type="submit" value="发布" name="yt0" class='pub_button col'>
						&nbsp;&nbsp;&nbsp;&nbsp;<p class='col ml20'><a href=''>取消</a>(将返回已发布推广文案的列表)<p>
					</div>
				<?php echo CHtml::endForm();?>

			</div>
		</div>
	</div>
</div> 
<script>
	/*日期选择控件调用*/
	var apply_end_time_picker = new Pikaday({
		field: document.getElementById('PromotionForm_apply_end_time'),
		firstDay: 1,
		minDate: new Date('2000-01-01'),
		maxDate: new Date('2020-12-31'),
		yearRange: [2000,2020]
	});

	/*ajax文件上传函数*/
	function ajaxFileUpload(){
		$.ajaxFileUpload({
			url:'/activity/ajaxFileUpload',
			secureuri:false,
			fileElementId:'ActivityForm_post_url',
			dataType: 'json',
			success: function(result){
				alert('jkl');
			}
		})
		return false;
	}  

	/*PromotionForm上传前，相关日期赋值*/
	$('#PromotionForm').submit(function(){
		$('#PromotionForm_apply_end_time').val($('#PromotionForm_apply_end_time').val()+' '+$('#apply_end_time_hour').val()+':'+$('#apply_end_time_minute').val()+'00');
	});
</script>
</div>
		<div class='clear'></div>
		</div>
	</div>
	</div>
  </body>

</html>
<?php }} ?>