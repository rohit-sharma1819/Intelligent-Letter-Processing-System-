<!-- <footer style="background-color: black; color: white; padding: 20px;">
    <div style="text-align: center;">
        <h3>Office Details</h3>
        <p>123 Business Avenue, Suite 456</p>
        <p>City, State, ZIP</p>
        <p>Email: office@example.com | Phone: +1-234-567-8900</p>
    </div>
    <hr style="border-color: gray;">
    <div style="text-align: center;">
        <h3>Developers</h3>
        <ul style="list-style-type: none; padding: 0;">
            <li>Yadla Harish - Phone: +91 </li>
            <li>Vulchi Sasank Sai - Phone: +91 9490423392</li>
        </ul>
    </div>
</footer> -->
<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Footer Design</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
   
        footer {
            background: linear-gradient(90deg, #3a3a3a, #1a1a1a);
            color: white;
            text-align: center;
            padding: 30px 20px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 -5px 15px rgba(0, 0, 0, 0.5);
        }

        footer p {
            margin: 15px 0;
            font-size: 1.2em;
            letter-spacing: 1px;
        }

        footer .developer {
            font-weight: 600;
            font-size: 1.4em;
            /* background: linear-gradient(90deg, #ffcc33, #ffffff, #ffcc33); */
            background: linear-gradient(90deg, #ffcc33,rgb(181, 168, 17), #ffcc33);

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
            position: relative;
            cursor: pointer;
            transition: transform 0.3s ease, text-shadow 0.3s ease;
        }

        footer .developer:hover {
            transform: scale(1.1);
            text-shadow: 0 0 15px rgba(255, 204, 51, 0.9), 0 0 30px rgba(255, 204, 51, 0.7);
            animation: glow 1.5s infinite;
        }

        footer .contact {
            font-size: 1em;
            color: #ffcc33;
            text-shadow: 0 0 5px rgba(255, 204, 51, 0.7);
            transition: color 0.3s ease, text-shadow 0.3s ease;
        }

        footer .contact:hover {
            color: #ffffff;
            text-shadow: 0 0 15px rgba(255, 255, 255, 0.8);
        }

        footer .decoration {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        footer .decoration span {
            position: absolute;
            display: block;
            width: 30px;
            height: 30px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            animation: float 6s infinite;
        }

        footer .decoration span:nth-child(1) {
            top: 10%;
            left: 20%;
            animation-delay: 0s;
            animation-duration: 10s;
        }

        footer .decoration span:nth-child(2) {
            top: 50%;
            left: 70%;
            animation-delay: 2s;
            animation-duration: 8s;
        }

        footer .decoration span:nth-child(3) {
            top: 80%;
            left: 40%;
            animation-delay: 4s;
            animation-duration: 12s;
        }

        @keyframes glow {
            0%, 100% {
                text-shadow: 0 0 15px rgba(255, 204, 51, 0.8), 0 0 30px rgba(255, 204, 51, 0.6);
            }
            50% {
                text-shadow: 0 0 20px rgba(255, 204, 51, 1), 0 0 40px rgba(255, 204, 51, 0.9);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
                opacity: 1;
            }
            50% {
                transform: translateY(-20px);
                opacity: 0.8;
            }
        }
    </style>
</head>
<body>
    <footer>
        <p class="developer">Developed By ||<span style="border-bottom:2px solid red;"> Yadla Harish </span>|| Sasank || Srinivas</p>
        <p class="contact">Contact: 9391449460 | 6301611379</p>
        <div class="decoration">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </footer>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <title>GMC Footer</title>
</head>
<body>
    <footer class="bg-gray-900 text-gray-100">
        <div class="max-w-7xl mx-auto px-4 py-8">
            <!-- Main Footer Content -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Contact Information -->
                <div class="space-y-4">
                    <h3 class="text-xl font-bold mb-4">Guntur Municipal Corporation</h3>
                    <div class="flex items-center gap-2">
                        <i data-feather="map-pin"></i>
                        <p>Main Road, Guntur-522002, Andhra Pradesh</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <i data-feather="phone"></i>
                        <p>+91 863 2235081</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <i data-feather="mail"></i>
                        <p>commissioner@gmc.gov.in</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <i data-feather="clock"></i>
                        <p>Mon - Sat: 10:00 AM - 5:00 PM</p>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-blue-400 transition">About GMC</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">Online Services</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">Pay Taxes</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">Tenders</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">Grievance Redressal</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition">RTI</a></li>
                    </ul>
                </div>

                <!-- Connect With Us -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Connect With Us</h3>
                    <div class="space-y-4">
                        <p>Follow us on social media for updates and announcements</p>
                        <div class="flex gap-4">
                            <a href="#" class="hover:text-blue-400 transition">
                                <i data-feather="facebook"></i>
                            </a>
                            <a href="#" class="hover:text-blue-400 transition">
                                <i data-feather="twitter"></i>
                            </a>
                            <a href="#" class="hover:text-blue-400 transition">
                                <i data-feather="instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="mt-8 pt-8 border-t border-gray-700">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <p>© 2025 Guntur Municipal Corporation. All rights reserved.</p>
                    <div class="flex gap-4">
                        <a href="#" class="hover:text-blue-400 transition">Privacy Policy</a>
                        <a href="#" class="hover:text-blue-400 transition">Terms of Use</a>
                        <a href="#" class="hover:text-blue-400 transition">Sitemap</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Initialize Feather Icons
        feather.replace();
    </script>
</body>
</html>