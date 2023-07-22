<?php ob_start(); error_reporting(0);
require("cw_admin/lib/config.php");
session_start();
extract($_GET);
extract($_POST);
 $code = rand(10000,99999);
 $_SESSION['captcha'] = $code;
$date = date("Y-m-d");
if(isset($_POST) && $_POST['submit']=='Save Details'){

    $sth = $db->query("SELECT * FROM `add_services` WHERE `pid`='".$_POST['spid']."'");

    $srow = $sth->fetch();
     
    $to = $srow['email_id'];
    $subject = "AdsChronicle.com";
    $message = "
    Name: $txtName\n
    Email: $txtEmail\n
    Mobile: $txtMobile\n
    Post Ad Details: ".$srow['add_title']."\n
    Post Ad Location: ".$srow['address']."\n
    ";
    $from = $txtEmail;
    $headers = "From: ".$from;
    
    $to1 = $txtEmail;
    $subject1 = "Your saved details from AdsChronicle.com";
    $message1 = "
    Hi, $txtName\n
   
    Name: ".$srow['add_title']."\n
    Location: ".$srow['address']."\n
    Thankyou\n
    ";
    $headers1 = "From: no-reply<no-reply@adschronicle.com>";
     
    $mail1 = mail($to,$subject,$message,$headers);
    $mail2 = mail($to1,$subject1,$message1,$headers1);
    if($mail1 > 0 && $mail1 > 0){
    ?>
    <script type="text/javascript">alert("Your Details successfully saved"); window.location="c_viewdetails.php?service=<?php echo $service ?>";</script>
    <?php } else { ?>
    <script type="text/javascript">alert("Please try again!"); window.location="c_viewdetails.php?service=<?php echo $service ?>";</script>
    <?php }
    
} else if(isset($_POST) && $_POST['submit']=='Send Sms'){
    $sth = $db->query("SELECT * FROM `add_services` WHERE `pid`='".$_POST['smpid']."'");
    $srow = $sth->fetch();
     
    $to = $srow['email_id'];
    $subject = "You have received an enquiry through AdsChronicle.com";
    $message = "
    Name: $txtName\n
    Email: $txtEmail\n
    Mobile: $txtMobile\n
    Requirements: $txtRequirements\n
    
    ";
    $from = $txtEmail;
    $headers = "From: ".$from;
    
    $mail1 = mail($to,$subject,$message,$headers);
    if($mail1 > 0){
    ?>
    <script type="text/javascript">alert("Your Details successfully Submitted"); window.location="c_viewdetails.php?service=<?php echo $service ?>";</script>
    <?php } else { ?>
    <script type="text/javascript">alert("Please try again!"); window.location="c_viewdetails.php?service=<?php echo $service ?>";</script>
    <?php }
    
} else if(isset($_GET) && !empty($_GET['service'])){
    $service = $_GET['service'];
    $sth = $db->query("SELECT * FROM `add_services` WHERE `pid`='".$service."' AND `status`='Active'");
    $scount = $sth->rowCount();
    $srow = $sth->fetch();
	$eth = $db->query ("SELECT c.name, d.name FROM `cities` c, `super_category` d  WHERE c.guid = '".$srow['cid']."' AND d.guid='".$srow['category']."'");
    $mname = $eth->fetch();
    
} else if(isset($_POST) && $_POST['submit']=='get-coupon'){
    unset($_POST['submit']);
    unset($_POST['captcha']);
    unset($_POST['captcha-entered']);
    $count = sizeof($_POST);
    if($count > 4){
        $chk = $db->query("SELECT * FROM `coupon_request` WHERE `txtEmail`='$txtEmail' AND `txtMobile`='$txtMobile' AND `service_id`='$service_id'");
        if($chk->rowCount() == 0) {
        $sth = $db->query("INSERT INTO `coupon_request`(`txtFullname`, `txtMobile`, `txtEmail`, `coupon_code`, `service_id`, `date`) VALUES ('$txtFullname', '$txtMobile', '$txtEmail', '$coupon_code', '$service_id', '$date')");
        if($sth >0){
            $to = $txtEmail;
            $subject = "Discount voucher form Adschronicle.com";
            $from = "info <info@adschrnocle.com>";
            $headers = "From: ".$from;
            $message = "
            Hi,
            You have received Discount voucher from AdsChronicle.com.\n
            Voucher Code: $coupon_code\n
            
            Please use this to avail the services offered.\n
            Thankyou\n
            AdsChronicle.com
            ";
			
			$message1="Dear User Coupon Code is $coupon_code Thank you, Adschronicle";
			$sms=str_replace(" ","%20","$message1"); 
			$url = "http://api.smscountry.com/SMSCwebservice_bulk.aspx?User=catchway&passwd=sanju100&mobilenumber=$txtMobile&message=$sms&sid=REGSTR&mtype=N&DR=Y"; 

			function get_data($url) {
			$ch = curl_init();
			$timeout = 5;
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			$data = curl_exec($ch);
			curl_close($ch);
			return $data;
			}
			get_data($url);
			
            if(mail($to,$subject,$message,$headers)){ ?>
              <script>alert("Voucher code successfully sent."); window.location="c_viewdetails.php?service=<?php echo $service_id ?>";</script>  
            <?php }
        }
        } else {?>
              <script>alert("You have already received the voucher code."); window.location="c_viewdetails.php?service=<?php echo $service_id ?>";</script>  
            <?php
            
        }
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
<link rel="stylesheet" href="css/my_style.css" type="text/css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
   /*.map_canvas { 
    width: 100%; 
    height: 300px; 
    margin: 10px 20px 10px 0;
    }*/
    .cls { 
        color: #F60; 
    }

     td.ex3 {
    background-color: lightblue;
    width: 110px;
    height: 10px;
    overflow: auto;
          }
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    <script src="cw_admin/assets/js/jquery.geocomplete.js"></script>
    <script src="cw_admin/assets/js/logger.js"></script>
    <script>
    $(function(){
        var options = {
        map: ".map_canvas"
        };
        $("#geocomplete").geocomplete(options)
        .bind("geocode:result", function(event, result){
        })
    });
    </script>
</head>
<body style="background-color:#eee">
<div class="container shadow"  style="background-color:#fff">
  <header>
  <?php include("header.php") ?>
    <div class="row" style="background-color:#01ADED; padding:5px 0px">
      <div class="col-md-12"> <a class="btn btn-primary" href="categories.php?category=<?php echo $srow['category']?>" role="button">Back</a> </div>
    </div>
  </header>
  <div class="row" style="padding:10px 0px 0px 0px;">
    <div class="col-md-12" style="padding-bottom:10px"> Home> <?php echo $mname[1] ?> > <?php echo $mname[0]?> > <?php echo $srow['add_title']?> </div>
    <div class="col-md-12" style="background-image:url(images/bg-b.jpg); margin-bottom:10px">
      <div style="font-size:16px; color:#F30; font-weight:bold; padding:10px" align="center"><?php echo $srow['add_title']?>  -  <?php echo $mname[0]?></div>
    </div>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-5">
              <div  style="background-color:#f5f5f5; padding:10px">
                <div id="cf7"> 
                 <?php for($i=0; $i<4; $i++){
                    $j = $i+1;
                    ?>
                  <img class='<?php if($i==0){ echo 'opaque'; }?> wh' src="adminupload/<?php echo $srow['images2'.$j] ?>"  /> 
                 <?php } ?>
                </div>
                <div id="cf7_controls" align="center"> 
                 <?php for($i=0; $i<4; $i++){
                    $j = $i+1;
                    ?>
					
					
                <span class="<?php if($i==0){ echo 'selected'; }?>"><img src="adminupload/<?php echo $srow['images2'.$j] ?>" style="width:50px; height:50px" /></span> 
				
				
                 <?php } ?>
                </div>

              </div>
              <script>
            $(document).ready(function() {
              $("#cf7_controls").on('click', 'span', function() {
                $("#cf7 img").removeClass("opaque");
                var newImage = $(this).index();
                $("#cf7 img").eq(newImage).addClass("opaque");
                $("#cf7_controls span").removeClass("selected");
                $(this).addClass("selected");
              });
            });
            </script> 
            </div>
            <div class="col-md-7" align="justify">
              <div style="overflow:scroll; height:430px; padding:5px">
                <p><strong style="color:#01ADED"><?php echo $srow['add_title']?></strong></p>
                <p><?php echo str_replace("~~","'",$srow['description']) ;?></p>
              </div>
            </div>
            <div class="clearfix"></div>
            <br>
            <div class="col-md-12" style="margin-bottom:10px">
              <div  style="background-image:url(images/bg-b.jpg);" align="center">
                <p style="padding:10px"><a href="adminupload/<?php echo $srow['images3']?>"  style="color:#fff;" download="<?php echo $srow['images3']; ?>"><i class="glyphicon glyphicon-download-alt"></i> <strong>Download Brochure/Profile of this Advertiser</strong></a></p>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="clearfix"></div>
            <div class="col-md-6">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:0px" class="table table-bordered">
                <tr>
                  <td valign="top" width="35%"><strong><i class="glyphicon glyphicon-earphone"></i> Phone/Mobile</strong></td>
                  <td valign="top">+91 <?php echo $srow['phone_no1'].", ".$srow['phone_no2']?></td>
                </tr>
                <tr>
                  <td valign="top"><strong><i class="
glyphicon glyphicon-map-marker"></i> Address</strong></td>
                  <td valign="top"><?php echo $srow['address']?></td>
                </tr>
                <tr>
                  <td valign="top"><strong><i class="
glyphicon glyphicon-envelope"></i> Email-id</strong></td>
                  <td valign="top"><?php echo $srow['email_id']?></td>
                </tr>
                <tr>
                  <td valign="top"><strong><i class="
glyphicon glyphicon-globe"></i> Website</strong></td>
                  <td valign="top"><?php echo $srow['website']?></td>
                </tr>
                <tr>
                  <td valign="top"><strong><i class="
glyphicon glyphicon-facetime-video"></i> Video Link</strong></td>
                  <td valign="top" maxlength="40"><a href="<?php echo $srow['video_link']?>" target="_blank"><?php echo $srow['video_link']?></a></td>
                </tr>
                <tr>
                  <td valign="top"><strong><i class="
glyphicon glyphicon-user"></i> Contact Person</strong></td>
                  <td valign="top"><?php echo $srow['contact_person']?></td>
                </tr>
                <tr>
                  <td valign="top"><strong><i class="
glyphicon glyphicon-time"></i> Working Hours</strong></td>
                  <td valign="top"><?php echo $srow['working_hours']?></td>
                <tr>
                  <td valign="top"><strong><i class="
glyphicon glyphicon-tags"></i> Services Offered</strong></td>


                  <td valign="top" style="overflow:scroll; height:10px; padding:5px"  >

<?php echo $srow['offered_services']?>

</td>


                </tr>
               <tr>
              
               </tr>
              </table>
              <div class="row">
               <div class="col-md-12"> <a class="read-more btn" style="background-color:#b9a7fa; width:100%; color:#fff" role="button" data-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">Save this Advertiser's details in your Email</a> </div>
               </div>
            </div>
            <div class="col-md-6" >
              <div style="background-color:#f5f5f5; padding:10px">
                <form method="post" action="">
                  <h4>Contact <?php echo $srow['add_title']?></h4>
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" name="txtName" placeholder="Full Name" class="form-control" required />
              </div>
              <br>
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                <input type="text" name="txtMobile" placeholder="Mobile No" class="form-control" required />
              </div>
              <br>
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input type="email" name="txtEmail" placeholder="EMail-id" class="form-control" required/>
              </div>
              <br>
              <div class="form-group">
                <textarea class="form-control" name="txtRequirements" maxlength="250" required rows="3" placeholder="Please enter your specific requirements here"></textarea>
              </div>
                  <input type="hidden" name="smpid" value="<?php echo $srow['pid'] ?>"  />
                  <input type="hidden" name="service" value="<?php echo $service ?>" />
                  <button type="submit" name="submit" value="Send Sms" class="btn btn-info">Submit</button>
                  <button type="reset" class="btn btn-info">Reset</button>
                </form>
              </div>
            </div>
            <div class="clearfix"></div>
            
            <div class="col-md-12" style="padding-top:10px">
              <div class="collapse" id="collapseExample1">
                <div >
                  <div class="well">
                   <form method="post" action="">
                    <div class="row" style="padding-top:15px">
                      <div class="col-md-3">
                        <div class="form-group">
                          <input type="text" name="txtName" class="form-control" placeholder="Full Name" required />
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <input type="text" name="txtMobile" class="form-control" placeholder="Mobile No" required />
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <input type="email" name="txtEmail" class="form-control" placeholder="Email-Id" required />
                        </div>
                      </div>
                        <input type="hidden" name="spid" value="<?php echo $srow['pid'] ?>"  />
                        <input type="hidden" name="service" value="<?php echo $service ?>" />
                      <div class="col-md-3" align="center">
                        <button type="submit" name="submit" value="Save Details" style="width:80%"class="btn btn-primary">SAVE</button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
              <div  style="background-image:url(images/bg-b.jpg);">
                <div class="row" style="padding:5px 5px 5px 5px">
                  <div class="col-md-4" id="smap" style="padding-right:0px">
                    <div class="map_canvas" style="width:100%;height:330px;"></div>
                  </div>
                    <input type="hidden" id="geocomplete" value="<?php echo $srow['address_location'] ?>" />			
                 <div class="col-md-8"  style="padding-left:5px">
                    <div class="panel panel-default" style="margin-bottom:0px">
                      <div class="panel-heading " align="center"><strong style="color:#F30">DEAL OF THE DAY OFFER</strong></div>
                      <div class="panel-body">
                        <div class="row">
                          <div class="col-md-6">
						  <!--p><strong>Discount tile</strong></p-->
                            <!--p><strong><?php echo $srow['deal_title'] ?><strong></p-->
                            <!--p><strong>Deal Details</strong></p-->
                            <p style="font-weight:normal;"><b><?php echo substr($srow['discount_offers'],0,5) ?></b><?php echo substr($srow['discount_offers'],5) ?></p>
                            <?php if(!empty($srow['coupon_code'])){ ?>
                            <a class="btn btn-primary" href="javascript:;" data-backdrop="static" data-toggle="modal" data-target="#myModalcoupon" role="button"  style="margin-top:80px"><i class="glyphicon glyphicon-thumbs-up"></i> Get Coupon Code</a>
                            <?php } ?>
                          </div>
                          <div class="col-md-6"> <img src="adminupload/<?php echo $srow['images4'] ?>" style="width:100%; height:260px"  alt=""/> </div>
                          <div class="clearfix"></div>
                          <!--<div class="col-md-12" style="padding-top:15px" align="center"> <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#myModalcoupon" role="button"><i class="glyphicon glyphicon-thumbs-up"></i> Get Coupon Code</a> </div>-->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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
<script src="js/collapse.js" type="text/javascript"></script>
<div class="modal fade" id="myModalcoupon" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Get Coupon Code</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <form method="post" id="frm1" action="<?php echo $_SERVER['PHP_SELF']?>">
              <input type="hidden" name="captcha" id="captcha" value="<?php echo $code ?>" />
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" placeholder="Full Name" class="form-control required" name="txtFullname"/>
              </div>
              <br/>
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                <input type="text" placeholder="Mobile No" name="txtMobile" class="form-control number required" minlength="10" maxlength="10" />
              </div>
              <br/>
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input type="email" placeholder="EMail-id" class="form-control email required" name="txtEmail" />
              </div>
              <input type="hidden" name="coupon_code" value="<?php echo $srow['coupon_code']?>" />
              <input type="hidden" name="service_id" value="<?php echo $service ?>" />
              <br/>
              <div class="input-group">
              <div class="row">
              <div class="col-md-6">
                <div style="height: 34px; background: #F2F2F2;padding-top: 6px;" align="center"><strong><?php echo $code ?></strong></div> 
              </div>
              <div class="col-md-6">
              <input type="text" name="captcha-entered" equalTo="#captcha" minlength="5" maxlength="5" placeholder="Captcha" class="form-control number required" />
              </div> 
              </div>
              </div>
              <br>
              <button type="submit" name="submit" value="get-coupon" class="btn btn-info">Get Coupon No.</button>
            </form>
          </div>
          <div class="col-md-6" align="right"> <img src="images/coupon-codes.png" class="img-responsive"  alt=""/> </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<script>
 $(document).ready(function(){ 
  	  $("#frm1").validate({
  	      errorClass:'cls'
      });
}); 
</script>
</html>