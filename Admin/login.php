<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../Login/css.php">
<meta name="viewport" content="width=device-width, initial-scale=1">


</head>
<body>
  <?php
include '../config/config.php';


 
	if(ISSET($_POST['submit'])){

		$email = $_REQUEST['Email'];
		$password = $_REQUEST['Password'];
		$query = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email' && password ='$password'");
		$fetch=mysqli_fetch_array($query);
		$count=mysqli_num_rows($query);
 
		if($count > 0){
			
			header('location:../Admin/nDashboard.php');
		}else{
			echo "<div class='alert alert-danger'>Invalid username or password</div>";
		}
	}
?>

<!--if(isset($_POST['submit'])){
  
  $email =  $_POST['email'];
  
  $password =  $_POST['password'];
 

  $a = "select * from admin where email='$email' && password='$password' ";
  $b = mysqli_query($conn, $a);
  $E = mysqli_num_rows($b);
  if($E ==1){
  echo "not successful";
  }else{
    header('location:./nDashboard.php');
  }
}*/

?-->


</head>
<body>  
  <form class="modal-content animate" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
  <center><h3>Admin Login</h3></center>  
  <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="..\Images\logo.png" alt="Logo" class="logo">
    </div>

    <div class="container">
      <label for="uname"><b>Email</b></label>
      <input type="text" placeholder="Enter your Email" name="Email" id="Email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="Password" id="Password" required>
        
      <button type="submit" name="submit">Login</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <!--span class="psw">Forgot <a href="#">password?</a></span-->
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>
