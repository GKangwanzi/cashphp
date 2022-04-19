<?php
require_once './ucashapi.php';
$pay = new ucash();
$pay->depositmoney($phone, $amount);

class payments{
    public function InitiateMethods() {
        $pay = new ucash();
        $pay->depositmoney($phone, $amount);
        $pay->withdrawmoney($phone, $amount);
        //depositmoney
        $pay->RecieveApiPaymentReceipt();
        $pay->withdrawfeedback();
    }
}

?>