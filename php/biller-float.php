<?php
require 'utils/security.php';
require 'utils/request.php';

define("API_KEY","<<API_KEY>>");
define("USERNAME","<<USERNAME>>");
define("PASSWORD","<<PASSWORD>>");


function biller_float($product_item, $transid=""){
        $payload = init_payload();
        $credentials = array();
        $credentials['username'] = USERNAME;
        $credentials['password'] = PASSWORD;
        $payload["gateway_host"] = 'interintel.co';
        $payload["credentials"] = $credentials;
        $payload["product_item_id"] = $product_item; //Product ID  ***TO BE PROVIDED***
        $payload["ext_outbound_id"] = $transid;
        print_r($payload);
        print "|||||||||||||||||||||||||||||||||";
        $payload = security($payload, API_KEY);
        print_r($payload);
        print "|||||||||||||||||||||||||||||||||";
        return request($payload, 'biller-float');
}


//*************************BILL STATUS*****************************
//TRANSACTION_ID is optional

$result = biller_float("PRODUCT_ID", "REF NUMBER");

$payload = (array) json_decode($result);
print_r($payload);

//**********************************************************************

?>

