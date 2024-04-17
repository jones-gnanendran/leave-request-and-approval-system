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
  <title>Header Design</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .header {
      background-color: #007bff;
      color: #fff;
      padding: 10px 20px;
      display: flex;
      align-items: center;
    }

    .header h1 {
      margin: 0;
    }

    .nav {
      margin-left: auto;
    }

    .nav a {
      color: #fff;
      text-decoration: none;
      padding: 0 10px;
    }

    .nav a:hover {
      text-decoration: underline;
    }
    .welcome-message {
      font-size: xx-large;
      text-align: center;
      margin-top: 50px;
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
  </style>
</head>

<body>
  <div class="header">
    <h1>Leave Application</h1>
    <div class="nav">
      <a href="AddFaculty.html">Add Faculty</a>
      <a href="Browse.html">Browse</a>
    </div>
  </div>
  <div class="welcome-message">
    Welcome to The Leave Approval System
  </div>
  <div class="container">
        <h1>Welcome, <?php echo isset($_SESSION['staff_name']) ? $_SESSION['staff_name'] : 'Guest'; ?>!</h1>
        <h2>Leave Request</h2>
        <table>
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Age</th>
                    <th>Registration No</th>
                    <th>Reason</th>
                    <th>Approval</th>
                </tr>
            </thead>
            
            <tbody>
                <?php
           
            $queryLeave = "SELECT * FROM permission";
            $resultLeave = mysqli_query($connection, $queryLeave);

            if ($resultLeave && mysqli_num_rows($resultLeave) > 0) {
                while ($rowLeave = mysqli_fetch_assoc($resultLeave)) {
                    echo "<tr>";
                    echo "<td>{$rowLeave['Name']}</td>";
                    echo "<td>{$rowLeave['Age']}</td>";
                    echo "<td>{$rowLeave['RegNo']}</td>";
                    echo "<td>{$rowLeave['Reason']}</td>";
                    echo "<td><button class='accept-btn' onclick='accept()'>Accept</button>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No leave requests found.</td></tr>";
            }
            ?>
            </tbody>
          </table>
        <a href="logout.php">Logout</a>
        
    </div>
  
  <!-- Your content goes here -->
</body>
<script>
  function accept()
  {
    alert("One hour Permission approved");
  }
</script>

</html>
