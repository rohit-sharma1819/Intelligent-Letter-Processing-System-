<?php
if (isset($_POST['id'], $_POST['column'], $_POST['value'])) {
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'gmc_guntur_pro');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize and prepare values
    $id = (int)$_POST['id']; // Make sure the ID is an integer
    $column = $conn->real_escape_string($_POST['column']); // Sanitize column name
    $value = $conn->real_escape_string($_POST['value']); // Sanitize new value

    // Update query
    $query = "UPDATE gmc_letters SET $column = '$value' WHERE id = $id";

    if ($conn->query($query) === TRUE) {
        echo "Success";  // Successful update message
    } else {
        echo "Error: " . $conn->error;  // Error handling
    }

    $conn->close();
}
?>
