<?php
while (true) {
date_default_timezone_set('Asia/Taipei'); // 设置时区

$remoteImageUrl = 'http://wait.stu.edu.tw/ramdisk/push/xxx-6.jpg';
$imageData = file_get_contents($remoteImageUrl);

if ($imageData !== false) {
    $fileName = date('Ymd_His') . '.jpg';
    $savePath = 'CAM-6/';
    $saveFullPath = $savePath . $fileName;
    $saveResult = file_put_contents($saveFullPath, $imageData);
//--//
    usleep(500000);//ms
    $image = imagecreatefromjpeg($saveFullPath);
    $watermarkText = date('Y-m-d H:i:s');
    $textColor = imagecolorallocate($image, 255, 255, 255);
    $fontSize = 40;
    imagestring($image, $fontSize, imagesx($image) - "0" - $fontSize * strlen($watermarkText), imagesy($image) - "550", $watermarkText, $textColor);
    imagejpeg($image, $savePath . "t-".$fileName); // 如果要保存图像，请取消注释此行
    imagedestroy($image); //释放
//--/
    unlink($saveFullPath);
}
else {
    echo "error";
}
}
?>
