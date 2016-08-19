<html >
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact Information</title>

	<link rel="stylesheet" href="css/style.css">
	<!--link rel="stylesheet" href="css/main.css"-->
	<link rel="stylesheet" href="css/flags.css">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>

</head>

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
<script type="text/javascript" src="js/blockUI.js"></script>
<body>
<header class="header">  </header>
<script type="text/javascript">
	$(document).ready(function(){
		$(".header").load("./header.html");
		createSubscription();
	});
	function createSubscription(){
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
			$.ajax({
		   url: "backend/index.php?type=SubscribeWithCurrentCart",
		   async:false,
		   dataType: 'json',
		   cache: false,
		   success: function(data) {
				var hpmURL = data.msg.hostedpage.url;
				$.redirect('checkout.php', {'url': hpmURL});    
			if(!data.success) {
			 //addError(data.msg);
			}
			else {
				  
			}
		   }         
		  });
		}
		$.unblockUI();
</script>
</body>