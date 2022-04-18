<?php

$uc =new pay();
$uc->getpay();

class pay {

    public function getpay(){
        $json = file_get_contents('php://input');
        $data = json_decode($json);
        if($data->apipaymentreceipt){
            echo "<script>alert('Your payment was successful');</script>"; 
        }
                
    }
    
    public static function SendSMS($username,$password,$sender,$number,$message) { 
        $url = "sms.thepandoranetworks.com/API/sendSMS/?";
        $parameters="number=[number]&message=[message]&username=[username]&password=[password]&sender=[sender]";
        $parameters = str_replace("[message]", urlencode($message), $parameters);
        $parameters = str_replace("[sender]", urlencode($sender),$parameters);
        $parameters = str_replace("[number]", urlencode($number),$parameters);
        $parameters = str_replace("[username]", urlencode($username),$parameters);
        $parameters = str_replace("[password]", urlencode($password),$parameters);
        $live_url="https://".$url.$parameters;
        $parse_url=file($live_url);
        $response = $parse_url[0];

        return json_decode($response, true);
    }
}

?>