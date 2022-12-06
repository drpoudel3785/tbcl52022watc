<?php
// making connection
include("./connection.php");

//Gathering if from $_GET['']

$productID = $_GET['id'];

$sql = "SELECT * FROM products WHERE ProductID = $productID";

$qry = mysqli_query($connection,$sql) or die(mysqli_error($sql));

$count = mysqli_num_rows($qry);

if ($count == 1){
    $row = mysqli_fetch_array($qry);
    ?>
    <form action="./updateProduct.php" method="POST">
        <fieldset>
            <legend>Enter Product Details</legend>
            <input type="hidden" name="hideProductID" value="<?php echo $productID; ?>">

            <label for="ProductName">Product Name: </label>
            <input type="text" name="prodName" value="<?php echo $row['ProductName']; ?>"><br><br>
            
            <label for="Price">Price: </label>
            <input type="text" name="newPrice" value="<?php echo $row['ProductPrice']; ?>"><br><br>

            <label for="ImageName"> Image Filename: </label>
            <input type="text" name="fimage" value="<?php echo $row['ProductImageName'] ?>"><br><br>

        </fieldset>
        <br>
        <input type="submit" name="updateProduct" value="Submit">
        <input type="submit" name="clear" value="Clear">
    </form>
    
    <?php
    if(isset($_POST['updateProduct'])){
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }
}else{
    echo "Error multi records Found.";
}


?>