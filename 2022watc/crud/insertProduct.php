<?php


$ProductName = $_POST['productName'];
$Price = $_POST['price'];
$ImageFilename = $_POST['fimage'];


// making query
$sql = "INSERT INTO products (ProductName, ProductPrice, ProductImageName) VALUES ('$ProductName', '$Price','$ImageFilename')";

// including connection
include("./connection.php");

// fetching data
$qry = mysqli_query($connection, $sql) or die(mysqli_error($conn));

if ($qry){
    // redirect to my sql page
    header('Location: ./crud.php');
    echo "<h1>Data Stored</h1>";
}else{
    echo "<h1>Error</h1>";
}

?>