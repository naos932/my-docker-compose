<?php

header("Content-Type: text/html; charset=utf8");

include('./connect.php');
include('./getImages.php');

$imagesURL = $_POST['imagesURL'];
$uploaderId = $_POST['uploaderId'];
$uploader = $_POST['uploader'];
$title = $_POST['title'];
$introduction = $_POST['introduction'];
$contact = $_POST['contact'];
$address = $_POST['address'];

$file = "./upload.sql";
$sql = file_get_contents($file);
$con->query($sql);

$con->query("INSERT INTO uploadInfo(imagesURL,uploaderId,uploader,title,introduction,contact,address) VALUES ('$imagesURL','$uploaderId','$uploader','$title','$introduction','$contact','$address');");

print_r($_POST);

echo "complete";

?>