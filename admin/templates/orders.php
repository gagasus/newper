<?php defined('coursework') or die('Access denied'); ?>
		<div class="content">
        <?php echo $_SESSION['answer'];
		unset($_SESSION['answer']);
		?>
			<h2>Заказы</h2>
			<table class="tabl" cellspacing="1">
			  <tr>
				<th class="number">id</th>
				<th class="str_name">Пользователь</th>
				<th class="str_sort">Дата заказа</th>
                <th class="str_sort">Способ доставки</th>
                <th class="str_sort">Сумма заказа</th>
                <th class="str_sort"></th>
				<!--<th class="str_action">Действие</th>-->
			  </tr>
			  <tr>
              	<?php $i = 1; ?>
				<?php foreach($orders as $item): ?>
				<td><?=$i;?></td>
				<td class="name_page"><?=$item['user'];?></td>
                <td><?=$item['date_orders'];?></td>
                <td><?=$item['shipping_method'];?></td>
                <td><?=$item['total_sum'];?></td>
                <td><?=$item['total_sum'];?></td>
                <td><a href="?view=goods_orders&amp;id_order=<?=$item['id_orders'];?>" class="eddelement">Подробно...</a></td>
				<!--<td><a href="?view=edit_page&amp;id_page=<?=$item['id_pages']?>" class="edit">изменить</a>&nbsp; | &nbsp;<a href="?view=del_page&amp;id_page=<?=$item['id_pages']?>" class="del">удалить</a></td>-->
			  </tr>
              <?php $i++; ?>
				<?php endforeach; ?>  
			</table>
			<!-- <a href="?view=add_page" class="eddelement">Добавить страницу</a> -->

		</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>
	