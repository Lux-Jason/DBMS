<?php
include "connectDB_localhost.php";
global $conn;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);

    // start
    if (!empty($conn)) {
        mysqli_begin_transaction($conn);
    }

    try {
        // delete items
        $sql = "DELETE FROM inventory WHERE id = $id";
        if (mysqli_query($conn, $sql)) {
            echo "Item deleted successfully.";
            
            // reset AUTO_INCREMENT
            $sql_reset_ai = "ALTER TABLE inventory AUTO_INCREMENT = 1";
            if (!mysqli_query($conn, $sql_reset_ai)) {
                throw new Exception("Error resetting AUTO_INCREMENT: " . mysqli_error($conn));
            }
            
            // reoder id
            $sql_reorder_ids = "SET @count = 0;UPDATE inventory SET id = (@count:=@count+1);";
            if (!mysqli_multi_query($conn, $sql_reorder_ids)) {
                throw new Exception("Error reordering IDs: " . mysqli_error($conn));
            }

            while (mysqli_next_result($conn)) {;}
            
        } else {
            throw new Exception("Error deleting item: " . mysqli_error($conn));
        }

        // submit
        mysqli_commit($conn);
    } catch (Exception $e) {
        // Rollback the transaction in case of an error.
        mysqli_rollback($conn);
        echo $e->getMessage();
    }

    mysqli_close($conn);
}
