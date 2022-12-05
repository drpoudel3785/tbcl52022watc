<?php
require_once("./inc_session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Blog</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Post Your Blog</legend>
            <label for="Catogery">Category :</label>
            <select name="category_id" size="1">
                <?php
                // making query to getting data
                $sql = " SELECT * FROM categories WHERE status = 1 ORDER BY id DESC";

                // connect to db
                include('../connection.php');

                // execution of query
                $qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                // listing of data
                while($row = mysqli_fetch_array($qry)){
                    echo "<option value=".$row['id'].">".$row['name']."</option>";
                } 
                ?>
            </select>
            <br><br>
            <label for="name">Title :</label>
            <input type="text" name="title" value="<?php if(isset($_POST['title'])) echo $_POST['title']?>">
            <br><br>
            <label for="Description">Dercription :</label>
            <br>
            <textarea name="descPost" cols="30" rows="10"><?php if(isset($_POST['descPost'])) echo $_POST['descPost']; ?></textarea>
            <br><br>
            <label for="fimage">Image :</label>
            <input type="file" name="fimage" >
            <br><br>
            <input type="submit" name=
            "postSubmit" value="Add">
        </fieldset>
    </form>
    <?php
     if (isset($_POST['postSubmit']))
     {
        $usrID = isset($_SESSION['id']) ? (int) $_SESSION['id'] : 0 ;
        $categoryID = $_POST['category_id'];
        $titleOfPost = $_POST['title'];
        $descriptionOfPost = $_POST['descPost'];

        //----------
        // for image
        //----------
        $target_dir = "../postPic/";
        $fimage = $_FILES['fimage']['name'];
        $type = $_FILES['fimage']['type'];
        $tempName = $_FILES['fimage']['tmp_name'];

        //---------------------------
        // empty check for fields
        //---------------------------
        if(!empty($categoryID) && !empty($titleOfPost) && !empty($descriptionOfPost) && !empty($fimage)){

            //---------
            // making query to add data inside post db
            //---------
            $addPostData = "INSERT INTO posts(user_id, category_id, title, description, fimage, views) VALUES($usrID,'$categoryID','$titleOfPost','$descriptionOfPost','$fimage',0)";

            //----------
            // execution of query
            $addQueryData = mysqli_query($conn, $addPostData) or die(mysqli_error($conn));

            //----------
            // after daat insertion

            if($addQueryData){
                if(move_uploaded_file($tempName, $target_dir.$fimage)){
                    echo "Picture uploaded Successfully.";
                }else{
                    echo "data doesnot get uploaded.";
                }
            }else{
                echo "Unable to insert data to the database.";
            }
            
        }else{
            echo "Please Fill all the data.";
        }
     }
    ?>
</body>
</html>