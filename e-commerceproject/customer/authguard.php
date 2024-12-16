
<?php
session_start();
if(!isset($_SESSION['login_status'])){
    echo"Illegal Attempt,Login Bypassed";
    die;
}
if($_SESSION['login_status']==false){
    echo"unauthorised Access,403:Forbidden";
    die;
}
if($_SESSION['usertype']!='Customer'){
    echo"Permission Denied,Authorization Failed";
    die;

}


echo "<div class='d-flex justify-content-evenly'>"; 

echo "<div>" . $_SESSION['userid'] . "</div>"; 
echo "<div>" . $_SESSION['username'] . "</div>"; 

echo "<div><a href='../shared/logout.php'>Logout</a></div>";

echo "</div>";
?>

