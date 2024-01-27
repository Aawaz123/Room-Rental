<?php 
require '../config/config.php';
if(isset($_REQUEST['deleteid'])){
    $id=$_REQUEST['deleteid'];


    $sql="DELETE FROM upload WHERE email=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo"deleted";
    }else{
        die(mysqli_error($conn));
    }
}


?>