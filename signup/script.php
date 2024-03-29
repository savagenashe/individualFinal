<?php
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    session_write_close();
} else {
    // since the username is not set in session, the user is not-logged-in
    // he is trying to access this page unauthorized
    // so let's clear all session variables and redirect him to index
    session_unset();
    session_write_close();
    $url = "./index.php";
    header("Location: $url");
}

?>
<HTML>
<HEAD>
<TITLE>Welcome</TITLE>
    <link href="assets/css/phppot-style.css" type="text/css"
        rel="stylesheet" />
    <link href="assets/css/user-registration.css" type="text/css"
        rel="stylesheet" />
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        body{
            background-image:url("./assets/bg2.jpg");
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Do not repeat the image */
            background-size: cover; /* Resize the background image to cover the entire container */
                }
    </style>
</HEAD>
<BODY>
    <!-- <img src="./assets/bg.jpg" alt=""> -->
	<div class="phppot-container" >
		<div>
        <h3 style="color:white; font-weight:bold;">Welcome Back <?php echo $username;?></h3></div>
        <span class="login-signup btn btn-warning"><a href="logout.php" style="color:white">LOGOUT</a></span>
    </div>
</BODY>
</HTML>
