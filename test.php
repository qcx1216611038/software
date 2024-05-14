<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "这是 POST 请求";
} else {
    echo "这不是 POST 请求";
}
?>
