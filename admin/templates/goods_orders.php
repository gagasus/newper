<?php defined('coursework') or die('Access denied'); ?>
<div class="content">
<?php //print_arr($order) ?>
	
<h2>Информация о заказе</h2>

	<table class="add_edit_page" cellspacing="0" cellpadding="0">
	  <tr>
		<td>Покупатель:</td>
		<td><?=$order['fio']?></td>
	  </tr>
      
	  <tr>
		<td>Дата покупки:</td>
		<td><?=$order['date_orders']?></td>
	  </tr>
      
	   <tr>
		<td>Способ доставки:</td>
		<td><?=$order['shipping']?></td>
	  </tr>
      </br>
      <tr> 
		<td>Товар</td>
		<td>Количество</td>
        <td>Цена</td>
        <td>Всего</td>	 
        </tr>     
      <?php foreach($goods_orders as $item): ?>
      <tr> 
		<td><?=$item['name'];?></td>
		<td><?=$item['count_goods']?></td>
        <td><?=$item['price']?></td>
        <td><?=$item['sum']?></td>	 
        </tr> 
      <?php endforeach; ?> 
      </br>
       <tr>
		<td>ИТОГ: <?=$order['total_sum']?></td>
	  </tr>
      
	  <tr>

	  </tr>
	</table>
    


	</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>