<?php defined('coursework') or die('Access denied'); ?>

		<div class="content">
        <?php //print_arr($categories)?>
        
            <div class="imggoods" ><img src="../../userfiles/<?=$product['img'];?>" alt="img"></div>
            <div class="namegoods"><?=$product['name'];?></div>
            <div class="articlegoods" >Артикул: <?=$product['article'];?></div>
            <div class="price" >Цена: <?=$product['price'];?> </br></div>
            <div class="counts" >Количество: <?=$product['counts'];?></div>
            <div class="clean"> </div>
            <div class="descriptiongoods" ><p>Описание</p><?=$product['description'];?></div>
            <div class="specification"><p>Спецификация</p><?=$product['specification'];?></div>
            <div class="clean"> </div>
            <div class="car" ><a href="?view=add_car&amp;id_product=<?=$product['id_goods']?>" class="eddelement">В корзину</a></div>
		</div> <!-- .content -->
	</div> <!-- .content-main -->
</div> <!-- .karkas -->
</body>
</html>
	