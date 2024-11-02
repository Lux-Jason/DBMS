<!DOCTYPE html>
<!-- Full website is under construction. -->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SwapSpot Buyers</title>
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
<?php
/*
    <!-- Popup: Buy item -->
    <div id="popup" class="popup">
        <img src="./adblock.jpg" alt="iphone15promax1tb">
        <div>
            <p>Item: iPhone 15 Pro MAX 1TB</p>
            <p>Unit Price: $899</p>
            <div id="quantitytobuy">
                <input placeholder="Quantity to Purchase" type="number" id="quantity" name="quantity" min="1" oninput="calculateTotal()">
            </div>
        </div>
        <div style="text-align: center;">
            <p>Total Price: <span id="totalPrice" class="total-price">$0</span></p>
            <div>
                <button onclick="confirmPurchase()">Confirm</button><button onclick="cancelPurchase()">Cancel</button>
            </div>
        </div>
    </div>
*/
?>

    <!-- Header -->
    <header>
        <div class="logo-container">
            <a href="index.php"><img src="SwapSpot_logo.svg" alt="SwapSpot" class="logo"></a>
            <a href="buyers_page.php" class="button" style="color: #007bff; border: #007bff 1px solid; background-color: white;">Buyers Interface</a>
            <a href="sellers_page.php" class="button">Sellers Interface</a>
        </div>
        <div>
        <?php
            session_start();
            
            if (isset($_SESSION['username'])) {
                /*echo "<p>Welcome, {$_SESSION['username']}</p>";*/
                echo '<a href="logout_buyers.php" class="button">Logout</a>';
            } else {
                echo '<a href="login_page.php" class="button login-btn">Login</a>';
                echo '<a href="registry_page.php" class="button register-btn">Register</a>';
            }
        ?>
        </div>
    </header>
    <!-- Product Viewing -->
    <div class="products-container">
        <a href="sellers_page.php"><div id="advertisement1" class="product" style="height: 300px; background-image: url('./adblock.jpg'); background-size: cover; background-repeat: no-repeat; "></div></a>
        <?php include "showitems.php"; ?>
    </div>

    <!-- View more -->
    <div id="view_more">
        <p style="text-align: center; color: #aaa;">-- Swipe or click to view more items. --</p>
        <!-- Under construction. -->
    </div>

    <!-- footer -->
    <div id="footer">
        <footer style="text-align: center;">&copy;Copyright 2024 Michael Hertz. All right reserved. <br>Go to <a href="admin_login.php" style="color: #00aeec;">Administrator Page</a></footer>
    </div>

</body>

<?php
/*
<script>
    function openPopup() {
        document.getElementById('popup').style.display = 'block';
    }

    function closePopup() {
        document.getElementById('popup').style.display = 'none';
    }

    function confirmPurchase() {
        alert('purchase success!');
        closePopup();
    }

    function cancelPurchase() {
        alert('cancel purchase!');
        closePopup();
    }

    function calculateTotal() {
        var price = 10; // unit price
        var quantity = document.getElementById('quantity').value;
        var totalPrice = price * quantity;
        document.getElementById('totalPrice').textContent = '$' + totalPrice;
    }
</script>
*/
?>

</html>


<!-- Full website is under construction. -->