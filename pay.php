<?php 
include "ucashapi.php";

if(isset($_POST['submit'])){

	$phone  = $_POST['phone'];
	$amount = $_POST['amount'];

	$initiate = new ucash();
	$initiate->depositmoney($phone, $amount);

}else{
	echo "<script>alert('Your payment was successful');</script>"; 
	header("Location: index.php");
}
?>