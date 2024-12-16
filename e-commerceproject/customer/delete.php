<?php
$cartid=$_GET['cartid'];
echo"Received Id=$cartid";
include "../shared/connection.php";
$sqli_result=mysqli_query($conn,"delete from cart where cartid=$cartid");
if($sqli_result){
    header("location:viewcart.php");
}
else{
    echo"Failed to Delete";
    echo mysqli_error($conn);
}

?>