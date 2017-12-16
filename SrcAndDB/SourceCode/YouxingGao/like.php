<?php

 session_start();
$uid = $_SESSION['uid'];
$connect = mysqli_connect("localhost", "root","root","project1"); 
$aid = $_POST['aid'];

 $_SESSION['search']=$_POST['search'];
$result1 = mysqli_query($connect, "insert into `Like`(uid, aid) values('$uid','$aid')");
$_SESSION['flag']=$_POST['flag'];
 header("Location: playify.php");
            
 

?>

