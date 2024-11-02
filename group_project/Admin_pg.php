<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_op</title>
    <link rel="icon" href="SwapSpot_logo_small.svg" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        .popup {
            display: none; 
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border: 2px solid #ff6699;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            z-index: 9999;
            max-width: 400px;
            width: 100%;
            border-radius: 8px;
        }
        .popup img {
            width: 100px;
            height: 100px;
            float: left;
            margin-right: 20px;
        }
        .popup input[type="number"] {
            width: 70%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .popup button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            display: flexbox;
            margin: 15px;
            width: 80px;
        }
        .total-price {
            color: #007bff;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
    <div class="logo-container">
            <a href="index.php"><img src="SwapSpot_logo.svg" alt="SwapSpot" class="logo"></a>
            <a href="admin_login.php" class="button">Exit</a>
            
        </div>
    </header>
    <div class="">
        <?php include "Admin_op.php"; ?>
    </div>
    <!--<div>
        <p>Select an item to operate:</p>
        <input type="text" name="select" id="select" oninput="handleInput(event)">

    </div>-->
    <script>
        function handleInput(event) {
            console.log('Input changed:', event.target.value);
            
        }
    </script>
</body>
</html>