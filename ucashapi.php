<?php
class ucash{
    
    private $username = "Kangwanzi"; // provide your ucash username
    private $apikey = "Lh51VcOnYjalNetQf6RmkJEPAZigI7rM4U8DXbxw"; // provide your ucash apikey
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
        $json = file_get_contents('php://input');
        $data = json_decode($json);
       
        if($data->transactionreference){
            $db = new DB();
            foreach ($db->query("SELECT * FROM message_loads WHERE phoneno='".$data->msdn."' AND id=(SELECT MAX(id) FROM message_loads WHERE phoneno='".$data->msdn."')")as $row) {
                $db->query("UPDATE message_loads SET transaction_reference = '".$data->transactionreference."' WHERE id='".$row['id']."'");
            }
        }

        if($data->apipaymentreceipt){
            $message = "Deposit of: ".$data->amount." from Isingiro SACCO.";
            MESSAGESCENTER::SendSMS("256788980225", $message);
            $db = new DB();
            foreach ($db->query("SELECT * FROM message_loads WHERE phoneno='".$data->msdn."' AND id=(SELECT MAX(id) FROM message_loads WHERE phoneno='".$data->msdn."')")as $row) {
                $db->query("UPDATE message_loads SET transactionID = '".$data->transactionid."'  WHERE id = '".$row["id"]."'");
                $db->query("UPDATE message_account SET messages = messages + '".$row["messages"]."'  WHERE id = '1'");
            }
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

