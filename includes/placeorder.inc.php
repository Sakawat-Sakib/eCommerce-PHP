<?php
require('connection.inc.php');

if(isset($_POST['placeorder'])){

	$user_id = $_SESSION['uid'];
	$address = $_POST['street'];
	$city = $_POST['city'];
	$post_code = $_POST['pcode'];
	$payment_type = $_POST['payment_type'];
	$total_price = $_SESSION['total_price'];
	$added_on = date("Y-m-d h:i:sa");

	if($payment_type=='cod'){
		$payment_status = 'pending';
	}else{
		$payment_status = 'complete';
	}

	//INSERTING INTO ORDERS TABLE
	$sql = "INSERT INTO orders(user_id,address,city,post_code,payment_type,payment_status,total_price,order_status,added_on)
			VALUES('$user_id','$address','$city','$post_code','$payment_type','$payment_status','$total_price',1,'$added_on')
			";
	mysqli_query($con,$sql);


	//INSERTING INTO ORDER DETAIL TABLE
	$order_id = mysqli_insert_id($con);

	foreach ($_SESSION['cart'] as $key => $value) {

		$product_id = $value;
		$qty = $_SESSION['order'][$value]['qty'];

		$sql = "SELECT * FROM product WHERE id = '$product_id'";
		$res = mysqli_query($con,$sql);
		$row = mysqli_fetch_assoc($res);
		$price_per_unit = $row['price'];

		$sql = "INSERT INTO order_detail(order_id,product_id,qty,price_per_unit)
				VALUES('$order_id','$product_id','$qty','$price_per_unit')";
		mysqli_query($con,$sql);

	}

	unset($_SESSION['cart']);
	unset($_SESSION['order']);
	unset($_SESSION['total_price']);

	header('location:../thankyou.php');
}