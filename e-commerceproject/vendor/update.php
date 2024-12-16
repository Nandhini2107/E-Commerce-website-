<?php

include "authguard.php";

//$conn=new mysqli("localhost","root","","major_project",3306);
include "../shared/connection.php";

$pid=$_POST['pid'];
$name=$_POST['name'];
$price=$_POST['price'];
$detail=$_POST['detail'];

if(isset($_FILES['image'])){
    $impath="../shared/images/".$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],$impath);
}
else{
    $impath=$_POST['old_image'];
}

$sql_result=mysqli_query($conn,"update product set name='$name', price=$price, detail='$detail', impath='$impath' where pid=$pid");
if($sql_result){
    $_SESSION['success_message'] = "Product updated successfully!";
    header("location:view.php");
}
else{
    echo"Failed to Update";
    echo mysqli_error($conn);
}
?>