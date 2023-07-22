<?php include('Crypto.php')?>

<?php ob_start(); error_reporting(0);

  require("cw_admin/lib/config.php");

  extract($_GET);

extract($_POST);



$date = date('Y-m-d');







	$workingKey='168FBF2AAE666C557B0485C9A700D754';		//Working Key should be provided here.

	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server

	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.

	$order_status="";

	$decryptValues=explode('&', $rcvdString);

	$dataSize=sizeof($decryptValues);

	echo "<center>";



	for($i = 0; $i < $dataSize; $i++) 

	{

		$information=explode('=',$decryptValues[$i]);

				

		if($i==0)	$orderid=$information[1];



		if($i==1)	$trackingid=$information[1];

		if($i==2)	$bank_ref=$information[1];

	    if($i==3)	$order_status=$information[1];

	   	if($i==8)	$statusmsg=$information[1];



	}







	if($order_status==="Success")

	{

	    $message =	"Thank you for advertising with us. Your credit card has been charged and your transaction is successful.";

	    

	    if($_POST[adtype]=='CLASSIFIED TEXT AD'){ 



	$sth = $db->query("UPDATE `adds_requests` SET `trackingid`='$trackingid',`bank_ref`='$bank_ref',`order_status`='$order_status',`statusmsg`='$statusmsg' WHERE `guid`='$orderid'");

 }



else if($_POST[adtype]=='CATEGORY AD'){ 

   

    	$sth = $db->query("UPDATE `add_services` SET `trackingid`='$trackingid',`bank_ref`='$bank_ref',`order_status`='$order_status',`statusmsg`='$statusmsg' WHERE `guid`='$orderid'");

}





else if($_POST[adtype]=='MATRIMONIAL AD'){ 

    

    

     	$sth = $db->query("UPDATE `matrimonial_ads` SET `trackingid`='$trackingid',`bank_ref`='$bank_ref',`order_status`='$order_status',`statusmsg`='$statusmsg' WHERE `guid`='$orderid'");

}









else if($_POST[adtype]=='JOB SEEKER AD'){ 

    

    

    	$sth = $db->query("UPDATE `jobseeker_ads` SET `trackingid`='$trackingid',`bank_ref`='$bank_ref',`order_status`='$order_status',`statusmsg`='$statusmsg' WHERE `guid`='$orderid'");

    

    

}

	

         

		

	}

	else if($order_status==="Aborted")

	{

		

		

		$message =	"Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";

		

		if($_POST[adtype]=='CLASSIFIED TEXT AD'){ 



	$sth = $db->query("UPDATE `adds_requests` SET `trackingid`='$trackingid',`bank_ref`='$bank_ref',`order_status`='$order_status',`statusmsg`='$statusmsg' WHERE `guid`='$orderid'");

 }



else if($_POST[adtype]=='CATEGORY AD'){ 

   

    	$sth = $db->query("UPDATE `add_services` SET `trackingid`='$trackingid',`bank_ref`='$bank_ref',`order_status`='$order_status',`statusmsg`='$statusmsg' WHERE `guid`='$orderid'");

}





else if($_POST[adtype]=='MATRIMONIAL AD'){ 

    

    

     	$sth = $db->query("UPDATE `matrimonial_ads` SET `trackingid`='$trackingid',`bank_ref`='$bank_ref',`order_status`='$order_status',`statusmsg`='$statusmsg' WHERE `guid`='$orderid'");

}









else if($_POST[adtype]=='JOB SEEKER AD'){ 

    

    

    	$sth = $db->query("UPDATE `jobseeker_ads` SET `trackingid`='$trackingid',`bank_ref`='$bank_ref',`order_status`='$order_status',`statusmsg`='$statusmsg' WHERE `guid`='$orderid'");

    

    

}

	

	}

	else if($order_status==="Failure")

	{

	

		$message =	"Thank you for shopping with us.However,the transaction has been declined.";

		

		if($_POST[adtype]=='CLASSIFIED TEXT AD'){ 



	$sth = $db->query("UPDATE `adds_requests` SET `trackingid`='$trackingid',`bank_ref`='$bank_ref',`order_status`='$order_status',`statusmsg`='$statusmsg' WHERE `guid`='$orderid'");

 }



else if($_POST[adtype]=='CATEGORY AD'){ 

   

    	$sth = $db->query("UPDATE `add_services` SET `trackingid`='$trackingid',`bank_ref`='$bank_ref',`order_status`='$order_status',`statusmsg`='$statusmsg' WHERE `guid`='$orderid'");

}





else if($_POST[adtype]=='MATRIMONIAL AD'){ 

    

    

     	$sth = $db->query("UPDATE `matrimonial_ads` SET `trackingid`='$trackingid',`bank_ref`='$bank_ref',`order_status`='$order_status',`statusmsg`='$statusmsg' WHERE `guid`='$orderid'");

}









else if($_POST[adtype]=='JOB SEEKER AD'){ 

    

    

    	$sth = $db->query("UPDATE `jobseeker_ads` SET `trackingid`='$trackingid',`bank_ref`='$bank_ref',`order_status`='$order_status',`statusmsg`='$statusmsg' WHERE `guid`='$orderid'");

    

    

}

	}

	else

	{

		

			$message =	"Security Error. Illegal access detected";

		

		if($_POST[adtype]=='CLASSIFIED TEXT AD'){ 



	$sth = $db->query("UPDATE `adds_requests` SET `trackingid`='$trackingid',`bank_ref`='$bank_ref',`order_status`='$order_status',`statusmsg`='$statusmsg' WHERE `guid`='$orderid'");

 }



else if($_POST[adtype]=='CATEGORY AD'){ 

   

    	$sth = $db->query("UPDATE `add_services` SET `trackingid`='$trackingid',`bank_ref`='$bank_ref',`order_status`='$order_status',`statusmsg`='$statusmsg' WHERE `guid`='$orderid'");

}





else if($_POST[adtype]=='MATRIMONIAL AD'){ 

    

    

     	$sth = $db->query("UPDATE `matrimonial_ads` SET `trackingid`='$trackingid',`bank_ref`='$bank_ref',`order_status`='$order_status',`statusmsg`='$statusmsg' WHERE `guid`='$orderid'");

}









else if($_POST[adtype]=='JOB SEEKER AD'){ 

    

    

    	$sth = $db->query("UPDATE `jobseeker_ads` SET `trackingid`='$trackingid',`bank_ref`='$bank_ref',`order_status`='$order_status',`statusmsg`='$statusmsg' WHERE `guid`='$orderid'");

    

    

}

	

	}









  ?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<title>Ads Chronicle&reg;</title>



<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="css/bootstrap.min.css">

<link rel="stylesheet" href="css/my_style.css">

<!-- Optional theme -->

<link rel="stylesheet" href="css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->



<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>

<script src="js/crawler.js" type="text/javascript"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

<!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->



<script

src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2rMfPiDjqqTlOlBHiqSCGu3Iti_N0T-g&sensor=false">

</script>

<script>

var myCenter=new google.maps.LatLng(17.394255, 78.442606);

var marker;



function initialize()

{

var mapProp = {

  center:myCenter,

  zoom:16,

  mapTypeId:google.maps.MapTypeId.ROADMAP

  };



var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);



marker=new google.maps.Marker({

  position:myCenter,

  animation:google.maps.Animation.BOUNCE

  });



marker.setMap(map);

}



google.maps.event.addDomListener(window, 'load', initialize);

</script>



</head>



<body style="background-color:#eee">

<div class="container shadow"  style="background-color:#fff">

  <header>

    <?php include("header.php") ?>

    <div class="row" style="background-color:#01ADED; padding:5px 0px">

      <div class="col-md-12"> <a class="btn btn-danger" href="index.php" role="button">Back to Home Page</a> </div>

    </div>

  </header>

  <div class="row" style="padding:10px 0px 0px 0px;">

    <div class="col-md-12">

      <div class="row">

        <div class="col-md-12" style="background-image:url(images/bg-b.jpg); margin-bottom:10px">

          <div style="font-size:16px; color:#fff; font-weight:bold; padding:10px" align="center">Thank You</div>

        </div>

        <div class="col-md-12">

          <div class="row" style="padding-top:20px">

            

            

            <div class="col-md-12 col-sm-12 text-center">

                <img src="images/tick.png">

               <h2 style="color:#37b649;">  <?php echo $message;?>, AdsChronicle.com</h2>

               <h4>Your Tracking ID : <?php echo $trackingid;?> (Placed on <?php echo date('d M Y',strtotime($date));?>)</h4>

               <!--p>Name : Vamsi Krishna</p>

               <p>Adddress : Hyderabad, Telanagana.</p>

               <p>Phone :  99876543210</p-->

               <p>Thank you<br> 

For all order-related queries : admin@adschronicle.com</p>

              <br><br><br>

            </div>

          </div>

          

          

        </div>

       

      </div>

    </div>

    <div class="clearfix"></div>

  </div>

  <?php include("footer.php") ?>

</div>

<script src="js/bootstrap.min.js"></script> 

<!-- Modal -->



</body>

</html>

