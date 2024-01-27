
<?php
if(isset($_REQUEST['id'])){
$uid = $_REQUEST['id'];
include_once('../config/config.php');

$sql = "UPDATE register SET status=1 WHERE uid=$uid;";
$res = mysqli_query($conn, $sql);
}
?>

<center>
<table border = 3 cellspacing=1 cellpadding=10>
<style>
h1 {color:red;}
h2{text-align: center;}

</style><h1>User's Verification</h1>
        

  <tr>
  <style>

tr:first-child {
background: yellow;
text-align: center;
}
td:first-child {
background: greenyellow;
}

</style>
<td><strong>Uid</strong></td>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Gender</th>
    <th>Image</th>
    <th>Status</th>
  </tr>

</center>
<?php



include_once('../config/config.php');
$sql = "SELECT * FROM register;";


$res = mysqli_query($conn, $sql);$i=1;

while($row = mysqli_fetch_assoc($res)){
  echo '
  
  <tr>
  <td> ' . $row['uid'] .  '</td>
  <td>'. $row['firstname'] .' '. $row['lastname'] .'</td>
    <td>'. $row['email'] .'</td>
    <td>'. $row['pno'] .'</td>
    <td>'. $row['gender'] .'</td>
    <td><img src="'. $row['image_name'] .'" alt="" height="150px" width="200px"></td>
    ';
    if($row['status'] == 0){
        
    echo '
    <td> <a href="./verify.php?id='.$row['uid'].'"><button>Verify</button></a> </td>
  
  ';
    }else{
        echo '
        
    <td><h4>Verified</h4></td>
  ';
    }
echo '</tr>'
;

}
?>
<style>
h4 {color:blue;}


</style>
</table>