<?php /* Smarty version Smarty-3.1.13, created on 2013-06-12 03:27:35
         compiled from "D:\develop\www\pipashu_sae\4\pipashu\src\protected\views\privilege\view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:841351b77a27d05315-39779523%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4765451e85cdf7768b9c69ca2dd6dae95c147658' => 
    array (
      0 => 'D:\\develop\\www\\pipashu_sae\\4\\pipashu\\src\\protected\\views\\privilege\\view.tpl',
      1 => 1370834416,
      2 => 'file',
    ),
    '0bdfc553317f6670b19abaf3160dbf70af68b658' => 
    array (
      0 => 'D:\\develop\\www\\pipashu_sae\\4\\pipashu\\src\\protected\\views\\user\\main.tpl',
      1 => 1370975023,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '841351b77a27d05315-39779523',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'sub_title' => 0,
    'static' => 0,
    'customer' => 0,
    'currentAccount' => 0,
    'organization' => 0,
    'code_url' => 0,
    'code_url_forcelogin' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51b77a28798b27_29647500',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b77a28798b27_29647500')) {function content_51b77a28798b27_29647500($_smarty_tpl) {?><html>
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
	<script src='/static/js/util.js'></script>
  </head>
  <body>
	<div class="container">
		<img src='/static/img/banner.png'/>
				<div class='user_index mt20'>
					<div class='left_column'>
						
<div class='content_box'>
	<div class='row privilege_detail'>
		<div class='span6'>
			<div class='mt10'>
				<div class='col'><img width='91px' height='121px' src="/static/img/<?php echo $_smarty_tpl->tpl_vars['privilege']->value['post_url'];?>
"/></div>
				<div class='col ml10'>
					<p><?php echo $_smarty_tpl->tpl_vars['privilege']->value['title'];?>
</p>
					<br>
					<p>兑换截止：<?php echo date('n月j日',$_smarty_tpl->tpl_vars['privilege']->value['apply_end_time']);?>
 周<?php echo $_smarty_tpl->tpl_vars['weekdays']->value[date('w',$_smarty_tpl->tpl_vars['privilege']->value['apply_end_time'])];?>
 <?php echo date('H:i',$_smarty_tpl->tpl_vars['privilege']->value['apply_end_time']);?>
</p>
					<p><span class='joined_num'><?php echo $_smarty_tpl->tpl_vars['privilege']->value['joined_num'];?>
</span>人已兑换 | <span id='shared_num'><?php echo $_smarty_tpl->tpl_vars['privilege']->value['shared_num'];?>
</span>人分享</p>
				</div>
				<div class='clear'></div>
			</div>
			<div class='mt20'>
				<p id='share_weibo_content'>尼玛，这个东东不错，你们看看，反正我兑换了，<?php echo $_smarty_tpl->tpl_vars['organization']->value['organization_name'];?>
发布特权兑换：”<?php echo $_smarty_tpl->tpl_vars['privilege']->value['title'];?>
“，兑换地址：<a href="http://pipashu.com/privilege/view/<?php echo $_smarty_tpl->tpl_vars['privilege']->value['id'];?>
">http://pipashu.com/privilege/view/<?php echo $_smarty_tpl->tpl_vars['privilege']->value['id'];?>
</a></p>
				<br>
				<p class='mt10'>兑换详情</p>
				<p><?php echo $_smarty_tpl->tpl_vars['privilege']->value['desc'];?>
</p>
			</div>
		</div>
		<div class='span3'>
			<p>兑换花费：<span class='orange_txt middle_title'><?php echo $_smarty_tpl->tpl_vars['privilege']->value['credits_needed'];?>
积分</span></p>
			<br>
			<p><div id='apply_button' class='apply_button' onclick="createUserJoinedPrivi(&quot;<?php echo $_smarty_tpl->tpl_vars['customer']->value['userType'];?>
&quot;,<?php echo $_smarty_tpl->tpl_vars['privilege']->value['id'];?>
)">我要兑换</div></p>
			<p id='apply_tips' class='red_txt'></p>
			<br>
			<br>
			<p><div id='min_button' class='min_button col' onclick="sharePrivilege(<?php echo $_smarty_tpl->tpl_vars['privilege']->value['id'];?>
)">分享 </div> 到微博：(奖励<?php echo $_smarty_tpl->tpl_vars['privilege']->value['pub_weibo_credits'];?>
积分)</p>
			<p>•邀请朋友兑换成功 奖励 <?php echo $_smarty_tpl->tpl_vars['privilege']->value['pub_weibo_credits'];?>
积分</p>
			<br>
			<p>活动成员(<span class='joined_num'><?php echo $_smarty_tpl->tpl_vars['privilege']->value['joined_num'];?>
</span>人参加)</p>
			<?php if ($_smarty_tpl->tpl_vars['joinedUsers']->value==null){?>
			<?php }else{ ?>
			<div id='joined_member_list'>
				<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['joinedUsers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
				<img class='col mr20' src="<?php echo $_smarty_tpl->tpl_vars['user']->value['weibo_avatar_url'];?>
"/>
				<?php } ?>
			</div>
			<?php }?>
		</div>
	</div>
</div>
<div id="pub_privi_weibo_dialog<?php echo $_smarty_tpl->tpl_vars['privilege']->value['id'];?>
" class='pub_weibo_dialog'>
	<div><h4 class='col'>分享到新浪微博：</h4><p class='float_right'><a href='#'><?php echo $_smarty_tpl->tpl_vars['customer']->value['name'];?>
</a>&nbsp;|&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['code_url']->value;?>
">换个账号</a></p></div>
	<textarea class='weibo_content_input' id='weibo_content_input'>尼玛，这个东东不错，你们看看，反正我兑换了，<?php echo $_smarty_tpl->tpl_vars['organization']->value['organization_name'];?>
发布特权兑换：”<?php echo $_smarty_tpl->tpl_vars['privilege']->value['title'];?>
“，兑换地址：http://pipashu.com/privilege/view/<?php echo $_smarty_tpl->tpl_vars['privilege']->value['id'];?>
</textarea>
	<div><img onclick="pubPriviWeibo(<?php echo $_smarty_tpl->tpl_vars['privilege']->value['pub_weibo_credits'];?>
,<?php echo $_smarty_tpl->tpl_vars['privilege']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['privilege']->value['organization_id'];?>
)" id='pub_weibo_button' class='pub_weibo_button' title='分享到新浪微博' src="/static/img/pub_weibo_button.png"/></div>
</div>

					</div>
					<div class='right_column'>
						<div class='right_menu1'>
						<?php if ($_smarty_tpl->tpl_vars['customer']->value['userType']=='customer'){?>
							<div class='user_info_box'>
								<div class='col user_avatar'><img id='my_avatar' width='50px' height='50px' src="<?php echo $_smarty_tpl->tpl_vars['customer']->value['weibo_avatar_url'];?>
"/></div>
								<div class='col user_info'>
									<p><a href='#'><?php echo $_smarty_tpl->tpl_vars['customer']->value['name'];?>
</a></p>
									<div class='mt10'><?php echo date('Y-m-d',$_smarty_tpl->tpl_vars['customer']->value['create_time']);?>
&nbsp;注册</div>
								</div>
								<div class='clear'></div>
							</div>
							<p>
								<p id='credits_received' class='data_info orange_txt'><?php echo $_smarty_tpl->tpl_vars['currentAccount']->value['credits_received'];?>
</p>
								<p class='col'>赠送的积分</p>
								<div class='clear'></div>
							</p>
							<p>
								<p id='credits_earned' class='data_info orange_txt'><?php echo $_smarty_tpl->tpl_vars['currentAccount']->value['credits_earned'];?>
</p>
								<p class='col'>赚取的积分</p>
								<div class='clear'></div>
							</p>
							<hr>
							<p>
								<p class='data_info'><?php echo $_smarty_tpl->tpl_vars['customer']->value['joined_act_num'];?>
</p>
								<p class='col'>次兑换特权</p>
								<div class='clear'></div>
							</p>
							<p>
								<p class='data_info'><?php echo $_smarty_tpl->tpl_vars['customer']->value['joined_privi_num'];?>
</p>
								<p class='col'>次参加活动</p>
								<div class='clear'></div>
							</p>
							<p>
								<p class='data_info'><?php echo $_smarty_tpl->tpl_vars['customer']->value['invite_user_num'];?>
</p>
								<p class='col'>人被你邀请来</p>
								<div class='clear'></div>
							</p>
							<p><a href="/user/customerLog/<?php echo $_smarty_tpl->tpl_vars['organization']->value['id'];?>
">我的账号</a><a class='ml80' href="/user/logout/<?php echo $_smarty_tpl->tpl_vars['organization']->value['id'];?>
">退出</a></p>
						<?php }else{ ?>
							<p class='center'>无需繁琐注册，直接</p>
							<p class='center'><a id='social_login' href="<?php echo $_smarty_tpl->tpl_vars['code_url']->value;?>
"><img src='/static/img/sina_weibo_login.png'/></a></p>
							<p class='center'><a class='small_font' href="<?php echo $_smarty_tpl->tpl_vars['code_url_forcelogin']->value;?>
">强制用另一账号登录</a></p>
						<?php }?>
						</div>
	
						<div class='right_menu2'>
							<div class='menu_item'><a href="/user/index/<?php echo $_smarty_tpl->tpl_vars['organization']->value['id'];?>
">增值服务首页</a></div>
							<div class='menu_item'><a href="/user/activities/<?php echo $_smarty_tpl->tpl_vars['organization']->value['id'];?>
">活动</a></div>
							<div class='menu_item'><a href="/user/privileges/<?php echo $_smarty_tpl->tpl_vars['organization']->value['id'];?>
">特权兑换</a></div>
							<div class='menu_item'><a href="/user/task/<?php echo $_smarty_tpl->tpl_vars['organization']->value['id'];?>
">赚积分</a></div>
							<div class='menu_item'><a href="/user/help">常见问题</a></div>
						</div>
						<div id='powered_by_box' class='powered_by_box'>
							<p id='before_powered_by' class='col before_powered_by'>
							<img width='13px' height='9px' src='/static/img/triangle.png'/>
							</p>
							<p id='powered_by' class='col powered_by'>枇</p>
							<div class='clear'></div>
						</div>
					</div>
					<div class='clear'></div>
				</div>
	</div>
  </body>
<div class='shade' id='shade_div'></div>
<div id='pub_weibo_result' class='pub_weibo_dialog'>
<div id='apply_privilege_result' class='pub_weibo_dialog'></div>
</div>
<script>
$("#shade_div").on('click',function(){
	$("#shade_div").hide();
	$(".pub_weibo_dialog").hide();
});
$('#powered_by').hover(
	function () {
		$('#before_powered_by').css({'margin-left':'50px'});
		$('#powered_by').css({'width':'125px'}).html("powered by <a href='http://pipashu.com/site/index'>枇杷树</a>");
	},
	function () {
		$('#before_powered_by').css({'margin-left':'155px'});
		$('#powered_by').css({'width':'20px'}).html('枇');
	}
);
</script>
</html>
<?php }} ?>