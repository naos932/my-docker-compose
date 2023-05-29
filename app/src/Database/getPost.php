<?php

header('Content-Type: application/json; charset=utf-8');

include('connect.php');
include('../Cache/connect.php');

$inputData = file_get_contents('php://input');

# cache
$cacheKey = 'postData';
$cacheData = $redis->get($cacheKey);

if (false) { // 得想个新的判断方式。
  $data = unserialize($cacheData);
  echo json_encode($data,JSON_UNESCAPED_UNICODE);
} else {
  $con->query('SET NAMES utf8mb4');
  $q = "SELECT * FROM `uploadInfo`";
  $result = $con->query($q);
  $obj = $result->fetch_all(MYSQLI_ASSOC);
  # use redis cache data
  $redis->setex($cacheKey,3600,serialize($obj));
  echo json_encode($obj,JSON_UNESCAPED_UNICODE);
}
if ($inputData === 'del') { 
  $redis->del($cacheKey);
}

$con->close();

?>