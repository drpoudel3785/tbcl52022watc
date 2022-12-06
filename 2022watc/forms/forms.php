<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms</title>
</head>
<body>
    <h1>Processing Input from HTML Forms</h1>
    <h2>Login Form using GET</h2>
    <form method="POST" action="#">
    <fieldset>
            <legend>
                Login
            </legend>
            <label for="email">Email: </label>
            <input type="text" name="txtEmail"/><br />
            <label for="passwd">Password: </label>
            <input type="password" name="txtPass" /><br />
            <input type="submit" value="Submit" name="loginSubmit"  />
            <input type="reset" value="Clear" />
        </fieldset>
    </form>
    <?php

        if (isset($_POST['loginSubmit'])) {
            $email=$_POST['txtEmail'];
            $pass=$_POST['txtPass'];
            echo "Email: ".$email." Password: ".$pass;
        }else{

        }
    ?>
    <form method="POST" action="#">
        <fieldset>
            <legend>Comments</legend>
            <label for="email">Email: </label>
            <input type="text" name="usrEmail" value="<?php if (isset($_POST['usrEmail'])) {
            echo $_POST['usrEmail']; 
            } ?>" /><br />
            <textarea rows="4" cols="50" name="userComment"></textarea><br />
            <label for="checkbox">Click to Confirm: </label>
            <input type="checkbox" name="conformation" value="agree"><br />
            <input type="submit" value="Submit" name="configSubmit"/>
            <input type="reset" value="Clear" />
        </fieldset>
    </form>

    <?php
        $conformBox = (isset($_POST['conformation'])) ? 'Agree' : 'Not Agree' ;
        if (isset($_POST['configSubmit'])) {
            $email = $_POST['usrEmail'];
            if(!empty($email)){
                if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
                    $comment = $_POST['userComment'];
                    echo "Email: ".$email."<br/> Comments: ".$comment."<br/> Conform: ".$conformBox;
                }else{
                    echo "Invalid Email.";
                };
            }else{
                echo "Email must not be empty.";
            }
            
        }
    ?>
    <h1>Tax Calculator</h1>
    <form method="POST" action="#">
        <fieldset>
            <legend>Without TAX calculator</legend>
            <label for="ATP">After Tax Price: </label>
            <input type="text" step="0.01" name="ATP" value="<?php if (isset($_POST['ATP'])) {
            echo $_POST['ATP']; 
            } ?>" /><br />
            <label for="Rate">Tax Rate: </label>
            <input type="text" name="rate" value="<?php if (isset($_POST['rate'])) {
            echo $_POST['rate']; 
            } ?>" /><br />
            
            <input type="submit" value="Submit" name="taxCalc"/>
            <input type="reset" value="Clear" />
        </fieldset>
    </form>
    <?php
        
        if (isset($_POST['taxCalc'])) {
            $AfterTaxPrice = $_POST['ATP'];
            $Rate = $_POST['rate'];
            $BeforeTaxPrice = 0;
            // Empty check
            if (!empty($AfterTaxPrice) && !empty($Rate)) {
                if (is_int((int) $AfterTaxPrice)|| preg_match('/^\d+(:?[.]\d{2})$/',$AfterTaxPrice)) {
                    if (is_int((int) $Rate)) {
                        $BeforeTaxPrice = (100 * $AfterTaxPrice ) / ( 100+ $Rate);
                    }else{
                        echo "Please enter a whole number for tax rate";
                    }
                }else{
                    echo "Please enter the price in the format 9.99";
                }
            }else{
                echo "Please Fill the empty Field.";
            }
            echo "<h2>Price before tax = ￡".number_format($BeforeTaxPrice,2)."</h2>";
        };
    ?>

    <h1>Passing Data Appended to an URL</h1>
	<h2>Pick a category</h2>
	<a href="forms.php?cat=Films">Films</a>
	<a href=" forms.php?cat=Books">Books</a>
	<a href=" forms.php?cat=Music">Music</a>
    <?php
    if(isset($_GET['cat'])){
        echo "<br/>";
        echo "<h4> The category chosen is ".$_GET['cat']."</h4>";
    }
    ?>
    <br/>
    <br/>
    <a href="./formExt.php">Ext Form</a>
</body>
</html>