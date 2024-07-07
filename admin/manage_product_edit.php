<?php
	require('top.php');
	$error_msg = '';

	//SET OLD INFO IN PLACEHOLDER
	if(isset($_GET['type']) && $_GET['type']=='edit'){

		$id = $_GET['id'];

		$sql = "SELECT * FROM product WHERE id = '$id'";
		$res = mysqli_query($con,$sql);
		$row = mysqli_fetch_assoc($res);

		$categories_id = $row['categories_id'];
		$name = $row['name'];
		$mrp = $row['mrp'];
		$price = $row['price'];
		$qty = $row['qty'];
		$description = $row['description'];
	}
	

	//========================//


	//UPDATE PRODUCT
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

			$row = mysqli_fetch_assoc($res);
			$matched_product_id = $row['id'];

			
			if($matched_product_id == $id){
			//UPDATING A PRODUCT KEEPING SAME NAME

				if($_FILES['image']['name']!=''){
					//SET NEW IMAGE
					$image = rand(11111111,99999999).'_'.$_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'], 'product/'.$image);

					$sql = "UPDATE product SET 

							categories_id='$category_id',
							mrp='$mrp',
                            price='$price',
                            qty='$qty',
                            image='$image',
                            description='$description'

                            WHERE id='$id' 
                           ";
						   

				}else{
					//KEEPING OLD IMAGE
					$sql = "UPDATE product SET 

							categories_id='$category_id',
							mrp='$mrp',
		                    price='$price',
		                    qty='$qty',
		                    description='$description'

		                    WHERE id='$id' 
                           ";

				}

				mysqli_query($con,$sql);
				header('location:product.php');

			//***UPDATING A PRODUCT KEEPING SAME NAME END***//

			}else{
				$error_msg = "Product name already exist";
			}


		//UPDATING A PRODUCT WITH NEW NAME
		}else{

			if($_FILES['image']['name']!=''){
			//SET NEW IMAGE
					$image = rand(11111111,99999999).'_'.$_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'], 'product/'.$image);

					$sql = "UPDATE product SET 
					
							name = '$name',
							categories_id='$category_id',
							mrp='$mrp',
                            price='$price',
                            qty='$qty',
                            image='$image',
                            description='$description'

                            WHERE id='$id' 
                           ";
						   

			}else{
			//KEEPING OLD IMAGE
					$sql = "UPDATE product SET 

							name='$name',
							categories_id='$category_id',
							mrp='$mrp',
		                    price='$price',
		                    qty='$qty',
		                    description='$description'

		                    WHERE id='$id' 
                           ";

				

				}
			
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

				<h2>Edit Product</h2>

				<form method="POST" action="#" class="ap_form" enctype="multipart/form-data">

					<select name="category_id">
						
							<option disabled selected>Select Category</option>

						<?php
							$sql = "SELECT * FROM categories ORDER BY categories";
							$res = mysqli_query($con,$sql);
							while($row = mysqli_fetch_assoc($res)) {
							
							if($categories_id == $row['id'] ){		
						?>

								<option selected value="<?php echo $row['id'] ?>" ><?php echo $row['categories'] ?></option>
							
							<?php 
								} else{
							?>

								<option value="<?php echo $row['id'] ?>"><?php echo $row['categories']?></option>
							
							<?php
								}
							?>

						<?php 
							}
						?>
					
					</select>

					<input name="name" type="text" placeholder="Enter Product Name" value="<?php echo $name ?>" required>
					<input name="mrp" type="text" placeholder="MRP" value="<?php echo $mrp ?>" required>
					<input name="price" type="text" placeholder="Price" value="<?php echo $price ?>" required>
					<input name="qty" type="text" placeholder="Qty" value="<?php echo $qty ?>" required>
					<input name="description" type="text" placeholder="Write description..." value="<?php echo $description ?>" required>
					<input name="image" type="file">
					<input name="submit" type="submit" value="UPDATE">

					<p class="error_msg"><?php echo $error_msg ?></p>
				</form>
				

			</div>
		</div>

	</section>


<?php
	require('footer.php');
?>