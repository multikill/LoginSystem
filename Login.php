<?php
// Made by astron-dev; Pls give credit if youre using my Code.
if(!@include("Settings.php")){die("Database not set up!");}

//Variables for MySQL
$user        = mysql_real_escape_string($_GET['username']);
$pass        = mysql_real_escape_string($_GET['password']);
$sendhwid = mysql_real_escape_string($_GET['hwid']);
$active      = "true";

if ($verb) {
    $sql = "SELECT * FROM ".$dbtable." WHERE username='" . $user . "'";
    $quer = mysql_query($sql) or die(mysql_error());
    $num = mysql_num_rows($quer);
    if ($num == 0) {
        die("User does not exist");
    } else {
        $row       = mysql_fetch_object($quer);
        $password  = $row->password;
        $activated = $row->activated;
        $hwid      = $row->hwid;
        if ($password == $pass) {
            if ($active != "true") {
                die("User is not activated!");
            }
            if ($sendhwid != $hwid) {
				mysql_query("UPDATE ".$dbtable." SET active='false' WHERE username='$user'");
                die("wronghwid");
            }
            die("success");
        }
    }
}

mysql_close();
?>
