<?php
// database
define('dbname', 'ecommerce');
define('dbusername', 'root');
define('dbpassword', '');
define('dbhost', 'localhost');

// URl

define('root_path', $_SERVER['DOCUMENT_ROOT'].'/user/');

$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/user/';
define('site_url', $root);




?>