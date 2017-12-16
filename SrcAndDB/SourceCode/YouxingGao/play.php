<?php

 session_start();
$uid = $_SESSION['uid'];
$connect = mysqli_connect("localhost", "root","root","project1"); 
$tid = $_POST['play'];
$_SESSION['playing']= $tid;
 $_SESSION['search']=$_POST['search'];
$result1 = mysqli_query($connect, "insert into `Play`(uid, tid) values('$uid','$tid')");
$_SESSION['flag']=$_POST['flag'];
 header("Location: playify.php");
            
 

?>

