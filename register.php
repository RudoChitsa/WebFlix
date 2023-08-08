<!--Script for register.php-->
<?php
require_once("includes/config.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Account.php");
require_once("includes/classes/Constants.php");

    $account = new Account($con);

    if(isset($_POST["submit"])) {
        
        $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
        $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
        $username = FormSanitizer::sanitizeFormUsername($_POST["username"]);
        $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
        $email2 = FormSanitizer::sanitizeFormEmail($_POST["email2"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
        $password2 = FormSanitizer::sanitizeFormPassword($_POST["password2"]);

        $success = $account->register($firstName,$lastName, $username, $email, $email2, $password, $password2);

        if($success) {
            $_SESSION["userLoggedIn"] = $username;
            header("Location: profile.php");
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
                <h3>Sign Up Today</h3>
                <span style="color: #313639;">to continue to WebFlix</span>
            </div>
            <form method="POST">

                <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                <input type="text" style="color: #313639;" name="firstName" value="<?php getInputValue("firstName") ?>" placeholder="Enter First Name" required="">

                <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                <input type="text" style="color: #313639;" name="lastName" value="<?php getInputValue("lastName") ?>" placeholder="Enter Last Name" required="">

                <?php echo $account->getError(Constants::$usernameCharacters); ?>
                <?php echo $account->getError(Constants::$usernameTaken); ?>
                <input type="text" style="color: #313639;" name="username" value="<?php getInputValue("username") ?>" placeholder="Enter Username" required="">

                <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                <?php echo $account->getError(Constants::$invalidEmail); ?>
                <?php echo $account->getError(Constants::$emailTaken); ?>
                <input type="email" style="color: #313639;" name="email" value="<?php getInputValue("email") ?>" placeholder="Enter Email" required="">
                <input type="email" style="color: #313639;" name="email2" value="<?php getInputValue("email2") ?>" placeholder="Confirm Your Email" required="">

                <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
                <?php echo $account->getError(Constants::$passwordLength); ?>
                <input type="password" style="color: #313639;" name="password" placeholder="Enter Password" required="">
                <input type="password" style="color: #313639;" name="password2" placeholder="Confirm Your Password" required="">
                <div class="terms">
                    <input type="checkbox" name="termsAndConditions" id="checkbox" required>
                    <label for="checkbox" style="color: #313639;">I agree to the <a href="legal.php" target="_blank" style="color: #313639;">Terms And Conditions</a></label>
                </div>
                <input type="submit" id="btn" name="submit" value="SUBMIT">
                
            </form>

            <!--Link To Register-->
            <div class="loginmsg">
                <a href="login.php" style="color: #313639;" class="loginMessage">Already Have An Account? Sign In Here!</a>
            </div>
        </div>
    </div>
</body>
</html>