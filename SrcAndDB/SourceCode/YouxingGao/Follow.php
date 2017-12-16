<?php
session_start();
$uid = $_SESSION['uid'];
$connect = mysqli_connect("localhost", "root","root","project1"); 
$fuid = $_POST['fuid'];

 $_SESSION['search']=$_POST['search'];
$result1 = mysqli_query($connect, "insert into `Follow`(uid, fuid) values('$uid','$fuid')");
$_SESSION['flag']=$_POST['flag'];
 header("Location: playify.php");
            
 

?>

