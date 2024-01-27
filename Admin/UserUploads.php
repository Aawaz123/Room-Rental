<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <dic class="nav">
</head>
        <body>
            <center>
    <table border = 3 cellspacing=1 cellpadding=10>
    <style>
h1 {color:red;}
h2{text-align: center;}

</style><h1>User's Uploaded details</h1>
        <tr><style>

    tr:first-child {
    background: yellow;
    text-align: center;
    }
    td:first-child {
    background: greenyellow;
    }

</style>
            <td><strong>#</strong></td>
            <td><strong>Price</strong></td>
            <td><strong>Description</strong></td>
            <td><strong>Email</strong></td>
            <td><strong>Location</strong></td>
            <td><strong>Map</strong></td>
            <td><strong>Image</strong></td>
            <td><strong>Actions</strong></td></h2>
           
        <tr>
            
        </tr>
        <?php
        
        
        require '../config/config.php';
            $rows =mysqli_query($conn, "SELECT * FROM upload ORDER BY u_id");
            $i=1;
            //$res = mysqli_query($conn, $sql);
        
        //while($row = mysqli_fetch_assoc($res)){
          
            foreach($rows as $row):
            ?>
            <tr>
               <td><b><?php echo $i++; ?></b></td>
               <td><?php echo $row["price"]; ?></td> 
               <td><?php echo $row["description"]; ?></td>
               <td><?php echo $row["email"]; ?></td>
               <td><?php echo $row["district"] ."<br> ". $row["vdc"] ."<br> ". $row["ward"]; ?></td>
               <td style ="width: 200px; height: 200px;"><iframe src='https://www.google.com/maps?q=<?php echo $row["latitude"]; 
               ?>, <?php echo $row["longitude"]; ?> &h1=es; z=14&output=embed' 
               style= "width: 100%; height : 100%;"></iframe></td>
               <td><img src= <?php echo $row["image"]; ?> echo alt="" height="200px" width="200px" ></img></td>
              <?php echo '<td>
            <button class="btn btn-danger"><a href="delete.php?deleteid= '. $row["email"] .'"class="text-light">Delete</a></button></td> 
            '; ?>
            </tr>
            <?php endforeach; 
        
            ?>
           
          
</table></center>  

        </body>
</html>