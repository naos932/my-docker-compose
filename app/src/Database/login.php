<?php

header("Content-Type: text/html; charset=utf8");

include('connect.php');
global $con;

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $name = $_POST['username'];
    $password = md5($_POST['password']);

    $con->query('SET NAMES utf8mb4');
    $q = "select * from `userInfo` where `username` = '$name' and `password` = '$password'";
    $result = $con->query($q);

    $obj = $result->fetch_assoc();
    if (!!$obj) {
        $return = array('id'=>$obj['id'], 'username'=>$obj['username'], 'address'=>$obj['address'], 'favorite'=>$obj['favorite'], 'history'=>$obj['history']);
    }

    if (mysqli_num_rows($result) > 0) {
        if (!empty($return)) {
            echo json_encode($return);
        }
    } else {
        echo "用户名或密码错误";
    }
} else if (!empty($_POST['userId']) && !empty($_POST['postId'])) {
    $userId = $_POST['userId'];
    $postId = $_POST['postId'];

    $con->query('SET NAMES utf8mb4');
    $q = "update userInfo set favorite = concat(favorite, '$postId') where `Id` = '$userId'";
    $result = $con->query($q);
} else if (!empty($_POST['userId'])) {
    $userId = $_POST['userId'];

    $con->query('SET NAMES utf8mb4');
    $q = "select favorite from `userInfo` where `Id` = '1'";
    $result = $con->query($q);
    $obj = $result->fetch_all();
    print_r($obj[0][0]);
}

$con->close();

