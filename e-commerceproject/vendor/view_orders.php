<?php
include "authguard.php";
include "menu.html";
include "../shared/connection.php";

// Define CSS styles
echo "
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 2px solid #3A4E54;
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        padding-top: 12px;
        padding-bottom: 12px;
    }

    

    .button-container {
        display: flex;
        justify-content: space-around;
    }

    .button-container button {
        margin: 5px;
        padding: 5px 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .cancel-button {
        background-color: #ff0000;
        color: white;
    }

    .cancel-button:hover {
        background-color: #cc0000;
    }

    .delivery-button {
        background-color: #008000;
        color: white;
    }

    .delivery-button:hover {
        background-color: #006000;
    }

    .bright-row {
        background-color: #f0f0f0;
    }
</style>";

// Display table header
echo "
<table>
    <tr>
        <th>orderid</th>
        <th>pid</th>
        <th>product name</th>
        <th>product price</th>
        <th>image</th>
        <th>userid</th>
        <th>username</th>
        <th>address</th>
        <th>total amount</th>
        <th>status</th>
        <th>Progress</th>
    </tr>";

// Display data in the table
$sql_result = mysqli_query($conn, "SELECT * FROM order_details JOIN orders on order_details.orderid=orders.orderid WHERE owner=$_SESSION[userid]");


while ($dbrow = mysqli_fetch_assoc($sql_result)) {
    $status = isset($dbrow['status']) ? $dbrow['status'] : '';
    $status_class = $status == 'cancelled' ? 'bright-row' : '';
    echo "
    <tr class='$status_class'>
        <td>$dbrow[orderid]</td>
        <td>$dbrow[pid]</td>
        <td>$dbrow[name]</td>
        <td>$dbrow[price]</td>
        <td> <img src='$dbrow[impath]' width='50' ></td>
        <td>$dbrow[userid]</td>
        <td>$dbrow[username]</td>
        <td>$dbrow[address]</td>
        <td>$dbrow[total_amount]</td>
        <td>$dbrow[order_status]</td>
        
        <td class='button-container'>
        <button class='cancel-button' onclick='location.href=\"cancel.php?order_details_id=$dbrow[order_details_id]\"'>Cancel</button>
            <button class='delivery-button' onclick='location.href=\"delivery.php?orderid=$dbrow[orderid]\"'>Delivery</button>
        
    </tr>";
}
echo "</table>";


?>