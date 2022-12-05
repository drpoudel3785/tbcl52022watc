<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Description</title>
</head>
<body>
    <?php 
        if(isset($_GET['postId'])){
            $id = $_GET['postId'];
            
            
            // making query
            $sql = "SELECT * FROM posts WHERE id = $id";


            // include connection
            include("./connection.php");

            // run query
            $qry = mysqli_query($conn,$sql) or die(mysqli_error($sql));

            $count = mysqli_num_rows($qry);

            if($count == 1){
                $row = mysqli_fetch_assoc($qry);
                echo "<div><h1>".$row['title']."</h1><h6>Created Date : ".$row['created_at']."</h6><div><img src=\"./postPic/".$row['fimage']."\" width=\"200px\" height=\"200px\" alt=\"fimage\"><p>".$row['description']."</p></div></div>";
            }
        }
    
    ?>
</body>
</html>