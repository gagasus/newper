<?php defined('coursework') or die('Access denied'); ?>
<div class="leftBar">
			<ul class="nav-left">
            <li><a href="#" class="nav-activ">Категории</a></li>
             <?php foreach($categories as $key => $item): ?>
            <?php if(count($item) > 1): ?>
           	<li><a href="<?=PATH?>?view=categorie&amp;id_categorie=<?=$key?>"><?=$item[0]?></a></li>
             <?php foreach($item['parent'] as $key => $parent): ?>
				<li><a href="<?=PATH?>?view=categorie&amp;id_categorie=<?=$key?>"> --- <?=$parent?></a></li>
                <?php endforeach?>
                <?php elseif($item[0]):?>
                <li><a href="<?=PATH?>?view=categorie&amp;id_categorie=<?=$key?>"><?=$item[0]?></a></li>
                <?php endif?>
                <?php endforeach?>
			</ul>
		</div>