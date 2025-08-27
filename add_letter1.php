
<?php include 'not.php'?>



<?php
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gmc_guntur_pro";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entryDate = $_POST['entryDate'];
    $typeOfLetter = $_POST['typeOfLetter'];
    // $content = $_POST['content'];
    $subject = $_POST['subject'];
    $receivedFrom = $_POST['receivedFrom'];
    $reference = $_POST['reference'];
    $receivedByGMC = $_POST['receivedByGMC'];
    $receivedDate = $_POST['receivedDate'];
    $allocatedDate = $_POST['allocatedDate'];
    // $sentTo = $_POST['sentTo'];
    $class=$_POST['class'];
    $subclass=$_POST['subclass'];
    $subsubclass=$_POST['subsubclass'];
    $action = $_POST['action'];
    $letterUploadacknowledgement = $_POST['letterUploadacknowledgement'];
    $permission=$_POST['permission'];

    // File upload handling
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["letterUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));







    if (move_uploaded_file($_FILES["letterUpload"]["tmp_name"], $targetFile)) {
        $letterUploadPath = $targetFile;
    } else {
        $letterUploadPath = NULL;
    }








    // File upload handling
    $targetDir = "letterUploadacknowledgement/";
    $targetFile = $targetDir . basename($_FILES["letterUploadacknowledgement"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));







    if (move_uploaded_file($_FILES["letterUploadacknowledgement"]["tmp_name"], $targetFile)) {
        $letterUploadPath = $targetFile;
    } else {
        $letterUploadPath = NULL;
    }





    // Insert into database
    $sql = "INSERT INTO gmc_letters (entry_date, type_of_letter,  subject, received_from, reference, 
            received_by_gmc, received_date, allocated_date, class,subclass,subsubclass, action_taken, acknowledgement, letter_upload_path,permission)
            VALUES ('$entryDate', '$typeOfLetter', '$subject', '$receivedFrom', '$reference', 
                    '$receivedByGMC', '$receivedDate', '$allocatedDate', '$class','$subclass','$subsubclass' , '$action', '$letterUploadacknowledgement', '$letterUploadPath','$permission')";


// '$content'
// content,

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
    */
?><?php 
if (file_exists('not.php')) {
    include 'not.php';
} else {
    die("Required file not found.");
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gmc_guntur_pro";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $entryDate = $_POST['entryDate'];
    $typeOfLetter = $_POST['typeOfLetter'];
    $subject = $_POST['subject'];
    // $receivedFrom = $_POST['receivedFrom'];
    $receivedFrom = $_POST['repType'];

    $reference = $_POST['reference'];
    $receivedByGMC = $_POST['receivedByGMC'];
    $receivedDate = $_POST['receivedDate'];
    $allocatedDate = $_POST['allocatedDate'];
    $class = $_POST['class'];
    $subclass = $_POST['subclass'];
    $subsubclass = $_POST['subsubclass'];
    $action = $_POST['action'];
    $permission = $_POST['permission'];

    // Initialize paths
    $letterUploadPath = NULL;
    $acknowledgementPath = NULL;

    // File upload handling - Letter File
    if (isset($_FILES["letterUpload"]) && $_FILES["letterUpload"]["error"] == 0) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["letterUpload"]["name"]);

        if (move_uploaded_file($_FILES["letterUpload"]["tmp_name"], $targetFile)) {
            $letterUploadPath = $targetFile;
        } else {
            echo "Error uploading letter file.";
        }
    }

    // File upload handling - Acknowledgement File (Optional)
    if (isset($_FILES["letterUploadacknowledgement"]) && $_FILES["letterUploadacknowledgement"]["error"] == 0) {
        $targetDirAck = "letterUploadacknowledgement/";
        $targetFileAck = $targetDirAck . basename($_FILES["letterUploadacknowledgement"]["name"]);

        if (move_uploaded_file($_FILES["letterUploadacknowledgement"]["tmp_name"], $targetFileAck)) {
            $acknowledgementPath = $targetFileAck;
        } else {
            echo "Error uploading acknowledgement file.";
        }
    }

    // SQL query to insert form data into the database
    $sql = "INSERT INTO gmc_letters (entry_date, type_of_letter, subject, received_from, reference, 
                                      received_by_gmc, received_date, allocated_date, class, subclass, subsubclass, 
                                      action_taken, acknowledgement, letter_upload_path, permission)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare and check the query
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters to the SQL query
        $stmt->bind_param("sssssssssssssss", $entryDate, $typeOfLetter, $subject, $receivedFrom, $reference, 
                         $receivedByGMC, $receivedDate, $allocatedDate, $class, $subclass, $subsubclass, 
                         $action, $acknowledgementPath, $letterUploadPath, $permission);

        // Execute the query
        if ($stmt->execute()) {
            echo "New record created successfully.";
        } else {
            echo "Error executing query: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GMC Letter Entry Form</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f0f4f8, #d9e2ec);
        }

        .form-container {
            width: 100%;
            background: #ffffff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            text-align: center;
            color: #2b4d76;
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: 700;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #34495e;
            font-weight: 600;
        }

        input[type="text"],
        input[type="date"],
        select,
        input[type="file"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f8fafc;
            outline: none;
            font-size: 15px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input[type="text"]:focus,
        input[type="date"]:focus,
        select:focus,
        input[type="file"]:focus {
            border-color: #2b4d76;
            box-shadow: 0 0 5px rgba(43, 77, 118, 0.2);
        }

        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            resize: vertical;
            background-color: #f8fafc;
            font-size: 15px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-group textarea:focus {
            border-color: #2b4d76;
            box-shadow: 0 0 5px rgba(43, 77, 118, 0.2);
        }

        button {
            width: 100%;
            background-color: #2b4d76;
            color: white;
            border: none;
            padding: 14px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            font-weight: 700;
            transition: background-color 0.3s, transform 0.2s;
        }

        button:hover {
            background-color: #1f3b57;
            transform: translateY(-2px);
        }

        button:active {
            transform: translateY(0);
        }
        

        /* Container to hold the bubbles */
.bubble-container {
    position: relative;
    height: 100vh;
    width: 100%;
    background-color: #f0f0f0; /* Background color of the page */
}

/* Common styles for all bubbles */
.bubble {
    position: absolute;
    border-radius: 50%;
    width: 100px;
    height: 100px;
    opacity: 0.6;
    animation: bubbleFloat 5s ease-in-out infinite;
}

/* Bubbles with different colors */
.bubble1 {
    background-color: #ff6347; /* Tomato */
    top: 10%;
    left: 20%;
}

.bubble2 {
    background-color: #3cb371; /* MediumSeaGreen */
    top: 30%;
    left: 50%;
}

.bubble3 {
    background-color: #1e90ff; /* DodgerBlue */
    top: 50%;
    left: 75%;
}

.bubble4 {
    background-color: #ff1493; /* DeepPink */
    top: 70%;
    left: 35%;
}

.bubble5 {
    background-color: #ffda44; /* LightYellow */
    top: 80%;
    left: 80%;
}

/* Animation for floating effect */
@keyframes bubbleFloat {
    0% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-30px);
    }
    100% {
        transform: translateY(0);
    }
}

    </style>
</head>

<body>
    





            <div class="bubble-container">

    <?php include 'header.php' ?>
    <?php include 'nav.php' ?>

    <div class="form-container">
        <h2>GMC Letter Entry Form</h2>
        <form action="add_letter1.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="entryDate">Entry Date</label>
                <input type="date" id="entryDate" name="entryDate">
            </div>
    <div class="bubble bubble1"></div>
    <div class="bubble bubble2"></div>
    <div class="bubble bubble3"></div>
    <!-- <div class="bubble bubble4"></div>
    <div class="bubble bubble5"></div> -->


            <div class="form-group">
                <label for="typeOfLetter">Type of Letter</label>
                <select id="typeOfLetter" name="typeOfLetter">
                    <option value="circular">Circular</option>ok
                    <option value="letter">Letter</option>ok
                    <option value="proceedings">Proceedings</option>ok
                    <option value="representations">Representations</option>ok
                    <option value="grievance">Grievance</option>ok
                    <option value="courtCase">Court Case</option>ok
                    <option value="other">LCQ</option>
                    <option value="Education">LAQ</option>
                    <option value="Record Room">Others</option>
                    <!-- <option value="dpo">DPO</option>
                    <option value="apro">APRO</option>


                    <option value="proforma">Proforma</option>
                    <option value="lcq">LCQ</option>
                    <option value="laq">LAQ</option>
                    <option value="others">Others</option> -->
                </select>
            </div>

            <!-- <div class="form-group">
                <label for="content">Content</label>
                <select id="content" name="content">
                    <option value="proforma">Proforma</option>
                    <option value="lcq">LCQ</option>
                    <option value="laq">LAQ</option>
                    <option value="others">Others</option>
                </select>
            </div> -->

            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" placeholder="Enter subject">
            </div>

           <div class="form-group">
    <label for="receivedFrom">Received From</label>
    <input type="text" id="receivedFrom" name="repType" placeholder="Enter sender's name">
    <div>
        <input type="checkbox" id="isPublicRep" name="isPublicRep" onchange="togglePublicRepOptions()">
        <label for="isPublicRep">Public Representatives</label>
    </div>
</div>

<!-- Radio button options (hidden by default) -->
<div id="publicRepOptions" style="display: none; margin-top: 10px;">
    <label>Select Representative Type:</label><br>
    <input type="radio" id="mla" name="repType" value="MLA">
    <label for="mla">MLA</label><br>
    <input type="radio" id="mp" name="repType" value="MP">
    <label for="mp">MP</label><br>
    <input type="radio" id="mlc" name="repType" value="MLC">
    <label for="mlc">MLC</label><br>
    <input type="radio" id="minister" name="repType" value="Minister">
    <label for="minister">Minister</label><br>
    <input type="radio" id="corporator" name="repType" value="Corporator">
    <label for="corporator">Corporator</label><br>
    <input type="radio" id="deputyMayor" name="repType" value="Deputy Mayor">
    <label for="deputyMayor">Deputy Mayor</label><br>
    <input type="radio" id="mayor" name="repType" value="Mayor">
    <label for="mayor">Mayor</label>
</div>
<!-- <div class="bubble bubble5"></div> -->

<script>
    // Function to toggle visibility of public representative options
    function togglePublicRepOptions() {
        const checkBox = document.getElementById('isPublicRep');
        const optionsDiv = document.getElementById('publicRepOptions');

        if (checkBox.checked) {
            optionsDiv.style.display = 'block'; // Show the options
        } else {
            optionsDiv.style.display = 'none'; // Hide the options
        }
    }
</script>
<div class="bubble bubble4"></div>
<div class="bubble bubble5"></div>

            <div class="form-group">
                <label for="reference">Reference</label>
                <input type="text" id="reference" name="reference" placeholder="Enter reference">
            </div>

            <div class="form-group">
                <label for="receivedByGMC">Received by GMC</label>
                <select id="receivedByGMC" name="receivedByGMC">
                    <option value="hardCopy">Hard Copy</option>
                    <option value="softCopy">Soft Copy</option>
                    <option value="mail">Mail</option>
                </select>
            </div>
            <div class="bubble bubble5"></div>

           
            <!-- <div class="form-group">
                <label for="letterUploadacknowledgement">Upload Letter</label>
                <!-- <input type="file" id="letterUploadacknowledgement" name="letterUpload"> --
                <input type="file" name="letterUploadacknowledgement" id="letterUploadacknowledgement">

            </div> -->
            <label for="letterUploadacknowledgement">Acknowledgement Upload (Optional):</label>
            <input type="file" name="letterUploadacknowledgement"><br>


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
                <select id="action" name="action">
                    <option value="mailSent">Mail Sent On</option>
                    <option value="sentCopy">Sent Copy</option>
                    <option value="excel">Excel</option>
                </select>
            </div>
            <div class="bubble bubble5"></div>

            <div class="dropdown-container">
        <h2>Select Section, Sub Section, and Nested Level</h2>
        <select id="sectionDropdown"name ="class">
            <option value="">Select Section</option>
        </select>
        <select id="subSectionDropdown"name ="subclass">
            <option value="">Select Sub Section</option>
        </select>
        <select id="nestedDropdown"name ="subsubclass"   style="display: none;">
            <option value="">Select Nested Option</option>
        </select>
    </div>
           <!-- add here -->

            <div class="form-group">
                <label for="letterUpload">Upload Letter</label>
                <input type="file" id="letterUpload" name="letterUpload">
            </div>
            <!-- </div> -->



            <script>
        // Data for sections, sub-sections, and nested options
        const data = {
            "Accounts": ["Accountant 1", "Accountant 2", "Examiner Of Accounts", "Others"],
            "Election": ["AC", "Ele Supdt", "Others"],


            

            "Education":[],
            "Record Room":[],
            "DPO":[],
            "APRO":[],
            "others":[],


            
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
            <!-- <button type="submit">Submit</button>
            <button type="submit2">Save Not Submit</button> -->

            <button type="submit" name="permission" value="1">Submit</button>
            <button type="submit" name="permission" value="0">Save not Submit</button>



        </form>
    </div>
</body>
<?php include 'footer.php'?>

    </div>
</html>

