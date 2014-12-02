<?php
/* ===Распечатка массива=== */
function print_arr($arr){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}
/* ===Распечатка массива=== */

/* ===Редирект=== */
function redirect($http = false){
    if($http) $redirect = $http;
        else    $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    header("Location: $redirect");
    exit;
}
/* ===Редирект=== */


/* ===Фильтрация входящих данных=== */
function clear_admin($var){
	$var = strip_tags($var);
	$var = htmlspecialchars($var);
    $var = mysql_real_escape_string($var);
    return $var;
}
/* ===Фильтрация входящих данных=== */

/* ===Страницы=== */
function pages(){
    $query = "SELECT id_pages,title,position FROM pages ORDER BY position";
    $res = mysql_query($query);
    $pages = array();
    while($row = mysql_fetch_assoc($res)){
        $pages[] = $row;
    }
    return $pages;
}
/* ===Страницы=== */

/* ===Отдельная страница=== */
function page($id_page){
    $query = "SELECT * FROM pages WHERE id_pages = '$id_page'";
    $res = mysql_query($query);  
    $page = array();
    $page = mysql_fetch_assoc($res); 
    return $page;
}
/* ===Отдельная страница=== */

/* ===Добавление страницы=== */
function add_page(){
    $title = trim($_POST['title']);
    $position = (int)$_POST['position'];
    $text = trim($_POST['text']);
    
    if(empty($title)){
        // если нет названия
        $_SESSION['add_page']['res'] = "<div class='error'>Должно быть название страницы!</div>";
        $_SESSION['add_page']['position'] = $position;
        $_SESSION['add_page']['text'] = $text;
        return false;
    }else{
        $title = clear_admin($title);
        $description = clear_admin($description);
        $text = clear_admin($text);
       
        $query = "INSERT INTO pages (title, position, text)
                    VALUES ('$title', $position, '$text')";
        $res = mysql_query($query);
     
        if(mysql_affected_rows() > 0){
            $_SESSION['answer'] = "<div class='success'>Страница добавлена!</div>";
            return true;
        }else{
            $_SESSION['add_page']['res'] = "<div class='error'>Ошибка при добавлении страницы!</div>";
            return false;
    }
	}
}
/* ===Добавление страницы=== */

/* ===Редактирование страницы=== */
function edit_page($id_page){
    $title = trim($_POST['title']);
    $position = (int)$_POST['position'];
    $text = trim($_POST['text']);
    
    if(empty($title)){
        // если нет названия
        $_SESSION['edit_page']['res'] = "<div class='error'>Должно быть название страницы!</div>";
        return false;
    }else{
        $title = clear_admin($title);
        $keywords = clear_admin($keywords);
        $description = clear_admin($description);
        $text = clear_admin($text);
        
        $query = "UPDATE pages SET
                    title = '$title',
                    position = $position,
                    text = '$text'
                        WHERE id_pages = $id_page";
        $res = mysql_query($query) or die(mysql_error());
        
        if(mysql_affected_rows() > 0){
            $_SESSION['answer'] = "<div class='success'>Страница обновлена!</div>";
            return true;
        }else{
            $_SESSION['edit_page']['res'] = "<div class='error'>Ошибка или Вы ничего не меняли!</div>";
            return false;
        }
    }
}
/* ===Редактирование страницы=== */

/* ===Удаление страницы=== */
function del_page($id_page){
    $query = "DELETE FROM pages WHERE id_pages = '$id_page'";
    $res = mysql_query($query);   
    if(mysql_affected_rows() > 0){
        $_SESSION['answer'] = "<div class='success'>Страница удалена.</div>";
        return true;
    }else{
        $_SESSION['answer'] = "<div class='error'>Ошибка удаления страницы!</div>";
        return false;
    }
}
/* ===Удаление страницы=== */

/* ===Категории=== */
function categories(){
    $query = "SELECT id_categories,name,parent_id FROM categories ORDER BY id_categories";
    $res = mysql_query($query);
    $categories = array();
    while($row = mysql_fetch_assoc($res)){
        $categories[] = $row;
    }
    return $categories;
}
/* ===Категории=== */

/* ===Отдельная категория=== */
function categorie($id_categorie){
    $query = "SELECT * FROM categories where id_categories = '$id_categorie'";
    $res = mysql_query($query);
    $categorie = array();
	$categorie = mysql_fetch_assoc($res); 
    return $categorie;
}
/* ===Отдельная категория=== */

/* ===Редактирование категории=== */
function edit_categorie($id_categorie){
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $parent_id = (int)$_POST['parent_id'];
    
    if(empty($name)){
        // если нет названия
        $_SESSION['edit_categorie']['res'] = "<div class='error'>Должно быть название категории!</div>";
        return false;
    }else{
        $name = clear_admin($name);
        $description = clear_admin($description);
		       
        $query = "UPDATE categories SET
                    name = '$name',
                    parent_id = $parent_id,
                    description = '$description'
                        WHERE id_categories = '$id_categorie'";
        $res = mysql_query($query) or die(mysql_error());
        
        if(mysql_affected_rows() > 0){
            $_SESSION['answer'] = "<div class='success'>Категория обновлена!</div>";
            return true;
        }else{
            $_SESSION['edit_categories']['res'] = "<div class='error'>Ошибка или Вы ничего не меняли!</div>";
            return false;
        }
    }
}
/* ===Редактирование категории=== */

/* ===Добавление категории=== */
function add_categorie(){
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $parent_id = (int)$_POST['parent_id'];
    
    if(empty($name)){
        // если нет названия
        $_SESSION['add_categorie']['res'] = "<div class='error'>Должно быть название категории!</div>";
        $_SESSION['add_categorie']['parent_id'] = $parent_id;
        $_SESSION['add_categorie']['description'] = $description;
        return false;
    }else{
        $name = clear_admin($name);
        $description = clear_admin($description);
       
        $query = "INSERT INTO categories (name, parent_id, description)
                    VALUES ('$name', $parent_id, '$description')";
        $res = mysql_query($query);
     
        if(mysql_affected_rows() > 0){
            $_SESSION['answer'] = "<div class='success'>Категория добавлена!</div>";
            return true;
        }else{
            $_SESSION['add_categorie']['res'] = "<div class='error'>Ошибка при добавлении категории!</div>";
            return false;
    }
	}
}
/* ===Добавление категории=== */

/* ===Удаление категории=== */
function del_categorie($id_categorie){
    $query = "DELETE FROM categories WHERE id_categories = '$id_categorie'";
    $res = mysql_query($query);   
    if(mysql_affected_rows() > 0){
        $_SESSION['answer'] = "<div class='success'>Категория удалена.</div>";
        return true;
    }else{
        $_SESSION['answer'] = "<div class='error'>Ошибка удаления категории!</div>";
        return false;
    }
}
/* ===Удаление категории=== */

/* ===Товары=== */
function products(){
    $query = "SELECT goods.id_goods, goods.name , categories.name as categorie FROM goods, categories where categories.id_categories = goods.goods_category";
    $res = mysql_query($query);
    $products = array();
    while($row = mysql_fetch_assoc($res)){
        $products[] = $row;
    }
    return $products;
}
/* ===Товары=== */

/* ===Отдельный товар=== */
function product($id_product){
    $query = "SELECT * FROM goods where id_goods = '$id_product'";
    $res = mysql_query($query);
    $product = array();
	$product = mysql_fetch_assoc($res); 
    return $product;
}
/* ===Отдельный товар=== */


/* ===Добавление товара=== */
function add_product(){
	$display = (int)$_POST['display'];
    $name = trim($_POST['name']);
	$article = trim($_POST['article']);
	$price = (int)$_POST['price'];
	$counts = (int)$_POST['counts'];
	$id_categorie = (int)$_POST['id_categorie'];
    $description = trim($_POST['description']);
	$specification = trim($_POST['specification']);
    
    if(empty($name)){
        // если нет названия
        $_SESSION['add_product']['res'] = "<div class='error'>Должно быть название товара!</div>";
        return false;
    }else{
        $name = clear_admin($name);
		$article = clear_admin($article);
        $description = clear_admin($description);
		$specification= clear_admin($specification);
        $query = "insert into goods (article, name, price, counts, goods_category, description, specification, display)
values ('$article', '$name', $price, $counts, $id_categorie, '$description', '$specification', $display)";

        $res = mysql_query($query);
     
        if(mysql_affected_rows() > 0){
            $_SESSION['answer'] = "<div class='success'>Товар добавлен!</div>";
            return true;
        }else{
            $_SESSION['add_categorie']['res'] = "<div class='error'>Ошибка при добавлении товара!</div>";
            return false;
    }
	}
}
/* ===Добавление товара=== */

/* ===Редактирование товара=== */
function edit_product($id_product){
	$display = (int)$_POST['display'];
    $name = trim($_POST['name']);
	$article = trim($_POST['article']);
	$price = (int)$_POST['price'];
	$counts = (int)$_POST['counts'];
	$id_categorie = (int)$_POST['id_categorie'];
    $description = trim($_POST['description']);
	$specification = trim($_POST['specification']);
    
    if(empty($name)){
        // если нет названия
        $_SESSION['edit_product']['res'] = "<div class='error'>Должно быть название товара!</div>";
        return false;
    }else{
        $name = clear_admin($name);
		$article = clear_admin($article);
        $description = clear_admin($description);
		$specification= clear_admin($specification);
        $query = "UPDATE goods SET
					article = '$article',
					name = '$name',
					price = $price,
					counts = $counts,
					goods_category = $id_categorie,
					description = '$description' ,
					specification = '$specification',
					display = $display
					WHERE id_goods = '$id_product'";
					
        $res = mysql_query($query) or die(mysql_error());
        
        if(mysql_affected_rows() > 0){
            $_SESSION['answer'] = "<div class='success'>Товар обновлена!</div>";
            return true;
        }else{
            $_SESSION['edit_product']['res'] = "<div class='error'>Ошибка или Вы ничего не меняли!</div>";
            return false;
        }
    }
}
/* ===Редактирование товара=== */

/* ===Удаление товара=== */
function del_product($id_product){
    $query = "DELETE FROM goods WHERE id_goods = '$id_product'";
    $res = mysql_query($query);   
    if(mysql_affected_rows() > 0){
        $_SESSION['answer'] = "<div class='success'>Категория удалена.</div>";
        return true;
    }else{
        $_SESSION['answer'] = "<div class='error'>Ошибка удаления категории!</div>";
        return false;
    }
}
/* ===Удаление товара=== */

/* ===Пользователи=== */
function users(){
    $query = "SELECT * FROM customers";
    $res = mysql_query($query);
    $users = array();
    while($row = mysql_fetch_assoc($res)){
        $users[] = $row;
    }
    return $users;
}
/* ===Пользователи=== */

/* ===Отдельный пользователь=== */
function user($id_user){
    $query = "SELECT * FROM customers WHERE id_user = '$id_user'";
    $res = mysql_query($query);  
    $user = array();
    $user = mysql_fetch_assoc($res); 
    return $user;
}
/* ===Отдельный пользователь=== */

/* ===Редактирование пользователя=== */
function edit_user($id_user){
    $fio = trim($_POST['fio']);
	$login = trim($_POST['login']);
	$phone = trim($_POST['phone']);
	$address = trim($_POST['address']);
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
    
    if(empty($fio)){
        // если нет названия
        $_SESSION['edit_user']['res'] = "<div class='error'>Не все поля заполнены!</div>";
        return false;
    }else{
        $fio = clear_admin($fio);
		$login = clear_admin($login);
        $phone = clear_admin($phone);
		$address = clear_admin($address);
		$email = clear_admin($email);
		$password = clear_admin($password);
		
        $query = "UPDATE customers SET
					password = '$password',
					email = '$email',
					address = '$address',
					phone = '$phone',
					login = '$login' ,
					fio = '$fio'
					WHERE id_user = '$id_user'";
					
        $res = mysql_query($query) or die(mysql_error());
        
        if(mysql_affected_rows() > 0){
            $_SESSION['answer'] = "<div class='success'>Пользователь изменен!</div>";
            return true;
        }else{
            $_SESSION['edit_user']['res'] = "<div class='error'>Ошибка или Вы ничего не меняли!</div>";
            return false;
        }
    }
}
/* ===Редактирование пользователя=== */

/* ===Удаление пользователя=== */
function del_user($id_user){
    $query = "DELETE FROM customers WHERE id_user = '$id_user'";
    $res = mysql_query($query);   
    if(mysql_affected_rows() > 0){
        $_SESSION['answer'] = "<div class='success'>Пользователь удален.</div>";
        return true;
    }else{
        $_SESSION['answer'] = "<div class='error'>Ошибка удаления пользователя!</div>";
        return false;
    }
}
/* ===Удаление пользователя=== */

/* ===Заказы=== */
function orders(){
    $query = "SELECT orders.id_orders, orders.date_orders, shipping.name as shipping_method, orders.total_sum, customers.fio as user FROM orders,customers,shipping where customers.id_user =  orders.id_user and shipping.id_shipping = orders.shipping_method";
    $res = mysql_query($query);
    $orders = array();
    while($row = mysql_fetch_assoc($res)){
        $orders[] = $row;
    }
    return $orders;
}
/* ===Заказы=== */

/* ===Информация о товарах в заказе=== */
function  goods_orders($id_order){
    $query = "SELECT goods_orders.count_goods,goods_orders.sum,goods.name ,goods.price  FROM goods_orders
		JOIN goods ON goods.id_goods = goods_orders.id_goods where id_orders = '$id_order'";
    $res = mysql_query($query);
    $goods_orders = array();
    while($row = mysql_fetch_assoc($res)){
        $goods_orders[] = $row;
    }
    return $goods_orders;
}
/* ===Информация о товарах в заказе=== */

/* ===Информация о заказе=== */
function order($id_order){
    $query = "SELECT customers.fio, orders.date_orders,shipping.name as shipping, orders.total_sum  FROM orders 
JOIN customers on customers.id_user = orders.id_user
JOIN shipping ON shipping.id_shipping = orders.shipping_method
where id_orders = '$id_order'";
    $res = mysql_query($query);
    $order = array();
	$order = mysql_fetch_assoc($res); 
    return $order;
}
/* ===Информация о заказе=== */

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

/* ===Добавление способа доставки=== */
function add_shipping(){
    $name = trim($_POST['name']);

    
    if(empty($name)){
        // если нет названия
        $_SESSION['add_shipping']['res'] = "<div class='error'>Должно быть название способа!</div>";
        return false;
    }else{
        $name = clear_admin($name);
       
        $query = "INSERT INTO shipping (name)
                    VALUES ('$name')";
        $res = mysql_query($query);
     
        if(mysql_affected_rows() > 0){
            $_SESSION['answer'] = "<div class='success'>Способ добавлен!</div>";
            return true;
        }else{
            $_SESSION['add_shipping']['res'] = "<div class='error'>Ошибка при добавлении способа!</div>";
            return false;
    }
	}
}
/* ===Добавление способа доставки=== */

/* ===Редактирование способа доставки=== */
function edit_shipping($id_shipping){
      $name = trim($_POST['name']);
    
    if(empty($name)){
        // если нет названия
        $_SESSION['edit_shipping']['res'] = "<div class='error'>Должно быть название страницы!</div>";
        return false;
    }else{
        $query = "UPDATE shipping SET
                    name = '$name'
                        WHERE id_shipping = '$id_shipping'";
        $res = mysql_query($query) or die(mysql_error());
        
        if(mysql_affected_rows() > 0){
            $_SESSION['answer'] = "<div class='success'>Способ обновлен!</div>";
            return true;
        }else{
            $_SESSION['edit_page']['res'] = "<div class='error'>Ошибка или Вы ничего не меняли!</div>";
            return false;
        }
    }
}
/* ===Редактирование способа доставки=== */

/* ===Удаление способа доставки=== */
function del_shipping($id_shipping){
    $query = "DELETE FROM shipping WHERE id_shipping = '$id_shipping'";
    $res = mysql_query($query);   
    if(mysql_affected_rows() > 0){
        $_SESSION['answer'] = "<div class='success'>Способ удален.</div>";
        return true;
    }else{
        $_SESSION['answer'] = "<div class='error'>Ошибка удаления способа доставки!</div>";
        return false;
    }
}
/* ===Удаление страницы=== */

/* ===Сессии=== */
function sessions(){
    $query = "SELECT sessions.id_sessions, sessions.created_date, customers.fio as user  FROM sessions,customers where sessions.user_id = customers.id_user";
    $res = mysql_query($query);
    $sessions = array();
    while($row = mysql_fetch_assoc($res)){
        $sessions[] = $row;
    }
    return $sessions;
}
/* ===Сессии=== */


/* ===Вход=== */
function inputuser($login,$password){
    $query = "SELECT * FROM admin where login = '$login' and password = '$password'";
	//echo $query;
    $res = mysql_query($query);
    $inputuser = array();
	$inputuser = mysql_fetch_assoc($res); 
	if(mysql_affected_rows() > 0){
		$_SESSION['auth']['admin'] = $inputuser['login'];
		return true;
	}else{
		return false;
	}
}
/* ===Вход=== */
