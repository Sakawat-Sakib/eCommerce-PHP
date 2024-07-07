<?php 
require('connection.inc.php');

$id = $_GET['id'];
$type = $_GET['type'];

if($type == 'category'){

	$sql = "DELETE FROM categories WHERE id = '$id'";

	mysqli_query($con,$sql);
	header('location:../categories.php');
	
}else if($type == 'product'){

	$sql = "DELETE FROM product WHERE id = '$id'";

	mysqli_query($con,$sql);
	header('location:../product.php');
}
