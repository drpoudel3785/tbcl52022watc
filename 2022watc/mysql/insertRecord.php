<?php
    //Make connection to database
    include './connection.php';


    //(a)Gather from $_POST[]all the data submitted and store in variables
    $firstName = $_POST['firstname'];
    $surName = $_POST['surname'];
    $email = $_POST['txtEmail'];
    $pass = $_POST['password'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];

    //(b)Construct INSERT query using variables holding data gathered

    $query = "INSERT INTO customer (FirstName, LastName, Email, Password, Gender, Age) VALUES ('$firstName', '$surName','$email','$pass','$gender','$age')";


    //Temporarily echo $query for debugging purposes	
    // echo $query;
	// exit();


    //run $query
    if (mysqli_query($connection, $query )or die(mysqli_error())){
        // redirect to my sql page
        header('Location: ./mysql.php');
        echo "<h1>Data Stored</h1>";
    }else{
        echo "<h1>Error</h1>";
    }

?>
