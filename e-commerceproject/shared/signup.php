<?php
if(!isset($_POST['uname']) || !isset($_POST['upass1']))
{
    echo "MIssing params";
    die;
}
$conn=new mysqli("localhost","root","","major_project",3306);
$status=mysqli_query($conn,"insert into user(username,password,usertype) values('$_POST[uname]','$_POST[upass1]','$_POST[usertype]')");
if($status){
    echo"Registration is SUccessfull";
}
else{
    echo mysqli_error($conn);
}



?>