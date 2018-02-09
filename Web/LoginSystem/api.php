<?php

require_once 'mysqli_connect.php';

class _misc 
{
  public static function EscapeString ($input)
  {
	global $mysqli_connect;
    $output = strip_tags($string);
    
    $mysqli_connect->real_escape_string($output);
    
    
  }
  
}

class _request
{
   public static function checkUser ($username)
   {
	global $mysqli_connect;
    $check_username = $mysqli_connect->query("SELECT username FROM tbl_users WHERE username='$username'");
    $count_username=$check_username->num_rows;
    if ($count_username==0) 
    {
     return false;   
    }
    return true;
   }
   
   public static function checkHwid ($hwid)
   {
	global $mysqli_connect;
    $check_hwid = $mysqli_connect->query("SELECT hwid FROM tbl_users WHERE hwid='$hwid'");
    $count_hwid=$check_hwid->num_rows;
    if ($count_hwid==0)
    {
     return false;   
    }
    return true;
   }
   
   public static function checkStatus ($hwid)
   {
	  global $mysqli_connect;
      $check_status = $mysqli_connect->query("SELECT status, user_id FROM tbl_users WHERE hwid='$hwid'");
      $row_status = $check_status->fetch_array();
      $result = $row_status['status'];
    
      $active  = "1";
      $pending = "0";
      $banned  = "2";
      
      if ($result == $active)
      {
        return "active";
      }
      elseif ($result == $pending)
      {
        return "pending";
      }
      else
      {
        return "banned";
      }
      
      return false;
   }
   
   public static function banUser ($username)
   {
	global $mysqli_connect;
    $mysqli_connect->query("UPDATE tbl_users SET status='2' WHERE username='$username'");
   }
   
   public static function checkEmail ($email)
   {
	global $mysqli_connect;
    $check_email = $mysqli_connect->query("SELECT email FROM tbl_users WHERE email='$email'");
    $count=$check_email->num_rows;
    
    if ($count == 0) {
        return true;
    }
    return false;
   }
   
   public static function addUser ($username, $email, $hashed_password, $hwid)
   {
	global $mysqli_connect;
    $query = "INSERT INTO tbl_users(username,email,password,hwid) VALUES('$username','$email','$hashed_password', '$hwid')";
    
    if ($mysqli_connect->query($query)) 
    {
        return true;
    }
    return false;
   }
}
?>