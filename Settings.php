<?php
// Made by astron-dev; Pls give credit if youre using my Code.
// Connection for MySQL
$dbhost   = "localhost";
$dbname   = "test";
$dbuser   = "root";
$dbpass   = "root";
$dbtable  = "LoginSystem";

//MySQL Connection
mysql_connect($dbhost, $dbuser, $dbpass) or die("Could not connect: " . mysql_error());
$verb = mysql_select_db($dbname);
?>