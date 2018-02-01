<?php

class Amazon
{
	
	// var $public_key = "AKIAIW6OFB7CFY6RJGCQ";
	// var $private_key ="nZjaRlhS6GP7mdJKJb6qs45zxXs0n5bJWyqTTsSm";
	// var $public_key = "AKIAIHDUMOOUVKQY54RA";
	// var $private_key ="X97gafbXvyLVRsUrdqo4WS8OjhANNWK1rQ2gXcwU";
		var $public_key = "AKIAJMM3WFPI3CW3XKPA";
	var $private_key ="wjW/8ZFsPNFH4Z0twgtjKgyhhj95io8vdWjRO7l6";

	// Preparing Amazon URL
	public function generateSignature($param)
	{
		$signature['method'] = "GET";
		$signature['host'] = "ecs.amazonaws." . $param['region'];
		$signature['uri'] = "/onca/xml";
		
		$param['Service'] = "AWSECommerceService";
		$param['AWSAccessKeyId'] = $this->public_key;
		$param['Timestamp'] = gmdate("Y-m-d\TH:i:s\Z");
		$param['Version'] = "2009-10-01";
		
		ksort($param);
		foreach($param as $key => $value)
		{
			$key = str_replace("%7E", "~", rawurlencode($key));
			$value = str_replace("%7E", "~", rawurlencode($value));
			$queryParamsUrl[] = $key . "=" . $value;
		}
		
		$signature['queryUrl']= implode("&", $queryParamsUrl);
		$StringToSign = $signature['method'] . "\n" . $signature['host'] . "\n" . $signature['uri'] . "\n" . $signature['queryUrl'];
		$signature['string'] = str_replace("%7E", "~",rawurlencode(
				base64_encode(
					hash_hmac("sha256",$StringToSign,$this->private_key,True)
				)
			)
		);
		return $signature;
	}
	
	public function getSignedUrl($params)
	{
		$signature=$this->generateSignature($params);
		return $signedUrl= "http://" . $signature['host'] . $signature['uri'] . '?' . $signature['queryUrl'] . '&Signature=' . $signature['string'];
	}
	
}

?>