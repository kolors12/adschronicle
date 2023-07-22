<?php ob_start();
  error_reporting(0);
  require("cw_admin/lib/config.php");
  extract($_GET);
  if(isset($_GET) && $_GET['search']=='Search'){
              //unset($_GET['search']);
  			$srr='';
              $ser.="search=Search&";
              if(!empty($_GET['txtReligion'])){
                  $srr.= "txtReligion LIKE '%".$_GET['txtReligion']."%' AND ";
                  $ser.="txtReligion=".$_GET['txtReligion']."&";
              }
              if(!empty($_GET['txtSect'])){
                  $srr.= "txtSect LIKE '%".$_GET['txtSect']."%' AND ";
                  $ser.="txtSect=".$_GET['txtSect']."&";
              }
              if(!empty($_GET['txtMstatus'])){
                  $srr.= "txtMstatus LIKE '%".$_GET['txtMstatus']."%' AND ";
                  $ser.="txtMstatus=".$_GET['txtMstatus']."&";
              }
              if(!empty($_GET['searchby'])){
				  if($_GET['searchby']=='bride'){
					 $sfor = 'Bride'; 
				  } else if($_GET['searchby']=='bridegroom'){
					 $sfor = 'BrideGroom'; 
				  }
                  $srr.= "searchfor = '".$sfor."' AND ";
                  $ser.="searchby=".$_GET['searchby']."&";
              }
              $srr;
              $ser;
              if(!empty($srr)){
                  $srr = "AND ".substr($srr,0,-4);
              }
              if(!empty($ser)){
                  $ser = substr($ser,0,-1);
              }
  			$srr;
  		  $ser;
               
   }     
//echo "SELECT DISTINCT(txtLocality) FROM  `matrimonial_ads` WHERE `status`='Active' AND `txtCity` LIKE '%".$_COOKIE['areaname']."%' $srr ORDER BY `guid` DESC"; exit;   
   	    $serth = $db->query("SELECT DISTINCT(txtLocality) FROM  `matrimonial_ads` WHERE `status`='Active' AND `txtCity` LIKE '%".$_COOKIE['areaname']."%' $srr ORDER BY `guid` DESC");

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
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBB6gMPN9KHDVnReTQIqAuV3Hfa5U_zvYs&sensor=false">
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
          <div style="font-size:16px; color:#fff; font-weight:bold; padding:10px" align="center">Contact us</div>
        </div>
        <div class="col-md-12">
          <div class="row" style="padding-top:20px">
            <div class="col-md-4 col-sm-12" style="line-height:1.9">
              <address>
              <p><strong>Address</strong></p>
              <p><em><strong>AdsChronicle.com</strong></em></p>
              <p>#10-3-12/6/D,<br> Mehdipatnam X Roads,<br>
                Hyderabad-500 028, Telangana, India.</p>
              <p><strong>Telephone No 1:</strong> 040 6661 6544</p>
              <p><strong>Telephone No 2:</strong> 040 6677 2410</p>
              <p><strong>Email-id:</strong> admin@adschronicle.com<br>
              </p>
              </address>
            </div>
            <div class="col-md-4 col-sm-12"> <img src="images/contactus.jpg" width="387" height="277" class="img-responsive image1" alt=""> </div>
            <div class="col-md-4 col-sm-12">
              <form class="form-horizontal" role="form" method="post" action="sug.php" enctype="multipart/form-data">
                <div>
                  <p><strong>Quick Enquiry</strong></p>
                </div>
                <div class="form-group">
                  <div class="col-sm-6">
                    <input type="text" name="fname" required class="form-control" id="inputEmail3" placeholder="Name">
                  </div>
                  <div class="col-sm-6">
                    <input type="name" class="form-control" name="phone" required id="inputEmail3" placeholder="Phone">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <input type="email" name="email" required class="form-control" id="inputEmail3" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <textarea class="form-control" name="msg" required rows="2" placeholder="Message"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <button type="submit" name="submit" value="submit" class="btn btn-info">Submit</button>
                    <button type="reset" class="btn btn-info">Reset</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
           <div class="col-md-12" style="padding-top:10px">
          <!--<div id="googleMap" style="width:100%;height:300px;"></div>-->
             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3807.2654478741856!2d78.4447181148765!3d17.39904418807159!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb97173a7f02ff%3A0x5555dd254b2f0b09!2sMehdipatnam%20-%20Banjara%20Hills%20Rd%2C%20Hyderabad%2C%20Telangana!5e0!3m2!1sen!2sin!4v1616761631988!5m2!1sen!2sin" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          <br>
        </div>
          <div class="row">
          
          <div class="col-md-12">
          <h5 style="color:#F30;"><strong>List of Authorized Advertising Agencies/Resellers:</strong></h5>
          </div>
          <div class="col-md-12">
          <div style="background-color:#eee; padding:10px; margin-bottom:5px">
        <p><strong>CMS Computer Institute</strong></p>
        <p>Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.</p>
      </div>
      </div>
      <div class="col-md-12">
          <div style="background-color:#eee; padding:10px; margin-bottom:5px">
        <p><strong>CMS Computer Institute</strong></p>
        <p>Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.</p>
      </div>
      </div>
      <div class="col-md-12">
          <div style="background-color:#eee; padding:10px; margin-bottom:5px">
        <p><strong>CMS Computer Institute</strong></p>
        <p>Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.</p>
      </div>
      </div>
      <div class="col-md-12">
          <div style="background-color:#eee; padding:10px; margin-bottom:5px">
        <p><strong>CMS Computer Institute</strong></p>
        <p>Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.</p>
      </div>
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
