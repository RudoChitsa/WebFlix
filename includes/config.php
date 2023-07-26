<?php
ob_start(); //turns on output buffering
session_start(); //starts the session

date_default_timezone_set("Africa/Harare");

try{
	$con = new PDO("mysql:dbname=webflix; host=localhost", "root", "");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch(PDOException $e) {
	exit("Connection Failed: " . $e->getMessage());
}

?>