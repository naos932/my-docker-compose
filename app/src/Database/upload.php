<?php

header("Content-Type: text/html; charset=utf8");

include('./connect.php');
global $con;

$imagesURL = $_POST['imagesURL'];
$uploaderId = $_POST['uploaderId'];
$uploader = $_POST['uploader'];
$title = $_POST['title'];
$introduction = $_POST['introduction'];
$rental = $_POST['rental'];
$area = $_POST['area'];
$contact = $_POST['contact'];
$address = $_POST['address'];

$file = "./upload.sql";
$sql = file_get_contents($file);
$con->query($sql);

$con->query("INSERT INTO uploadInfo(imagesURL,uploaderId,uploader,title,introduction,rental,area,contact,address) VALUES ('$imagesURL','$uploaderId','$uploader','$title','$introduction','$rental','$area','$contact','$address');");

print_r($_POST);

echo "complete";