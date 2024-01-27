
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
      <li><a class="active" href="Welcome.php">Home</a></li>
      <li><a href="#">About Us</a></li>
      <li><caption class="caption">Upload Room Details</caption> <a class="upload" href="upload.php">UPLOAD </a></li>
      <li><a class="button-5" role="button" href="../Logout/logout.php">LOG OUT</a>
      </li>
    </ul>
  </nav>
  <div>
</head>
<body>
<center>
  <img src="../Images/RO1.jpg" width="100%" height="100%">

  
    
      
   
      <!--<table style=  "border: 1px solid;">
<tr><td style="width: 500px; height: 44px;" colspan="3"><br /></td>
</tr><tr>
<td style="width: 300px; height: 200px; border: 1px solid;">&nbsp;</td>
<td style="width: 300px; height: 200px;border: 1px solid;">&nbsp;</td>
<td style="width: 300px; height: 200px;border: 1px solid;">&nbsp;</td>
</tr>
<tr style= "border: 1px solid;">
<td style="width: 300px; height: 10px; border: 1px solid;" colspan="3">
<center><a class="button" style="line-height : 50px; background-color: #008CBA; " role="button" name="interested" href="#">Interested</a>
</center></td>
</tr>
</div>
</table></center-->
<?php
require '../config/config.php';
            $rows =mysqli_query($conn, "SELECT * FROM upload, register WHERE upload.email = register.email;");
            foreach($rows as $row):
            ?>
            <br><br><br><br><br>
            <tr><td style= "width:10px; height:30px; text-align:left;" ><b><?php echo 'R-'. $row['u_id']; ?></b> </td></tr>
            <table style = "border: 2px solid; border: 3px double green;
              border-style: dashed;
              border-bottom-color: orange;">
              
            <center><tr><td style="width: 900px; height:40px;" colspan="3"> 
            <p style="font-family:Comic Sans; color:White; font-size:40px; font-variant-caps: petite-caps;  text-shadow: 2px 2px red;">
            <b><?php echo $row['district'] .', '. $row['vdc'] .'-'. $row['ward']; ?></b></p></td></tr><br>
            <tr><td style="width: 300px; height: 200px; border: 1px solid;">
            <img src= <?php echo $row["image"]; ?> echo alt="" height="100%" width="100%" ></img></td>
            <td style ="width: 300px; height: 200px; ">
            <iframe src='https://www.google.com/maps?q=<?php echo $row["latitude"]; 
               ?>, <?php echo $row["longitude"]; ?> &h1=es; z=14&output=embed' 
               style= "width: 100%; height : 100%;"></iframe></td> 
               <td valign="top" style="width: 300px; height: 200px;border: 1px solid; background-color: SeaShell; ">
               <center><?php echo '<h4><u> Uploaded By:</u></h4> <b>'.  $row['firstname'] .'</b><b> '. $row['lastname']."</b><br><br><br>". $row["description"]; ?></center></td></tr>
               <tr><td style="width: 250px; height: 8px; border: 1px solid;" colspan="3">
               <center><div class="button"  value="button" name="interested" onclick="Alert.render('<b>Contact: </b><?php  echo $row['pno'] .'<br>'. $row['firstname'] . $row['lastname']; ?>')"  href="#">Interested</a>
            </center>
               <p style="font-size:30px; text-align:left; position:relative;"><?php echo 'Price = Rs.'. $row["price"]; ?>per month
               &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
               <div1 id="text">
                <span ></span>
            </div1>
            
               </td> </tr>
               
            </tr>
            </tr>
            </table>
            <style>
              
#dialogoverlay{
	display: none;
	opacity: .8;
	position: fixed;
	top: 0px;
	left: 0px;
	background: #FFF;
	width: 100%;
	z-index: 10;
}
#dialogbox{
	display: none;
	position: fixed;
	background: #000;
	border-radius:7px; 
	width:550px;
	z-index: 10;
}
#dialogbox > div{ background:#FFF; margin:8px; }
#dialogbox > div > #dialogboxhead{ background: #666; font-size:19px; padding:10px; color:#CCC; }
#dialogbox > div > #dialogboxbody{ background:#333; padding:20px; color:#FFF; }
#dialogbox > div > #dialogboxfoot{ background: #dcd812; padding:10px; text-align:right; }
</style>
<script>
function CustomAlert(){
    this.render = function(dialog){
        var winW = window.innerWidth;
        var winH = window.innerHeight;
        var dialogoverlay = document.getElementById('dialogoverlay');
        var dialogbox = document.getElementById('dialogbox');
        dialogoverlay.style.display = "block";
        dialogoverlay.style.height = winH+"px";
        dialogbox.style.left = (winW/2) - (550 * .5)+"px";
        dialogbox.style.top = "100px";
        dialogbox.style.display = "block";
        document.getElementById('dialogboxhead').innerHTML = "Contact on this number to Confirm Room";
        document.getElementById('dialogboxbody').innerHTML = dialog;
        document.getElementById('dialogboxfoot').innerHTML = '© Sajilo Deraa &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<button onclick="Alert.ok()"><b>OK</b></button>';
    }
	this.ok = function(){
		document.getElementById('dialogbox').style.display = "none";
		document.getElementById('dialogoverlay').style.display = "none";
	}
}
var Alert = new CustomAlert();
</script>
</head>
<body>
<div id="dialogoverlay"></div>
<div id="dialogbox">
  <div>
    <div id="dialogboxhead"></div>
    <div id="dialogboxbody"></div>
    <div id="dialogboxfoot"></div>
  </div>
</div>

<style>
               tr:first-child {
    background: yellow;
    text-align: center;
    }
    td:first-child {
    background: greenyellow;
    }
    
              </style>
            <?php endforeach; 
        
            ?>

            
</body>
<br><br><br><br><br><br>
<div class= "footer">

<!--The main area of the footer -->
<div class="footer-content">

   
   <ul class="socials">
      <li><a href="#"><i class="fa fa-facebook">f</i></a></li>
      <li><a href="#"><i class="fa fa-twitter">t</i></a></li> 
      <li><a href="#"><i class="fa fa-youtube">y</i></a></li>
     
    </ul>

 <!-- Footer's menu item-->
 <div class="footer-menu">
   <ul class="f-menu">
        <li><a href="">Home</a></li>
        <li><a href="">About</a></li>
        <li><a href="">Contact</a></li>
       
 </ul> 
   </div>

</div>

<!--Copyright Area-->
<div class="footer-bottom">
<center>© Sajilo Deraa</center>
</div>

</footer>

</html>