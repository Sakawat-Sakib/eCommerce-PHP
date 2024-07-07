<?php
	require('top.php');
	$product_id = $_GET['id'];

	$sql = "SELECT * FROM product WHERE id = '$product_id'";
	$res = mysqli_query($con,$sql);
	$count = mysqli_num_rows($res);

	if($count == 0){
		header('location:index.php');
		die();
	}
?>
		
<section class="detail_sec first_sec">
	<div class="container flex_center">
		
		<div class="detail_container">

			<?php
				$row = mysqli_fetch_assoc($res);

				$id = $row['id'];
			?>
			<div class="img_container">
				<img src="<?php echo 'admin/product/'.$row['image'] ?>">
			</div>


			<div class="info_container">

				
				<h1 class="pro_name"><?php echo $row['name']?></h1>
				

				<div class="all_info">
					<h2 class="pro_price">Price:&nbsp;<span><?php echo $row['price'].'$'?></span></h2>

					<h2 class="pro_desc">Description:&nbsp;
						<span>
							<?php echo $row['description']?> 
						</span>
					</h2>

					<h2 class="pro_avail">Availability:&nbsp;<span>In Stock</span></h2>
					
					<?php
						if(isset($_SESSION['cart'][$product_id])){
							$btnText = 'REMOVE';
						}else{
							$btnText = 'ADD TO CART';
						}
					?>
					<a href="#" data-proid="<?php echo $row['id'] ?>" id="addcart" class="btn pro_add_cart cartJs"><?php echo $btnText ?></a>
				
				</div>

			</div>

		</div>
	</div>
</section>

<?php
	require('footer.php');
?>