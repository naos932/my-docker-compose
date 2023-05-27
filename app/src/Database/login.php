<?php

header("Content-Type: text/html; charset=utf8");

$name = $_POST['username'];
$password = md5($_POST['password']);


include('connect.php');
$con->query('SET NAMES utf8mb4');
$q = "select * from `userInfo` where `username` = '$name' and `password` = '$password'";
$result = $con->query($q);

$obj = $result->fetch_assoc();
$return = array("username"=>$obj['username'], "address"=>$obj['address']);

if (mysqli_num_rows($result) > 0) {
    echo json_encode($return);
} else {
    echo "用户名或密码错误";
}
$con->close();

?>