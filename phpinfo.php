<?php 
session_start();

echo "<h2>FirstName from the reCAPTCHA page is - ".$_SESSION['userName']."</h2><br>";
echo "<h2>lastName from the reCAPTCHA page is - ".$_SESSION['Name']."</h2><br>";
echo "<h2>The mail id from the reCAPTCHA page is - ".$_SESSION['email']."</h2><br>";


?>
