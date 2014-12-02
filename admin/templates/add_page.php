<?php defined('coursework') or die('Access denied'); ?>
<div class="content">
<?php //print_arr($get_page) ?>
	
<h2>Добавление страницы</h2>
<?php
if(isset($_SESSION['add_page']['res'])){
    echo $_SESSION['add_page']['res'];
    unset($_SESSION['add_page']['res']);
}
?>
<form action="" method="post">
	
	<table class="add_edit_page" cellspacing="0" cellpadding="0">
	  <tr>
		<td class="add-edit-txt">Название страницы:</td>
		<td><input class="head-text" type="text" name="title" /></td>
	  </tr>
	  <tr>
		<td>Позиция страницы:</td>
		<td><input class="num-text" type="text" name="position" value="<?=$_SESSION['add_page']['position']?>" /></td>
	  </tr>
	   <tr>
		<td>Содержание страницы:</td>
		<td></td>
	  </tr>
	  <tr>
		<td colspan="2">
			<textarea class="full-text" name="text"><?=$_SESSION['add_page']['text']?></textarea>
		</td>
	  </tr>
	</table>
    
	<INPUT TYPE=SUBMIT>

</form>
<?php unset($_SESSION['add_page']); ?>

	</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>