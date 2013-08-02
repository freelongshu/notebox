<?php /* Smarty version Smarty-3.1.13, created on 2013-06-12 17:22:04
         compiled from "D:\develop\www\pipashu_sae\4\pipashu\src\protected\views\user\customerLog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3251951b83dbc336224-22700862%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b034ecbee3279debef175cdd367f313b2ff040d' => 
    array (
      0 => 'D:\\develop\\www\\pipashu_sae\\4\\pipashu\\src\\protected\\views\\user\\customerLog.tpl',
      1 => 1371028919,
      2 => 'file',
    ),
    '0bdfc553317f6670b19abaf3160dbf70af68b658' => 
    array (
      0 => 'D:\\develop\\www\\pipashu_sae\\4\\pipashu\\src\\protected\\views\\user\\main.tpl',
      1 => 1371028523,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3251951b83dbc336224-22700862',
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
  'unifunc' => 'content_51b83dbcd74ad1_18637296',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b83dbcd74ad1_18637296')) {function content_51b83dbcd74ad1_18637296($_smarty_tpl) {?><html>
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
	<div class='my_account'>
		<h4>我的账号</h4>
		<div class='statistics_box'>
				<div>
				<p class='col'>基本信息</p>
				<a class='float_right' href="/user/updateMsg/<?php echo $_smarty_tpl->tpl_vars['customer']->value['id'];?>
">修改昵称、手机、email</a>
				<div class='clear'></div>
				</div>
				<div class='divide_line'></div>
				<div class='basic_info_box'>
					<div>
						<div class='col1'>
						<p class='info_label'>注册时间：</p><p class='info_content'><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['customer']->value['create_time']);?>
</p>
						<div class='clear'></div>
						</div>
						<div class='col2'>
						<p class='info_label'>手机：</p><p class='info_content'><?php echo $_smarty_tpl->tpl_vars['customer']->value['tel'];?>
</p>
						<div class='clear'></div>
						</div>
						<div class='col3'>
						<p class='info_label'>赚取的积分：</p><p class='info_content'><?php echo $_smarty_tpl->tpl_vars['currentAccount']->value['credits_earned'];?>
</p>
						<div class='clear'></div>
						</div>
						<div class='clear'></div>
					</div>
					<div>
						<div class='col1'>
						<p class='info_label'>最近登录：</p><p class='info_content'><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['customer']->value['last_login_time']);?>
</p>
						<div class='clear'></div>
						</div>
						<div class='col2'>
						<p class='info_label'>Email：</p><p class='info_content'><?php echo $_smarty_tpl->tpl_vars['customer']->value['email'];?>
</p>
						<div class='clear'></div>
						</div>
						<div class='col3'>
						<p class='info_label'>赠送的积分：</p><p class='info_content'><?php echo $_smarty_tpl->tpl_vars['currentAccount']->value['credits_received'];?>
</p>
						<div class='clear'></div>
						</div>
						<div class='clear'></div>
					</div>
					<div>
						<div class='col1'>
						<p class='info_label'>登录IP：</p><p class='info_content'><?php echo $_smarty_tpl->tpl_vars['customer']->value['last_login_ip'];?>
</p>
						<div class='clear'></div>
						</div>
						<div class='col2'>
						<p class='info_label'>由谁邀请：</p>
						<p class='info_content'>
						<?php if ($_smarty_tpl->tpl_vars['customer']->value['invited_type']=='主动注册'){?>
						主动注册
						<?php }else{ ?>
						<a href='#'><?php echo $_smarty_tpl->tpl_vars['invitor']->value['nickname'];?>
</a>
						<?php }?>
						</p>
						<div class='clear'></div>
						</div>
						<div class='col3'>
						<p class='info_label'>总赚取/花费积分：</p><p class='info_content'><?php echo $_smarty_tpl->tpl_vars['currentAccount']->value['credits_earned'];?>
/<?php echo $_smarty_tpl->tpl_vars['currentAccount']->value['credits_spent'];?>
</p>
						<div class='clear'></div>
						</div>
						<div class='clear'></div>
					</div>
				</div>
		</div>
		<div class='statistics_box'>
				<p>行为数据</p>
				<div class='divide_line'></div>
				<div class='behavior_info_box'>
					<div class='col1'>
						<p class='info_label'>你邀请注册：</p><p class='info_content'><?php echo $_smarty_tpl->tpl_vars['customer']->value['invite_user_num'];?>
</p>
						<div class='clear'></div>
					</div>
					<div class='col2'>
						<p class='info_label'>分享推广文案/活动/特权兑换：</p><p class='info_content'><?php echo $_smarty_tpl->tpl_vars['customer']->value['shared_promo_num'];?>
/<?php echo $_smarty_tpl->tpl_vars['customer']->value['shared_act_num'];?>
/<?php echo $_smarty_tpl->tpl_vars['customer']->value['shared_privi_num'];?>
</p>
						<div class='clear'></div>
					</div>
					<div class='col3'>
						<p class='info_label'>参加活动/特权兑换：</p><p class='info_content'><?php echo $_smarty_tpl->tpl_vars['customer']->value['joined_act_num'];?>
/<?php echo $_smarty_tpl->tpl_vars['customer']->value['joined_privi_num'];?>
</p>
						<div class='clear'></div>
					</div>
					<div class='clear'></div>
				</div>
		</div>
		<div class='statistics_box'>
				<div>
					<ul>
						<li id='credits_earned_li'>赚取</li>
						<li class='bottom_line1'></li>
						<li id='credits_spend_li' class='dead'>花费</li>
						<li class='bottom_line2'></li>
						<div class='clear'></div>
					</ul>
				</div>
				
				<div class='behavior_detail_info_box'>
					<div class='col1'>
						<p>时间</p>
					</div>
					<div class='col2'>
						<p class='center'>行为</p>
					</div>
					<div class='col3'>
						<p class='center'>对象</p>
					</div>
					<div class='col4'>
						<p class='center'>奖励积分</p>
					</div>
					<div class='clear'></div>
				</div>
				<div id='credits_earned'>
					<?php  $_smarty_tpl->tpl_vars['pointLog'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pointLog']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recentCustomerPointAddLogs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pointLog']->key => $_smarty_tpl->tpl_vars['pointLog']->value){
$_smarty_tpl->tpl_vars['pointLog']->_loop = true;
?>
					<div id='credits_earned' class='behavior_detail_info_box'>
						<div class='col1'>
							<p><a href='#'><?php echo date('Y-m-d H:i',$_smarty_tpl->tpl_vars['pointLog']->value['create_time']);?>
</a></p>
						</div>
						<div class='col2'>
							<p class='center'><?php echo $_smarty_tpl->tpl_vars['pointLog']->value['event_data']['title'];?>
</p>
						</div>
						<div class='col3'>
							<p class='center'><?php echo $_smarty_tpl->tpl_vars['pointLog']->value['event_data']['result'];?>
</p>
						</div>
						<div class='col4'>
							<p class='center'><?php echo $_smarty_tpl->tpl_vars['pointLog']->value['event_data']['credits'];?>
</p>
						</div>
						<div class='clear'></div>
					</div>
					<div class='dotted_line'></div>
					<?php } ?>
				</div>
				<div id='credits_spent'>
					<?php  $_smarty_tpl->tpl_vars['pointLog'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pointLog']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recentCustomerPointReduceLogs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pointLog']->key => $_smarty_tpl->tpl_vars['pointLog']->value){
$_smarty_tpl->tpl_vars['pointLog']->_loop = true;
?>
					<div class='behavior_detail_info_box'>
						<div class='col1'>
							<p><a href='#'><?php echo date('Y-m-d H:i',$_smarty_tpl->tpl_vars['pointLog']->value['create_time']);?>
</a></p>
						</div>
						<div class='col2'>
							<p class='center'><?php echo $_smarty_tpl->tpl_vars['pointLog']->value['event_data']['title'];?>
</p>
						</div>
						<div class='col3'>
							<p class='center'><?php echo $_smarty_tpl->tpl_vars['pointLog']->value['event_data']['result'];?>
</p>
						</div>
						<div class='col4'>
							<p class='center'><?php echo $_smarty_tpl->tpl_vars['pointLog']->value['event_data']['credits'];?>
</p>
						</div>
						<div class='clear'></div>
					</div>
					<div class='dotted_line'></div>
					<?php } ?>
				</div>
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
<div id='pub_weibo_result' class='alert_box'></div>
<div id='require_login' class='alert_box'>
	<p class='center'>请先登录！<a id='social_login' href="<?php echo $_smarty_tpl->tpl_vars['code_url']->value;?>
"><img src='/static/img/sina_weibo_login.png'/></a></p>
</div>
<script>
$("#shade_div").on('click',function(){
	$("#shade_div").hide();
	$(".alert_box").hide();
	$('.pub_weibo_dialog').hide();
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
$('#credits_earned_li').on('click',function(){
	$('#credits_spent_li').css('dead');
	$('#credits_earned').show();
	$('#credits_spent').hide();
});
$('#credits_spent_li').on('click',function(){
	$('#credits_earned_li').css('dead');
	$('#credits_spent').show();
	$('#credits_earned').hide();
});
</script>
</html>
<?php }} ?>