<?php

/**
 * \brief The Cart class manages a user's cart. One of these is stored for each user in a session variable to keep track of all of their selected items before they've purchased them.
 * 
 * V1.05
 */
class Cart{
	/*! A list of cart item models that each store a rate plan to be displayed to the user*/
	public $cart_items; 
	/*! A tally of cart items used to generate a unique cart id for each item added*/
	public $latestItemId; 

	/**
	 * Initializes an empty cart instance.
	 */
	public function __construct(){
		$this->clearCart();
	}

	/**
	 * Clears all items from this cart instance.
	 */
	public function clearCart(){
		$this->cart_items = array();
		$this->latestItemId = 1;		
	}

	/**
	 * Adds a new item to this cart instance. Each item is added with a ProductRatePlanId, a Quantity, and a unique Cart Item identification number
	 * @param $rateplanId The ProductRatePlanId of the item being added
	 * @param $quantity The number of UOM to be applied to this rateplan for all charges with a Per Unit quantity
	 */
	public function addCartItem($rateplanId, $quantity,$addonCode,$itemType){ 
		$newCartItem = new Cart_Item($rateplanId, $quantity, $this->latestItemId);
		$newCartItem->ratePlanId = $rateplanId;

		$newCartItem->itemId = $this->latestItemId++;
		
		$newCartItem->quantity = $quantity;
		if($itemType == 'Plan'){
			$plan_object = "plans/".$newCartItem->ratePlanId;
		
	
			$plan = rApi::restCallGet($plan_object,"GET");
			if(isset($plan[plan][interval_unit])){
				$newCartItem->uom = $plan[plan][interval_unit];
			} else {
				$newCartItem->uom = null;			
			}
			
			if(isset($plan[plan][product_id])){
				$pdt_object = "products/".$plan[plan][product_id];
				$pdt = rApi::restCallGet($pdt_object,"GET");
			}
			
			$newCartItem->productprice = $plan[plan][recurring_price];
			$newCartItem->ratePlanName = $plan!=null ? $plan[plan][name]: 'Invalid Product';
			$newCartItem->ProductName = $pdt!=null ? $pdt[product][name]: 'Invalid Product';
			$newCartItem->ProductId = $plan!=null ? $plan[plan][product_id]: '';
			$newCartItem->AddonCode = $addonCode;
			$newCartItem->isPlan = true;
			$newCartItem->tax_percentage = $plan[plan][tax_percentage];
		}elseif($itemType == 'Addon'){
			$plan_object = "addons/".$newCartItem->ratePlanId;
		
	
			$plan = rApi::restCallGet($plan_object,"GET");
			if(isset($plan[addon][interval_unit])){
				$newCartItem->uom = $plan[addon][interval_unit];
			} else {
				$newCartItem->uom = null;			
			}
			
			if(isset($plan[addon][product_id])){
				$pdt_object = "products/".$plan[addon][product_id];
				$pdt = rApi::restCallGet($pdt_object,"GET");
			}
			
			$newCartItem->productprice = $plan[addon][price_brackets][0][price];
			$newCartItem->ratePlanName = $plan!=null ? $plan[addon][name]: 'Invalid Product';
			$newCartItem->ProductName = $pdt!=null ? $pdt[product][name]: 'Invalid Product';
			$newCartItem->ProductId = $plan!=null ? $plan[addon][product_id]: '';
			$newCartItem->AddonCode = $addonCode;
			$newCartItem->isAddon = true;
		}elseif($itemType == 'Coupon'){
			
			$plan_object = "coupons/".$newCartItem->ratePlanId;
			
			$plan = rApi :: restCallGet($plan_object,"GET");
						
			if(isset($plan[coupon][product_id])){
				$pdt_object = "products/".$plan[coupon][product_id];
				$pdt = rApi::restCallGet($pdt_object,"GET");
			}
			
			$newCartItem->productprice = $plan[coupon][discount_value];
			$newCartItem->ratePlanName = $plan!=null ? $plan[coupon][name]: 'Invalid Product';
			$newCartItem->ProductName = $pdt!=null ? $pdt[product][name]: 'Invalid Product';
			$newCartItem->ProductId = $plan!=null ? $plan[coupon][product_id]: '';
			$newCartItem->discount_by = $plan[coupon][discount_by];
			$newCartItem->isCoupon = true;
		}
		array_push($this->cart_items, $newCartItem);
	}

	/**
	 * Removes an item from the user's cart.
	 * @param $itemId The unique cart item ID of the item being removed from the cart
	 */
	public function removeCartItem($itemId){
		for($i=0;$i<(count($this->cart_items));$i++){
			if($this->cart_items[$i]->itemId==$itemId){
				unset($this->cart_items[$i]);
				$this->cart_items = array_values($this->cart_items);
				return true;
			}
		}
		return false;
	}
}

?>