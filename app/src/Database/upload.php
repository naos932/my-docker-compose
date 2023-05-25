<?php

header("Content-Type: text/html; charset=utf8");

include('./connect.php');
include('./getImages.php');

$imagesURL = $_POST['imagesURL'];
$title = $_POST['title'];
$introduction = $_POST['introduction'];
$username = $_POST['username'];
$contact = $_POST['contact'];
$address = $_POST['address'];

$file = "./upload.sql";
$sql = file_get_contents($file);
$con->query($sql);

$con->query("INSERT INTO uploadInfo(imagesURL,title,introduction,username,contact,address) VALUES ('$imagesURL','$title','$introduction','$username','$contact','$address');");

print_r($_POST);

echo "complete";

?>