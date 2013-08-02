<?php /* Smarty version Smarty-3.1.13, created on 2013-06-08 00:09:47
         compiled from "D:\develop\www\pipashu_sae\4\pipashu\src\protected\views\privilege\createPrivilege.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2459451b205cbe46b57-42175420%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8094cf5591d8bce424ab826c1b223a8a3c9d9842' => 
    array (
      0 => 'D:\\develop\\www\\pipashu_sae\\4\\pipashu\\src\\protected\\views\\privilege\\createPrivilege.tpl',
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
  'nocache_hash' => '2459451b205cbe46b57-42175420',
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
  'unifunc' => 'content_51b205cc34ade0_05784944',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b205cc34ade0_05784944')) {function content_51b205cc34ade0_05784944($_smarty_tpl) {?><html>
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
		<div class='span8'>
			<p class='middle_title'>发布特权兑换</p>
		</div>
	</div>
	<div class='row'>
		<div class='span6'>
			<div class='privilege_form' id='privilege_form'>
				<?php echo CHtml::beginForm();?>

					<?php echo CHtml::errorSummary($_smarty_tpl->tpl_vars['form']->value);?>

					<div class='line'>
						<div class='col input_label'>特权兑换海报：</div>
						<img id='upload_post' class='col' src='<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/img/upload_img.png'/>
						<div class='col upload_tips'>
							<p>从电脑中选择有吸引力的图片作为特权兑换海报图片</p>
							<p>你可以上传JPG、JPEG、GIF、PNG或BMP文件。文件小于5M</p>
							<div class='upload_button'>选择图片</div>
						</div> 
						<input id="ytPrivilegeForm_post_url" type="hidden" name="PrivilegeForm[post_url]" value="">
						<input onchange='ajaxFileUpload()' id="PrivilegeForm_post_url" type="file" name="PrivilegeForm[post_url]">
						<div class='clear'></div>
					</div>
					<div class='line'>
						<label class='col input_label'>特权兑换标题：</label><?php echo CHtml::activeTextField($_smarty_tpl->tpl_vars['form']->value,'title');?>

						<div class='input_error'><?php echo CHtml::error($_smarty_tpl->tpl_vars['form']->value,'title');?>
</div>
						<div class='clear'></div>
					</div>
					<hr/>
					<div class='line'>
						<label class='col input_label'>兑换截止时间：</label>
						<input type='text' id='apply_end_time_input' class='apply_end_time'/>
						<?php echo CHtml::activeHiddenField($_smarty_tpl->tpl_vars['form']->value,'apply_end_time');?>

						<select id="apply_end_time_hour" class="hour">
							<option value="00" label="00">00</option>
							<option value="01" label="01">01</option>
							<option value="02" label="02">02</option>
							<option value="03" label="03">03</option>
							<option value="04" label="04">04</option>
							<option value="05" label="05">05</option>
							<option value="06" label="06">06</option>
							<option value="07" label="07">07</option>
							<option value="08" label="08">08</option>
							<option value="09" label="09">09</option>
							<option value="10" label="10">10</option>
							<option value="11" label="11">11</option>
							<option value="12" label="12">12</option>
							<option value="13" label="13">13</option>
							<option value="14" label="14">14</option>
							<option value="15" label="15">15</option>
							<option value="16" label="16">16</option>
							<option value="17" label="17">17</option>
							<option value="18" label="18">18</option>
							<option selected="selected" value="19" label="19">19</option>
							<option value="20" label="20">20</option>
							<option value="21" label="21">21</option>
							<option value="22" label="22">22</option>
							<option value="23" label="23">23</option>
						</select>
						<span class="col hour_min">:</span>
						<select id="apply_end_time_minute" class="minute">
						<option selected="selected" value="00" label="00">00</option><option value="01" label="01">01</option><option value="02" label="02">02</option><option value="03" label="03">03</option><option value="04" label="04">04</option><option value="05" label="05">05</option><option value="06" label="06">06</option><option value="07" label="07">07</option><option value="08" label="08">08</option><option value="09" label="09">09</option><option value="10" label="10">10</option><option value="11" label="11">11</option><option value="12" label="12">12</option><option value="13" label="13">13</option><option value="14" label="14">14</option><option value="15" label="15">15</option><option value="16" label="16">16</option><option value="17" label="17">17</option><option value="18" label="18">18</option><option value="19" label="19">19</option><option value="20" label="20">20</option><option value="21" label="21">21</option><option value="22" label="22">22</option><option value="23" label="23">23</option><option value="24" label="24">24</option><option value="25" label="25">25</option><option value="26" label="26">26</option><option value="27" label="27">27</option><option value="28" label="28">28</option><option value="29" label="29">29</option><option value="30" label="30">30</option><option value="31" label="31">31</option><option value="32" label="32">32</option><option value="33" label="33">33</option><option value="34" label="34">34</option><option value="35" label="35">35</option><option value="36" label="36">36</option><option value="37" label="37">37</option><option value="38" label="38">38</option><option value="39" label="39">39</option><option value="40" label="40">40</option><option value="41" label="41">41</option><option value="42" label="42">42</option><option value="43" label="43">43</option><option value="44" label="44">44</option><option value="45" label="45">45</option><option value="46" label="46">46</option><option value="47" label="47">47</option><option value="48" label="48">48</option><option value="49" label="49">49</option><option value="50" label="50">50</option><option value="51" label="51">51</option><option value="52" label="52">52</option><option value="53" label="53">53</option><option value="54" label="54">54</option><option value="55" label="55">55</option><option value="56" label="56">56</option><option value="57" label="57">57</option><option value="58" label="58">58</option><option value="59" label="59">59</option>
						</select>
						<div class='input_error' id='apply_end_time_error'></div>
						<div class='clear'></div>
					</div>
					<div class='line'>
						<label class='col input_label'>兑换内容：</label>
						<input id="PrivilegeForm_content" type="text" name="PrivilegeForm[content]" placeholder='密码 / 下载地址 / 解压缩密码 / 优惠券码'>
						<div class='input_error'><?php echo CHtml::error($_smarty_tpl->tpl_vars['form']->value,'content');?>
</div>
						<div class="clear"></div>
					</div>
					<div class='line'>
						<label class='col input_label'>特权兑换详情：</label><?php echo CHtml::activeTextArea($_smarty_tpl->tpl_vars['form']->value,'desc');?>

						<div class='input_error'><?php echo CHtml::error($_smarty_tpl->tpl_vars['form']->value,'desc');?>
</div>
						<div class='clear'></div>
					</div>
					<hr/>
					<div class='line'>
						<label class='col input_label'>兑换花费积分：</label>
						<input id="PrivilegeForm_credits_needed" class='short_input' type="text" name="PrivilegeForm[credits_needed]">
						<div class='input_error'><?php echo CHtml::error($_smarty_tpl->tpl_vars['form']->value,'credits_needed');?>
</div>
						<div class='clear'></div>
					</div>
					<hr/>
					<div class='line'>
						<label class='col input_label'>分享奖励：</label>
						<input id="PrivilegeForm_pub_weibo_credits" class='short_input' type="text" name="PrivilegeForm[pub_weibo_credits]">
						<p class='col input_tips'>给发微博推广该特权兑换者的奖励积分，只奖励一次。</p>
						<div class='input_error'><?php echo CHtml::error($_smarty_tpl->tpl_vars['form']->value,'pub_weibo_credits');?>
</div>
						<div class='clear'></div>
					</div>
					<div class='line'>
						<label class='col input_label'>兑换奖励：</label>
						<input id="PrivilegeForm_invite_credits" class='short_input' type="text" name="PrivilegeForm[invite_credits]">
						<p class='col input_tips'>推广者邀请人来兑换，给推广者奖励，每邀请1人奖励1次。</p>
						<div class='input_error'><?php echo CHtml::error($_smarty_tpl->tpl_vars['form']->value,'invite_credits');?>
</div>
						<div class='clear'></div>
					</div>
					<hr/>
					<div class='line'>
						<input type="submit" value="发布" name="yt0" class='pub_button col'>&nbsp;&nbsp;&nbsp;&nbsp;<p class='col ml20'><a href=''>取消</a>(将返回已发布特权特换的列表)<p>
					</div>
				<?php echo CHtml::endForm();?>

			</div>
		</div>
		<div class='span3'>
			<p>注意事项1</p>
			<ul>
				<li>说明1</li>
				<li>说明2</li>
				<li>说明3</li>
			</ul>
			<p>描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述</p>
			<br/>
			<p>注意事项2</p>
			<ul>
				<li>说明1</li>
				<li>说明2</li>
				<li>说明3</li>
			</ul>
			<p>描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述描述</p>
			<br/>
			<p>更重要的是邀请好友都来参与！</p>
		</div>
	</div>
</div> 
<script>
	/*日期选择控件调用*/
	var apply_end_time_picker = new Pikaday({
		field: document.getElementById('apply_end_time_input'),
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

	/*PrivilegeForm上传前，相关日期赋值*/
	$('#privilege_form form').submit(function(){
		if($('#apply_end_time_input').val()==''){
			$('#apply_end_time_error').html('兑换截止时间不能为空');
			return false;
		}else{
			$('#apply_end_time_error').html('');
		}
		$('#PrivilegeForm_apply_end_time').val($('#apply_end_time_input').val()+' '+$('#apply_end_time_hour').val()+':'+$('#apply_end_time_minute').val()+':00');

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