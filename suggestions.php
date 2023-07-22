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
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="panel panel-info" style="margin-top:20px; margin-bottom:25px">
            <div class="panel-heading text-center"><strong>Suggestions / Enquiry</strong></div>
            <div class="panel-body">
              <form class="form-horizontal">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Full Name</label>
                  <div class="col-md-1" style="padding-top:5px">:</div>
                  <div class="col-sm-7">
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Full Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Phone No</label>
                  <div class="col-md-1" style="padding-top:5px">:</div>
                  <div class="col-sm-7">
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Phone No">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Email-id</label>
                  <div class="col-md-1" style="padding-top:5px">:</div>
                  <div class="col-sm-7">
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email-id">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-md-4 control-label">Enquiry</label>
                  <div class="col-md-1" style="padding-top:5px">:</div>
                  <div class="col-md-7">
                    <textarea class="form-control" placeholder="Enquiry" rows="2"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-5 col-sm-7">
                    <button type="button" class="btn btn-info">Submit</button>
                    <button type="reset" class="btn btn-info">Reset</button>
                  </div>
                </div>
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
