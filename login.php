<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            background: linear-gradient(135deg, #f7e8d7, #d6c4b2, #8c6d62);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #3e2723;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            animation: fadeInUp 1s ease-out;
        }

        .login-container h1 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
            text-align: center;
            color: #5d4037;
        }

        .login-container label {
            font-size: 14px;
            font-weight: 500;
            display: block;
            margin-bottom: 8px;
            color: #3e2723;
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #c6a992;
            border-radius: 8px;
            background: #fff7f2;
            color: #5d4037;
            outline: none;
            transition: border 0.3s, background 0.3s;
        }

        .login-container input:focus {
            background: #fff0e6;
            border: 1px solid #a67c52;
        }

        .login-container button {
            width: 100%;
            padding: 12px;
            background: #a67c52;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 700;
            color: #fff;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        .login-container button:hover {
            background: #b9895d;
            transform: translateY(-2px);
        }

        .login-container button:active {
            background: #8d653f;
            transform: translateY(1px);
        }

        .error-msg {
            margin-top: 10px;
            background: rgba(244, 67, 54, 0.2);
            color: #d32f2f;
            padding: 10px;
            border-radius: 6px;
            text-align: center;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 500px) {
            .login-container {
                padding: 20px 30px;
            }
            .login-container h1 {
                font-size: 20px;
            }
            .login-container button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Welcome Back</h1>
        <form method="POST" action="login.php">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" placeholder="Enter your username" required>
            
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Enter your password" required>
            
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
