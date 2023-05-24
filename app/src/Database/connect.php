<?php

$con = new mysqli($_ENV['MYSQL_HOST'], $_ENV['MYSQL_USER'], $_ENV['MYSQL_PASSWORD'], $_ENV['MYSQL_DATABASE'], $_ENV['MYSQL_PORT']);

// 检测连接
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "连接成功";
?>