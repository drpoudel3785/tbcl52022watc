<?php
session_start();
if(!isset($_SESSION["username"]) and  !isset($_SESSION["accessid"]) && !isset($_SESSION['id']))
{
    header("Location:../login.php");
}
?>