<?php
session_start();
if (!isset($_POST['reset'])) {
	header("Location:Forgot.php");
}
$password = $_POST['password'];
$con=mysqli_connect("localhost","root","","sftm");
$q="update admin set password = '$password' where email= '".$_SESSION['email']."'";
echo "<br>".$q."<br>";

$query=mysqli_query($con,$q);
if($query)
	echo "successfull";



?>