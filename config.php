<?php
defined('coursework') or die('Access denied');

// домен
 define('PATH', 'http://courseworklocalhost/');
//define('PATH', 'http://bigru12.ru/');

// модель
define('MODEL', 'model/model.php');

// контроллер
define('CONTROLLER', 'controller/controller.php');

// вид
define('VIEW', 'views/');

// папка с активным шаблоном
define('TEMPLATE', VIEW.'coursework/');

// папка с картинками контента
define('PRODUCTIMG', PATH.'userfiles/');

// сервер БД
  define('HOST', 'localhost');
//define('HOST', 'p93919.mysql.ihc.ru');

// пользователь
define('USER', 'p93919_course');

// пароль
define('PASS', 'coursework');

// БД
define('DB', 'p93919_course');

// название магазина - title
define('TITLE', 'Интернет магазин');


// количество товаров на страницу
//define('PERPAGE', 9);

// папка шаблонов административной части
define('ADMIN_TEMPLATE', 'templates/');

mysql_connect(HOST, USER, PASS) or die('No connect to Server');
mysql_select_db(DB) or die('No connect to DB');
mysql_query("SET NAMES 'UTF8'") or die('Cant set charset');