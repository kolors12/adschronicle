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
    <div class="col-md-12" style="background-image:url(images/bg-b.jpg); margin-bottom:10px">
      <div style="font-size:16px; color:#fff; font-weight:bold; padding:10px" align="center">About us</div>
    </div>
    <div class="col-md-12">
      <div style="line-height:1.8; margin-bottom:15px; margin-top:15px" align="justify">
        <p><strong>ELITE FOCUS,</strong> since its establishment in 2002 has been into various services like RegisterForjob.com, Elite Technologies, Infonet Computers (India). On popular public demand to get reliable information about businesses available in their city/locality, AdsChronicle.com is launched.</p>
        <p>ith the advent of Note books, Smart phones and other digital devices, consumers want info about  the businesses in all category handy whenever and wherever in-need.</p>
        <p> Considering this AdsChronicle.com has a vision to bring every business (Products and services) at one place and give 100% reliable and verified information as an advertisement rather than as a free classified ad.  In free classifieds we see how frustratingly misinformation, irrelevant or non-existing data is provided. AdsChronicle.com is an independent entity with no association with any of the news publications.</p>
        <p>AdsChronicle.com since its inception is ensuring that the data uploaded in the website is 100% accurate, approved with written verification so as to make sure that the information given to its users is highly reliable.</p>
        <p>Ads Chronicle is a Registered trade mark under clause 35 of IPR, Government of India and is owned by AdsChronicle.com since 13 years.</p>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
  <?php include("footer.php") ?>
</div>
<script src="js/bootstrap.min.js"></script> 
<!-- Modal -->
<div class="modal fade" id="myModalAD" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Upload your AD</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <form>
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" placeholder="Full Name" class="form-control" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status">
              </div>
              <br>
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                <input type="text" placeholder="Mobile No" class="form-control" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status">
              </div>
              <br>
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input type="text" placeholder="EMail-id" class="form-control" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status">
              </div>
              <br>
              <div class="form-group">
                <label for="exampleInputFile">File Upload:</label>
                <input type="file" id="exampleInputFile">
                <p class="help-block"><small>Upload Photos, Videos, Location Map, ect.,.</small></p>
              </div>
              <button type="submit" class="btn btn-info">Submit</button>
            </form>
          </div>
          <div class="col-md-6" align="right"> <img src="images/contact.jpg" style="padding-top:30px" class="img-responsive"  alt=""/> </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
