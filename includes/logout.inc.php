<?php 

session_start();

unset($_SESSION['loggedin']);
unset($_SESSION['uid']);
unset($_SESSION['cart']);
unset($_SESSION['wish']);
unset($_SESSION['order']);
unset($_SESSION['total_price']);

header('location:../login.php');

