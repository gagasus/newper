<?php defined('coursework') or die('Access denied'); ?>

		<div class="content">
        <?php echo $_SESSION['answer'];
		unset($_SESSION['answer']);
		?>
			<h2>Список страниц</h2>
			<table class="tabl" cellspacing="1">
			  <tr>
				<th class="number">№</th>
				<th class="str_name">Название страницы</th>
				<th class="str_sort">Позиция</th>
				<th class="str_action">Действие</th>
			  </tr>
			  <tr>
           		<?php $i = 1; ?>
				<?php foreach($pages as $item): ?>
				<td><?=$i;?></td>
				<td class="name_page"><?=$item['title'];?></td>
				<td><?=$item['position'];?></td>
				<td><a href="?view=edit_page&amp;id_page=<?=$item['id_pages']?>" class="edit">изменить</a>&nbsp; | &nbsp;<a href="?view=del_page&amp;id_page=<?=$item['id_pages']?>" class="del">удалить</a></td>
			  </tr>
				<?php $i++; ?>
				<?php endforeach; ?>  
			</table>
			<a href="?view=add_page" class="eddelement">Добавить страницу</a>

		</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>
	