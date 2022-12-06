<?php
    $authorName = "Dipeshwar Bikram Shah";
    $IdNumber = "C7297971";
    // My first PHP 
    echo $authorName;
    echo "<br/>";
    echo $IdNumber;
    echo "<br/>";

    // ------------------------
    // Using Escape Characters. 
    // ------------------------
    echo "<h3>Using Escape Characters.</h3> ";
    echo "\"most programmer say it's better to use 'echo' rather than 'print'\" says who? <br/>";

    // ------------
    // Variables. 
    // ------------
    echo "<h3>Variables.</h3> ";
    $name = "David";
    $age = 12;
    echo "Hi my name is ".$name ." and I am ".$age." years old <br/>";
    
    echo "Mi nombre es $name y tengo $age anos de edad <br/>";

    // ------------
    // Functions.
    // ------------
    echo "<h3>Functions.</h3> ";

    //gettype()returns the type of a Variables (String, integer etc)

    echo gettype($name);
    echo '<br />';

    //strlen() returns the length of a string
    echo strlen($name);
    echo '<br />';

    //strtoUpper()returns capitalize the string
    echo strtoUpper($name);


    // ------------
    // Arithmetic 
    // ------------
    echo "<h3>Arithmetic.</h3> ";
    $num1 = 9;
    $num2 = 12;
    $multiply =$num1 * $num2;
    $per = ($num1/$num2)*100;

    $divide = number_format($num2/$num1,0);
    $remainder = $num2 % $num1;

    echo "num1 = $num1 <br/> num2 = $num2 <br/> num1 x num2 = $multiply <br/> num1 as a percentage of num2 = $per% <br/> num2 divided by num1 = $divide remainder $remainder";


    // ---------------
    // Feet and Meter.
    // ---------------
    $heightInMeter = 1.8;
    $heightInInches = floor(($heightInMeter *100)/2.54);
    $heightInFeet = floor($heightInInches/12);
    echo "<h3>Feet and Meter.</h3> <br/>";
    echo "Name: $name<br/>";
    echo "Age: $age<br/>";
    echo "Height in Meters: $heightInMeter <br/>";
    echo "Height in Feet and Inches: ".$heightInFeet."ft ".$heightInInches."ins";

?>