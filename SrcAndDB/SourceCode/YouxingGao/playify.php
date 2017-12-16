<!DOCTYPE html>
<?php
session_start();
$connect = mysqli_connect("localhost", "root","root","project1");
$uid = $_SESSION['uid'];
$result = mysqli_query($connect, "select * from `User` where  uid = '$uid'");
$flag = $_SESSION['flag'];
$resultMyLists = mysqli_query($connect,"select * from Playlist where uid = '$uid'");
$resultMyList = mysqli_query($connect,"select * from Playlist where uid = '$uid'");
while ($rows = $result->fetch_assoc()){
    $image_path = $rows['imagePath'];
}

?>
<html lang="en">

<head>
<style>
.redtext {
        color: red;
}
form {
    display: inline-block; 
}
.greentext {
        color: green;
}
</style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Playify</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/search.css" rel="stylesheet">
    <link href="css/simple-sidebar-right.css" rel="stylesheet">

   
  
     <?php include'search.php' ?>
   
    
</head>


<body>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg" >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <form action="" method="post" id = "test">
            <input type="text" name="search">
           
<!--            <button > <input type="submit" name="submit" value="Search" >-->
            
          </form>
          <button type="submit" name="action" class="btn btn-info btn-lg" form ="test" data-toggle="modal" data-target="#Tracks" > Search</button>
          
        </div>
      </div>
    </div>
  </div>
  
  <div id="myModal3" class="modal fade" role="dialog" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">My Lists</h4>
      </div>
      <div class="modal-body">
          <form action="playlist.php" method="post">
             
              <input type="hidden" name="search" value="<?php echo $search?>"> 
                <input type="hidden" name="flag" value="<?php echo $flag?>"> 
              <select  name = "pid">
                  <?php
                  if ($resultMyList->num_rows > 0){
                  while ($row_s = $resultMyList->fetch_assoc()) {
                      $pid = $row_s['pid'];
                      $ptitle = $row_s['ptitle'];
                      echo "<option value='$pid'>$ptitle</option>";
                      
                  }
                  
                  }
                  
                  ?>
                  
                  
                  
              </select>
              <input type="submit" value="show detail">
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  
  
  
  
  
  <!-- Modal -->
<div id="Tracks" class="modal fade" role="dialog" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">My Lists</h4>
      </div>
      <div class="modal-body">
          <form action="addSong.php" method="post">
              <input type="hidden" name="trid" id="trids"  value="">
              <input type="hidden" name="search" value="<?php echo $search?>"> 
                <input type="hidden" name="flag" value="<?php echo $flag?>"> 
              <select  name = "playlist">
                  <?php
                  if ($resultMyLists->num_rows > 0){
                  while ($row_s = $resultMyLists->fetch_assoc()) {
                      $pid = $row_s['pid'];
                      $ptitle = $row_s['ptitle'];
                      echo "<option value='$pid'>$ptitle</option>";
                      
                  }
                  
                  }
                  
                  ?>
                  
                  
                  
              </select>
              <input type="submit" value="add">
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  
  
  
  
  
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                        <img src="images/spotify_logo.png" alt="" id="spotify-logo" />
                </li>
                <li>
                  <a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-search"></span><br>&emsp;&ensp;&nbsp;Search</a>
                </li>
                <li>
                    <a href="browse.php"><span class="glyphicon glyphicon-align-justify"></span><br>&emsp;&ensp;Browse</a>
                </li>
                <li>
                    <a href="#"data-toggle="modal" data-target="#myModal3"><span class="glyphicon glyphicon-music"></span><br>&ensp;My Lists</a>
                </li>
                <li>
                  <a href="#"data-toggle="modal" data-target="#myModal2" ><span class="glyphicon glyphicon-plus"></span><br>&emsp;&ensp;Playlist</a>
                </li>
                <br><br><br><br><br><br><br>
                <hr>
                <li>
                    <?php
                    if($image_path === NULL)
                    {
                        echo "<img class='img-circle' src='images/spotify_logo.png' />";
                    
                    }else{
                        echo "<img class='img-circle' src='$image_path' />";
                    }
                    
                    ?>
                </li>
                <li>
                    <a href="profile.php" id="settings"><span class="glyphicon glyphicon-cog"></span> <br>&emsp;set</a>
                    <a href="logout.php" id="logout"><span class="glyphicon glyphicon-off"></span><br>&emsp;logout</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Sidebar -->
        
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <script >
function clear_div(id) {
    document.getElementById(id).innerHTML = "";
}


    

</script>






        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-1"></div>
                    <div class="col-lg-8">
                      <div class="clearfix"></div>
                      <ul id="playlist">
                       <?php   if($flag === "yes"){
                           
                       ?>
                          
                            <button type="button" class="btn btn-info btn-lg" onclick="clear_div('artistList')"> Hide Artist</button>
                             <button type="button" class="btn btn-info btn-lg" onclick="clear_div('trackList')"> Hide Track</button>
                            <button type="button" class="btn btn-info btn-lg" onclick="clear_div('albumList')"> Hide Album</button>
                             <button type="button" class="btn btn-info btn-lg" onclick="clear_div('userList')"> Hide User</button>
                             <button type="button" class="btn btn-info btn-lg" onclick="clear_div('playList')"> Hide Playlist</button>
                             
                              <div id="artistList">
                                  <h2 class="center"> Artist List</h2>
                                  <ol type="1">
                                  <?php
                                  if ($resultSet->num_rows > 0){
                        while ($rows = $resultSet->fetch_assoc()) {
                             echo"<li>";
                             $aid = $rows['aid'];
                            
                             $temp_result = mysqli_query($connect, "select * from `Like` where aid = '$aid' and uid = '$uid'");
                             if(mysqli_num_rows($temp_result) > 0){
                                 ?>
                
                              <form action="unLike.php" method = "POST">
                             <input type = "submit" class="redtext" value = "unLike"> 
                             <input type="hidden" name="search" value="<?php echo $search?>"> 
                             <input type="hidden" name="aid" value="<?php echo $rows['aid']?>"> 
                               <input type="hidden" name="flag" value="<?php echo $flag?>"> 
                             </form>
                            
                          <?php
                             }else {
          
                                 ?>
                                 <form action="like.php" method = "POST">
                             <input type = "submit" class="greentext" value = "Like"> 
                             <input type="hidden" name="search" value="<?php echo $search?>"> 
                            <input type="hidden" name="aid" value="<?php echo $rows['aid']?>"> 
                              <input type="hidden" name="flag" value="<?php echo $flag?>"> 
                             </form>
                                 
                                 <?php
                             }
                             
                       
                        echo "<p><div style='display: inline-block; text-align: left; width: 100%' >".$rows['aname']."</div><div style='display: inline-block; text-align: right; width: 100%' >".$rows['adesc']."</div></p>";
                        echo"</li>";
                            }
                        }
                                  
                                  ?>
                                  
                                  </ol>
                                  
                              </div>
                           
                                 <div id="trackList">
                                  <h2 class="center"> Track List</h2>
                                  <ol type="1">
                                    <?php
                                    if($resultTrack->num_rows>0){
                                          while ($rows = $resultTrack->fetch_assoc()) {
                             echo"<li>";
                             $tid = $rows['tid'];
//                             echo "<div id='button'> <span>
//                 
//                  <button id='play'></button>
//                  
//                 
//                  </span> </div>";
                             $temp_result = mysqli_query($connect, "select * from `Rate` where tid = '$tid' and uid = '$uid'");
                             if(mysqli_num_rows($temp_result) > 0){
                                 while($row = $temp_result->fetch_assoc()){
                                     $str = $row['stars'];
                                 }
                                 ?>
                
                             <label class="redtext"> Rated </label>
                             <label class="redtext"> <?php   echo $str ?> </label>
                             
                          <?php
                         
                             }else {
                             
                                 ?>
                                 <form action="Rate.php" method = "POST">
                             <input type = "submit" class="greentext" value = "Rate"> 
                             <input type="number" min = "0" max = "5" name="stars" value="" class="redtext">
                            <input type="hidden" name="tid" value="<?php echo $rows['tid']?>"> 
                            <input type="hidden" name="search" value="<?php echo $search?>"> 
                              <input type="hidden" name="flag" value="<?php echo $flag?>"> 
                             </form>
                                 
                                 <?php
                             }
                             echo "<a href='#Tracks' data-toggle='modal'  role='button' class='btn bcd' data-id='$tid'> + </a>";
                             if($tid === $_SESSION['playing']){
                                ?>
                             <form action="stop.php" method = "POST">
                             <input type = "submit" class="greentext" value = "stop"> 
        
                            <input type="hidden" name="search" value="<?php echo $search?>"> 
                            <input type="hidden" name="flag" value="<?php echo $flag?>"> 
                             </form>
                             
                             <?php
                             }else {
                                 ?>
                             <form action="play.php" method = "POST">
                             <input type = "submit" class="greentext" value = "play"> 
                             <input type="hidden"   name ="play" value="<?php echo $tid?>">
                            <input type="hidden" name="search" value="<?php echo $search?>"> 
                              <input type="hidden" name="flag" value="<?php echo $flag?>"> 
                             </form>
                             
                             <?php
                                 
                             }
                       
                        echo "<p><div style='display: inline-block; text-align: left; width: 100%' >".$rows['ttitle']."</div><div style='display: inline-block; text-align: right; width: 100%' >".$rows['aname']."</div></p>";
                        echo"</li>";
                            }
                                        
                                        
                                    }
                                    
                                    
                                    ?>   
                                 </ol>
                                 </div>
                              
                              <div id="albumList">
                                  <h2 class="center"> Album List</h2>
                                  <ol type="1">
                                  <?php
                                  if ($resultAlbum->num_rows > 0){
                        while ($rows = $resultAlbum->fetch_assoc()) {
                             echo"<li>";
                             
                             $alid = $rows['alid'];
                             $temp_result = mysqli_query($connect, "select * from `Track` where alid = '$alid'");
                             if(mysqli_num_rows($temp_result) > 0){
                             ?>
                                <form action="album.php" method = "POST">
                             <input type = "submit" class="greentext" value = "show"> 
                             <input type="hidden"   name ="alid" value="<?php echo $rows['alid']?>">
                            <input type="hidden" name="search" value="<?php echo $search?>"> 
                              <input type="hidden" name="flag" value="<?php echo $flag?>"> 
                             </form>
                                      
                          <?php
                             }else {
                                 echo " <label class='redtext'> No tracks </label>";
                             }
                        echo"<p>".$rows['atitle']."</p>";
                        
                        echo"</li>";
                            }
                        }
                                  
                                  ?>
                                  
                                  </ol>
                                  
                              </div>
                              
                              
                              <div id="userList">
                                  <h2 class="center"> User List</h2>
                                  <ol type="1">
                                  <?php
                                  if ($resultUser->num_rows > 0){
                        while ($rows = $resultUser->fetch_assoc()) {
                             echo"<li>";
                             $fuid = $rows['uid'];
                            
                             $temp_result = mysqli_query($connect, "select * from `Follow` where fuid = '$fuid' and uid = '$uid'");
                             if(mysqli_num_rows($temp_result) > 0){
                                 ?>
                
                              <form action="unFollow.php" method = "POST">
                             <input type = "submit" class="redtext" value = "unFollow"> 
                             <input type="hidden" name="search" value="<?php echo $search?>"> 
                             <input type="hidden" name="fuid" value="<?php echo $rows['uid']?>"> 
                               <input type="hidden" name="flag" value="<?php echo $flag?>"> 
                             </form>
                            
                          <?php
                             }else {
          
                                 ?>
                                 <form action="Follow.php" method = "POST">
                             <input type = "submit" class="greentext" value = "Follow"> 
                             <input type="hidden" name="search" value="<?php echo $search?>"> 
                            <input type="hidden" name="fuid" value="<?php echo $rows['uid']?>">
                              <input type="hidden" name="flag" value="<?php echo $flag?>"> 
                             </form>
                                 
                                 <?php
                             }
                           
                       
                        
                        
                        echo "<p><div style='display: inline-block; text-align: left; width: 100%' >".$rows['uname']."</div><div style='display: inline-block; text-align: right; width: 100%' >".$rows['uage']."</div></p>";
                        echo"</li>";
                            }
                        }
                                  
                                  ?>
                                  
                                  </ol>
                                  
                              </div>
                              <div id="playList">
                                  <h2 class="center"> PlayLists</h2>
                                  <ol type="1">
                                  <?php
                                  if ($resultPlaylist->num_rows > 0){
                        while ($rows = $resultPlaylist->fetch_assoc()) {
                             echo"<li>";
                             
                             $pid = $rows['pid'];
                             $temp_result = mysqli_query($connect, "select * from `PlaylistContain` where pid = '$pid'");
                             if(mysqli_num_rows($temp_result) > 0){
                             ?>
                                <form action="playlist.php" method = "POST">
                             <input type = "submit" class="greentext" value = "show"> 
                             <input type="hidden"   name ="pid" value="<?php echo $rows['pid']?>">
                            <input type="hidden" name="search" value="<?php echo $search?>"> 
                              <input type="hidden" name="flag" value="<?php echo $flag?>"> 
                             </form>
                                      
                          <?php
                             }else {
                                 echo " <label class='redtext'> No tracks </label>";
                             }
                        echo"<p><div style='display: inline-block; text-align: left; width: 100%' >".$rows['ptitle']."</div><div style='display: inline-block; text-align: right; width: 100%' >".$rows['pdesc']."</div></p>";
                        
                        echo"</li>";
                            }
                        }
                                  
                                  ?>
                                  
                                  </ol>
                                  
                              </div>
                        
                        <?php   
                        
                        
                       }else{
                            ?>
                            <h2 class="center"> Hot Track List</h2>
                                  <ol type="1">
                                    <?php
                                    $hotTrack = mysqli_query($connect,"SELECT tid, avg(stars) as av_star from Rate group by tid HAVING(avg(stars)>=3)");
                                    if($hotTrack->num_rows>0){
                                          while ($rows = $hotTrack->fetch_assoc()) {
                             echo"<li>";
                             $tid = $rows['tid'];
                              $result_Track = mysqli_query($connect, "select * from `Track` where tid = '$tid' ");
                              if($result_Track->num_rows>0){
                              while ($row = $result_Track->fetch_assoc()) {
                                  $ttitle = $row['ttitle'];
                                  $aname = $row['aname'];
                              }
                              
                              }
                             
//                             echo "<div id='button'> <span>
//                 
//                  <button id='play'></button>
//                  
//                 
//                  </span> </div>";
                             $temp_result = mysqli_query($connect, "select * from `Rate` where tid = '$tid' and uid = '$uid'");
                             if(mysqli_num_rows($temp_result) > 0){
                                 while($row = $temp_result->fetch_assoc()){
                                     $str = $row['stars'];
                                 }
                                 ?>
                
                             <label class="redtext"> Rated </label>
                             <label class="redtext"> <?php   echo $str ?> </label>
                             
                          <?php
                         
                             }else {
                             
                                 ?>
                                 <form action="Rate.php" method = "POST">
                             <input type = "submit" class="greentext" value = "Rate"> 
                             <input type="number" min = "0" max = "5" name="stars" value="" class="redtext">
                            <input type="hidden" name="tid" value="<?php echo $rows['tid']?>"> 
                            <input type="hidden" name="search" value="<?php echo $search?>"> 
                              <input type="hidden" name="flag" value="<?php echo $flag?>"> 
                             </form>
                                 
                                 <?php
                             }
                             echo "<a href='#Tracks' data-toggle='modal'  role='button' class='btn bcd' data-id='$tid'> + </a>";
                             if($tid === $_SESSION['playing']){
                                ?>
                             <form action="stop.php" method = "POST">
                             <input type = "submit" class="greentext" value = "stop"> 
        
                            <input type="hidden" name="search" value="<?php echo $search?>"> 
                            <input type="hidden" name="flag" value="<?php echo $flag?>"> 
                             </form>
                             
                             <?php
                             }else {
                                 ?>
                             <form action="play.php" method = "POST">
                             <input type = "submit" class="greentext" value = "play"> 
                             <input type="hidden"   name ="play" value="<?php echo $tid?>">
                            <input type="hidden" name="search" value="<?php echo $search?>"> 
                             <input type="hidden" name="flag" value="<?php echo $flag?>"> 
                             </form>
                             
                             <?php
                                 
                             }
                        echo"<p><div style='display: inline-block; text-align: left; width: 100%' >".$ttitle."</div> ";
                        echo "<div style='display: inline-block; text-align: right; width: 100%'> ". $aname."</div></p>";
                        echo"</li>";
                            }
                                        
                                        
                                    }
                                    
                                    
                                    ?>   
                                 </ol>
                           
                           
                           
                           
                           
                           
                          
                           
                        <?php   
                       }
                       
                       
                     ?>
                              
                              
                        
                       
                        
                           
                    
                        
                          </p>
                          <?php
if($_SESSION['playing'] === NULL){
    
}else{
    $playing = $_SESSION['playing'];
    echo " <iframe src='https://open.spotify.com/embed?uri=spotify%3Atrack%3A".$playing."' width='600' height='80' frameborder='0' allowtransparency='true'></iframe>";
}
?>


                          
                      </ul>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Modal -->

  <div class="container" >

  <!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-lg" id="myModal2">
      <div class="modal-content"id="myModal2">
        <div class="modal-header"id="myModal2">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add A Playlist</h4>
          <hr>
          <form action="addlist.php" method="post">
            <fieldset class="form-group">
              <label for="inputFileName">Playlist Name</label>
              <input type="text" name="ptitle"class="form-control" id="inputFileName" placeholder="Make sure to enter the playlist name correctly">
            </fieldset>
            <fieldset class="form-group">
              <label for="coverSubmit">Description</label>
              <input type="text" name="pdesc" class="form-control" id="coverSubmit" placeholder="Make sure to enter the description correctly">
            </fieldset>
            <fieldset class="form-group">
              <label for="artistSubmit">Availability(public or private)</label>
              <input type="number" name="pavailable" min= "0" max = "1" class="form-control"  placeholder="0/1">
               <input type="hidden" name="search" value="<?php echo $search?>"> 
               <input type="hidden" name="flag" value="<?php echo $flag?>"> 
            </fieldset>
            
            <button type="submit" class="btn btn-primary">add</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    
    
   
    </script>
    <script>
    $('.bcd').click(function(){
        $('#trids').val($(this).attr('data-id'));
    });
</script>

</body>

</html>
