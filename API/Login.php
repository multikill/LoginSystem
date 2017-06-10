<?php
require_once 'DBconnect.php';

if (isset($_GET['hwid'], $_GET['username'], $_GET['password'], $_GET['token'])) {

  // Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}



 $username = strip_tags($_GET['username']);
 $hwid = strip_tags($_GET['hwid']);
 $password = strip_tags($_GET['password']);
 $token       = $_GET['token'];

 $username = $DBcon->real_escape_string($username);
 $hwid = $DBcon->real_escape_string($hwid);
 $password = $DBcon->real_escape_string($password);

$check_username = $DBcon->query("SELECT username FROM tbl_users WHERE username='$username'");
$count_username=$check_username->num_rows;
if ($count_username==0) {
	die('[AntiLeak]: Invalid Username, please try again');
} else {

 $query = $DBcon->query("SELECT user_id, password, hwid FROM tbl_users WHERE username='$username'");
 $row=$query->fetch_array();

 $count = $query->num_rows; // if email/password are correct returns must be 1 row
 if (password_verify($password, $row['password']) && $count==1) {
	  $check_hwid = $DBcon->query("SELECT hwid FROM tbl_users WHERE hwid='$hwid'");
		$count_hwid=$check_hwid->num_rows;
		if ($count_hwid==1) {
      $check_status = $DBcon->query("SELECT status, user_id FROM tbl_users WHERE hwid='$hwid'");
      $row_status = $check_status->fetch_array();
      $result = $row_status['status'];
      $active = "1";
      $pending = "0";
      if ($result == $active) {
      $DBcon->query("UPDATE tbl_users SET lastip='$ipadress' WHERE hwid='$hwid'");
			$ctoken = md5($token);
			die("$ctoken");
    } elseif ($result == $pending) {
      die('f642f6472bd671e5e16bb9281ed5be78'); //No Active Subscription
    } else {
      die('2da4a62f14d48b1b34d4bb7839640983'); //HWID Changed
    }
		} else {
			$DBcon->query("UPDATE tbl_users SET status='2' WHERE username='$username'");
			die('2da4a62f14d48b1b34d4bb7839640983'); //HWID Changed
		}
 } else {
	 die('Error 1');
 }
}
} else {
 die('[VB-AntiLeak]: Emulated Request, Client information Logged');
}
$DBcon->close();
?>
