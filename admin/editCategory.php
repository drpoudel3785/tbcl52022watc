<?php
require_once("./inc_session.php");
if(isset($_GET['id'])){

    // getting all data
    $eid = $_GET['id'];

    //Prepare thr sql statement
    $sql = "SELECT * FROM categories WHERE id = $eid";

    //Connect to the database
    include('../connection.php');

    //Execute the query
    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));


    $count = mysqli_num_rows($query);

    if ($count == 1){
        while($row = mysqli_fetch_array($query)){
            $name = $row['name'];
            $description = $row['description'];
            $status = $row['status'];

        }
            ?>

            <form method="POST" action="" name= "edituser">
                <fieldset>
                    <legend><?php echo $name?> EDIT</legend>
                    <label for="name">Name: </label>
                    <input type="text" name="name" value="<?php echo $name ?>"><br><br>
                    <label for="description">Description : </label>
                    <textarea name="description" cols="30" rows="10"><?php echo $description ?></textarea><br><br>
                    <label for="stat">Status: </label>
                    <input type="text" name="status" value="<?php echo $status ?>"><br><br>
                    <input type="submit" value="Update" name="update"/>
                </fieldset>
            </form>
            <?php
            if(isset($_POST['update'])){

                // getting all new data
                $new_name = $_POST['name'];
                $new_description = $_POST['description'];
                $new_status = $_POST['status'];

                // SQL Statement to Update
                $updateSQL = "UPDATE categories SET name = '$new_name', description = '$new_description',status = '$new_status' WHERE id = $eid";


                //Execute the query
                $updateQuery = mysqli_query($conn, $updateSQL) or die(mysqli_error($conn));
                if ($updateQuery){
                    header('Location:categorymgmt.php?msg=Data Updated');
                }else{
                    echo "Something went Wrong.";
                }
            }
    }else{
        echo "Something went Wrong.";
    }
}else{
    header('Location:categorymgmt.php');
}
?>