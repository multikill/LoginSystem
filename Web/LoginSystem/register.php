<?php
require_once 'mysqli_connect.php';
include 'api.php';

if (isset($_GET['username'], $_GET['email'], $_GET['hwid'], $_GET['password'])) 
{
//Check for https connection
if (empty($_SERVER['HTTPS'])) 
{
    //die('#error_server_only_allows_https');
}
	global $mysqli_connect;
    //Escape strings
    $username = mysqli_real_escape_string($mysqli_connect,$_GET["username"]);
    $email    = mysqli_real_escape_string($mysqli_connect,$_GET["email"]);
    $hwid     = mysqli_real_escape_string($mysqli_connect,$_GET["hwid"]);
    $password = mysqli_real_escape_string($mysqli_connect,$_GET["password"]);

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