<?php
require_once("includes/config.php");
require_once("includes/classes/PreviewProvider.php");
require_once("includes/classes/entity.php");

if(!isset($_SESSION["userLoggedIn"])) {
	header("Location: register.php");
}

$userLoggedIn = $_SESSION["userLoggedIn"];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to WebFlix</title>
	<link rel="stylesheet" type="text/css" href="assets/style/style.css">
	<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/a633f4007e.js" crossorigin="anonymous"></script>
	<script src="assets/js/script.js"></script>
</head>
<body>
	<div class='wrapper'>
		
