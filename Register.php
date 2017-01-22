<?php
// Made by astron-dev; Pls give credit if youre using my Code.
if(!@include("Settings.php")){die("Database not set up!");}

//Variables for MySQL
$user     = mysql_real_escape_string($_GET['user']);
$pass     = mysql_real_escape_string($_GET['pw5']);
$email    = mysql_real_escape_string($_GET['email']);
$hwid     = mysql_real_escape_string($_GET['hwid']);

if ($verb) {
    if ($email == "" or $user == "" or $pass == "") {
        if ($email == "")
            die("<br>Errorcode: <b>2</b>");

        if ($user == "")
            die("<br>Errorcode: <b>3</b>");

        if ($pass == "")
            die("<br>Errorcode: <b>4</b>");
    } else {
        $request_email = "SELECT email FROM ".$dbtable." WHERE email='$email'";
        $request_user  = "SELECT username FROM ".$dbtable." WHERE username='$user'";
        $result_email  = mysql_query($request_email);
        $result_user   = mysql_query($request_user);
        if (mysql_num_rows($result_email) > 0 or mysql_num_rows($result_user) > 0) {
            die("<br>Errorcode: <b>1</b><br>Username or email already exists");
        } else {
            $sql = "INSERT INTO " . "".$dbtable." (username, password, email, hwid) " . "VALUES ('" . $user . "', '" . $pass . "', '" . $email . "', '" . $hwid . "')";

            $entry = mysql_query($sql);
            if ($entry) {
                die('<br>FINISHED');
            } else {
                die("<br>Errorcode: <b>5</b>");
            }
        }
    }
} else {
    die('<br>Errorcode: <b>6</b>');
}

mysql_close();
?>
