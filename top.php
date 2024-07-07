<?php
	require('includes/connection.inc.php');
	$countWish = 0;
	$countCart = 0;

	if(isset($_SESSION['wish'])){
		$countWish = count($_SESSION['wish']);
	}
	if(isset($_SESSION['cart'])){
		$countCart = count($_SESSION['cart']);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>KiLaibu</title>
	<!--MAIN CSS-->
	<link rel="stylesheet" type="text/css" href="asset/css/style.css">
	<link rel="stylesheet" type="text/css" href="asset/css/responsive.css">
	<!--GOOGLE FONT-->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@200;300;400;500&display=swap" rel="stylesheet"> 
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Abel&family=Jura:wght@400;700&family=Reggae+One&display=swap" rel="stylesheet">
	<!--FONT AWESOME-->
	<script src="https://kit.fontawesome.com/adb09d24f1.js" crossorigin="anonymous"></script>
</head>
<body>

<!--HEADER START-->
<header class="header_main">
	
		<div class="header_flex">

			<!--FLEX ROW 1-->
			<div class="header_top">
				<!--LOGO-->
				<div class="logo">
					<a href="index.php">
						<h3 class="logo_ki">Ki</h3>
						<h1 class="logo_laibu">Laibu<span class="com">.com</span></h1>

					</a>
				</div>
				<!--SEARCH BAR-->
				<div class="search_top">
					<form class="search_form">
						<input class="search_input" type="text" placeholder="Search here">
						<div class="search_bar">
							<i class="fas fa-search"></i>
						</div>
						<i class="fas fa-times"></i>
					</form>
				</div>

				<!--LOGIN SIGNUP-->
				<div class="login_signup">
					<i class="fas fa-search single_search"></i>
					

					<?php
						if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=='yes'){
					?>
						<a  class="myord" href="myorder.php">My Order</a>
						<a  class="logouttop" href="includes/logout.inc.php">Logout</a>
					<?php
						}else{
					?>
						
						<a class="login" href="login.php">Login</a>
						<a class="signup" href="signup.php">Sign Up</a>
					<?php 
						}
					?>

					<i class="fas fa-caret-down"></i>

				</div>
			</div>

			<!--FLEX ROW 2-->
			<div id="header_bot" class="header_bottom">
				<!--MENU BARS-->
				<div class="bar" id="open_menu">
					<i class="fas fa-bars" ></i>
				</div>
				<!--BASIC LINKS-->
				<div class="basic_links">
					<ul class="link_list">
						<li class="link_text"><a href="index.php">Home</a></li>
						<li class="link_text"><a href="#">About Us</a></li>
						<li class="link_text"><a href="#">Contact</a></li>

						<li class="link_icon"><a href="index.php"><i class="fas fa-home"></i></a></li>
					
					</ul>
				</div>

				<!--WISHLIST & CART-->
				<div class="cart">
					<a href="wishlist.php">
						<i class=" top_heart fas fa-heart">
							<div class="count"><small id="wishCount"><?php echo $countWish ?></small></div>
						</i>
					</a>
					<a href="cart.php">	
						<i class="fas fa-shopping-cart">
							<div class="count"><small id="cartCount"><?php echo $countCart ?></small></div>
						</i>
					</a>	
				</div>
				
			</div>

		</div>

		<!--TOGGLE DIV-->
		<div class="toggle_right">
			<ul class="right_list">

			
				<?php
					if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=='yes'){
				?>
					<li class="right_item"><a class="right_link" href="myorder.php">My Order</a></li>
					<li class="right_item"><a class="right_link" href="includes/logout.inc.php">Logout</a></li>
				<?php
					}else{
				?>
					
					<li class="right_item"><a class="right_link" href="login.php">Login</a></li>
					<li class="right_item"><a class="right_link" href="signup.php">Sign Up</a></li>
				<?php 
					}
				?>

					<li class="right_item"><a  href="#">About</a></li>
					<li class="right_item"><a  href="#">Contact</a></li>

			</ul>
		</div>



		<div id="tog_menu" class="toggle_menu">
			<h1>Categories</h1>
			<ul class="cat_list">

				<?php 
					$sql = "SELECT * FROM categories WHERE status = 1 ORDER BY categories";
					$res =  mysqli_query($con,$sql);

					while($row = mysqli_fetch_assoc($res)){
				?>

					<li class="cat_item"><a class="cat_link" href="categories.php?id=<?php echo $row['id']?>"><?php echo $row['categories']?></a><i class="fas fa-chevron-right"></i></li>

				<?php
					}
				?>
			</ul>
		</div>
	
</header>