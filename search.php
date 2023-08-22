<?php
include_once("includes/header.php");
?>
<div class="textboxContainer">
    <input type="text" class="searchInput" placeholder="Search for something">
</div>

<div class="results"></div>

<script>

$(function() {

    var username = '<?php echo $userLoggedIn; ?>';
    var timer;

    $(".searchInput").keyup(function() {
        clearTimeout(timer);

        timer = setTimeout(function() {
            var val = $(".searchInput").val();
            
            if(val != "") {
                $.post("ajax/getSearchResults.php", { term: val, username: username }, function(data) {
                    $(".results").html(data);
                })
            }
            else {
                $(".results").html("");
            }

        }, 500);
    })

})

</script>
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