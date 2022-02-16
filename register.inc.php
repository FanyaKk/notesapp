<?php

if(isset($_POST['submit']))
{
    $email=$_POST['femail'];
    $username=$_POST['fusername'];
    $password = $_POST['fpsw'];
    $repeatPassword = $_POST['fpsw-repeat'];

    require_once 'config.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($email, $username, $password, $repeatPassword) !== false)
    {
        header("Location: register.php?error=emptyinput");
        exit();
    }
    // if(invalidEmail($email) !== false)
    // {
    //     header("Location: register.php?error=invalidemail");
    //     exit();
    // }
    if(invalidUid($username) !== false)
    {
        header("Location: register.php?error=invaliduid");
        exit();
    }
    if(passwordLenght($password) < 8)
    {
        header("Location: register.php?error=tooshortpassword");
        exit();
    }
    if(passwordMatch($password, $repeatPassword) !== false)
    {
        header("Location: register.php?error=unmatched");
        exit();
    }
    

    $success = $connect->query("INSERT INTO users (email_address, username, password) VALUES('$email', '$username', '$password')");
    $fail =  !$success;
    if ($fail)
    {
        die($mysqli->error);
    }
    else if($success)
    {
        header ('location: index.php');
    }
}