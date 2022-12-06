<?php
if(isset($_POST['updateProduct'])){
    include("./connection.php");
    // getting all new data
    $ProductId = $_POST['hideProductID'];
    $new_prodName = $_POST['prodName'];
    $new_price = $_POST['newPrice'];
    $new_ImageName = $_POST['fimage'];

    // SQL Statement to Update
    $updateSQL = "UPDATE products SET ProductName = '$new_prodName', ProductPrice = '$new_price', ProductImageName = '$new_ImageName' WHERE ProductID = '$ProductId'";


    //Execute the query
    $updateQuery = mysqli_query($connection, $updateSQL) or die(mysqli_error($connection));
    if ($updateQuery){
        header('Location:crud.php?msg=Data Updated');
    }else{
        echo "Something went Wrong.";
    }
}