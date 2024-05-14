<?php
// 设置上传文件的目录
$uploadDir = 'uploads/';

// 检查目录是否存在，如果不存在则创建
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

// 检查是否有文件被上传
if (!empty($_FILES)) {
    $tempFile = $_FILES['file']['tmp_name']; // 临时文件路径
    $uploadPath = $uploadDir . $_FILES['file']['name']; // 新文件路径

    // 移动文件到上传目录
    move_uploaded_file($tempFile, $uploadPath);

    echo "文件上传成功！";
} else {
    echo "没有文件被上传！";
}
?>
