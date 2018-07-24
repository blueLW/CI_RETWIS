<?php
/* Smarty version 3.1.32, created on 2018-07-06 16:20:14
  from 'D:\www\CI\application\views\home\center.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b3f263eb41812_95591315',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '41e0814864077511c9079aa2e0f194606b3968d6' => 
    array (
      0 => 'D:\\www\\CI\\application\\views\\home\\center.html',
      1 => 1530864794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/header.html' => 1,
    'file:public/footer.html' => 1,
  ),
),false)) {
function content_5b3f263eb41812_95591315 (Smarty_Internal_Template $_smarty_tpl) {
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
<!--引入头部-->
<?php $_smarty_tpl->_subTemplateRender('file:public/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div id="postform">
<form method="POST" action="/home/center/post">
<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
, what you are doing?
<br>
<table>
<tbody>
	<tr>
		<td><textarea cols="70" rows="3" name="content"></textarea></td>
	</tr>
	<tr>
		<td align="right"><input type="submit" name="doit" value="Update"></td>
	</tr>
</tbody>

</table>
</form>
<div id="homeinfobox">
<?php echo $_smarty_tpl->tpl_vars['followData']->value['follower'];?>
 粉丝<br>
<?php echo $_smarty_tpl->tpl_vars['followData']->value['following'];?>
 关注<br>
</div>
</div>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['post']->value, 'v', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
?>
<div class='post'>
	<a class='username' href='profile.php?u=test' ><?php echo $_smarty_tpl->tpl_vars['v']->value['username'];?>
</a> <?php echo $_smarty_tpl->tpl_vars['v']->value['content'];?>
<br/>
	<i><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['time'],'%M');?>
分钟前通过web发布</i>
</div>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
<!--引入底部-->

<?php $_smarty_tpl->_subTemplateRender('file:public/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
</body>
</html><?php }
}
