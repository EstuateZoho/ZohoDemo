<?php


function __autoload($class){
 
  @include('./controller/' . $class . '.php');
  @include('./model/' . $class . '.php');

}
session_start();

include ('./config.php');
$debug = 0; //debug mode

    date_default_timezone_set('America/Los_Angeles');


error_reporting(E_ERROR | E_PARSE);

$errors = array();
$messages = null;
	 
//debug($client->__getFunctions());

isset($_REQUEST['type']) ? dispatcher($_REQUEST['type']) : '';

function dispatcher($type){ 
	switch($type) {
		case 'retrieveProducts' : retrieveProducts();
			break;
		case 'retrievePlans' : retrievePlans();
			break;
		case 'AddItemToCart' : addItemToCart();
			break;
		case 'RemoveItemFromCart' : removeItemFromCart();
			break;
		case 'GetInitialCart' : getInitialCart();
			break;
		case 'EmptyCart' : emptyCart();
			break;
		case 'ReadCountry' : getCountries();
			break;
		case 'ReadUSState' : getUsState();
			break;
		case 'ReadCanadianState' : getCanadianState();
			break;
		case 'GetISOStateCode' : getStateCode();
			break;
		case 'SubscribeWithCurrentCart' : subscribeWithCurrentCart();
			break;
		case 'getCustomerDetails' : getCustomerDetails();
			break;
		case 'GetCouponDetails' : getCouponDetails();
			break;
		case 'Getaddons' : getaddons();
			break;
		default : addErrors(null,'no action specified');
	}
	
}

function addErrors($field,$msg){
	global $errors;
	$error['field']=$field;
	$error['msg']=$msg;
	$errors[] = $error;
}

function debug($a) {
 global $debug ;
 if($debug) {
  echo "/*";
  var_dump($a);
  echo "*/";
 }
}

function output(){
 global $errors,$messages;
 $msg = array();
 
 if(count($errors)>0) {
  debug($errors);
  $msg['success'] = false;
  $msg['msg'] = $errors;
 }
 else {
  $msg['success'] = true;
  if(!is_array($messages)) $messages = array($messages);
  $msg['msg'] = $messages;
 }
 
 debug($msg);
 
 echo json_encode($msg);

}

function retrieveProducts(){
	global $messages;
	$customer = "products";
	$result = rApi::restCallGet($customer,"GET");
	$messages = $result;
	//print_r($messages);
	return $messages;
}

function retrievePlans(){
	global $messages;
	$customer = "plans";
	$result = rApi::restCallGet($customer,"GET");
	$messages = $result;
	//print_r($messages);
	return $messages;
}

function addItemToCart(){
	global $messages;
	if(!isset($_SESSION['cart'])){
		emptyCart();
	} 
	$ratePlanId = $_REQUEST['ratePlanId'];
	$addonCode = $_REQUEST['addon_code'];
	$itemType = $_REQUEST['item_type'];
	$quantity = 1;
	if(isset($_REQUEST['quantity']))
		$quantity = $_REQUEST['quantity'];

	if(isset($_SESSION['cart'])){
		$_SESSION['cart']->addCartItem($ratePlanId, $quantity,$addonCode,$itemType);
	} else {
		addErrors(null,'Cart has not been set up.');
		return;	
	} 
	$messages = $_SESSION['cart'];
	
	return $messages;
}

function emptyCart(){
	global $messages;
	
	$_SESSION['cart'] = new Cart();
	
	$messages = $_SESSION['cart'];
}

function removeItemFromCart(){
	global $messages;

	$itemId;
	if(isset($_REQUEST['itemId'])){
		$itemId = $_REQUEST['itemId'];
	} else {
		addErrors(null,'Item Id not specified.');
		return;		
	}

	if(isset($_SESSION['cart'])){
		$removed = $_SESSION['cart']->removeCartItem($itemId);
		if(!$removed){
			addErrors(null,'Item no longer exists.');
		}
	} else {
		addErrors(null,'Cart has not been set up.');
		return;		
	}

	$messages = $_SESSION['cart'];
}

function getInitialCart(){
	global $messages;
	
	if(!isset($_SESSION['cart'])){
		emptyCart();
	}
	$messages = $_SESSION['cart'];
}

function getCountries(){
	include('./model/Countries.php');

	global $messages;

	$messages = $countries;
}

function getUsState(){
	include('./model/states.php');

	global $messages;

	$messages = $US_STATES;

}

function getCanadianState(){
	include('./model/states.php');
	
	global $messages;
	
	$messages = $CANADIAN_STATES;
}

/**
 *  Function that returns the Country code when country name
 *  is passed
 */

function getStateCode(){

	include('./model/states.php');
	global $messages;

	$countryName = strtoupper($_REQUEST['countryName']);
	$stateName = $_REQUEST['stateName'];

	if($countryName == "Canada"){

		$isoCode = array_search($stateName, $CANADIAN_STATES);

	} else {

		$isoCode = array_search($stateName, $US_STATES);
	}

	if(!$isoCode){
		addErrors("ISO_State_code",'ISO State code is null');
	}

	$messages = $isoCode;

}

function subscribeWithCurrentCart(){
	global $messages;

	$pmId = $_REQUEST['pmId'];

	$subRes = SubscriptionManager::subscribeWithCart($_SESSION['cart']);

	if($subRes=='DUPLICATE_EMAIL'){
		addErrors(null,"This email address is already in use. Please choose another and re-submit.");
		return;
	}
	if($subRes=='INVALID_PMID'){
		addErrors(null,"There was an error processing this transaction. Please try again.");
		return;
	}
	
	$messages = $subRes;
}

function getCustomerDetails(){
    global $messages;
	$hpmID = $_REQUEST['hpmId'];
	$url = "hostedpages/".$hpmID;
    $accSum = rApi::restCallGet($url,"GET");
    $messages = $accSum;
	
	return $messages;
}

function getCouponDetails(){
	global $messages;
	$coupon_name = $_REQUEST['coupon_name'];
	$itemType = "Coupon";
	
	if(isset($_SESSION['cart'])){
		foreach($_SESSION['cart']->cart_items as $value){
			if($value->isCoupon){
				$planCoupon = true;
			}
		}
		
		if(!$planCoupon){
			$couponDetails = ProductManager :: getCouponDetails($coupon_name);
			$_SESSION['cart']->addCartItem($couponDetails[coupon_code],'','',$itemType);
		}else{
			addErrors(null,"Can Apply only one coupon.");
			return;
		}
			
	}else{
		addErrors(null,"Please choose a plan and then apply the respective coupon.");
		return;
	}
	$messages = $_SESSION['cart'];
}

function getaddons(){
	global $messages;
	
	$addonCode = $_REQUEST['addonCode'];
	$url = "addons/".$addonCode;
	
	$getAddonCode = rApi::restCallGet($url,"GET");
	
	$messages = $getAddonCode;
}

output();
?>