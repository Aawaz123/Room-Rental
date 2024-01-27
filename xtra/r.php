<?php
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
        $img = mysqli_real_escape_string($conn, $img);
        $img = stripslashes($_REQUEST['img']);
        $query    = "INSERT into `register` (firstname, lastname,email,password,pno,gender,img)
                     VALUES ('$firstname', '$lastname','$email', '$password','$pno','$gender','$img')";
        $result   = mysqli_query($conn, $query);
        if ($result) {
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
    } else {
    ?>
        <br>
        <!-- Form Start -->
        <DOCTYPE html>
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
            <h1>Registration Form</h1>
          </div>
          <div class="panel-body">
            <form action="#" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="firstname">First Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="firstname"
                  name="firstname"
                />
              </div>
              <div class="form-group">
                <label for="lastname">Last Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="lastname"
                  name="lastname"
                />
              </div>
              <div class="form-group">
                <label for="gender">Gender</label>
                <div>
                  <label for="male" class="radio-inline"
                    ><input
                      type="radio"
                      name="gender"
                      value="m"
                      id="male"
                    />Male</label
                  >
                  <label for="female" class="radio-inline"
                    ><input
                      type="radio"
                      name="gender"
                      value="f"
                      id="female"
                    />Female</label
                  >
                  <label for="others" class="radio-inline"
                    ><input
                      type="radio"
                      name="gender"
                      value="o"
                      id="others"
                    />Others</label
                  >
                </div>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="email"
                />
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"/>
              </div>
              </div>
             
              <div class="form-group">
                <label for="pno">Phone Number</label>
                <input
                  type="pno"
                  class="form-control"
                  id="pno"
                  name="pno"
                />
              </div>

              <div class="form-group">
                <label for="img">Select Image</label>
                <input
                  type="file"
                  class="form-control"
                  id="img"
                  name="img"
                />
              </div>

              <center><input type="submit" name="submit" class="btn btn-primary" /></center>
            </form>
            <?php
            }
            ?>
          </div>
          
            
          </div>
        </div>
      </div>
    </div>
    
</div>
  </body>
</html>