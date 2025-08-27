

<?php include 'not.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navigation Bar</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f9f9f9; /* Soft light gray background */
            color: #333; /* Neutral text color */
        }

        /* Navbar Container */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            /* background: linear-gradient(90deg, #5b86e5, #36d1dc); Cool gradient */
            background-color:white;
            /* color: white; */
            color: black;

            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Logo Section */
        .navbar-brand {
            display: flex;
            align-items: center;
            font-size: 20px;
            font-weight: 500;
        }

        .navbar-brand .material-icons {
            font-size: 28px;
            margin-right: 10px;
        }

        /* Navbar Links for Desktop */
        .navbar-links {
            display: flex;
            gap: 20px;
        }

        .navbar-links a {
            /* color: #fff; */
            color: black;

            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            position: relative;
            padding: 5px 0;
            transition: color 0.3s, transform 0.3s;
        }

        .navbar-links a:hover {
            /* color: #fdfd96; Soft yellow hover */
        }

        .navbar-links a.active::after {
            content: '';
            display: block;
            width: 100%;
            height: 3px;
            background: #fdfd96; /* Highlight color */
            position: absolute;
            bottom: -2px;
            left: 0;
        }

        /* Hamburger Icon for Mobile */
        .hamburger {
            display: none;
            font-size: 28px;
            cursor: pointer;
            /* color: white; */
            color:black;
            z-index: 20;
            
        }

        /* Dropdown Menu for Mobile */
        .dropdown-menu {
            display: none;
            position: fixed;
            top: 60px; /* Below the navbar */
            left: 0;
            width: 100%;
            background: white;
            /* background-color:black; */
            color:black;

            flex-direction: column;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            padding: 20px 0;
            z-index: 2;
        }

        .dropdown-menu a {
            color: #333;
            font-size: 18px;
            text-decoration: none;
            padding: 10px 20px;
            transition: background 0.3s ease, color 0.3s ease;
            color:black;

        }

        .dropdown-menu a:hover {
            background: #f0f0f0;
            color: #5b86e5;
        }

        .dropdown-menu.active {
            display: flex;
            flex-direction: column;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar-links {
                display: none; /* Hide links on small screens */
            }

            .hamburger {
                display: block; /* Show hamburger menu */
            }
        }

        @media (min-width: 769px) {
            .dropdown-menu {
                display: none; /* Hide dropdown on larger screens */
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <!-- Brand -->
        <div class="navbar-brand">
            <span class="material-icons">home</span> GMC Portal
        </div>

        <!-- Links for Desktop -->
        <div class="navbar-links">
            <!-- <a href="#home" class="active">Home</a> -->
            <!-- <a href="#about">About</a>
            <a href="#services">Services</a>
            <a href="#contact">Contact</a> -->
            <a href="home.php"style="border-bottom:2px solid red;">Home</a>

            <a href="add_letter1.php">Add new letter</a>
            <a href="view_letter.php">view_letter</a>
            <a href="test.php">view_Saved</a>

            <a href="fetch_analytics.php">DashBoard</a>
            <a href="contactus.php">Contact</a>
        </div>

        <!-- Hamburger Icon for Mobile -->
        <span class="material-icons hamburger">menu</span>

        <!-- Dropdown Menu for Mobile -->
        <div class="dropdown-menu">
            <!-- <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#services">Services</a>
            <a href="#contact">Contact</a> -->
            <a href="home.php"style="border-bottom:2px solid red;">Home</a>

            <a href="add_letter1.php">Add new letter</a>
            <a href="view_letter.php">view_letter</a>
            <a href="test.php">view_Saved</a>

            <a href="fetch_analytics.php">DashBoard</a>
            <a href="contactus.php">Contact</a>
        </div>
    </nav>

    <script>
        // JavaScript for Responsive Hamburger Menu
        const hamburger = document.querySelector('.hamburger');
        const dropdownMenu = document.querySelector('.dropdown-menu');

        hamburger.addEventListener('click', () => {
            dropdownMenu.classList.toggle('active');
        });
    </script>

</body>
</html>
