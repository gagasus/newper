<?php defined('coursework') or die('Access denied'); ?>
<div class="content">

<h2>Регистрация</h2>
<p> * - обязательное поле</p>
<?php 
if(isset($_SESSION['user']['res'])){
    echo $_SESSION['user']['res'];
    unset($_SESSION['user']['res']);
}?>
<form action="" method="post">
	
	<table class="add_edit_page" cellspacing="0" cellpadding="0">
	  <tr>
		<td class="add-edit-txt">ФИО*:</td>
		<td><input class="head-text" type="text" name="fio" value="<?=$_SESSION['user']['fio']?>"/></td>
	  </tr>
      <tr>
		<td class="add-edit-txt">Логин*:</td>
		<td><input class="head-text" type="text" name="login" value="<?=$_SESSION['user']['login']?>"/></td>
	  </tr>
     	  <tr>
		<td class="add-edit-txt">Пароль*:</td>
		<td><input class="head-text" type="password" name="password"/></td>
	  </tr>
      	  <tr>
		<td class="add-edit-txt">Телефон*:</td>
		<td><input class="head-text" type="text" name="phone" value="<?=$_SESSION['user']['phone']?>"/></td>
	  </tr>
      	  <tr>
		<td class="add-edit-txt">Адрес*:</td>
		<td><input class="head-text" type="text" name="address" value="<?=$_SESSION['user']['address']?>"/></td>
	  </tr>
      	  <tr>
		<td class="add-edit-txt">E-mail*:</td>
		<td><input class="head-text" type="text" name="e-mail" value="<?=$_SESSION['user']['e-mail']?>"/></td>
	  </tr>
	</table>
    
	<div class="submitform"> <INPUT TYPE=SUBMIT> </div>
</form>
	</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>