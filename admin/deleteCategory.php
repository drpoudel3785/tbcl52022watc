<?php
require_once("./inc_session.php");
if(isset($_GET['id'])){

    // getting delete id
    $did = $_GET['id'];
    //Prepare thr sql statement
    $sql = "DELETE FROM categories WHERE id = $did";

    //Connect to the database
    include('../connection.php');

    //Execute the query
    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($query){
        header('Location:categorymgmt.php?msg=Record Deleted');
    }else{
        echo "Something went Wrong.";
    }


}else{
    header('Location:categorymgmt.php');
}
?>