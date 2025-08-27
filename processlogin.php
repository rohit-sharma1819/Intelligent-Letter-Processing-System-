<?php
session_start(); // Start the session to manage user login

// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'gmc_guntur_pro';

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize user inputs to prevent SQL injection or XSS
    $username = mysqli_real_escape_string($conn, $_POST['username'] ?? '');
    $password = mysqli_real_escape_string($conn, $_POST['password'] ?? '');

    if ($username && $password) {
        // Check if user exists in the database
        $stmt = $conn->prepare("SELECT id, password FROM entry_login WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $stored_password);

        if ($stmt->num_rows > 0) {
            // User exists, compare passwords (plain-text comparison)
            $stmt->fetch();
            if ($password == $stored_password) {
                // Password is correct, start the session and redirect to a protected page
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $username;
                header("Location: index.php"); // Redirect to the protected page
                exit;
            } else {
                // Invalid password
                $_SESSION['error'] = "Invalid username or password.";
                header("Location: login1.php");
                exit;
            }
        } else {
            // User not found
            $_SESSION['error'] = "User not found.";
            header("Location: login1.php");
            exit;
        }

        $stmt->close();
    } else {
        // Missing input
        $_SESSION['error'] = "Please fill in all fields.";
        header("Location: login1.php");
        exit;
    }
}

$conn->close();
?>
