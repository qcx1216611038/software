#!/usr/bin/env python3
import cgi
import os

print("Content-type: text/html\n")

form = cgi.FieldStorage()
file_item = form.getfirst("file", None)

if file_item:
    file_content = file_item.file.read()
    file_name = os.path.basename(file_item.filename)
    file_path = os.path.join('upload', file_name)

    with open(file_path, 'wb') as file:
        file.write(file_content)

    print(f"File {file_name} uploaded successfully.")
else:
    print("No file was uploaded.")
