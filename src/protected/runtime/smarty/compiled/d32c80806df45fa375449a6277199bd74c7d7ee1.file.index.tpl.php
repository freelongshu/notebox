<?php /* Smarty version Smarty-3.1.13, created on 2013-06-06 00:50:30
         compiled from "D:\develop\www\pipashu\src\protected\views\site\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:205651af6c56f1ae37-52243596%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd32c80806df45fa375449a6277199bd74c7d7ee1' => 
    array (
      0 => 'D:\\develop\\www\\pipashu\\src\\protected\\views\\site\\index.tpl',
      1 => 1370423674,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '205651af6c56f1ae37-52243596',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'sub_title' => 0,
    'static' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51af6c571b1473_30474428',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51af6c571b1473_30474428')) {function content_51af6c571b1473_30474428($_smarty_tpl) {?><html>
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
					<li class="message">
					</li>
					<a href='/organization/register'><li class='hot'>机构注册</li></a>
					<a href='/organization/login'><li>登录</li></a>
				</ul>
			</div>
		</div>
		<div class='row mt40'>
			<div class='span6'>
				<p class='big_title'>充分发掘在线口碑的营销潜力</p>
				<p>如果您希望以既简单又灵活的方式，通过老学员传播您的良好口碑，
				并带来新的学员，枇杷树就是您的理想之选。我们提供嵌入代码，您可以轻松在自己的官方网站展示针对新老学员的各种活动、特权。
				</p>
				<br/>
				<p><a href='/site/detail'>详细了解</a>枇杷树的优势，你就会知道为何培训机构都选我们作为最佳口碑营销解决方案提供商。</p>
				<br/>
				<a href='/organization/register'><div class='short_button'>立即开始使用</div></a>
			</div>
			<div class='span6'>
				<img width='471' height='270' src='/static/img/trans_effect.png'/>
			</div>
		</div>
		<div class='row mt10'>			
			<div class='span12'>
				<p class='middle_title'>枇杷树的优势</p>
				<div class='row advantage'>
					<div class='span3'>
						<div class='col icon'>
							<img width='53' height='55' src='/static/img/profit.png'/>
						</div>
						<div class='col icon_txt'>
							<p>收益丰厚</p>
							<p>利用新浪微博的网络特性，逐级放大老学员的良好口碑，拉动新学员加入体验活动。</p>
						</div>
						<div class='clear'></div>
					</div>
					<div class='span3'>
						<div class='col icon'>
							<img width='53' height='55' src='/static/img/control.png'/>
						</div>
						<div class='col icon_txt'>
							<p>全面掌控</p>
							<p>您可以控制活动、特权在您网站上如何展示。学员仍会停留在您自己的网站。</p>
						</div>
						<div class='clear'></div>
					</div>
					<div class='span3'>
						<div class='col icon'>
							<img width='53' height='55' src='/static/img/analysis.png'/>
						</div>
						<div class='col icon_txt'>
							<p>分析指标</p>
							<p>详尽的报告为您深入揭示网站的口碑效果。</p>
						</div>
						<div class='clear'></div>
					</div>
					<div class='span3'>
						<div class='col icon'>
							<img width='53' height='55' src='/static/img/magic.png'/>
						</div>
						<div class='col icon_txt'>
							<p>高枕无忧</p>
							<p>简单、易用，您可以立即注册。点“口碑"成金。</p>
						</div>
						<div class='clear'></div>
					</div>
				</div>
			</div>
		</div>
		<div class='row'>
			<div class='span12'>
				<p>谁在使用&nbsp;&nbsp;&nbsp;<a href='/site/users'>查看全部</a></p>
				<div class='users_list'>
					<img src='/static/img/users/'/>
				</div>
			</div>
		</div>
	</div>
  </body>

</html>
<?php }} ?>