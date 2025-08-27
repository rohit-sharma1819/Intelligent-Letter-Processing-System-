from ultralytics import YOLO

# Download YOLOv8 small model
model = YOLO("yolov8n.pt")  # Downloads yolov8n.pt if not present
print("YOLOv8 model downloaded successfully.")
