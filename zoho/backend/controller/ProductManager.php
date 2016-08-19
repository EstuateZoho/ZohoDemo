<?php
class ProductManager {
	
	public static function getCouponDetails($couponName){ 
		$url = 'coupons';
		$couponDetails = rApi :: restCallGet($url,"GET");
		
		foreach($couponDetails[coupons] as $coupons){ 
			if ((strtoupper($couponName) == strtoupper($coupons[name])) && $coupons[status] == "active"){
				return $coupons;
			}
		}		
	}
	
	
}

?>