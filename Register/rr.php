<?php
session_start();
$message='';
if(isset($_SESSION['rmail_alert'])){
  $message ='Email already exists';
}

?>
<?php

include_once('../config/config.php');

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
  // echo $folder;


  
  $emailquery = "SELECT * FROM register WHERE email='$email' ";
  $query = mysqli_query($conn, $emailquery);

  $emailcount = mysqli_num_rows($query);
   if($Emailcount>0){
    $_SESSION['email_alert']='1';
    header("location: ./rr.php") ;
  }else{

  if (move_uploaded_file($tempname, $folder)) {
    $insertquery = "INSERT INTO register (firstname, lastname, email, password, pno, gender, image_name, status) 
  VALUES ('$firstname','$lastname','$email','$password','$pno','$gender','$folder', 0)";

    $iquery = mysqli_query($conn, $insertquery); {
     header("location: ../Login/signin.php?msg= successfully Registered");
   ?><script>alert('successfully registered');</script><?php
      
    }
  }

  }
}
?>





<html>

<head>
  <title>Registration Page</title>
  <link rel="stylesheet" type="text/css" href="../Register/bootstrap.php" />
</head>

<body>
  <div class="container">

    <div class="row col-md-6 col-md-offset-3">
      <div class="panel panel-primary">
        <div class="panel-heading text-center">
          <center>
            <div class="tiltle"><i><b>Sajilo Deraa</i></b></div>
          </center>
          <h1>Registration Form</h1>
          <h4><?php echo $message; ?></h4>
        </div>
        <div class="panel-body">
          <form action="#" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="firstname">First Name</label>
              <input type="text" class="form-control" name="firstname" />
            </div>
            <div class="form-group">
              <label for="lastname">Last Name</label>
              <input type="text" class="form-control" name="lastname" />
            </div>
            <div class="form-group">
              <label for="gender">Gender</label>
              <div>
                <label for="male" class="radio-inline"><input type="radio" name="gender" value="Male" />Male</label>
                <label for="female" class="radio-inline"><input type="radio" name="gender" value="Female" />Female</label>
                <label for="others" class="radio-inline"><input type="radio" name="gender" value="Other" />Others</label>
              </div>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" />
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" />
            </div>
        </div>

        <div class="form-group">
          <label for="pno">Phone Number</label>
          <input type="pno" class="form-control" name="pno" />
        </div>

        <div class="form-group">
          <label for="img">Upload your Identity</label>
          <input type="file" class="form-control" name="image" />(any document that reflects your identity)
        </div>
        <center><input type="submit" name="submit" class="btn btn-primary" /></center>
        </form>

      </div>


    </div>
  </div>
  </div>
  </div>

  </div>
</body>

</html>


<!--?php
include '../config/config.php';

    // When form submitted, insert values into the database.
    if (isset($_REQUEST['firstname'])) {
        // removes backslashes
        $firstname = stripslashes($_REQUEST['firstname']);
        //escapes special characters in a string
        $firstname = mysqli_real_escape_string($conn, $firstname);
        $lastname   = stripslashes($_REQUEST['lastname']);
        $lastname   = mysqli_real_escape_string($conn, $lastname);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($conn, $email);
        $pno    = stripslashes($_REQUEST['pno']);
        $pno    = mysqli_real_escape_string($conn, $pno);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $gender = mysqli_real_escape_string($conn, $gender);
        $gender = stripslashes($_REQUEST['gender']);
        //$img = stripslashes($_REQUEST['img']);
        if(isset($_files['image']['name'])){
            $image_name = $_files['image']['name'];
            if($image_name != "")
            {
                $ext = end(explode('.', $image_name));
                $image_name = "image_name" . rand(0000, 9999) . "." . $ext;
                $src = $_files['image_name']['tmp_name'];
                $dst= "I:/New folder/htdocs/Project/Images/upload/" . $image_name;
                $upload =move_upload_file($src, $dst);
                if($upload == false)
                {
                  header('location:./rr.php');
                  die();
                }
              }
                else{
                  $img = "";
                }
            }
        $query    = "INSERT into `register` (firstname, lastname,email,password,pno,gender,image_name)
                     VALUES ('$firstname', '$lastname','$email', '$password','$pno','$gender','$image_name')";
        $result   = mysqli_query($conn, $query);
        
        if ($result)
          {
          
            //create a session variable to display  message
            
            $_SESSION['add'] = "<div class='success'>User Added Successfully</div>";
            //redirect page to manage admin
            header('location:../Login/signin.php');
        } else {
            //Failed to inserted
            //echo"Failed to insert data";
            //create a session variable to display  message
            $_SESSION['add'] = "<div class='error'>Failed tO Add User</div>";
            //redirect page to add admin
            header("location:" . SITEURL . 'register.php');
            
          }
    
    }
    ?-->