<?php

require('connection.inc.php');

$id = $_GET['id'];


if(isset($_SESSION['cart'][$id])){

	unset($_SESSION['cart'][$id]);

	header('location:../cart.php');

}else{
	
	header('location:../cart.php');
}





