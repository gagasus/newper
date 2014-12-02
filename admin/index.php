<?php

// запрет прямого обращения
define('coursework', TRUE);

session_start();

// подключение файла конфигурации
require_once '../config.php';

// подключение файла функций административной части
require_once 'functions/functions.php';

// получени массива страниц
$pages = pages();

// получение динамичной части шаблона #content
$view = empty($_GET['view']) ? 'pages' : $_GET['view'];

switch($view){
    case('pages'):
        // страницы
        $pages = pages();     
    break;
    case('edit_page'):
        // редактирование страницы
        $id_page = (int)$_GET['id_page'];
        $page = page($id_page);
        
        if($_POST){
            if(edit_page($id_page)) redirect('?view=pages');
                else redirect();
        }
    break;
    case('add_page'):
        if($_POST){
            if(add_page()) redirect('?view=pages');
                else redirect();
        }
    break;   
    case('del_page'):
        $id_page = (int)$_GET['id_page'];
        del_page($id_page);
        redirect();
    break;
	
 case('categories'):
        // категории
        $categories = categories();     
    break;
    case('edit_categorie'):
        // редактирование категории
        $id_categorie = (int)$_GET['id_categories'];
        $categorie = categorie($id_categorie);
        
        if($_POST){
            if(edit_categorie($id_categorie)) redirect('?view=categories');
                else redirect();
        }
    break;
    case('add_categorie'):
	// Добавление категории
        if($_POST){
            if(add_categorie()) redirect('?view=categories');
                else redirect();
        }
    break;   
    case('del_categorie'):
	// Удаление категории
        $id_categorie = (int)$_GET['id_categories'];
        del_categorie($id_categorie);
        redirect();
    break;
 case('products'):
        // товары
        $products = products();     
    break;
    case('edit_product'):
        // редактирование товарв
        $id_product = (int)$_GET['id_product'];
        $product = product($id_product);
        $categories = categories();
        if($_POST){
            if(edit_product($id_product)) redirect('?view=products');
                else redirect();
        }
    break;
    case('add_product'):
	// Добавление товарв
	$categories = categories(); 
        if($_POST){
            if(add_product()) redirect('?view=products');
                else redirect();
        }
    break;   
    case('del_product'):
	// Удаление товарв
        $id_product = (int)$_GET['id_product'];
        del_product($id_product);
        redirect();
    break;	
	case('users'):
        // товары
        $users = users();     
    break;
	case('orders'):
        // товары
        $orders = orders();     
    break;
	case('shipping'):
        // товары
        $shipping = shipping();     
    break;
	case('edit_shipping'):
        // редактирование доставки
        $id_shipping = (int)$_GET['id_shipping'];
        $shipping = shipping($id_shipping);
        
        if($_POST){
            if(edit_shipping($id_shipping)) redirect('?view=shipping');
                else redirect();
        }
    break;
    case('add_shipping'):
        if($_POST){
            if(add_shipping()) redirect('?view=shipping');
                else redirect();
        }
    break;   
    case('del_shipping'):
        $id_shipping = (int)$_GET['id_shipping'];
        del_shipping($id_shipping);
        redirect();
    break;
    case('sessions'):
        $sessions = sessions();
    break;
    case('del_user'):
        $id_user = (int)$_GET['id_user'];
        del_user($id_user);
        redirect();
    break;
	case('edit_user'):
        $id_user = (int)$_GET['id_user'];
        $user = user($id_user);        
        if($_POST){
            if(edit_user($id_user)) redirect('?view=users');
                else redirect();
        }
    break;
	case('goods_orders'):
        $id_order = (int)$_GET['id_order'];
        $goods_orders = goods_orders($id_order);
		$order = order($id_order);
    break;
	case('exituser'):
   		unset($_SESSION['auth']);
		redirect();
    break;
	case('inputuser'):
	$login = clear_admin($_POST['login']);
	$password = clear_admin($_POST['password']);
	if ((empty($login) != true) and (empty($password) != true)){
    if(inputuser($login,$password)) redirect('?view=pages');
                else redirect();
	}else{
		redirect('?view=pages');
	}
    break;
    default:
    // если из адресной строки получено имя несуществующего вида
    $view = 'pages'; 
}

// HEADER
include ADMIN_TEMPLATE.'header.php';

if ($_SESSION['auth']['admin']){
// LEFTBAR
include ADMIN_TEMPLATE.'leftbar.php';

// CONTENT
include ADMIN_TEMPLATE.$view.'.php';
}
