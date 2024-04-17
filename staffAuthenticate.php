<?php
session_start();
$server="localhost";
$user="root";
$password="";
$dbname="attendance";
$connection=mysqli_connect($server,$user,$password,$dbname)or die("Connection failed");
if(isset($_POST['Submit']))
{
    $sid=$_POST['staff_id'];
    $spass=$_POST['password'];
    $query = "SELECT * FROM staff_login WHERE staffid='$sid' AND staffpass='$spass'";
    $result = mysqli_query($connection, $query);
    
    if(mysqli_num_rows($result) > 0) {
        $row=mysqli_fetch_assoc($result);
        $_SESSION['staff_id']=$row['staffid'];
        $_SESSION['staff_name']=$row['staffname'];
        
        header("Location:staffportal.php");
        exit();
       
    } else {
       
        echo '<script>alert("Invalid Staff ID or password!");</script>';
    }
}
?>