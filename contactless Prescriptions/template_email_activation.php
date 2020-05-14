<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>

<html> <!-- #A3D0F8 -->
	<body style="color: #000; font-size: 16px; text-decoration: none; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #efefef;">

		<div id="wrapper" style="max-width: 600px; margin: auto auto; padding: 20px;">

			<div id="logo" style="">
				<center><h1 style="margin: 0px;"><a href="{SITE_ADDR}" target="_blank"><img style="max-height: 75px;" src="{EMAIL_LOGO}"></a></h1></center>
			</div>

			<div id="content" style="font-size: 16px; padding: 25px; background-color: #fff;
				moz-border-radius: 10px; -webkit-border-radius: 10px; border-radius: 10px; -khtml-border-radius: 10px;
				border-color: #A3D0F8; border-width: 4px 1px; border-style: solid;">

				<h1 style="font-size: 22px;"><center>{EMAIL_TITLE}</center></h1>

				<p>Hi {TO_NAME},</p>

				<p>Your Prescription details are as follows:</p>

				<p>{MED}</p>

				<p>Please keep this copy of prescription safe for future references. </p>

				<p>Stay Healthy,</p>

				<p><span>{DOCNAME}></span></p>

			</div>
		</div>
	</body>
</html>
