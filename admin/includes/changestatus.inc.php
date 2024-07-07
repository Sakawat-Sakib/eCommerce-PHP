<?php 
require('connection.inc.php');

$id = $_GET['id'];
$revOpOf = $_GET['revOpOf'];
$type = $_GET['type'];


if($revOpOf=='Active'){
	$setStatus = 0;
}else if($revOpOf=='Deactive'){
	$setStatus = 1;
}


if($type == "category"){
	$sql = "UPDATE categories SET status = '$setStatus' WHERE id = '$id'";


	mysqli_query($con,$sql);
	header('location:../categories.php');

}elseif ($type == "product") {
	$link = "product.php";
	$sql = "UPDATE product SET status = '$setStatus' WHERE id = '$id'";

	mysqli_query($con,$sql);
	header('location:../product.php');
}

