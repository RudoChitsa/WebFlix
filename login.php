<!--Script for register.php-->
<?php

require_once("includes/config.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Account.php");
require_once("includes/classes/Constants.php");

	$account = new Account($con);

	if(isset($_POST["submit"])) {
		
		$username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
		
		$password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
		
		$success = $account->login($username, $password);
 
		if($success) {
			header("Location: index.php");
		}
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
				<?php echo $account->getError(Constants::$loginFailed); ?>
				<input type="text" name="username" placeholder="Enter Username" required="">
				<input type="password" name="password" placeholder="Enter Password" required="">
				<!--forgotten password link-->
				<div class="forgotpwd">
					<a href="forgotpwd.php" class="loginMessage">Forgot Password? Click Here</a>
				</div>
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