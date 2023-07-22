<?php ob_start();
error_reporting(0);
session_start();
require "cw_admin/lib/config.php";


if(isset($_POST) && $_POST['submit']=='submit')
      {
		  $filename = stripcslashes($_FILES['txtFile']['name']);
       if(!empty($filename)) {
    		$image = time()."_".$filename;
    		$img_path="adminupload/".$image;
    		move_uploaded_file($_FILES['txtFile']['tmp_name'], $img_path);
    	} else {
    		$image='';	
    	}
		//echo  "INSERT INTO  `franchise_data` (txtFullname, txtFile, txtOfficeAddress, txtPhoneno, txtMobile, txtEmail, txtQualification, txtPassingYear, txtBusinesExp, txtBusinessNature, txtBusinessActivity, txtPremiseshave, txtPremisesNature, txtPremisesArea, txtNeedTime, txtExecutivesNumber, txtExpectMonthly, txtInvestMonthly, date) VALUES ('".$_POST['txtFullname']."','".$_POST['txtFile']."','".$_POST['txtOfficeAddress']."','".$_POST['txtPhoneno']."','".$_POST['txtMobile']."','".$_POST['txtEmail']."','".$_POST['txtQualification']."','".$_POST['txtPassingYear']."','".$_POST['txtBusinesExp']."','".$_POST['txtBusinessNature']."','".$_POST['txtBusinessActivity']."','".$_POST['txtPremiseshave']."','".$_POST['txtPremisesNature']."','".$_POST['txtPremisesArea']."','".$_POST['txtNeedTime']."','".$_POST['txtExecutivesNumber']."','".$_POST['txtExpectMonthly']."','".$_POST['txtInvestMonthly']."','$date')"; exit;
	
		$i=$db->query("INSERT INTO  `franchise_data` (txtFullname, txtFile, txtOfficeAddress, txtPhoneno, txtMobile, txtEmail, txtQualification, txtPassingYear, txtBusinesExp, txtBusinessNature, txtBusinessActivity, txtPremiseshave, txtPremisesNature, txtPremisesArea, txtNeedTime, txtExecutivesNumber, txtExpectMonthly, txtInvestMonthly, date) VALUES ('".$_POST['txtFullname']."','".$_POST['txtFile']."','".$_POST['txtOfficeAddress']."','".$_POST['txtPhoneno']."','".$_POST['txtMobile']."','".$_POST['txtEmail']."','".$_POST['txtQualification']."','".$_POST['txtPassingYear']."','".$_POST['txtBusinesExp']."','".$_POST['txtBusinessNature']."','".$_POST['txtBusinessActivity']."','".$_POST['txtPremiseshave']."','".$_POST['txtPremisesNature']."','".$_POST['txtPremisesArea']."','".$_POST['txtNeedTime']."','".$_POST['txtExecutivesNumber']."','".$_POST['txtExpectMonthly']."','".$_POST['txtInvestMonthly']."','$date')");
      //echo $i;
	  
   if ($i==true)
	  {?>
		<script>alert("Thank You for registation"); window.location="franchisees.php";</script>
	  <?php 
	  }
		 else
      {
     
      ?>
      <script>alert("Please try again"); window.location="franchisees.php";</script>
      <?php 
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




<!-- Verify -->
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
		  <span class="input-group-addon btn btn-success"><a href="" style="color:white;" data-toggle="modal" data-target="#thanq1" data-dismiss="modal">Verify</a></span>
		</div>
      </div>
    </div>
  </div>
</div>

<!-- ThankYou -->
<div class="modal fade" id="thanq1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body" align="center">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3>Your application submitted successfully</h3>
		<p>Thank You for Joining with Us</p>
		<button type="button" class="btn btn-warning col-sm-4 col-sm-offset-4" data-dismiss="modal">Ok</button>
		<div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>



<div class="container shadow"  style="background-color:#fff">
  <header>
    <div class="row" style="padding:5px 0px 5px 0px">
      <div class="col-md-3 hidden-xs" align="center"> <a href="index.php"><img src="images/logo.png" class="img-responsive cen" style="padding-bottom:10px; padding-top:5px"  alt=""/></a> </div>
      <div class="col-xs-12 hidden-lg hidden-md hidden-sm" align="center"> <a href="index.php"><img src="images/smalllogo.png" class="img-responsive cen" style="padding-bottom:10px; padding-top:5px"  alt=""/></a> </div>
      <div class="col-md-9 hidden-xs">
        <div class="row">
          <div class="col-md-4 padd5">
            <div class="th">
              <div class="jR3DCarouselGallery"></div>
            </div>
          </div>
          <div class="col-md-4 padd5">
            <div class="th">
              <div class="jR3DCarouselGallery"></div>
            </div>
          </div>
          <div class="col-md-4 padd5">
            <div class="th">
              <div class="jR3DCarouselGallery"></div>
            </div>
          </div>
          <div class="col-md-4 padd5">
            <div class="th">
              <div class="jR3DCarouselGallery"></div>
            </div>
          </div>
          <div class="col-md-4 padd5">
            <div class="th">
              <div class="jR3DCarouselGallery"></div>
            </div>
          </div>
          <div class="col-md-4 padd5">
            <div class="th">
              <div class="jR3DCarouselGallery"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row" style="background-color:#01ADED; padding:5px 0px">
      <div class="col-md-12"> <a class="btn btn-danger" href="index.php" role="button">Back to Home Page</a> </div>
    </div>
  </header>
  <div class="row" style="padding:10px 0px 0px 0px;">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-info" style="margin-top:10px; margin-bottom:25px">
            <div class="panel-heading text-center"><strong>Reseller Application Form</strong></div>
            <div class="panel-body" style="font-size:12px">
              <form class="form-horizontal"  action="" method="post" onSubmit="return validate();">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Full Name :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="txtFullname" name="txtFullname" placeholder="Full Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Upload Photo :</label>
                  <div class="col-sm-6">
                    <input type="file" id="txtFile" name="txtFile">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Office Address :</label>
                  <div class="col-sm-6">
                    <textarea class="form-control" name="txtOfficeAddress" id="txtOfficeAddress" rows="2" placeholder="Office Address"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Phone No. (Off) :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="txtPhoneno" name="txtPhoneno" placeholder="Phone No. (Off)">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Mobile No :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="txtMobile" name="txtMobile" placeholder="Mobile No">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Email-id :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="txtEmail" name="txtEmail" placeholder="Email-id">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Highest Qualification :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="txtQualification" name="txtQualification" placeholder="Highest Qualification">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Year of passing :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="txtPassingYear" name="txtPassingYear" placeholder="Year of passing">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Business experience (yr):</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="txtBusinesExp" name="txtBusinesExp" placeholder="Business experience (yr)">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Nature of Business :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="txtBusinessNature" name="txtBusinessNature" placeholder="Nature of Business">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Present Business/Activities :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="txtBusinessActivity" name="txtBusinessActivity" placeholder="Present Business/Activities">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Whether having any premises ready to use?</label>
                  <div class="col-sm-6">
                    <label class="radio-inline">
                      <input type="radio" name="txtPremiseshave" id="txtPremiseshave" value="yes">
                      Yes </label>
                    <label class="radio-inline">
                      <input type="radio" name="txtPremiseshave" id="txtPremiseshave1" value="no">
                      No </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">If yes, nature of premises :</label>
                  <div class="col-sm-6">
                    <label class="radio-inline">
                      <input type="radio" name="txtPremisesNature" id="txtPremisesNature" value="Owned">
                      Owned </label>
                    <label class="radio-inline">
                      <input type="radio" name="txtPremisesNature" id="txtPremisesNature1" value="Rental/Leased">
                      Rental / Leased </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Premises Area (in sq.ft.) :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="txtPremisesArea" name="txtPremisesArea" placeholder="Premises Area (in sq.ft.)">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">If premises is not ready how much time it needs?</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="txtNeedTime" name="txtNeedTime" placeholder="Days?">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">Number of Executives you intend to appoint or delegate for this Reseller Business : </label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="txtExecutivesNumber" name="txtExecutivesNumber" placeholder="Enter...">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">How much monthly income you are expecting from the proposed Reseller business? : </label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="txtExpectMonthly" name="txtExpectMonthly" placeholder="Rs.">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-6 control-label">How much you can invest to achieve the above income : </label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="txtInvestMonthly" name="txtInvestMonthly" placeholder="Rs.">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-5 col-sm-7">
                    <!--<button type="submit" name="submit" value="submit" class="btn btn-info" data-toggle="modal" data-target="#verify1">Submit</button>-->
                    <button type="submit" name="submit" value="submit" class="btn btn-info" data-toggle="modal" data-target="#verify1" >Submit</button>
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
  
  <footer>
    <div class="row" style="background-color:#212121; color:#666; padding:15px 0px 15px 0px; ">
      <div class="col-md-12">
        <div class="col-md-1 padd5" align="center">
          <div class="th1"> <img src="images/jus.jpg" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Advocates</small></div>
        </div>
        <div class="col-md-1 padd5" align="center">
          <div class="th1"> <img src="images/astr.jpg" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Astrology</small></div>
        </div>
        <div class="col-md-1 padd5" align="center">
          <div class="th1"> <img src="images/apparel.jpg" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Apparels</small></div>
        </div>
        <div class="col-md-1 padd5" align="center">
          <div class="th1"> <img src="images/brides.gif" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Brides</small></div>
        </div>
        <div class="col-md-1 padd5" align="center">
          <div class="th1"> <img src="images/taxi.jpg" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Cabs</small></div>
        </div>
        <div class="col-md-1 padd5" align="center">
          <div class="th1"> <img src="images/auto.jpg" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Clubs</small></div>
        </div>
        <div class="col-md-1 padd5" align="center">
          <div class="th1"> <img src="images/mob.jpg" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Mobiles</small></div>
        </div>
        <div class="col-md-1 padd5" align="center">
          <div class="th1"> <img src="images/travel4.jpg" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Travel</small></div>
        </div>
        <div class="col-md-1 padd5" align="center">
          <div class="th1"> <img src="images/security.jpg" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Security</small></div>
        </div>
        <div class="col-md-3 padd5" align="center">
          <div class="th1"> <img src="images/cmore.png" style="width:100%; height:60px"  alt=""/> </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div style="margin-bottom:10px; border-bottom:1px #999 dotted"> </div>
      <div class="col-md-12" align="center">
        <p style="padding-bottom:10px"><a href="index.php">Home</a> | <a href="aboutus.html">About us</a> | <a href="advetise.html">Advetise with us</a> | <a href="terms_conditions.html">Terms & Conditions</a> | <a href="customer_care.html">Customer Care</a> | <a href="suggestions.html">Suggestions/Feedback</a> | <a href="contactus.html">Contact us</a> | <a href="franchisees.html">Franchisees/Resellers Invited</a></p>
        <small style="color:#444">@ 2015 All rights Reserved, <a href="http://adschronicle.com/" style="color:#666">Ads Chronicle</a> is a Registered Trademark. Imitation of design and functionality will attract legal action.</small> </div>
    </div>
  </footer>
</div>
<script src="js/bootstrap.min.js"></script> 
<!-- Modal -->
<script type ="text/javascript">
      function validate(){
		  //alert("hai");
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var numbers = /^[0-9]+$/;  
		var txtFullname = document.getElementById('txtFullname').value;
		var txtFile = document.getElementById('txtFile').value;
		var txtOfficeAddress = document.getElementById('txtOfficeAddress').value;
		var txtPhoneno = document.getElementById('txtPhoneno').value;
		var txtMobile = document.getElementById('txtMobile').value;
		var txtEmail = document.getElementById('txtEmail').value;
		var txtQualification = document.getElementById('txtQualification').value;
		 var txtPassingYear = document.getElementById('txtPassingYear').value;
		var txtBusinesExp = document.getElementById('txtBusinesExp').value;
		var txtBusinessNature = document.getElementById('txtBusinessNature').value;
		var txtBusinessActivity = document.getElementById('txtBusinessActivity').value; 
		var txtPremisesArea = document.getElementById('txtPremisesArea').value;
		var txtNeedTime = document.getElementById('txtNeedTime').value;
		var txtExecutivesNumber = document.getElementById('txtExecutivesNumber').value;
		var txtExpectMonthly = document.getElementById('txtExpectMonthly').value;
		//var txtInvestMonthly = document.getElementById('txtInvestMonthly').value; */
		
       
	    
	      if(txtFullname == ''){
            alert("Plase Enter Your Full Name");
            document.getElementById('txtFullname').focus();
            return false;
		  }
            else  if(txtFile == ''){
            alert("Plase Choose Your Image");
            document.getElementById('txtFile').focus();
            return false;

        }
		else  if(txtOfficeAddress == ''){
            alert("Plase Choose Your  Office Address");
            document.getElementById('txtOfficeAddress').focus();
            return false;

        }
		else  if(txtPhoneno == ''){
            alert("Plase Choose Your Phone Number");
            document.getElementById('txtPhoneno').focus();
            return false;

        }
		else if(isNaN(txtPhoneno)){
            
            alert("Enter valid number format");
            document.getElementById('txtPhoneno').focus();
            return false;
      }
        else if(txtPhoneno.length !=10 ){
            
            alert("Enter 10 characters length");
            document.getElementById('txtPhoneno').focus();
            return false;
        }
		else  if(txtMobile == ''){
            alert("Plase Choose Your Mobile Number");
            document.getElementById('txtMobile').focus();
            return false;

        
		} else if(isNaN(txtMobile)){
            
            alert("Enter valid number format");
            document.getElementById('txtMobile').focus();
            return false;
      }
        else if(txtMobile.length !=10 ){
            
            alert("Enter 10 characters length");
            document.getElementById('txtMobile').focus();
            return false;
        }
		else  if(txtEmail == ''){
            alert("Plase Choose Your  Email");
            document.getElementById('txtEmail').focus();
            return false;

        }
		else if(!filter.test(txtEmail)){
            alert("Enter valid email format");
            document.getElementById('txtEmail').focus();
            return false;
        }
         else  if(txtQualification == ''){
            alert("Plase Enter Your Qualification");
            document.getElementById('txtQualification').focus();
            return false;

        }
		 else  if(txtPassingYear == ''){
            alert("Plase Enter Your PassingYear");
            document.getElementById('txtPassingYear').focus();
            return false;

        }
		else  if(txtBusinesExp == ''){
            alert("Plase Enter Your BusinesExp");
            document.getElementById('txtBusinesExp').focus();
            return false;

        }
		else  if(txtBusinessNature == ''){
            alert("Plase Enter Your BusinessNature");
            document.getElementById('txtBusinessNature').focus();
            return false;

        }
	else  if(txtBusinessActivity == ''){
            alert("Plase Enter Your BusinessActivity");
            document.getElementById('txtBusinessActivity').focus();
            return false;

        }	
		else  if(txtPremisesArea == ''){
            alert("Plase Enter Your NeedTime");
            document.getElementById('txtPremisesArea').focus();
            return false;

        }	
		else  if(txtNeedTime == ''){
            alert("Plase Enter Your NeedTime");
            document.getElementById('txtNeedTime').focus();
            return false;

        }	
		else  if(txtExecutivesNumber == ''){
            alert("Plase Enter Your ExecutivesNumber");
            document.getElementById('txtExecutivesNumber').focus();
            return false;

        }	
		else  if(txtExpectMonthly == ''){
            alert("Plase Enter Your BusinessActivity");
            document.getElementById('txtExpectMonthly').focus();
            return false;

        }
		else  if(txtInvestMonthly == ''){
            alert("Plase Enter Your InvestMonthly");
            document.getElementById('txtInvestMonthly').focus();
            return false;

        }	
		
         		
	  }
	  </script>
</body>
</html>
