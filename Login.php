<?php
// Made by astron-dev; Pls give credit if youre using my Code.
if(!@include("Settings.php")){die("Database not set up!");}

//Variables for MySQL
$user        = mysqli_real_escape_string($_GET['username']);
$pass        = mysqli_real_escape_string($_GET['password']);
$sendhwid    = mysqli_real_escape_string($_GET['hwid']);
$token       = $_GET['token'];
$active      = "true";

if ($verb) {
    $sql = "SELECT * FROM ".$dbtable." WHERE username='" . $user . "'";
    $quer = mysqli_query($sql) or die(mysqli_error());
    $num = mysqli_num_rows($quer);
    if ($num == 0) {
    } else {
        $row       = mysqli_fetch_object($quer);
        $password  = $row->password;
        $activated = $row->activated;
        $hwid      = $row->hwid;
        if ($password == $pass) {
            if ($active != "true") {
                die("User is not activated!");
            }
		if ($token = "") {
			mysqli_query("UPDATE ".$dbtable." SET active='false' WHERE username='$user'");
			echo("Invalid Session, your account was banned due to Security reasons. Please contact the Support to get your account unbanned.");
		}
            if ($sendhwid != $hwid) {
				mysqli_query("UPDATE ".$dbtable." SET active='false' WHERE username='$user'");
                die("wronghwid");
            }
            $ctoken = md5($token);
	    echo("$ctoken");
        }
    }
}

mysqli_close();
?>
