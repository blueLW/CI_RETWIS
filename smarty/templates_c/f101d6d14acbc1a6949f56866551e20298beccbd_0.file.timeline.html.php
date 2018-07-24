<?php
/* Smarty version 3.1.32, created on 2018-07-05 17:21:14
  from 'D:\www\CI\application\views\home\timeline.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b3de30a16ade7_70191634',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f101d6d14acbc1a6949f56866551e20298beccbd' => 
    array (
      0 => 'D:\\www\\CI\\application\\views\\home\\timeline.html',
      1 => 1530782463,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/header.html' => 1,
    'file:public/footer.html' => 1,
  ),
),false)) {
function content_5b3de30a16ade7_70191634 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\www\\CI\\application\\libraries\\smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?><!DOCTYPE html>
<html lang="it">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Retwis - Example Twitter clone based on the Redis Key-Value DB</title>
	<link href="/public/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="page">
<!--引入头文件-->
<?php $_smarty_tpl->_subTemplateRender('file:public/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<h2>热点</h2>
<i>最新注册用户 (redis中的 sorted sets 用法)</i><br>
<div>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
<a class='username' href='profile?u=<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
' ><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</a>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
<br/><br/>

<i>最新发布的50条微博!</i><br>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['top50']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
<div class='post'>
	<a class='username' href='profile?u=<?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
' ><?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
</a> <?php echo $_smarty_tpl->tpl_vars['v']->value['content'];?>
<br/>
	<i><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['time'],'%M');?>
分钟前通过web发布</i>
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
