<?php
require_once("./inc_session.php");
//Prepare the sql statement
$sql = "SELECT * FROM users order by id DESC";
//Connect to the database
include("../connection.php");
//Execute the query
$qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));
//print the results
$count = mysqli_num_rows($qry);
if($count>=1){
    if(isset($_GET['msg']))
    {
        echo "<h1>".$_GET['msg']."</h1>";
    }
    echo "We have" .$count." Records.<br/>";
    echo "The following are the list of users<br>";
    echo "<table border=1>";
    echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Role</th><th>Status</th><th>Actions</th></tr>";
    while($row=mysqli_fetch_array($qry))
    {
        $id=$row['id'];
        echo"<tr><td>".$row['id']."</td>";
        echo"<td>".$row['username']."</td>";
        echo"<td>".$row['email']."</td>";
        echo"<td>".$row['role']."</td>";
        echo"<td>".$row['status']."</td>";
        echo"<td><a href=edituser.php?id=$id>EDIT</a> | <a href=deleteuser.php?id=$id>DELETE</a> </td>
        <tr/>";
    }
    echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Role</th><th>Status</th><th>Actions</th></tr>";
}
else{
    echo "Sorry No Record Found in Database";
}
?>