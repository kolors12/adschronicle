<?php ob_start();error_reporting(0);
 require("cw_admin/lib/config.php");
extract($_GET);
extract($_POST);
 if(isset($_POST) && $_POST['Submit']=='Submit'){

$stremail = "adschronicle.com@gmail.com";						  
$to = $stremail;    
$subject = "Advertise details of $business";    
$message = " 
<html> 
<body>
   <table style='border: 2px solid #06F;padding:10px;border-radius:10px;'>
	  <tr>
		  <td width='500'>
			  <div class='maindiv'>
				 
				 <p>Hi, Advertise details are,</p>
				 <p>Business    : ".ucfirst($business)."</p>
                                 <p>Name        : $name </p>
				 <p>Message     : $message </p>
				 <p>Phone No 	: $mobile </p>
				
			  </div>
		  </td>
	  </tr>
  </table>
</body>
</html>";

$headers .= "From: adschronicle.com<no-reply@adschronicle.com>\r\n"; 			
$headers .= "Content-type: text/html\r\n";	
//echo $message;exit;		
if(mail($to, $subject, $message, $headers)){
	
	echo "<script>alert('Thank you, Our incharge will contact you soon');window.location='advetise.php';</script>";

	} else {
	
	echo "<script>alert('Sorry...please try again');window.location='advetise.php';</script>";
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
        <div class="col-md-12">
          <div class="" style="background-color:#01ADED; padding:10px; margin-bottom:25px; color:#FFF" align="center"> <strong>Maximise your profit. Advertise with Adschronicle.com</strong> </div>
        </div>
        <div class="col-md-6"> <img src="images/incresa.jpg" class="img-responsive"  alt=""/> <br>
          <p style="font-size:16px"> <strong>Grow your Business with AdsChronicle.com </strong>
            </h4>
          
          <h4>
          <strong>To advertise, call 040 6661 6544</strong>
          </p>
        </div>
        <div class="col-md-6">
          <p style="font-size:16px"><strong>Call 040 6661 6544 or fill this form</strong></p>
          <div class="panel panel-info" style="margin-top:20px; margin-bottom:25px">
            <div class="panel-heading text-center"><strong>Multiply your Business</strong></div>
            <div class="panel-body">
              <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                  <input type="text" name="business" placeholder="Business Name" class="form-control" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status" required>
                </div>
                <br>
                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input type="text" name="name" placeholder="Full Name" class="form-control" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status" required>
                </div>
                <br>
                <!--div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                  <select class="form-control" name="city" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status">
                    <option value="">Select City</option>
                    <option>Hyderabad</option>
                    <option>Vijayawada</option>
                    <option>Vizag</option>
                  </select>
                </div-->
 <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                  <textarea placeholder="Message" name="message" class="form-control" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status"></textarea>
                </div>
                <br>
                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                  <input type="text" name="mobile" placeholder="Mobile No" class="form-control" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status" required>
                </div>
                <br>
                <button type="submit" name="Submit" value="Submit" class="btn btn-info">Submit</button>
              </form>
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
