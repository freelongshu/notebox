<?php /* Smarty version Smarty-3.1.13, created on 2013-07-31 00:21:28
         compiled from "/users/xiaolong/notebox/1/src/protected/views/comment/commentItem.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20464396851f7e808e37c18-59257649%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b05f554849c791485252b980e88d6c2f32ca649' => 
    array (
      0 => '/users/xiaolong/notebox/1/src/protected/views/comment/commentItem.tpl',
      1 => 1375197225,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20464396851f7e808e37c18-59257649',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'comment' => 0,
    'this' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51f7e808ea6439_78730707',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51f7e808ea6439_78730707')) {function content_51f7e808ea6439_78730707($_smarty_tpl) {?><div class='comment'>
	<div class='author'>
		<img src="<?php echo $_smarty_tpl->tpl_vars['comment']->value['authorAvatar'];?>
" class='smallAvatar'/>
	</div>
	<div class='content'>
		<?php echo $_smarty_tpl->tpl_vars['comment']->value['authorName'];?>
 回复于 <?php echo $_smarty_tpl->tpl_vars['this']->value->tranTime($_smarty_tpl->tpl_vars['comment']->value['createTime']);?>
:
		<br>
		<?php echo $_smarty_tpl->tpl_vars['comment']->value['content'];?>

	</div>
	<div class='reply'>
		<a href='javascript:void(0)'>回复</a>
	</div>
	<div class='clear'></div>
</div><?php }} ?>