<?php
	require('top.php');
	$error_msg = '';

	//ADDING NEW PRODUCT
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$category_id = $_POST['category_id'];
		$mrp = $_POST['mrp'];
		$price = $_POST['price'];
		$qty = $_POST['qty'];
		$description = $_POST['description'];

		$sql = "SELECT * FROM product WHERE name = '$name'";
		$res = mysqli_query($con,$sql);
		$count = mysqli_num_rows($res);

		if($count>0){

			$error_msg = "Product name already exist";

		}else{

			$image = rand(11111111,99999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'], 'product/'.$image);

			$sql = "INSERT INTO product(categories_id,name,mrp,price,qty,image,description,status) VALUES('$category_id','$name','$mrp','$price','$qty','$image','$description',1)";
			mysqli_query($con,$sql);
			header('location:product.php');
			
		}
		
	}


?>

	<section class="main_sec">

		<div class="main_sec_banner">
			<h1>Products</h1>
		</div>

		
		<div class="main_sec_container main_sec_manager">
			<div class="container">

				<h2>Add Products</h2>

				<form method="POST" action="#" class="ap_form" enctype="multipart/form-data">

					<select name="category_id">
						<option disabled selected>Select Category</option>

						<?php
							$sql = "SELECT * FROM categories ORDER BY categories";
							$res = mysqli_query($con,$sql);
							while($row = mysqli_fetch_assoc($res)) {
								
						?>

							<option value="<?php echo $row['id'] ?>"><?php echo $row['categories']?></option>

						<?php 
							}
						?>
					
					</select>

					<input name="name" type="text" placeholder="Enter Product Name" required>
					<input name="mrp" type="text" placeholder="MRP" required>
					<input name="price" type="text" placeholder="Price" required>
					<input name="qty" type="text" placeholder="Qty" required>
					<input name="description" type="text" placeholder="Write description..." required>
					<input name="image" type="file" required>
					<input name="submit" type="submit" value="SUBMIT">

					<p class="error_msg"><?php echo $error_msg ?></p>
				</form>
				

			</div>
		</div>

	</section>


<?php
	require('footer.php');
?>