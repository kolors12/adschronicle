<?php ob_start(); error_reporting(0);
require("cw_admin/lib/config.php");
extract($_GET);
extract($_POST);
$crr = '';
if(!empty($_COOKIE['area'])){
    $crr = "AND a.cid='".$_COOKIE['area']."'";
}
$crr; 

//print_r($_POST);
 if($_GET[typeid]!=''){ 

 $row = $db->query("SELECT * FROM `adds_requests` WHERE `guid`='".$_GET[typeid]."' ")->fetch();  
}

else if($_GET[serviceid]!=''){ 
    $row = $db->query("SELECT * FROM `add_services` WHERE `guid`='".$_GET[serviceid]."' ")->fetch();  
}


else if($_GET[matrimonialid]!=''){ 
    $row = $db->query("SELECT * FROM `matrimonial_ads` WHERE `guid`='".$_GET[matrimonialid]."' ")->fetch();  
}




else if($_GET[adid]!=''){ 
    $row = $db->query("SELECT * FROM `jobseeker_ads` WHERE `guid`='".$_GET[adid]."' ")->fetch();  
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Advertisements improves Buisenesses</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<link rel="stylesheet" href="css/my_style.css">
<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
    $(".save-details").click(function(){
        var pid = $(this).data('id');
        $("#spid").val(pid);
        $("#myModalcontact").modal({
            backdrop: 'static',
            keyboard: false
        });
    });
    $(".send-sms").click(function(){
        var pid = $(this).data('id');
        $("#smpid").val(pid);
        $("#myModalSMS").modal({
            backdrop: 'static',
            keyboard: false
        });
    });

});
</script>
<script src="js/crawler.js" type="text/javascript"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style>
        /* COMMON PRICING STYLES */
		.panel.price,
		.panel.price>.panel-heading{
			border-radius:0px;
			 -moz-transition: all .3s ease;
			-o-transition:  all .3s ease;
			-webkit-transition:  all .3s ease;
		}
		.panel.price:hover{
			box-shadow: 0px 0px 30px rgba(0,0,0, .2);
		}
		.panel.price:hover>.panel-heading{
			box-shadow: 0px 0px 30px rgba(0,0,0, .2) inset;
		}
		
				
		.panel.price>.panel-heading{
			box-shadow: 0px 5px 0px rgba(50,50,50, .2) inset;
			text-shadow:0px 3px 0px rgba(50,50,50, .6);
		}
			
		.price .list-group-item{
			border-bottom-:1px solid rgba(250,250,250, .5);
		}
		
		.panel.price .list-group-item:last-child {
			border-bottom-right-radius: 0px;
			border-bottom-left-radius: 0px;
		}
		.panel.price .list-group-item:first-child {
			border-top-right-radius: 0px;
			border-top-left-radius: 0px;
		}
		
		.price .panel-footer {
			color: #fff;
			border-bottom:0px;
			background-color:  rgba(0,0,0, .1);
			box-shadow: 0px 3px 0px rgba(0,0,0, .3);
		}
		
		
		.panel.price .btn{
			box-shadow: 0 -1px 0px rgba(50,50,50, .2) inset;
			border:0px;
		}
		
	/* green panel */
	
		
		.price.panel-1>.panel-heading {
			color: #fff;
			background-color: #FF5939;
			border-color: #fff;
			border-bottom: 1px solid #FF5939;
		}
		
			
		.price.panel-1>.panel-body {
			color: #fff;
			background-color: #ff5939d9;
		}
				
		
		.price.panel-1>.panel-body .lead{
				text-shadow: 0px 3px 0px rgba(50,50,50, .3);
		}
		
		.price.panel-1 .list-group-item {
			color: #333;
			background-color: rgba(50,50,50, .01);
			font-weight:600;
			text-shadow: 0px 1px 0px rgba(250,250,250, .75);
		}
		.price.panel-1 .panel-footer .btn-danger {
			
			background-color:#FF5939;
			background-image: linear-gradient(to bottom,#ff5939 0,#ff5939 100%);
		
		}
		
		/* blue panel */
	
		
		.price.panel-2>.panel-heading {
			color: #fff;
			background-color: #CE3084;
			border-color: #fff;
			border-bottom: 1px solid #CE3084;
		}
		
			
		.price.panel-2>.panel-body {
			color: #fff;
			background-color: #ce3084d9;
		}
				
		
		.price.panel-2>.panel-body .lead{
				text-shadow: 0px 3px 0px rgba(50,50,50, .3);
		}
		
		.price.panel-2 .list-group-item {
			color: #333;
			background-color: rgba(50,50,50, .01);
			font-weight:600;
			text-shadow: 0px 1px 0px rgba(250,250,250, .75);
		}
		
		.price.panel-2 .panel-footer .btn-danger {
			
			background-color:#ce3084;
			background-image: linear-gradient(to bottom,#ce3084 0,#ce3084 100%);
		
		}
		/* red price */
		
	
		.price.panel-3>.panel-heading {
			color: #fff;
			background-color: #31C39C;
			border-color: #FF6062;
			border-bottom: 1px solid #31C39C;
		}
		
			
		.price.panel-3>.panel-body {
			color: #fff;
			background-color: #31c39cde;
		}
		
		
		
		
		.price.panel-3>.panel-body .lead{
				text-shadow: 0px 3px 0px rgba(50,50,50, .3);
		}
		
		.price.panel-3 .list-group-item {
			color: #333;
			background-color: rgba(50,50,50, .01);
			font-weight:600;
			text-shadow: 0px 1px 0px rgba(250,250,250, .75);
		}
		.price.panel-3 .panel-footer .btn-danger {
			
			background-color:#31c39c;
			background-image: linear-gradient(to bottom,#31c39c 0,#31c39c 100%);
		
		}
		
		/* grey price */
		
	
		.price.panel-4>.panel-heading {
			color: #fff;
			background-color: #6D6D6D;
			border-color: #B7B7B7;
			border-bottom: 1px solid #B7B7B7;
		}
		
			
		.price.panel-4>.panel-body {
			color: #fff;
			background-color: #808080;
		}
		

		
		.price.panel-4>.panel-body .lead{
				text-shadow: 0px 3px 0px rgba(50,50,50, .3);
		}
		
		.price.panel-4 .list-group-item {
			color: #333;
			background-color: rgba(50,50,50, .01);
			font-weight:600;
			text-shadow: 0px 1px 0px rgba(250,250,250, .75);
		}
		
		/* white price */
		
	
		.price.panel-5>.panel-heading {
			color: #333;
			background-color: #f9f9f9;
			border-color: #ccc;
			border-bottom: 1px solid #ccc;
			text-shadow: 0px 2px 0px rgba(250,250,250, .7);
		}
		
		.panel.panel-5.price:hover>.panel-heading{
			box-shadow: 0px 0px 30px rgba(0,0,0, .05) inset;
		}
			
		.price.panel-5>.panel-body {
			color: #fff;
			background-color: #dfdfdf;
		}
				
		.price.panel-5>.panel-body .lead{
				text-shadow: 0px 2px 0px rgba(250,250,250, .8);
				color:#666;
		}
		
		.price:hover.panel-5>.panel-body .lead{
				text-shadow: 0px 2px 0px rgba(250,250,250, .9);
				color:#333;
		}
		
		.price.panel-6 .list-group-item {
			color: #333;
			background-color: rgba(50,50,50, .01);
			font-weight:600;
			text-shadow: 0px 1px 0px rgba(250,250,250, .75);
		}
		
		
		
		
    </style>


</head>
<body style="background-color:#eee">
<div class="container shadow"  style="background-color:#fff">
<header>
<?php include("header.php") ?>
    <div class="row" style="background-color:#01ADED; padding:5px 0px">
      <div class="col-md-12"> <a class="btn btn-primary" href="index.php" role="button">Back to Home Page</a> </div>
    </div>
  </header>
  <div class="row" style="padding:10px 0px 0px 0px;">
    <div class="col-md-12" style="background-image:url(images/bg-b.jpg); margin-bottom:10px">
      <div style="font-size:16px; color:#fff; font-weight:bold; padding:10px" align="center">Select payment</div>
    </div>
    
    <div class="col-md-12" style="background-image:url(images/pkgbg.jpg);background-size:cover;">
        <br><br>
	<div class="row packages_block">
	    <?php
					$sth = $db->query ("SELECT * FROM `packages` WHERE add_type='$row[adtype]'");
					$n=1;	while($prow = $sth->fetch()) {
					?>
    			<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
	<form method="POST" name="customerData" action="payment.php">
					<!-- PRICE ITEM -->
				
					<div class="panel price panel-<?php echo $n;?>">
						<div class="panel-heading  text-center">
						<h3><?php echo $prow['pack_name']; ?></h3>
						</div>
						<div class="panel-body text-center">
							<p class="lead" style="font-size:40px"><strong>₹
<?php echo $prow['pack_price']; ?></strong></p>
						</div>
						<ul class="list-group list-group-flush text-center">
						
							<li class="list-group-item"><i class="icon-ok text-danger"></i> <?php echo $prow['pack_des']; ?> </li>
							<li class="list-group-item"><i class="icon-ok text-danger">
						</ul>
					<input type="hidden" name="amount" value="<?php echo $prow['pack_price']; ?>">
					<input type="hidden" name="adtype" value="<?php echo $row['adtype']; ?>">
				   <input type="hidden" name="guid" value="<?php echo $row['guid']; ?>">
				   <input type="hidden" name="tid" id='tid' value="">

				   <input type="hidden" name="package" value="<?php echo $prow['guid']; ?>">
				   <input type="hidden" name="packagename" value="<?php echo $prow['pack_name']; ?>">

						<div class="panel-footer">
							<button class="btn btn-lg btn-block btn-danger" type="submit">PAY NOW!</button>
						</div>
					</div>
					
					<!-- /PRICE ITEM -->
					
				</form>	
				</div>
				<?php $n++;} ?>
				<!--div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
					<form method="POST" name="customerData" action="payment.php">

					
					<div class="panel price panel-blue">
						<div class="panel-heading arrow_box text-center">
						<h3>Silver</h3>
						</div>
						<div class="panel-body text-center">
							<p class="lead" style="font-size:40px"><strong>₹
10 / 2months</strong></p>
						</div>
						<ul class="list-group list-group-flush text-center">
						
							<li class="list-group-item"><i class="icon-ok text-info"></i> 2 Months Validity</li>
							<li class="list-group-item"><i class="icon-ok text-info"></i> 27/7 support</li>
						</ul>
											<input type="hidden" name="amount" value="10">

						<div class="panel-footer">
							<button type="submit" class="btn btn-lg btn-block btn-info" href="#">BUY NOW!</button>
						</div>
					</div>
				
					</form>
					
				</div>
				
				<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
					<form method="POST" name="customerData" action="payment.php">

				
					<div class="panel price panel-green">
						<div class="panel-heading arrow_box text-center">
						<h3>Diamond</h3>
						</div>
						<div class="panel-body text-center">
							<p class="lead" style="font-size:40px"><strong>₹
20 / 3months</strong></p>
						</div>
						<ul class="list-group list-group-flush text-center">
						
							<li class="list-group-item"><i class="icon-ok text-success"></i> 3 Months Validity</li>
							<li class="list-group-item"><i class="icon-ok text-success"></i> 27/7 support</li>
						</ul>
						<input type="hidden" name="amount" value="20">

						<div class="panel-footer">
							<button type="submit" class="btn btn-lg btn-block btn-success" href="#">BUY NOW!</button>
						</div>
					</div>
				
					</form-->
					
				</div>
				
				<br>
				<br>
				<br>
				
				
			</div>
            
</div>
    
    <div class="clearfix"></div>
  </div>
<?php include("footer.php") ?>

</div>
<script src="js/bootstrap.min.js"></script> 
<!-- Modal -->
<script>
	window.onload = function() {
		var d = new Date().getTime();
		document.getElementById("tid").value = d;
	};
</script>

</body>
</html>