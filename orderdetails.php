<?php
	require('top.php');

	
	$oid = $_GET['oid'];
	$uid = $_SESSION['uid'];

?>
		
<!--BANNER SECTION START-->
<section class="cat_banner">
	<img src="asset/image/banner/cat_banner.jpg">
	<h1>Order Details</h1>
</section>


<section class="order_sec">
	<div class="container">

		<div class="order_details">

			

			<div class="order_info">

				<?php
				
					$sql = "SELECT orders.* , order_status.status FROM orders
							JOIN order_status 
							ON orders.order_status = order_status.id 
							WHERE user_id = '$uid' AND orders.id = '$oid'
							ORDER BY added_on DESC";

					$res = mysqli_query($con,$sql);
					$row = mysqli_fetch_assoc($res);

				?>

				<h1><?php echo '#'.$row['id']?></h1>
				<p>Address : <small> <?php echo $row['address'].','.$row['city']?></small> </p>
				<p>Date : <small><?php echo $row['added_on'] ?></small></p>
				<p>Payment Type : <small><?php echo $row['payment_type'] ?></small></p>
				<p>Payment Status : <small><?php echo $row['payment_status'] ?></small></p>
				<p>Order Status : <small><?php echo $row['status'] ?></small></p>
				<p style="color: green;font-size: 2.2rem;">Total : <small><?php echo '$'.$row['total_price'] ?></small></p>

			</div>



			<div class="order_product_info">

				<table>

					<thead>
						<tr>
							<th class="product-th">products</th>
	                        <th class="product-quantity-th">Quantity</th>
	                        <th class="product-subtotal-th">Total</th>
	                    </tr>
					</thead>

					<tbody>

						<?php
							$sql = "SELECT order_detail.*,product.name,product.image
									FROM order_detail
									JOIN product
									ON order_detail.product_id = product.id
									WHERE order_detail.order_id = '$oid'
									";

							$res = mysqli_query($con,$sql);

							while($row = mysqli_fetch_assoc($res)){

						?>
							<tr>
		                       <td data-label="products" class="product-td">
			                       	<div class="cart_pro_info">
			                       		<img src="<?php echo 'admin/product/'.$row['image']?>">

			                       		<div class="cart_pro_detail">
			                       			<h2><?php echo $row['name']?></h2>
			                       			<small>Price : <span class="cart_pro_price"> <?php echo $row['price_per_unit']?> </span>$</small>
			                       		</div>

			                       	</div>
		                       </td>

		                       <td data-label="Quantity">
		                       		<?php echo $row['qty'] ?>
		                       </td>

		                       <td data-label="Total">
		                       		<?php echo $row['qty']*$row['price_per_unit'] ?>
		                       </td>
		                    </tr>

	                   <?php
	                   		}
	                   ?>


	                    


	                    


					</tbody>

				</table>
			</div>

		</div>
		
	</div>
</section>

<?php
	require('footer.php');
?>