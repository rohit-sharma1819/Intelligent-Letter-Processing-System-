<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>


* {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f7f9fc; /* Light background */
            color: #333;
            line-height: 1.6;
        }

        /* Header Styling */
        .header {
            background-color: #264653; /* Deep navy */
            color: white;
            text-align: center;
            padding: 20px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: -1;
        }

        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .gmc-logo {
            width: 80px;
            margin-right: 15px;
        }

        .header h1 {
            font-size: 28px;
            font-weight: 500;
            text-transform: uppercase;
        }

        /* Main Content Styling */
        .main-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 30px;
            max-width: 1200px;
            margin: 30px auto;
        }

        /* Card Styling */
        .card {
            width: 45%;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            color: white;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        /* Add New Letter Card */
        .add-letter {
            background: linear-gradient(135deg, #f4a261, #e76f51); /* Orange gradient */
            /* background: linear-gradient(135deg, #28a745, #218838); Green gradient for Add New Letter */

        }

        /* View Letters Card */
        .view-letters {
            background: linear-gradient(135deg, #2a9d8f, #1b6a73); /* Teal gradient */
            /* background: linear-gradient(135deg, #007bff, #0056b3); Blue gradient for View Letters */

        }

        .card .material-icons {
            font-size: 60px;
            margin-bottom: 15px;
        }

        .card h2 {
            font-size: 22px;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .card p {
            font-size: 14px;
            margin-bottom: 20px;
        }

        .card a {
            display: inline-block;
            padding: 10px 20px;
            background-color: rgba(255, 255, 255, 0.8);
            color: #264653;
            text-decoration: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 500;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .card a:hover {
            background-color: rgba(255, 255, 255, 1);
            color: #e76f51;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-content {
                flex-direction: column;
                align-items: center;
            }

            .card {
                width: 90%;
                margin-bottom: 20px;
            }
        }
</style>
</head>
<body>
<header class="header">
        <div class="logo-container">
            <img src="styles/images-removebg-preview.png" alt="GMC Logo" class="gmc-logo">
            <h1>Guntur Municipal Corporation</h1>
        </div>
    </header>
</body>
</html>