<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .container {
            width: 100%;
            max-width: 900px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(to right, #3a7bd5, #00d2ff);
            color: white;
            padding: 25px;
            text-align: center;
        }
        
        .header h1 {
            font-size: 28px;
            margin-bottom: 5px;
        }
        
        .header p {
            font-size: 16px;
            opacity: 0.8;
        }
        
        .controls {
            display: flex;
            justify-content: space-between;
            padding: 15px 25px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #eee;
        }
        
        .search-box {
            position: relative;
            width: 250px;
        }
        
        .search-box input {
            width: 100%;
            padding: 10px 15px;
            padding-left: 40px;
            border: 1px solid #ddd;
            border-radius: 25px;
            outline: none;
            transition: all 0.3s;
        }
        
        .search-box input:focus {
            border-color: #3a7bd5;
            box-shadow: 0 0 0 2px rgba(58, 123, 213, 0.2);
        }
        
        .search-box::before {
            content: "🔍";
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
        }
        
        .filter-btn {
            padding: 8px 15px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .filter-btn:hover {
            background-color: #f0f0f0;
        }
        
        .filter-btn.active {
            background-color: #3a7bd5;
            color: white;
            border-color: #3a7bd5;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        thead {
            background-color: #f8f9fa;
        }
        
        th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: #333;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
        }
        
        th:hover {
            background-color: #eaecef;
        }
        
        th::after {
            content: "↕️";
            position: absolute;
            right: 10px;
            opacity: 0.3;
        }
        
        th.asc::after {
            content: "↑";
            opacity: 1;
        }
        
        th.desc::after {
            content: "↓";
            opacity: 1;
        }
        
        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            color: #555;
        }
        
        tbody tr {
            transition: all 0.3s;
        }
        
        tbody tr:hover {
            background-color: #f6f9fc;
        }
        
        .dept-badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .dept-CSE {
            background-color: #e3f2fd;
            color: #1976d2;
        }
        
        .dept-IT {
            background-color: #e8f5e9;
            color: #388e3c;
        }
        
        .sr-num {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            background-color: #eee;
            border-radius: 50%;
            margin-right: 10px;
            font-weight: bold;
            color: #555;
        }
        
        .footer {
            padding: 15px;
            text-align: center;
            color: #777;
            font-size: 14px;
            background-color: #f8f9fa;
        }

        @media (max-width: 768px) {
            .controls {
                flex-direction: column;
                gap: 10px;
            }
            
            .search-box {
                width: 100%;
            }
            
            th, td {
                padding: 10px;
            }

            th:nth-child(2), td:nth-child(2) {
                max-width: 100px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }
        }

        .highlight {
            background-color: #fff9c4;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Student Details</h1>
            <p>Class of 2021-2025</p>
        </div>
        
        <div class="controls">
            <div class="search-box">
                <input type="text" id="searchInput" placeholder="Search students...">
            </div>
            <div>
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="CSE">CSE</button>
                <button class="filter-btn" data-filter="IT">IT</button>
            </div>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th data-sort="id">S.No</th>
                    <th data-sort="name">Name</th>
                    <th data-sort="regNo">Reg No</th>
                    <th data-sort="dept">Department</th>
                </tr>
            </thead>
            <tbody id="studentList">
                <!-- Data will be filled by JavaScript -->
            </tbody>
        </table>
        
        <div class="footer">
            <p>Total: <span id="totalCount">10</span> students • Last Updated: February 2025</p>
        </div>
    </div>

    <script>
        // Student data
        const students = [
            { id: 1, name: "Sasank Sai", regNo: "21JR1A05J3", dept: "CSE" },
            { id: 2, name: "Harish", regNo: "21JR1A05J4", dept: "CSE" },
            { id: 3, name: "Fairoz", regNo: "22JR5A0514", dept: "CSE" },
            { id: 4, name: "Bhaskar", regNo: "21JR1A12B7", dept: "IT" },
            { id: 5, name: "Teja", regNo: "21JR1A05G6", dept: "CSE" },
            { id: 6, name: "Bhargav", regNo: "23JR1A0566", dept: "CSE" },
            { id: 7, name: "Jaya Ram", regNo: "21JR1A05A9", dept: "CSE" },
            { id: 8, name: "Anand", regNo: "21JR1A05B0", dept: "CSE" },
            { id: 9, name: "Sai Krishna", regNo: "21JR1A05B8", dept: "CSE" },
            { id: 10, name: "Venkatesh", regNo: "21JR1A05C2", dept: "CSE" }
        ];

        // DOM elements
        const studentList = document.getElementById("studentList");
        const searchInput = document.getElementById("searchInput");
        const filterBtns = document.querySelectorAll(".filter-btn");
        const tableHeaders = document.querySelectorAll("th[data-sort]");
        const totalCountEl = document.getElementById("totalCount");

        // Current state
        let currentFilter = "all";
        let currentSort = { field: "id", direction: "asc" };
        let searchTerm = "";

        // Render students
        function renderStudents() {
            // Filter students
            let filteredStudents = students.filter(student => {
                const matchesFilter = currentFilter === "all" || student.dept === currentFilter;
                const matchesSearch = searchTerm === "" || 
                    student.name.toLowerCase().includes(searchTerm.toLowerCase()) || 
                    student.regNo.toLowerCase().includes(searchTerm.toLowerCase()) ||
                    student.dept.toLowerCase().includes(searchTerm.toLowerCase());
                
                return matchesFilter && matchesSearch;
            });
            
            // Sort students
            filteredStudents.sort((a, b) => {
                let valueA = a[currentSort.field];
                let valueB = b[currentSort.field];
                
                if (typeof valueA === "string") {
                    valueA = valueA.toLowerCase();
                    valueB = valueB.toLowerCase();
                }
                
                if (valueA < valueB) return currentSort.direction === "asc" ? -1 : 1;
                if (valueA > valueB) return currentSort.direction === "asc" ? 1 : -1;
                return 0;
            });
            
            // Update total count
            totalCountEl.textContent = filteredStudents.length;
            
            // Clear table
            studentList.innerHTML = "";
            
            // Add students to table
            filteredStudents.forEach(student => {
                const row = document.createElement("tr");
                
                row.innerHTML = `
                    <td><span class="sr-num">${student.id}</span></td>
                    <td>${highlightText(student.name)}</td>
                    <td>${highlightText(student.regNo)}</td>
                    <td><span class="dept-badge dept-${student.dept}">${student.dept}</span></td>
                `;
                
                studentList.appendChild(row);
            });
            
            // Show message if no results
            if (filteredStudents.length === 0) {
                const row = document.createElement("tr");
                row.innerHTML = `<td colspan="4" style="text-align: center; padding: 30px;">No students found matching your criteria</td>`;
                studentList.appendChild(row);
            }
        }
        
        // Highlight search term
        function highlightText(text) {
            if (searchTerm === "") return text;
            
            const regex = new RegExp(`(${searchTerm})`, 'gi');
            return text.replace(regex, '<span class="highlight">$1</span>');
        }
        
        // Event listeners
        searchInput.addEventListener("input", e => {
            searchTerm = e.target.value;
            renderStudents();
        });
        
        filterBtns.forEach(btn => {
            btn.addEventListener("click", () => {
                filterBtns.forEach(b => b.classList.remove("active"));
                btn.classList.add("active");
                currentFilter = btn.dataset.filter;
                renderStudents();
            });
        });
        
        tableHeaders.forEach(header => {
            header.addEventListener("click", () => {
                const field = header.dataset.sort;
                
                // Update sort direction
                if (currentSort.field === field) {
                    currentSort.direction = currentSort.direction === "asc" ? "desc" : "asc";
                } else {
                    currentSort.field = field;
                    currentSort.direction = "asc";
                }
                
                // Update header classes
                tableHeaders.forEach(h => {
                    h.classList.remove("asc", "desc");
                });
                
                header.classList.add(currentSort.direction);
                
                renderStudents();
            });
        });
        
        // Initial render
        renderStudents();
    </script>
</body>
</html>