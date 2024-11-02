<?php
// FIXME: change to your own details
$servername = "localhost";
$username = "root";	// change to your account's name
$password = "";	// change to your account's password
$db = "web_project"; // change to the database name in stuweb.bcrab.cn
$port = '3306';
// Create connection
$conn = new mysqli($servername, $username, $password, $db, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
