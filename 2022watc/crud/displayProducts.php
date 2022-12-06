
<?php
    // making query
    $sql = "SELECT * FROM products";

    // including connection
    include("./connection.php");

    // fetching data
    $qry = mysqli_query($connection, $sql) or die(mysqli_error($conn));

    $count = mysqli_num_rows($qry);

    if($count >= 1){
        ?>
        <table>
            <tr>
                <th>ProductName</th>
                <th>Price</th>
                <th>Image</th>
                <th>Amend</th>
                <th>Delete</th>
            </tr>
        <?php
            while ($row = mysqli_fetch_array($qry)) {
                echo "<tr><td>".$row['ProductName']."</td><td>".$row['ProductPrice']."</td><td><img src=\"./images/".$row['ProductImageName']."\" width=\"100px\" height=\"100px\" alt=\"fimage\" ></td><td><a href=./amendProduct.php?id=".$row['ProductID'].">Amend</a></td><td><a href=./deleteProduct.php?id=".$row['ProductID'].">Delete</a></td></tr>";
            }
        echo "</table>";
    }else{
        echo "No data Found.";
    }


?>