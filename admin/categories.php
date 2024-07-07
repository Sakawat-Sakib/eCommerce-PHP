<?php
	require('top.php');
	

	//SHOWING ALL CATEGORIES FROM DB
	$sql = "SELECT * FROM categories";
	$res = mysqli_query($con,$sql);

?>

	<section class="main_sec">

		<div class="main_sec_banner">
			<h1>Categories</h1>
			<a href="manage_categories.php"><i class="fas fa-plus-circle"></i></a>
		</div>

		
		<div class="main_sec_container">
			<div class="container">

				<table>

					<thead>
						<tr>
							<th>#</th>
							<th>ID</th>
							<th>Categories</th>
							<th></th>
						</tr>
					</thead>

					<tbody>
						<!--===SINGLE CATEGORY===-->

						<?php
						$i=1;
							while($row=mysqli_fetch_assoc($res)){
						?>

						<tr>
							<td data-label="#"><?php echo $i ?></td>
							<td data-label="ID"><?php echo $row['id']?></td>
							<td data-label="Categories"><?php echo $row['categories']?></td>
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
								<a  href="includes/changestatus.inc.php?id=<?php echo $row['id']?>&revOpOf=<?php echo $text ?>&type=category"  class="status_btn <?php echo $class ?>"><?php echo $text ?></a>
								
								<a href="includes/delete.inc.php?id=<?php echo $row['id']?>&type=category" class="delete">Delete</a>
								<a href="manage_categories.php?type=edit&id=<?php echo $row['id']?>" class="edit">Edit</a>
							</td>
						</tr>

						<?php
							$i++;
							}
						?>
						
						<!--===SINGLE CATEGORY END===-->
					</tbody>

				</table>

			</div>
		</div>

	</section>


<?php
	require('footer.php');
?>