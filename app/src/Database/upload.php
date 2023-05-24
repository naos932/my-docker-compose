<?php

header("Content-Type: text/html; charset=utf8");

include('./connect.php');

$introduction = $_POST['introduction'];
$username = $_POST['username'];
$contact = $_POST['contact'];
$address = $_POST['address'];

$file = "./upload.sql";
$sql = file_get_contents($file);
$con->query($sql);

$con->query("INSERT INTO uploadInfo(id,introduction,username,contact,address) VALUES (null,'$introduction','$username','$contact','$address');");

print_r($_POST);

echo "成功完成";

?>