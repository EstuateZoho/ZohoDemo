<?php

?>
<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact Information</title>

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/flags.css">
	<link rel="stylesheet" href="css/structure.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>

</head>
<style>
label.error {
color:red;
}
input.error {
border:1px solid red;
}
</style>
<body>
<header class="header">  </header>
<center id="standard-steps" style="margin-top: 7%;">
	<div>
		<ul id="progressbar">
			<li class="active">Base Products</li>
			<li id="stepAddons" class="active">Add-ons</li>
			<li id="stepContacts" class="active">Contact Information</li>
			<li id="stepIframe">Check Out</li>
			<li id="stepSubmit">Submit</li>
		</ul>
	</div>
</center>
<div class="container page-wrap col-xs-12 col-sm-10 col-md-10 col-md-offset-1 col-sm-offset-1" id="main-div" style="min-height: 1300px; position: relative; margin-top: 2%;">

			<div class="col-sm-12">
				<h2>
					Contact <span style="color:#d36028">Information</span>
				</h2>
				<div class="form-group">
			<label for="org_name" class="control-label col-sm-12 col-md-6"><span style="color:red;font-weight:bold;font-size:20px;"> * </span>&nbsp; = &nbsp; Required Field</label>
		</div>
			</div>
		

<form class="form-horizontal panel" id="ContactInfo" action="backend/storeContact.php" method="post">

	<section id="" class="panel-body cform">
	<div class="col-xs-12 col-sm-6 col-md-6">
		<div class="form-group" style="margin-top: 8%">
			<label for="org_name" class="control-label col-sm-12 col-md-4">Organization Name <span style="color:red;font-weight:bold;"> * </span></label>
			<div class="col-sm-12 col-md-6">
				 <input type="text" class="form-control" name="org_name" id="org_name" required="" data-rule-required="true" data-msg-required="Required"/>
			</div>
		</div>
		<div class="form-group" style="margin-top: 8%">
			<label class="control-label col-sm-12 col-md-4" for="bill_to_display_name">Display Name <span style="color:red;font-weight:bold;"> * </span></label>
			<div class="col-sm-12 col-md-6"><span style="color:red;font-weight:bold;" id="bill_to_display_name-span"></span>
				<input type="text" id='bill_to_display_name' name='bill_to_display_name' class="form-control" data-rule-required="true" data-msg-required="Required"/>
			</div>
		</div>
		<div class="form-group" style="margin-top: 8%">
			<label class="control-label col-sm-12 col-md-4" for="bill_to_first_name">First Name <span style="color:red;font-weight:bold;"> * </span></label>
			<div class="col-sm-12 col-md-6"><span style="color:red;font-weight:bold;" id="bill_to_first_name-span"></span>
				<input type="text" id='bill_to_first_name' name='bill_to_first_name' class="form-control" data-rule-required="true" data-msg-required="Required"/>
			</div>
		</div>
		
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6">
		
		<div class="form-group" style="margin-top: 8%">
			<label class="control-label col-sm-12 col-md-4" for="bill_to_last_name">Last Name <span style="color:red;font-weight:bold;"> * </span></label>
			<div class="col-sm-12 col-md-6"><span style="color:red;font-weight:bold;" id="bill_to_last_name-span"></span>
				<input type="text" id='bill_to_last_name' name='bill_to_last_name' class="form-control" data-rule-required="true" data-msg-required="Required"/>
			</div>
		</div>
		<div class="form-group" style="margin-top: 8%">
			<label class="control-label col-sm-12 col-md-4" for="bill_to_email" >Email <span style="color:red;font-weight:bold;"> * </span></label>
			<div class="col-sm-12 col-md-6"><span style="color:red;font-weight:bold;" id="bill_to_email-span"></span>
				<input type="text"required id='bill_to_email' name='bill_to_email' class="form-control" data-rule-required="true" data-msg-required="Required" data-msg-email="Please enter a valid email address" data-rule-email="true"/>
			</div>
		</div>
		<div class="form-group" style="margin-top: 8%">
				<label class="control-label col-sm-12 col-md-4" for="bill_to_pnum">Phone # <span style="color:red;font-weight:bold;"> * </span></label>
				<div class="col-sm-12 col-md-6"><span style="color:red;font-weight:bold;" id="bill_to_pnum-span"></span>
					<input type="text" id='bill_to_pnum' name='bill_to_pnum' class="form-control"  data-rule-required="true" data-msg-required="Required"/>
				</div>
		</div>
		
	</div>
		</section>

	<section id="" class="panel-body cform">

	<div id="billto">
		<div class="container">
			<h4>Billing Address</h4>
		</div>


		<div class="col-xs-12 col-sm-6 col-md-6">
			
			
			<div class="form-group" style="margin-top: 8%">
				<label class="control-label col-sm-12 col-md-4" for="bill_to_add_one">Address 1 <span style="color:red;font-weight:bold;"> * </span></label>
				<div class="col-sm-12 col-md-6"><span style="color:red;font-weight:bold;" id="bill_to_add_one-span"></span>
					<input type="text" id="bill_to_add_one" name='bill_to_add_one' class="form-control address-input" data-rule-required="true" data-msg-required="Required"/>
				</div>
			</div>
			<div class="form-group" style="margin-top: 8%">
				<label class="control-label col-sm-12 col-md-4" for="bill_to_add_two">Address 2</label>
				<div class="col-sm-12 col-md-6">
					<input type="text" id="bill_to_add_two" name='bill_to_add_two' class="form-control address-input" />
				</div>
			</div>

			<div class="form-group" style="margin-top: 8%">
				<label class="control-label col-sm-12 col-md-4" for="bill_to_city">City <span style="color:red;font-weight:bold;"> * </span></label>
				<div class="col-sm-12 col-md-6"><span style="color:red;font-weight:bold;" id="bill_to_city-span"></span>
					<input type='text' id="bill_to_city" name='bill_to_city' class="form-control address-input" data-rule-required="true" data-msg-required="Required" />
				</div>
			</div>

		</div>
		<div class="col-xs-12 col-sm-6 col-md-6">
		
			<div class="form-group" style="margin-top: 8%">
				<label class="control-label col-sm-12 col-md-4" for="bill_to_country">Country <span style="color:red;font-weight:bold;"> * </span></label>

				<div class="col-sm-12 col-md-6"><span style="color:red;font-weight:bold;" id="bill_to_country-span"></span>
					<select id="bill_to_country" name="bill_to_country" class="form-control address-input" onchange="prepareState('bill_to_country')" data-rule-required="true" data-msg-required="Required">

					</select>
				</div>
				<span class="loading alert alert-warning bill_country"><span class="fa fa-spinner fa-spin"></span></span>
			</div>
			
			<div class="form-group" style="margin-top: 8%">
				<label class="control-label col-sm-12 col-md-4" for="bill_to_stateD">State <span style="color:red;font-weight:bold;"> * </span></label>
				<div class="col-sm-12 col-md-6"><span style="color:red;font-weight:bold;" id="bill_to_state-span"></span>

					<select id="bill_to_stateD" name="bill_to_stateD" class="form-control address-input" style="display:none;" data-rule-required="true" data-msg-required="Required">

					</select>
					<input type="text" name="bill_to_stateT" id="bill_to_stateT" class="form-control address-input" data-rule-required="true" data-msg-required="Required" />

				</div>
			</div>
		

			<div class="form-group" style="margin-top: 8%">
				<label class="control-label col-sm-12 col-md-4" for="bill_to_pcode">Postal Code <span style="color:red;font-weight:bold;"> * </span></label>
				<div class="col-sm-12 col-md-6"><span style="color:red;font-weight:bold;" id="bill_to_pcode-span"></span>
					<input type='text' id="bill_to_pcode" name='bill_to_pcode' class="form-control address-input" data-rule-required="true" data-msg-required="Required"/>
				</div>
			</div>

		</div>
	</div>
</section>



	<section id="" class="panel-body cform">
		<div class="container">
			<h4>Shipping Address</h4>
		</div>

		<section id="" class="panel-body cform">

			<div id="checkbillsold">
				<div class="container">
					<h5><input type='checkbox' class='itemcheck' name='billtosold' id='billtosold' style='display: inline; position: absolute;' ><span style="color: red; margin-left: 2%;">&nbsp;Same as Billing Address</span></h5>
				</div>
			</div>
		</section>

	<div id="soldto" >

		<div class="col-xs-12 col-sm-6 col-md-6">

		

			<div class="form-group" style="margin-top: 8%">
				<label class="control-label col-sm-12 col-md-4" for="sold_to_add_one">Address 1 <span style="color:red;font-weight:bold;"> * </span></label>
				<div class="col-sm-12 col-md-6"><span style="color:red;font-weight:bold;" id="sold_to_add_one-span"></span>
					<input type="text" id="sold_to_add_one" name='sold_to_add_one' class="form-control address-input" data-rule-required="true" data-msg-required="Required"/>
				</div>
			</div>
			<div class="form-group" style="margin-top: 8%">
				<label class="control-label col-sm-12 col-md-4" for="sold_to_add_two">Address 2</label>
				<div class="col-sm-12 col-md-6">
					<input type="text" id="sold_to_add_two" name='sold_to_add_two' class="form-control address-input" />
				</div>
			</div>
			<div class="form-group" style="margin-top: 8%">
				<label class="control-label col-sm-12 col-md-4" for="sold_to_city">City <span style="color:red;font-weight:bold;"> * </span></label>
				<div class="col-sm-12 col-md-6"><span style="color:red;font-weight:bold;" id="sold_to_city-span"></span>
					<input type='text' id="sold_to_city" name='sold_to_city' class="form-control address-input" data-rule-required="true" data-msg-required="Required"/>
				</div>
			</div>

		</div>
		<div class="col-xs-12 col-sm-6 col-md-6">
			
				
			<div class="form-group" style="margin-top: 8%">
				<label class="control-label col-sm-12 col-md-4" for="sold_to_country">Country <span style="color:red;font-weight:bold;"> * </span></label>

				<div class="col-sm-12 col-md-6"><span style="color:red;font-weight:bold;" id="sold_to_country-span"></span>
					<select id="sold_to_country" name="sold_to_country" class="form-control address-input" onchange="prepareState('sold_to_country')" data-rule-required="true" data-msg-required="Required">

					</select>
				</div>
				<span class="loading alert alert-warning sold_country"><span class="fa fa-spinner fa-spin"></span></span>
			</div>
			<div class="form-group" style="margin-top: 8%">
				<label class="control-label col-sm-12 col-md-4" for="sold_to_stateD">State <span style="color:red;font-weight:bold;"> * </span></label>
				<div class="col-sm-12 col-md-6"><span style="color:red;font-weight:bold;" id="sold_to_state-span"></span>

					<select id="sold_to_stateD" name="sold_to_stateD" class="form-control address-input" style="display:none;" data-rule-required="true" data-msg-required="Required">

					</select>
					<input type="text" name="sold_to_stateT" id="sold_to_stateT" class="form-control address-input" data-rule-required="true" data-msg-required="Required" />

				</div>
			</div>

			<div class="form-group" style="margin-top: 8%">
				<label class="control-label col-sm-12 col-md-4" for="sold_to_pcode">Postal Code <span style="color:red;font-weight:bold;"> * </span></label>
				<div class="col-sm-12 col-md-6"><span style="color:red;font-weight:bold;" id="sold_to_pcode-span"></span>
					<input type='text' id="sold_to_pcode" name="sold_to_pcode" class="form-control address-input" data-rule-required="true" data-msg-required="Required"/>
				</div>
			</div>
			
		</div>

	</div>
</section>

<div class="container">
	<button type="button" class="btn btn-primary go_back" style="float:left;">Back</button>

	<button type="submit" name="submit" class="btn btn-primary next-btn right" style="float:right;">Next</button>

</div>
</form>

</div>
<script type="text/javascript" src='js/jquery.min.js'></script>
<script type="text/javascript"  src="js/index.js"></script>
<script type="text/javascript"  src="js/manager.js"></script>
<script type="text/javascript"  src="js/intlTelInput.min.js"></script>
<script type="text/javascript"  src="js/utils.js"></script>
<script src='js/jquery.redirect.js'></script>
<script type="text/javascript"  src="js/validation.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/function.js"></script>
<script type="text/javascript" src="js/simple-bootstrap-paginator.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$(".header").load("header.html");
		getSessionparameters();

		getInitialCart();

		readCountry();

		$('input[name=bill_to_pnum]').intlTelInput({
			utilsScript: "js/utils.js"
		});
		$('input[name=sold_to_pnum]').intlTelInput({
			utilsScript: "js/utils.js"
		});
		$("#ContactInfo").validate();
				
	});

	function readCountry(){
		//Load the country drop down list
		$.getJSON("backend/index.php?type=ReadCountry",
			function(data){
				if(data.success){
					var countries = data.msg;
					var container = $("#bill_to_country")[0];
					container.options[0] = new Option('\u2014 Select One \u2014', '');
					$i = 1;
					$.each(countries, function(k, v){

						container.options[$i] = new Option(v, k);
						$i++;
					});

					var container = $("#sold_to_country")[0];
					container.options[0] = new Option('\u2014 Select One \u2014', '');
					$j = 1;
					$.each(countries, function(k, v){
						container.options[$j] = new Option(v, k);
						$j++;
					});
					
				}
				$(".bill_country").removeClass('hidden');
				$(".sold_country").removeClass('hidden');
				getSessionCountry();
			}
		);
	}

	$(document).on('click', ".next-btn", function(event) {
		if($("#billtosold").is(':checked')){
		
			var bill_to_add_one = $('#bill_to_add_one').val();
			var bill_to_add_two = $('#bill_to_add_two').val();
			var bill_to_country = $('#bill_to_country').val();

			var bill_to_state = $('#bill_to_stateD').val();
			if(!bill_to_state){
				bill_to_state = $('#bill_to_stateT').val();
			}
			
			var bill_to_city = $('#bill_to_city').val();
			var bill_to_pcode = $('#bill_to_pcode').val();
		
			$('#sold_to_add_one').attr("value",bill_to_add_one);
			$('#sold_to_add_two').attr("value",bill_to_add_two);
			$('#sold_to_country').attr("value",bill_to_country);
			$("#sold_to_country option[value='"+bill_to_country+"']").attr("selected","selected");

			$('#sold_to_state').attr("value",bill_to_state);
			$('#sold_to_city').attr("value",bill_to_city);
			$('#sold_to_pcode').attr("value",bill_to_pcode);
			
			var b = $('#sold_to_pcode').val();
		
			if(bill_to_country == "U.S.A" || bill_to_country == "Canada")
			{
				//prepare drop down box for states
				$.ajax({
					type:"POST",
					url: "backend/index.php?type=GetISOStateCode",
					data:{countryName: bill_to_country,
						stateName: bill_to_state} ,
					success: function(data){

						data = JSON.parse(data);
						if(data.success){
							prepareState('sold_to_country', function() {
								setSateDropDown("sold_to_state", data.msg[0]);
								
							});
						}
					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						console.log("Status: " + textStatus);
					}
				});
			} else {
				divA = document.getElementById('sold_to_stateD');
				divB = document.getElementById('sold_to_stateT');
				divB.value = bill_to_state;
				divB.style.display = 'inline';
				divA.style.display = 'none';
			}

		}
		
		var valid =  validations();
		
		if(valid != false){
			
			$( "#ContactInfo" ).submit();
			
			window.location.href('intermediate.php');
			
		}else{
			//alert("failed");
		}
		
	});

	var getInitialCart = function(){
		$.getJSON("backend/index.php?type=GetInitialCart",
			function(data){
				if(!data.success) {
					addError(data.msg);
				}else{
					var count = data.msg[0].cart_items.length;
					$(".badge").text(count);
				}
			});
	};



	$(document).on('click', ".go_back", function(event) {
		location.href= "select_addons.php";
	});

	function getSessionparameters(){

		var org_name = sessionStorage.getItem('org_name');

		var sold_to_add_one = sessionStorage.getItem('sold_to_add_one');
		var sold_to_add_two = sessionStorage.getItem('sold_to_add_two');
		var sold_to_country = sessionStorage.getItem('sold_to_country');
		var sold_to_state = sessionStorage.getItem('sold_to_state');
		var sold_to_city = sessionStorage.getItem('sold_to_city');
		var sold_to_pcode = sessionStorage.getItem('sold_to_pcode');

		var bill_to_email = sessionStorage.getItem('bill_to_email');
		var bill_to_display_name = sessionStorage.getItem('bill_to_display_name');
		var bill_to_first_name = sessionStorage.getItem('bill_to_first_name');
		var bill_to_last_name = sessionStorage.getItem('bill_to_last_name');
		var bill_to_pnum = sessionStorage.getItem('bill_to_pnum');
		var bill_to_add_one = sessionStorage.getItem('bill_to_add_one');
		var bill_to_add_two = sessionStorage.getItem('bill_to_add_two');
		var bill_to_country = sessionStorage.getItem('bill_to_country');

		var bill_to_state = sessionStorage.getItem('bill_to_state');
		var bill_to_city = sessionStorage.getItem('bill_to_city');
		var bill_to_pcode = sessionStorage.getItem('bill_to_pcode');
		
		$('#bill_to_pnum').attr("placeholder",bill_to_pnum);

		$('#org_name').attr("value",org_name);

		$('#sold_to_add_one').attr("value",sold_to_add_one);
		$('#sold_to_add_two').attr("value",sold_to_add_two);
		$('#sold_to_country').attr("value",sold_to_country);
		$("#sold_to_country option[value='"+sold_to_country+"']").attr("selected","selected");

		$('#sold_to_city').attr("value",sold_to_city);
		$('#sold_to_pcode').attr("value",sold_to_pcode);

		$("#bill_to_email").attr("value",bill_to_email);

		$('#bill_to_display_name').attr("value",bill_to_display_name);
		$('#bill_to_first_name').attr("value",bill_to_first_name);
		$('#bill_to_last_name').attr("value",bill_to_last_name);
		$('#bill_to_pnum').attr("value",bill_to_pnum);
		$('#bill_to_add_one').attr("value",bill_to_add_one);
		$('#bill_to_add_two').attr("value",bill_to_add_two);
		$('#bill_to_country').attr("value",bill_to_country);

		$("#bill_to_country option[value='"+bill_to_country+"']").attr("selected","selected");

		$('#bill_to_city').attr("value",bill_to_city);
		$('#bill_to_pcode').attr("value",bill_to_pcode);

		
		if(bill_to_country == "U.S.A" || bill_to_country == "Canada")
		{
			//prepare drop down box for states
			$.ajax({
				type:"POST",
				url: "backend/index.php?type=GetISOStateCode",
				data:{countryName: bill_to_country,
					stateName: bill_to_state} ,
				success: function(data){

					data = JSON.parse(data);
					if(data.success){
						prepareState('bill_to_country', function() {
							setSateDropDown("bill_to_state", data.msg[0]);
						});
					}
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					console.log("Status: " + textStatus);
				}
			});
		} else {
			divA = document.getElementById('bill_to_stateD');
			divB = document.getElementById('bill_to_stateT');
			divB.value = bill_to_state;
			divB.style.display = 'inline';
			divA.style.display = 'none';
		}

		if(sold_to_country == "U.S.A" || sold_to_country == "Canada")
		{

			//prepare drop down box for states
			$.ajax({
				type:"POST",
				url: "backend/index.php?type=GetISOStateCode",
				data:{countryName: sold_to_country,
					stateName: sold_to_state} ,
				success: function(data){

					data = JSON.parse(data);
					if(data.success){
						prepareState('sold_to_country', function() {
							setSateDropDown("sold_to_state", data.msg[0]);
						});
					}
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					console.log("Status: " + textStatus);
				}
			});
		} else {
			divA = document.getElementById('sold_to_stateD');
			divB = document.getElementById('sold_to_stateT');
			divB.value = sold_to_state;
			divB.style.display = 'inline';
			divA.style.display = 'none';
		}
		
	}

	function getSessionCountry(){

		var sold_to_country = sessionStorage.getItem('sold_to_country');
		var sold_to_state = sessionStorage.getItem('sold_to_state');

		var bill_to_country = sessionStorage.getItem('bill_to_country');
		var bill_to_state = sessionStorage.getItem('bill_to_state');

		$('#sold_to_country').attr("value",sold_to_country);
		$("#sold_to_country option[value='"+sold_to_country+"']").attr("selected","selected");

		$('#sold_to_state').attr("value",sold_to_state);

		$('#bill_to_country').attr("value",bill_to_country);
		$("#bill_to_country option[value='"+bill_to_country+"']").attr("selected","selected");
		$('#bill_to_state').attr("value",bill_to_state);

		if(bill_to_country == "U.S.A" || bill_to_country == "Canada")
		{
			//prepare drop down box for states
			$.ajax({
				type:"POST",
				url: "backend/index.php?type=GetISOStateCode",
				data:{countryName: bill_to_country,
					stateName: bill_to_state} ,
				success: function(data){

					data = JSON.parse(data);
					if(data.success){
						prepareState('bill_to_country', function() {
							setSateDropDown("bill_to_state", data.msg[0]);
						});
					}
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					console.log("Status: " + textStatus);
				}
			});
		} else {
			divA = document.getElementById('bill_to_stateD');
			divB = document.getElementById('bill_to_stateT');
			divB.value = bill_to_state;
			divB.style.display = 'inline';
			divA.style.display = 'none';
		}

		if(sold_to_country == "U.S.A" || sold_to_country == "Canada")
		{

			//prepare drop down box for states
			$.ajax({
				type:"POST",
				url: "backend/index.php?type=GetISOStateCode",
				data:{countryName: sold_to_country,
					stateName: sold_to_state} ,
				success: function(data){

					data = JSON.parse(data);
					if(data.success){
						prepareState('sold_to_country', function() {
							setSateDropDown("sold_to_state", data.msg[0]);
						});
					}
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					console.log("Status: " + textStatus);
				}
			});
		} else {
			divA = document.getElementById('sold_to_stateD');
			divB = document.getElementById('sold_to_stateT');
			divB.value = bill_to_state;
			divB.style.display = 'inline';
			divA.style.display = 'none';
		}

		$(".bill_country").addClass('hidden');
		$(".sold_country").addClass('hidden');

	}
	function IsEmail(val){
		var x = val;
		var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (filter.test(x)) return true;
		else return false;
	}

</script>

<footer class="footer">  </footer>



</body>
</html>