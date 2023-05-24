<?php

header("Content-type: multipart/form-data;");

$file = $_FILES['file'];
$fileName = $file['name'];
$fileSize = $file['size'];
$fileTmpPath = $file['tmp_name'];
$fileType = $file['type'];

$folderName = "images";
$folder = dirname(getcwd()) . "/$folderName/";

if (!file_exists($folder)) {
  if (mkdir($folder, 0777, true)) {
      echo '文件夹创建成功！';
  } else {
      echo '无法创建文件夹！';
  }
} else {
  echo '文件夹已经存在！';
}

$dirpath = dirname(getcwd()) . "/$folderName/";
$imagePath = $dirpath . $fileName;

move_uploaded_file($fileTmpPath, $imagePath);

# 一种获取文件扩展名的方式
$imageFileType = pathinfo($imagePath,PATHINFO_EXTENSION);
echo $imageFileType; # png

# 可以用下面这种方式获取文件扩展名
/* $pattern = "/\//";
$matches = preg_split($pattern, $fileType);
echo $matches[1]; */

$fp = fopen($imagePath,'rb');
$picData = fread($fp,$fileSize);

$image = imagecreatefromstring($picData);

imagepng($image,$dirpath . "output." . $imageFileType);

imagedestroy($image)

?>