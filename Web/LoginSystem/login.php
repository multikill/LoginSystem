<?php
require_once 'mysqli_connect.php';
include 'api.php';


//Check for https connection
if (empty($_SERVER['HTTPS'])) 
{
    //die('#error_server_only_allows_https');
}

if (isset($_GET['hwid'], $_GET['username'], $_GET['password']))
{
	
	global $mysqli_connect;
    //escape strings
    $username = mysqli_real_escape_string($mysqli_connect,$_GET["username"]);
    $hwid     = mysqli_real_escape_string($mysqli_connect,$_GET["hwid"]);
    $password = mysqli_real_escape_string($mysqli_connect,$_GET["password"]);

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
            if (_request::checkStatus($hwid) == "active")
            {
				echo "OK";
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
