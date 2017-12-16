<?php

 session_start();
$uid = $_SESSION['uid'];
$connect = mysqli_connect("localhost", "root","root","project1"); 

$_SESSION['playing']= NULL;
 $_SESSION['search']=$_POST['search'];

$_SESSION['flag']=$_POST['flag'];
 header("Location: playify.php");
            
 

?>
