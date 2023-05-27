<?php

header('Content-Type: application/json; charset=utf-8');

include('connect.php');
$con->query('SET NAMES utf8mb4');
$q = "SELECT * FROM `uploadInfo`";
$result = $con->query($q);

$obj = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($obj,JSON_UNESCAPED_UNICODE);

$con->close();

?>