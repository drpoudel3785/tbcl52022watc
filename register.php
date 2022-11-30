<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>
<body>
    <?php
    //checking the form is submitted
    if(isset($_POST['submit']))
    {
        if(!empty($_POST['user']) && !empty($_POST['password']) && !empty($_POST['email']))
        {
            $user=filter_var($_POST['user'], FILTER_SANITIZE_STRING);
            $pass=trim($_POST['password']);
            
            if(filter_Var($_POST['email'], FILTER_VALIDATE_EMAIL))
            {
                $email=$_POST['email'];
                //SQL Statement
                $sql="INSERT INTO users(username, password, email, role, status, isverified) VALUES('$user' , md5('$pass'), '$email','user', 1, 0)";
                //Includeing connection
                include("connection.php");
                //making query
                $qry=mysqli_query($conn, $sql) or die(mysqli_error($conn));
                if($qry)
                {
                    header("Location:login.php");
                }
                else{
                    echo "Unalbe to insert data to the database";
                }
            }
            else{
                echo "Email must be in you@domain.com format";
            }
        }
        else{
            echo "Please fill all fields.";
        }
    }
    ?>
    <form method="POST" name="register" action="" enctype="multipart/form-data">
        <fieldset>
            <legend>User Registration</legend>
            <input type="text" name="user" value="<?php if(isset($_POST['user'])) echo $_POST['user']; ?>" placeholder="Username"/><br/>
            <input type="password" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>" name="password" placeholder="Password"/><br/>
            <input type="text" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" name="email" placeholder="you@domain.com"/><br/>
            <input type="submit" name="submit" value="Regisrer"/>
        </fieldset>
        <p>Already Registered Member. <a href="login.php">Login</a></p>
    </form>
    
</body>
</html>