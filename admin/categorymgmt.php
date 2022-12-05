<?php
require_once("./inc_session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catogery</title>
</head>
<body>
    <form  method="POST" action="">
        <fieldset>
            <legend>Add Catogery</legend>
            <input type="text" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" placeholder="Name"><br><br>
            <textarea name="description" cols="30" rows="10"><?php if(isset($_POST['description'])) echo $_POST['description']; ?></textarea><br><br>
            
            <input type="submit" name="submit" value="Add">
        </fieldset>
    </form>
    <?php
    if(isset($_POST['submit'])){
        if(!empty($_POST['name']) && !empty($_POST['description'])){
            $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
            $description = $_POST['description'];
                // SQL Statement
                $sql = "INSERT INTO categories(name, description, status) VALUES('$name', '$description', 1)";

                // Including connection
                include_once('../connection.php');

                // Making query
                $qry = mysqli_query($conn,$sql) or die(mysqli_error($conn));

                if($qry){
                    echo "Data inserted Successfully";
                }else{
                    echo "Unable to insert data to the database.";
                }
        }else{
            echo "Please fill all fields.";
        }
    }
    ?>
    

    <?php

    //Prepare thr sql statement
    $sql = "SELECT * FROM categories";

    //Connect to the database
    include_once('../connection.php');

    //Execute the query
    $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    //print the result
    $count = mysqli_num_rows($query);

    if($count >= 1){
        echo "<br/><br/>We have found".$count."Records.";
        echo "The Following are the list of catogeries <br/>";
        echo "<table border = 1>";
        echo "<tr><th> ID </th><th>Name</th><th>Description</th><th>Status</th><th>Actions</th></tr>";

        while($row = mysqli_fetch_array($query)){
            $id = $row['id'];
            echo "<tr><td>".$row['id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['description']."</td>";
            echo "<td>".$row['status']."</td>";
            echo "<td><a href=editCategory.php?id=$id>EDIT</a>|<a href=deleteCategory.php?id=$id>DELETE</a></td></tr>";
        }
        echo "<tr><th> ID </th><th>Name</th><th>Description</th><th>Status</th><th>Actions</th></tr>";
    }else{
        echo "Sorry No records found";
    }

    ?>
</body>
</html>