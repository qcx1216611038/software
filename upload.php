<?php
$uploadDir = 'upload/'; // 指定上传目录
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

if (isset($_FILES['file'])) {
    $fileName = $_FILES['file']['name'];
    $fileTmpPath = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];

    // 此处可以添加文件大小的验证
    if ($fileSize < 5000000) {
        $destinationPath = $uploadDir . $fileName;
        if (move_uploaded_file($fileTmpPath, $destinationPath)) {
            echo "文件上传成功！";
        } else {
            echo "文件上传失败！";
        }
    } else {
        echo "文件过大！";
    }
} else {
    echo "没有文件被上传！";
}
?>
