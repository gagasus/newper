<?php defined('coursework') or die('Access denied'); ?>
<div class="content">
<?php //print_arr($get_page) ?>
	
<h2>Добавление категории</h2>
<?php
if(isset($_SESSION['add_categorie']['res'])){
    echo $_SESSION['add_categorie']['res'];
    unset($_SESSION['add_categorie']['res']);
}
?>
<form action="" method="post">
	
	<table class="add_edit_page" cellspacing="0" cellpadding="0">
	  <tr>
		<td class="add-edit-txt">Название категории:</td>
		<td><input class="head-text" type="text" name="name" /></td>
	  </tr>
	  <tr>
		<td>Родитель:</td>
		<td><input class="num-text" type="text" name="parent_id" value="<?=$_SESSION['add_categorie']['parent_id']?>" /></td>
	  </tr>
	   <tr>
		<td>Описание:</td>
		<td></td>
	  </tr>
	  <tr>
		<td colspan="2">
			<textarea class="full-text" name="description"><?=$_SESSION['add_categorie']['description']?></textarea>
		</td>
	  </tr>
	</table>
    
	<div class="submitform"> <INPUT TYPE=SUBMIT> </div>

</form>
<?php unset($_SESSION['add_categorie']); ?>

	</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>