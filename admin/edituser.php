<?php
require_once("inc_session.php");
?>
<?php
//if update button is pressed
if(isset($_POST['update']))
{
    //capturing the data
    $uid=$_POST['uid'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $role=$_POST['role'];
    $status=$_POST['status'];
    $isverified=$_POST['isverified'];
    // sql query
    if(!empty($password))
    {
    $sql = "UPDATE users SET username='$username', password=md5('$password'), email='$email', role='$role', status=$status, isverified=$isverified WHERE id=$uid";
    }
    else{
        $sql = "UPDATE users SET username='$username', email='$email', role='$role', status=$status, isverified=$isverified WHERE id=$uid";

    }
    //making connection
    include("../connection.php");
    //executing the query
    $qry=mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if($qry){
        header("Location:listusers.php?msg=record updated");
    }
}
if(isset($_GET['id']))
{
    //getting the edit id
    $eid=$_GET['id'];
    $sql = "SELECT * FROM users WHERE id=$eid";
    include("../connection.php");
    $qry=mysqli_query($conn, $sql);
    $count=mysqli_num_rows($qry);
   
    if($count==1)
    {
        while($row=mysqli_fetch_array($qry))
        {
            $id=$row['id'];
            $username=$row['username'];
            $email=$row['email'];
            $role=$row['role'];
            $status=$row['status'];
            $isverified=$row['isverified'];
        }
            ?>
              <form method="post" action="" name="edituser">
                <fieldset>
                    <legend><?php echo$username?> EDIT</legend>
                    <input type="hidden" name="uid" value="<?php echo $id;?>">
                    <label>Username</label>
                    <input type="text" name="username" value="<?php echo $username;?>"/><br/>
                    <label>Password</label>
                    <input type="password" name="password" /><br/>
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo $email;?>"/><br/>
                    <label>Role</label>
                    <input type="text" name="role" value="<?php echo $role;?>"/><br/>
                    <label>Status</label>
                    <input type="text" name="status" value="<?php echo $status;?>"/><br/>
                    <label>Is Verified</label>
                    <input type="text" name="isverified" value="<?php echo $isverified;?>"/><br/>
                    <input type="submit" name="update" value="Update"/>
                </fieldset>
            </form>
          
            <?php
    }
}
    else
{
    header("Location:listusers.php");
}

?>