<?php
session_start();
$_SESSION['login_status']=false;
$uname=$_POST['uname'];
$upass=$_POST['upass'];
$conn=new mysqli("localhost","root","","major_project",3306);
$sql_result=mysqli_query($conn,"select * from user where username='$uname' and password='$upass'");
$no_of_rows=mysqli_num_rows($sql_result);
if($no_of_rows==0){
    echo"Invalid Credentials";
    die;
}
$dbrow=mysqli_fetch_assoc($sql_result);
echo "LOGIN  SUCCESS";
$_SESSION['login_status']=true;
$_SESSION['usertype']=$dbrow['usertype'];
$_SESSION['username']=$dbrow['username'];
$_SESSION['userid']=$dbrow['userid'];




if($dbrow['usertype']=='Vendor'){
    header("location:../vendor/home.php"); 
}
else if($dbrow['usertype']=='Customer'){
    header("location:../customer/home.php");

}

?> 