<?php

global $conn;
include "connectDB_localhost.php";

// step2: prepare sql
$user	= $_POST["username"];	// username from login form
$pwd	= $_POST["password"];	// password	from login form

if(strcmp($user,"Administrator") === 0 && strcmp($pwd,"hehouzevery6") === 0){
    $sql = "SELECT username, password FROM users WHERE username = '$user' AND password = '$pwd'";
    $result = mysqli_query($conn,$sql);

    // step4: if the query returns some record, that means username and password are in the DB.
    if(mysqli_num_rows($result)>0){
        $url = "Admin_pg.php";
        echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
        exit();
    }
}else{
    $url = "admin_login.php";
    echo "<script> alert('Invalid login. Please check your password.'); </script>";
    echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
    exit();

}
//$conn = mysqli_connect($servername, $username, $password, $db);
// step3: query

