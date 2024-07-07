<?php

require('connection.inc.php');

header('Content-type:application/json');

$data = json_decode(file_get_contents("php://input"));

$id = $data->id;


if(isset($_SESSION['cart'][$id])){

	unset($_SESSION['cart'][$id]);

}else{
	$_SESSION['cart'][$id] = $id;

}


echo json_encode($_SESSION['cart']);


