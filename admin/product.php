<?php
	require('top.php');

	//SHOWING ALL PRODUCT FROM DB
	$sql = "SELECT * FROM product ORDER BY name";
	$res = mysqli_query($con,$sql);
?>

	<section class="main_sec">

		<div class="main_sec_banner">
			<h1>Products</h1>
			<a href="manage_product.php"><i class="fas fa-plus-circle"></i></a>
		</div>

		
		<div class="main_sec_container">
			<div class="container">

				<table>

					<thead>
						<tr>
							<th>#</th>
							<th>ID</th>
							<th>Categories</th>
							<th>Name</th>
							<th>Image</th>
							<th>Mrp</th>
							<th>Price</th>
							<th>Qty</th>
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
							<td data-label="ID"><?php echo $row['id'] ?></td>
							<td data-label="Categories"><?php echo $row['categories_id'] ?></td>
							<td data-label="Name"><?php echo $row['name'] ?></td>
							<td data-label="Image">
								<img src="<?php echo 'product/'.$row['image'] ?>">
							</td>
							<td data-label="Mrp"><?php echo $row['mrp'] ?></td>
							<td data-label="Price"><?php echo $row['price'] ?></td>
							<td data-label="Qty"><?php echo $row['qty'] ?></td>
							<td>
								<?php
									if($row['status']==1){
										$class = "active_btn";
										$text = "Active";
									}else if($row['status']==0){
										$class = "deactive_btn";
										$text = "Deactive";
									}	
								?>
								<a  href="includes/changestatus.inc.php?id=<?php echo $row['id']?>&revOpOf=<?php echo $text ?>&type=product"  class="status_btn <?php echo $class ?>"><?php echo $text ?></a>
								
								<a href="includes/delete.inc.php?id=<?php echo $row['id']?>&type=product" class="delete">Delete</a>
								<a href="manage_product_edit.php?id=<?php echo $row['id']?>&type=edit" class="edit">Edit</a>
							</td>
						</tr>

						<?php 
							$i++;
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