



<?php include 'not.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title>Analytics Filter</title>
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center">Analytics Dashboard</h3>
        <form id="analyticsForm" class="mt-4">
            <div class="row">
                <!-- Date Filters -->
                <div class="col-md-4">
                    <label for="startDate" class="form-label">Start Date</label>
                    <input type="date" id="startDate" name="startDate" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="endDate" class="form-label">End Date</label>
                    <input type="date" id="endDate" name="endDate" class="form-control">
                </div>

                <!-- Type of Letter Dropdown -->
                <div class="col-md-4">
                    <label for="typeOfLetter" class="form-label">Type of Letter</label>
                    <select id="typeOfLetter" name="typeOfLetter" class="form-select">
                        <option value="">All</option>
                        <option value="official">Official</option>
                        <option value="personal">Personal</option>
                        <!-- Add more types as needed -->
                    </select>
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="button" id="filterButton" class="btn btn-primary">Filter Data</button>
            </div>
        </form>

        <!-- Chart Placeholder -->
        <div class="mt-5">
            <canvas id="analyticsChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.getElementById('filterButton').addEventListener('click', function () {
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            const typeOfLetter = document.getElementById('typeOfLetter').value;

            fetch(`fetch_analytics.php?startDate=${startDate}&endDate=${endDate}&typeOfLetter=${typeOfLetter}`)
                .then(response => response.json())
                .then(data => {
                    // Update the chart
                    const ctx = document.getElementById('analyticsChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'bar', // Change the chart type if needed
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: 'Number of Letters',
                                data: data.values,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
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
                });
        });
    </script>
</body>
</html>
