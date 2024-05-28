// JavaScript 用于触发文件上传
				function uploadfile() {
					var fileInput = document.getElementById('fileInput');
					var file = fileInput.files[0];
					var formData = new FormData();
					formData.append('file', file);
					var xhr = new XMLHttpRequest();
					xhr.open('POST', 'upload.py', true);
					xhr.onload = function () {
						if (xhr.status === 200) {
							document.getElementById('pythonCodeDisplay').innerText = xhr.responseText;
						} else {
							console.error(xhr.responseText);
						}
					};
					xhr.send(formData);
				}
