<?php
//session_start();
require_once("loginpage/includes/application.php");
require_once("loginpage/includes/class.ExtLogin.php");
include_once("loginpage/user_chk.php");
/*
* Getting MAC Address using PHP

*/

ob_start(); // Turn on output buffering
//session_destroy();
unset($_SESSION["_SESS_USERID"]);
unset($_SESSION["_SESS_USERNAME"]);
unset($_SESSION["_SESS_USERMAIL"]);
unset($_SESSION["_SESS_USERROLE"]);
unset($_SESSION["_SESS_USERMOBILE"]);
header("Location: index.php?msg=logout");
?>