<?php defined('coursework') or die('Access denied'); ?>
<div class="content">
<?php //print_arr($get_page) ?>
	
<h2>Редактирование товара</h2>
<?php
if(isset($_SESSION['edit_product']['res'])){
    echo $_SESSION['edit_product']['res'];
    unset($_SESSION['edit_product']['res']);
}
?>

<form action="" method="post">
	<table class="add_edit_page" cellspacing="0" cellpadding="0">
    	 <tr>
		<td class="add-edit-txt">Отобразить:</td>
		<td>	<input type="radio" name="display" value="1" /> 1
	<input type="radio" name="display" value="0" checked = "checked"/> 0</td>
	  </tr>
      
	  <tr>
		<td class="add-edit-txt">Название товара:</td>
		<td><input class="head-text" type="text" name="name" value="<?=htmlspecialchars($product['name'])?>"/></td>
	  </tr>
	  <tr>
	  <tr>
		<td class="add-edit-txt">Артикул:</td>
		<td><input class="head-text" type="text" name="article" value="<?=$product['article']?>"/></td>
	  </tr>
	  <tr>
	  <tr>
		<td class="add-edit-txt">Цена:</td>
		<td><input class="head-text" type="text" name="price" value="<?=$product['price']?>"/></td>
	  </tr>
	  <tr>
	  <tr>
		<td class="add-edit-txt">Количество:</td>
		<td><input class="head-text" type="text" name="counts" value="<?=$product['counts']?>"/></td>
	  </tr>
	  <tr>
		<td>Категория:</td>
		<td> 
        	<select name="id_categorie">
            <?php foreach($categories as $item):?>
        	<option value = "<?=$item['id_categories']?>" ><?=$item['name']?></option>      
            <?php endforeach?>
           </select>          
        </td>
	  </tr>
	   <tr>
		<td>Описание:</td>
		<td></td>
	  </tr>
	  <tr>
		<td colspan="2">
			<textarea class="full-text" name="description"><?=$product['description']?></textarea>
		</td>
	  </tr>
      <tr>
		<td>Спецификация:</td>
		<td></td>
	  </tr>
      	  <tr>
		<td colspan="2">
			<textarea class="full-text" name="specification"><?=$product['specification']?></textarea>
		</td>
	  </tr>
	</table>
	
	<div class="submitform"> <INPUT TYPE=SUBMIT> </div>

</form>
<?php unset($_SESSION['edit_product']); ?>
	</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>