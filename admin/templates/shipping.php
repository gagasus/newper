<?php defined('coursework') or die('Access denied'); ?>

		<div class="content">
        <?php echo $_SESSION['answer'];
		unset($_SESSION['answer']);
		?>
			<h2>Способы доставки</h2>
			<table class="tabl" cellspacing="1">
			  <tr>
				<th class="number">id</th>
				<th class="str_name">Название</th>
				<th class="str_action">Действие</th>
			  </tr>
			  <tr>
              <?php $i =1;?> 
				<?php foreach($shipping as $item): ?>
				<!-- <td><?=$item['id_shipping'];?></td> -->
                <td><?=$i;?></td>
				<td class="name_page"><?=$item['name'];?></td>
				<td><a href="?view=edit_shipping&amp;id_shipping=<?=$item['id_shipping'];?>" class="edit">изменить</a>&nbsp; | &nbsp;<a href="?view=del_shipping&amp;id_shipping=<?=$item['id_shipping'];?>" class="del">удалить</a></td>
			  </tr>
              <?php $i++;?> 
				<?php endforeach; ?>  
			</table>
			<a href="?view=add_shipping" class="eddelement">Добавить способ</a>

		</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>
	