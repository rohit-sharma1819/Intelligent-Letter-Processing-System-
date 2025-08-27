



<?php include 'not.php'?>
<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'gmc_guntur_pro';

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch distinct type_of_letter values for dropdown
$typeOfLetterOptions = [];
$typeQuery = "SELECT DISTINCT type_of_letter FROM gmc_letters";
$typeResult = $conn->query($typeQuery);
if ($typeResult->num_rows > 0) {
    while ($row = $typeResult->fetch_assoc()) {
        $typeOfLetterOptions[] = $row['type_of_letter'];
    }
}

// If the request is POST (for fetching data)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $startDate = $_POST['start_date'] ?? null;
    $endDate = $_POST['end_date'] ?? null;
    $typeOfLetter = $_POST['type_of_letter'] ?? null;

    // Validate input
    if (!$startDate || !$endDate) {
        echo json_encode(['error' => 'Start and end dates are required.']);
        exit;
    }

    // Build SQL query
    $query = "SELECT type_of_letter, COUNT(*) AS count FROM gmc_letters WHERE received_date BETWEEN ? AND ?";
    $params = [$startDate, $endDate];
    $types = "ss"; // For date params

    if ($typeOfLetter) {
        $query .= " AND type_of_letter = ?";
        $params[] = $typeOfLetter;
        $types .= "s";
    }
    $query .= " GROUP BY type_of_letter";

    // Prepare and execute the statement
    $stmt = $conn->prepare($query);
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch and prepare data for visualization
    $response = ['labels' => [], 'values' => []];
    while ($row = $result->fetch_assoc()) {
        $response['labels'][] = $row['type_of_letter'];
        $response['values'][] = $row['count'];
    }

    echo json_encode($response);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Letter Analytics</title>
</head>
<body>
<?php include 'header.php'?>

    <?php include 'nav.php'?>
    <div class="container mt-5">
        <h2 class="text-center">Letter Analytics Dashboard</h2>
        <!-- Filter Form -->
        <form id="filterForm" class="mt-4">
            <div class="row">
                <!-- Start Date -->
                <div class="col-md-4">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" id="start_date" name="start_date" class="form-control" required>
                </div>
                <!-- End Date -->
                <div class="col-md-4">
                    <label for="end_date" class="form-label">End Date</label>
                    <input type="date" id="end_date" name="end_date" class="form-control" required>
                </div>
                <!-- Type of Letter -->
                <div class="col-md-4">
                    <label for="type_of_letter" class="form-label">Type of Letter</label>
                    <select id="type_of_letter" name="type_of_letter" class="form-select">
                        <option value="">All</option>
                        <?php foreach ($typeOfLetterOptions as $type): ?>
                            <option value="<?= htmlspecialchars($type) ?>"><?= htmlspecialchars($type) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="text-center mt-4">
                <button type="button" id="fetchData" class="btn btn-primary">Fetch Analytics</button>
            </div>
        </form>
        <!-- Chart Placeholder -->
        <div class="mt-5">
            <canvas id="analyticsChart"></canvas>
        </div>
    </div>

    <script>
        document.getElementById('fetchData').addEventListener('click', function () {
            const formData = new FormData(document.getElementById('filterForm'));
            fetch('', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                    return;
                }

                // Check if data is returned
                if (!data.labels || !data.values) {
                    alert('No data found for the given criteria.');
                    return;
                }

                // Update chart
                const ctx = document.getElementById('analyticsChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: 'Number of Letters',
                            data: data.values,
                            backgroundColor: 'rgba(54, 162, 235, 0.5)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            })
            .catch(error => {
                alert('Error fetching data: ' + error);
            });
        });
    </script>
</body>
</html>


<?php include 'footer.php'?>