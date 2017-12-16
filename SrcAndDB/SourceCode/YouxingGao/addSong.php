<?php
 session_start();

 $_SESSION['search']=$_POST['search'];
 $_SESSION['flag']=$_POST['flag'];
$connect = mysqli_connect("localhost", "root","root","project1"); 
$pid = $_POST['playlist'];
$tid = $_POST['trid'];
mysqli_query($connect, "insert into `PlaylistContain`(pid, tid) values('$pid','$tid')");

 header("Location: playify.php");
?>

