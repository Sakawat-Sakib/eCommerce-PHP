<?php
	require('top.php');
?>
		
<!--BANNER SECTION START-->
<section class="cat_banner">
	<img src="asset/image/banner/cat_banner.jpg">
	<h1>My Cart</h1>
</section>



	<!--TABLE SECTION-->
	<section class="cart_table_sec">
		<div class="container">

			<?php
				if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0){
			?>
				<div class="cart_table_container">
					<table>

						<thead>
							<tr>
								<th class="product-th">products</th>
		                        <th class="product-quantity-th">Quantity</th>
		                        <th class="product-subtotal-th">Total</th>
		                        
							</tr>
						</thead>

						<tbody>


							<!-- SINGLE PRODUCT -->
							<?php
								foreach ($_SESSION['cart'] as $key => $value) {
								
								$sql = "SELECT * FROM product WHERE id = '$value'";
								$res = mysqli_query($con,$sql);
								$row = mysqli_fetch_assoc($res);
							?>
				<form method="POST" action="checkout.php">
								<tr>
			                       <td data-label="products" class="product-td">
				                       	<div class="cart_pro_info">
				                       		<img src="<?php echo 'admin/product/'.$row['image']?>">
				                       		<div class="cart_pro_detail">
				                       			<h2><?php echo $row['name']?></h2>
				                       			<small>Price : <span class="cart_pro_price"><?php echo $row['price']?></span>$</small>
				                       			<br>
				                       			<a href="includes/deletefromcart.inc.php?id=<?php echo $row['id'] ?>"><i class="fas fa-trash"></i></i></a>
				                       		</div>
				                       	</div>
			                       </td>

			                       <td data-label="Quantity">
			                       		<div class="cart_input">
					                       	<i  class="fas fa-minus-square minus"></i>
					                       	<input class="cart_qty" name="<?php echo $row['id'] ?>" type="number" min="1" value="1" ondrop="return false;" onpaste="return false;" onkeypress="return event.charCode>=48 && event.charCode<=57" required>
					                        <i  class="fas fa-plus-square plus"></i>
				                    	</div>
			                       </td>

			                       <td data-label="Total">
			                       		<div class="cart_total">
			                       			<p>$<span class="cart_pro_total_price"></span><p>
			                       		</div>	
			                       </td>
			                    </tr>

		                    <?php
		                    	}
		                    ?>
		                    


		                    


		                    <!--PRICE RELATED INFO-->
		                    <tr>
		                    	<td></td>
		                    	<td>
		                    		<p>Subtotal</p><br>
		                    		<p>Delivery Fee</p><br>
		                    		<p>VAT (2%)</p>
		                    	</td>
		                    	<td>
		                    		<p>$<span id="sub_total"></span></p><br>
		                    		<p>$<span id="delivery_fee">60</span></p><br>
		                    		<p>$<span id="vat"></span></p>
		                    	</td>
		                    </tr>

		                    <tr>
		                    	<td></td>

		                    	<td>
		                    		<p>Total</p>
		                    	</td>

		                    	<td>
		                    		<p>$<span id="final_total_price"></span></p>
		                    	</td>
		                    </tr>


						</tbody>

					</table>
				</div>

					<div class="cart_button_container">
						<a href="index.php"><button class="btn backtoshop">BACK TO SHOPPING</button></a>
						
						<input type="submit" name="cart_submit" class="btn procedtocheck" value="PROCEED TO CHECKOUT">
					</div>

				</form>

			<?php
				}else{
			?>

				<div class="msg_box">
					<p class="msg">There is no product in your cart.</p>
					<i class="far fa-frown"></i>
				</div>

			<?php
				}
			?>

		</div>
	</section>



<script src="asset/js/payment.js"></script>

<?php
	require('footer.php');
?>