<?php
class SubscriptionManager{
		
	static function subscribeWithCart($cart){ 

		if($cart==null || !isset($cart->cart_items)){
			return 'CART_NOT_INITIALIZED';
		}

		$org_name = isset($_SESSION['org_name']) ? $_SESSION['org_name'] : '';

		/************************ Sold to information ****************************/
		$sAddress1 = isset($_SESSION['sold_to_add_one']) ? $_SESSION['sold_to_add_one'] : '';
		$sAddress2 = isset($_SESSION['sold_to_add_two']) ? $_SESSION['sold_to_add_two'] : '';
		$sCity = isset($_SESSION['sold_to_city']) ? $_SESSION['sold_to_city'] : '';
		$sCountry = isset($_SESSION['sold_to_country']) ? $_SESSION['sold_to_country'] : '';
		$sPostalCode = isset($_SESSION['sold_to_pcode']) ? $_SESSION['sold_to_pcode'] : '';
		if($_SESSION['sold_to_country'] == "U.S.A" || $_SESSION['sold_to_country'] == "Canada"){
			$sState = isset($_SESSION['sold_to_stateD']) ? $_SESSION['sold_to_stateD'] : '';
		}else{
			$sState = isset($_SESSION['sold_to_stateT']) ? $_SESSION['sold_to_stateT'] : '';
		}
		
		/************************ Bill to information ****************************/

		$bemail = isset($_SESSION['bill_to_email']) ? $_SESSION['bill_to_email'] : '';
		$bdisplayName = isset($_SESSION['bill_to_display_name']) ? $_SESSION['bill_to_display_name'] : '';
		$bfirstName = isset($_SESSION['bill_to_first_name']) ? $_SESSION['bill_to_first_name'] : '';
		$blastName = isset($_SESSION['bill_to_last_name']) ? $_SESSION['bill_to_last_name'] : '';
		$bAddress1 = isset($_SESSION['bill_to_add_one']) ? $_SESSION['bill_to_add_one'] : '';
		$bAddress2 = isset($_SESSION['bill_to_add_two']) ? $_SESSION['bill_to_add_two'] : '';
		$bCity = isset($_SESSION['bill_to_city']) ? $_SESSION['bill_to_city'] : '';
		$bCountry = isset($_SESSION['bill_to_country']) ? $_SESSION['bill_to_country'] : '';
		$bPostalCode = isset($_SESSION['bill_to_pcode']) ? $_SESSION['bill_to_pcode'] : '';
		if($_SESSION['bill_to_country'] == "U.S.A" || $_SESSION['bill_to_country'] == "Canada"){
			$bState = isset($_SESSION['bill_to_stateD']) ? $_SESSION['bill_to_stateD'] : '';
		}else{
			$bState = isset($_SESSION['bill_to_stateT']) ? $_SESSION['bill_to_stateT'] : '';
		}
		$bPhone = isset($_SESSION['bill_to_pnum']) ? $_SESSION['bill_to_pnum'] : '';

		
		//date_default_timezone_set('America/Los_Angeles');
		date_default_timezone_set('Asia/Kolkata');
		//$date = date('Y-m-d\TH:i:s',time());
		
		$cdate = date('Y-m-d');
		$date = new DateTime($cdate);
		$date = $date->format('Y-m-d');
		
		$today = getdate();
		$mday = $today['mday'];
		
		include("./config.php");
		$totaladdons = array();
	 
	foreach($cart->cart_items as $key){
		
		if($key->isAddon){ 
			$addons = array(
				"addon_code"=>$key->ratePlanId,
				"quantity"=>$key->quantity[0][value],
				"price"=>$key->productprice,
				
			);
			array_push($totaladdons,$addons);
		}elseif($key->isPlan){
			$plan = array(
				"plan_code"=>$key->ratePlanId,
				"quantity"=>$key->quantity[0][value],
				"exclude_trial"=>false,
				"exclude_setup_fee"=>true,
				"billing_cycles"=>-1,
				"trial_days"=>0,
				"price"=>$key->productprice
			);
		}elseif($key->isCoupon){
			$couponCode = $key->ratePlanId;
		}
	}
	if($_SERVER['SERVER_NAME'] == 'localhost'){
		$redirect_url = "http://".$_SERVER['SERVER_NAME']."/zoho/account.php";
	}else{
		$redirect_url = "https://".$_SERVER['SERVER_NAME']."/zoho/account.php";
	}
		
		$subData = array(
			"customer"=>array(
			"display_name"=>$bdisplayName,
			"first_name"=>$bfirstName,
			"last_name"=>$blastName,
			"email"=>$bemail,
			"company_name"=>$org_name,
			"phone"=>$bPhone,
			"billing_address"=>array(
				"street"=>$bAddress1,
				"city"=>$bCity,
				"state"=>$bState,
				"country"=>$bCountry,
				"zip"=>$bPostalCode
			),
			"shipping_address"=>array(
				"street"=>$sAddress1,
				"city"=>$sCity,
				"state"=>$sState,
				"zip"=>$sPostalCode,
				"country"=>$sCountry
			),
			"payment_terms"=>1,
			"payment_terms_label"=>"Due On Receipt"
			),
			"plan"=> $plan,
			"addons"=> $totaladdons,
			"starts_at"=> $date, //	'2016-08-08', //
			"coupon_code"=> $couponCode,
			"redirect_url"=>$redirect_url,
			
		);

		$subData = json_encode($subData);

		$url = 'hostedpages/newsubscription';
		$subResult = rApi::restCallPOST($url,"POST",$subData);

		return $subResult;
	
	}
	
	
}

?>