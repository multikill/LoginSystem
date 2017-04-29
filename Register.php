<?php
// Made by astron-dev; Pls give credit if youre using my Code.
require_once 'Settings.php';

//Variables for MySQLi
$user     = strip_tags($_GET['user']);
$pass     = strip_tags($_GET['pw5']);
$email    = strip_tags($_GET['email']);
$hwid     = strip_tags($_GET['hwid']);

$user     = $DBcon->real_escape_string($_GET['user']);
$pass     = $DBcon->real_escape_string($_GET['pw5']);
$email    = $DBcon->real_escape_string($_GET['email']);
$hwid     = $DBcon->real_escape_string($_GET['hwid']);

    if ($email == "" or $user == "" or $pass == "") {
        if ($email == "")
            die("<br>Errorcode: <b>2</b>");

        if ($user == "")
            die("<br>Errorcode: <b>3</b>");

        if ($pass == "")
            die("<br>Errorcode: <b>4</b>");
    } else {
        $result_email  = $DBcon->query("SELECT email FROM ".$DBtable." WHERE email='$email'");
        $result_user   = $DBcon->query("SELECT username FROM ".$DBtable." WHERE username='$user'");
        if ($result_email->num_rows > 0 or $result_user->num_rows > 0) {
            die("<br>Errorcode: <b>1</b><br>Username or email already exists");
        } else {
            $sql = "INSERT INTO " . "".$DBtable." (username, password, email, hwid) " . "VALUES ('" . $user . "', '" . $pass . "', '" . $email . "', '" . $hwid . "')";

            if ($DBcon->query($sql)) {
                die('<br>FINISHED');
            } else {
                die("<br>Errorcode: <b>5</b>");
            }
        }
    }

$DBcon->close();
?>
