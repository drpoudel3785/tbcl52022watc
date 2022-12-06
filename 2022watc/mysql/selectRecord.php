<?php

// Make connection with database
include('./connection.php');

// Display heading
echo '<h2>Select ALL from the Customer Table</h2>';

// run query to select all records from costomer table
$queryAll = "SELECT * FROM customer";


//store the result of the query in a varialble  called $result
$result = mysqli_query($connection, $queryAll);

// use of while loop to iterate through the data and print certain value.

// while ($row = mysqli_fetch_assoc($result)) {
//     echo $row['FirstName'].' '.$row['LastName'].' '.$row['Email'].' '.'<br/>'; 
// }


echo "<table>";
echo "<tr><th><strong>FirstName</strong></th><th><strong>LastName</strong></th><th><strong>Email</strong></th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td><strong>".$row['FirstName']."</strong></td><td><strong>".$row['LastName']."</strong></td><td><strong>".$row['Email']."</strong></td><tr/>";
};
echo "</table>";



// Display heading Age > 22
echo '<h2>Select ALL from the Customer Table with Age > 22</h2>';

// run query to select all records from costomer table with Age > 22
$queryAge22 = "SELECT FirstName, LastName, Email, Age FROM customer Where Age > 22";

//store the result of the query in a varialble  called $result
$resultA22 = mysqli_query($connection, $queryAge22);

//Table
echo "<table>";
echo "<tr><th><strong>FirstName</strong></th><th><strong>LastName</strong></th><th><strong>Email</strong></th><th><strong>Age</strong></th></tr>";
while ($rowAge22 = mysqli_fetch_assoc($resultA22)) {
    echo "<tr><td><strong>".$rowAge22['FirstName']."</strong></td><td><strong>".$rowAge22['LastName']."</strong></td><td><strong>".$rowAge22['Email']."</strong></td><td><strong>".$rowAge22['Age']."</strong></td><tr/>";
};
echo "</table>";



// Display heading Age >= 22
echo '<h2>Select ALL from the Customer Table with Age >= 22</h2>';

// run query to select all records from costomer table with Age > 22
$queryAgeEq22 = "SELECT FirstName, LastName, Email,   Age FROM customer Where Age >= 22 AND Gender = 'F' ";

//store the result of the query in a varialble  called $result
$resultAEq22 = mysqli_query($connection, $queryAgeEq22);

//Table
echo "<table>";
echo "<tr><th><strong>FirstName</strong></th><th><strong>LastName</strong></th><th><strong>Email</strong></th><th><strong>Age</strong></th></tr>";
while ($rowAgeEq22 = mysqli_fetch_assoc($resultAEq22)) {
    echo "<tr><td><strong>".$rowAgeEq22['FirstName']."</strong></td><td><strong>".$rowAgeEq22['LastName']."</strong></td><td><strong>".$rowAgeEq22['Email']."</strong></td><td><strong>".$rowAgeEq22['Age']."</strong></td><tr/>";
};
echo "</table>";



// Display heading male desc by age
echo '<h2>Select ALL from the Customer Table list by age descending</h2>';

// run query to select all records from costomer table with Age > 22
$queryM = "SELECT FirstName, LastName, Email, Age FROM customer Where Gender = 'M' ORDER BY Age DESC";

//store the result of the query in a varialble  called $result
$resultMA = mysqli_query($connection, $queryM);

//Table
echo "<table>";
echo "<tr><th><strong>FirstName</strong></th><th><strong>LastName</strong></th><th><strong>Email</strong></th><th><strong>Age</strong></th></tr>";
while ($rowM = mysqli_fetch_assoc($resultMA)) {
    echo "<tr><td><strong>".$rowM['FirstName']."</strong></td><td><strong>".$rowM['LastName']."</strong></td><td><strong>".$rowM['Email']."</strong></td><td><strong>".$rowM['Age']."</strong></td><tr/>";
};
echo "</table>";



// Display heading first name contain 'a'
echo '<h2>Select ALL from the Customer Table with "a" in the first name</h2>';

// run query to select all records from costomer table with Age > 22
$queryCA = "SELECT FirstName, LastName, Email, Age FROM customer Where FirstName LIKE '%a%' ";

//store the result of the query in a varialble  called $result
$resultCA = mysqli_query($connection, $queryCA);

//Table
echo "<table>";
echo "<tr><th><strong>FirstName</strong></th><th><strong>LastName</strong></th><th><strong>Email</strong></th><th><strong>Age</strong></th></tr>";
while ($rowCA = mysqli_fetch_assoc($resultCA)) {
    echo "<tr><td><strong>".$rowCA['FirstName']."</strong></td><td><strong>".$rowCA['LastName']."</strong></td><td><strong>".$rowCA['Email']."</strong></td><td><strong>".$rowCA['Age']."</strong></td><tr/>";
};
echo "</table>";
?>