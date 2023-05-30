<?php

header("Content-Type: text/html; charset=utf8");

include('connect.php'); // 链接数据库
global $con;

if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['address'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $file = "./user.sql";
    $sql = file_get_contents($file);
    $con->query($sql);

    $q = "insert into userInfo(username,password,email,phone,address) values ('$username','$password','$email','$phone','$address')";
    $result = $con->query($q); //执行sql

    if (!$result) {
        echo "注册失败";
    } else {
        echo "注册成功";
    }
} else if (!empty($_POST['username'])) {
    $username = $_POST['username'];
    $q = "select * from userInfo where username = '$username'";
    $result = $con->query($q);
    if (!!mysqli_num_rows($result)) {
        echo '用户名已被注册';
    }
}

$con->close(); //关闭数据库
