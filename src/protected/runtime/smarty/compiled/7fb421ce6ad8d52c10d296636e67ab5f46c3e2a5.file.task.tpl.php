<?php /* Smarty version Smarty-3.1.13, created on 2013-06-12 02:23:45
         compiled from "D:\develop\www\pipashu_sae\4\pipashu\src\protected\views\user\task.tpl" */ ?>
<?php /*%%SmartyHeaderCode:458451b76b31674d81-06545288%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fb421ce6ad8d52c10d296636e67ab5f46c3e2a5' => 
    array (
      0 => 'D:\\develop\\www\\pipashu_sae\\4\\pipashu\\src\\protected\\views\\user\\task.tpl',
      1 => 1370802396,
      2 => 'file',
    ),
    '0bdfc553317f6670b19abaf3160dbf70af68b658' => 
    array (
      0 => 'D:\\develop\\www\\pipashu_sae\\4\\pipashu\\src\\protected\\views\\user\\main.tpl',
      1 => 1370975023,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '458451b76b31674d81-06545288',
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
  'unifunc' => 'content_51b76b32eda656_70894660',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b76b32eda656_70894660')) {function content_51b76b32eda656_70894660($_smarty_tpl) {?><html>
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
	<div class='task'>
		<p class='middle_title'>赚积分</p>
		<div class='promotion_task mt10'>
			<p>分享&nbsp;推广文案&nbsp赚积分</p>
			<div class='divide_line'></div>
			<?php  $_smarty_tpl->tpl_vars['promotion'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['promotion']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recentPromotions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['promotion']->key => $_smarty_tpl->tpl_vars['promotion']->value){
$_smarty_tpl->tpl_vars['promotion']->_loop = true;
?>
			<div class='mt20'>
				<div class='col task_post'>
					<img width='91px' height='121px' src="/static/img/<?php echo $_smarty_tpl->tpl_vars['promotion']->value['photo_url'];?>
"/>
				</div>
				<div class='col task_info'>
					<p><?php echo $_smarty_tpl->tpl_vars['promotion']->value['content'];?>
</p>
				</div>
				<div class='col task_credits'>
					<p>分享到微博奖励：</p>
					<p class='orange_txt big_credits mr20'><?php echo $_smarty_tpl->tpl_vars['promotion']->value['pub_weibo_credits'];?>
&nbsp;积分</p>
					<div>
						<?php if ($_smarty_tpl->tpl_vars['customer']->value['userType']=='customer'){?>
						<div id='share_button' class='share_button' onclick="sharePromotion(<?php echo $_smarty_tpl->tpl_vars['promotion']->value['id'];?>
)">赚积分</div>
						<?php }else{ ?>
						<a id='social_login' href="<?php echo $_smarty_tpl->tpl_vars['code_url']->value;?>
"><img src='/static/img/sina_weibo_login.png'/></a>
						<?php }?>
						<div class='clear'></div>
					</div>
				</div>
				<div class='clear'></div>
			</div>
			<div id="pub_promo_weibo_dialog<?php echo $_smarty_tpl->tpl_vars['promotion']->value['id'];?>
" class='pub_weibo_dialog'>
				<div id='pub_weibo_dialog_content'>
				<div><h4 class='col'>分享到新浪微博：</h4><p class='float_right'><a href='#'><?php echo $_smarty_tpl->tpl_vars['customer']->value['name'];?>
</a>&nbsp;|&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['code_url']->value;?>
">换个账号</a></p></div>
				<textarea class='weibo_content_input' id='weibo_content_input'><?php echo $_smarty_tpl->tpl_vars['promotion']->value['content'];?>
</textarea>
				<div><img onclick="pubPromoWeibo(<?php echo $_smarty_tpl->tpl_vars['promotion']->value['pub_weibo_credits'];?>
,<?php echo $_smarty_tpl->tpl_vars['promotion']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['promotion']->value['organization_id'];?>
)" id='pub_weibo_button' class='pub_weibo_button' title='分享到新浪微博' src="/static/img/pub_weibo_button.png"/></div>
				</div>
			</div>
			<?php } ?>
		</div>
		<div class='activity_task mt10'>
			<p>分享&nbsp;活动&nbsp;赚积分</p>
			<div class='divide_line'></div>
			<?php  $_smarty_tpl->tpl_vars['activity'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['activity']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recentActivities']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['activity']->key => $_smarty_tpl->tpl_vars['activity']->value){
$_smarty_tpl->tpl_vars['activity']->_loop = true;
?>
			<div class='mt20'>
				<div class='col task_post'>
					<img width='91px' height='121px' src="/static/img/<?php echo $_smarty_tpl->tpl_vars['activity']->value['post_url'];?>
"/>
				</div>
				<div class='col task_info'>
					<p><a href="/activity/view/<?php echo $_smarty_tpl->tpl_vars['activity']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['activity']->value['title'];?>
</a></p>
					<p class='gray_txt'>分享&nbsp;邀请语：</p>
					<p>尼玛，这个活动不错，你们看看，反正我报名了，
					<?php echo $_smarty_tpl->tpl_vars['organization']->value['organization_name'];?>
将举办"<?php echo $_smarty_tpl->tpl_vars['activity']->value['title'];?>
"精彩活动，
					时间<?php echo date('Y年n月j日H:i',$_smarty_tpl->tpl_vars['activity']->value['start_time']);?>
，
					地点：<?php echo $_smarty_tpl->tpl_vars['activity']->value['address'];?>
。报名地址：
					<a href="http://pipashu/activity/view/<?php echo $_smarty_tpl->tpl_vars['activity']->value['id'];?>
">
					http://pipashu/activity/view/<?php echo $_smarty_tpl->tpl_vars['activity']->value['id'];?>
</a>
					</p>
				</div>
				<div class='col task_credits'>
					<p>分享到微博奖励：</p>
					<p class='orange_txt big_credits mr20'><?php echo $_smarty_tpl->tpl_vars['activity']->value['pub_weibo_credits'];?>
&nbsp;积分</p>
					<div>
						<?php if ($_smarty_tpl->tpl_vars['customer']->value['userType']=='customer'){?>
						<div id='share_button' class='share_button' onclick="shareActivity(<?php echo $_smarty_tpl->tpl_vars['activity']->value['id'];?>
)">赚积分</div>
						<?php }else{ ?>
						<a id='social_login' href="<?php echo $_smarty_tpl->tpl_vars['code_url']->value;?>
"><img src='/static/img/sina_weibo_login.png'/></a>
						<?php }?>
						<div class='clear'></div>
					</div>
					<p>•邀请朋友报名成功&nbsp;奖励&nbsp;<span class='orange_txt'><?php echo $_smarty_tpl->tpl_vars['activity']->value['invite_credits'];?>
积分</span></p>
					<p>•报名并到场&nbsp;&nbsp;&nbsp;&nbsp;奖励&nbsp;<span class='orange_txt'><?php echo $_smarty_tpl->tpl_vars['activity']->value['show_up_credits'];?>
积分</span></p>
				</div>
				<div class='clear'></div>
			</div>
			<div id="pub_act_weibo_dialog<?php echo $_smarty_tpl->tpl_vars['activity']->value['id'];?>
" class='pub_weibo_dialog'>
				<div id='pub_weibo_dialog_content'>
				<div><h4 class='col'>分享到新浪微博：</h4><p class='float_right'><a href='#'><?php echo $_smarty_tpl->tpl_vars['customer']->value['name'];?>
</a>&nbsp;|&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['code_url']->value;?>
">换个账号</a></p></div>
				<textarea class='weibo_content_input' id='weibo_content_input'>尼玛，这个活动不错，你们看看，反正我报名了，<?php echo $_smarty_tpl->tpl_vars['organization']->value['organization_name'];?>
将举办："<?php echo $_smarty_tpl->tpl_vars['activity']->value['title'];?>
"，时间：<?php echo date('n月j日 H:i',$_smarty_tpl->tpl_vars['activity']->value['start_time']);?>
，地点：<?php echo $_smarty_tpl->tpl_vars['activity']->value['address'];?>
，报名地址：http://pipashu.com/activity/view/<?php echo $_smarty_tpl->tpl_vars['activity']->value['id'];?>
</textarea>
				<div><img onclick="pubActWeibo(<?php echo $_smarty_tpl->tpl_vars['activity']->value['pub_weibo_credits'];?>
,<?php echo $_smarty_tpl->tpl_vars['activity']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['activity']->value['organization_id'];?>
)" id='pub_weibo_button' class='pub_weibo_button' title='分享到新浪微博' src="/static/img/pub_weibo_button.png"/></div>
				</div>
			</div>
			<?php } ?>	
		</div>
		<div class='privilege_task mt10'>
			<p>分享&nbsp;特权兑换&nbsp;赚积分</p>
			<div class='divide_line'></div>
			<?php  $_smarty_tpl->tpl_vars['privilege'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['privilege']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recentPrivileges']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['privilege']->key => $_smarty_tpl->tpl_vars['privilege']->value){
$_smarty_tpl->tpl_vars['privilege']->_loop = true;
?>
			<div class='mt20'>
				<div class='col task_post'>
					<img width='91px' height='121px' src="/static/img/<?php echo $_smarty_tpl->tpl_vars['privilege']->value['post_url'];?>
"/>
				</div>
				<div class='col task_info'>
					<p><a href="/privilege/view/<?php echo $_smarty_tpl->tpl_vars['privilege']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['privilege']->value['title'];?>
</a></p>
					<p class='gray_txt'>分享&nbsp;邀请语：</p>
					<p>尼玛，这个东东不错，你们看看，反正我兑换了，
					<?php echo $_smarty_tpl->tpl_vars['organization']->value['organization_name'];?>
发布的"<?php echo $_smarty_tpl->tpl_vars['privilege']->value['title'];?>
"，
					兑换截止时间<?php echo date('Y年n月j日H:i',$_smarty_tpl->tpl_vars['privilege']->value['apply_end_time']);?>
，
					兑换地址：
					<a href="http://pipashu/privilege/view/<?php echo $_smarty_tpl->tpl_vars['privilege']->value['id'];?>
">
					http://pipashu/privilege/view/<?php echo $_smarty_tpl->tpl_vars['privilege']->value['id'];?>
</a>
					</p>
				</div>
				<div class='col task_credits'>
					<p>分享到微博奖励：</p>
					<p class='orange_txt big_credits mr20'><?php echo $_smarty_tpl->tpl_vars['privilege']->value['pub_weibo_credits'];?>
&nbsp;积分</p>
					<div>
						<?php if ($_smarty_tpl->tpl_vars['customer']->value['userType']=='customer'){?>
						<div id='share_button' class='share_button' onclick="sharePrivilege(<?php echo $_smarty_tpl->tpl_vars['privilege']->value['id'];?>
)">赚积分</div>
						<?php }else{ ?>
						<a id='social_login' href="<?php echo $_smarty_tpl->tpl_vars['code_url']->value;?>
"><img src='/static/img/sina_weibo_login.png'/></a>
						<?php }?>
						<div class='clear'></div>
					</div>
					<p>•邀请朋友兑换成功&nbsp;奖励&nbsp;<span class='orange_txt'><?php echo $_smarty_tpl->tpl_vars['privilege']->value['invite_credits'];?>
积分</span></p>
				</div>
				<div class='clear'></div>
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
			<?php } ?>	
		</div>
	</div>
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