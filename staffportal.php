<?php
$server="localhost";
$user="root";
$password="";
$dbname="attendance";
$connection=mysqli_connect($server,$user,$password,$dbname)or die("Connection failed");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome to Staff Portal</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }
    .container {
        max-width: 1000px;
        margin: 50px auto;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }
    h1, h2 {
        color: #333;
        margin-bottom: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    th, td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }
    .accept-btn {
            background-color: green;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .deny-btn {
            background-color: red;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
</style>
</head>
<body>
    <div class="container">
        <h1>Welcome,</h1>
        <h2>Leave Request</h2>
        <table>
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Department</th>
                    <th>Registration No</th>
                    <th>Tutor's Name</th>
                    <th>From Date</th>
                    <th>To Date</th>
                    <th>Description</th>
                    <th>Approval</th>
                </tr>
            </thead>
            
            <tbody>
                <?php
           
            $queryLeave = "SELECT * FROM `leave`";
            $resultLeave = mysqli_query($connection, $queryLeave);

            if ($resultLeave && mysqli_num_rows($resultLeave) > 0) {
                while ($rowLeave = mysqli_fetch_assoc($resultLeave)) {
                    $Regno=$rowLeave['RegNo'];
                    echo "<tr>";
                    echo "<td>{$rowLeave['sname']}</td>";
                    echo "<td>{$rowLeave['Dept']}</td>";
                    echo "<td>{$rowLeave['RegNo']}</td>";
                    echo "<td>{$rowLeave['tutor']}</td>";
                    echo "<td>{$rowLeave['from']}</td>";
                    echo "<td>{$rowLeave['to']}</td>";
                    echo "<td>{$rowLeave['Descript']}</td>";
                    echo "<td><button class='accept-btn' onclick='accept()' >Accept</button>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No leave requests found.</td></tr>";
            }
            ?>
            </tbody>
        </table>
        <button onclick="window.location.href = 'delete.html';">Delete Leave Request</button>
        <a href="logout.php">Logout</a>
        
    </div>
</body>
<script>
        function accept() {
            // Function to handle accepting leave requests
            alert("Leave request Approved");
        }
    </script>
</script>
</html>