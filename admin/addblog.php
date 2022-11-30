<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog</title>
</head>
<body>
    <form method="post" action="" enctype="multipart/form-data" />
    <fieldset>
        <legend>
            Post Your Blog
        </legend>
        <label>Category</label>
        <select name="category_id" size="1">
            <?php
            //Sql for all Categories
            $sql = "SELECT * FROM categories WHERE status=1 ORDER BY id DESC";
            //connection to db
            include("../connection.php");
            //executing the query
            $qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            //fetching the data for options
            while($row=mysqli_fetch_array($qry))
            {
            
           echo "<option value=". $row['id'].">". $row['name']."</option>";

            }

            ?>
        </select>
    </fieldset>
    </form>
    
</body>
</html>