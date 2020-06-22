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
	if (array_key_exists('gateway_host', $payload)){
		$host = $payload['gateway_host'];
	}else{
		$host = URL;
	}
	$url = 'https://'.$host.'/api/';
	//$url = $url.urlencode($service).'/';
	$url = $url.$service.'/';
	echo $url.'\n';
	$ch = curl_init($url);
	echo $ch.'\n';
	//curl_setopt($ch, CURLOPT_VERBOSE, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	//curl_setopt ($ch, CURLOPT_SSLVERSION, 6);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'Content-Type: application/json',
		    'Content-Length: ' . strlen($data_string))
		);
	//execute post
	$result = curl_exec($ch);
	//close connection
	curl_close($ch);
	return $result;
	}
?>
