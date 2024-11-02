<?php

// step1: include the DB connect file
include "connectDB_localhost.php";  

$user	= $_POST["username"];
$pwd1	= $_POST["password"];
$pwd2	= $_POST["confirm_password"];
$q1 = $_POST["security_question1"];
$q2 = $_POST["security_question2"];
$q3 = $_POST["security_question3"];
$a1 = $_POST["answer1"];
$a2 = $_POST["answer2"];
$a3 = $_POST["answer3"];

if($pwd1 === $pwd2 && $q1 != $q2 && $q1 != $q3 && $q2 != $q3 ){
    // prepare sql
    $sql = "INSERT INTO `users` (`id`, `username`, `password`, `security_question1`, `answer1`, `security_question2`, `answer2`, `security_question3`, `answer3`,`usertype`) VALUES (NULL, '$user', '$pwd1', '$q1', '$a1', '$q2', '$a2', '$q3', '$a3', 'user')";
    $result = mysqli_query($conn, $sql);
	// echo $result;
    if($result >0){
        $url = "login_page.php";
        echo "<script> alert('Registration Successs. Redirecting you to login page.'); </script>";
        echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
        exit();	
    } else {
        $url = "registry_page.php";
        echo "<script> alert('Registration Failed. Try again later.'); </script>";
        echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
        exit();	
    }
}else{
    if ($pwd1 !== $pwd2){
        $url = "registry_page.php";
        echo "<script> alert('Mismatch between the two passwords entered! '); </script>";
        echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
        exit();	
    } else {
        $url = "registry_page.php";
        echo "<script> alert('Unknown error occurred. '); </script>";
        echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
        exit();	
    }
}


?>
