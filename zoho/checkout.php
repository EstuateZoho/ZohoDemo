<?php ?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Check out Page</title>
	<link rel="stylesheet" href="css/structure.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>

</head>

<body>
<header class="header">  </header>
<center id="standard-steps" style="margin-top: 7%;">
	<div>
		<ul id="progressbar">
			<li class="active">Base Products</li>
			<li id="stepAddons" class="active">Add-ons</li>
			<li id="stepContacts" class="active">Contact Information</li>
			<li id="stepIframe" class="active">Check Out</li>
			<li id="stepSubmit">Submit</li>
		</ul>
	</div>
</center>
<!-- start Header -->
<div class="container page-wrap col-xs-12 col-sm-10 col-md-10 col-md-offset-1 col-sm-offset-1" id="main-div" style="min-height: 700px; position: relative; margin-top: 2%;">
            <div class="row mnWrp"><section id="header-title">
    <div class="container">
        <div class="row animated fadeInUpBig">
            <div class="col-sm-12">
                <h2 class="white">
                   Check <span style="color:#d36028">Out</span>
                </h2>
            </div>
        </div>
    </div>
</section><iframe src="<?php echo stripslashes($_REQUEST['url']);?>" width="100%" height = "500px" style="border:none"></iframe>
    
        </div>
    </div><!-- stickey footer end / start footer -->

<script type="text/javascript" src='js/jquery.min.js'></script>

<script type="text/javascript" src="js/simple-bootstrap-paginator.js"></script>


<script type="text/javascript">
$(document).ready(function(){
    $(".header").load("header.html"); 
});
</script>

<footer class="footer">  </footer>

</body>
</html>