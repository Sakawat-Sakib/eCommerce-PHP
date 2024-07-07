<?php
	require('top.php');

	$pageHeader = "Add category";
	$inputValue = "";
	$actionLink = "manage_categories.php";
	$error_msg = "";

	if(isset($_GET['type']) && $_GET['type']=='edit'){
		$pageHeader = "Edit category";

		//SET OLD CATEGORY NAME IN PLACEHOLDER
		$id = $_GET['id'];
		$sql = "SELECT categories FROM categories WHERE id='$id'";
		$res = mysqli_query($con,$sql);
		$row = mysqli_fetch_assoc($res);
		$inputValue=$row['categories'];

		$actionLink = "manage_categories.php?type=edit&id=".$id;

	}


	//ADD NEW CATEGORY
	if(isset($_POST['submit'])){

		$cat_name = $_POST['cat_name'];


		$sql = "SELECT * FROM categories WHERE categories='$cat_name'";
		$res = mysqli_query($con,$sql);
		$count = mysqli_num_rows($res);

		if(isset($_GET['type'])){

			if($count>0){
				$row = mysqli_fetch_assoc($res);
				$matchedCatId = $row['id'];

				if($id==$matchedCatId){
					header('location:categories.php');
					die();
				}else{
					$error_msg = $cat_name." category already exist!";
				}

			}else{
				$sql = "UPDATE categories SET categories = '$cat_name' WHERE id = '$id'";
				mysqli_query($con,$sql);
				header('location:categories.php');
			}
			

		}else{

			if($count>0){

				$error_msg = $cat_name." category already exist!";

			}else{
				$sql = "INSERT INTO categories(categories,status) VALUES('$cat_name',1) ";
				
				mysqli_query($con,$sql);
				header('location:categories.php');
			}
				
		}

		
		
	}



?>

	<section class="main_sec">

		<div class="main_sec_banner">
			<h1>Categories</h1>
		</div>

		
		<div class="main_sec_container">
			<div class="container">

				<h2><?php echo $pageHeader ?></h2>
				<form method="POST" action="<?php echo $actionLink ?>" class="ap_form">
					<p class="error_msg"><?php echo $error_msg ?></p>
					<input name="cat_name" type="text" placeholder="Enter Category Name" value="<?php echo $inputValue ?>">
					<input name="submit" type="submit" value="SUBMIT">
				</form>
				

			</div>
		</div>

	</section>


<?php
	require('footer.php');
?>