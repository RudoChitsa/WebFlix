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
            $_SESSION["userLoggedIn"] = $username;
            header("Location: main.php");
        }
    }

    function getInputValue($name) {
        if(isset($_POST[$name])) {
            echo $_POST[$name];
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
                <span style="color: #313639;">to continue to WebFlix</span>
            </div>
            <form method="POST">
                <?php echo $account->getError(Constants::$loginFailed); ?>
                <?php echo $account->getError(Constants::$passwordIncorrect); ?>

                <input type="text" style="color: #313639;" name="username" placeholder="Enter Username" value="<?php getInputValue("username") ?>" required="">
                <input type="password" style="color: #313639;" name="password" placeholder="Enter Password" required="">
                <!--forgotten password link-->
                <div class="forgotpwd">
                    <a href="forgot_password.php" style="color: #313639;" class="loginMessage">Forgot Password? Click Here</a>
                </div>
                <input type="submit" id="btn" name="submit" value="SUBMIT">
                
            </form>

            <!--Link To Register-->
            <div class="loginmsg">
                <a href="register.php" class="loginMessage" style="color: #313639;">No Account? Sign Up Here!</a>
            </div>
        </div>
    </div>
</body>
</html>