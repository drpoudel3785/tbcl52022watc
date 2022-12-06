<?php
echo "<table>";

echo "<tr>";
for($i = 1; $i <=100 ; $i++){
    if($i == 45){
        echo "<td> $i </td></tr><tr>";
    }
    elseif($i % 10 == 0){
        echo "<td> $i </td></tr><tr>";
    }else{
        echo "<td>$i</td>";
    }
}
echo "</tr>";

echo "</table>";
?>