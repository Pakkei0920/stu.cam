<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="0.5"> <!-- Refresh every 0.5 seconds -->
    <title>Auto Refresh </title>
</head>
<body>
    <h1>This is a page that auto-refreshes every 0.5 seconds</h1>
</body>
</html>

<?php
while (true) {
    date_default_timezone_set('Asia/Taipei');

    $remoteImageUrl = "http://wait.stu.edu.tw/ramdisk/push/xxx-6.jpg";
    $imageData = file_get_contents($remoteImageUrl);

    if ($imageData !== false) {
        $fileName = date('Ymd_His') . '.jpg';
        $savePath = 'CAM-6/';
        $saveFullPath = $savePath . $fileName;

        // Save the image file
        $saveResult = file_put_contents($saveFullPath, $imageData);

        if ($saveResult !== false) {
            usleep(500000); // Adjust this value based on your needs

            // Create image from the saved file
            $image = imagecreatefromjpeg($saveFullPath);

            // Add watermark
            $watermarkText = date('Y-m-d H:i:s');
            $textColor = imagecolorallocate($image, 255, 255, 255);
            $fontSize = 40;
            imagestring($image, $fontSize, imagesx($image) - $fontSize * strlen($watermarkText), imagesy($image) - 550, $watermarkText, $textColor);

            // Save the modified image
            imagejpeg($image, $savePath . "t-" . $fileName);
            imagedestroy($image);

            // Delete the original image file
            unlink($saveFullPath);
        } else {
            echo "Error saving the image file.";
        }
    } else {
        echo "Error fetching the remote image.";
    }
}
?>
