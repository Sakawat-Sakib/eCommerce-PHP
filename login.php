<?php
	require('top.php');
	
?>


<section class="login_sec first_sec">
	<div class="container flex_center">
		<div class="login_container">

			<!--ACCOUNT CREATED NOTICE-->
			<?php 
				if(isset($_GET['account'])){
			?>
				<div class="success_box">
					<i class="fas fa-check-circle"></i>
					<p>Your account has been created</p>
				</div>
			<?php
				}
			?>

			<!--WRONG INFO NOTICE-->
			<?php 
				if(isset($_GET['login']) && $_GET['login']=='fail'){
			?>
				<div class="fail_box">
					<i class="fas fa-times-circle"></i>
					<p>Enter correct information</p>
				</div>
			<?php
				}
			?>


			<!--NEED TO LOGIN NOTICE-->
			<?php 
				

				if(isset($_GET['from']) && $_GET['from']=='checkout'){
					
			?>
				<div class="notice_box">
					<i class="fas fa-exclamation-circle"></i>
					<p>Please login your account</p>
				</div>
			<?php
				}
			?>



			<form class="login_form" method="POST" action="includes/login.inc.php">
				<h1>LOGIN</h1>
				<input name="email" class="login_input" type="email" placeholder="Email">
				<input name="pass" class="login_input" type="password" placeholder="Password">
				<input name="submit" class="btn" type="submit" value="Login">
			</form>
			<p class="inline_sign">If don't have an account<a href="signup.php" class="sign_link"> Sign Up </a>here.</p>
		</div>
	</div>
</section>





<?php
	require('footer.php');
?>