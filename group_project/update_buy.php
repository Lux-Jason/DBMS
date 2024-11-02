<?php
global $conn;
include "connectDB_localhost.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $quantity = intval($_POST['quantity']);
    
    // get stock and buying_price
    $sql_1 = "SELECT number_we_have, buying_price FROM inventory WHERE id = $id";
    $result_1 = mysqli_query($sql_1, $conn);
    $row_1 = mysqli_fetch_assoc($result_1);

    if ($row_1) {
        $new_stock = $row_1['number_we_have'] - $quantity;
        
        if ($new_stock >= 0) {
            // update stock
            $update_sql_1 = "UPDATE inventory SET number_we_have = $new_stock WHERE id = $id";
            if (mysqli_query($conn, $update_sql_1)) {
                echo "Inventory updated successfully.";
            } else {
                echo "Error updating inventory: " . mysqli_error($conn);
            }

            // Calculate income
            $income = (float)$row_1['buying_price'] * $quantity;
            
            // Update cashflow
            $sql_2 = "SELECT amount FROM cashflow";
            $result_2 = mysqli_query($conn, $sql_2);
            if (mysqli_num_rows($result_2) > 0) {
                $row_2 = mysqli_fetch_assoc($result_2);
                if ($row_2) {
                    $new_amount = $row_2['amount'] + $income;
                    $update_sql_2 = "UPDATE cashflow SET amount = $new_amount";
                    if (!mysqli_query($conn, $update_sql_2)) {
                        echo "Error updating cashflow: " . mysqli_error($conn);
                    } else {
                        echo "Cashflow updated successfully.";
                    }
                } else {
                    echo "Error: Cashflow record not found.";
                }
            } else {
                echo "Error: No cashflow records found.";
            }
        } else {
            echo "Not enough stock available.";
        }
    } else {
        echo "Item not found.";
    }

    mysqli_close($conn);
}