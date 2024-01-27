<?php
if(isset($_REQUEST['u_id'])){
  $u_id = $_REQUEST['u_id'];
  include_once('../config/config.php');

  $sqlDelete = "DELETE FROM upload WHERE u_id=$u_id;";

  $res = mysqli_query($conn, $sqlDelete);

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <title>Responsive Navigation Bar</title>
    <!---Fontawesome CDN Link-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <!----Custom CSS Filw Link--->
    <link rel="stylesheet" href="wcss.php">
    <nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
      <i class="fas fa-bars"></i>
    </label>
    <div class ="logo"><a href ="#"><img src ="../images/logo.png"></a>&emsp;
    <a href="./profile.php">Profile <img src="../Images/R (1).jpeg" alt="Avatar" class="avatar"></a>
    <style>
.avatar {
  vertical-align: text-bottom;
  width: 60px;
  height: 60px;
  border-radius: 40%;
  border-color: blue;
  line-height : 5px;
  line-height: 50px;
  padding: 40 120px;
}
</style>


</ul>
      <ul>
      <li><a class="active" href="./Welcome.php">Home</a></li>
      <li><a href="#">About Us</a></li>
      
      <li><a class="button-5" role="button" href="../Logout/logout.php">LOG OUT</a>
      </li>
    </ul>
  </nav>

  <div><br>
 <table><center>
<form action="#" method="post" enctype="multipart/form-data" style="height: 100px; width: 100px; border:2px;">
  <h2><label for="complain"><p style="color: violet; ">Report</p></label></h2><br>
              <div>
                <label for="complain" class="radio-inline"><input type="radio" name="complain" value="complain" />complaint</label>&emsp;&emsp;
                <label for="suggestion" class="radio-inline"><input type="radio" name="complain" value="suggestion" />Suggestion</label><br><br>
                <b>Details:</b><input type="text" name="details" placeholder="your complaint/suggestion"><br><br>
     <input type="submit" name="send">
  </form><center></table>
</head>
<body>

   <center> 
  
  <img src="../Images/R (1).jpeg" placeholder="Hi" width="10%" height="10%"> 
  
  <style>
    .body{
        background-size: 10% 10%;
    }
  </style></center>
</body>

<center>
    <table border = 3 cellspacing=1 cellpadding=10>
    <style>
h1 {color:red;}
h2{text-align: center;}

</style><h1>Your Uploads</h1>
        <tr><style>

    tr:first-child {
    background: yellow;
    text-align: center;
    }
    
    </style>
<table style="height: 35px;" width="354">

<td style="width: 64px; text-align: center;"><strong><span style="color: #0000ff;">Name</span></strong></td>
<td style="width: 64px; text-align: center;"><strong><span style="color: #0000ff;">Room</span></strong></td>
<td style="width: 64px; text-align: center;"><strong><span style="color: #0000ff;">Price</span></strong></td>
<td style="width: 64px; text-align: center;"><strong><span style="color: #0000ff;">Action</span></strong></td>
</center><br>

<?php 

include_once('../config/config.php');
session_start();
$email = $_SESSION['email'];
$sql = "SELECT * FROM register, upload WHERE register.email=upload.email AND upload.email='$email';";
$res = mysqli_query($conn, $sql);

if(mysqli_num_rows($res) > 0){
  while($row = mysqli_fetch_assoc($res)){
    echo '&emsp;&emsp;
    <center>
    <tr>
  
    <td style="width: 64px; height:40px; text-align: center;"><span style="color: #0000ff;">'. $row['firstname'].' '. $row['lastname'] .'</span></td>
    <td style="width: 64px; height:40px; text-align: center;"><span style="color: #0000ff;">R-'. $row['u_id'] .'</span></td>
    <td style="width: 64px; height:40px; text-align: center;"><span style="color: #0000ff;">'. $row['price'] .'</span></td>
    
    <td style="width: 80px; text-align: center;"><button><a href="./profile.php?u_id='. $row['u_id'] .'">Delete</a></button>
    <button><a href="./update.php?u_id='. $row['u_id'] .'">Update</button></td>
    
  
    </tr></center>
    
    ';?>
   

<?php
  }
}
?>

