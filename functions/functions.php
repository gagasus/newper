<?php
/* ===Редирект=== */
function redirect($http = false){
    if($http) $redirect = $http;
        else    $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    header("Location: $redirect");
    exit;
}
/* ===Редирект=== */

function clear($var){
	$var = strip_tags($var);
	$var = htmlspecialchars($var);
    $var = mysql_real_escape_string($var);
    return $var;
}

/* ===Распечатка массива=== */
function print_arr($arr){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}
/* ===Распечатка массива=== */

/* ===Способы доставки=== */
function shipping(){
    $query = "SELECT * FROM shipping";
    $res = mysql_query($query);
    $shipping = array();
    while($row = mysql_fetch_assoc($res)){
        $shipping[] = $row;
    }
    return $shipping;
}
/* ===Способы доставки=== */

/* ===Категории=== */
function categories(){
    $query = "SELECT id_categories,name,parent_id FROM categories ORDER BY id_categories";
    $res = mysql_query($query);
    $categories = array();
    while($row = mysql_fetch_assoc($res)){
		if(!$row['parent_id']){
			 $categories[$row['id_categories']][] = $row['name'];
		}else{
			 $categories[$row['parent_id']]['parent'][$row['id_categories']] = $row['name'];
		}
    }
    return $categories;
}
/* ===Категории=== */

/* ===Товары=== */
function products(){
    $query = "SELECT id_goods,article,name,price FROM goods";
    $res = mysql_query($query);
    $products = array();
    while($row = mysql_fetch_assoc($res)){
        $products[] = $row;
    }
    return $products;
}
/* ===Товары=== */

/* ===Товары категории=== */
function products_category($goods_category){
    $query = "SELECT id_goods,article,name,price FROM goods WHERE goods_category = '$goods_category'";
	
 /*$query = "(SELECT id_goods,article,name,price
                 FROM goods
                     WHERE goods_category = $goods_category AND display='1')
               UNION      
               (SELECT id_goods,article,name,price
                 FROM goods 
                     WHERE goods_category IN 
                (
                    SELECT id_categories FROM categories WHERE parent_id = $goods_category
                ))";
				*/
    $res = mysql_query($query);
    $products_category = array();
    while($row = mysql_fetch_assoc($res)){
        $products_category[] = $row;
    }
    return $products_category;
}
/* ===Товары категории=== */

/* ===Отдельный товар=== */
function product($id_product){
    $query = "SELECT * FROM goods where id_goods = '$id_product'";
    $res = mysql_query($query);
    $product = array();
	$product = mysql_fetch_assoc($res); 
    return $product;
}
/* ===Отдельный товар=== */

/* ===Регисрация=== */
function adduser(){
    $fio = trim($_POST['fio']);
	$login = trim($_POST['login']);
	$password = trim($_POST['password']);
	$phone = trim($_POST['phone']);
	$address = trim($_POST['address']);
	$email = trim($_POST['e-mail']);
	
	if(empty($fio)||empty($login)||empty($password)||empty($phone)||empty($address)||empty($email)){
        // если нет 
        $_SESSION['user']['res'] = "<div class='error'>Ошибка данных!!!</div>";
		$_SESSION['user']['fio'] =  $fio;
		$_SESSION['user']['login'] = $login;
		$_SESSION['user']['phone'] = $phone;
		$_SESSION['user']['address'] = $address;
		$_SESSION['user']['e-mail'] = $email;
        return false;
    }else{
		$fio = clear($fio);
		$login = clear($login);
		$password = clear($password);
		$phone = clear($phone);
		$address = clear($address);
		$email = clear($email);		
		$query = "INSERT INTO `customers` (`fio`, `login`, `password`, `phone`, `address`, `email`) VALUES ('$fio','$login','$password','$phone','$address','$email')";
        $res = mysql_query($query);  
        if(mysql_affected_rows() > 0){
			unset($_SESSION['user']['res']);
			$_SESSION['auth']['fio'] =  $fio;
			$_SESSION['auth']['id_customer'] = mysql_insert_id();
            $_SESSION['answer'] = "<div class='success'>Успех!</div>";
            return true;
        }else{
            $_SESSION['user']['res'] = "<div class='error'>Ошибка!</div>";
            return false;
    }

	}
}
/* ===Регисрация=== */

/* ===Вход=== */
function inputuser($login,$password){
    $query = "SELECT * FROM customers where login = '$login' and password = '$password'";
    $res = mysql_query($query);
    $inputuser = array();
	$inputuser = mysql_fetch_assoc($res); 
	if(mysql_affected_rows() > 0){
		$_SESSION['auth']['fio'] =  $inputuser['fio'];
		$_SESSION['auth']['id_customer'] = $inputuser['id_user'];
		add_session();
		return true;
	}else{
		return false;
	}
}
/* ===Вход=== */

/* ===Добавление товара пользователем=== */
function addgoodsorders($id_product){
	$counts = 1;
	if(isset($_SESSION['cart'][$id_product])){
		$_SESSION['cart'][$id_product]['counts'] += $counts;
        return $_SESSION['cart'];
	}else{
        $_SESSION['cart'][$id_product]['counts'] = $counts;
        return $_SESSION['cart'];
    }
}
/* ===Добавление товара пользователем=== */


/* ===Оформление заказа=== */
function addorders($id_shipping){
		$id_user = (int)$_SESSION['auth']['id_customer'];
		$total_sum = (int)$_SESSION['sum'];
		$id_shipping = (int)$id_shipping;
		
		$query = "INSERT INTO orders (id_user, date_orders, shipping_method, total_sum)
                    VALUES ($id_user, Now(), $id_shipping, $total_sum)";

        mysql_query($query) or die(mysql_error());

		$id_orders = mysql_insert_id();		
		foreach($_SESSION['cart'] as $item=>$key): 
			$product = product($item);
			$price = $product['price'];
			$counts = $key['counts'];
			$counts_price = $counts * $price;
			$query = "INSERT INTO goods_orders (id_goods, count_goods, sum, id_orders)
                    VALUES ('$item', '$counts', '$counts_price', '$id_orders')";
        	mysql_query($query) or die(mysql_error());
		endforeach;
		unset($_SESSION['cart']);
		return true;
}
/* ===Оформление заказа=== */

/* ===Создание сессий=== */
function add_session(){
		$name = $_SESSION['auth']['id_customer'];
        $query = "INSERT INTO sessions (user_id, created_date)
                    VALUES ($name, Now())";
        $res = mysql_query($query);
     
        if(mysql_affected_rows() > 0){
            $_SESSION['answer'] = "<div class='success'>Сессия добавлена!</div>";
            return true;
        }else{
            $_SESSION['add']['res'] = "<div class='error'>Ошибка при добавлении сессии!</div>";
            return false;
    }
}
/* ===Создание сессий=== */


