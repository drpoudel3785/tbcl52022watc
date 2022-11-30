<?php
include("inc_session.php");
//destroying all session at once
session_destroy();
header("Location:../login.php");
?>