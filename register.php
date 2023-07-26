<!--Script for register.php-->
<?php
require_once("includes/classes/FormSanitizer.php");

	if(isset($_POST["submit"])) {
		
		$firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
		$lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
		$username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
		$email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
		$email2 = FormSanitizer::sanitizeFormEmail($_POST["email2"]);
		$password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
		$password2 = FormSanitizer::sanitizeFormPassword($_POST["password2"]);

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
				<h3>Sign Up Today</h3>
				<span>to continue to WebFlix</span>
			</div>
			<form method="POST">
				<input type="text" name="firstName" placeholder="Enter First Name" required="">
				<input type="text" name="lastName" placeholder="Enter Last Name" required="">
				<input type="text" name="username" placeholder="Enter Username" required="">
				<input type="email" name="email" placeholder="Enter Email" required="">
				<input type="email" name="email2" placeholder="Confirm Your Email" required="">
				<input type="password" name="password" placeholder="Enter Password" required="">
				<input type="password" name="password2" placeholder="Confirm Your Password" required="">
				<div class="terms">
					<input type="checkbox" name="termsAndConditions" id="checkbox" required>
					<label for="checkbox">I agree to the <a href="legal.php" target="_blank">Terms And Conditions</a></label>
				</div>
				<input type="submit" name="submit" value="SUBMIT">
				
			</form>

			<!--Link To Register-->
			<a href="login.php" class="loginMessage">Already Have An Account? Sign In Here!</a>
			
		</div>
	</div>
</body>
</html>