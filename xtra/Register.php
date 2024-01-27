 <!--?php
 require_once("../config/config.php");

 $Email = $Password = $Confirm_Password;
 $Email_err = $Password_err = $Confirm_Password_err="";


 if($_SERVER['REQUEST_METHOD']=="POST"){
   if(empty(trim($_POST["Email"]))){
     $Email_err="Email cannot be blank";
   }
   else{
     $sql= "SELECT id FROM Email = ?";
     $stmt= mysqli_prepare($conn,$sql);
     if($stmt){
       mysqli_stmt_bind_param($stmt, "s", $param_Email);

       $param_username = trim($_POST['Email']);
       
       if(mysqli_stmt_execute($stmt)){
         mysqli_stmt_store_result($stmt);
         if(mysqli_stmt_num_rows($stmt)==1)
         {
           $Email_err = "This user is already taken";
         }
           else{
             $Email = trim($_POST['Email']);
           }
         }
         else {
           echo "Something went wrong";
         }
       }
           }
     mysqli_stmt_close($stmt);
   
   if(empty(trim($_POST['Password']))){
     $Password_err = "Password Cannot be blank";
   }
   elseif(strlen(trim($_POST['Password']))<5){
     $Password_err = "Password Cannot be less than 5 characters";
   }
   else{
     $Password = trim($_POST['Password']);
   }

   if(trim($_POST['Password']) != trim($_POST['Confirm_Password'])){
    $Confirm_Password_err = "Password should match";
   }
   if(empty($Email_err)&& empty($Password-err)&& empty($Confirm_Password_err))
   {
    $sql ="INSERT INTO users(Email, Password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
      mysqli_stmt_bind_param($stmt, "ss", $param_Email, $param_Password);
    
      $param_Email = $Email;
      $param_Password = Password_hash($Password, PASSWORD_DEFAULT);

      if(mysqli_stmt_execute($stmt)){
        header("location: signin.php");
      }
      else{
        echo" Something went wrong....";
      }
    }
    mysqli_stmt_close($stmt);
   }
   mysqli_close($conn);
 }
?--> 








<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="Rstyle.php">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php 

include '../config/config.php';

if(isset($_POST['submit'])) {//&& isset($_FILES['my-image'])){
  $First_Name = mysqli_real_escape_string($conn, $_POST['Fname']);
  $Last_Name = mysqli_real_escape_string($conn, $_POST['Lname']);
  $Email = mysqli_real_escape_string($conn, $_POST['Email']);
  $Phone = mysqli_real_escape_string($conn, $_POST['Pno']);
  $Password = mysqli_real_escape_string($conn, $_POST['Password']);
  $Confirm_Password = mysqli_real_escape_string($conn, $_POST['Confirm_Password']);
  $Gender = mysqli_real_escape_string($conn, $_POST['Gender']);
  //$Identity = mysqli_real_escape_string($conn, $_POST['Identity']);
  $filename = $_FILES["Identity"]["name"];
  $tempname = $_FILES["Identity"]["tmp_name"];
  $folder = "Images/".$filename;
  echo $folder;
  move_uploaded_file($tempname, $folder);


$pass= Password_hash($Password, PASSWORD_BCRYPT);

$Emailquery = "select * from register where Email='$Email' ";
$query = mysqli_query($conn, $Emailquery);

$Emailcount = mysqli_num_rows($query);
if($Emailcount>0){
  echo"email already exists";
}else{
if($Password=== $Confirm_Password){

  $insertquery = "insert into register (First_Name, Last_Name, Email, Phone, Password, Gender)
   VALUES('$First_Name','$Last_Name','$Email','$Phone','$pass','$Gender')";

   $iquery = mysqli_query($conn, $insertquery);

            
              ?>
              <script>
                  alert("Registered Successfully");</script>
                  
                <?php 
            }
           
else{
  ?><script>
alert ("Password did not match");</script>
<?php
}

}

}



?>

  <span ></span>
  <div class="container"> 
    <div class="tiltle"><i>Sajilo Deraa</i></div>
    <div class="title">Register Here</div>
   
    <div class="content">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" name="Fname" id="Fname" placeholder="Enter your first name" required>
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" name="Lname" id="Lname" placeholder="Enter your last name" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="Email" id="Email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="Pno" id="Pno" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="Password" name="Password" id="Password" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="Password" name="Confirm_Password" id="Confirm_Password" placeholder="Confirm your password" required>
          </div>
        </div>
        <div class="Gender">
           <input type="radio" name="Gender" id="dot-1"> 
          <input type="radio" name="Gender" id="dot-2">
          <input type="radio" name="Gender" id="dot-3">
          <span class="Gender-title"> Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="Gender" value="m">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="Gender" value="f">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="Gender" value="o">Other</span>
            </label>
            <!--<input type="radio" id="Male" name="Gender" value="Male">
            <label for="Male">Male</label><br>
            <input type="radio" id="Female" name="Gender" value="Female">
            <label for="Female">Female</label><br>
            <input type="radio" id="Other" name="Gender" value="Other">
            <label for="Other">Other</lael-->
            
            <label>
            <div class="file">
            <input type="file" name="my_image" id="Identity" required>
            <span class="label">Upload an Id </span>
            </div>
            <style>
        .file {
            width: 200px;
            overflow-wrap: break-file;
            word-wrap: break-file;
            word-break: break-file;
        }
    </style>
        </div>
        <div class="button">
          <input type="submit" value="Register" name="submit" id="register">
        </div>
        <center><i>©Copyright@SajiloDeraa</i></center>
      </form>
    </div>
  </div>

</body>
</html>
