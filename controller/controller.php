<?php

defined('coursework') or die('Access denied');

session_start();

// подключение модели
require_once MODEL;

// подключение библиотеки функций
require_once 'functions/functions.php';

$categories = categories();
// получение динамичной части шаблона #content
$view = empty($_GET['view']) ? 'goods' : $_GET['view'];

switch($view){
    case('categorie'):
		$goods_category = (int)$_GET['id_categorie'];
        $products_category = products_category($goods_category);
    break;
	case('product'):
		$id_product = (int)$_GET['id_product'];
        $product = product($id_product);
    break;
	case('adduser'):
	if($_POST){
            if(adduser()) redirect('?view=goods');
                else redirect();
        }
    break;
   case('exituser'):
   		unset($_SESSION['auth']);
		unset($_SESSION['cart']);
		redirect('?view=goods');
    break;
	case('inputuser'):
	$login = clear($_POST['login']);
	$password = clear($_POST['password']);
	if ((empty($login) != true) and (empty($password) != true)){
    if(inputuser($login,$password)) redirect('?view=goods');
                else redirect();
	}else{
		redirect('?view=goods');
	}
    break;
	case('add_car'):
	$id_product = (int)$_GET['id_product'];
		if($_SESSION['auth']['fio']){
			addgoodsorders($id_product);
			redirect('?view=goods');
		}else{
			redirect('?view=adduser');
		}
    break;
	case('cart'):
	$shipping = shipping();
    break;
	case('addorders'):
		$id_shipping = (int)$_POST['id_shipping'];
		$addorders = addorders($id_shipping);
		redirect('?view=goods');
    break;
    default:
        // если из адресной строки получено имя несуществующего вида
		$products = products();
        $view = 'goods';
}

// подключени вида
require_once TEMPLATE.'index.php';