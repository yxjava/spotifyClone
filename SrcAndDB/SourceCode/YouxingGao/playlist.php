<?php
session_start();
$uid = $_SESSION['uid'];
$connect = mysqli_connect("localhost", "root","root","project1"); 

$pid = $_POST['pid'];
$search=$_POST['search'];
$flag = $_POST['flag'];
$resultTrack = mysqli_query($connect, "select * from `PlaylistContain` where pid = '$pid' ");
 ?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="first.css">
        <meta charset="UTF-8">
        <title>  </title>
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
    </head>
    <body>
 <h2 class="center"> Track List</h2>
 <div class="center">
                                  <ol type="1">
                                    <?php
                                    if($resultTrack->num_rows>0){
                                          while ($rows = $resultTrack->fetch_assoc()) {
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
                      
                        echo "<p><div style='display: inline-block; text-align: left; width: 100%' >".$ttitle."</div><div style='display: inline-block; text-align: right; width: 100%' >".$aname."</div></p>";
                        echo"</li>";
                            }
                                        
                                        
                                    }
                                    
                                    
                                    ?>   
                                 </ol>
 </div>

    </body>
</html>

