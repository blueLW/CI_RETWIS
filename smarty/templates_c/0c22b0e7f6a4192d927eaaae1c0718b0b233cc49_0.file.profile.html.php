<?php
/* Smarty version 3.1.32, created on 2018-07-06 10:11:47
  from 'D:\www\CI\application\views\home\profile.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b3ecfe33f16d2_92692730',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0c22b0e7f6a4192d927eaaae1c0718b0b233cc49' => 
    array (
      0 => 'D:\\www\\CI\\application\\views\\home\\profile.html',
      1 => 1530843104,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/header.html' => 1,
    'file:public/footer.html' => 1,
  ),
),false)) {
function content_5b3ecfe33f16d2_92692730 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="it"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Retwis - Example Twitter clone based on the Redis Key-Value DB</title>
<link href="/public/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="page">
<!--引入头部文件-->
<?php $_smarty_tpl->_subTemplateRender('file:public/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h2><?php echo $_smarty_tpl->tpl_vars['puser']->value;?>
</h2>
<a href='<?php echo $_smarty_tpl->tpl_vars['purl']->value;?>
' class='button'><?php echo $_smarty_tpl->tpl_vars['notice']->value;?>
</a>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['post']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
<div class='post'>
	<a class='username' href='profile.html?u=<?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
' ><?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
</a> <?php echo $_smarty_tpl->tpl_vars['v']->value['content'];?>
<br/>
	<i><?php echo $_smarty_tpl->tpl_vars['v']->value['time'];?>
前通过web发布</i>
</div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
<!--引入底部文件-->
<?php $_smarty_tpl->_subTemplateRender('file:public/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
</body>
</html><?php }
}
