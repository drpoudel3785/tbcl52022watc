<?php
require_once("inc_session.php");
?>
<?php

if(isset($_GET['id']))
{
    //getting delete id
    $did=$_GET['id'];
    //Delete sql statement
    $sql = "DELETE FROM users WHERE id=$did";
    //making connection
    include("../connection.php");
    //executing query
    $qry=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if($qry){
        header("Location:listusers.php?msg=Record Deleted");
    }
    else{
        echo "Something Wrong";
    }
}
else{
    header('Location:listusers.php');
}
?>