<?php
class InvoiceManager {
	
	public static function getInvoicePdf($id){
		$url = "invoices/".$id;
		$invoice_details = rApi :: restCallGET($url,"GET");
		
		$url_account = "customers/".$invoice_details[invoice][customer_id];
		
		$account_details = rApi :: restCallGET($url_account,"GET");
		
		$account = array('company_name'=>$account_details[customer][company_name],
						'payment_terms'=>$account_details[customer][payment_terms_label]
						);
		//$invoice_details[account] = array();
		array_push($invoice_details,$account);
		//print_r($invoice_details); exit;
		return $invoice_details;
	}
	
	
}

?>