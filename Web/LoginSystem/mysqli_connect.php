<?php

  $host     = "localhost";
  $username = "root";
  $password = "";
  $dbname   = "loginsystem";
  
  $mysqli_connect = new MySQLi($host,$username,$password,$dbname);
    
     if ($mysqli_connect->connect_errno) {
         die("ERROR : -> ".$mysqli_connect->connect_error);
     }
?>