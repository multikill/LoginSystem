<?php
require_once 'mysqli_connect.php';
include 'api.php';

if (isset($_POST['username'], $_POST['email'], $_POST['hwid'], $_POST['password'])) 
{
	
//Check for https connection
if (empty($_SERVER['HTTPS'])) 
{
    die('#error_server_only_allows_https');
}

    //Escape strings
    $username = _misc::EscapeString($_POST["username"]);
    $email    = _misc::EscapeString($_POST["email"]);
    $hwid     = _misc::EscapeString($_POST["hwid"]);
    $password = _misc::EscapeString($_POST["password"]);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT); //requires PHP 5.5

    if (_request::checkEmail($email)) //Check if Email is not already in use
    {
       if (_request::addUser($username, $email, $hashed_password, $hwid)) //Add user
       {
            die('#success_user_registered'); //User successfully registered
       }
        die('#error_database_failure'); //Database Failure
    }
    
    die('#error_email_already_used'); //Email already in use
}
$mysqli_connect->close();
?>