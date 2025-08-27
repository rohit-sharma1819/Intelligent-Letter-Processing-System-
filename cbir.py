import os
import cv2
import numpy as np
from flask import Flask, request, render_template
from werkzeug.utils import secure_filename
from ultralytics import YOLO  # YOLOv8 Model for Animal Detection

# Initialize Flask
app = Flask(__name__)
app.config['UPLOAD_FOLDER'] = 'uploads/'
app.config['DATASET_FOLDER'] = 'dataset/'

# Ensure directories exist
os.makedirs(app.config['UPLOAD_FOLDER'], exist_ok=True)
os.makedirs(app.config['DATASET_FOLDER'], exist_ok=True)

# Load YOLOv8 Model for object detection
model = YOLO("yolov8n.pt")  # Ensure you have YOLOv8 weights downloaded

# Extract ORB features
def extract_features(image_path):
    image = cv2.imread(image_path, cv2.IMREAD_GRAYSCALE)
    orb = cv2.ORB_create()
    keypoints, descriptors = orb.detectAndCompute(image, None)
    return descriptors

# Load dataset features
def load_dataset():
    features = {}
    for img_name in os.listdir(app.config['DATASET_FOLDER']):
        img_path = os.path.join(app.config['DATASET_FOLDER'], img_name)
        descriptors = extract_features(img_path)
        if descriptors is not None:
            features[img_name] = descriptors
    return features

# Detect multiple animals in an image using YOLO
def detect_animals(image_path):
    image = cv2.imread(image_path)
    results = model(image)  # YOLOv8 detection
    rois = []

    for result in results:
        for box in result.boxes:
            x1, y1, x2, y2 = map(int, box.xyxy[0])  # Bounding box coordinates
            confidence = box.conf[0].item()
            label = result.names[int(box.cls[0])]

            if confidence > 0.5 and label in ["dog", "cat", "bird", "horse", "cow", "sheep"]:  # Filter animal labels
                rois.append(image[y1:y2, x1:x2])  # Extract ROI

    return rois

# Find similar images using ORB matching
def find_similar_images(query_image, dataset_features, top_n=5):
    rois = detect_animals(query_image)
    if not rois:
        return []

    bf = cv2.BFMatcher(cv2.NORM_HAMMING, crossCheck=True)
    similarity_scores = {}

    for roi in rois:
        roi_path = "temp_roi.jpg"
        cv2.imwrite(roi_path, roi)  # Save detected region
        query_features = extract_features(roi_path)

        for img_name, img_features in dataset_features.items():
            if img_features is not None and query_features is not None:
                matches = bf.match(query_features, img_features)
                similarity_scores[img_name] = similarity_scores.get(img_name, 0) + len(matches)

    sorted_images = sorted(similarity_scores, key=similarity_scores.get, reverse=True)[:top_n]
    return sorted_images

# Flask Routes
@app.route('/', methods=['GET', 'POST'])
def index():
    if request.method == 'POST':
        if 'file' not in request.files:
            return "No file uploaded"

        file = request.files['file']
        if file.filename == '':
            return "No selected file"

        filename = secure_filename(file.filename)
        filepath = os.path.join(app.config['UPLOAD_FOLDER'], filename)
        file.save(filepath)

        dataset_features = load_dataset()
        similar_images = find_similar_images(filepath, dataset_features)

        return render_template('results.html', query_image=filename, similar_images=similar_images)

    return render_template('index.html')

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)
