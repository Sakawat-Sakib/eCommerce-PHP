<?php
	require('top.php');

?>


<!--BANNER SECTION START-->
<section class="main_banner">
	<div class="slides_container">
		<!--SLIDES 1-->
		<div class="slides active">
			<img src="asset/image/banner/banner1.jpg">
		</div>
		<!--SLIDES 2-->
		<div class="slides">
			<img src="asset/image/banner/banner2.jpg">
			
		</div>
		<!--SLIDES 3-->
		<div class="slides">
			<img src="asset/image/banner/banner3.jpg">
		</div>

		<div class="slider_button">
			<div class="radio_btn active"></div>
			<div class="radio_btn"></div>
			<div class="radio_btn"></div>
		</div>


	</div>
</section>


<!--PRODUCT SECTION-->
<section class="product_sec">
	<div class="container">

		<div class="filter">
			<h1>New Arrival</h1>
		</div>

		<div class="products">
			<ul class="product_list">

				
				<?php 
					$sql = "SELECT * FROM product WHERE status = 1 ORDER BY name";
					$res = mysqli_query($con,$sql);

					while($row = mysqli_fetch_assoc($res)){

						$id = $row['id'];

						$classWish = '';
						$classCart = '';

						if(isset($_SESSION['wish'][$id])){
							$classWish = 'bgred';
						}

						if(isset($_SESSION['cart'][$id])){
							$classCart = 'bgred';
						}
				?>
					<!--single product 1-->
				 	<li class="single_product">
						<a href="product_detail.php?id=<?php echo $row['id'] ?>"><img src="<?php echo 'admin/product/'.$row['image'] ?>"></a>
						
						<div class="info_sec">
							<h2><?php echo $row['name']?></h2>
							
							<div class="wish_cart">
								<i data-proid="<?php echo $row['id'] ?>" class="<?php echo 'fas fa-heart heartJs '.$classWish ?>"></i>
								<p><?php echo $row['price'].'$'?></p>
								<i data-proid="<?php echo $row['id'] ?>" class="<?php echo 'fas fa-shopping-bag cartJs '.$classCart ?>"></i>
							</div>
						</div>



					</li> 
				<?php
					}
				?>	

			</ul>
		</div>
	</div>
</section>

	
<script src="asset/js/slider.js"></script>	
<?php
	require('footer.php');
?>