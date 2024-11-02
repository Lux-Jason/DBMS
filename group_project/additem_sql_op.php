<?php
global $conn;
include "connectDB_localhost.php";
if(isset($_POST['submit'])){
    $item	= $_POST["itemname"];
    $inventory	= $_POST["inventory"];
    $sp = $_POST["selling_price"]; //selling price.
    $bp = $_POST["buying_price"]; //buying price.

    $sql = "INSERT INTO `inventory` (`id`, `item`, `number_we_have`, `selling_price`, `buying_price`) VALUES (NULL, '$item', '$inventory', '$sp', '$bp')";
    $result = mysqli_query($conn, $sql);
    if (is_uploaded_file($_FILES['image_path']['tmp_name'])) {

        $imageData = file_get_contents($_FILES['image_path']['tmp_name']);
    
        $sql_1 = "UPDATE inventory SET image = ? WHERE item = '$item'";
        $stmt = $conn->prepare($sql_1);
    
        $stmt->bind_param('b', $imageData);
        $stmt->send_long_data(0, $imageData); 
        if ($stmt->execute()) {
            echo "Image uploaded and stored in database successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
    
        $stmt->close();
        $conn->close();
    } else {
        echo "File upload failed.";
    }
    $url = "Admin_pg.php";
    echo "<script> alert('Successfully add item. '); </script>";
    echo "<meta http-equiv='Refresh' content='0;URL=$url'>";
    exit();	
}else{
    echo "No file found";
}