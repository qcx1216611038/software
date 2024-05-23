from flask import Flask, request, render_template

app = Flask(__name__)

@app.route('/')
def index():
    # 渲染并显示 upload.html 表单
    return render_template('index.html')

@app.route('/upload', methods=['POST'])
def upload_file():
    if 'file' not in request.files:
        return '没有文件部分', 400
    file = request.files['file']
    if file.filename == '':
        return '没有选择文件', 400
    if file:
        # 指定上传文件夹
        save_path = 'upload/' + file.filename
        file.save(save_path)
        return '文件上传成功', 200
    return '上传失败', 500

if __name__ == '__main__':
    app.run(debug=True)
