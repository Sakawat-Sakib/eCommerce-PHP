<?php
	require('top.php');
?>

	<section class="main_sec">

		<div class="main_sec_banner">
			<h1>Users</h1>
		</div>

		
		<div class="main_sec_container">
			<div class="container">

				<table>

					<thead>
						<tr>
							<th>#</th>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Mobile</th>
							<th>Date</th>
							<th></th>
						</tr>
					</thead>

					<tbody>

						<?php 
							$sql = "SELECT * FROM users";
							$res = mysqli_query($con,$sql);

							$i = 1;
							while($row = mysqli_fetch_assoc($res)){

						?>

							<!--SINGLE ROW-->
							<tr>
								<td data-label="#"><?php echo $i ?></td>
								<td data-label="ID"><?php echo $row['id'] ?></td>
								<td data-label="Name"><?php echo $row['name'] ?></td>						
								<td data-label="Email"><?php echo $row['email'] ?></td>
								<td data-label="Mobile"><?php echo $row['mobile'] ?></td>	
								<td data-label="Date"><?php echo $row['added_on'] ?></td>
								<td>
									<a href="includes/deleteuser.inc.php?uid=<?php echo $row['id'] ?>" class="delete">Delete</a>
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