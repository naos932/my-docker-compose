<?php

header("Content-Type: text/html; charset=utf8");

include('connect.php'); // 链接数据库

$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$file = "./user.sql";
$sql = file_get_contents($file);
$con->query($sql);

$q = "insert into userInfo(username,password,email,phone,address) values ('$username','$password','$email','$phone','$address')";
$reslut = $con->query($q); //执行sql

if (!$reslut) {
    echo "注册失败";
} else {
    echo "注册成功";
}
$con->close() //关闭数据库

    ?>