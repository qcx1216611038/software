<?php
$uploadDir = 'upload/'; // 指定上传目录
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

if (isset($_FILES['file'])) {
    $fileName = $_FILES['file']['name'];
    $fileTmpPath = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    
    if ($fileError === UPLOAD_ERR_OK) {
        $destinationPath = $uploadDir . $fileName;
        if (move_uploaded_file($fileTmpPath, $destinationPath)) {
            echo "文件上传成功！";
        } else {
            echo "文件上传失败！";
        }
    } else {
        echo "上传出错！错误码：" . $fileError;
    }
} else {
    echo "没有文件被上传！";
}
?>
