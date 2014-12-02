<?php defined('coursework') or die('Access denied'); ?>
<div class="content">
<?php //print_arr($get_page) ?>
	
<h2>Редактирование страницы</h2>
<?php
if(isset($_SESSION['edit_page']['res'])){
    echo $_SESSION['edit_page']['res'];
    unset($_SESSION['edit_page']['res']);
}
?>
<form action="" method="post">
	
	<table class="add_edit_page" cellspacing="0" cellpadding="0">
	  <tr>
		<td class="add-edit-txt">Название страницы:</td>
		<td><input class="head-text" type="text" name="title" value="<?=htmlspecialchars($page['title'])?>" /></td>
	  </tr>
	  <tr>
		<td>Позиция страницы:</td>
		<td><input class="num-text" type="text" name="position" value="<?=$page['position']?>" /></td>
	  </tr>
	   <tr>
		<td>Содержание страницы:</td>
		<td></td>
	  </tr>
	  <tr>
		<td colspan="2">
			<textarea  class="full-text" name="text"><?=$page['text']?></textarea>
		</td>
	  </tr>
	</table>
	
	<div class="submitform"> <INPUT TYPE=SUBMIT> </div>

</form>

	</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>