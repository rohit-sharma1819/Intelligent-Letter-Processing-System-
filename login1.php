
<?php include("loginstyles.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Animated Login Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="loginstyles.css"rel="stylesheet">
</head>
<body>
    <div class="logo"></div>
    <h1 class="main-heading">Guntur Municipal Corporation</h1>
    <div class="login-container">
        <div class="login-header">Login</div>
        <form method="POST"action="processlogin.php"class="login-form">
            
            Username
            <input type="text" placeholder="username"name="username"id="username" required>
                Password
            <input type="password" placeholder="Enter your password"name="password"id="password" required>

            <button type="submit">Login</button>
            <div class="forgot-password">
                <a href="#">Forgot Password?</a>
            </div>
        </form>
    </div>
    <div class="animation">
        <span></span>
        <span></span>
        <span></span>
    </div>
</body>
</html>
