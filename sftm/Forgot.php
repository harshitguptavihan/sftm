<?php
session_start();
if(isset($_SESSION['email']))
{
	session_destroy();
	
}
?>
<form method ="POST" action="verify.php">
<input type = "text" placeholder= "enter email" name= "email" />
<button type ="submit" name ="otpReq">Request OTP</button> 
</form>