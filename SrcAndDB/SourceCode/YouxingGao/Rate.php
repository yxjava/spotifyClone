<?php
 session_start();
$uid = $_SESSION['uid'];
$connect = mysqli_connect("localhost", "root","root","project1"); 
$stars = $_POST['stars'];
$tid = $_POST['tid'];
 $_SESSION['search']=$_POST['search'];
$result1 = mysqli_query($connect, "insert into `Rate`(uid, tid,stars) values('$uid','$tid','$stars')");
$_SESSION['flag']=$_POST['flag'];
 header("Location: playify.php");
            die("Redirecting to: playify.php");  


?>

