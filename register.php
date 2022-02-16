<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Registration form</title>
</head>
<body>  

    <?php 
    include_once 'header.php';
    //require_once 'register.inc.php';
    ?> 

<div class="container">
    <form name="form" action="register.inc.php" method="POST">
       <div class="container-form">
            <h1>Registration</h1>
            <p>To create an account, please fill the form!</p>
            <div class="error-messages">
                <?php
                    if(isset($_GET["error"]))
                    {
                        if($_GET["error"] == "emptyinput")
                        {
                            echo "Please fill all fields!";
                        }
                        if($_GET["error"] == "invaliduid")
                        {
                            echo "Username can only contains small, big letters and numbers!";
                        }
                        if($_GET["error"] == "tooshortpassword")
                        {
                            echo "Password must be at least 8 characters! ";
                        }
                        if($_GET["error"] == "unmatched")
                        {
                            echo "Password does not match!";
                        }
                    }
                    echo "</br>";
                ?>
            </div>
            </br>
            <label for="email"><b>Email*</b></label> <br>
            <input type="text" name="femail" id="email"> <br>

            <label for="username"><b>Username*</b></label> <br>
            <input type="text" name="fusername" id="username"> <br>

            <label for="psw"><b>Password*</b></label> <br>
            <input type="password" name="fpsw" id="psw"> <br>

            <label for="psw-repeat"><b>Repeat password*</b></label> <br>
            <input type="password" name="fpsw-repeat" id="pswrepeat"> <br>

            <p class="instructions">To cerate an account, you agree <br>with <a href="#">our terms and conditions</a>.</p>

            <button type="submit" class="submit" name="submit">Register</button>
            </div>
        <div class="container signin">
            <p>You already have an account? <a href="login.php">Login</a>.</p>
        </div>
    </form>
    </div>
    
</body>
</html>