<?php
session_start();
include_once "config.php";

$_SESSION['success'] = ""; 


    if(isset($_POST['fusername']) && isset($_POST['fpsw']))
    {
        $username = $_POST['fusername'];
        $password = $_POST['fpsw'];
        $user_id = null;
        
        $result = $connect->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
        $user = $connect->query("SELECT user_id FROM users WHERE user_id = '$user_id'");

        if(mysqli_num_rows($result) == 0)
        {
            header("location: login.php?error=undefined");
        }
 
        while($row = mysqli_fetch_array($result))
        {
            $check_username=$row['username'];
            $check_password=$row['password'];
            $user_id=$row['user_id'];
    
            if($username == $check_username && $password == $check_password)
            {                            
                // Store data in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["user_id"] = $user_id;
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $password;                            
                
                // echo $user_id;
                // echo"</br>";
                // echo $username;
                
                // Redirect user to welcome page
                header("location: index.php");
            }
        }
    }
    ?>