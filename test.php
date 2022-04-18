<?php
require_once 'ucashapi.php';

$initiate = new ucash();
$initiate->RecieveApiPaymentReceipt();
echo $transactionID;

?>