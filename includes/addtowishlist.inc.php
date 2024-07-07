<?php

require('connection.inc.php');

header('Content-type:application/json');

$data = json_decode(file_get_contents("php://input"));

$id = $data->id;


if(isset($_SESSION['wish'][$id])){

	unset($_SESSION['wish'][$id]);

}else{
	$_SESSION['wish'][$id] = $id;

}


echo json_encode($_SESSION['wish']);


