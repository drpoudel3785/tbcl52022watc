<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog Site</title>
</head>
<body>
    <header>
        <nav>
           <?php include("inc_menu.php");?>
           
           <a href="./login.php">Log In</a>
        </nav>

    </header>
    <hr>
    <main>
        <?php include("./showAllPost.php") ?>
    </main>
    <footer>
        <?php include("./admin/inc_footer.php") ?>
    </footer>
    
</body>
</html>