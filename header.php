<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="header.css">

    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        //check if the user is logged in or not
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
        {
    ?>
        <div class="header">
                <a href="index.php" class="logo">Notes</a>
                <div class="header-right">
                    <a class="active" href="index.php">Home</a>
                    <a href="login.php">Login</a>
                    <a href="register.php">Register</a>
                </div>
            </div>
    <?php
        }
        else
        {
    ?>
            <div class="header">
                <a href="#default" class="logo">Notes</a>
                <div class="header-right">
                    <a class="active" href="index.php">Home</a>
                    <a href="logout.php">Logout</a>
                </div>
            </div>
    <?php
        }
        
    ?>
    
</body>
</html>