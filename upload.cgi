#!/usr/bin/python3
import cgi
import os

print("Content-Type: text/html\n")

form = cgi.FieldStorage()
file_item = form.getfirst("file", None)

if file_item:
    file_content = file_item.file.read()
    file_name = os.path.basename(file_item.filename)
    
    # 指定上传文件夹路径
    upload_dir = 'upload'
    if not os.path.exists(upload_dir):
        os.makedirs(upload_dir)
    
    # 保存文件
    with open(os.path.join(upload_dir, file_name), 'wb') as file_handle:
        file_handle.write(file_content)
    
    print(f"File {file_name} uploaded successfully.")
else:
    print(render_template("upload_form.html"))

def render_template(template_name):
    with open(template_name, 'r') as f:
        return f.read()

upload_form_html = """
<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title>
</head>
<body>
    <h1>Upload a file:</h1>
    <form method="post" enctype="multipart/form-data" action="upload.cgi">
        Select a file to upload:
        <input type="file" name="file" id="file"><br>
        <input type="submit" value="Upload File" name="submit">
    </form>
</body>
</html>
"""

print(render_template("upload_form.html"))
