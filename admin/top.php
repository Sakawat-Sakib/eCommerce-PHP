<?php
	require('includes/connection.inc.php');

	if(!isset($_SESSION['ADMIN_LOGIN']) || $_SESSION['ADMIN_LOGIN']!='yes'){
		header('location:login.php');
		die();
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
	<header class="admin_header">
		<div class="logo_bar_flex">
			<h1 class="ap_tag">ADMIN PANEL</h1>
			<i id="drop_btn" class="fas fa-chevron-circle-down"></i>
		</div>
		
		<a href="includes/logout.inc.php" class="btn">LOGOUT</a>

		<div id="drop_menu" class="ap_menu">
			<div class="menu_head">
				<h1>MENU</h1>
			</div>
			<ul class="ap_menu_list">
				<li><a href="categories.php">Categories Master</a></li>
				<li><a href="product.php">Product Master</a></li>
				<li><a href="order_master.php">Order Master</a></li>
				<li><a href="users.php">User Master</a></li>
				<li><a href="contact_us.php">Contact Us</a></li>
			</ul>
		</div>

	</header>