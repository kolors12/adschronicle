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
					 $sfor = 'BrideGroom'; 
				  } else if($_GET['searchby']=='bridegroom'){
					 $sfor = 'Bride'; 
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

<!-- Verify -->
<div class="modal fade" id="verify" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Get Verify</h4>
      </div>
      <div class="modal-body">
        <p>Please enter Mobile Number.</p>
		<div class="input-group">
		  <input type="text" class="form-control" placeholder="Enter Mobile Number" aria-describedby="basic-addon2">
		  <span class="input-group-addon btn btn-success"><a href="" style="color:white;" data-toggle="modal" data-target="#thanq" data-dismiss="modal">Verify</a></span>
		</div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="verify1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Get Verify</h4>
      </div>
      <div class="modal-body">
        <p>Sent a verification code to your mobile, please enter here.</p>
		<div class="input-group">
		  <input type="text" class="form-control" placeholder="Enter Verification Code" aria-describedby="basic-addon2">
		  <span class="input-group-addon btn btn-success"><a href="" style="color:white;" data-toggle="modal" data-target="#thanq" data-dismiss="modal">Verify</a></span>
		</div>
      </div>
    </div>
  </div>
</div>

<!-- ThankYou -->
<div class="modal fade" id="thanq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body" align="center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3>Thank You for Verifying</h3>
		<button type="button" class="btn btn-warning col-sm-4 col-sm-offset-4" data-dismiss="modal">Ok</button>
		<div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

    <div class="container shadow"  style="background-color:#fff">
      <header>
        <?php include("header.php") ?>
        <div class="row" style="background-color:#01ADED; padding:5px 0px">
          <div class="col-md-12"> <a class="btn btn-danger" href="index.php" role="button">Back to Home Page</a>
          </div>
        </div>
      </header>
      <div class="row" style="padding:10px 0px 30px 0px;">
        <div class="col-md-12" style="background-image:url(images/bg-b.jpg); margin-bottom:30px">
          <div style="font-size:16px; color:#fff; font-weight:bold; padding:10px" align="center">Mobile Verification</div>
        </div>
        <form method="post" action="verify.php">
          <div class="col-md-9">
            <input type="text" name="mobile" class="form-control" placeholder="Enter Your Mobile Number" onKeyPress="return checkIt(this.value);" required maxlength="10">
             
          </div>
         
         
          <div class="col-md-3">
            <input type="hidden" name="txtMstatus" value="<?php echo $_POST['txtMstatus']; ?>" />
            <input type="hidden" name="txtSect" value="<?php echo $_POST['txtSect']; ?>" />
            <input type="hidden" name="txtReligion" value="<?php echo $_POST['txtReligion']; ?>" />
            <input type="hidden" name="searchby" value="<?php echo $_POST['searchby']; ?>" />
            <button type="submit" class="btn btn-info col-xs-12">Search</button>
            <!--button type="submit" name="search" value="Search" class="btn btn-info col-xs-12">Search</button-->
          </div>
        </form>
        <div class="clearfix"></div>
        <div class="col-md-12" style="margin-top:20px">
		 <?php if(($serth->rowCount() > 0) && ($_GET['search']=='Search') ){
			 foreach($serth as $lrow){
			 $mth = $db->query("SELECT * FROM  `matrimonial_ads` WHERE `status`='Active' AND `txtCity` LIKE '%".$_COOKIE['areaname']."%' AND `txtLocality` = '".$lrow[0]."'  $srr ORDER BY `guid` DESC");
			if($mth->rowCount() > 0){
			 ?>
          <div class="panel panel-default">
            <div class="panel-heading"><?php echo ucfirst($lrow[0])?></div>
            <div class="panel-body">
			 <?php foreach($mth as $row){ ?>
              <div class="row" style="border:1px #eee solid; margin:5px">
                <div class="col-md-2" align="center">
                  <img src="adminupload/<?php echo $row['image1']?>" style="height:100px; width:100%; padding:3px" alt=""/> 
                  <p><strong><?php echo $row['productid']?></strong></p>
                </div>
                <div class="col-md-9">
                  <div style="padding-top:30px">
                    <p class="pull-left"><?php echo $row['txtName'] ?> | <?php echo $row['txtAge'] ?> | <?php echo $row['txtHeight']?> | <?php echo $row['txtComplexion']?> | <?php echo $row['txtQualification']?> | <?php echo $row['txtReligion']?> | <?php echo $row['txtFOccupation'] ?></p>
                    <p class="pull-right"><a href="biodata.php?profile=<?php echo $row['pid']?>">Biodata/More Details</a></p>
                    <div class="clearfix"></div>
                    <div style="border-bottom:1px #ddd solid;  margin-bottom:5px"></div>
                    <div class="clearfix"></div>
                    <p class="pull-left"><?php echo $row['txtFather']?> | <?php echo $row['txtAddress'] ?> | <?php echo $row['txtMobile']?> | <?php echo $row['txtAMobile']?></p>
                  </div>
                </div>
                <div class="col-md-1" align="center">
                </div>
              </div>
			<?php } ?>
            </div>
           </div>
			<?php } } } ?>
        </div>
      </div>
      <div class="clearfix"></div>
      <?php include("footer.php") ?>
    </div>
    <script src="js/bootstrap.min.js"></script> 
    <!-- Modal -->
    <script>
      $(document).ready(function(){ 
       $("#add_form").validate({
           errorClass:'cls'
        });
       });
      
      function checkIt(evt) {
      evt = (evt) ? evt : window.event
      var charCode = (evt.which) ? evt.which : evt.keyCode
      if(charCode > 31 && (charCode < 46 || charCode > 57)) {
          status = "This field accepts numbers only."
          return false
      } else if(charCode==47) {
          status = "This field accepts numbers only."
          return false
      }
      status = ""
      return true
      }
      $('#txtReligion').change(function(){
      var id= $(this).val();
      if(id!=''){
              $.ajax({
      		  type:"post",
      		  url:"ajaxReq.php",
      		  data:"cid="+id+"&action=fetchsect",
      		  success:function(response){
      			$('#txtSect').html(response);
      			return true;
      		  }
      	   });
          }
      });
    </script> 
  </body>
</html>