<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Web Applications and Technologies</title>
      <link type="text/css" rel="stylesheet" href="./main.css" />
   </head>
   <body>
      <header>
         <h1>Dipeshwar Bikram Shah C7297971</h1> 
      </header>
      
      <section id="container">
         <h1>Fundamentals of PHP</h1>
         <h1>Selection</h1>
         <?php

            // WeekDays checking
            $day = date('l'); // That is lower case L
            echo 'it\'s '.$day;
            if($day == 'Wednesday'){
                echo "<br/>it's midweek.";
            }else{
                echo "<br/>it's not midweek.";
            }

            // Hour checking
            echo "<br/>";
            date_default_timezone_set("Asia/Katmandu");

            $Hour = date("H"); // 24hour format
            if(12>$Hour){
                echo "Good Morning.";
            }elseif ($Hour>12 && $Hour<18) {
                echo "Good Afternoon.";
            } else {
                echo "Good Night.";
            }

            // Password length check
            $password = "password";
            $ValidPass = (strlen($password)>4 && strlen($password)<10) ?  "Password length is Valid" : "Password length is inalid" ;
            echo "<br/>".$ValidPass;

            // password or username checking
            $passOrUsr = ($password == 'password'|| $password == 'username') ? "Password invalid" : "Password valid" ;

            echo "<br/>".$passOrUsr;

		?>
        <br>
        <br>
        <h1>Ticket mechanism.</h1>
        <?php
        $initPrice = 25;
        $age = 15;
        $membership = true;
        $finalPrice = 0 ;
        if ($age<12) {
            $finalPrice = ($membership) ? $initPrice -($initPrice*0.6) : $initPrice - ($initPrice*0.5) ;
        }elseif ($age<18 || $age>65) {
            $finalPrice = ($membership) ? $initPrice -($initPrice*0.35) : $initPrice - ($initPrice*0.25) ;
        }
        echo "Initial Ticket Price: ￡".$initPrice;
        echo "<br/>";
        echo "Age: ".$age;
        echo "<br/>";
        echo "Member: ",($membership) ? "Yes": "No";
        echo "<br/>";
        echo "Final Ticket Price: ￡".$finalPrice;
        ?>
        <br>
        <br>


        <!-- Array -->
        <?php

        // --------
        // Arrays.
        // --------
        echo "<h1>Arrays</h1>";
        echo "<h3>Simple Arrays</h3>";

        $products = array("t-shirt","cap","mug");
        print_r($products);
        echo "<br/>";
        $products[1] = "shirt";
        print_r($products);
        echo "<br/>";
        $products[] = "skirt";
        print_r($products);
        echo "<br/>";
        echo "Items in my products array";
        echo "<br/>";
        echo "The item at index [2] is: ".$products[2];
        echo "<br/>";
        echo "The item at index [3] is: ".$products[3];
        echo "<br/>";
        echo "<br/>";


        // -------------------
        // Associative Arrays.
        // -------------------
        echo "<h3>Associative Arrays.</h3>";
        $customer = array('CustID'=>12,'CustName'=>'Sarah','CustAge'=> 23,'CustGender'=> 'F');
        print_r($customer);
        echo "<br/>";
        $customer['CustAge']= 32;
        print_r($customer);
        echo "<br/>";
        $customer['CustEmail'] ='sarah@gmail.com';
        print_r($customer);
        echo "<br/>";
        echo "Items in my customer array <br/>";
        echo "The item at index [CustName] is: ".$customer['CustName'];
        echo "<br/>";
        echo "The item at index [CustEmail] is: ".$customer['CustEmail'];
        echo "<br/>";


        // -------------------------
        // Multi-Dimensional Arrays.
        // -------------------------
        echo "<h3>Multi-Dimensional Arrays.</h3>";
        $stock = array(
            array('id1', array('description'=>'t-shirt','price'=>9.99,'stock'=> 100,'colour'=>array('blue','green','red'))),
            array('id2', array('description'=>'cap','price'=>4.99,'stock'=> 50,'colour'=>array('blue','black','gray'))),
            array('id3', array('description'=>'mug','price'=>6.99,'stock'=> 30,'colour'=>array('yellow','green','pink')))
        );
        // print_r($stock);
        echo "This is my order: <br/>";
        echo $stock[0][1]['colour'][1]," ",$stock[0][1]['description'],"<br/>";
        echo "Price: ￡",$stock[0][1]['price'],"<br/>";
        echo $stock[1][1]['colour'][2]," ",$stock[1][1]['description'],"<br/>";
        echo "Price: ￡",$stock[1][1]['price'],"<br/>";
        ?>




        <!-- Loops -->
        <?php
        // --------
        // loops.
        // --------
        echo "<h1>Loops</h1>";
        echo "<h3>While Loop</h3>";

        $counter = 1;
        while ($counter < 6) {
            echo 'Count: '.$counter.'<br/>';
            $counter++;
        }
        
        echo "<br/>";


        $counter2 =1;
        $shirtPrice = 9.99;
        echo "<table class='backTable'>";
        echo "<tr><th><strong>Quality</strong></th><th><strong>Price</strong></th></tr>";
        while ($counter2 <=10) {
            $total = $counter2 * $shirtPrice;
            echo "<tr>";
            echo "<td>
            <strong>".$counter2."</strong></td>";
            echo "<td>
            <strong>￡".number_format($total,2)."</strong></td>";
            echo "<tr/>";
            $counter2++;
        };
        echo "</table>";
        echo "<br/>";

        echo "<h3>For Loops</h3>";

        $names = array("harry","mohan","shyam","gobind","ram");
        for ($i=0; $i < 5; $i++) { 
            echo $names[$i].'<br/>';
        }

        echo "<h3>Foreach Loops</h3>";
        $assoNames = array('harry'=>'c123455','mohan'=>'c126789','shyam'=>'c138041','gobind'=>'c138901','ram'=>'c380408');

        foreach ($assoNames as $key => $value) {
            echo "Name: ".$key." , ID: ".$value."<br/>";
        };


        
        echo '<br/>';
        $city = array('Peter'=> 'LEEDS', 'Kat'=>'bradford','Laura'=>'wakeFIeld');
        print_r($city);
        echo '<br/>';
        foreach ($city as $key => $value) {
            $city[$key] = ucfirst(strtolower($value));
        };
        print_r($city);
    
    
    
        echo "<h1>Some Useful Functions.</h1>";
        $password = 'password';
        // $password = null;
        $trimedPass = htmlentities(trim($password));
        echo "Password is: ".$trimedPass;
        echo '<br/>';



        // if(isset($password) && !empty($password) && $password !== ' '){
        //     echo "Password Ok.";
        // }else{
        //     echo "Re-Enter your Password.";
        // };

        
        $testSet = (isset($trimedPass) && !empty($trimedPass) && $trimedPass !== ' ') ?(strlen($trimedPass)>6 && strlen($trimedPass)<=8)?(is_numeric($trimedPass))?"Password cannot be a number":"Password Ok.":"Your Password must be between 6 and 8 characters in length.": "Re-Enter your Password.";
        echo $testSet;
        echo '<br/>';
        echo "encrypted in md5: ".md5($trimedPass);
        echo '<br/>';
        echo "encrypted in sha1: ".sha1($trimedPass);
        
        echo "<h1>Progress Check</h1>";
        echo "Dipeshwar Bikram Shah C7297971";
        echo '<br/>';
        echo "It's not more than ￡3";
        echo '<br/>';
        $loan = 500;
        $rate = 3.5;
        $interest =($loan/100)* 3.5;
        echo "Loan: ".$loan."<br/>Rate: ".$rate."% <br/>Payable: ￡".number_format($interest,2);

        echo '<br/>';
        $user ='user01';
        $pass = 'passwd';
        $success = ($user == 'user01'&& $pass == 'passwd')? "Success.":"Fail.";
        echo $success;

        echo '<br/>';
        $success2 = strlen($pass)>=6?($user == 'user01'&& $pass == 'passwd')? "Success.":"Fail.":"Please use at least 6 characters";
        echo $success2;
        
        ?>

    
        
      </section>
      <footer>   
         <small> <a href="../watIndex.html">Home</a></small>
      </footer>
   </body>
</html>
