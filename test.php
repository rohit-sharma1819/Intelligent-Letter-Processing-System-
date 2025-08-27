                <th>Subject</th>
                <?php include 'not.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Letters</title>
    <style>
        /* Style for "not seen" letters (red)
.not-seen {
    background-color: red;   /* Red color for "not seen" *
    color: white;  /* Optional: white text on red background 
}

/* Style for "seen" letters (green) *
.seen {
    background-color: green;  /* Green color for "seen" *
    color: white;  /* Optional: white text on green background *
} */

/* Style for "not seen" letters (soft red) */
.not-seen {
    background-color: #f8d7da;   /* Soft red color for "not seen" */
    color: #721c24;  /* Darker text color for readability */
}

/* Style for "seen" letters (soft green) */
.seen {
    background-color: #d4edda;  /* Soft green color for "seen" */
    color: #155724;  /* Darker text color for readability */
}



        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .search-container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .form-group {
            flex: 1 1 calc(50% - 15px);
            display: flex;
            flex-direction: column;
        }
        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group select {
            height: 35px;
        }
        .form-actions {
            flex: 1 1 100%;
            text-align: center;
        }
        .form-actions button {
            padding: 10px 20px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-actions button:hover {
            background: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <?php include'header.php'?>
    <?php include 'nav.php'?>
    <div class="search-container">
        <h2>Search Letters</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="search">Keyword</label>
                <input type="text" id="search" name="search" placeholder="Search content, subject, etc.">
            </div>
            <div class="form-group">
                <label for="entryDate">Entry Date</label>
                <input type="date" id="entryDate" name="entryDate">
            </div>
            <div class="form-group">
                <label for="typeOfLetter">Type of Letter</label>
                <select id="typeOfLetter" name="typeOfLetter">
                    <option value="">-- Select --</option>
                    <option value="circular">Circular</option>
                    <option value="letter">Letter</option>
                    <option value="proceedings">Proceedings</option>
                    <option value="representations">Representations</option>
                    <option value="grievance">Grievance</option>
                    <option value="courtCase">Court Case</option>
                    <option value="other">Other</option>
                    <option value="college">College</option>
                </select>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <input type="text" id="content" name="content" placeholder="Search content">
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" placeholder="Search subject">
            </div>
            <div class="form-group">
                <label for="receivedFrom">Received From</label>
                <input type="text" id="receivedFrom" name="receivedFrom" placeholder="Sender's name or organization">
            </div>
            <div class="form-group">
                <label for="reference">Reference</label>
                <input type="text" id="reference" name="reference" placeholder="Search reference">
            </div>
            <div class="form-group">
                <label for="receivedByGMC">Received By GMC</label>
                <input type="text" id="receivedByGMC" name="receivedByGMC" placeholder="Recipient at GMC">
            </div>
            <div class="form-group">
                <label for="receivedDate">Received Date</label>
                <input type="date" id="receivedDate" name="receivedDate">
            </div>
            <div class="form-group">
                <label for="allocatedDate">Allocated Date</label>
                <input type="date" id="allocatedDate" name="allocatedDate">
            </div>
            <div class="form-group">
                <label for="action">Action</label>
                <input type="text" id="action" name="action" placeholder="Action taken">
            </div>
            <div class="form-group">
                <label for="acknowledgement">Acknowledgement</label>
                <input type="text" id="acknowledgement" name="acknowledgement" placeholder="Acknowledgement details">
            </div>
            <!-- <div class="form-group">
                <label for="class">Class</label>
                <input type="text" id="class" name="class" placeholder="Class name">
            </div>
            <div class="form-group">
                <label for="subclass">Subclass</label>
                <input type="text" id="subclass" name="subclass" placeholder="Subclass">
            </div>
            <div class="form-group">
                <label for="subsubclass">Subsubclass</label>
                <input type="text" id="subsubclass" name="subsubclass" placeholder="Subsubclass">
            </div> -->


            <div class="form-group">
            <select id="sectionDropdown"name ="class"id="class">
            <option value="">Select Section</option>
        </select>
        <select id="subSectionDropdown"name ="subclass"id="subclass">
            <option value="">Select Sub Section</option>
        </select>
        <select id="nestedDropdown"name ="subsubclass"style="display: none;"class="subsubclass">
            <option value="">Select Nested Option</option>
        </select>
            </div>













            <div class="form-actions">
                <button type="submit" name="submit">Search</button>
            </div>
        </form>
        <script>
        // Data for sections, sub-sections, and nested options
        const data = {
            "Accounts": ["Accountant 1", "Accountant 2", "Examiner Of Accounts", "Others"],
            "Election": ["AC", "Ele Supdt", "Others"],
            "Engineering": {
                "EE": ["EE1", "EE2", "EE3", "EE4", "Electricals", "Vehicles"],
                "SE": [], "ADH": [], "Supdt": [], "Others": []
            },
            "Establishment": {
                "DC": ["DC1", "DC2", "DC3"], "AC": [], "Manager": [], "Supdt": [], "Others": []
            },
            "GSWS": {
                "DC": ["DC1", "DC2", "DC3"], "Supdt": [], "Others": []
            },
            "Legal Cell": ["Supdt", "Others"],
            "Public Health": {
                "SS": ["SS1", "SS2", "SS3", "SS4"], "CMOH": [], "MHO": [], "DSO": [],
                "Supdt": [], "Others": [], "Veterinary Doctor": []
            },
            "Revenue": {
                "RO": ["RO1", "RO2", "RO3", "RO4"],
                "Revenue Supdt": [], "Others": []
            },
            "Town Planning": {
                "ACP": ["ASP1", "ASP2"], "CP": [], "Supdt": [], "Others": []
            },
            "UPA Cell": {
                "DC": ["DC1", "DC2", "DC3"], "PO": [], "Supdt": [], "Others": []
            }
        };

        const sectionDropdown = document.getElementById("sectionDropdown");
        const subSectionDropdown = document.getElementById("subSectionDropdown");
        const nestedDropdown = document.getElementById("nestedDropdown");

        // Populate the Section dropdown
        for (let section in data) {
            let option = document.createElement("option");
            option.value = section;
            option.textContent = section;
            sectionDropdown.appendChild(option);
        }

        // Event listener for Section dropdown
        sectionDropdown.addEventListener("change", function() {
            subSectionDropdown.innerHTML = '<option value="">Select Sub Section</option>';
            nestedDropdown.style.display = 'none';
            nestedDropdown.innerHTML = '<option value="">Select Nested Option</option>';

            const selectedSection = sectionDropdown.value;
            const subSections = data[selectedSection];

            // Populate the Sub Section dropdown based on selected Section
            if (selectedSection && subSections) {
                if (Array.isArray(subSections)) { // Check if sub-sections are an array (no nested options)
                    subSections.forEach(subSection => {
                        let option = document.createElement("option");
                        option.value = subSection;
                        option.textContent = subSection;
                        subSectionDropdown.appendChild(option);
                    });
                } else { // If sub-sections have nested options
                    
                    for (let sub in subSections) {
                        let option = document.createElement("option");
                        option.value = sub;
                        option.textContent = sub;
                        subSectionDropdown.appendChild(option);
                    }
                }
            }
        });

        // Event listener for Sub Section dropdown to display nested options
        subSectionDropdown.addEventListener("change", function() {
            nestedDropdown.innerHTML = '<option value="">Select Nested Option</option>';
            const selectedSection = sectionDropdown.value;
            const selectedSubSection = subSectionDropdown.value;

            if (selectedSection && selectedSubSection && data[selectedSection][selectedSubSection]) {
                const nestedOptions = data[selectedSection][selectedSubSection];

                if (nestedOptions.length > 0) {
                    nestedDropdown.style.display = 'inline';
                    nestedOptions.forEach(nested => {
                        let option = document.createElement("option");
                        option.value = nested;
                        option.textContent = nested;
                        nestedDropdown.appendChild(option);
                    });
                } else {
                    nestedDropdown.style.display = 'none';
                }
            } else {
                nestedDropdown.style.display = 'none';
            }
        });
    </script>
    </div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'gmc_guntur_pro');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieving form inputs
    $search = $conn->real_escape_string($_POST['search'] ?? '');
    $entryDate = $conn->real_escape_string($_POST['entryDate'] ?? '');
    $typeOfLetter = $conn->real_escape_string($_POST['typeOfLetter'] ?? '');
    $content = $conn->real_escape_string($_POST['content'] ?? '');
    $subject = $conn->real_escape_string($_POST['subject'] ?? '');
    $receivedFrom = $conn->real_escape_string($_POST['receivedFrom'] ?? '');
    $reference = $conn->real_escape_string($_POST['reference'] ?? '');
    $receivedByGMC = $conn->real_escape_string($_POST['receivedByGMC'] ?? '');
    $receivedDate = $conn->real_escape_string($_POST['receivedDate'] ?? '');
    $allocatedDate = $conn->real_escape_string($_POST['allocatedDate'] ?? '');
    $action = $conn->real_escape_string($_POST['action'] ?? '');
    $acknowledgement = $conn->real_escape_string($_POST['acknowledgement'] ?? '');

    // If the dropdowns have values
    $class = $conn->real_escape_string($_POST['class'] ?? '');
    $subclass = $conn->real_escape_string($_POST['subclass'] ?? '');
    $subsubclass = $conn->real_escape_string($_POST['subsubclass'] ?? '');

    // SQL query
    $query = "SELECT * FROM gmc_letters WHERE 1=1";

    if (!empty($search)) {
        $query .= " AND (content LIKE '%$search%' OR subject LIKE '%$search%')";
    }
    if (!empty($entryDate)) {
        $query .= " AND entry_date = '$entryDate'";
    }
    if (!empty($typeOfLetter)) {
        $query .= " AND type_of_letter = '$typeOfLetter'";
    }
    if (!empty($content)) {
        $query .= " AND content LIKE '%$content%'";
    }
    if (!empty($subject)) {
        $query .= " AND subject LIKE '%$subject%'";
    }
    if (!empty($receivedFrom)) {
        $query .= " AND received_from LIKE '%$receivedFrom%'";
    }
    if (!empty($reference)) {
        $query .= " AND reference LIKE '%$reference%'";
    }
    if (!empty($receivedByGMC)) {
        $query .= " AND received_by_gmc LIKE '%$receivedByGMC%'";
    }
    if (!empty($receivedDate)) {
        $query .= " AND received_date = '$receivedDate'";
    }
    if (!empty($allocatedDate)) {
        $query .= " AND allocated_date = '$allocatedDate'";
    }
    if (!empty($action)) {
        $query .= " AND action LIKE '%$action_taken%'";
    }
    if (!empty($acknowledgement)) {
        $query .= " AND acknowledgement LIKE '%$acknowledgement%'";
    }
    if (!empty($class)) {
        $query .= " AND class = '$class'";
    }
    if (!empty($subclass)) {
        $query .= " AND subclass = '$subclass'";
    }
    if (!empty($subsubclass)) {
        $query .= " AND subsubclass = '$subsubclass'";
    }

    $result = $conn->query($query);

    // Display results
    if ($result && $result->num_rows > 0) {
//         echo "<table>
//                 <tr>
//                     <th>ID</th>
//                     <th>Entry Date</th>
//                     <th>Type Of Letter</th>
//                     <th>Subject</th>
//                     <th>Received From</th>
//                     <th>Allocated Date</th>
//                     <th>Action</th>
//                     <th>Acknowledgement</th>



//                     <th>ID</th>
//                     <th>Entry Date</th>
//                     <th>Type</th>
//                     <th>Subject</th>
//                     <th>Received From</th>
//                     <th>Allocated Date</th>
//                     <th>Action</th>
//                     <th>Acknowledgement</th>
//                 </tr>";
//         while ($row = $result->fetch_assoc()) {
//             echo "<tr>
//                     <td>{$row['id']}</td>
//                     <td>{$row['entry_date']}</td>
//                     <td>{$row['type_of_letter']}</td>
//                     <td>{$row['subject']}</td>
//                     <td>{$row['received_from']}</td>

//                     <td>{$row['reference']}</td>
//                     <td>{$row['received_by_gmc']}</td>
//                     <td>{$row['received_date']}</td>
//                     <td>{$row['sent_to']}</td>
//                     <td>{$row['class']}</td>







//                     <td>{$row['subclass']}</td>
//                     <td>{$row['received_by']}</td>
//                     <td>{$row['action_taken']}</td>

//  <td>{$row['acknowledgement']}</td>
//                     <td>{$row['letter_upload_path']}</td>
//                     <td>{$row['created_at']}</td>





                    
//                 </tr>";
//         }
//         echo "</table>";




// <th>ID</th>
// <th>Entry Date</th>
// <th>Type of Letter</th>
// <th>Content</th>
// <th>Subject</th>
// <th>Received From</th>
// <th>Allocated Date</th>
// <th>Action Taken</th>
// <th>Acknowledgement</th>
// <th>Reference</th>
// <th>Received By GMC</th>
// <th>Received Date</th>
// <th>Sent To</th>
// <th>Class</th>
// <th>Subclass</th>
// <th>Received By</th>
// <th>Action Taken</th>
// <th>Letter Upload</th>
// <th>Created At</th>
// <th>Permission</th>




    echo "<table border='1'>";
    echo "<tr>
              



                
<th>id</th>
<th>entry_date</th>
<th>type_of_letter</th>
<th>content</th>
<th>subject</th>
<th>received_from</th>
<th>reference</th>
<th>received_by_gmc</th>
<th>received_date</th>
<th>allocated_date</th>
<th>sent_to</th>
<th>class</th>
<th>subclass</th>
<th>subsubclass</th>
<th>received_by</th>
<th>action_taken</th>
<th>acknowledgement</th>
<th>letter_upload_path</th>
<th>created_at</th>
<th>seen</th>
<th>permission</th>
<th>Remarks</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        // Check the value of 'seen' (assuming it's a column in your database)
$seenClass = (isset($row['seen']) && $row['seen'] == 1) ? 'seen' : 'not-seen';
        
        // Start the row with conditional styling based on seen status
        echo "<tr class='$seenClass'>";
        
        // Loop through all columns in the row
        foreach ($row as $column => $value) {
            if ($column == 'letter_upload_path') {
                // Special handling for the image upload cell
                echo "<td><a href='{$value}' target='_blank'>
                    <img src='{$value}' alt='Letter Upload' style='width: 100px; height: auto;'>
                </a></td>";
            } else {
                // For all other cells, add the class 'editable' to make them editable
                echo "<td class='editable' data-column='{$column}' data-id='{$row['id']}'>{$value}</td>";
            }
        }

        echo "</tr>";
    }

    echo "</table>";




    //                <td>{$row['permission']}</td>


        } else {
            echo "<p>No results found.</p>";
        }

        $conn->close();
        
    }
    ?>
    <script>
    // Enable double-click to edit all cells
    document.querySelectorAll('.editable').forEach(function(cell) {
        cell.addEventListener('dblclick', function() {
            var currentText = cell.innerText;
            var input = document.createElement('input');
            input.type = 'text';
            input.value = currentText;
            cell.innerHTML = '';
            cell.appendChild(input);
            input.focus();

            input.addEventListener('blur', function() {
                var newValue = input.value;
                // Save the new value using AJAX
                var id = cell.getAttribute('data-id');
                var column = cell.getAttribute('data-column');
                
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'update_cell.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        // Update the cell content after saving
                        cell.innerHTML = newValue;
                    }
                };
                xhr.send('id=' + id + '&column=' + column + '&value=' + encodeURIComponent(newValue));
            });
        });
    });
    </script>

    <?php   include("footer.php");