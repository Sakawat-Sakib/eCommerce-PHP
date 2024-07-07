<?php

require('connection.inc.php');

$email = $_POST['email'];
$password = $_POST['pass'];



$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$res = mysqli_query($con,$sql);
$count = mysqli_num_rows($res);

if($count>0){
	$row = mysqli_fetch_assoc($res);

	$_SESSION['loggedin'] = 'yes';
	$_SESSION['uid'] = $row['id'];

	
	header('location:../index.php');
	
	
	die();

}else{
	header('location:../login.php?login=fail');
	die();
}