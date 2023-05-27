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
      # echo '文件夹创建成功！';
  } else {
      echo '无法创建文件夹！';
  }
} else {
  # echo '文件夹已经存在！';
}

$dirpath = dirname(getcwd()) . "/$folderName/";
$imagePath = $dirpath . $fileName;

move_uploaded_file($fileTmpPath, $imagePath);

# 一种获取文件扩展名的方式
$imageFileType = pathinfo($imagePath,PATHINFO_EXTENSION);
$imageFileName = pathinfo($imagePath,PATHINFO_FILENAME);
$imageFileBaseName = pathinfo($imagePath,PATHINFO_BASENAME);
# $imageFileType png

# 下面进行改名
# 注意fileList Array 第一项第二项为空，第三项($fileList[2])才是 1.png
$fileList = scandir($dirpath);
$fileList = array_diff($fileList, array('.', '..'));
$renameTo = $dirpath . md5_file($imagePath) . '.' . $imageFileType;
rename($imagePath,$renameTo);
echo pathinfo($renameTo,PATHINFO_BASENAME); # BASENAME - xxx.png

# 也可以用下面这种方式获取文件扩展名
/* $pattern = "/\//";
$matches = preg_split($pattern, $fileType);
echo $matches[1]; */

# 以下是测试图片转二进制然后转回来再保存，可是问题很大，结果可以看output.png
/* $fp = fopen($imagePath,'rb');
$picData = fread($fp,$fileSize);

$image = imagecreatefromstring($picData);

imagepng($image,$dirpath . "output." . $imageFileType);

imagedestroy($image) */

?>