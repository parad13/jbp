<?php
require_once("class.CommonFunc.php");
require_once("Functions.php");
error_reporting(15);
define("DB_DEBUG", false);
define("DEBUG", false);
$DB_DIE_ON_FAIL = true;

$db_conn_vars = array
 (
	"dbhost" => "localhost:3308",
 	"dbuser" => "root",
 	"dbpass" => "",
 	"dbname" => "jobpoartal"
 );

$con = new CommonFunc();


// $server = "localhost:3308";
// $username = "root";
// $password = "";
// $db = "jobpoartal";

// // Create connection
// $con = mysqli_connect($server, $username, $password,$db);

// // Check connection
// if (!$con) {
//     die("Connection failed: " . mysqli_connect_error());
// }



?>
