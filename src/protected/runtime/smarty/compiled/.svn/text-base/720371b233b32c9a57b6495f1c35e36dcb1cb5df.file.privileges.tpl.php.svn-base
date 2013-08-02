<?php /* Smarty version Smarty-3.1.13, created on 2013-06-12 03:27:20
         compiled from "D:\develop\www\pipashu_sae\4\pipashu\src\protected\views\user\privileges.tpl" */ ?>
<?php /*%%SmartyHeaderCode:813451b77a1891fff9-03146124%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '720371b233b32c9a57b6495f1c35e36dcb1cb5df' => 
    array (
      0 => 'D:\\develop\\www\\pipashu_sae\\4\\pipashu\\src\\protected\\views\\user\\privileges.tpl',
      1 => 1370657417,
      2 => 'file',
    ),
    '0bdfc553317f6670b19abaf3160dbf70af68b658' => 
    array (
      0 => 'D:\\develop\\www\\pipashu_sae\\4\\pipashu\\src\\protected\\views\\user\\main.tpl',
      1 => 1370975023,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '813451b77a1891fff9-03146124',
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
  'unifunc' => 'content_51b77a1912a858_03704758',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b77a1912a858_03704758')) {function content_51b77a1912a858_03704758($_smarty_tpl) {?><html>
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
		<div class='mt10'>
			<p class='middle_title'>特权兑换</p>
			<div class='divide_line'></div>
			<?php  $_smarty_tpl->tpl_vars['privilege'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['privilege']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recentPrivileges']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['privilege']->key => $_smarty_tpl->tpl_vars['privilege']->value){
$_smarty_tpl->tpl_vars['privilege']->_loop = true;
?>
			<div class='privilege_item'>
				<div class='col post'>
					<img width='91px' height='121px' src="/static/img/<?php echo $_smarty_tpl->tpl_vars['privilege']->value['post_url'];?>
"/>
				</div>
				<div class='col info'>
					<p><a href="/privilege/view/privilegeId/<?php echo $_smarty_tpl->tpl_vars['privilege']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['privilege']->value['title'];?>
</a></p>
					<p>兑换花费：<span class='orange_txt'><?php echo $_smarty_tpl->tpl_vars['privilege']->value['credits_needed'];?>
积分</span></p>
					<p>还剩<span class='orange_txt'><?php echo ceil(abs($_smarty_tpl->tpl_vars['privilege']->value['apply_end_time']-time())/86400);?>
天</span>过期</p>
					<p><?php echo $_smarty_tpl->tpl_vars['privilege']->value['joined_num'];?>
人已兑换|<?php echo $_smarty_tpl->tpl_vars['privilege']->value['shared_num'];?>
人分享</p>
				</div>
				<div class='clear'></div>
			</div>
			<?php } ?>
			<div class='clear'></div>
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