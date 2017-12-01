<?php
require_once 'DBconnect.php';


//allow only https
if (empty($_SERVER['HTTPS'])) {
    header('Location: 404.html');
    exit;
}

if (isset($_POST['hwid'], $_POST['username'], $_POST['password'], $_POST['token'])) {

// IP Logger ==> Get last IP of User trying to Login
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

$currentip = get_client_ip();

//escape strings
 $username = strip_tags($_POST['username']);
 $hwid = strip_tags($_POST['hwid']);
 $password = strip_tags($_POST['password']);
 $token       = $_POST['token'];

 $username = $DBcon->real_escape_string($username);
 $hwid = $DBcon->real_escape_string($hwid);
 $password = $DBcon->real_escape_string($password);

 //Check login request ==> send response
$check_username = $DBcon->query("SELECT username FROM tbl_users WHERE username='$username'");
$count_username=$check_username->num_rows;
if ($count_username==0) {
	die('#error_invalid_user'); //
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
        $subcheck = $DBcon->query("SELECT membership FROM tbl_users WHERE hwid='$hwid'");
        $row_subcheck = $subcheck->fetch_array();
        $membership = $row_subcheck['membership'];
        if ($membership == 1) {
      mysqli_query($DBcon, 'UPDATE tbl_users SET lastip='.$currentip.' WHERE hwid='.$hwid.'');
			$ctoken = md5($token);
			die("$ctoken");
    } else {
      die('#error_no_items_owned');
    }
    } elseif ($result == $pending) {
      die('#error_accountstatus_pending'); //accounts is not activated
    } else {
      die('#error_accoutn_untrusted'); //HWID Changed
    }
		} else {
			$DBcon->query("UPDATE tbl_users SET status='2' WHERE username='$username'");
			die('#error_hwid_changed'); //HWID changed ==> user untrusted
		}
 } else {
	 die('#error_invalid_credentials');
 }
}
} else {
 header('Location: 404.html');
}

$DBcon->close();
?>
