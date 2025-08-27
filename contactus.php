
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us - Guntur Municipal Corporation</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    .hero-section {
      background-color: #f3f4f6;
      padding: 3rem 1rem;
      text-align: center;
    }

    .contact-info {
      background-color: #ffffff;
      padding: 2rem;
      border-radius: 12px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .icon-container a {
      margin: 0 10px;
      color: #4b5563;
      transition: color 0.3s ease;
      font-size: 2rem;
    }

    .icon-container a:hover {
      color: #10b981;
    }

    .vertical-image-container img {
      max-height: 300px;
      width: 100%;
      object-fit: cover;
      border-radius: 12px;
    }
  </style>
</head>
<body class="bg-gray-100">
  <!-- Header -->
  <header class="bg-green-600 text-white p-4 text-center">
    <h1 class="text-3xl font-bold">Guntur Municipal Corporation</h1>
    <p class="text-lg">Connecting with Citizens for a Better Guntur</p>
  </header>
  <?php include 'nav.php'?>

  <!-- Hero Section -->
  <section class="hero-section">
    <h2 class="text-2xl font-bold mb-4">Contact Us</h2>
    <p class="text-gray-700">Follow us on our social platforms or reach out via email.</p>
  </section>

  <!-- Contact Info and Social Icons -->
  <div class="container mx-auto p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Contact Info -->
    <div class="contact-info">
      <h3 class="text-xl font-semibold mb-4">Our Office</h3>
      <p class="text-gray-700 mb-2">Guntur Municipal Corporation</p>
      <p class="text-gray-700 mb-2">Main Road, Arundelpet, Guntur - 522002</p>
      <p class="text-gray-700 mb-2">Phone: +91 12345 67890</p>
      <p class="text-gray-700 mb-2">Email: support@gunturmc.in</p>
      <div class="vertical-image-container mt-4">
        <img src="styles/office-building.jpg" alt="Municipal Office Image">
      </div>
    </div>

    <!-- Social Media Links -->
    <div class="contact-info">
      <h3 class="text-xl font-semibold mb-4">Connect with Us</h3>
      <p class="text-gray-700 mb-4">Follow us on social media for updates and news.</p>
      <div class="icon-container flex justify-center">
        <a href="mailto:support@gunturmc.in" aria-label="Email">
          <i class="fas fa-envelope"></i>
        </a>
        <a href="https://www.facebook.com" target="_blank" aria-label="Facebook">
          <i class="fab fa-facebook"></i>
        </a>
        <a href="https://www.twitter.com" target="_blank" aria-label="Twitter">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="https://www.instagram.com" target="_blank" aria-label="Instagram">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="https://www.linkedin.com" target="_blank" aria-label="LinkedIn">
          <i class="fab fa-linkedin"></i>
        </a>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-green-600 text-white p-4 text-center mt-8">
    <p>&copy; 2025 Guntur Municipal Corporation. All rights reserved.</p>
  </footer>
</body>
</html>
