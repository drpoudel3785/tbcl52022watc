<?php

$names = array("Keshav" , "Dipenshwar", "Prajwal", "Sirish", "Sonika");
//printing single data
echo $names[2];

print_r($names);

//counting the array elements
echo "<br>";
echo "We have" .count($names). " Records";
//printing all records by for loop
//printing all records by while loop
//printing all records by do while loop
//printing all records by foreach loop

foreach($names as $n)
{
    echo "$n <br/>";
}


//Associative Array
$cart = array("tshirt"=>10.00, "pant"=>20.00, "Jacket"=>30.00);
  foreach($cart as $i=>$v)
  {
      echo "$i price is $" .number_format($v,2). "<br/>";
  }

?>