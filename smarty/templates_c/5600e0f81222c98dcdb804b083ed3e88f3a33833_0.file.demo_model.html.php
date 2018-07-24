<?php
/* Smarty version 3.1.32, created on 2018-07-03 16:53:08
  from 'D:\www\CI\application\views\demo\demo_model.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b3b39742ec792_62818480',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5600e0f81222c98dcdb804b083ed3e88f3a33833' => 
    array (
      0 => 'D:\\www\\CI\\application\\views\\demo\\demo_model.html',
      1 => 1530607985,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b3b39742ec792_62818480 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
	<title>demo</title>
</head>
<body>
<p>这是一个测试CI中model读取数据库的案例</p>
<p>以下是读取的结果:</p>
<p>ID:  <?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
</p>

<p>username:  <?php echo $_smarty_tpl->tpl_vars['data']->value['username'];?>
</p>

<p>content:   <?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>
</p>

</body>
</html>
<?php }
}
