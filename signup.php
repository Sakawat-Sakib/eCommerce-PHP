<?php
	require('top.php');

	$nameError = "";
	$emailError = "";
	$passError = "";

	if(isset($_POST['submit'])){

		//CHECKING NAME
		$fullName = trim($_POST['name']);
			if(!preg_match("/^[a-zA-Z ]*$/",$fullName)){
				$nameError = "please enter a valid name";
				$fullName = "";
			}

		//CHECKING EMAIL
		$email = trim($_POST['email']);
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				$emailError = "please enter a valid email";
				$email = "";
			}else{
				$sql = "SELECT * FROM users WHERE email = '$email' ";
				$res = mysqli_query($con,$sql);
				$count = mysqli_num_rows($res);

				if($count>0){
					$emailError = "email already taken";
					$email = "";
				}
			}

		//CHECKING PASSWORD
		$pass = $_POST['pass'];
		$con_pass = $_POST['con_pass'];

			if($pass != $con_pass){

				$passError = "password didn't match";
				$pass = "";
				$con_pass = "";

			}


		$mobile = $_POST['mobile'];
		$added_on = date("Y-m-d h:i:sa");

		if($fullName!='' && $email!='' && $pass!='' && $con_pass!=''){

			$sql = "INSERT INTO users(name,email,password,mobile,added_on)
				VALUES('$fullName','$email','$pass','$mobile','$added_on')";
			mysqli_query($con,$sql);

			header('location:login.php?account=success');
			die();
		}
		
	}

?>




<section class="signup_sec first_sec">
	<div class="container flex_center">

		<div class="signup_container">

	

			<form method="POST" action="signup.php" class="signup_form">
				<h1>SIGN UP</h1>

				<input name="name" class="signup_input" type="text" placeholder="Enter your Name" value="<?php echo (isset($fullName) && $fullName!='')?$fullName:'' ?>" required>
				<?php
					if($nameError !=''){
						echo '<p class="signup_error">'.$nameError.'</p>';
					}
				?>
					
				<input name="email" class="signup_input" type="email" placeholder="Email" value="<?php echo (isset($email) && $email!='')?$email:'' ?>" required>
				<?php
					if($emailError !=''){
						echo '<p class="signup_error">'.$emailError.'</p>';
					}
				?>


				<input name="pass" class="signup_input" type="password" placeholder="Password" required>
				
				<input name="con_pass" class="signup_input" type="password" placeholder="Confirm Password" required>
				<?php
					if($passError !=''){
						echo '<p class="signup_error">'.$passError.'</p>';
					}
				?>

				<input name="mobile" class="signup_input" type="number" onkeypress="return event.charCode>=48 && event.charCode<=57" placeholder="Mobile" value="<?php echo (isset($mobile) && $mobile!='')?$mobile:'' ?>" required>
				<input name="submit" class="btn" type="submit" value="Sign Up">
			</form>
		</div>
		
	</div>
</section>



<?php
	require('footer.php');
?>