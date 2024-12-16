<?php

$order_details_id=$_GET['order_details_id'];

include "../shared/connection.php";

$sql_result=mysqli_query($conn,"UPDATE order_details SET order_status='Delivered' WHERE order_details_id=$order_details_id");
if($sql_result)
{
    header("location:vieworders.php");
}
else
{
    echo "failed to deliver";
    echo mysqli_error($conn);
}


?>