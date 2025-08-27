<?php
// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    // Get the letter ID from the POST data
    $letterId = $_POST['id'];

    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'gmc_guntur_pro');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update the 'seen' column to 1 where the ID matches
    $sql = "UPDATE gmc_letters SET seen = 1 WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('Error preparing the SQL query: ' . $conn->error);
    }

    // Bind the ID parameter
    $stmt->bind_param('i', $letterId);

    // Execute the update query
    if ($stmt->execute()) {
        echo "Letter marked as seen.";
    } else {
        echo "Error updating letter: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
