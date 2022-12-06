<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    <h1>Manage Products</h1>
    <br>
    <?php include("./displayProducts.php"); ?>
    <br>
    <form action="./insertProduct.php" method="POST">
        <fieldset>
            <legend>Enter New Product Details</legend>
            <label for="productName">Product Name:</label><br>
            <input type="text" name="productName" value="<?php if(isset($_POST['productName'])) echo $_POST['productName']; ?>">
            <br><br>
            <label for="Price">Price:</label><br>
            <input type="text" name="price" value="<?php if(isset($_POST['price'])) echo $_POST['price']; ?>"><br><br>
            <label for="fimage">Image Filename:</label><br>
            <input type="text" name="fimage" value="<?php if(isset($_POST['fimage'])) echo $_POST['fimage']; ?>"><br><br>

            <input type="submit" name="addProduct" value="Submit">
            <input type="submit" name="clear" value="Clear">
        </fieldset>
    </form>

    <?php 
    if(isset($_POST['addProduct'])){
        $ProductName = $_POST['productName'];
        $Price = $_POST['price'];
        $ImageFilename = $_POST['fimage'];

        if(!empty($ProductName) && !empty($Price) && !empty($ImageFilename)){
            if(!is_numeric($ProductName)){
                if(is_numeric($Price)){
                    if(preg_match("/\b(\.jpg|\.JPG|\.png|\.PNG)\b/", $ImageFilename)){
                        header("Location: {$_SERVER['HTTP_REFERER']}");
                    }else{
                        echo "File Extension should be png or jpg.";
                    }
                }else{
                    echo "Price cannot be Alphabet Value";
                }
            }else{
                echo "Product Name cannot be numeric.";
            }
        }else{
            echo "Please fill All the field";
        }
    }
    
    ?>

</body>
</html>