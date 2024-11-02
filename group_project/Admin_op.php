<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./jquery.min.js"></script>
    <link rel="icon" href="SwapSpot_logo_small.svg" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php
include "connectDB_localhost.php";
global $conn;
$sql = "SELECT id, item, number_we_have, selling_price, buying_price, image FROM inventory";

$result = mysqli_query($sql, $conn);

if (mysqli_num_rows($result) > 0) {
    echo "<div style='margin-left: auto; margin-right: auto; text-align: center; width: 100%; '><h2 style='text-align: center; '>Administrator Page</h2>";
    echo "<h3 style='text-align: center; color: #ff6699; '>After editing, please click <span style='font-weight: bolder; font-size:150%; color: #00aeec; '>Confirm</span> button to save changes.</h3>";
    echo "<div><table id='inventoryTable' style='border: 5px #00aeec solid; border-radius: 8px; '>";
    
    // Print the heading of the table
    echo "<tr>";
    // Print each column name
    while ($property = mysqli_fetch_field($result)) {
        echo "<th style='width: 200px; text-align: center; border: 1px #00aeec solid; border-radius: 8px; '><span style='margin-top: 10px; margin-bottom: 10px; '>".$property->name."</span></th>";
    }
    echo "<th style='border: 1px #00aeec solid; border-radius: 8px; width: 200px; '><span style='margin-top: 10px; margin-bottom: 10px; '>operation</span></th>";
    echo "</tr>";

    // Get each row data
    while ($row = mysqli_fetch_array($result)){
        echo "<tr>";
        for ($f = 0; $f < mysqli_num_fields($result); $f++) {
            if($f === 5){
                echo "<td style='border: 1px #00aeec solid; border-radius: 8px; width: 200px; text-align: center; '>"."<img src='data:image/webp;base64," . base64_encode($row['image']) . "' style='border: 1px #00aeec solid; border-radius: 8px; width: 200px; '/>"."</td>";
            }else{

                echo "<td style='border: 1px #00aeec solid; border-radius: 8px; width: 200px; text-align: center; '>".$row[$f]."</td>";
            }
        }
        echo "<td style='border: 1px #00aeec solid; border-radius: 8px; width: 200px; text-align: center; '><button style='border: 1px white solid; border-radius: 5px; padding: 10px; margin: 10px; width: 80px; background-color: #007bff; color: white; ' onclick=\"EditRow(this)\">Edit</button><br><button style='border-radius:5px; border: 1px white solid; padding: 10px; margin: 10px; width: 80px; background-color: #007bff; color: white; ' onclick=\"DeleteRow(this)\" id=\"delete\">Delete</button></td>";
        echo "</tr>";
    }

    echo "</table></div></div>";
    echo "<div style='text-align: center; '><button style='border-radius:5px; border: 1px white solid; padding: 10px; margin: 10px; width: 80px; background-color: #007bff; color: white; ' id=\"send\" name=\"submit\" value=\"confirm\">Confirm</button></div>";
}
?>

<div style="text-align: center; margin: 15px; "><a href="add_new_item_admin.php" style='text-decoration: none; border-radius:5px; border: 1px white solid; padding: 10px; margin: 10px; width: 80px; background-color: #007bff; color: white;'>Add Item</a></div>


<script>
    function update() {
        var table = document.getElementById('inventoryTable');
        var rowCount = table.rows.length;
        var tableData = [];

        // Loop through table rows and gather data
        for (var i = 1; i < rowCount; i++) {
            var row = table.rows[i];
            var rowData = {};
            for (let j = 0; j < row.cells.length - 1; j++) {
                rowData[j] = row.cells[j].innerText;
            }
            tableData.push(rowData);
        }

        // Send data to server
        $.ajax({
            url: 'process.php',
            type: 'POST',
            data: { data: tableData },
            success: function(response) {
                alert('Database updated successfully!');
            },
            error: function(xhr, status, error) {
                console.error('Error occurred: ' + status + ' ' + error);
            }
        });
        location.reload();
    }

    $(document).ready(function() {
        $('#send').click(function() {
            update();
            setInterval(function(){
                location.reload();
            }, 0);
        });
        $('#delete').click(function(){
            DeleteRow(button);
            setInterval(function(){
                location.reload();
            }, 0);
        });
    });

    function DeleteRow(button) {
        if (confirm("Are you sure to delete this row?") == true) {
            let row = button.parentNode.parentNode;
            var itemId = row.cells[0].innerText; 
            row.parentNode.removeChild(row);
            $.ajax({
                url: 'delete_item.php',
                type: 'POST',
                data: { id: itemId },
                success: function(response) {
                    alert('Item deleted successfully!');
                },
                error: function(xhr, status, error) {
                    console.error('Error occurred: ' + status + ' ' + error);
                }
            });
        } else {
            alert("Operation cancelled! ");
        }
        location.reload();
    }

    function EditRow(button) {
        let row = button.parentNode.parentNode;
        let cells = row.cells;

        for (let i = 1; i < cells.length - 2; i++) {
            let cell = cells[i];
            let inputValue = prompt("Please enter new value for " + cell.innerText, cell.innerText);
            if (inputValue !== null && inputValue !== "") {
                cell.innerText = inputValue;
            }
        }
    } 
</script>
</body>
</html>
