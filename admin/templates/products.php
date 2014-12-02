<?php defined('coursework') or die('Access denied'); ?>

		<div class="content">
        <?php echo $_SESSION['answer'];
		unset($_SESSION['answer']);
		?>
			<h2>Список товаров</h2>
			<table class="tabl" cellspacing="1">
			  <tr>
				<th class="number">№</th>
				<th class="str_name">Название товара</th>
				<th class="str_sort">Категория</th>
				<th class="str_action">Действие</th>
			  </tr>
			  <tr>
           		<?php $i = 1; ?>
				<?php foreach($products as $item): ?>
				<td><?=$i;?></td>
				<td class="name_page"><?=$item['name'];?></td>
				<td><?=$item['categorie'];?></td>
				<td><a href="?view=edit_product&amp;id_product=<?=$item['id_goods']?>" class="edit">изменить</a>&nbsp; | &nbsp;<a href="?view=del_product&amp;id_product=<?=$item['id_goods']?>" class="del">удалить</a></td>
			  </tr>
				<?php $i++; ?>
				<?php endforeach; ?>  
			</table>
			<a href="?view=add_product" class="eddelement">Добавить товар</a>

		</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>
	