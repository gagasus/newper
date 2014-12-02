<?php defined('coursework') or die('Access denied'); ?>
<div class="content">
<?php //print_arr($get_page) ?>
	
<h2>Редактирование способа доставки:</h2>
<?php
if(isset($_SESSION['edit_shipping']['res'])){
    echo $_SESSION['edit_shipping']['res'];
    unset($_SESSION['edit_shipping']['res']);
}
?>
<form action="" method="post">
	
	<table class="add_edit_page" cellspacing="0" cellpadding="0">
	  <tr>
		<td class="add-edit-txt">Название способа доставки:</td>
		<td><input class="head-text" type="text" name="name" value="<?=htmlspecialchars($shipping['name'])?>" /></td>
	  </tr>
	</table>
	
	<div class="submitform"> <INPUT TYPE=SUBMIT> </div>

</form>

	</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>