<?php
	require('top.php');
?>

	<section class="main_sec">

		<div class="main_sec_banner">
			<h1>Order Master</h1>
		</div>

		
		<div class="main_sec_container">
			<div class="container">

				<table class="order_table">

					<thead>
						<tr>
							<th>Order ID</th>
							<th>Order Date</th>
							<th>Address</th>
							<th>Payment Type</th>
							<th>Payment Status</th>
							<th>Order status</th>
							<th></th>
						</tr>
					</thead>

					<tbody>

						<?php

							$sql = "SELECT orders.*,order_status.status 
									FROM orders
									JOIN order_status
									ON orders.order_status = order_status.id";
							$res = mysqli_query($con,$sql);

							while($row = mysqli_fetch_assoc($res)){
						
						?>
							<!--SINGLE ROW-->
							
								<tr>
									
									<td data-label="Order ID"><?php echo $row['id'] ?></td>
									<td data-label="Order Date"><?php echo $row['added_on'] ?></td>
									<td data-label="Address">
										<p><?php echo $row['address'] ?></p>
										<p><?php echo $row['city'] ?></p>
										<p><?php echo $row['post_code'] ?></p>
									</td>
									<td data-label="Payment Type"><?php echo $row['payment_type'] ?></td>
									<td data-label="Payment Status"><?php echo $row['payment_status'] ?></td>	
									<td data-label="Order status"><?php echo $row['status'] ?></td>
									<td>
										<a href="manage_order.php?oid=<?php echo $row['id'] ?>" class="order_btn">Edit</a>
									</td>
								</tr>
							

						<?php
							}
						?>
						

						
					</tbody>

				</table>

			</div>
		</div>

	</section>


<?php
	require('footer.php');
?>