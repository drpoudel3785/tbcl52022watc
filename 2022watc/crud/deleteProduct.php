<?php
if(isset($_GET['id'])){

    // getting delete id
    $did = $_GET['id'];
    //Prepare thr sql statement
    $sql = "DELETE FROM products WHERE ProductID = $did";

    //Connect to the database
    include('./connection.php');

    //Execute the query
    $query = mysqli_query($connection, $sql) or die(mysqli_error($conn));

    if ($query){
        header('Location:crud.php?msg=Record Deleted');
    }else{
        echo "Something went Wrong.";
    }


}else{
    header('Location:crud.php');
}
?>