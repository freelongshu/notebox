<?php /* Smarty version Smarty-3.1.13, created on 2013-08-01 12:32:19
         compiled from "/users/xiaolong/notebox/1/src/protected/views/comment/comments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:100784715051f9e4d3dad5a2-13059713%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30ddc21781281c700afd494f183835b499b86d6d' => 
    array (
      0 => '/users/xiaolong/notebox/1/src/protected/views/comment/comments.tpl',
      1 => 1375198183,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100784715051f9e4d3dad5a2-13059713',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'noteId' => 0,
    'static' => 0,
    'comments' => 0,
    'comment' => 0,
    'this' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51f9e4d3e376e0_29885650',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51f9e4d3e376e0_29885650')) {function content_51f9e4d3e376e0_29885650($_smarty_tpl) {?><div id="note<?php echo $_smarty_tpl->tpl_vars['noteId']->value;?>
Comments" class='comments'>
	<img src="<?php echo $_smarty_tpl->tpl_vars['static']->value;?>
/img/arrow.png" class='arrow'/>
	<form method='post' class='commentForm'>
		<input type='hidden' name='CommentForm[noteId]' id='CommentForm_noteId' value='<?php echo $_smarty_tpl->tpl_vars['noteId']->value;?>
'/>
		<textarea name='CommentForm[content]' id='CommentForm_content'></textarea>
		<div class='button' id='replyButton' onclick="noteReply(<?php echo $_smarty_tpl->tpl_vars['noteId']->value;?>
)">回复</div>
		<div class='clear'></div>
	</form>
	<?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value){
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
	<div class='comment'>
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
	</div>
	<?php } ?>
</div><?php }} ?>