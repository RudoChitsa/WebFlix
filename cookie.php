<html>
<head>

	<style type=text/css>
	#cookies{
		margin-top:0px;
		margin-left:0px;
		background-color:#FF0103;
		position:fixed;
		width:100%;
		// height:40px;
		opacity:0.9;
		z-index:999;
		color:#FFFFFF;
		padding-top:5px;
		padding-bottom:10px;
		text-align:center;
		}
	
	.cookieLinks{
		color:#FFFFFF;
	}
	.cookieLinks:hover{
		color:#000000;
	}
	</style>

	<script type=text/javascript>
		function hideCookie(){
				/* Create the expiry date (today + 1 year) */
				var CookieDate = new Date;
				CookieDate.setFullYear(CookieDate.getFullYear( ) +1);
				
				/* Set the cookie (acceptance of cookies usage) */
				document.cookie = 'infoCookies=true; expires=' + CookieDate.toGMTString( ) + ';';

				/* When "OK" clicked, hides this popup */
				document.getElementById("cookies").style.display = "none";		
		}	
	</script>

</head>
	<body>
	<?php
		/* Check if the user has not visited yet this website  
		(or not accepted the cookies usage) */
		if(!isset($_COOKIE['infoCookies'])) 
		{	
			/* Insert below the link to cookies policy */	
			$cookiePolicy = "legal.php";
			$rejectDirect = "shows.php";


			echo " <div id='cookies'>This website uses cookies";
			echo " (<a class='cookieLinks' target='_blank' href='$cookiePolicy'>info</a>).";
			echo " Browsing this site you accept the cookies usage.";
		
			/* if "OK" clicked, call the JS function to hide the popup and set the cookie */
			echo " (<a onClick='hideCookie();' class='cookieLinks' target='_blank' href='$rejectDirect'>REJECT</a>).";		
			echo" <a onClick='hideCookie();' class='cookieLinks' href=#>ACCEPT</a></div>";
		}
	
	?>
	</body>
</html>
