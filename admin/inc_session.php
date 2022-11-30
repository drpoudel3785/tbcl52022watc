<?php
session_start();
if(!isset($_SESSION["username"]) and  !isset($_SESSION["accessid"]))
{
    header("Location:../login.php");
}
?>