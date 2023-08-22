<?php
require_once("includes/header.php");

$preview = new PreviewProvider($con, $userLoggedIn);
echo $preview->createTVShowPreviewVideo();

$containers = new CategoryContainers($con, $userLoggedIn);
echo $containers->showTVShowCategories();
?>
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