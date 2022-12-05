<?php
    // sql
    $sql = "SELECT * FROM posts";

    $qry = mysqli_query($conn,$sql) or die(mysqli_error($sql));

    //print the result
    $count = mysqli_num_rows($qry);
    if($count >=1){
        while($row = mysqli_fetch_array($qry)){
            echo "<div><h1>".$row['title']."</h1><div><img src=\"./postPic/".$row['fimage']."\" width=\"200px\" height=\"200px\" alt=\"fimage\" ><p>".substr($row['description'],0,20)." <a href=\"./postDescription.php?postId=".$row['id']."\">[Read more]</a>"."</p></div></div>";
        }
    }else{
        echo " No Post is Avilable";
    }
?>