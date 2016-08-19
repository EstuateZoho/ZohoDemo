<?php
class rApi {
	
	function restCallPost($urlparameter,$method,$data){
		
		include './config.php';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $restUrl .$urlparameter); 
//print_r($restUrl); exit;
		//curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json;charset=UTF-8',$authorization, $cutsomerId));

			
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			
		curl_setopt($ch, CURLOPT_TIMEOUT, '3');
			
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		$r  = curl_exec($ch); 
		
		$result = json_decode($r,true);

		$errmsg = curl_error($ch); 

		$cInfo = curl_getinfo($ch); 
		
		curl_close($ch);
		
		return $result;
		
	}
	function restCallGet($urlparameter,$method){
		
		include './config.php';
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $restUrl.$urlparameter); 

		//curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json;charset=UTF-8',$authorization, $cutsomerId));

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			
		curl_setopt($ch, CURLOPT_TIMEOUT, '3');
			
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		$r  = curl_exec($ch); 
		
		$result = json_decode($r,true);
		
		$errmsg = curl_error($ch); 

		$cInfo = curl_getinfo($ch,CURLINFO_RESPONSE_CODE); 
		
		
		curl_close($ch);
		
		return $result;
		
		
	}
	
}

?>