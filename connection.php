<?php
define('HOSTNAME','localhost');
define('USERNAME','root');
define('PASSWORD','root');
define('DATABASE','blog');
$conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE) or die("Unable to connect to the database");
?>