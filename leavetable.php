<?php
$server="localhost";
$user="root";
$password="";
$dbname="attendance";
$connection=mysqli_connect($server,$user,$password,$dbname)or die("Connection failed");
if(isset($_POST['Submit']))
{
    $sname=$_POST['student-name'];
    $sdept=$_POST['department'];
    $sreg=$_POST['reg-no'];
    $stutor=$_POST['tutor-name'];
    $sfrom=$_POST['date1'];
    $sto=$_POST['date2'];
    $sdesc=$_POST['description'];
    $query = "INSERT INTO `leave` VALUES('$sname','$sdept','$sreg','$stutor','$sfrom','$sto','$sdesc')";
    if(mysqli_query($connection,$query))
    {
        header("Location:success.html");
    }
    else
    {
        echo '<script>alert("Invalid Data");</script>';
    }
}