<?php 
session_start();
if(!(isset($_SESSION['email'])&&isset($_SESSION['password'])&&isset($_SESSION['admin'])))
	header("Location:loginform.html");
$email=$_SESSION['email'];
?>
<a href ="logout.php"> Logout </a>