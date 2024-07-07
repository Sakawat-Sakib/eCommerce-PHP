<?php
	require('top.php');

	//SHOWING ALL ORDERS FROM DB
	$uid = $_SESSION['uid'];

	$sql = "SELECT orders.* , order_status.status FROM orders
			JOIN order_status 
			ON orders.order_status = order_status.id 
			WHERE user_id = '$uid' ORDER BY added_on DESC";
	$res = mysqli_query($con,$sql);
	$count = mysqli_num_rows($res);
?>
		
<!--BANNER SECTION START-->
<section class="cat_banner">
	<img src="asset/image/banner/cat_banner.jpg">
	<h1>My Order</h1>
</section>


<section class="order_sec">
	<div class="container">

		<?php
			if($count>0){
		?>
		<div class="orders">

				<table>

					<thead>
						<tr>
							<th>#</th>
							<th>Order ID</th>
							<th>Date</th>
							<th>Total Price</th>
							<th>Payment Status</th>
							<th>Order Status</th>

							<th></th>
						</tr>
					</thead>

					<tbody>
						<!--SINGLE ROW-->
						<?php
							$i = 1;
							while($row = mysqli_fetch_assoc($res)){

						?>

						<tr>
							<td data-label="#"><?php echo $i ?></td>
							<td data-label="Order ID"><?php echo $row['id'] ?></td>
							<td data-label="Date"><?php echo $row['added_on'] ?></td>
							<td data-label="Total Price"><?php echo '$'.$row['total_price'] ?></td>
							<td data-label="Payment Status"><?php echo $row['payment_status'] ?></td>
							<td data-label="Order Status"><?php echo $row['status'] ?></td>

							<td>
								<a class="details" href="orderdetails.php?oid=<?php echo $row['id'] ?>">Details</a>
							</td>
						</tr>

						<?php 
							$i++;
							}
						?>
						
					</tbody>

				</table>

		</div>
		<?php
			}else{
		?>
			<div class="msg_box">
				<p class="msg">You have not ordered anything</p>
			</div>
		<?php 
			}
		?>
		
	</div>
</section>

<?php
	require('footer.php');
?>