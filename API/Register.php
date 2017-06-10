<?php
require_once 'DBconnect.php';

if (isset($_GET['username'], $_GET['email'], $_GET['hwid'], $_GET['password'])) {
 
 $uname = strip_tags($_GET['username']);
 $email = strip_tags($_GET['email']);
 $hwid = strip_tags($_GET['hwid']);
 $upass = strip_tags($_GET['password']);
 
 $uname = $DBcon->real_escape_string($uname);
 $email = $DBcon->real_escape_string($email);
 $upass = $DBcon->real_escape_string($upass);
 $hwid = $DBcon->real_escape_string($hwid);
 
 $hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version
 
 $check_email = $DBcon->query("SELECT email FROM tbl_users WHERE email='$email'");
 $count=$check_email->num_rows;
 
 if ($count==0) {
  
  $query = "INSERT INTO tbl_users(username,email,password,hwid) VALUES('$uname','$email','$hashed_password', '$hwid')";

  if ($DBcon->query($query)) {
	  die ('Success');
  }else {
	  die('Error 1');
  }
  
 } else {
  die('Error 2');
 }
} else {
	die('[AntiLeak]: Emulated Request, Client information logged');
}
 $DBcon->close();
?>