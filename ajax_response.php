<?php

	$url = "http://vps112789.ovh.net:8080/MockupService/rest/suggestion?rank=0&priceLimit=800&excludeObject=9&excludeObject=11";
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT, 4);
	$json = curl_exec($ch);
	if(!$json) {
	    echo curl_error($ch);
	}
	curl_close($ch);
	print_r($json);

?>