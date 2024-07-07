<?php 
require('connection.inc.php');

$uid = $_GET['uid'];

$sql = "DELETE FROM users WHERE id = '$uid'";
mysqli_query($con,$sql);

header('location:../users.php');