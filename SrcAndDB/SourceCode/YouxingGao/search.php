
<?php

 
if (isset($_POST['action'])) {
  //connect to the database
   $flag = "yes";
   $_SESSION['flag']="yes";
  $_SESSION['search'] =$_POST['search'];
 
 

    
}

$search = $_SESSION['search'];

 $resultSet = mysqli_query($connect,"SELECT * FROM Artist WHERE aname LIKE '%$search%' or adesc like '%$search%'");

  $resultTrack = mysqli_query($connect,"SELECT * FROM Track WHERE ttitle LIKE '%$search%'");
  $resultAlbum = mysqli_query($connect,"SELECT * FROM Album WHERE atitle LIKE '%$search%'");
  $resultUser = mysqli_query($connect,"SELECT * FROM User WHERE uname LIKE '%$search%'");
  $resultPlaylist = mysqli_query($connect,"SELECT * FROM Playlist WHERE ptitle LIKE '%$search%' or pdesc like '%$search%' and pavailable='1'");
?>
