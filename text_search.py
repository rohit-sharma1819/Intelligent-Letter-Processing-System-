import os
import pytesseract
from PIL import Image

# Set Tesseract path (Change this based on your installation)
pytesseract.pytesseract.tesseract_cmd = r"C:\Program Files\Tesseract-OCR\tesseract.exe"

# Folder containing dataset images
DATASET_FOLDER = "static/dataset/"

def extract_text_from_image(img_path):
    """Extract text from the given image."""
    image = Image.open(img_path)
    text = pytesseract.image_to_string(image)
    return text.strip()

def search_by_text(text):
    """Search dataset images that contain the given text."""
    matching_images = []
    for img_name in os.listdir(DATASET_FOLDER):
        img_path = os.path.join(DATASET_FOLDER, img_name)
        img_text = extract_text_from_image(img_path)
        
        if text.lower() in img_text.lower():
            matching_images.append(img_name)

    return matching_images
