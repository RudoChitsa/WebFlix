<?php
require_once("includes/header.php");
require_once("includes/paypalConfig.php");
require_once("includes/classes/Account.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Constants.php");
require_once("includes/classes/BillingDetails.php");

$user = new User($con, $userLoggedIn);

$detailsMessage = "";
$passwordMessage = "";
$subscriptionMessage = "";

if(isset($_POST["saveDetailsButton"])) {
    $account = new Account($con);

    $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
    $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
    $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);

    if($account->updateDetails($firstName, $lastName, $email, $userLoggedIn)) {
        $detailsMessage = "<div class='alertSuccess'>
                                Details updated successfully!
                            </div>";
    }
    else {
        $errorMessage = $account->getFirstError();

        $detailsMessage = "<div class='alertError'>
                                $errorMessage
                            </div>";
    }
}

if(isset($_POST["savePasswordButton"])) {
    $account = new Account($con);

    $oldPassword = FormSanitizer::sanitizeFormPassword($_POST["oldPassword"]); 
    $newPassword = FormSanitizer::sanitizeFormPassword($_POST["newPassword"]);
    $newPassword2 = FormSanitizer::sanitizeFormPassword($_POST["newPassword2"]);

    if($account->updatePassword($oldPassword, $newPassword, $newPassword2, $userLoggedIn)) {
        $passwordMessage = "<div class='alertSuccess'>
                                Password updated successfully!
                            </div>";
    }
    else {
        $errorMessage = $account->getFirstError();

        $passwordMessage = "<div class='alertError'>
                                $errorMessage
                            </div>";
    }
}

if (isset($_GET['success']) && $_GET['success'] == 'true') {
    $token = $_GET['token'];
    $agreement = new \PayPal\Api\Agreement();

    $subscriptionMessage = "<div class='alertError'>
                            Something went wrong!
                        </div>";
  
    try {
      // Execute agreement
      $agreement->execute($token, $apiContext);

        $result = BillingDetails::insertDetails($con, $agreement, $token, $userLoggedIn);
        $result = $result && $user->setIsSubscribed(1);

        if($result) {
            $subscriptionMessage = "<div class='alertSuccess'>
                            You're all signed up!
                        </div>";
        }


    } catch (PayPal\Exception\PayPalConnectionException $ex) {
      echo $ex->getCode();
      echo $ex->getData();
      die($ex);
    } catch (Exception $ex) {
      die($ex);
    }
  } 
  else if (isset($_GET['success']) && $_GET['success'] == 'false') {
    $subscriptionMessage = "<div class='alertError'>
                            User cancelled or something went wrong!
                        </div>";
  }

?>

<div class="settingsContainer column">

    <div class="formSection">

        <form method="POST">

            
            
            <?php

            $firstName = isset($_POST["firstName"]) ? $_POST["firstName"] : $user->getFirstName();
            $lastName = isset($_POST["lastName"]) ? $_POST["lastName"] : $user->getLastName();
            $email = isset($_POST["email"]) ? $_POST["email"] : $user->getEmail();
            ?>

            <h2>Hi <?php echo $firstName." ".$lastName; ?></h2>

            <input type="email" style="color: #313639;" name="email" placeholder="Email" value="<?php echo $email; ?>">

            <br>
            <textarea name="message" style="width: 300px; height:100px; color: #313639;" placeholder="Enter Your Message"></textarea>
            
            <input type="submit" name="submit" value="Send">


        </form>

        <br>
     <div class="rightItems1">   
        <a href="https:wa.me/+263773856719">
            <i class="fa fa-whatsapp">  Whatsapp Us</i>
        </a>
        <br>
        <br>
        <a href="tel:+263773856719">
            <i class="fa fa-phone"> Call Us</i>
        </a>
    </div>

    </div>
    <?php
if(isset($_POST['submit'])) {
    $name = $firstName;
    $email = $email;
    $message = trim($_POST['message']);

    $myMail = "rudochitsa@gmail.com";
    $topic = "From: " . $email;
    $message1 = "you have received a message from " . $email . " " . $message;
    mail($myMail, $topic, $message1);
    header("Location: main.php?mailsent");

}
?>

   <!-- <div class="formSection">

        <form method="POST">

            <h2>Update password</h2>

            <input type="password" name="oldPassword" placeholder="Old password">
            <input type="password" name="newPassword" placeholder="New password">
            <input type="password" name="newPassword2" placeholder="Confirm new password">

            <div class="message">
                <?php echo $passwordMessage; ?>
            </div>

            <input type="submit" name="savePasswordButton" value="Save">


        </form>

    </div>

-->

    <div class="formSection">
        <h2>Subscription</h2>

        <div class="message">
            <?php echo $subscriptionMessage; ?>
        </div>

        <?php

        if($user->getIsSubscribed()) {
            echo "<h3>You are subscribed! Go to PayPal to cancel.</h3>";
        }
        else {
            echo "<a href='billing.php'>Subscribe to Webflix</a>";
        }

        ?>
    </div>

</div>
<?php require_once("includes/footer.php");?>
<ul class="navLinks">
        <li><a href="legal.php#investor">Investor Relations</a></li>
        <li><a href="legal.php#privacy">Privacy</a></li>
        <li><a href="movies.php">Speed Test</a></li>
        <li><a href="contact.php">Help Centre</a></li>
        <li><a href="legal.php#cookie">Cookie Preferences</a></li>
        <li><a href="legal.php#notices">Legal Notices</a></li>
        <li><a href="profile.php">Account</a></li>
        <li><a href="legal.php#terms">Terms of Use</a></li>
        <li><a href="index.html#faq">FAQs</a></li>
        <li><a href="contact.php">Contact Us</a></li>
 <br><br> 