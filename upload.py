from http.server import BaseHTTPRequestHandler, HTTPServer
from urllib.parse import parse_qs
import os
import cgi

PORT = 8000
DIRECTORY = 'upload/'

class UploadHandler(BaseHTTPRequestHandler):

    def do_POST(self):
        form = cgi.FieldStorage(
            fp=self.request,
            headers=self.headers,
            environ={'REQUEST_METHOD': 'POST'}
        )
        if 'file' in form:
            file_item = form['file']
            filename = file_item.filename
            with open(os.path.join(DIRECTORY, filename), 'wb') as f:
                f.write(file_item.file.read())
            response = f"File {filename} uploaded successfully."
        else:
            response = "No file found in the request."

        self.send_response(200)
        self.send_header('Content-type', 'text/html')
        self.end_headers()
        self.wfile.write(response.encode())

def run(server_class=HTTPServer, handler_class=UploadHandler):
    server_address = ('', PORT)
    httpd = server_class(server_address, handler_class)
    print(f"Starting httpd server on {PORT}")
    httpd.serve_forever()

if __name__ == '__main__':
    os.makedirs(DIRECTORY, exist_ok=True)
    run()
