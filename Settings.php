<?php
// Made by astron-dev; Pls give credit if youre using my Code.
// Connection for MySQL
$dbhost   = "localhost";
$dbname   = "test";
$dbuser   = "root";
$dbpass   = "root";
$dbtable  = "LoginSystem";

//MySQL Connection
mysqli_connect($dbhost, $dbuser, $dbpass) or die("Could not connect: " . mysqli_error());
$verb = mysqli_select_db($dbname);
?>
