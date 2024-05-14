function uploadFile() {
    var fileInput = document.getElementById('fileInput');
    var fileDisplayArea = document.getElementById('fileDisplay');

    fileDisplayArea.innerHTML = ''; // 清空显示区域的内容

    if (fileInput.files.length > 0) {
        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            var fileContents = e.target.result;

            // 根据文件类型显示文件内容
            if (file.type.startsWith('image/')) {
                // 显示图片
                fileDisplayArea.innerHTML = '<img src="' + fileContents + '" alt="Uploaded Image" />';
            } else if (file.type === 'text/plain' || file.type === 'text/html') {
                // 显示文本或HTML
                fileDisplayArea.innerHTML = '<pre>' + fileContents + '</pre>';
            } else {
                fileDisplayArea.innerHTML = '文件类型不支持预览';
            }
        };

        reader.readAsText(file); // 读取文件内容
    }
}
