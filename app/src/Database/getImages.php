<?php

header("Content-Type: text/html; charset=utf8");

$folderName = "images";
$dirpath = dirname(getcwd()) . "/$folderName/";
$fileList = scandir($dirpath);
$fileList = array_diff($fileList, array('.', '..'));

$inputData = file_get_contents('php://input');

if ($inputData == "del") {
  delImages($dirpath,$fileList);
} else if ($inputData == "get") {
  getImages($fileList);
} else if ($inputData == "getInfo") {
  getInfo($fileList);
}

function getInfo($fileList)
{
  echo count($fileList);
}

function delImages($dirpath,$fileList)
{
  foreach ($fileList as $file) {
    unlink($dirpath . $file);
  }
  echo "All images have been deleted.";
}

function getImages($fileList)
{
  foreach ($fileList as $key => $value) {
    echo json_encode(
      array(
        'id' => $key - 2,
        'imgPath' => 'http://localhost:80/src/images/' . $value
      )
    );

    if ($key !== array_key_last($fileList)) {
      echo "<br>";
    }
  }
}

?>