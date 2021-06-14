<?php 
session_start();
if(isset($_SESSION['email']))
{
	session_destroy();
	
}
	
$email=$_POST['email'];
$password=$_POST['password']; 
echo $email;
echo "<br>";
echo $password;
$con=mysqli_connect("localhost","root","","sftm");
$q="select * from `admin` where `email`='$email' && `password`='$password'";
echo "<br>".$q."<br>";
$query=mysqli_query($con,$q);
$row=mysqli_fetch_array($query);
if($email==$row['email']&&$password==$row['password'])
{
	$_SESSION['email']=$row['email'];
	$_SESSION['password']=$row['password'];
	$_SESSION['admin']="admin";
	header("Location:adminDashboard.php");
	
}
else
{

?>
<script>
alert("username or password incorrect");
window.location="loginform.html";
</script>
<?php
}
?>