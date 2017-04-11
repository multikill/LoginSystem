<?php
// Made by astron-dev; Pls give credit if youre using my Code.
if(!@include("Settings.php")){die("Database not set up!");}

//Variables for MySQL
$sendhwid    = mysqli_real_escape_string($_GET['hwid']);
$ban         = $_GET['ban'];
$active      = "true";

if ($verb) {
    $sql = "SELECT * FROM ".$dbtable." WHERE hwid='" . $hwid . "'";
    $quer = mysqli_query($sql) or die(mysqli_error());
    $num = mysqli_num_rows($quer);
    if ($num == 0) {
    } else {
        $row       = mysqli_fetch_object($quer);
        $activated = $row->activated;
        $hwid      = $row->hwid;
			mysqli_query("UPDATE ".$dbtable." SET active='false' WHERE hwid='$hwid'");
			echo("AntiLeak");
}

mysqli_close();
?>
