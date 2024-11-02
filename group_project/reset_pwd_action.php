<?php

// step1: include the DB connect file
include "connectDB_localhost.php";  

$user	= $_POST["username"];
$pwd1	= $_POST["password"];
$pwd2	= $_POST["confirm_password"];
$question = $_POST["security_question"];
$answer = $_POST["answer"];

$sql="SELECT security_question1,answer1,security_question2,answer2,security_question3,answer3 FROM users WHERE username='$user'";
$resultquestion=mysqli_query($conn,$sql);
$qas=mysqli_fetch_array($resultquestion);


if($question==$qas[0]) {
    if ($answer==$qas[1] && $pwd1==$pwd2) {
        $resetpwd="UPDATE users SET password='$pwd1' WHERE username='$user'";
        $resultreset=mysqli_query($conn,$resetpwd);
        $url = "login_page.php";
        echo "<script> alert('Password reset Successfully. Redirecting you to login page.'); </script>";
        echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
        exit();	
    } else {
        $url = "reset_pwd_pg.php";
        echo "<script> alert('Password reset failed. Please check information'); </script>";
        echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
        exit();	 
    }
} else if ($question==$qas[2]) {
    if ($answer==$qas[3] && $pwd1==$pwd2) {
        $resetpwd="UPDATE users SET password='$pwd1' WHERE username='$user'";
        $resultreset=mysqli_query($conn,$resetpwd);
        $url = "login_page.php";
        echo "<script> alert('Password reset Successfully. Redirecting you to login page.'); </script>";
        echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
        exit();	
    } else {
        $url = "reset_pwd_pg.php";
        echo "<script> alert('Password reset failed. Please check information'); </script>";
        echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
        exit();	 
    }
} else if ($question==$qas[4]) {
    if ($answer==$qas[5] && $pwd1==$pwd2) {
        $resetpwd="UPDATE users SET password='$pwd1' WHERE username='$user'";
        $resultreset=mysqli_query($conn,$resetpwd);
        $url = "login_page.php";
        echo "<script> alert('Password reset Successfully. Redirecting you to login page.'); </script>";
        echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
        exit();	
    } else {
        $url = "reset_pwd_pg.php";
        echo "<script> alert('Password reset failed. Please check information'); </script>";
        echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
        exit();	 
    }
}

?>
