
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guntur Municipal Corporation</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    .hero-section {
      background-color: #f3f4f6;
      padding: 3rem 1rem;
      text-align: center;
    }
    .text-container {
      background-color: #ffffff;
      padding: 1.5rem;
      border-radius: 12px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .image-container img {
      width: 100%;
      border-radius: 12px;
      max-height: 300px;
      object-fit: cover;
    }
    .extra-section {
      background-color: #e5e7eb;
      padding: 2rem;
      border-radius: 12px;
      text-align: center;
    }
    .extra-section h3 {
      color: #1f2937;
      font-size: 1.5rem;
      margin-bottom: 1rem;
    }

    .vertical-image-container img {
    max-height: 500px;
    width: 30%;
    object-fit: cover;
    border-radius: 12px;
  }
  </style>
</head>
<body class="bg-gray-100">
  <!-- Header -->
  <header class="bg-green-600 text-white p-4 text-center">
    <h1 class="text-3xl font-bold">Guntur Municipal Corporation</h1>
    <p class="text-lg">Serving the Citizens of Guntur with Excellence</p>
  </header>
  <?php include 'nav.php'?>


  <!-- Hero Section -->
  <section class="hero-section">
    <h2 class="text-2xl font-bold mb-4">Welcome to Guntur Municipal Corporation</h2>
    <p class="text-gray-700">We strive to provide the best services for the citizens of Guntur, ensuring a clean and green environment.</p>
  </section>

  <!-- Main Content -->
  <div class="container mx-auto p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Information Box 1 -->
    <div class="text-container">
      <h3 class="text-xl font-semibold mb-2">About Guntur</h3>
      <p>Guntur is a city known for its rich cultural heritage and agricultural importance. The municipal corporation works tirelessly to enhance the city's infrastructure and public services.</p>
    </div>

    <!-- Image Box -->
    <div class="image-container">
      <!-- <img src="styles/AnyConv.com__GDi9rkiaQAAuzeh.jpg" style="height:400px;" alt="Guntur City Image"> -->
      <img src="styles/download.jpeg" style="height:400px;" alt="Guntur City Image">

    </div>
  </div>

  <div class="container mx-auto p-6">
    <h3 class="text-2xl font-semibold mb-4 text-center">Experience the Beauty of Guntur</h3>
    <div class="vertical-image-container">
      <img src="styles/AnyConv.com__GDi9rkiaQAAuzeh.jpg" alt="Tall Scenic Image">
    </div>
  </div>


  <!-- Additional Content Section -->
  <div class="container mx-auto p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="text-container">
      <h3 class="text-xl font-semibold mb-2">Public Services</h3>
      <p>Providing water supply, sanitation, and solid waste management services to all citizens.</p>
    </div>
    <div class="text-container">
      <h3 class="text-xl font-semibold mb-2">Citizen Grievances</h3>
      <p>Submit your complaints and suggestions to help us serve you better.</p>
    </div>
    <div class="text-container">
      <h3 class="text-xl font-semibold mb-2">Green Initiatives</h3>
      <p>Join hands with us in creating a greener and healthier environment.</p>
    </div>
  </div>

  <!-- Image Container Section -->
  <div class="container mx-auto p-6">
    <h3 class="text-2xl font-semibold mb-4 text-center">Gallery of Guntur</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="image-container">
        <!-- <img src="styles/images-removebg-preview.png" style="width:260px;" alt="Image 1"> -->
        <img src="styles/1493831-water (1).jpg" alt="Image 1">

      </div>
      <div class="image-container">
        <img src="styles/download.jpeg" alt="Image 2">
      </div>
      <div class="image-container">
        <img src="styles/images.jpeg" alt="Image 3">
      </div>
    </div>
  </div>

  <!-- Additional Thoughts Section -->
  <div class="extra-section container mx-auto mt-8">
    <h3>Our Vision for a Better Guntur</h3>
    <p>We envision a future where Guntur is recognized as a model city with sustainable development, efficient governance, and active citizen engagement.</p>
  </div>

  <!-- Footer -->
  <footer class="bg-green-600 text-white p-4 text-center mt-8">
    <p>&copy; 2025 Guntur Municipal Corporation. All rights reserved.</p>
  </footer>
</body>
</html>
