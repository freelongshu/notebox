<?php /* Smarty version Smarty-3.1.13, created on 2013-05-28 10:06:04
         compiled from "D:\develop\www\neitui\src\protected\views\account\register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:249051a4110cc02db3-31094679%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12a0aab3c9519ed9512e8bad6f45305ac54a9f02' => 
    array (
      0 => 'D:\\develop\\www\\neitui\\src\\protected\\views\\account\\register.tpl',
      1 => 1367218139,
      2 => 'file',
    ),
    'd932a7f87802f07fc3c89381761910dc6c30cfe3' => 
    array (
      0 => 'D:\\develop\\www\\neitui\\src\\protected\\views\\layouts\\main.tpl',
      1 => 1367042786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '249051a4110cc02db3-31094679',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51a4110cee6485_48259392',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51a4110cee6485_48259392')) {function content_51a4110cee6485_48259392($_smarty_tpl) {?><html>
  <head>
    <meta charset="utf-8">
    <title>内推优聘 51neitui.com</title>
  </head>
  <body>
    
  <?php if (isset($_smarty_tpl->tpl_vars['url']->value)){?>
    <div>
      <p>模拟邮件确认：</p>
      <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['url']->value;?>
</a>
    </div>
  <?php }else{ ?>
  <?php echo CHtml::beginForm();?>

    <?php echo CHtml::errorSummary($_smarty_tpl->tpl_vars['form']->value);?>

    <div class="row">
      <?php echo CHtml::activeLabel($_smarty_tpl->tpl_vars['form']->value,'email');?>

      <?php echo CHtml::activeTextField($_smarty_tpl->tpl_vars['form']->value,'email');?>

    </div>
    <div class="row">
      <?php echo CHtml::activeLabel($_smarty_tpl->tpl_vars['form']->value,'name');?>

      <?php echo CHtml::activeTextField($_smarty_tpl->tpl_vars['form']->value,'name');?>

    </div>
    <div class="row">
      <?php echo CHtml::activeLabel($_smarty_tpl->tpl_vars['form']->value,'password');?>

      <?php echo CHtml::activePasswordField($_smarty_tpl->tpl_vars['form']->value,'password');?>

    </div>
    <div class="row">
      <?php echo CHtml::submitButton('注册');?>

    </div>
  <?php echo CHtml::endForm();?>

  <?php }?>

  </body>
</html>
<?php }} ?>