<?php
	require('includes/connection.inc.php');


	$msg='';

	if(isset($_POST['login_btn'])){

		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM admin_users WHERE username='$username' AND password='$password'";
		$res = mysqli_query($con,$sql);
		$count = mysqli_num_rows($res);

		if($count > 0){

			$_SESSION['ADMIN_LOGIN'] = 'yes';
			$_SESSION['ADMIN_USERNAME'] = $username;

			header('location:categories.php');
         	die();
		}else{
			$msg = 'Please enter correct info';
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>KiLaibu</title>
	<!--MAIN CSS-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!--GOOGLE FONT-->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@200;300;400;500&display=swap" rel="stylesheet"> 
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Abel&family=Jura:wght@400;700&family=Reggae+One&display=swap" rel="stylesheet">
	<!--FONT AWESOME-->
	<script src="https://kit.fontawesome.com/adb09d24f1.js" crossorigin="anonymous"></script>
</head>

<body>

	<div class="login_container">
		
			<div class="login_header">
				<h1>ADMIN LOGIN</h1>
			</div>
			<form method="POST" action="login.php" class="login_form">

				<input type="text" name="username" placeholder="Username" required>
				<input type="password" name="password" placeholder="Password" required>
				<input type="submit" name="login_btn" class="btn" value="LOGIN">

				<p class="error_msg"><?php echo($msg)?></p>
			</form>
			
			
					
			
	</div>


	<footer>
		<p>Copyright © 2021.Ki Laibu.All Rights Reserved</p>
	</footer>
	
</body>
</html>