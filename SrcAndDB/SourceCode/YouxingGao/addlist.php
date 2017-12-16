<?php
 session_start();
$uid = $_SESSION['uid'];
$ptitle = $_POST['ptitle'];
$pdesc = $_POST['pdesc'];
$pavailable = $_POST['pavailable'];
$connect = mysqli_connect("localhost", "root","root","project1"); 
$_SESSION['search']=$_POST['search'];
$_SESSION['flag']=$_POST['flag'];
mysqli_query($connect, "insert into Playlist(ptitle,pavailable,pdesc,uid) values('$ptitle','$pavailable','$pdesc','$uid')");
 header("Location: playify.php");
 ?>
