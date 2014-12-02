<?php 

$today = date("m-d-y"); 

echo '$today';

//тригер
?>
CREATE DEFINER =  `p93919_course`@`%` TRIGGER `del_orders` BEFORE DELETE ON  `orders` FOR EACH ROW DELETE FROM goods_orders WHERE id_orders = OLD.id_orders;

delete from  goods_orders
   where id_orders = OLD.id_orders;


CREATE TRIGGER `update_orders` BEFORE UPDATE ON  `orders` FOR EACH ROW UPDATE orders SET date_orders = NOW( ) WHERE id_orders = OLD.id_orders;

update orders Set date_orders = now() 
   where id_orders = OLD.id_orders;














update goods_orders Set total_sum = sum where 
   goods_orders.id_orders = orders.id_orders;
   
   
// работает
CREATE TRIGGER `goods_trig` AFTER INSERT ON `goods_orders`
FOR EACH ROW 
   update goods Set counts = goods.count - goods_orders.count_goods where 
   goods.id_goods = goods_orders.id_goods;


CREATE TRIGGER `categories_trig` BEFORE UPDATE ON  `categories` FOR EACH ROW UPDATE id_categories SET parent_id = NEW.id_categories WHERE id_categories = NEW.id_categories;


$query = "(SELECT goods_id, name, img, anons, price, hits, new, sale, date
                 FROM goods
                     WHERE goods_brandid = $category AND visible='1')
               UNION      
               (SELECT goods_id, name, img, anons, price, hits, new, sale, date
                 FROM goods 
                     WHERE goods_brandid IN 
                (
                    SELECT brand_id FROM brands WHERE parent_id = $category
                ) AND visible='1') ORDER BY $order_db LIMIT $start_pos, $perpage";