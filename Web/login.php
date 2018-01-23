<?php
require_once 'mysqli_connect.php';
include 'api.php';


//Check for https connection
if (empty($_SERVER['HTTPS'])) 
{
    die('#error_server_only_allows_https');
}

if (isset($_POST['hwid'], $_POST['username'], $_POST['password']))
{

    //escape strings
    $username = _misc::EscapeString($_POST["username"]);
    $hwid     = _misc::EscapeString($_POST["hwid"]);
    $password = _misc::EscapeString($_POST["password"]);

    if (!_request::checkUser($username) == true)
    {
        die('#error_invalid_user');
    }

    $query = $mysqli_connect->query("SELECT user_id, password, hwid FROM tbl_users WHERE username='$username'");
    $row=$query->fetch_array();

    $count = $query->num_rows;
    
    
    if (password_verify($password, $row['password']) && $count==1) 
    {
		if (_request::checkHwid($hwid)) 
        {
            if (_request::checkStatus($hwid) == active)
            {
                //Successfull Login
                //Your Code
            }
            
            die('#error_account_disabled');
        } 
        else 
        {
	       die('#error_invalid_credentials');
           _request::banUser($username);
        }
    } 
    else 
    {
        die('#error_invalid_request');
    }
    
}

$mysqli_connect->close();
?>
