<?php 
//Set up the database access credentials
$hostname = 'localhost'; 
$username = 'root'; 
$password = 'root';  
$databaseName = 'C7297971'; 
$connection = mysqli_connect($hostname, $username, $password, $databaseName) or exit("Unable to connect to database!");
?>
