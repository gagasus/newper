<?php defined('coursework') or die('Access denied'); ?>

		<div class="content">
			<h2>Список категорий</h2>
			<table class="tabl" cellspacing="1">
			  <tr>
				<th class="number">№</th>
				<th class="str_name">Название категории</th>
				<th class="str_sort">Родитель</th>
				<th class="str_action">Действие</th>
			  </tr>
			  <tr>
              <?php $i =1;?> 
				<?php foreach($categories as $item): ?>
				<!-- <td><?=$item['id_categories']?></td>-->
                <td><?=$i;?></td>
				<td class="name_page"><?=$item['name'];?></td>
				<td><?=$item['parent_id'];?></td>
				<td><a href="?view=edit_categorie&amp;id_categories=<?=$item['id_categories']?>" class="edit">изменить</a>&nbsp; | &nbsp;<a href="?view=del_categorie&amp;id_categories=<?=$item['id_categories']?>" class="del">удалить</a></td>
			  </tr>
               <?php $i++;?> 
				<?php endforeach; ?>  
			</table>
			<a href="?view=add_categorie" class="eddelement">Добавить категорию</a>

		</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>
	