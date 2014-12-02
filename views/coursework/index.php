<?php

// запрет прямого обращения
define('coursework', TRUE);

// HEADER
include TEMPLATE.'header.php';

// LEFTBAR
include TEMPLATE.'leftbar.php';

// CONTENT
include TEMPLATE.$view.'.php';