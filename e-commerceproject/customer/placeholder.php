<?php

$addr=$_POST['address'];

//create entery in order table
//get the inserted Id
//Loop the cart itmes insert into order detail table with order 10
$total=$_POST['total'];

include "authguard.php";
//$conn=new mysqli("localhost","root","","major_project",3306);
include "../shared/connection.php";

$sql_status=mysqli_query($conn,"insert into orders(username,userid,address,total_amount) 
values('$_SESSION[username]','$_SESSION[userid]','$addr',$total)");

$orderid=$conn->insert_id;

$sql_result=mysqli_query($conn,"select * from cart join product on cart.pid=product.pid where userid=$_SESSION[userid]");
while($dbrow=mysqli_fetch_assoc($sql_result)){
$insert_status=mysqli_query($conn,"insert into order_details(orderid,pid,name,price,details,impath,owner)
values($orderid,$dbrow[pid],'$dbrow[name]',$dbrow[price],'$dbrow[detail]','$dbrow[impath]','$dbrow[owner]')");
    if(!$insert_status){
        echo mysqli_error($conn);
    }

}





?>