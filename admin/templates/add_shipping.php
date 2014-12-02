<?php defined('coursework') or die('Access denied'); ?>
<div class="content">
<?php //print_arr($get_page) ?>
	
<h2>Добавление способа</h2>
<?php
if(isset($_SESSION['add_shipping']['res'])){
    echo $_SESSION['add_shipping']['res'];
    unset($_SESSION['add_shipping']['res']);
}
?>
<form action="" method="post">
	
	<table class="add_edit_page" cellspacing="0" cellpadding="0">
	  <tr>
		<td class="add-edit-txt">Способ:</td>
		<td><input class="head-text" type="text" name="name" /></td>
	  </tr>
	</table>
    
	<INPUT TYPE=SUBMIT>

</form>
<?php unset($_SESSION['add_shipping']); ?>

	</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>