<?php
session_start();
$connect = mysqli_connect("localhost", "root","root","project1");
$uid = $_SESSION['uid'];

if(isset($_POST['submit'])){
    $target_dir = "images/";
$target_file = $target_dir . basename($_FILES["myimage"]["name"]);
move_uploaded_file($_FILES["myimage"]["tmp_name"], $target_file);
mysqli_query($connect, "update `User` set `imagePath` = '$target_file' where  uid = '$uid'");
}
$result = mysqli_query($connect, "select * from `User` where  uid = '$uid'");
while ($rows = $result->fetch_assoc()){
    $image_path = $rows['imagePath'];
}
$resultPreference = mysqli_query($connect, "select * from `profile` where  uid = '$uid'");
?>


<html>
    <style>
        body {
    background-color: lightblue;
    margin-left: auto;
   margin-right: auto;
}

h1 {
    color: red;
    
   margin-left: auto;
   margin-right: auto;
}
h2 {
    color: yellowgreen;

    margin-left: auto;
   margin-right: auto;
}
div {
    text-align: center;
}

.center {
    
    width: 50%;
    border: 1px solid white;
    padding: 10px;
    margin-left: auto;
   margin-right: auto;
}

.supercenter{
    
    width: 50%;
    padding: 2px;
    margin-left: auto;
   margin-right: auto;
}

input{
    align-content: center;
    background-color: #3CBC8D;
    color: white;
    margin-left: auto;
   margin-right: auto;
}
input[type=button], input[type=submit], input[type=reset] {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
   margin-left: auto;
   margin-right: auto;
    cursor: pointer;
}
.img-circle {
    margin-left: auto;
   margin-right: auto;
    width: 20%;
    border-radius: 50%;
}
textarea {
    width: 100%;
    height: 150px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    resize: none;
}
.myButton {
	background-color:#44c767;
	-moz-border-radius:28px;
	-webkit-border-radius:28px;
	border-radius:28px;
	border:1px solid #18ab29;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:17px;
	padding:16px 31px;
	text-decoration:none;
	text-shadow:0px 1px 0px #2f6627;
}
.myButton:hover {
	background-color:#5cbf2a;
}
.myButton:active {
	position:relative;
	top:1px;
}
      
        
        
    </style>
<body>
    <div >
        <div >
            <?php
            if($image_path === NULL)
            {
                
            ?>
            <h1 > No profile pictures!!!</h1>
    <img class='img-circle'  src='images/spotify_logo.png' />
    <?php
            }else {
                
               echo "<img class='img-circle'  src='$image_path' />";
                
            }
    
    ?>
        </div>
        <div >
            <div class="supercenter">
 <form method="POST" action="" enctype="multipart/form-data">
     <input type="file"  name="myimage">
 <input type="submit"  name="submit" value="Upload">
</form></div>
            <h2>Your Preferences </h2>
            <div class="supercenter">
            <ol type="1">
          <?php
          if($resultPreference -> num_rows>0){
              while($rows = $resultPreference -> fetch_assoc()){
                  $preference=$rows['preferrence'];
                  echo "<li><div class = 'supercenter'> $preference</div></li>";
              }
          }
          
          ?>
        </ol>
            </div>
            
            
            
            <div class="supercenter">
                <form method="POST" action="preference.php">
                    <input type="text" name="preference" placeholder="preference">
                    <input type="submit" name="submit_pref" value="Add">
                </form>
                
                
            </div>
            <div class="supercenter">
                
                <FORM METHOD="LINK" ACTION="playify.php">
                    <INPUT TYPE="submit"  class="myButton" VALUE="Done">
               </FORM>
            </div>
            
        </div>
    </div>
</body>
</html>


