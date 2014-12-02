<?php defined('coursework') or die('Access denied'); ?>

		<div class="content">
        <?php //print_arr($categories)?>
        
			<h2>Список товаров</h2>
			<table class="tabl" cellspacing="1">
			  <tr>
				<th class="number">Артикул</th>
				<th class="str_name">Название</th>
                <th class="str_sort">Цена</th>
                <th class="str_sort"></th>
                <th class="str_sort"></th>
			  </tr>
			  <tr>
              <?php foreach($products as $item): ?>
				<td><?=$item['article'];?></td>
				<td class="name_page"><?=$item['name'];?></td>
                <td><?=$item['price'];?></td>
				<td><a href="?view=add_car&amp;id_product=<?=$item['id_goods']?>" class="eddelement">В корзину</a></td>
                <td><a href="?view=product&amp;id_product=<?=$item['id_goods']?>" class="eddelement">Подробнее</a></td>
			  </tr>
              <?php endforeach; ?>  
			</table>

		</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>
	