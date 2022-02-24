<?php


//register.php-----------------------------------------------------------
function emptyInputSignup($email, $username, $password, $repeatPassword)
{
    $result = "";
    if(empty($email) || empty($username) || empty($password) || empty($repeatPassword))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}
// function invalidEmail($email)
// {
//     $result = "";
//     if(filter_var($email, FILTER_VALIDATE_EMAIL))
//     {
//         $result = true;
//     }
//     else
//     {
//         $result = false;
//     }
//     return $result;
// }
function invalidUid($username)
{
    $result = "";
    $pattern = '/^[A-Za-z]{1}[A-Za-z0-9]{4,31}$/';
    // $pattern = '^[a-z]{1}[\w]{5,31}$';
    // $pattern = '[a-z]{1}[\w]{5,20}';
    // $pattern = preg_replace("/[\s]/","",$pattern);
    if(!preg_match($pattern, $username))
    {
        $result = true;  
    }
    else
    {
        $result = false;
    }
    return $result;
}
function passwordLenght($password)
{
    $result = "";
    if(strlen($password) > 7)
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}
function passwordMatch($password, $repeatPassword)
{
    $result = "";
    if($password !== $repeatPassword)
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

//welcome.php ----------------------------------------------------------------------------------
function emptyInputNote($title, $content)
{
    $result = "";
    if(empty($title) || empty($content))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}