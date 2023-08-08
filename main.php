<?php
require_once("includes/header.php");

$preview = new PreviewProvider($con, $userLoggedIn);
echo $preview->createPreviewVideo(null);

$containers = new CategoryContainers($con, $userLoggedIn);
echo $containers->showAllCategories();

?>
<ul class="navLinks">
        <li><a href="legal.php">Investor Relations</a></li>
        <li><a href="legal.php">Privacy</a></li>
        <li><a href="movies.php">Speed Test</a></li>
        <li><a href="contact.php">Help Centre</a></li>
        <li><a href="legal.php">Cookie Preferences</a></li>
        <li><a href="legal.php">Legal Notices</a></li>
        <li><a href="profile.php">Account</a></li>
        <li><a href="contact.php">Terms of Use</a></li>
        <li><a href="index.html#faq">FAQs</a></li>
        <li><a href="contact.php">Contact Us</a></li>
 <br><br>        
