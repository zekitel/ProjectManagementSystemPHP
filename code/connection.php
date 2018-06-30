<?php

define('hostname', 'localhost');
define('username', 'root');
define('password', '29011995');
define('database', 'test');


$connect = mysqli_connect(hostname, username, password, database);
$connect->set_charset("utf8");
?>