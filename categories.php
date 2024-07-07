<?php
	require('top.php');
	$msg = '';

	$cat_id = $_GET['id'];

	$sql = "SELECT * FROM categories WHERE id = '$cat_id'";
	$res = mysqli_query($con,$sql);
	$count = mysqli_num_rows($res);

	if($count==0){
		header('location:index.php');
		die();
	}else{
		$row = mysqli_fetch_assoc($res);
		$cat_name = $row['categories'];
	}
?>
		
<!--BANNER SECTION START-->
<section class="cat_banner">
	<img src="asset/image/banner/cat_banner.jpg">
	<h1><?php echo $cat_name ?></h1>
</section>

<!--PRODUCT SECTION-->
<section class="product_sec">
	<div class="container">

		<?php
			$sql = "SELECT * FROM product WHERE categories_id = '$cat_id' AND status = 1 ORDER BY name";
			$res = mysqli_query($con,$sql);
			$count = mysqli_num_rows($res);

			if($count==0){
		?>
				<div class="msg_box">
					<p class="msg">There is no product available in this category at this moment.</p>
				</div>

		<?php		
			}else{

		?>
		

			<div class="products">
				<ul class="product_list">

					
					<!--single product 1-->
					<?php 
					
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
		<?php
			}
		?>
	</div>
</section>

<?php
	require('footer.php');
?>