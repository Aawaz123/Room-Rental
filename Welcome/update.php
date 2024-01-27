?php
include('config/config.php');
?>
<div class="main-contain">
    <div class="wrapper">
        <h1> Update Categoty</h1>

        <br /> <br />

        <?php

        //check whether the is is set or not
        if (isset($_GET['u_id'])) {
            //Get the id and all other details
            //echo "Getting the data";
            $id = $_GET['u_id'];
            //create sql query to get all other detail
            $sql = "SELECT * FROM upload WHERE u_id=$id";

            //execute the query
            $res = mysqli_query($conn, $sql);

            //count the rows to check whether the id is valid or not
            $count = mysqli_num_rows($res);

            if ($count == 1) {
                //get all the data
                $row = mysqli_fetch_assoc($res);
                $price = $row['price'];
                $description = $row['description'];
                $image = $row['image'];
                $district = $row['district'];
                $vdc = $row['vdc'];
                $ward = $row['ward'];
            } else {
                //redirect to manage category with session message
                $_SESSION['no-category-found'] = "<div class='error'> Category Not Found</div>";
                //redirecting
                header('location:../Welcome/Welcome.php');
            }
        } else {
            //redirect to manage category
            header('location:../Welcome/Welcome.php');
        }

        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Price:</td>
                    <td> <input type="text" name="price" value="<?php echo $price; ?>"></td>
                </tr>
                <tr>
                    <td>Current Image:</td>
                    <td>
                        <?php
                        if ($image != "") {
                            //display the image
                        ?>
                            <img src="<?php echo 'SITEURL'; ?>images/category/<?php echo $image; ?>" width="100px">
                        <?php
                        } else {
                            //display message
                            echo "<div class='error'>Image Not Added</div>";
                        }

                        ?>
                    </td>
                </tr>
                <tr>
                    <td>New Image:</td>
                    <td> <input type="file" name="image"> </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            //echo "clicked";
            //1.get all the values from our form
            $id = mysqli_real_escape_string($conn, $_POST['u_id']);
            $price = mysqli_real_escape_string($conn, $_POST['price']);
            $image = mysqli_real_escape_string($conn, $_POST['image']);
            $discription = mysqli_real_escape_string($conn, $_POST['discription']);
            $district = mysqli_real_escape_string($conn, $_POST['district']);
            $vdc = mysqli_real_escape_string($conn, $_POST['vdc']);
            $ward = mysqli_real_escape_string($conn, $_POST['ward']);

            


            //2.updating new image if selected
            //check whether image is selected or not
            if (isset($_FILES['image']['name'])) {
                //get the image detail
                $image_name = $_FILES['image']['name'];

                //check whether image is available or not
                if ($image_name != "") {
                    //image available
                    //A.upload the new image 

                    //auto rename our image
                    //get the extension of our image (.jpg, .png, .gif etc) 
                    $ext = end(explode('.', $image_name));

                    //rename the image 
                    $image_name = "" . rand(000, 999) . '.' . $ext; 

                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../images/upload/" . $image_name;

                    //finally upload image
                    $upload = move_uploaded_file($source_path, $destination_path);

                    //check whether the image is uploaded or not
                    //and if the image is not uploaded then we will stop the process and redirect with error message
                    if ($upload == false) {
                        //set message
                        $_SESSION['upload'] = "<div class='error'>Failed To Upload Image </div>";
                        //redirect to add category page
                        header('location: ../Welcome/Welcome.php');
                        //stop the process
                        die();
                    }

                    //B.remove the current image if available
                    if ($current_image != "") {
                        $remove_path = "../images/upload/" . $current_image;
                        $remove = unlink($remove_path);

                        //check whether the image is remove or not
                        //if failed to remove display message and stop the process
                        if ($remove == false) {
                            //failed to remove image
                            $_SESSION['failed-remove'] = "<div class='error'> Failed to remove current image </div>";
                            header('location: ../Welcome/Welcome.php');
                            die(); //stop the process
                        }
                    }
                } else {
                    $image_name = $current_image;
                }
            } else {
                $image_name = $current_image;
            }

            //3.update the database
            $sql1 = "UPDATE upload SET
                price = '$price',
                image ='$image',
                description = '$description',
                district = '$district'
                vdc = '$vdc'
                ward = '$ward'
                WHERE u_id =$id
                ";
            //execute the query
            $res1 = mysqli_query($conn, $sql1);
            //4.redirect to manage category with message
            //check whether executed or not
            if ($res1 == TRUE) {
                //category update
                $_SESSION['update'] = "<div class='success'>Category Updated Successfully </div>";
                //redirecting
                header('location:../Welcome/Welcome.php');
            } else {
                //failed to update category
                $_SESSION['update'] = ">div class='error'>Failed To Update Category</div>";
                //redirecting
                header('location: ../Welcome/Welcome.php');
            }
        }

        ?>

    </div>
</div>

<?php
include('partials/footer.php');
?>
