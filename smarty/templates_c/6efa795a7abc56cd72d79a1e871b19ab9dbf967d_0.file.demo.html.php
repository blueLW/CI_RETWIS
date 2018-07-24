<?php
/* Smarty version 3.1.32, created on 2018-07-03 16:48:45
  from 'D:\www\CI\application\views\demo\demo.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b3b386dd9e240_36332037',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6efa795a7abc56cd72d79a1e871b19ab9dbf967d' => 
    array (
      0 => 'D:\\www\\CI\\application\\views\\demo\\demo.html',
      1 => 1530607721,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b3b386dd9e240_36332037 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
	<title>demo</title>
</head>
<body>
<p>这是一个测试redis和smarty类的案例</p>
<p>这是读取的redis结果:<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</p>

</body>
</html>
<?php }
}
