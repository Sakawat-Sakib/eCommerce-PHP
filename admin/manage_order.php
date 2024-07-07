<?php
	require('top.php');

	$oid = $_GET['oid'];

	if(isset($_POST['status_submit'])){

		$status_id = $_POST['status_id'];
		var_dump($status_id);
		$sql = "UPDATE orders SET order_status = '$status_id' WHERE id = '$oid'";
		mysqli_query($con,$sql);
	}



?>

	<section class="main_sec">

		<div class="main_sec_banner">
			<h1>Manage Order</h1>
		</div>

		
		<div class="main_sec_container">
			<div class="container">

				<div class="order_details">

			

					<div class="order_info">

						<?php
						
							$sql = "SELECT orders.* , order_status.status,users.mobile FROM orders
									JOIN order_status 
									ON orders.order_status = order_status.id 
									JOIN users 
									ON orders.user_id = users.id
									WHERE orders.id = '$oid'
									ORDER BY added_on DESC";

							$res = mysqli_query($con,$sql);
							$row = mysqli_fetch_assoc($res);

						?>

						<h1><?php echo '#'.$row['id']?></h1>
						<p>User ID : <small><?php echo $row['user_id'] ?></small></p>
						<p>Address : <small> <?php echo $row['address'].','.$row['city']?></small> </p>
						<p>Mobile : <small><?php echo $row['mobile'] ?></small></p>
						<p>Date : <small><?php echo $row['added_on'] ?></small></p>
						<p>Payment Type : <small><?php echo $row['payment_type'] ?></small></p>
						<p>Payment Status : <small><?php echo $row['payment_status'] ?></small></p>
						<p>Order Status : <small><?php echo $row['status'] ?></small></p>
						<p style="color: #c058d7;font-size: 2.2rem; font-weight: normal;">Total : <small><?php echo '$'.$row['total_price'] ?></small></p>

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
					                       		<img src="<?php echo 'product/'.$row['image']?>">

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

				<form method="POST" class="order_form" action="manage_order.php?oid=<?php echo $oid ?>">
					
					<select name="status_id">
						<?php 
							$sql = "SELECT * FROM order_status";
							$res = mysqli_query($con,$sql);
							while($row = mysqli_fetch_assoc($res)){
						?>
							<option value="<?php echo $row['id'] ?>"><?php echo $row['status'] ?></option>
						<?php
							}
						?>
					</select>

					<input type="submit" name="status_submit" value="Submit">

				</form>

			</div>

	</section>


<?php
	require('footer.php');
?>