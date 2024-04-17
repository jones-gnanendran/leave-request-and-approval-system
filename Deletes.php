<?php
$server="localhost";
$user="root";
$password="";
$dbname="attendance";
$connection=mysqli_connect($server,$user,$password,$dbname)or die("Connection failed");
if(isset($_POST['delete']))
{
    $sreg=$_POST['regno'];
    $sql="DELETE FROM `leave` WHERE RegNo='$sreg'";
    if(mysqli_query($connection,$sql))
    {
        echo "Record Deleted Successfully";
    }
    else
    {
        echo "Error";
    }
}
?>