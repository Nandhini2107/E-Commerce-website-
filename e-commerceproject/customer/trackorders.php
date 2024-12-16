<!DOCTYPE html>
<html>
<head>
    <style>
        .order-list {
            list-style-type: none;
            padding: 0;
        }

        

        img {
            width: 10%;
            margin-bottom: 10px;
            float: left;
        }

        .own-card {
            border: 1px solid black;
            margin: 10px;
            padding: 10px;
            overflow:hidden;
        }

        .progress-bar {
            width: 100%;
            background-color: magenta;
            border-radius: 15px;
            overflow: hidden;
            margin-bottom: 10px;
        }

        

        
    </style>
</head>
<body>
    <?php
    include "authguard.php";
    include "menu.html";
    include "../shared/connection.php";

   
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql_result = mysqli_query($conn, "SELECT * FROM tracks WHERE userid=$_SESSION[userid]");

if (!$sql_result) {
    die("Query failed: " . mysqli_error($conn));
}

while ($dbrow = mysqli_fetch_assoc($sql_result)) {
    $statusClass = strtolower($dbrow['order_status']);
    $progressBarColor = '';

    // Determine progress bar color based on order status
    switch ($statusClass) {
        case 'cancelled!':
            $progressBarColor = 'red';
            break;
        case 'Delivered':
            $progressBarColor = 'green';

            break;
        case 'pending....':
            $progressBarColor = 'yellow';
            break;
        default:
            $progressBarColor = 'grey'; // Default color for unknown status
            break;
    }

    echo "<div class='own-card'>
             <div>Order ID: $dbrow[orderid]</div>
             <div>Username: $dbrow[username]</div>
             <div>Product: $dbrow[name]</div>
             <div>Price: $dbrow[price]</div>
             <div>Total Amount: $dbrow[total_amount]</div>
             <div>Delivery Address: $dbrow[address]</div>
             <div>Order Status: $dbrow[order_status]</div>
             <div class='pdtimg'>
                 <img src='$dbrow[impath]'>
            </div>
             <div style='background-color: $progressBarColor; height: 10px; width: 100%;'></div>
          </div>";
}


    mysqli_close($conn);
    ?>
</body>
</html>
