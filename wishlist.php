<?php
	require('top.php');
?>
		
<!--BANNER SECTION START-->
<section class="cat_banner">
	<img src="asset/image/banner/cat_banner.jpg">
	<h1>My Wishlist</h1>
</section>

<!--PRODUCT SECTION-->
<section class="wish_sec">
	<div class="container">

		<?php
		  if(isset($_SESSION['wish']) && count($_SESSION['wish'])>0){
		?>
			<div class="products">
				<ul class="product_list">

					<!--single product 1-->
					<?php 

						

						foreach ($_SESSION['wish'] as $key => $value) {
						$classCart = '';
						$sql = "SELECT * FROM product WHERE id = '$value'";
						$res = mysqli_query($con,$sql);
						$row = mysqli_fetch_assoc($res);

						if(isset($_SESSION['cart'][$value])){

							$classCart = 'bgred';

						}
					?>
					 	<li class="single_product">
							<a href="product_detail.php?id=<?php echo $row['id'] ?>"><img src="<?php echo 'admin/product/'.$row['image']?>"></a>
							<div class="info_sec">
								<h2><?php echo $row['name']?></h2>
								
								<div class="wish_cart">
									<a href="includes/deletefromwishlist.inc.php?id=<?php echo $row['id'] ?>"><i class="fas fa-heart-broken"></i></a>
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
		   }else{
		?>

			<div class="msg_box">
				<p class="msg">There is no product in your wishlist.</p>
				<i class="far fa-frown"></i>
			</div>
		<?php 
			}
		?>
	</div>
</section>

<?php
	require('footer.php');
?>