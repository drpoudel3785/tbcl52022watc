<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My First PHP</title>
</head>
<body>
<?php
   echo "GOod Morning, Welcome to WAT class";
   echo "<br/>";
   echo "Today Is".date('Y-m-d');

$txt1 = "Learn PHP";
$txt2 = "W3Schools.com";
$x = 5;
$y = 4;

echo "The data type for txt1 is " .gettype($txt1)."<br/>";
echo "The data type for x is " .gettype($x)."<br/>";
echo "<h2>" . $txt1 . "</h2>";
echo "Study PHP at " . $txt2 . "<br>";
echo $x + $y;
unset($x, $y, $txt1, $txt2);
echo $txt1;





?>
    
</body>
</html>
