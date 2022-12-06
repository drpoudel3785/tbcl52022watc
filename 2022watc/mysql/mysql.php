<?php
    function textSET($inputName){
        if (isset($_POST[$inputName])) {
            echo $_POST[$inputName];
        };
    };
    function genderSET($valueToCheck){
        if (isset($_POST['gender']) && $_POST['gender'] == $valueToCheck) echo 'selected';
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL</title>
    <style>
        table,
        th,
        td {
        padding: 5px;
        border: 2px solid;
        }
    </style>
</head>
<body>
    <form method="POST" action="./insertRecord.php">
        <fieldset>
            <legend>Enter Customer Details</legend>
            <label for="firstname">First name: </label>
            <input type="text" name="firstname" value="<?php textSET('firstname')?>" maxlength="10"><br/><br/>
            <label for="surname">Surname: </label>
            <input type="text" name="surname" value="<?php textSET('surname')?>" maxlength="10"><br/><br/>
            <label for="email">Email: </label>
            <input type="email" name="txtEmail" value="<?php textSET('txtEmail')?>"><br/><br/>
            <label for="password">Password: </label>
            <input type="password" name="password" value="<?php textSET('password')?>"><br/><br/>

            <label for="gender">Gender: &nbsp;</label>
            <select name="gender" >
                <option value=""  hidden>---Please Select---</option>
                <option value="M" <?php genderSET('M')?>>Male</option>
                <option value="F" <?php genderSET('F')?>>Female</option>
            </select><br/><br/>
            <label for="age">Age:</label>
            <input type="text" name="age" value="<?php textSET('age')?>" maxlength="2"><br/>
        </fieldset>
        <br/>
        <input type="submit" value="Submit" name="configSubmit"/>
    </form>
    <?php include ('./selectRecord.php');?>
</body>
</html>