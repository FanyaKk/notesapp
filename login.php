<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <title>Login page</title>
</head>
<body>
    <?php
    include 'header.php';

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: index.php");
        exit;
    }
    ?>
    <div class="container">
        <form name="form" action="login.inc.php" method="POST">
            <div class="container-form">
                <h1>Login</h1>
                <p class="instructions">Please fill the form</p>
                <div class="error-messages"> 
                    <?php 
                    //include 'login.inc.php';
                        if(isset($_GET["error"]))
                        {
                            if($_GET["error"] == "undefined")
                            {
                                echo "Username or password does not exist!";
                            }
                        }
                     ?>
                </div>
                <label for="username"><b>Username</b></label> <br>
                <input type="text" name="fusername" id="username"> <br>
                <label for="psw"><b>Password</b></label> <br>
                <input type="password" name="fpsw" id="psw"> <br>

                <button type="submit" name="submit" class="submit" a href="index.php">Login</a></button>
                
            </div>

            <div class="container signin">
                <p>You don't have an account yet? <a href="register.php">Registration</a>.</p>
            </div>
        </form>
    </div>
</body>
</html>