<?php
require '../config/config.php';
if(isset($_POST["submit"])){
  $price= $_POST["price"];
  $description= $_POST["description"];
  $email= $_POST["email"];
  $latitude= $_POST["latitude"];
  $longitude= $_POST["longitude"];
  $district= $_POST["district"];
  $vdc= $_POST["vdc"];
  $ward= $_POST["ward"];
  $filename = $_FILES["img"]["name"];
  $tempname = $_FILES["img"]["tmp_name"];
  $folder = "../Images/upload/" . $filename;
  if (move_uploaded_file($tempname, $folder)) {
  $insertquery = "INSERT INTO upload (price, description, email, latitude, longitude, district, vdc, ward, image) 
  VALUES ('$price','$description','$email','$latitude','$longitude', '$district', '$vdc', '$ward', '$folder')";
  $iquery = mysqli_query($conn, $insertquery);
  echo"successful";

  echo"<script> alert('Data Added Successfully');
  document.location.href=''; </script>";
  $iquery = mysqli_query($conn, $insertquery); {
    header("location: ../Welcome/Welcome.php");
  }
}
}
?>




        
        <DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Upload Page</title>
    <link rel="stylesheet" type="text/css" href="../Register/bootstrap.php" />
  </head>
  <body onload= "getLocation();">
  
    <div class="container">
      <div class="row col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
          <div class="panel-heading text-center">
          <marquee>Dont forget to delete room details later if it is occupied</marquee>
            <h1>Upload Form</h1><p>
            <h6> Upload your Room Details</h6>
          </div>
          <div class="panel-body" >
            <form class="myForm" action="#" method="post" autocomplete="off" enctype="multipart/form-data">
              
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                <input
                  type="text"
                  class="form-control"
                  name="price"
                  required value=""
                />
              </div><br>
              <div class="form-group">
                <label for="description">Description</label>
                <input
                  type="text"  placeholder="Describe about your room and facilities"
                  class="form-control"
                  name="description"
                  required value=""
                />
              </div><br>
              
              <div class="form-group">
                <label for="img">Select Room Image</label>
                <input
                  type="file"
                  class="form-control"
                  name="img"
                  required value=""
                />
              </div><br>
              <div class="myForm">
              <label for="latitude">Location</label> (Location will be automatically detected if allowed location)<br>
              <input type="text" name="latitude" Placeholder="latitude" value="" >
              <input type="text" name="longitude" Placeholder="longitude" value="" >
</div><br>
<div class="form-group"><label for="district">Address</label><br>
              <input type="text" name="district" Placeholder="District" required value="">
              <input type="text" name="vdc" Placeholder="VDC/Municipality" required value="">
              <input type="text" name="ward" Placeholder="Ward No." required value=""><br></div>
              
              <br><div class="form-group">
                <label for="email">Email</label>
                <input
                  type="text"
                  class="form-control"
                  name="email"
                  required value=""
                />
              </div><br>
              

              <center><input type="submit" name="submit" value="Upload" class="btn btn-primary" /></center>
            </form>
            
            <script type="text/javascript">
              function getLocation(){
                if(navigator.geolocation){
                  navigator.geolocation.getCurrentPosition(showPosition, showError);
                }
              }
              function showPosition(position){
                document.querySelector('.myForm input[name="latitude"]').value = position.coords.latitude;
                document.querySelector('.myForm input[name="longitude"]').value = position.coords.longitude;
              }
              function showError(error){
                switch(error.code){
                  case error.PERMISSION_DENIED:
                    
                    Alert("You must allow request For Location to automatically get your location in Google Maps ");
                    location.reload();
                    break;
                }
              }
              </script>
              <br>
              
          </div>
          
            
          </div>
        </div>
      </div>
  
  </body>
</html>

<!--?php
include '../config/config.php';

    // When form submitted, insert values into the database.
    if (isset($_POST['submit'])) { //&& isset($_FILES['my-image'])){
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $pno = $_POST['pno'];
      $gender = $_POST['gender'];
      //$Identity = mysqli_real_escape_string($conn, $_POST['Identity']);
      $filename = $_FILES["image"]["name"];
      $tempname = $_FILES["image"]["tmp_name"];
      $folder = "../Images/" . $filename;
        $query    = "INSERT INTO `upload`(`location`, `price`, `description`, `image`, `u_id`) 
                     VALUES ('$location','$price','$description','$img','')";
        $result   = mysqli_query($conn, $query);
        if ($result) {
            //create a session variable to display  message
            $_SESSION['add'] = "<div class='success'> Uploaded Successfully</div>";
            //redirect page to manage admin
            header('location:../Welcome/Welcome.php');
        } else {
            //Failed to inserted
            //echo"Failed to insert data";
            //create a session variable to display  message
            $_SESSION['add'] = "<div class='error'>Failed to Upload</div>";
            //redirect page to add admin
            header('location:./upload.php');
        }
    } 
    ?>-->