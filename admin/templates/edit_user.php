<?php defined('coursework') or die('Access denied'); ?>
<div class="content">
<?php //print_arr($get_page) ?>
	
<h2>Редактирование пользователя</h2>
<?php
if(isset($_SESSION['edit_user']['res'])){
    echo $_SESSION['edit_user']['res'];
    unset($_SESSION['edit_user']['res']);
}
?>
<form action="" method="post">
	
	<table class="add_edit_page" cellspacing="0" cellpadding="0">
	  <tr>
		<td class="add-edit-txt">ФИО пользоватля:</td>
		<td><input class="head-text" type="text" name="fio" value="<?=$user['fio']?>" /></td>
	  </tr>
	  <tr>
		<td>Логин:</td>
        <td><input class="head-text" type="text" name="login" value="<?=$user['login']?>" /></td>
	  </tr>
       <tr>
		<td>Пароль:</td>
        <td><input class="head-text" type="text" name="password" value="<?=$user['password']?>" /></td>
	  </tr>
       <tr>
		<td>Телефон:</td>
        <td><input class="head-text" type="text" name="phone" value="<?=$user['phone']?>" /></td>
	  </tr>
       <tr>
		<td>Адрес:</td>
        <td><input class="head-text" type="text" name="address" value="<?=$user['address']?>" /></td>
	  </tr>
       <tr>
		<td>E-mail:</td>
        <td><input class="head-text" type="text" name="email" value="<?=$user['email']?>" /></td>
	  </tr>
	</table>
	
	<div class="submitform"> <INPUT TYPE=SUBMIT> </div>

</form>

	</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>