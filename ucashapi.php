<?php
class ucash{
    
    private $username = "Bantu"; // provide your ucash username
    private $apikey = "m7AC3c8vzygxVPLHepwioTEB19SUnD2usIR6FWaZ"; // provide your ucash apikey
    private $url = "https://ucatchapps.com/apicatch/index.php?";
    
   
    
    public function depositmoney($phone, $amount) {
        //initiate to deposit money using mobile money 
        $parameters="requestloading=1&amount=".$amount."&phone=".$phone."&apikey=". $this->apikey."&appname=".$this->username;
        $live_url= $this->url.$parameters;
        $response = file_get_contents($live_url);
        $data = json_decode($response, true);

        $ubal = $data["resuldatat"]; 
        echo $ubal["Status"];
    }
    
    public function RecieveApiPaymentReceipt() {
        //deposit feedback from the callback after initiating deposit transaction
        if ($_GET['apipaymentreceipt']) { 
            $phone = $_GET['msdn'];
            $amount = $_GET['amount'];
            $transactionID = $_GET['transactionid'];
            $TransactionReference = $_GET['transactionreference']; 
            //use these to variable save in the database.
        }
    }
    
    
    public function withdrawmoney($phone, $amount) {
        //initiate to withdraw money from ucash using mobile money.
        $parameters="withdrawfunds=1&amount=".$phone."&phone=".$amount."&apikey=".$this->apikey."&appname=".$this->username;
        $live_url= $this->url.$parameters;

        $response = file_get_contents($live_url);
        $data = json_decode($response, true);

        $ubal = $data["ucash"];
        echo $data["message"]."<br> UGX ######";
        echo "|<><>|".$ubal;
    }
    
    public function withdrawfeedback(){
        //withdraw feedback from the callback after initiating withdraw transaction
        if($_GET['withrawtransactions']){
            $phone = $_GET['phone'];
            $amount = $_GET['amount'];
            $charge = $_GET['charge'];
            $transactionID = $_GET['transactionID'];
            $TransactionReference = $_GET['TransactionReference'];   
            //use these to variable save in the database.

        }
    }
}

?>

