<!--Script for register.php-->
<?php
	if(isset($_POST["submit"])) {
		echo "form submitted";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to WebFlix</title>
	<link rel="stylesheet" type="text/css" href="assets/style/style.css">
</head>
<body>
	<!--Register Page-->
	<div class="SignInContainer">
		<div class="column">
			<div class="header">
				<img src="assets/images/logo.png" title="webflix-logo" alt="Webflix-Logo" />
				<h3>Sign In</h3>
				<span>to continue to WebFlix</span>
			</div>
			<form method="POST">
				<input type="text" name="username" placeholder="Enter Username" required="">
				<input type="password" name="password" placeholder="Enter Password" required="">
				<input type="submit" id="btn" name="submit" value="SUBMIT">
				
			</form>

			<!--Link To Register-->
			<div class="loginmsg">
				<a href="register.php" class="loginMessage">No Account? Sign Up Here!</a>
			</div>
		</div>
	</div>
</body>
</html>