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

body {
    font-family: 'Roboto', sans-serif;
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    flex-direction: column;
}

.main-heading {
    font-size: 2.5em;
    font-weight: 700;
    color: white;
    margin-bottom: 20px;
    text-align: center;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
    position: relative;
    display: inline-block;
}

.main-heading:hover {
    background: linear-gradient(90deg, #ffffff, #ffcc33, #ffffff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: shine 1s infinite;
}

@keyframes shine {
    0% {
        background-position: -100%;
    }
    100% {
        background-position: 200%;
    }
}

.logo {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    background: url('styles/images-removebg-preview.png') no-repeat center center;
    background-size: cover;
    margin-bottom: 20px;
}

.login-container {
    background: rgba(255, 255, 255, 0.95);
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    overflow: hidden;
    width: 400px;
    max-width: 100%;
    padding: 30px;
}

.login-header {
    text-align: center;
    font-size: 2em;
    font-weight: 700;
    color: #0f2027;
    margin-bottom: 20px;
}

.login-form {
    display: flex;
    flex-direction: column;
}

.login-form input {
    width: 100%;
    padding: 15px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 10px;
    font-size: 1em;
    outline: none;
    transition: all 0.3s ease;
}

.login-form input:focus {
    border-color: #0f2027;
    box-shadow: 0 0 8px rgba(15, 32, 39, 0.6);
}

.login-form button {
    padding: 15px;
    background: linear-gradient(135deg, #0f2027, #203a43);
    color: white;
    border: none;
    border-radius: 10px;
    font-size: 1em;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 10px;
}

.login-form button:hover {
    background: linear-gradient(135deg, #203a43, #2c5364);
    transform: scale(1.05);
}

.login-form .forgot-password {
    text-align: center;
    margin-top: 15px;
    font-size: 0.9em;
}

.login-form .forgot-password a {
    color: #0f2027;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
}

.login-form .forgot-password a:hover {
    color: #203a43;
}

.animation {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
}

.animation span {
    position: absolute;
    display: block;
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 50%;
    animation: float 8s infinite;
}

.animation span:nth-child(1) {
    top: 10%;
    left: 15%;
    animation-delay: 0s;
    animation-duration: 12s;
}

.animation span:nth-child(2) {
    top: 40%;
    left: 75%;
    animation-delay: 2s;
    animation-duration: 10s;
}

.animation span:nth-child(3) {
    top: 70%;
    left: 30%;
    animation-delay: 4s;
    animation-duration: 9s;
}

@keyframes float {
    0%, 100% {
        transform: translateY(0);
        opacity: 1;
    }
    50% {
        transform: translateY(-30px);
        opacity: 0.8;
    }
}
</style>
</head>
<body>
    
</body>
</html>