
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css.php">
<meta name="viewport" content="width=device-width, initial-scale=1">


</head>
<body>
 

  <?php
include '../config/config.php';
$msg = "";
if(isset($_REQUEST['msg'])){
  $msg = $_REQUEST['msg'];
}

if(isset($_POST['submit'])){
  
  $email =  $_POST['email'];
  
  $password =  $_POST['password'];
 

  $a = "SELECT * FROM register WHERE email='$email' AND password='$password' AND status=1;";
  $b = mysqli_query($conn, $a);
  $E = mysqli_num_rows($b);
  if($E < 1){
    
  echo "<marquee scrollamount='12'><h3>Sorry! you are not yet verified by admins</h3></marquee>";
  }else if ( `password` !=  $_password){
echo"<h3>You entered wrong data </h3>";
  }else{
    $data = mysqli_fetch_assoc($b);
    session_start();
    $_SESSION['email'] = $data['email'];
    header('location:../Welcome/Welcome.php');
  }
}

?>

<style>
    
body{
margin:0;
padding:0;
background-image: url("../Images/RO.jpg");
background-attachment: fixed;  
  background-size: cover;
    background-repeat: no-repeat;

}
nav{
width:100%;
background:black;
overflow:auto;
}
ul {
padding:0;
margin:0 0 0 150px;
list-style:none;
}
li {
float:left;
}
.logo img{
position:absolute;
margin-top:1px;
margin-left:1px;
}
nav a{
width:100px;
display:block;
padding:20px 15px;
text-decoration:none;
font-family:Arial;
color:#f2f2f2;
text-align:center;
}
nav a:hover{
background:purple;
transition:0.5s;
text-transform:uppercase;
}
</style>
</head>
<body>
  
<div class ="logo"><a href ="#"><img src ="../images/logo.png"></a>
</div>
<nav>
<ul>
<li><a href ="#">Home</a></li>
<li><a href ="#">About</a></li>
<li><a href ="#">Contact</a></li>
</ul>
</nav>
<Center>
<H3><a href ="../Register/rr.php">Don't have account</a></H3>
<div>
<h2>Have Account?</h2>
<button onclick="document.getElementById('id01').style.display='block'" style="width:150px; height:70px;"><h3>Login</h3></button>
</div><br><br><br>
<h1 style="background-color:DodgerBlue;"><p style="color: violet;">Sajilo Deraa</b></p></h1>
<h3><i>An Online Room Rental Platform</i></h3>
<p style="color: orange; background-color:white;"><b>An innovative platform that saves the time of room seekers and room owners.</b> </p>
<span style="color: red; font-size:larger;">
  <?php
echo $msg;
?></span>
</center>
<div id="id01" class="modal">
  
  <form class="modal-content animate" action="#" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="..\Images\logo.png" alt="Logo" class="logo">
    </div>

    <div class="container">
      <label for="uname"><b>Email</b></label>
      <input type="text" placeholder="Enter your Email" name="email" id="Email" required>

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" id="Password" required>
        
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
