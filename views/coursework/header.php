<?php defined('coursework') or die('Access denied'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?=TEMPLATE?>style.css" />
<script type="text/javascript" src="<?=TEMPLATE;?>js/jquery-1.7.2.min.js"></script>
<title>Список страниц</title>
</head>

<body>
<div class="karkas">
	<div class="head">
    
    <?php if($_SESSION['auth']['fio']){ ?>
    <p> <?php echo $_SESSION['auth']['fio'] ?> | <a href="<?=PATH?>?view=exituser">Выйти</a></p>
	<?php }else{ ?>
	<div class="user">
    <form  action="<?=PATH?>?view=inputuser" method="post">
    <input  type="text" name="login" placeholder="Логин"/>
    <input  type="text" name="password" placeholder="Пароль" />
	<INPUT TYPE=SUBMIT value="Войти">
    </form>
    <a href="<?=PATH?>?view=adduser">Регистрация</a> </div>
    <?php if ($_SESSION['auth']['error']){echo $_SESSION['auth']['error']; unset ($_SESSION['auth']['error']); }?>
	<?php } 
    if ($_SESSION['cart']){?>
 <a href="<?=PATH?>?view=cart">Корзина</a> 
<?php }else {?>
<a href="#">Корзина</a> 
<?php }?>
 </div> <!-- .head -->
	
<div class="content-main">	