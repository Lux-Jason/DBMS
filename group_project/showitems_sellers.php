global$conn; <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./jquery.min.js"></script>
</head>
<body>
<?php
include "connectDB_localhost.php";
$sql = "select * from inventory";
$all_items = mysqli_query($sql, $conn);
for ($list=1; $list<=mysqli_num_rows($all_items); $list++) {

    $sql = "select * from inventory where id ='$list'";
    $item = mysqli_query($conn, $sql);
    $row=mysqli_fetch_array($item);

    //$_SESSION['row'] = $row;
    //session_start();
    if (isset($_SESSION['username'])) {
        if ($row[3] <= 2000) {
            echo   "<div class='product'>
                        <div class='product-info'>
                            <div class='stock'>Inventory: $row[2]</div>
                            <div class='picshow'>
                                <img src='data:image/webp;base64," . base64_encode($row['image']) . "' style='width: 250px; padding: 10px; '>
                            </div>
                            <div class='name-price'>
                                <div class='name'>$row[1]</div>
                                <div class='price'>$$row[3]</div>
                            </div>
                        </div>
                        <div class='actions'>
                        <button class='full-width-button' style='border-radius:8px; width: 100%; background-color: #007bff; color: white; border: none; padding: 10px; display: flex; align-items: center; justify-content: center; ' onclick='openPopup$row[0]()' data_item_id='$row[0]' react='buy'>
                            <img src='sell_items.png' alt='Buy Icon' style='margin-right: 10px; filter: invert(100%); '>
                            <span style='font-size: 28px; '>&ensp;&ensp;&ensp;&ensp;&ensp;Sell&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</span>
                        </button>
                        </div>
                    </div>";
            echo   "<div id='popup$row[0]' class='popup'>
                        <img src='data:image/webp;base64," . base64_encode($row['image']) . "' alt='$row[1]'>
                        <div>
                            <p>Item: <input style='border: 0px; outline: none; ' value='$row[1]' readonly/></p>
                            <p>Unit Price: <input style='border: 0px; outline: none; ' value='$row[3]' readonly/></p>
                            <div id='quantitytobuy' style='text-align: center; '>
                                <input placeholder='Quantity to Purchase' type='number' id='quantity$row[0]' name='quantity' min='1' oninput='calculateTotal$row[0]()'>
                            </div>
                        </div>
                        <div style='text-align: center;'>
                            <p>Total Price: $<input type='number' id='totalPrice$row[0]' class='total-price' value='0' style='border: 0px; outline: none; ' readonly/></p>
                            <div>
                                <button onclick='confirmPurchase($row[0])'>Confirm</button><button onclick='cancelPurchase$row[0]()'>Cancel</button>
                            </div>
                        </div>
                        <p id='priceunit$row[0]' style='display: none; '>$row[3]</p>
                    </div>";
            echo "<script>
            function confirmPurchase(itemId) {
                var quantity = document.getElementById('quantity' + itemId).value;
                if (quantity > 0) {
                    $.ajax({
                        url: 'update_sel.php',
                        type: 'POST',
                        data: { id: itemId, quantity: quantity },
                        success: function(response) {
                            alert('Purchase successful!');
                            closePopup(itemId);
                            location.reload(); // reload the page to reflect changes
                        },
                        error: function(xhr, status, error) {
                            console.error('Error occurred: ' + status + ' ' + error);
                        }
                    });
                } else {
                    alert('Please enter a valid quantity.');
                }
            }

            function openPopup$row[0]() {

                document.getElementById('popup$row[0]').style.display = 'block';
            }

            function closePopup$row[0]() {
                document.getElementById('popup$row[0]').style.display = 'none';
            }

            // function confirmPurchase$row[0]() {
            //     alert('purchase success!');
            //     closePopup$row[0]();
            // }

            function cancelPurchase$row[0]() {
                alert('cancel purchase!');
                closePopup$row[0]();
            }

            function calculateTotal$row[0]() {
                var price = $row[3]; // unit price
                var quantity = document.getElementById('quantity$row[0]').value;
                var totalPrice = price * quantity;
                document.getElementById('totalPrice$row[0]').value = totalPrice.toString();
            }
            </script>";
        } else {
            echo   "<div class='product'>
                        <div class='product-info'>
                            <div class='stock'>Inventory: $row[2]</div>
                            <div class='picshow'>
                                <img src='data:image/webp;base64," . base64_encode($row['image']) . "' style='width: 250px; padding: 10px; '>
                            </div>
                            <div class='name-price'>
                            <div class='name'>$row[1]</div>
                            <div class='price'>$$row[3]</div>
                            </div>
                        </div>
                        <div class='actions'>
                            <button class='full-width-button' style='border-radius:8px; width: 100%; background-color: #666666; color: white; border: none; padding: 10px; display: flex; align-items: center; justify-content: center; ' onclick='openPopup$row[0]()' data_item_id='$row[0]' react='buy'>
                                <img src='sell_items.png' alt='Buy Icon' style='margin-right: 10px; filter: invert(100%); '>
                                <span style='font-size: 28px; '>&ensp;&ensp;&ensp;&ensp;&ensp;Sell&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</span>
                            </button>
                        </div>
                    </div>";
        echo   "<div id='popup$row[0]' class='popup'>
                    <img src='data:image/webp;base64," . base64_encode($row['image']) . "' alt='$row[1]'>
                    <div>
                        <p>Item: <input style='border: 0px; outline: none; ' value='$row[1]' readonly/></p>
                        <p>Unit Price: $<input style='border: 0px; outline: none; ' value='$row[3]' readonly/></p>
                        <div id='quantitytobuy' style='text-align: center; '>
                            <input placeholder='Quantity to Purchase' type='number' id='quantity$row[0]' name='quantity' min='1' oninput='calculateTotal$row[0]()' readonly>
                        </div>
                    </div>
                    <div style='text-align: center;'>
                        <p>Total Price: $<input type='number' id='totalPrice$row[0]' class='total-price' value='0' style='border: 0px; outline: none; ' readonly/></p>
                        <div style='background-color: #f4d6d2; color: #ca3120 ; padding: 5px; width: 100%; border-radius: 5px; '>You cannot sell this item, <br>as the price is over $2000.</div>
                        <div>
                            <button id=\"send\" onclick='confirmPurchase$row[0]()' disabled='true' style='background-color:#888888 ;'>Confirm</button><button onclick='cancelPurchase$row[0]()'>Cancel</button>
                        </div>
                    </div>
                    <p id='priceunit$row[0]' style='display: none; '>$row[3]</p>
                </div>";
        echo   "<script>
                    

                    function openPopup$row[0]() {

                        document.getElementById('popup$row[0]').style.display = 'block';
                    }

                    function closePopup$row[0]() {
                        document.getElementById('popup$row[0]').style.display = 'none';
                    }

                    function confirmPurchase$row[0]() {
                        alert('purchase success!');
                        closePopup$row[0]();
                    }

                    function cancelPurchase$row[0]() {
                        alert('cancel purchase!');
                        closePopup$row[0]();
                    }

                    function calculateTotal$row[0]() {
                        var price = $row[3]; // unit price
                        var quantity = document.getElementById('quantity$row[0]').value;
                        var totalPrice = price * quantity;
                        document.getElementById('totalPrice$row[0]').value = totalPrice.toString();
                    }
                </script>";
        }
    } else {
        echo   "<div class='product'>
        <div class='product-info'>
            <div class='stock' style='background-color: #666666; '>Inventory: $row[2]</div>
            <div class='picshow'>
                <img src='data:image/webp;base64," . base64_encode($row['image']) . "' style='width: 250px; padding: 10px; '>
            </div>
            <div class='name-price'>
            <div class='name'>$row[1]</div>
            <div class='price'>$$row[3]</div>
            </div>
        </div>
        <div class='actions'>
            <button class='full-width-button' style='border-radius:8px; width: 100%; background-color: #666666; color: white; border: none; padding: 10px; display: flex; align-items: center; justify-content: center; ' onclick='openPopup$row[0]()' data_item_id='$row[0]' react='buy'>
                <img src='sell_items.png' alt='Buy Icon' style='margin-right: 10px; filter: invert(100%); '>
                <span style='font-size: 28px; '>&ensp;&ensp;&ensp;&ensp;&ensp;Sell&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</span>
            </button>
        </div>
    </div>";
echo   "<div id='popup$row[0]' class='popup'>
    <img src='data:image/webp;base64," . base64_encode($row['image']) . "' alt='$row[1]'>
    <div>
        <p>Item: <input style='border: 0px; outline: none; ' value='$row[1]' readonly/></p>
        <p>Unit Price: $<input style='border: 0px; outline: none; ' value='$row[3]' readonly/></p>
        <div id='quantitytobuy' style='text-align: center; '>
            <input placeholder='Quantity to Purchase' type='number' id='quantity$row[0]' name='quantity' min='1' oninput='calculateTotal$row[0]()' readonly>
        </div>
    </div>
    <div style='text-align: center;'>
        <p>Total Price: $<input type='number' id='totalPrice$row[0]' class='total-price' value='0' style='border: 0px; outline: none; ' readonly/></p>
        <div style='background-color: #f4d6d2; color: #ca3120 ; padding: 5px; width: 100%; border-radius: 5px; '>You cannot sell this item, <br>as the price is over $2000.</div>
        <div>
            <button id=\"send\" onclick='confirmPurchase$row[0]()' disabled='true' style='background-color:#888888 ;'>Confirm</button><button onclick='cancelPurchase$row[0]()'>Cancel</button>
        </div>
    </div>
    <p id='priceunit$row[0]' style='display: none; '>$row[3]</p>
</div>";
echo   "<script>
    

    function openPopup$row[0]() {

        document.getElementById('popup$row[0]').style.display = 'block';
    }

    function closePopup$row[0]() {
        document.getElementById('popup$row[0]').style.display = 'none';
    }

    function confirmPurchase$row[0]() {
        alert('purchase success!');
        closePopup$row[0]();
    }

    function cancelPurchase$row[0]() {
        alert('cancel purchase!');
        closePopup$row[0]();
    }

    function calculateTotal$row[0]() {
        var price = $row[3]; // unit price
        var quantity = document.getElementById('quantity$row[0]').value;
        var totalPrice = price * quantity;
        document.getElementById('totalPrice$row[0]').value = totalPrice.toString();
    }
</script>";
    }
}
?>


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

/*
    function openPopup() {
        document.getElementById('popup').style.display = 'block';
    }

    function closePopup() {
        document.getElementById('popup').style.display = 'none';
    }
*/
?>
</body>
</html>