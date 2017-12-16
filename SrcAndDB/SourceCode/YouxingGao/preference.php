<?php
session_start();
$connect = mysqli_connect("localhost", "root","root","project1");
$uid = $_SESSION['uid'];
$prefer = $_POST['preference'];
mysqli_query($connect, "insert into  `profile` (uid,preferrence) values('$uid','$prefer')");
 header("Location: profile.php");
            die("Redirecting to: profile.php");


?>

