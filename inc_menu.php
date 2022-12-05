<?php
//sql
$sql = "SELECT * FROM categories WHERE status=1";
include("connection.php");
$qry=mysqli_query($conn, $sql) or die(mysqli_error($conn));
echo "<a href=index.php>Home</a> |";
while($row=mysqli_fetch_assoc($qry)){
    echo "<a href=category.php?cid=".$row['id'].">".$row['name']."</a> |";
}
?>