<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $fileName = $data['fileName'];
    $sourcePath = $data['sourcePath'];
    $destinationPath = $data['destinationPath'];

    // 确保目标文件夹存在
    if (!is_dir($destinationPath)) {
        echo json_encode(['message' => '目标文件夹不存在']);
        exit;
    }

    // 构建完整的文件路径
    $fullSourcePath = $sourcePath . '/' . $fileName;
    $fullDestinationPath = $destinationPath . '/' . $fileName;

    // 复制文件
    if (copy($fullSourcePath, $fullDestinationPath)) {
        echo json_encode(['message' => '文件复制成功']);
    } else {
        echo json_encode(['message' => '文件复制失败']);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => '不支持的请求方法']);
}
?>
