<?php
/* Smarty version 3.1.32, created on 2018-07-05 13:42:50
  from 'D:\www\CI\application\views\home\home.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b3dafda215728_39913302',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c92b123f07e33c0248917d10fc360f9e8a6b60a' => 
    array (
      0 => 'D:\\www\\CI\\application\\views\\home\\home.html',
      1 => 1530769361,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/header.html' => 1,
    'file:public/footer.html' => 1,
  ),
),false)) {
function content_5b3dafda215728_39913302 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="it">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Retwis - 基于redis的放twiter微博项目</title>
<link href="/public/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="page">
<!--引入头部文件-->
<?php $_smarty_tpl->_subTemplateRender('file:public/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div id="welcomebox">
<div id="registerbox">
<h2>Register!</h2>
<b>Want to try Retwis? Create an account!</b>
<form method="POST" action="/home/index/register">
<table>
<tbody><tr>
  <td>Username</td><td><input type="text" name="username"></td>
</tr>
<tr>
  <td>Password</td><td><input type="password" name="password"></td>
</tr>
<tr>
  <td>Password (again)</td><td><input type="password" name="password2"></td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" name="doit" value="Create an account"></td></tr>
</tbody></table>
</form>
<h2>Already registered? Login here</h2>
<form method="POST" action="/home/action/login">
<table><tbody><tr>
  <td>Username</td><td><input type="text" name="username"></td>
  </tr><tr>
  <td>Password</td><td><input type="password" name="password"></td>
  </tr><tr>
  <td colspan="2" align="right"><input type="submit" name="doit" value="Login"></td>
</tr></tbody></table>
</form>
</div>
Hello! Retwis is a very simple clone of <a href="http://twitter.com/">Twitter</a>, as a demo for the <a href="http://code.google.com/p/redis/">Redis</a> key-value database. Key points:
<ul>
<li>Redis is a key-value DB, and it is <b>the only DB used</b> by this application, no MySQL or alike at all.</li>
<li>This application can scale horizontally since there is no point where the whole dataset is needed at the same point. With consistent hashing (not implemented in the demo to make it simpler) different keys can be stored in different servers.</li>
<li>The source code of this application, and a tutorial explaining its design, is available <a href="http://code.google.com/p/redis/wiki/TwitterAlikeExample">here</a>.
</li><li>PHP and the Redis server communicate using the PHP Redis library client written by Ludovico Mangocavallo and included inside the Redis tar.gz distribution.
</li></ul>
</div>

<!--引入底部文件-->
<?php $_smarty_tpl->_subTemplateRender('file:public/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
