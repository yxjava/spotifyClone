<?php

session_start();
$uid = $_SESSION['uid'];
$connect = mysqli_connect("localhost", "root","root","project1"); 
$aid = $_POST['aid'];

 $_SESSION['search']=$_POST['search'];
$result1 = mysqli_query($connect, "delete from `Like` where uid ='$uid' and aid ='$aid'");
$_SESSION['flag']=$_POST['flag'];
 header("Location: playify.php");
            
 

?>


