<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
</head>
<body>
    <?php
    //checking the form is submitted or not
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        //getting the form field data
        $usr = $_POST['username'];
        $pwd = $_POST['password'];
        if(!empty($usr) && !empty($pwd))
        {
             //sql to valid login
        $sql = "SELECT * FROM users WHERE username='$usr' AND password=md5('$pwd') and status=1 and isverified=1";
        //making connection to db 
        include("connection.php");
        //executing query
        $qry=mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $count=mysqli_num_rows($qry);
        if($count==1)
        {
            //registering sessions
            $_SESSION['username']=$usr;
            $_SESSION['accessid']=date("ymdhisu");
            header("Location: admin/admindashboard.php");
        }
        else
        {
            echo "Invalid Credentials";
        }
    }//empty
    
    else{
        echo "Pleae fill all fiedlds";
    }
    }

    ?>
    <form method="POST" action="" name="login" enctype="multipart/form-data">
        <input type="text" name="username" placeholder="Usrname" />
        <br/>
        <input type="password" name="password" placeholder="Password" />
        <br/>
        <input type="submit" name="submit" value="Login"/ >
    </form>

    <p>Not  Registered Member. <a href="register.php">Sign Up</a></p>
    
</body>
</html>