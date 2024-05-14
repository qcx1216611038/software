function uploadImage() {
    var input = document.getElementById('imageUpload');
    if (input.files && input.files[0]) {
        var file = input.files[0];
 
        // 创建FormData对象用于构建表单数据集
        var formData = new FormData();
        formData.append('image', file);
 
        // 这里的'/upload'是服务器端处理上传的路径
        fetch('/upload', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => alert('Image uploaded successfully'))
        .catch(error => alert('Error: ' + error));
    } else {
        alert('No image selected');
    }
}
