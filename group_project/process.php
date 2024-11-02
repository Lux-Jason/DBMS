<?php
include "connectDB_localhost.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST['data'];

    foreach ($data as $row) {
        $id = $row[0];
        $item = $row[1]; // Assuming the first column is the ID
        $number = $row[2];
        $selling = $row[3];
        $buying = $row[4];

        // $image = $row[5]

        $sql = "UPDATE inventory SET item='$item', number_we_have='$number', buying_price='$buying', selling_price='$selling' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
        $sql_2 = "SELECT * FROM inventory";
    }
    mysqli_close($conn);
}