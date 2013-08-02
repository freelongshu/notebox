<?php /* Smarty version Smarty-3.1.13, created on 2013-06-12 23:41:09
         compiled from "D:\develop\www\pipashu_sae\4\pipashu\src\protected\views\organization\statistics.tpl" */ ?>
<?php /*%%SmartyHeaderCode:574651b89695bc82d3-35584513%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c318c2c83a3c45ccba51cf9d5164e4f3ab30dc55' => 
    array (
      0 => 'D:\\develop\\www\\pipashu_sae\\4\\pipashu\\src\\protected\\views\\organization\\statistics.tpl',
      1 => 1370832915,
      2 => 'file',
    ),
    'bf6ac52d4d230ab70f19d3473c697fc6e15c763a' => 
    array (
      0 => 'D:\\develop\\www\\pipashu_sae\\4\\pipashu\\src\\protected\\views\\layouts\\main.tpl',
      1 => 1371046161,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '574651b89695bc82d3-35584513',
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
  'unifunc' => 'content_51b896963d9399_05614924',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b896963d9399_05614924')) {function content_51b896963d9399_05614924($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
				<div class='menu_item'><a href='/user/manage'>会员管理</a></div>
				<div class='menu_item'><a href='/organization/getCode'>获取嵌入代码</a></div>
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
	<div class='statistics_box'>
				<p>基本信息</p>
				<div class='divide_line'></div>
				<div class='basic_info_box'>
					<div>
						<div class='col1'>
						<p class='info_label'>注册时间：</p><p class='info_content'><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['organization']->value['create_time']);?>
</p>
						<div class='clear'></div>
						</div>
						<div class='col2'>
						<p class='info_label'>总会员数：</p><p class='info_content'><?php echo $_smarty_tpl->tpl_vars['organization']->value['member_num'];?>
</p>
						<div class='clear'></div>
						</div>
						<div class='col3'>
						<p class='info_label'>总发放体验积分：</p><p class='info_content'><?php echo $_smarty_tpl->tpl_vars['organization']->value['credits_sent'];?>
</p>
						<div class='clear'></div>
						</div>
						<div class='clear'></div>
					</div>
					<div>
						<div class='col1'>
						<p class='info_label'>上次登录：</p><p class='info_content'><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['organization']->value['last_login_time']);?>
</p>
						<div class='clear'></div>
						</div>
						<div class='col2'>
						<p class='info_label'>总分享数：</p><p class='info_content'><?php echo $_smarty_tpl->tpl_vars['organization']->value['act_shared_num']+$_smarty_tpl->tpl_vars['organization']->value['privi_shared_num']+$_smarty_tpl->tpl_vars['organization']->value['promo_shared_num'];?>
</p>
						<div class='clear'></div>
						</div>
						<div class='col3'>
						<p class='info_label'>用户总花费积分：</p><p class='info_content'><?php echo $_smarty_tpl->tpl_vars['organization']->value['credits_spent'];?>
</p>
						<div class='clear'></div>
						</div>
						<div class='clear'></div>
					</div>
					<div>
						<div class='col1'>
						<p class='info_label'>登录IP：</p><p class='info_content'><?php echo $_smarty_tpl->tpl_vars['organization']->value['last_login_ip'];?>
</p>
						<div class='clear'></div>
						</div>
						<div class='col2'>
						<p class='info_label'>总活动/特权参加人数：</p><p class='info_content'><?php echo $_smarty_tpl->tpl_vars['organization']->value['act_joined_num']+$_smarty_tpl->tpl_vars['organization']->value['privi_joined_num'];?>
</p>
						<div class='clear'></div>
						</div>
						<div class='col3'></div>
						<div class='clear'></div>
					</div>
				</div>
	</div>
	<div class='statistics_box'>
				<p>行为数据 <span class='gray_txt'>最近7天，增长了：</span></p>
				<div class='divide_line'></div>
				<div class='behavior_info_box'>
					<div class='col1'>
						<p class='info_label'>被邀请注册：</p><p class='info_content'><?php echo $_smarty_tpl->tpl_vars['organization']->value['newInvitedSignUpNum'];?>
</p>
						<div class='clear'></div>
					</div>
					<div class='col2'>
						<p class='info_label'>分享推广文案：</p><p class='info_content'><?php echo $_smarty_tpl->tpl_vars['organization']->value['newSharedPromoNum'];?>
</p>
						<div class='clear'></div>
					</div>
					<div class='col3'>
						<p class='info_label'>参加活动/特权兑换：</p><p class='info_content'><?php echo $_smarty_tpl->tpl_vars['organization']->value['newJoinedActNum']+$_smarty_tpl->tpl_vars['organization']->value['newJoinedPriviNum'];?>
</p>
						<div class='clear'></div>
					</div>
					<div class='clear'></div>
				</div>
	</div>
	<div class='statistics_box'>
				<p>行为数据详情</p>
				<div class='divide_line'></div>
				<div class='behavior_detail_info_box'>
					<div class='col1'>
						<p>会员昵称</p>
					</div>
					<div class='col2'>
						<p class='center'>时间</p>
					</div>
					<div class='col3'>
						<p class='center'>行为</p>
					</div>
					<div class='col4'>
						<p class='center'>结果</p>
					</div>
					<div class='clear'></div>
				</div>
				<?php  $_smarty_tpl->tpl_vars['pointLog'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pointLog']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recentOrgPointLogs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pointLog']->key => $_smarty_tpl->tpl_vars['pointLog']->value){
$_smarty_tpl->tpl_vars['pointLog']->_loop = true;
?>
				<div class='behavior_detail_info_box'>
					<div class='col1'>
						<p><a href='#'><?php echo $_smarty_tpl->tpl_vars['pointLog']->value['customer']['nickname'];?>
</a></p>
					</div>
					<div class='col2'>
						<p class='center'><?php echo date('Y-m-d H:i',$_smarty_tpl->tpl_vars['pointLog']->value['create_time']);?>
</p>
					</div>
					<div class='col3'>
						<p class='center'><?php echo $_smarty_tpl->tpl_vars['pointLog']->value['event_data']['title'];?>
</p>
					</div>
					<div class='col4'>
						<p class='center'><?php echo $_smarty_tpl->tpl_vars['pointLog']->value['event_data']['result'];?>
</p>
					</div>
					<div class='clear'></div>
				</div>
				<div class='dotted_line'></div>
				<?php } ?>
	</div>
</div>
</div>
		<div class='clear'></div>
		</div>
	</div>
	</div>
  </body>

</html>
<?php }} ?>