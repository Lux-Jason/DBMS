<!DOCTYPE html>
<!-- Full website is under construction. -->

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SwapSpot Home</title>
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

    <!-- Header -->
    <header>
        <div class="logo-container">
            <a href="index.php"><img src="SwapSpot_logo.svg" alt="SwapSpot" class="logo"></a>
            <a href="buyers_page.php" class="button">Buyers Interface</a>
            <a href="sellers_page.php" class="button">Sellers Interface</a>
        </div>
        <div>
            <?php
            session_start();
            if (isset($_SESSION['username'])) {
                /*echo "<p>Welcome, {$_SESSION['username']}</p>";*/
                echo '<a href="logout.php" class="button">Logout</a>';
            } else {
                echo '<button class="button login-btn" onclick="login_notice()">Login</button>';
                echo '<a href="registry_page.php" class="button register-btn">Register</a>';
            }
            ?>
        </div>
    </header>

    <!-- Login Form -->
    <div class="main-container">
        <div>
            <img src="swapspot__1.png" style="height: 312px;">
        </div>

        <div class="login-container">
            <?php
            if (isset($_SESSION['username'])) {
                echo '<h2 style="text-align: center; color: #00AEEC; font-size: 28px; "><br><br><br><span style="font-size:50px; color: black; ">Welcome</span><br>' . $_SESSION['username'] . '<br><br><br></h2>';
            } else {
                echo '<h2>Login</h2>';
                echo '<form action="logincheck_users_indexpg.php" method="post">';
                echo '<input type="text" name="username" placeholder="Username" id="username" onfocus="inputFocus(this)" required>';
                echo '<input type="password" name="password" placeholder="Password" id="password" onfocus="inputFocus(this)" required>';
                echo '<button type="submit">Login</button>';
                echo '</form>';
                echo '<p><a href="reset_pwd_pg.php">Forgot Password?</a></p>';
                echo '<p>Don\'t have an account? <a href="registry_page.php">Register</a></p>';
            }
            ?>
        </div>
    </div>

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
        <!-- <p><br><a href="http://localhost:8000/php/phpcodetemp00.php">preview</a></p> -->
    </div>
    
</body>

<script>
    function login_notice() {
        document.getElementById("username").style.backgroundColor = "rgba(255, 102, 153, 0.2)";
        document.getElementById("password").style.backgroundColor = "rgba(255, 102, 153, 0.2)";
    }
    function inputFocus(input) {
        document.getElementById("username").style.backgroundColor = "white";
        document.getElementById("password").style.backgroundColor = "white";
    }
</script>
</html>


<!-- Full website is under construction. -->
<!-- The items preview blocks will be change to output using php. -->