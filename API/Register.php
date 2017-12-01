<?php
require_once 'DBconnect.php';

if (isset($_POST['username'], $_POST['email'], $_POST['hwid'], $_POST['password'])) {
	
//check for https connection
if (empty($_SERVER['HTTPS'])) {
    header('Location: 404.html');
    exit;
}

//escape strings
 $uname = strip_tags($_POST['username']);
 $email = strip_tags($_POST['email']);
 $hwid = strip_tags($_POST['hwid']);
 $upass = strip_tags($_POST['password']);

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
	  die ('#success_user_registered');
  }else {
	  die('#error_registration_failed');
  }

 } else {
  die('#error_user_already_exists');
 }
} else {
	header('Location: 404.html'); //Invalid Request
}
 $DBcon->close();
?>
