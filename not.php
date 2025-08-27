<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login1.php");
    exit;
}

// User is logged in, proceed with the page content
?>
