<?php
date_default_timezone_set('Asia/Kathmandu');
$time = date("h-m-s A");
echo "Current Time is ". $time."</br>";
//selection
$user = "admin";
$pass= "admin123";

$today=date('l');
echo $today;

//Saturday and Sunday = Hurrya! Its holiday
//Firday = Its Weekend
//others = Its regular college days
if($today=="Sunday" || $today=="Saturday"){
    echo "Hurrya! its holiday";
}
else if($today=="Firday")
{
    echo "Its Weekend";
}
else
{
    echo "ITs Regular College Days";
}

switch($today)
{
    case 'Saturday':
    case 'Sunday':
        {
            echo "Hurrya! its holiday";
            break;
         } 
    case 'Friday':
        {
            echo "Its Weekend";
            break;
        } 
    default:
    {
        echo "ITs Regular College Days";
        break;
    }  
}

if($user=="admin" AND $pass=="admin123")
{
    echo "Login Success";
   // header("Location: success.php");
    
}
else{
    echo "Login Failedd";
}
?>
