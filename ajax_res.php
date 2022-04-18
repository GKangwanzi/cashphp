<?php
require_once 'ucashapi.php';
/**
 * Created by PhpStorm.
 * User: jammieluvie
 * Date: 8/8/16
 * Time: 4:40 PM
 */
error_reporting(0);
if($_GET['initiatedeposit']){
    $data = explode("?::?", $_GET['initiatedeposit']);
    $phone = $data[2];
    $amount = $data[3];
    $uc = new ucash();

    echo $uc->depositmoney($phone, $amount);
}


?>
