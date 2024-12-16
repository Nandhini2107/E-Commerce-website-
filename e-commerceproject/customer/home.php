
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: Orchid;
            margin: 0;
            padding: 0;
        }
            .own-card {
            width: 300px;
            height: 400px;
            display: inline-block;
            background-color: MistyRose;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            margin: 10px;
            padding: 10px;
            box-sizing: border-box;
            overflow: hidden;
        }

        .own-card:hover {
            transform: scale(1.05);
        }
        .own-card div {
            margin-bottom: 5px;
        }
        .name {
            font-size: 25px; 
            font-style:Bold;
            color: Black; 
        }
        .price {
            font-size: 20px; 
            font-style:italic;
            color: #9F10C8; 
        }
        .detail {
            font-size: 16px;
            color: Blue;
        }
        .username{
            font-size:10px;
            color:Grey;
        }

        .own-card img {
            width: 65%;
            height: auto;
            margin-bottom: 10px;
        }
        .own-card {
            position: relative;
            text-align: center; /* Center text content */
        }
        .add-to-cart-btn {
            position: absolute;
            bottom: 10px; /* Adjust the distance from the bottom */
            left: 50%; /* Center horizontally */
            transform: translateX(-50%);
            padding: 8px;
            background-color: #28a745;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .add-to-cart-btn:hover {
            background-color: Gold;
        }
    </style>
</head>
<body>

<?php
include "authguard.php";
include "menu.html";
include "../shared/connection.php";

$sql_result = mysqli_query($conn, "select * from product join user on product.owner=user.userid");

while ($dbrow = mysqli_fetch_assoc($sql_result)) {
    echo "<div class='own-card'>
              <div class='name'><strong>{$dbrow['name']}</strong></div>
              <div class='price'>Price: $ {$dbrow['price']}</div>
              
              <div class='detail'>Description:  {$dbrow['detail']}</div>
              <div class='pdtimg'>
                <img src='$dbrow[impath]' alt='$dbrow[name]'>
              </div>
              <div class='username'>Vendor: {$dbrow['username']}</div>
              <div>
                <a href='addcart.php?pid=$dbrow[pid]' class='add-to-cart-btn'>ADD TO CART</a>
              </div>
          </div>";
}

?>

</body>
</html>