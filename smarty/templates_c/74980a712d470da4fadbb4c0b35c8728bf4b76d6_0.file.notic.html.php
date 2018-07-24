<?php
/* Smarty version 3.1.32, created on 2018-07-06 17:03:13
  from 'D:\www\CI\application\views\public\notic.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b3f30514ebaf1_55110826',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '74980a712d470da4fadbb4c0b35c8728bf4b76d6' => 
    array (
      0 => 'D:\\www\\CI\\application\\views\\public\\notic.html',
      1 => 1530867781,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/header.html' => 1,
    'file:public/footer.html' => 1,
  ),
),false)) {
function content_5b3f30514ebaf1_55110826 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE>
<html lang="it">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="refresh" content="0.6;url=<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">
<title>Retwis - 基于redis数据库的仿Twitter案例</title>
<link href="/public/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="page">
<!--引入头部文件-->
<?php $_smarty_tpl->_subTemplateRender('file:public/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div id="error"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
<br>
<a href="javascript:history.back()">Please return back and try again</a>
</div>

<!--引入底部文件-->
<?php $_smarty_tpl->_subTemplateRender('file:public/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>


</body></html><?php }
}
