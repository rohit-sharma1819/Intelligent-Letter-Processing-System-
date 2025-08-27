from flask import Flask, request, render_template, jsonify
import os
from werkzeug.utils import secure_filename
from text_search import extract_text_from_image, search_by_text

app = Flask(__name__)

# Folder for storing uploaded images
app.config['UPLOAD_FOLDER'] = 'static/dataset/'
os.makedirs(app.config['UPLOAD_FOLDER'], exist_ok=True)

@app.route('/', methods=['GET', 'POST'])
def index():
    extracted_text = ""
    matching_images = []

    if request.method == 'POST':
        # Check if an image was uploaded
        if 'file' in request.files and request.files['file'].filename:
            file = request.files['file']
            filename = secure_filename(file.filename)
            filepath = os.path.join(app.config['UPLOAD_FOLDER'], filename)
            file.save(filepath)

            # Extract text from image
            extracted_text = extract_text_from_image(filepath)
            matching_images = search_by_text(extracted_text)

        # Check if a text search was performed
        elif 'search_text' in request.form:
            extracted_text = request.form['search_text']
            matching_images = search_by_text(extracted_text)

    return render_template('index.html', extracted_text=extracted_text, images=matching_images)

if __name__ == '__main__':
    app.run(debug=True)
