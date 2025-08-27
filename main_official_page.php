<?php
session_start();

// Check if the user is logged in and session variables are set
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    header('Location: login.php');
    exit();
}

$user_role = $_SESSION['role'];  // Now it's safe to access $_SESSION['role']

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'gmc_guntur_pro');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch details based on the user's role (class)
$letters = [];
if ($user_role) {
    $stmt = $conn->prepare("SELECT * FROM gmc_letters WHERE class = ?");
    $stmt->bind_param('s', $user_role);
    $stmt->execute();
    $result_letters = $stmt->get_result();
    while ($row = $result_letters->fetch_assoc()) {
        $letters[] = $row;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Official Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h1>Welcome to the Main Official Page</h1>
    <p>You are logged in as: <?php echo $_SESSION['username']; ?></p>
    <p>Role (Class): <?php echo $user_role; ?></p>

    <?php if (count($letters) > 0): ?>
        <h2>Details for Class: <?php echo $user_role; ?></h2>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Entry Date</th>
                    <th>Type of Letter</th>
                    <th>Content</th>
                    <th>Subject</th>
                    <th>Received From</th>
                    <th>Reference</th>
                    <th>Received By GMC</th>
                    <th>Received Date</th>
                    <th>Allocated Date</th>
                    <th>Sent To</th>
                    <th>Class</th>
                    <th>Sub Class</th>
                    <th>Sub Sub Class</th>
                    <th>Received By</th>
                    <th>Action Taken</th>
                    <th>Acknowledgement</th>
                    <th>Letter Upload Path</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($letters as $letter): ?>
                    <tr>
                        <td><?php echo $letter['id']; ?></td>
                        <td><?php echo $letter['entry_date']; ?></td>
                        <td><?php echo $letter['type_of_letter']; ?></td>
                        <td><?php echo $letter['content']; ?></td>
                        <td><?php echo $letter['subject']; ?></td>
                        <td><?php echo $letter['received_from']; ?></td>
                        <td><?php echo $letter['reference']; ?></td>
                        <td><?php echo $letter['received_by_gmc']; ?></td>
                        <td><?php echo $letter['received_date']; ?></td>
                        <td><?php echo $letter['allocated_date']; ?></td>
                        <td><?php echo $letter['sent_to']; ?></td>
                        <td><?php echo $letter['class']; ?></td>
                        <td><?php echo $letter['subclass']; ?></td>
                        <td><?php echo $letter['subsubclass']; ?></td>
                        <td><?php echo $letter['received_by']; ?></td>
                        <td><?php echo $letter['action_taken']; ?></td>
                        <td><?php echo $letter['acknowledgement']; ?></td>
                        <td>
<p>Image Path: <?php echo $letter['letter_upload_path']; ?></p>
<a href="../<?php echo $letter['letter_upload_path']; ?>" target="_blank">
    <img src="../<?php echo $letter['letter_upload_path']; ?>" alt="Letter Image" width="100" height="100" class="update-seen" data-id="<?php echo $letter['id']; ?>">
</a>
                        </td>
                        <td><?php echo $letter['created_at']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No records found for the selected class.</p>
    <?php endif; ?>

    <script>
        $(document).ready(function() {
            $('.update-seen').on('click', function() {
                var letterId = $(this).data('id');
                $.ajax({
                    url: 'update_seen.php',
                    type: 'POST',
                    data: { id: letterId },
                    success: function(response) {
                        alert('Letter marked as seen.');
                    },
                    error: function() {
                        alert('An error occurred while updating the letter status.');
                    }
                });
            });
        });
    </script>
</body>
</html>
