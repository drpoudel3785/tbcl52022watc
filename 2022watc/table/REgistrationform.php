<?php
    function textSET($inputName){
        if (isset($_POST[$inputName])) {
            echo $_POST[$inputName];
        };
    };
    function radioSET($valueToCheck){
        if (isset($_POST['gender']) && $_POST['gender'] == $valueToCheck) echo 'checked';
    };
    function CourseSET($valueToCheck){
        if (isset($_POST['course']) && in_array($valueToCheck, $_POST['course'])) echo 'checked';
    };
    function isNotEmpty(){
        foreach(func_get_args() as $val){
            if(empty($val)){
                return false;
            }
        }
        return true;
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Regestration</legend>

            <!-- USername -->
            <label for="username">Username: </label>
            <input type="text" name="username" value="<?php textSET("username") ?>"><br/><br/>

            <!--  Password -->
            <label for="password">Password: </label>
            <input type="password" name="password" ><br/><br/>

            <!-- conform password -->
            <label for="congihPassword">Conform Password: </label>
            <input type="password" name="confPassword" ><br/><br/>

            <!-- email -->

            <label for="email">Email: </label>
            <input type="email" name="userEmail" value = "<?php textSET("userEmail") ?>"><br/><br/>

            <!-- Date of Birth -->
            <label for="DOB">DOB: </label>
            <input type="date" name="dobCal" value="<?php if(isset($_POST['dobCal'])) echo $_POST['dobCal']; ?>"><br/><br/>

            <!-- Gender -->
            <label for="gender">Gender: </label>
            <input type="radio" name="gender" value="male" <?php radioSET('male') ?>> Male
            <input type="radio" name="gender" value="female" <?php radioSET('female') ?>> Female
            <input type="radio" name="gender" value="others" <?php radioSET('others') ?>> Others
            <br/><br/>

            <!-- Course -->
            <label for="course">Course: </label>
            <input type="checkbox" name="course[]" value="PHP" <?php CourseSET('PHP') ?>>PHP
            <input type="checkbox" name="course[]" value="JAVA" <?php CourseSET('JAVA') ?>>JAVA
            <input type="checkbox" name="course[]" value=".NET" <?php CourseSET('.NET') ?>>.NET <br/><br/>

            <!-- image path -->
            <label for="image">Photo: </label>
            <input type="file" name="imagePath"><br/><br/>

            <!-- message Area -->
            <label for="message">Message: </label>
            <textarea rows="4" cols="50" name="userComment"><?php if(isset($_POST['userComment'])) echo $_POST['userComment']; ?></textarea><br /><br/>

            <!-- agree -->
            <input type="checkbox" name="termConform" value="agree" <?php if(isset($_POST['termConform'])) echo "checked"; ?>>
            <label for="conformTerm"> I agree to submit to this agrement.</label><br/><br/>
            <input type="submit" value="Register" name="submitRegister" />
            <input type="reset" value="Clear" />
        </fieldset>
    </form>
    
    <?php
        if(isset($_POST['submitRegister'])){
            
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confPass = $_POST['confPassword'];
            $email = $_POST['userEmail'];
            $DOB = $_POST['dobCal'];
            $gender = (isset($_POST['gender'])) ? $_POST['gender'] : array();
            $course = (isset($_POST['course'])) ?$_POST['course'] : array() ;
            $target_dir = "./uploads/";
            $photo = $_FILES['imagePath']['name'];
            $size = $_FILES['imagePath']['size'];
            $type = $_FILES['imagePath']['type'];
            $tempName = $_FILES['imagePath']['tmp_name'];
            $comment = $_POST['userComment'];
            $terms = (isset($_POST['termConform'])) ? $_POST['termConform'] : array();

            if (isNotEmpty($username,$email,$password,$confPass,$DOB,$gender,$course,$photo,$terms)){
                if(strlen($username)>8 && strlen($username)<20){
                    $pattern = "/(?=[A-Za-z0-9@#$%^&+!=]+$)^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%^&+!=]).*$/";
                    if(preg_match($pattern,$password)){
                       if($password == $confPass){
                        $hash = sha1($password);
                        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                            if(move_uploaded_file($tempName, $target_dir.$photo)){
                                if($terms == 'agree'){
                                echo "<br/><h1>Your data</h1><br/><p><strong>Name: </fstrong>$username</p><p><strong>Email: </strong>$email</p><p><strong>Password: </strong>$hash</p><p><strong>DOB: </strong>$DOB</p><p><strong>Gender: </strong>$gender</p><p><strong>Course: </strong>";
                                foreach($course as $selected){
                                    echo $selected."&nbsp;";
                                }
                                echo "</p><p><strong>Photo: </strong></p><img src=\"./uploads/$photo\" width=\"200px\" height=\"200px\" alt=\"Uploaded Image\"><p><strong>Comment: </strong>$comment</p><p><strong>Terms: </strong>$terms</p>";
                            }else{
                                echo "Please conform our terms and Condition.";
                            }
                            }else{
                                echo "Something went wrong";
                            }
                        }else{
                            echo "Email is invalid";
                        }
                       }else{
                        echo "Password Doesnot match";
                       }
                    }else{
                        echo "Please enter one uppercase, one lowercase including one special chareacter.";
                    }
                }else{
                    echo "Username must be more than 8 and less than 20";
                }
            }else{
                echo "Fill all the empty Fields.";
            }
        }
    ?>
    
</body>
</html>