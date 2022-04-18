<?php
require_once 'ucashapi.php';

$amount = $_POST['amount'];
$number = $_POST['number'];

$initiate = new ucash();
$initiate->depositmoney($number, $amount);

?>