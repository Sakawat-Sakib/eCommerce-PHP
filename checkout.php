<?php
	require('top.php');

	if(isset($_POST['cart_submit'])){

		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=='yes'){

			$subtotal = 0;

			foreach ($_SESSION['cart'] as $key => $value) {

				$qty = $_POST[$value];

				//STORE IN SESSION FOR ORDER TABLE
				$_SESSION['order'][$value]['qty'] = $qty;

				$sql = "SELECT * FROM product WHERE id = '$value'";
				$res = mysqli_query($con,$sql);		
				$row = mysqli_fetch_assoc($res);
				$price = $row['price'];	

				$subtotal = $subtotal + ($qty*$price);	
			}

			$deliveryFee = 60;
			$vat = $subtotal*0.02;

			$total = $subtotal + $deliveryFee + $vat;

			$_SESSION['total_price'] = $total;

		}else{
			header('location:login.php?from=checkout');
			die();
		}

		

	}else{
		header('location:index.php');
		die();
	}
?>
		
<!--BANNER SECTION START-->
<section class="cat_banner">
	<img src="asset/image/banner/cat_banner.jpg">
	<h1>Checkout</h1>
</section>

<section class="check_sec">
	<div class="container">
		<div class="check_box">

			<!--=========================-->
		
			<div class="address_payment">

				<div class="address_box">

					<div class="address_head">
						<h1>ADDRESS</h1>
					</div>

		<form method="POST" action="includes/placeorder.inc.php">

					<div class="address_inner">
						<div class="address_inner_form">
							<input name="street" type="text" placeholder="Street" required>
							<input name="city" type="text" placeholder="City" required>
							<input name="pcode" type="number" onkeypress="return event.charCode>=48 && event.charCode<=57" placeholder="Post Code"  required>
						</div>
					</div>

				</div>


				<div class="payment_box">
					<div class="payment_head">
						<h1>SELECT PAYMENT OPTION</h1>
					</div>
					<div class="payment_inner">
						<div class="payment_inner_box">

							<div class="single_payment">
								<input  type="radio" name="payment_type" value="cod" required><p>Cash On Delivery</span>
							</div>
							<div class="single_payment">
								<input  type="radio" name="payment_type" value="bkash" required><p>Bkash</p>
							</div>
							<div class="single_payment">
								<input  type="radio" name="payment_type" value="paypal" required><p>Paypal</p>
							</div>
							
						</div>
					</div>
				</div>


				<input type="submit" name="placeorder" class="btn" value="PLACE ORDER">
			</div>

		</form>

			<!--=========================-->
			<div class="summary">
				<table class="sum_table">
					<thead>
						<tr>
							<th colspan="2">SUMMARY</th>
						</tr>
					</thead>

					<tbody>
						<tr>
							<td>Subtotal</td>
							<td><?php echo $subtotal ?></td>
						</tr>
						<tr>
							<td>Delivery Fee</td>
							<td><?php echo $deliveryFee ?></td>
						</tr>
						<tr>
							<td>VAT</td>
							<td><?php echo $vat ?></td>
						</tr>
						<tr>
							<td>Total</td>
							<td><?php echo $total ?></td>
						</tr>
					</tbody>
				</table>
			</div>

		</div>
	</div>
</section>

<?php
	require('footer.php');
?>