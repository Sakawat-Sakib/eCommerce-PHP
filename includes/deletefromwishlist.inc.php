<?php

require('connection.inc.php');

$id = $_GET['id'];


if(isset($_SESSION['wish'][$id])){

	unset($_SESSION['wish'][$id]);

	header('location:../wishlist.php');

}else{
	
	header('location:../wishlist.php');
}





