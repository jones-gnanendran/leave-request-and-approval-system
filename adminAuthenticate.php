<?php
$server="localhost";
$user="root";
$password="";
$dbname="attendance";
$connection=mysqli_connect($server,$user,$password,$dbname)or die("Connection failed");
if(isset($_POST['Submit']))
{
    $aid=$_POST['admin_id'];
    $apass=$_POST['password'];
    $query = "SELECT * FROM admin_login WHERE adminid='$aid' AND adminpass='$apass'";
    $result = mysqli_query($connection, $query);
    
    if(mysqli_num_rows($result) > 0) {
        $cookie_name = 'admin_cookie';
        $cookie_value = $aid;
        $expiry_time = time() + (24 * 3600); // Expiry after one day (24 hours * 3600 seconds)
        setcookie($cookie_name, $cookie_value, $expiry_time, '/');
        
        header("Location:Adminportal.php");
        exit();
       
    } else {
       
        echo '<script>alert("Invalid Admin ID or password!");</script>';
    }
}
?>