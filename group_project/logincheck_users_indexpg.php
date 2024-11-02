<?php
session_start();
include "connectDB_localhost.php";  

$user	= $_POST["username"];
$pwd	= $_POST["password"];
$sql = "SELECT password FROM users WHERE username='$user' AND password='$pwd'";


$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0){
    if ($user == "administrator" || $user == "Administrator") {
        $url = "administration_pg.php";
        echo "<script> alert('You are administrator. Redirecting to administrator page.'); </script>";
        echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
        exit();	
    } else {
        $_SESSION['username']=$_POST['username'];
        $url = "index.php";
        echo "<script> alert('Welcome login!'); </script>";
        echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
        exit();	
    }
}else{
    $url = "login_page.php";
    echo "<script> alert('Invalid login. Please check your information.'); </script>";
    echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
    exit();	
}

?>
