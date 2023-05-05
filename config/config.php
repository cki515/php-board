<?php
define("DB_HOST", "127.0.0.1");
define("DB_ID", "root");
define("DB_PW", "");
define("DB_NAME", "php_board");

if(!isset($config)) {
    $config = [];
}
$dbConn = mysqli_connect(DB_HOST, DB_ID, DB_PW, DB_NAME) or die();

$config['siteName'] = 'Clinic';
$config['dbConn'] = $dbConn;






?>

