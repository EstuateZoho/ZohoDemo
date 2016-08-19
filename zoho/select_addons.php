
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Select Addons</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/structure.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>

</head>

<body>
<header class="header">  </header>
<center id="standard-steps" style="margin-top: 7%;">
	<div>
		<ul id="progressbar">
			<li class="active">Base Products</li>
			<li id="stepAddons" class="active">Add-ons</li>
			<li id="stepContacts">Contact Information</li>
			<li id="stepIframe">Check Out</li>
			<li id="stepSubmit">Submit</li>
		</ul>
	</div>
</center>
<!-- start Header -->
<div class="container page-wrap col-xs-12 col-sm-10 col-md-10 col-md-offset-1 col-sm-offset-1" id="main-div" style="min-height: 700px; position: relative; margin-top: 2%;">
    <!-- Start Standard Progress Bar -->

<!-- End Standard Progress Bar -->
	<div class="col-xs-12 col-sm-12 col-md-8">
	<div id="list-of-products" class="well">
	 <div class="list-products">

	 </div>
	 </div>
	</div>
	
	<div class="col-xs-12 col-sm-6 col-md-4">
			  <!-- Begin Chosen Plans Panel -->
    		  <div class="panel panel-default">
				<div class="panel-heading">
				  <h3 class="panel-title"><span class="fa fa-shopping-cart"></span> Chosen Plans</h3>
				</div>
				<div class="panel-body">
				  <ul class="chosen-plans">
					<!-- Chosen plans will populate here -->
				  </ul>
				  <div class="preview-amount">
					  <div id="loading_amount" class="loading hidden" role="alert"  style="margin-left: 40%;"> <img src="images/ellipsis.gif" style="width: 25%;"/> </div>
					<div class="display_field subtotal_display"></div>
					<div class="display_field discount_display"></div>
					<div class="display_field tax_display"></div>
					<div class="display_field total_display"></div>
				</div>
				  <button id="remove_all_button" class="btn btn-sm prospect-color"><span class="fa fa-trash-o"></span> Remove All</button>
          <a id="back_btn" href="selectProducts.php" class="btn btn-sm prospect-color"><span class="fa fa-arrow-left"></span> Back</a>
				  
          <a id="add_on_btn" href="contactInformation.php" role="button" class="btn btn-sm prospect-color">Next <span class="fa fa-arrow-right"></span></a>
		  
				</div>
			  </div> <!-- End Chosen Plans Panel -->
			  
    		</div> <!-- End Right Side Column -->
</div><!-- stickey footer end / start footer -->

<script type="text/javascript" src='js/jquery.min.js'></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/simple-bootstrap-paginator.js"></script>
<script type="text/javascript" src="js/blockUI.js"></script>
<script type="text/javascript" src="js/function.js"></script>
<script src="js/handlebars-v2.0.0.js"></script>
<script src="js/moment.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".header").load("header.html"); 
		loading();
		getInitialCart();
		
		$(document).on('click', ".add-btn", function(event) {
		 	event.preventDefault();
			var $this = $(this);
			var chargeAndQty = $this.closest("form").serializeArray();
			var rpToAdd = $this.data('rp-id');
			AddItemToCart(rpToAdd, chargeAndQty);
			}); 	
				
		$("#remove_all_button").on('click', function(){
			$('.total_display').hide();
			$('.subtotal_display').hide();
			$('.discount_display').hide();
			$('.tax_display').hide();
			emptyCart();
		});
			
	});
	
	function AddItemToCart(rpToAdd,chargeAndQty){
		for(var i in chargeAndQty){
			if ($.isNumeric(chargeAndQty[i].value) == false) {
				chargeAndQty[i].value = "1";
			}
		}
		$("#loading_amount").removeClass("hidden");
		var item_type = "Addon";
		$.getJSON("backend/index.php?type=AddItemToCart", {ratePlanId:rpToAdd, quantity:chargeAndQty,addon_code:'',item_type:item_type},
			function(data){
				if(!data.success) {
					addError(data.msg);
				}
			else{
					refreshCart(data.msg);
					$("#loading_amount").addClass("hidden");
				}
			}
		);	
	}
	
	var refreshCart = function(msg){
            var html = "";
			var count = msg[0].cart_items.length;

			if(count){ 
				$("#apply-coupon").removeAttr("disabled");
				$("#next").removeAttr("disabled");
			}
                    
                for(var i in msg[0].cart_items){
                     var citem = msg[0].cart_items[i];
					 var pdt_type ;
					if(citem.isPlan){
						pdt_type = "plan";
					}else if(citem.isAddon){
						pdt_type = "addon";
					}else{
						pdt_type = "coupon";
					}

					html+="<li class='list-group-item'>";
					html+="  <div class='rateplan_info'>";
					html+="    <button class='btn btn-xs prospect-color btn-remove pull-right' id='remove_item_"+citem.itemId+"' data-type='"+pdt_type+"'> <span class='fa fa-times'></span> </button>";
					
					var pdt_name ;
					if(citem.isCoupon){
						pdt_name = "Coupon";
					}else{
						pdt_name = citem.ProductName;
					}
					
					html+="    <span class='h6'>"+pdt_name+": "+citem.ratePlanName+"</span><br>";
					html+="    <div>";
					html+="  <div><small><span class='fa fa-angle-double-right'></span>  "+citem.ratePlanName;
					if (citem.quantity > -1 && citem.quantity != null && citem.uom){
						html+= " ("+citem.quantity+" x "+citem.uom+")";
					} else if (citem.uom) {
						html+= " ("+citem.uom+")";
					}
					html+="  </small></div>";
						
					html+="    </div>";
					html+="  </div>";
					html+="  <div class='clear-block'></div>";
					html+="</li>";

                }
				$(".load_cart").addClass("hidden");
                $(".chosen-plans").html(html);
				
				$(".btn-remove").on('click', function(event){
					var buttonId = $(this).attr('id');
					var remove_pdt = $(this).data('type');
					removeFromCart(buttonId,remove_pdt);
				});
            };
			
		var removeFromCart = function(buttonId,remove_pdt){
			var itemId = parseInt(buttonId.split('remove_item_')[1]);
			if(remove_pdt == "plan"){
				$('.total_display').hide();
				$('.subtotal_display').hide();
				$('.discount_display').hide();
				$('.tax_display').hide();
				emptyCart();
			}else{
				$.getJSON("backend/index.php?type=RemoveItemFromCart", {itemId:itemId},
					function(data){
					
						$('.total_display').hide();
						$('.subtotal_display').hide();
						$('.discount_display').hide();
						$('.tax_display').hide();
						
						if(!data.success) {
							addError(data.msg);
						}
						else {
							refreshCart(data.msg);
						}
					}
				);
			}
			
		};
		
	var getInitialCart = function(){
            $.getJSON("backend/index.php?type=GetInitialCart",
            function(data){
                if(!data.success) {	
                    addError(data.msg); 
                }else{ 
					refreshCart(data.msg); 
					var cart_addons = data.msg[0].cart_items;
					$.each(cart_addons,function(j,cart_addon){
						if(cart_addon.AddonCode){
							getAddons(cart_addon.AddonCode);						
						}
					});
                }
            });
        };
		
	var emptyCart = function(){
		$.getJSON("backend/index.php?type=EmptyCart",
		function(data){
				setTimeout(function(){ refreshCart(data.msg); },100);
				location.href = "selectProducts.php";
		});
	};
	
	function getAddons(AddonCode){
		$.getJSON("backend/index.php?type=Getaddons",{addonCode:AddonCode},
			function(data){
				
					$(".load_coupon").addClass("hidden");
					if(!data.success) {	
									alert("failed plans");
								}
								else{
									var val = data.msg.addon;									
									var html='';
									if(val != null){
										html +="<div id='products-listing'>"; 
										 //console.log(addons);
										//$.each(addons,function(i,val){  
										html +="<div id='product_"+val.product_id+"' class='panel panel-default base-prod prod-panel'>"; 
										html += "<div class='panel-heading'>";
										html += "<div class='pull-right'>";
										html += "<a aria-controls='collapseProdGroup_"+val.product_id+"' aria-expanded='false' href='#collapseProdGroup_"+val.product_id+"' data-toggle='collapse' id='"+val.product_id+"' class='btn btn-primary prospect-color plan-expander' role='button'>";
										html += "<span class='fa fa-list'></span> View Plans";
										html += "</a>";
										html += "</div>";
										html += "<h4>";
										html += "<span class='panel-title'>";
										html += "<a aria-controls='collapseProdGroup_"+val.product_id+"' aria-expanded='false' href='#collapseProdGroup_"+val.product_id+"' data-toggle='collapse' class='expander-link h4 prod-name' role='button'>";
										html += val.name;
										html += "</a>";
										html += "</span>";
										html += "</h4>";
										html += "</div>";
										html +="<div class='panel-body'>";
										html +="<div class='panel panel-default'>";
										html +="<div class='panel-body'>";
										html +="<div class='container-fluid'>";
										html +="<div class='row'>";
										html +="<div class='col-md-2 hidden-xs hidden-sm'>";
										html +="<img alt='Tiny Rover Personal Assistant' src='./images/prod_image.png' class='prod-image'>";
										html +="</div>";
										html +="<div class='col-md-10'>";
										html +="<h5>";
										html +="<span>Description: </span>";
										html +=val.description;
										html +="</h5>";
										html +="</div>";
										html +="</div>";
										html +="</div>"; <!-- End of product description container -->
										html +="</div>";
										html +="</div>";
										html +="<div aria-labelledby='collapseProdListHeading_"+val.product_id+"' role='tabpanel' class='panel-collapse collapse product-plans-section' id='collapseProdGroup_"+val.product_id+"'>";
										html +="<div role='tablist' class='panel-group'>";
																				
												
													html +="<form id='rp_"+val.product_id+"'>";
													html +="<div class='panel panel-default'>";
													  html +="<div id='collapsePlanListHeading_"+val.product_id+"' role='tab' class='panel-heading'>";
														html +="<button data-rp-id='"+val.addon_code+"' class='btn btn-xs prospect-color add-btn pull-right'  style='margin-left: 2%'><span class='fa fa-plus'></span> Add Plan</button>";
														html +="<h4 class='panel-title'>";
														  html +="<a aria-controls='collapseRPGroup_"+val.product_id+"' aria-expanded='false' href='#collapseRPGroup_"+val.product_id+"' data-toggle='collapse'>";
															html +=val.name;
														  html +="</a>";
														  html +="<a aria-controls='collapseRPGroup_"+val.product_id+"' aria-expanded='false' href='#collapseRPGroup_"+val.product_id+"' data-toggle='collapse' class='btn btn-xs btn-default' role='button' style='float:right;'>";
															  html +="<span class='fa fa-list'></span> View Charges";
														  html +="</a>";
														html +="</h4>";
													  html +="</div>";
													  html +="<div aria-labelledby='collapsePlanListHeading_"+val.product_id+"' role='tabpanel' class='panel-collapse collapse' id='collapseRPGroup_"+val.product_id+"'>";
														html +="<ul class='list-group'>";
														  <!-- Begin get charge loop -->
														  html +="<li class='list-group-item'>";
															html +="<span>"+val.description+"</span>";
															html +="<div>";
																html +="Quantity : ";
																  html +="<input type='number' placeholder='# of Each' name='"+val.product_id+"' style='width: 25%; display:inline;'>";
																	html +="</div>";
																	<!-- if it isn't tiered just show the price -->
																	html +="<span>Price : "+val.price_brackets[0].price+" / "+val.pricing_scheme+"</span>";
																	 <!-- end of checking if isTiered charge -->
																	 <!-- end of checking currency -->
																	 <!-- End of the charge tier loop -->
														  html +="</li>";
														   <!-- End get charge loop -->
														html +="</ul>";
													  html +="</div>";
													html +="</div>"; <!-- End of rate plan panel -->
												  html +="</form>";													
											
												
											
										html +="</div></div></div></div>";
										
										//});
										
										html += "</div>";
							
										$('.list-products').append(html);
										$.unblockUI();
									}else{
										location.reload();
									}
									
								}
					
				
			}
		);
	}
	
	function loading(){
		$.blockUI({ 
			message: '<img src="images/loading.gif" />',	
			overlayCSS: { backgroundColor: '#000' },
			css: { 
				border: '2px', 
				padding: '15px', 
				backgroundColor: '#fff',
				'-webkit-border-radius': '15px', 
				//'-moz-border-radius': '15px',
				'border-radius': '15px',
				opacity: .9, 
			} 
		});
	}
	
</script>
</body>
</html>