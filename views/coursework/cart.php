<?php defined('coursework') or die('Access denied'); ?>

		<div class="content">
        
			<h2>Корзина</h2>
			<table class="tabl" cellspacing="1">
			  <tr>
				<th class="number">№</th>
				<th class="str_name">Название</th>
                <th class="str_sort">Цена</th>
                <th class="str_sort">Количество</th>
                <th class="str_sort"></th>
			  </tr>
              <?php $i=1;?>
              <?php $sum=0;?>
              <?php foreach($_SESSION['cart'] as $item=>$key):
			  $product = product($item); 
			  ?>
			  <tr>
				<td><?=$i?></td>
				<td class="name_page"><?=$product['name']?></td>
                <td><?=$product['price']?></td>
				<td><?=$key['counts']?></td>
                <td><a href="?view=product&amp;id_product=<?=$item?>" class="eddelement">Подробнее</a></td>
                <?php $i++; $sum+=$product['price'] * $key['counts'];?>
			  </tr>
              <?php endforeach; ?>  
			</table>
            <?php $_SESSION['sum'] = $sum ?>
            <p> ИТОГ: <?=$sum?></p>
             <p> Способ доставки</p>
  			<?php $shipping = shipping();?>
            <form action="<?=PATH?>?view=addorders" method="post">
            <select name="id_shipping">
            <?php foreach($shipping as $item):?>
        	<option value = "<?=$item['id_shipping']?>" ><?=$item['name']?></option>      
            <?php endforeach?>
           </select>   
           <INPUT TYPE=SUBMIT value="Оформить заказ"> 
            </form>            

		</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>
	