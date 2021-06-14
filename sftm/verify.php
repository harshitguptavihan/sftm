<?php
session_start();
if (!isset($_POST['otpReq'])) {
	header("Location:Forgot.php");
}
$email = $_SESSION['email']= $_POST['email'];
$con=mysqli_connect("localhost","root","","sftm");
$q="select * from `admin` where `email`='$email'";
echo $q;

$query=mysqli_query($con,$q);
$row=mysqli_fetch_array($query);
if($email==$row['email'])
{
	$_SESSION['email']=$row['email'];
	
}
else
{

?>
<script>
alert("email incorrect");
window.location="loginform.html";
</script>
<?php
}

  

include('smtp/PHPMailerAutoload.php');
$otp = rand(100000,999999);
$_SESSION['OTP']= $otp;
echo $_SESSION['OTP'];

$html='Your OTP is : '.$otp;
$mailSendTo = $_POST["email"];
echo smtp_mailer($mailSendTo,'Forgot Password',$html);

function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	//$mail->SMTPDebug  = 3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "vihanvatsalgupta@gmail.com";
	$mail->Password = "@2harshitG";
	$mail->SetFrom("vihanvatsalgupta@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		
	?>	
<script>
alert("otp send");
</script>
<?php
		return 'Sent';
	}
}

?>


<form method ="POST" action="reset.php">
<input type = "text" placeholder="OTP" name="otp"/>
<a href="verify.php?v=1"> Resend OTP</a>
<button type ="submit" name = "verify">verify</button>
</form>
<?php


?>