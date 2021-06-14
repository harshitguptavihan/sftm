<?php
session_start();
if (!isset($_POST['verify'])) {
	header("Location:Forgot.php");
}
echo "otp session=";
echo $_SESSION['OTP'];
echo "otp post=";
echo $_POST['otp'];


if ($_SESSION['OTP']!= $_POST['otp']){
	?>	
<script>
alert("wrong otp");
//window.location="loginform.html";
</script>
<?php
}
else
{
	?>
	<form action = "resetlogic.php" method = "POST" >
	<input type ="password" placeholder ="Enter Password"name = "password">
	<input type ="password" placeholder ="Enter confirm Password"name ="confirm_password">
	<input type="submit" value="Reset" name ="reset">
	<form>
<?php	
}
?>/