<?php
define ('URL', 'interintel.co');
define ('HOST', '69.64.68.226');

function init_payload(){
    $payload = array();
    $payload['CHID'] = '13';
    $payload['timestamp'] = time();
    $payload['ip_address'] = HOST;
    $payload['gateway_host'] = URL;
    $payload['lat'] = '0.0';
    $payload['lng'] = '0.0';
    return $payload;
}

function request($payload, $service){
    $data_string = json_encode($payload);
    $host = array_key_exists('gateway_host', $payload) ? $payload['gateway_host'] : URL;
    $url = 'https://'.$host.'/api/'.$service.'/';
    echo $url.'\n';
    
    $ch = curl_init($url);
    // Remove the line that tries to print the cURL handle
    // echo $ch.'\n';
    
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string)
    ));
    
    // Execute post
    $result = curl_exec($ch);
    
    // Check for errors
    if (curl_errno($ch)) {
        throw new Exception(curl_error($ch));
    }
    
    // Close connection
    curl_close($ch);
    return $result;
}
?>

