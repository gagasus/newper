<?php defined('coursework') or die('Access denied'); ?>

		<div class="content">
			<h2>Список сессий</h2>
			<table class="tabl" cellspacing="1">
			  <tr>
				<th class="number">id</th>
				<th class="str_name">Пользователь</th>
				<th class="str_sort">Дата</th>
				<!--<th class="str_action">Действие</th>-->
			  </tr>
			  <tr>
             	 <?php $i = 1; ?>
				<?php foreach($sessions as $item): ?>
				<td><?=$i;?></td>
				<td class="name_page"><?=$item['user'];?></td>
				<td><?=$item['created_date'];?></td>
				<!--<td><a href="?view=edit_page&amp;id_page=<?=$item['id_sessions'];?>" class="edit">изменить</a>&nbsp; | &nbsp;<a href="?view=del_page&amp;id_page=<?=$item['id_pages']?>" class="del">удалить</a></td>-->
			  </tr>
              <?php $i++; ?>
				<?php endforeach; ?>  
			</table>
			<!--<a href="?view=add_page" class="eddelement">Добавить страницу</a>-->

		</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>
	