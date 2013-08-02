<?php /* Smarty version Smarty-3.1.13, created on 2013-06-02 08:56:53
         compiled from "D:\develop\www\neitui\src\protected\views\account\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:797251aa985502a414-04383580%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09d822df593f213ca91a157ca0d9ee0df4c47fb8' => 
    array (
      0 => 'D:\\develop\\www\\neitui\\src\\protected\\views\\account\\login.tpl',
      1 => 1368630216,
      2 => 'file',
    ),
    'd932a7f87802f07fc3c89381761910dc6c30cfe3' => 
    array (
      0 => 'D:\\develop\\www\\neitui\\src\\protected\\views\\layouts\\main.tpl',
      1 => 1367042786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '797251aa985502a414-04383580',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51aa9855408902_03870810',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51aa9855408902_03870810')) {function content_51aa9855408902_03870810($_smarty_tpl) {?><html>
  <head>
    <meta charset="utf-8">
    <title>内推优聘 51neitui.com</title>
  </head>
  <body>
    
  <?php echo CHtml::beginForm();?>

    <?php echo CHtml::errorSummary($_smarty_tpl->tpl_vars['form']->value);?>

    <div class="row">
      <?php echo CHtml::activeLabel($_smarty_tpl->tpl_vars['form']->value,'email');?>

      <?php echo CHtml::activeTextField($_smarty_tpl->tpl_vars['form']->value,'email');?>

    </div>
    <div class="row">
      <?php echo CHtml::activeLabel($_smarty_tpl->tpl_vars['form']->value,'password');?>

      <?php echo CHtml::activePasswordFIeld($_smarty_tpl->tpl_vars['form']->value,'password');?>

    </div>
    <div class="row">
      <?php echo CHtml::submitButton('登录');?>

    </div>
  <?php echo CHtml::endForm();?>

  <div>
    <a href="<?php echo $_smarty_tpl->tpl_vars['socialLoginUrl']->value['weibo'];?>
">微博帐号登录</a>
  </div>

  </body>
</html>
<?php }} ?>