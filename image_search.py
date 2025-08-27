import cv2
import numpy as np
import os

DATASET_FOLDER = "static/dataset/"

def extract_features(image_path):
    image = cv2.imread(image_path)
    image = cv2.resize(image, (256, 256))
    hist = cv2.calcHist([image], [0, 1, 2], None, [8, 8, 8], [0, 256, 0, 256, 0, 256])
    hist = cv2.normalize(hist, hist).flatten()
    return hist

# Load dataset features
dataset_features = {}
for img_name in os.listdir(DATASET_FOLDER):
    img_path = os.path.join(DATASET_FOLDER, img_name)
    dataset_features[img_name] = extract_features(img_path)

def search_similar_images(query_image_path):
    query_features = extract_features(query_image_path)
    results = []

    for img_name, features in dataset_features.items():
        distance = cv2.compareHist(query_features, features, cv2.HISTCMP_CORREL)
        results.append((img_name, distance))

    results.sort(key=lambda x: x[1], reverse=True)  # Higher correlation = better match
    return [img[0] for img in results[:5]]
