<?php
global $conn, $user;
include "connectDB_localhost.php";
//$user="r12345@mail.uic.edu.cn";
$sql = "SELECT security_question1,security_question2,security_question3,answer1,answer2,answer3 FROM users WHERE username='$user'";

$result = mysqli_query($sql, $conn);
$row=mysqli_fetch_array($result);
$question1=$row[0];
$question2=$row[1];
$question3=$row[2];
$a1=$row[3];
$a2=$row[4];
$a3=$row[5];

echo "  <select name='security_question' style='background-color: #ccc;' onfocus='inputFocus(this)' required>";
echo "  <option value='' disabled selected>Select Security Question</option>";
if ($question1=="city" || $question2=="city" || $question3=="city") {
    echo "<option value='city'>Your birth city?</option>";
}
if ($question1=="primary_school_name" || $question2=="primary_school_name" || $question3=="primary_school_name") {
    echo "<option value='primary_school_name'>What was your primary school name?</option>";
}
if ($question1=="favorite_pet" || $question2=="favorite_pet" || $question3=="favorite_pet") {
    echo "<option value='favorite_pet'>Your favorite pet?</option>";
}
if ($question1=="first_phone" || $question2=="first_phone" || $question3=="first_phone") {
    echo "<option value='first_phone'>Your first phone brand and model?</option>";
}
if ($question1=="favorite_song" || $question2=="favorite_song" || $question3=="favorite_song") {
    echo "<option value='favorite_song'>Your favourite song</option>";
}

?>





