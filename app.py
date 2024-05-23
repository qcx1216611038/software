from flask import Flask, request, render_template, flash, redirect

app = Flask(__name__)
app.secret_key = 'your_secret_key'  # 用于保持会话安全

@app.route('/')
def index():
    # 使用flash来传递消息
    return render_template('index.html', message=flash('message'))

@app.route('/upload', methods=['POST'])
def upload_file():
    if 'file' not in request.files:
        flash('没有文件部分')
        return redirect('/')
    file = request.files['file']
    if file.filename == '':
        flash('没有选择文件')
        return redirect('/')
    if file:
        # 指定上传文件夹
        save_path = 'uploads/' + file.filename
        file.save(save_path)
        flash('文件上传成功')
        return redirect('/')
    flash('上传失败')
    return redirect('/')

if __name__ == '__main__':
    app.run(debug=True)
