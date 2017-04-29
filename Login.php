<?php
// Made by astron-dev; Pls give credit if youre using my Code.
require_once 'Settings.php';

//Variables for MySQL
$user        = strip_tags($_GET['username']);
$pass        = strip_tags($_GET['password']);
$sendhwid    = strip_tags($_GET['hwid']);
$token       = $_GET['token'];
$active      = "true";

$user        = $DBcon->real_escape_string($_GET['username']);
$pass        = $DBcon->real_escape_string($_GET['password']);
$sendhwid    = $DBcon->real_escape_string($_GET['hwid']);

    $query = $DBcon->query("SELECT username FROM "$DBtable" WHERE username='$user'");
    $row=$query->fetch_array();
	$count = $query->num_rows
    if ($pass = $row['password'] && $row['active'] == "true" && $hwid = $row['hwid'];) {
		if ($token = "") {
			mysqli_query("UPDATE ".$dbtable." SET active='false' WHERE username='$user'");
			echo("Invalid Session, your account was banned due to Security reasons. Please contact the Support to get your account unbanned.");
		}
            $ctoken = md5($token);
	    echo("$ctoken");
        } else {
				mysqli_query("UPDATE "$DBtable." SET active='false' WHERE username='$user'");
                die("wronghwid");
            }

$DBcon->close();
?>
