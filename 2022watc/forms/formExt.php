<?php
    function textSET($inputName){
        if (isset($_POST[$inputName])) {
            echo $_POST[$inputName];
        };
    };
    function radioSET($valueToCheck){
        if (isset($_POST['size']) && $_POST['size'] == $valueToCheck) echo 'checked';
    };
    function toppingSET($valueToCheck){
        if (isset($_POST['topping']) && $_POST['topping'] == $valueToCheck) echo 'selected';
    };
    function extToppingSET($valueToCheck){
        if(isset($_POST['extraTopping']) && in_array($valueToCheck,$_POST['extraTopping'])){
            echo 'checked';
        }
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
    <title>Form Extended</title>
</head>
<body>
    <h1>Order Form</h1>
    <p>Please fill out this form to place your order .</p>
    <form method="POST" action="#">
        <fieldset>
            <legend>Enter Your login details</legend>
            <label for="username">User Name: </label>
            <input type="text" name="username" value="<?php textSET('username')?>">&nbsp;&nbsp;&nbsp;
            <label for="email">Email: </label>
            <input type="email" name="email" value="<?php textSET('email')?>">
        </fieldset>
        <fieldset>
            <legend>Pizza Selection</legend>
            <label for="Size">Size: </label>
            <input type="radio" name="size" value="small" <?php radioSET('small')?>>small
            <input type="radio" name="size" value="medium"<?php radioSET('medium')?>>medium
            <input type="radio" name="size" value="large" <?php radioSET('large')?>>large<br/><br/>
            <label for="Topping">Topping: &nbsp;</label>
            <select name="topping" >
                <option value=""  >---Please Select---</option>
                <option value="seafood" <?php toppingSET('seafood')?>>Seafood</option>
                <option value="mushroom" <?php toppingSET('mushroom')?>>Mushroom</option>
                <option value="chicken" <?php toppingSET('chicken')?>>Chicken</option>
            </select><br/><br/>
            <label for="Extra">Extras: </label>
            <input type="checkbox" name="extraTopping[]" value="Parmesan" <?php extToppingSET('Parmesan')?>>Parmesan
            <input type="checkbox" name="extraTopping[]" value="Olives" <?php extToppingSET('Olives')?>>Olives
            <input type="checkbox" name="extraTopping[]" value="Capers" <?php extToppingSET('Capers')?>>Capers<br/><br/>
        </fieldset><br/>
        <input type="submit" value="Submit" name="configSubmit"/>
            <input type="reset" value="Clear" />
    </form>
    <?php
    if (isset($_POST['configSubmit'])) {
        
        
        // variable decleration
        $username = $_POST['username'];
        $email = $_POST['email'];
        $size = (isset($_POST['size'])) ? $_POST['size'] : array();
        $topping = $_POST['topping'];
        $extTopping = (isset($_POST['extraTopping'])) ? $_POST['extraTopping'] : array() ;
        
        //check for empty
        if (isNotEmpty($username,$email,$size,$topping,$extTopping)) {
            if (!(strlen($username)>=20)) {
               if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                echo "<h2>Thank You for your order:</h2>";
                echo "Customer ID: <strong>".$username."</strong><br/>";
                echo "Email: <strong>".$email."</strong><br/>";
                echo "Your Order: <strong>".$size."&nbsp;".$topping."</strong><br/>";
                echo "Extra Toppings: <strong>";
                foreach($_POST['extraTopping'] as $selected){
                    echo $selected."&nbsp;";
                };
                echo "</strong>";
               }else echo "Enter valid Email.";
            }else echo "Username should be less than 20.";
        }else echo "Fill the empty Fields.";
    };

    // echo $_POST['size'];
    // echo $_POST['topping'];
    // foreach($_POST['extraTopping'] as $selected){
    //     echo $selected."</br>";
    // };
    // $color = array('blue','red','yellow','black');
    // $i = 0;
    // while ($i <= 3) {
    //     echo $i.' '.$color[$i]."<br/>";
    //     $i++;
    // }
    ?>
</body>
</html>