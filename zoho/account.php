<?php

?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Account Information</title>


    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>

    <style type="text/css">

        anchor{
            color:#000;
        }

        .panel-footer {
            min-height: 30px !important;
        }
        .new-panel-footer {
            padding: 3px !important;
        }

        .mfp-close{
            float:right;
        }

    </style>

</head>

<body>
<header class="header">  </header>
<div class="container page-wrap col-xs-12 col-sm-10 col-md-10 col-md-offset-1 col-sm-offset-1" id="main-div" style="position: relative; margin-top: 8%;">
<section id="header-title">
    <div class="container">
        <div class="row animated fadeInUpBig">
            <div class="col-sm-12">
                <h2 class="white">
                    Account <span style="color:#d36028">Summary</span>
                </h2>
            </div>
        </div>
    </div>
</section>
</div>
<!-- start Header -->
<div class="container-fluid" style="min-height:700px;">
    <div class="col-xs-12 col-sm-10 col-md-10 col-md-offset-1 col-sm-offset-1" >

        <div class="col-xs-12">
            <div class="panel panel-b">
                <div class="panel-heading new-panel-heading">


                    <div id="account-info-panel" class="panel-body new-panel">
                        <h3 class="panel-title panel-text">Account <span style="color:#d36028">Information</span></h3>
                    </div>


                </div>
                <div class="panel-body" id="contact-info-panel" >
                    <ul class="list-group">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <li class="list-group-item list-bk">
                                <b>Account Name : </b>
                                <span class="accountsummary" id="AccountName"></span>
                            </li>
                            <li class="list-group-item list-bk">
                                <b>Account Number : </b>
                                <span class="accountsummary" id="AccountNum"></span>
                                <input type="hidden" id="account" value="">
                            </li>
                            <li class="list-group-item list-bk">
                                <b>Account Balance : </b>
                                <span class="accountsummary" id="AccountBal"></span>
                            </li>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <li class="list-group-item list-bk">
                                <b>Last Invoiced : </b>
                                <span class="accountsummary" id="lastInv"></span>
                            </li>
                            <li class="list-group-item list-bk">
                                <b>Last Payment Date : </b>
                                <span class="accountsummary" id="LastPaid"></span>
                            </li>
                            <li class="list-group-item list-bk">
                                <b>Last Payment : </b>
                                <span class="accountsummary" id="LastPayment"></span>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
        <!-- **********************************Contact Information ********************************** -->
        <div class="col-xs-12">
            <div class="panel panel-b">
                <div class="panel-heading new-panel-heading">
                    <div class="row" style="padding: 10px;">
                        <div style="float:left; padding: 2px 20px !important;">
                            <h3 class="panel-title panel-text" >Contact <span style="color:#d36028">Information </span></h3>
                        </div>
                        <div style="float:right;">
                            <div id="bc_loading" class="loading alert alert-warning hidden" role="alert" style="margin-bottom: 0; padding: 0;float: left;">
                                <span class="fa fa-spinner fa-spin"></span> loading...
                            </div>
                            
                            <span class="alert alert-success hidden bSuccess fa fa-check" id="bcontact_success"></span>
                            <span class="alert alert-warning hidden bError fa fa-exclamation-circle" id="bcontact_error"></span>
                        </div>

                    </div>
                </div>
				<div class="panel-body panel panel-default" id="contact-info-panel" style="height: 140px;overflow-y: auto;margin:2%;">
                    <ul class="list-group">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <li class="list-group-item list-bk">
                                <b>Organization Name : </b>
                                <span id="orgname"></span>
                                <input id="orgname_input" class="updateContact form-control contact-input hidden" type="text" value="">
                            </li>
                            <li class="list-group-item list-bk">
                                <b>Display Name : </b>
                                <span id="dname"></span>
                                <input id="dname_input" class="updateContact form-control contact-input hidden" type="text" value="">
                            </li> 
							<li class="list-group-item list-bk">
                                <b>First Name : </b>
                                <span id="fname"></span>
                                <input id="fname_input" class="updateContact form-control contact-input hidden" type="text" value="">
                            </li>
                            
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
						
							<li class="list-group-item list-bk">
                                <b>Last Name : </b>
                                <span id="lname"></span>
                                <input id="lname_input" class="updateContact form-control contact-input hidden" type="text" value="">
                            </li>
                            <li class="list-group-item list-bk">
                                <b>Email : </b>
                                <span id="email"></span>
                                <input id="email_input" class="updateContact form-control contact-input hidden" type="text" value="">
                            </li>
                            <li class="list-group-item list-bk">
                                <b>Phone : </b>
                                <span id="phone"></span>
                                <input id="phone_input" class="updateContact form-control contact-input hidden" type="text" value="">
                            </li>
                        </div>
                    </ul>
                </div>
				<!-- **********************************Contact Information ********************************** -->
                <div class="panel-body" id="contact-info-panel" style="height: 275px;overflow-y: auto;">
                    <ul class="list-group">
					<!-- **********************************Bill to Information ********************************** -->
                        <div class="col-xs-12 col-sm-6 col-md-6 panel panel-default" style="margin-right: 10%; width: 44%;margin-left:1%;">
							<li class="list-group-item list-bk">
								<div style="padding: 2px 20px !important;background-color:#bbb;">
									<h3 class="panel-title panel-text" >Bill to <span style="color:#d36028">Address </span></h3>
								</div>
							</li>
                            <li class="list-group-item list-bk">
                                <b>Address1 : </b>
                                <span id="address1"></span>
                                <input id="address_input1" class="updateContact form-control contact-input hidden" type="text" value="">
                            </li>
							<li class="list-group-item list-bk">
                                <b>City : </b>
                                <span id="city"></span>
                                <input id="city_input" class="updateContact form-control contact-input hidden" type="text" value="">
                            </li>
							<li class="list-group-item list-bk">
                                <b>Country : </b>
                                <span id="country"></span>
                                <select id="bill_to_country" name="bill_to_country" class="updateContact accountSelect form-control address-input half hidden" onchange="prepareState('bill_to_country')">

                                </select>
                            </li>

                            <li class="list-group-item list-bk">
                                <b>State : </b>
                                <span id="state"></span>
                                <select id="bill_to_stateD" name="bill_to_stateD" class="updateContactD form-control address-input " style="display:none">

                                </select>
                                <input type="text" name="bill_to_stateT" id="bill_to_stateT" class="updateContactT form-control contact-input" style="display:none" value="">
                            </li>

                            <li class="list-group-item list-bk">
                                <b>Postal Code : </b>
                                <span id="postalcode"></span>
                                <input id="postalcode_input" class="updateContact form-control contact-input hidden" type="text" value="">
                            </li>
                        </div>
						<!-- **********************************Bill to Information ********************************** -->
						<!-- **********************************Sold to Information ********************************** -->
                        <div class="col-xs-12 col-sm-6 col-md-6 panel panel-default" style="width: 44%">
							 <li class="list-group-item list-bk">
								<div style="padding: 2px 20px !important;background-color:#bbb;">
									<h3 class="panel-title panel-text" >Sold to <span style="color:#d36028">Address </span></h3>
								</div>
							</li>
                             <li class="list-group-item list-bk">
                                <b>Address1 : </b>
                                <span id="saddress1"></span>
                                <input id="saddress_input1" class="updateSContact form-control contact-input hidden" type="text" value="">
                            </li>
							<li class="list-group-item list-bk">
                                <b>City : </b>
                                <span id="scity"></span>
                                <input id="scity_input" class="updateSContact form-control contact-input hidden" type="text" value="">
                            </li>
							<li class="list-group-item list-bk">
                                <b>Country : </b>
                                <span id="scountry"></span>
                                <select id="sold_to_country" name="sold_to_country" class="updateSContact form-control address-input hidden" onchange="prepareState('sold_to_country')">


                                </select>
                            </li>
							<li class="list-group-item list-bk">
                                <b>State : </b>
                                <span id="sstate"></span>
                                <select id="sold_to_stateD" name="sold_to_stateD" class="updateSContact accountSelect form-control address-input " style="display:none">

                                </select>
                                <input type="text" name="sold_to_stateT" id="sold_to_stateT" class="updateSContact form-control contact-input " style="display:none">
                            </li>

                            <li class="list-group-item list-bk">
                                <b>Postal Code : </b>
                                <span id="spostalcode"></span>
                                <input id="spostalcode_input" class="updateSContact form-control contact-input hidden" type="text" value="">
                            </li>
                            
                            
                        </div>
						 <!-- ********************************** Sold to Information ********************************** -->
                    </ul>
                </div>
            </div>
        </div>
        
       
       

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-b">
                <div class="panel-heading new-panel-heading">
                    <div class="panel-body new-panel" style="padding: 10px;">
                        <div class="row">
                            <div style="float:left;">
                                <h3 class="panel-title panel-text  zero-pdng" style="padding-left:20px;">Subscriptions</h3>
                            </div>
                            <div style="float:right;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div id="subscription-info-panel">
                        <div class="col-xs-12" >
                            <div class="col-xs-12 col-sm-6 col-md-6"><b><span id="sub-num" style="color:#333;" >Subscription Number&nbsp;:&nbsp;</span></b></div>
                            <div class="col-xs-12 col-sm-6 col-md-6"><b><span id="sub-date" style="color:#333;" class="right">Subscription Start Date&nbsp;:&nbsp;</span></b></div>

                            <div class="panel panel-default subscription-summary-table" style="overflow-y: auto; height: 200px ! important;background-color:rgb(250, 250, 250) !important;">
                                <div class="loading alert alert-warning load_subscription" style="margin: auto;text-align: center;width: 50%;top:50%;margin-top: 60px;">
                                    <span class="fa fa-spinner fa-spin"></span> <span id="load_subs_span_msg">Loading Subscriptions!!!</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="zuora_payment" ></div>
        <div id="subscribe_loading" class="loading alert alert-warning hidden" role="alert">
            <span class="fa fa-spinner fa-spin"></span> loading...
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="panel panel-default panel-b">
                <div class="panel-heading new-panel-heading">
                    <div class="panel-body new-panel" style="padding: 10px;">
                        <div style="float:left;">
                            <h3 class="panel-title panel-text col-sm-6 zero-pdng" style="padding-left:20px;">Invoices</h3>
                        </div>
                    </div>

                </div>
                <div class="panel-body">
                    <div class="panel table-responsive" style="overflow-y: auto; height: 200px ! important; color:#333;background-color: rgb(250, 250, 250) ! important;">
                        <table class="table table-hover table-condensed invoice-history-table">
                            <thead>
                            <tr>
                                <th>View PDF</th>
                                <th>Invoice #</th>
                                <th>Invoice Date</th>
                                <th>Due Date</th>
                                <th>Amount</th>
                                <th>Tax</th>
                                <th>Balance</th>
                                <th class="pay-input-col">Status</th>
                            </tr>
                            </thead>

                        </table>
                        <div class="loading alert alert-warning invoice_history" style="margin: auto;text-align: center;width: 50%;top:50%;margin-top: 40px;">
                            <span class="fa fa-spinner fa-spin"></span> <span id="load_subs_span_msg">Loading Invoice!!!</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="load_accounts_panel" class="panel panel-default " style="box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);display:none;">

            <div class="panel-heading amend-heading">
                <h3 class="panel-title">Account Information</h3>
            </div>
            <div class="panel-body">
                <div id="accept-change">
                    <div id="amendment-detail">
                        <div class="panel panel-default">
                            <div class="panel-body">

                                <div id="load_account_msg" >
                                    <div class="loading alert alert-warning hidden load_accounts">
                                        <span class="fa fa-spinner fa-spin"></span> <span id="load_acc_span_msg"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>


<script type="text/javascript" src='js/jquery.min.js'></script>
<script type="text/javascript"  src="js/index.js"></script>
<script type="text/javascript"  src="js/manager.js"></script>
<script type="text/javascript"  src="js/validation.js"></script>
<script type="text/javascript" src="js/function.js" ></script>
<script src='js/jquery.redirect.js'></script>

<script type="text/javascript">
    $(document).ready(function(){
        $(".header").load("header.html");
    	var url_param = location.search.substring(1);
		url_param = url_param.replace("hostedpage_id=", "").trim();
		getCustomerDetails(url_param);
		emptyCart();
	});


	function getCustomerDetails(hpmId){
		 $.getJSON("backend/index.php?type=getCustomerDetails", {hpmId: hpmId},
            function(data){
				
				var acc = data.msg.data;
                    /* Show Account Info */
                    $('#AccountName').html(acc.subscription.customer.display_name);
                    $('#AccountNum').html(acc.subscription.customer.customer_id);
                    $('#account').val(acc.subscription.customer.customer_id);

                    var lastpay = parseFloat(acc.invoice.payments[0].amount).toFixed(2);
                    $('#LastPayment').html((acc.invoice.payments[0].amount!=null ? acc.invoice.currency_symbol+numberWithCommas(lastpay) : 'N/A'));

                    var accountBal = parseFloat(acc.invoice.balance).toFixed(2);
                    $('#AccountBal').html((acc.invoice.balance!=null ? acc.invoice.currency_symbol+numberWithCommas(acc.invoice.balance) : ' '));

                   	$('#LastPaid').html((acc.invoice.payments[0].date!=null ? formatZDate(acc.invoice.payments[0].date).replace(/\s/g, "") : 'N/A'));
                    $('#lastInv').html((acc.invoice.invoice_date!=null ? formatZDate(acc.invoice.invoice_date).replace(/\s/g, "") : 'N/A'));

                    //Show Contact Info
                    var con = data.msg.data.subscription.customer;
                    $('#sfname').text(con.first_name);
                    $('#slname').text(con.last_name);
                    $('#semail').text(con.email);
                    $('#phone').text(data.msg.data.subscription.contactpersons[0].phone);
                    $('#saddress1').text(con.shipping_address.street);
                    $('#scountry').text(con.shipping_address.country);
                    $('#sstate').text(con.shipping_address.state);
                    $('#scity').text(con.shipping_address.city);
                    $('#spostalcode').text(con.shipping_address.zip);
					$('#orgname').text(con.company_name);
					$('#dname').text(con.display_name);

                    var bcon = data.msg.data.subscription.customer.billing_address;
                    
                    $('#fname').text(con.first_name);
                    $('#lname').text(con.last_name);
                    $('#email').text(con.email);
                    $('#address1').text(bcon.street);
                    $('#country').text(bcon.country);
                    $('#state').text(bcon.state);
                    $('#city').text(bcon.city);
                    $('#postalcode').text(bcon.zip);
					
					
				/**Subscription details starts**/

					var subs = data.msg.data.subscription;
					
                    var html = "<div class='panel-body new-panel table-responsive'><table class='table table-hover table-responsive' width='100%' style='color:#333  !important;'>";
					
                    html += "<thead><tr><th width='5%'></th><th width='20%'>Product Name</th><th width='30%'>Description</th><th width='15%'>Quantity</th><th width ='20%'>Addon Name</th><th width ='15%'>Addon Quantity</th></tr></thead><tbody>"
					
					
                    //for(var i in subs.plan){

                        var rp = subs.plan;
                        if(rp.quantity == null)
                            rp.quantity = " - ";
                        else
                            rp.quantity = numberWithCommas(rp.quantity);

                        html += "<tr><td width='5%'></td><td width='20%'>"+subs.product_name+"</td><td width='30%'>"+rp.name+"</td><td width='15%'>"+rp.quantity+"</td><td width='20%'>"+subs.addons[0].name+"</td><td width='15%'>"+subs.addons[0].quantity+"</td></tr><tr></tr>";

						//}
						html += "</tbody></table></div>";
						
						html += "</tbody></table></div>";
						$('.subscription-summary-table').html(html);
						$('.subscription-summary-table').append("<input type='hidden' value='"+subs.subscription_id+"' id='sub_id'/>");
						
						$("#sub-date").append(formatZDate(subs.current_term_starts_at).replace(/\s/g, ""));
					
					$("#sub-num").append(subs.subscription_id);
				
				/**Subscription details ends**/
				
				/**Payment Method details starts**/
				
				var pay_html = "";
                    var ps = data.msg.data.subscription.card;
                    
                        //For each payment method, print out
                        
                            pay_html+="<div class='col-xs-12 col-sm-4 col-md-3 pay-method-item'><div class='panel panel-b' style='background-color: rgb(250, 250, 250) ! important;'><div class='panel-heading new-panel-heading'><div class='panel-body new-panel'>";
                            pay_html+=" <div class='panel-title panel-text'><span></span>Card Authorized</div>";
                            pay_html+=" </div></div>";
                           // pay_html+="<div class='panel-body new-panel' style='color:#333  !important;'><span><b><span class='fa fa-credit-card'></span>Visa</b></span><br>";
                            pay_html+="            Last four digits: <span class='card_masked_number'>"+ps.last_four_digits+"</span><br>";
                            pay_html+="            Exp: <span class='card_expiration_month'>"+ps.expiry_month+"</span>/<span class='card_expiration_year'>"+ps.expiry_year+"</span><br>";
                            //pay_html+="<span>"+pm.CardHolderName+"</span><br>";
                            /* if(pm.isDefault==false){
                                pay_html+="        <div class='panel-footer new-panel-footer' style='background-color:#323949 !important;'><a href='javascript:' id='pm_update_"+pm.Id+"' class='btn_submit item_button btn_make_default' style='font-size:14px;color: #fff !important;'>Make Default</a>";
                                pay_html+="        <a href='javascript:' id='pm_remove_"+pm.Id+"' class='btn_submit item_button btn_remove_default' style='font-size:14px;float:right;color: #fff !important'>Remove</a></td></div>";
                            } else {
                                pay_html+=" <div class='panel-footer new-panel-footer' style='background-color:#323949 !important; color:#fff !important;'><span>*</span>";
                                pay_html += "<span style='font-size:14px;'> Default Payment Method</span></div>";
                            } */
                            pay_html+="</div></div></div>";
                       

                    

                    $('#paymentmethod-summary-table').html(pay_html);
				
				/**Payment Method details ends**/
				
				/**Invoice History details starts **/
				
				var bills = data.msg.data.invoice;
                    var invoice_html = "";
                   
                       
                        invoice_html+= "<tr class='border_bottom_dashed'>";
                        invoice_html += "<td style='width:5%'><a href=javascript:viewPdf('"+bills.invoice_id+"'); ><img class = 'image-size' src='images/pdf.jpg' style='width: 40%;'></a></td>";
                        invoice_html += "<td>"+bills.number+"</td>";
                        invoice_html += "<td>"+formatZDate(bills.invoice_date).replace(/\s/g, "")+"</td>";
                        invoice_html += "<td>"+formatZDate(bills.due_date).replace(/\s/g, "")+"</td>";
                        invoice_html += "<td>"+acc.invoice.currency_symbol+formatMoney(bills.payments[0].amount,
										$('#formatting_values').data('decimal-places'),
										$('#formatting_values').data('thousands-separator'), //removed thousand separator
										$('#formatting_values').data('decimal-separator'),
										''//$('#formatting_values').data('currency-symbol')
										)+"</td>";
                        invoice_html += "<td>"+acc.invoice.currency_symbol+formatMoney(bills.tax_total,
										$('#formatting_values').data('decimal-places'),
										$('#formatting_values').data('thousands-separator'), //removed thousand separator
										$('#formatting_values').data('decimal-separator'),
										''//$('#formatting_values').data('currency-symbol')
										)+"</td>";
										
                        invoice_html += "<td>"+acc.invoice.currency_symbol+formatMoney(Number(bills.payments[0].amount-bills.payment_made),
										$('#formatting_values').data('decimal-places'),
										$('#formatting_values').data('thousands-separator'), // removed thousand separator
										$('#formatting_values').data('decimal-separator'),
										''//$('#formatting_values').data('currency-symbol')
										)+"</td>";
                        invoice_html += "<td>"+bills.status+"</td>";
                        invoice_html += "</tr>";
                    $(".invoice_history").addClass("hidden");
                    $('.invoice-history-table').append(invoice_html);
					
				/**Invoice History details ends **/
				
            }
        );
	}
	
	function viewPdf(id){

        window.open('backend/getPDF.php?id='+id);

    }
	var emptyCart = function(){
		$.getJSON("backend/index.php?type=EmptyCart",
		function(data){
				//setTimeout(function(){ refreshCart(data.msg); },100);
				//PreviewCurrentCart();

		});
	};

</script>

<!--<footer class="footer">  </footer>-->



</body>
</html>
