<?php ob_start(); error_reporting(0);
session_start();
require("cw_admin/lib/config.php");
extract($_GET);
extract($_POST);
$date = date("Y-m-d");
if(isset($_POST) && $_POST['action']=='VerifyOTP'){
    if($_SESSION['signup_verificationcode']==$_POST['vendorotp']){
        echo "1111"; exit;
    } else {
        echo "0101"; exit;
    }
}
if(isset($_POST) && $_POST['submit']=='Submit'){
    unset($_POST['submit']);
    $filename = stripcslashes($_FILES['txtFile']['name']);
       if(!empty($filename)) {
    		$image = time()."_".$filename;
    		$img_path="adminupload/".$image;
    		move_uploaded_file($_FILES['txtFile']['tmp_name'], $img_path);
    	} else {
    		$image='';	
    	}
     $count = sizeof($_POST);  
    if($count > 14) {
        //echo "INSERT INTO `franchise_data`(`txtFullname`, `txtFile`, `txtOfficeAddress`, `txtPhoneno`, `txtMobile`, `txtEmail`, `txtQualification`, `txtPassingYear`, `txtBusinesExp`, `txtBusinessNature`, `txtBusinessActivity`, `txtPremiseshave`, `txtPremisesNature`, `txtPremisesArea`, `txtNeedTime`, `txtExecutivesNumber`, `txtExpectMonthly`, `txtInvestMonthly`, `date`) VALUES ('$txtFullname', '$image', '$txtOfficeAddress', '$txtPhoneno', '$txtMobile', '$txtEmail', '$txtQualification', '$txtPassingYear', '$txtBusinesExp', '$txtBusinessNature', '$txtBusinessActivity', '$txtPremiseshave', '$txtPremisesNature', '$txtPremisesArea', '$txtNeedTime', '$txtExecutivesNumber', '$txtExpectMonthly', '$txtInvestMonthly', '$date')"; exit;
        $sth = $db->query("INSERT INTO `franchise_data`(`txtFullname`, `txtFile`, `txtOfficeAddress`, `txtPhoneno`, `txtMobile`, `txtEmail`, `txtQualification`, `txtPassingYear`, `txtBusinesExp`, `txtBusinessNature`, `txtBusinessActivity`, `txtPremiseshave`, `txtPremisesNature`, `txtPremisesArea`, `txtNeedTime`, `txtExecutivesNumber`, `txtExpectMonthly`, `txtInvestMonthly`, `date`) VALUES ('$txtFullname', '$image', '$txtOfficeAddress', '$txtPhoneno', '$txtMobile', '$txtEmail', '$txtQualification', '$txtPassingYear', '$txtBusinesExp', '$txtBusinessNature', '$txtBusinessActivity', '$txtPremiseshave', '$txtPremisesNature', '$txtPremisesArea', '$txtNeedTime', '$txtExecutivesNumber', '$txtExpectMonthly', '$txtInvestMonthly', '$date')");
        if($sth > 0){
            header("location: franchise.php?msg=success");
        } else {
            header("location: franchise.php?msg=error");
        }
    } else {
        header("location: franchise.php?msg=error");
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
<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<link rel="stylesheet" href="css/my_style.css"/>
<style>
.cls { 
    color: #F60; 
}
.disablededit {
    cursor: inherit;
    cursor: none;
    pointer-events: none;
}
</style>
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
          <div class="panel panel-info" style="margin-top:10px; margin-bottom:25px">
            <div class="panel-heading text-center"><strong>Reseller Application Form</strong></div>
            <div class="panel-body" style="font-size:12px">
              <form class="form-horizontal" id="frm1" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']?>"> 
              <div align="center"><?php if(!empty($_GET['msg'])){ if($_GET['msg']=='success'){ echo "<h4 style='color:green'>Thankyou for submitting your details. We will contact soon</h4>"; } else { echo "<h4 style='color:red'>Sorry!. The request not completed successfully. Please try again. </h4>";}}?></div>
              <div class="clearfix"></div>
                <div class="form-group">
                  <label class="col-sm-6 control-label">Full Name :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control required" name="txtFullname" placeholder="Full Name">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-6 control-label">Upload Photo :</label>
                  <div class="col-sm-6">
                    <input type="file" class="required" name="txtFile" id="exampleInputFile">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-6 control-label">Office Address :</label>
                  <div class="col-sm-6">
                    <textarea class="form-control required" name="txtOfficeAddress" rows="2" placeholder="Office Address"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-6 control-label">Phone No. (Off) :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control number required" maxlength="20" name="txtPhoneno" placeholder="Phone No. (Off)"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-6 control-label">Mobile No :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control number required" name="txtMobile" minlength="10" maxlength="10" id="txtMobile" placeholder="Mobile No" autocomplete="off"/>
                  <span id="span4"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-6 control-label">Email-id :</label>
                  <div class="col-sm-6">
                    <input type="email" class="form-control email required" id="txtEmail" name="txtEmail" placeholder="Email-id"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-6 control-label">Highest Qualification :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="txtQualification" placeholder="Highest Qualification"/>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-6 control-label">Year of passing :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control number " maxlength="4" name="txtPassingYear" placeholder="Year of passing">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-6 control-label">Business experience (yr):</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control number " name="txtBusinesExp" placeholder="Business experience (yr)">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-6 control-label">Nature of Business :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control " name="txtBusinessNature" placeholder="Nature of Business">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-6 control-label">Present Business/Activities :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control required" name="txtBusinessActivity" placeholder="Present Business/Activities">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-6 control-label">Whether having any premises ready to use?</label>
                  <div class="col-sm-6">
                    <label class="radio-inline">
                      <input type="radio" class="required premises-have" name="txtPremiseshave" value="Yes">
                      Yes </label>
                    <label class="radio-inline">
                      <input type="radio" class="required premises-have" name="txtPremiseshave" value="No">
                      No </label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-6 control-label">If yes, nature of premises :</label>
                  <div class="col-sm-6">
                    <label class="radio-inline">
                      <input type="radio" class="premises" name="txtPremisesNature" value="Owned">
                      Owned </label>
                    <label class="radio-inline">
                      <input type="radio" class="premises" name="txtPremisesNature" value="Rental/Leased">
                      Rental / Leased </label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-6 control-label">Premises Area (in sq.ft.) :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="txtPremisesArea" placeholder="Premises Area (in sq.ft.)">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-6 control-label">If premises is not ready how much time it needs?</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="txtNeedTime" placeholder="Days?">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-6 control-label">Number of Executives you intend to appoint or delegate for this Reseller Business : </label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control required" name="txtExecutivesNumber" placeholder="Enter...">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-6 control-label">How much monthly income you are expecting from the proposed Reseller business? : </label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control " name="txtExpectMonthly" placeholder="Rs.">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-6 control-label">How much you can invest to achieve the above income : </label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control required" name="txtInvestMonthly" placeholder="Rs.">
                  </div>
                </div>
                <div class="form-group otp-block" style="display: none;">
                  <label class="col-sm-6 control-label">Enter OTP : </label>
                  <div class="col-sm-6">
                   <span class="success-text"></span>
                   <div class="clearfix"></div>
                    <input type="text" class="form-control number required" name="txtOTP" id="txtOtp" placeholder="Enter OTP Here" maxlength="4" minlength="4" /><br /><a href="javascript:;" style="margin-top:-17px;" class="pull-right text-info resend-code">resend?</a>
                    <span id="span3"></span>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-5 col-sm-7">
                    <button type="submit" name="submit" value="Submit" class="btn btn-info submit-button">Submit</button>
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
</body>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <script>
    $(document).ready(function(){ 
  	  $("#frm1").validate({
  	      errorClass:'cls'
      });
      $(".premises-have").click(function(){
        var vchk_value = $(this).val();
        if($(".premises-have").prop("checked")){
           if(vchk_value=='Yes'){
            $(".premises").addClass("required");
           } else {
            $(".premises").removeClass("required");
            $(".premises").prop("checked",false);
           }
        } else {
            $(".premises").removeClass("required");
            $(".premises").prop("checked",false);
        }
        
        
      });
    });    
     
     $("#txtMobile").keyup(function(){
       var userphone=$("#txtMobile").val();
       if($.isNumeric(userphone) && userphone.length==10){
    	  $.ajax({
    			type:"post",
    			url:"cw_admin/ajaxScripts/verification.php",
    			data:"qs="+userphone,
                beforeSend: function(){
                 $("#span4").html("<img src='images/loaderRevamp.svg' height='25px' width='25px' /> Loading request...");
                },
    			success:function(response){
    			  $("#span4").html('');
    				var data = $.trim(response);
                   	if(data == 'sent'){
                   	    $("#txtEmail").focus();
                   	    $(".otp-block").show();
                        $(".submit-button").addClass("disablededit");
                   	    $("#txtOtp").val('');
                        //"$("#remail").prop('readonly', true);
                        $("#span4").html('<i class="fa fa-check-circle-o"></i> OTP sent to &nbsp'+userphone+'.<br/>');
                        $("#span4").addClass("text-success");
                        $(".success-text").html('<i class="fa fa-check-circle-o"></i> OTP sent to &nbsp'+userphone+'.<br/>');
                        $(".success-text").addClass("text-success");
    					return true;   
    				}
    				else{
                        $("#span4").html('Sorry!. Please try Again');
                        $("#span4").addClass("text-danger");

    					return false;
    				}
    			}
    		 });
        
       }
        
     });

     $('body').delegate("#txtOtp","keyup", function(){
        var otp = $("#txtOtp").val();
        if(otp.length==4){
                     $.ajax({
                    			type:"post",
                    			url:"franchise.php",
                    			data:"vendorotp="+otp+"&action=VerifyOTP",
                                beforeSend: function(){
                                 $("#span3").html("<img src='images/loaderRevamp.svg' height='25px' width='25px' /> Validating...");
                                },
                    			success:function(response){
                    			  $("#span3").html('');
                                  var res = response;
                                  //alert(res);
                                  if(res==='1111'){
                                        $(".resend-code").hide();
                                        //alert("Your Registration Successfully");
                                        $(".success-text").html('<i class="fa fa-check-circle-o"></i> OTP Verified. <br/>');
                                        $(".success-text").removeClass("text-danger");
                                        $(".success-text").addClass("text-success");
                                        $(".submit-button").removeClass("disablededit");
                                    } else if(res==='0101') {
                                        $(".resend-code").show();
                                        $(".success-text").html('Invalid OTP <br/>');
                                        $(".success-text").addClass("text-danger");
                                        $(".submit-button").addClass("disablededit");
                                    } 
                  			    }
                    });
 
        }

    });
    $(".resend-code").click(function(){
        var userphone=$("#txtMobile").val();
       if($.isNumeric(userphone) && userphone.length==10){
    	  $.ajax({
    			type:"post",
    			url:"cw_admin/ajaxScripts/verification.php",
    			data:"qs="+userphone,
                beforeSend: function(){
                 $("#span3").html("<img src='images/loaderRevamp.svg' height='25px' width='25px' /> Loading request...");
                },
    			success:function(response){
    			
    			  $("#span3").html('');
    				var data = $.trim(response);
                   	if(data == 'sent'){
                        $(".submit-button").addClass("disablededit");
                   	    $("#txtOtp").val('');
                        $(".success-text").html('<i class="fa fa-check-circle-o"></i> OTP sent to &nbsp'+userphone+'.<br/>');
                        $(".success-text").addClass("text-success");
    					return true;
    				}
    			}
    		 });	  
          }       
        
    });         
</script>
</html>