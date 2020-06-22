<?php
require 'utils/security.php';
require 'utils/request.php';

define("API_KEY","<<API_KEY>>");
define("USERNAME","<<USERNAME>>");
define("PASSWORD","<<PASSWORD>>");

function bill_payment($account_number,$amount,$transid="", $schedule=""){
        $payload = init_payload();
        $credentials = array();
        $credentials['username'] = USERNAME;
        $credentials['password'] = PASSWORD;
        $payload["gateway_host"] = 'interintel.co';
        $payload["credentials"] = $credentials;
        $payload["account_number"] = $account_number;
        $payload["amount"] = $amount;
        $payload["product_item_id"] = XXXXX; //Product ID  ***TO BE PROVIDED***
        $payload["ext_outbound_id"] = $transid;
        $payload["scheduled_send"] = $schedule; // d/m/Y H:M (am/pm)
        print_r($payload);
        print "|||||||||||||||||||||||||||||||||";
        $payload = security($payload, API_KEY);
        print_r($payload);
        print "|||||||||||||||||||||||||||||||||";
        return request($payload, 'BILL PAYMENT');
}


//*************************BILL PAYMENT*****************************
//TRANSACTION_ID|SCHEDULED_SEND are optional

$result = bill_payment("ACCOUNT-XXX","10","REF NUMBER","");

$payload = (array) json_decode($result);
print_r($payload);

//**********************************************************************

?>

