<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Category</title>
</head>
<body>
    <header>
        <nav>
           <?php include("inc_menu.php");?>
        </nav>

    </header>
    <main>
        <?php
        if(isset($_GET['cid']))
        {
            $cid=$_GET['cid'];
            $sql = "SELECT * FROM posts WHERE  category_id=$cid order by id DESC";
            include("connection.php");
            $qry =mysqli_query($conn, $sql) or die(mysqli_error($conn));
            while($row=mysqli_fetch_array($qry));
            {
                echo "<h2>".$row['title']."</h2>";
                echo "<p>".substr($row['description'],100)."</p>";
                echo "<hr/>";
            }

        }

        ?>
        
    </main>
    <footer>

    </footer>
    
</body>
</html>