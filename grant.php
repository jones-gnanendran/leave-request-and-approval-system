<?php
$server="localhost";
$user="root";
$password="";
$dbname="attendance";
$connection=mysqli_connect($server,$user,$password,$dbname)or die("Connection failed");
if(isset($_POST['Submit']))
{
    $sname=$_POST['name'];
    $sage=$_POST['age'];
    $sreg=$_POST['reg-no'];
    $sreas=$_POST['reason'];
    $query = "INSERT INTO permission VALUES('$sname','$sage','$sreg','$sreas')";
    if(mysqli_query($connection,$query))
    {
        header("Location:success.html");
        exit();
    }
    else
    {
        echo '<script>alert("Invalid Data");</script>';
    }
}