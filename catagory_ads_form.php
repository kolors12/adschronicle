<?php ob_start(); error_reporting(0);
  session_start();
  require("cw_admin/lib/config.php");
  extract($_GET);
  extract($_POST);
  $date = date("Y-m-d");
  if(isset($_POST) && $_POST['submit'] == 'add') {
  	stripslashes($_POST);
      //print_r($_POST); exit;
      $desc = str_replace("'","~~",$_POST['description']);
        //Get the temp file path
            $tmpFilePath1 = $_FILES['image1']['tmp_name'];
            if ($tmpFilePath1 != ""){
              $im_name1 = time().$_FILES['image1']['name'];
              $newFilePath1 = "adminupload/" . $im_name1;
               if(move_uploaded_file($tmpFilePath1, $newFilePath1)) {
               }
            }
            $tmpFilePath21 = $_FILES['image21']['tmp_name'];
            if ($tmpFilePath21 != ""){
              $im_name21 = time().$_FILES['image21']['name'];
              $newFilePath21 = "adminupload/" . $im_name21;
               if(move_uploaded_file($tmpFilePath21, $newFilePath21)) {
               }
            }
            $tmpFilePath22 = $_FILES['image22']['tmp_name'];
            if ($tmpFilePath22 != ""){
              $im_name22 = time().$_FILES['image22']['name'];
              $newFilePath22 = "adminupload/" . $im_name22;
               if(move_uploaded_file($tmpFilePath22, $newFilePath22)) {
               }
            }
            $tmpFilePath23 = $_FILES['image23']['tmp_name'];
            if ($tmpFilePath23 != ""){
              $im_name23 = time().$_FILES['image23']['name'];
              $newFilePath23 = "adminupload/" . $im_name23;
               if(move_uploaded_file($tmpFilePath23, $newFilePath23)) {
               }
            }
            $tmpFilePath24 = $_FILES['image24']['tmp_name'];
            if ($tmpFilePath24 != ""){
              $im_name24 = time().$_FILES['image24']['name'];
              $newFilePath24 = "adminupload/" . $im_name24;
               if(move_uploaded_file($tmpFilePath24, $newFilePath24)) {
               }
            }
            $tmpFilePath25 = $_FILES['image25']['tmp_name'];
            if ($tmpFilePath25 != ""){
              $im_name25 = time().$_FILES['image25']['name'];
              $newFilePath25 = "adminupload/" . $im_name25;
               if(move_uploaded_file($tmpFilePath25, $newFilePath25)) {
               }
            }
  
            $tmpFilePath3 = $_FILES['image3']['tmp_name'];
            if ($tmpFilePath3 != ""){
              $im_name3 = time().$_FILES['image3']['name'];
              $newFilePath3 = "adminupload/" . $im_name3;
               if(move_uploaded_file($tmpFilePath3, $newFilePath3)) {
               }
            }
            $tmpFilePath4 = $_FILES['image4']['tmp_name'];
            if ($tmpFilePath4 != ""){
              $im_name4 = time().$_FILES['image4']['name'];
              $newFilePath4 = "adminupload/" . $im_name4;
               if(move_uploaded_file($tmpFilePath4, $newFilePath4)) {
               }
            }
          
      	$res=$db->query("SELECT max(guid) FROM `add_services`");
  		$result = $res->fetch();
  		$dt=$result[0];
  		$rest=$db->query("SELECT `productid` FROM `add_services` WHERE `guid`='$dt'");
  		$resu = $rest->fetch();
  		$d=$resu[0];
  		$value=strlen($d);
  		$res="";
  		for($i=0;$i<$value;$i++) {
  			if(is_numeric($d[$i])) {
  				$res.=$d[$i];
  			}
  		}
  		$res;
  		$res=$res+1;
  		$val= 'ADC-'.$res;
          $pid = md5($cid."/".$aid."/".$category."/".$add_title.time());
          
          $chars = "123456789ABCDEFGHIJKLMNPQRSTUVWXYZ'";
          $cou = strtoupper(substr($add_title,0,2));


          for ($i = 0; $i < 6; $i++) {
            $cou .= $chars[mt_rand(0, strlen($chars)-1)];     
          }
          $cou; 
          $coupon_code = $cou;
//echo  "INSERT INTO `add_services`(`productid`, `pid`, `cid`, `aid`,`category`, `add_title`, `email_id`, `phone_no1`, `phone_no2`, `website`, `contact_person`, `working_hours`, `offered_services`, `description`, `address`, `address_location`, `pincode`, `date`, `images1`, `images21`, `images22`, `images23`, `images24`, `images25`, `images3`, `images4`, `video_link`, `discount_offers`, `deal_title`, `coupon_code`,`agency_code`,`discount_offer`,`latitude`,`longitude`,`adtype`,`txtOTP`) VALUES ('$val', '$pid', '$cid', '$aid','$category', '$add_title', '$email_id', '$phone_no1', '$phone_no2', '$website', '$contact_person', '$working_hours', '$offered_services', '$desc', '$address', '$address_location', '$pincode', '$date', '$im_name1', '$im_name21', '$im_name22', '$im_name23', '$im_name24', '$im_name25', '$im_name3', '$im_name4', '$video_link', '$discount_offers', '$deal_title', '$coupon_code', '$agency_code','$chkPassPort','$latitude','$longitude','$adtype','$txtOTP')";exit;
  	
  	    $sth = $db->query ( "INSERT INTO `add_services`(`productid`, `pid`, `cid`, `aid`,`category`, `add_title`, `email_id`, `phone_no1`, `phone_no2`, `website`, `contact_person`, `working_hours`, `offered_services`, `description`, `address`, `address_location`, `pincode`, `date`, `images1`, `images21`, `images22`, `images23`, `images24`, `images25`, `images3`, `images4`, `video_link`, `discount_offers`, `deal_title`, `coupon_code`,`agency_code`,`discount_offer`,`latitude`,`longitude`,`adtype`,`txtOTP`) VALUES ('$val', '$pid', '$cid', '$aid','$category', '$add_title', '$email_id', '$txtMobile', '$phone_no2', '$website', '$contact_person', '$working_hours', '$offered_services', '$desc', '$address', '$address_location', '$pincode', '$date', '$im_name1', '$im_name21', '$im_name22', '$im_name23', '$im_name24', '$im_name25', '$im_name3', '$im_name4', '$video_link', '$discount_offers', '$deal_title', '$coupon_code', '$agency_code','$chkPassPort','$latitude','$longitude','$adtype','$txtOTP')");
  		$insid = $db->lastInsertId();
  		if($sth > 0) {
  		    
  		    
  		 //////////Send The Message In after Submit the form///////////

        $qs=strip_tags($_POST['txtMobile']);
        $code = $val;
        $to = $qs;
        $amessage = "Dear Employer, OTP to verify your mobile number is $code. Thank you, AdsChronicle.com";
        //$message="Hi,".$name." Ur Product Details Are".$message.",".$email.",".$phone." .Thank u for sendsms..";
        //$asms=str_replace(" ","%20",$amessage);
        $sms=str_replace(" ","%20","$amessage"); 
        $aphone = $qs;

        $url = "https://49.50.67.32/smsapi/httpapi.jsp?username=adschron&password=54321&from=ADSCHR&to=$aphone&text=$sms&coding=0&pe_id=1001516986856829022&template_id=1007341713315118350";
        //	echo $url;
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

        session_start();
        $_SESSION['signup_verificationcode']=$code;
        echo "sent";

  			$post_msg = '<h4 style="color: green;">Services added Successfully</h4>';	
  			header('location:add-packages.php?serviceid='.$insid);
  		} else { 
  			$post_msg = '<h4 style="color: red;">Please try Again</h4>';	
  			header('location:catagory_ads_form.php?post_msg='.$post_msg);
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
      <div class="row" style="padding:30px">
        <div class="col-md-12">
         <center><?php if(!empty($_GET['post_msg'])){ echo $_GET['post_msg']; }?></center>
          <form id="add_form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <div class="row">
              
            <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control required" name="add_title" maxlength="40" autocomplete="off" placeholder="Company / Institution / Business name"/>
                </div>
              </div>  
              
             
              <div class="col-md-6">
                <div class="form-group">
                  <select class="form-control required" name="category" id="category" required>
                        <option value="">Select Category</option>
                        <?php $cth = $db->query ("SELECT * FROM `super_category` order by name asc") ;
                              while($crow = $cth->fetch()) {
                              echo "<option value='".$crow[0]."'>".$crow['name']."</option>";
                        } ?>
                  </select>
                </div>
              </div>
              
             
              
              
              <div class="col-md-6">
                <div class="form-group">
                  <select class="form-control required super" name="cid" id="cid" >
                    <option value="">Select City</option>
                    <?php $sth = $db->query ("SELECT * FROM `cities` order by name asc");
                      while($row = $sth->fetch()) {
                      echo "<option value='".$row[0]."'>".$row['name']."</option>";
                      } ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <select class="form-control required area" name="aid" id="aid" required>
                    <option value="">Select Area</option>
                  </select>
                </div>
              </div>
             
              
              
              <div class="clearfix"></div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea class="form-control required" maxlength="120" name="offered_services"   placeholder="Enter Services offered separated by comma and space Ex: Scar removal, Baldness treatment, Weight loss  (Max: 120 Characters)"></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input name="pincode" class="form-control required" minlength="6" maxlength="6" placeholder="PinCode"/>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea name="description" class="form-control" maxlength="3000" id="description" rows="5" placeholder="" >Enter Description Here ... (Max: 3000 Characters)</textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea name="address" class="form-control required" rows="4" maxlength="80" placeholder="Enter  Address Here and Cityname and PinCode... (Max: 80 Characters)"></textarea>
                </div>
                <div class="form-group">
                 <input name="address_location" id="geocomplete" class="form-control required" placeholder="Google Map Location Area" />
                                 <input id="latitude" name="latitude" type="hidden">
					<input id="longitude" name="longitude" type="hidden">
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-md-3">
                <div class="form-group">
                <span id="span4"></span>
                  <input type="text" class="form-control number required" maxlength="10" name="txtMobile" id="txtMobile" autocomplete="off" placeholder="Enter Phone/Mobile Number 1"/>
                 
                </div>
                
              </div>
              <div class="col-md-3">
                <!-- <div class="form-group">
                  <input type="text" class="form-control number" maxlength="10" name="" placeholder="Enter OTP Here..."/>
                </div> -->
                <div class="clearfix"><span class="success-text"></span></div>
                    <input type="text" class="form-control number required" name="txtOTP" id="txtOtp" placeholder="Enter OTP Here" maxlength="4" minlength="4" autocomplete="off"/><br /><a href="javascript:;" style="margin-top:-17px;" class="pull-right text-info resend-code">resend?</a>
                    <span id="span3"></span>
              </div>
              
           
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" class="form-control required" maxlength="10"  autocomplete="off" name="phone_no2" placeholder="Enter Phone/Mobile Number 2"/>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" class="form-control required" name="contact_person" placeholder="Enter Contact Person Name"/>
                </div>
              </div>
              
              
              <div class="clearfix"></div>
              <div class="col-md-6">
                <div class="form-group">
                 <input type="text" class="form-control email required" name="email_id" placeholder="Enter Email ID"/>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control " name="website" placeholder="Enter Website Name (Not Mandatory)"/>
                </div>
              </div>
              
              <div class="clearfix"></div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control " name="working_hours" placeholder="Enter Working Hours"/>
                </div>
              </div>
                <input type="hidden"  name="adtype" value="CATEGORY AD" />
              
              <div class="col-md-6">
                <div class="form-group">
                  <input name="video_link" class="form-control" placeholder="Enter Video Link (Not Mandatory)" />
                </div>
              </div>
              <div class="clearfix"></div>
              
              <div class="col-md-12">
			  <label><h5> Are you offering Deals/discounts?  
              
              <label for="chkYes">
    <input type="radio" id="chkYes" name="chkPassPort" value="Yes"/>
    Yes
</label>
<label for="chkNo">
    <input type="radio" id="chkNo" name="chkPassPort" value="No" />
    No
</label>
              
              </h5></label> 
              
    
               
                <div class="row" id="dvPassport" style="display: none">
                
                  <!---div class="col-md-6">
                  <div class="form-group">
                  <input type="text" id="txtPassportNumber" name="deal_title" class="form-control" maxlength="40" placeholder="Enter Title of the Deal ">
                </div>
                  </div--->
                  <div class="col-md-6">
				  <label for="exampleInputFile">Enter Deal Details</label>
                  <div class="form-group">
                   <input type="text" id="txtPassportNumber" name="discount_offers" class="form-control" maxlength="150" placeholder="Enter Deal Details">
                </div>
                </div>
                <div class="col-md-6">
                  
                  <div class="form-group">
                  <label for="exampleInputFile">Upload Discount/Promotional</label>
                  <input id="txtPassportNumber" type="file" name="image4" class="form-control">
                 <label>Upload image .jpg/.jpeg extension with size of 350x320px &lt; 100KB </label>
               </div><div class="clearfix"></div>
                  </div>
                </div>
              </div>
              
              <!--<div class="col-md-6">
                <div class="form-group">
                   <input name="discount_offers" class="form-control" maxlength="250" placeholder="Enter Deal Details" />
                </div>
              </div>-->
              <div class="clearfix"></div>
             
              <div class="clearfix"></div>
              <div class="col-md-6">
                <div class="form-group">


                  <label>Upload title image</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="http://adschronicle.com/categories.php?category=5 "  target="_blank" align="right"> ( Click to see where this image displays )</a> 
                   
                  <input type="file" name="image1" class="form-control required"/>
                  <label>Upload image .jpg/.jpeg extension with size of 200x75px < 50KB </label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputFile">Upload image 1</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="http://adschronicle.com/c_viewdetails.php?service=b20b15153240099b62b491ebde4e95ab"   target="_blank" align="right"> ( Click to see where this image displays )</a> 
                  <input type="file" name="image21" class="form-control required"/>
                  <label>Upload image .jpg/.jpeg extension with size of 370x350px < 100KB </label>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputFile">Upload image 2</label>
                  <input type="file" name="image22" class="form-control required"/>
                  <label>Upload image .jpg/.jpeg extension with size of 370x350px < 100KB </label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputFile">Upload image 3</label>
                  <input type="file" name="image23" class="form-control"/>
                  <label>Upload image .jpg/.jpeg extension with size of 370x350px < 100KB </label>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputFile">Upload image 4</label>
                  <input type="file" name="image24" class="form-control"/>
                  <label>Upload image .jpg/.jpeg extension with size of 370x350px < 100KB </label>
                </div>
              </div>
              <!--div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputFile">Upload image 5</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="http://adschronicle.com/c_viewdetails.php?service=b20b15153240099b62b491ebde4e95ab" align="right"> ( Click to see where this image displays )</a>
                  <input type="file" name="image25" class="form-control"/>
                  <label>Upload image .jpg/.jpeg extension with size of 370x350px < 100KB </label>
                </div>
              </div>
              <div class="clearfix"></div-->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputFile">Upload Brochure</label>
                      <input type="file" name="image3" class="form-control"/>
                  <label>Upload docx, pdf, jpg files < 500KB </label>
                </div>
              </div>
              <!--<div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputFile">Upload Discount/Promotional</label>
                  <input type="file" name="image4" class="form-control"/>
                 <label>Upload image .jpg/.jpeg extension with size of 350x320px < 100KB </label>
               </div>
              </div>-->
			  
			   <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control required" name="agency_code" placeholder="Enter Agency Code" />
                  <p class="help-block">If you are not an Agency, Enter SELF</p>
                </div>
              </div>
			   <!--div class="clearfix"></div-->
			   <div class="col-md-6">

                  <div class="">
              <div class="form-group">
			  <label for="exampleInputFile">Enter Captcha Code</label>
			  <div class="clearfix"></div>
			  <div class="row">
               <div class="col-md-6">
                <div style="height: 34px; background: #F2F2F2;padding-top: 6px; text-align:center" >
				<?php session_start();$_SESSION['vcode']=rand(999,9999);echo $_SESSION['vcode'];?>
				<input type="hidden" name="captcha" id="captcha" value="<?php echo $_SESSION['vcode']; ?>">
				</div> 
              </div>
              <div class="col-md-6">
              <input type="text" name="textcaptcha" equalTo="#captcha" minlength="4" maxlength="4" placeholder="Captcha" class="form-control number required" />
              </div> 
              </div>
			  </div>
              </div>
                  </div>
              <div class="clearfix"></div>
            </div>
 <div style="
    text-align: center;
">
            <button type="submit" value="add" name="submit" class="btn btn-info">Submit</button> <button type="reset" class="btn btn-info">Cancel & Exit</button>
</div>

          </form>
        </div>
      </div>
      <?php include("footer.php") ?>
    </div>
    <script src="js/bootstrap.min.js"></script> 
  </body>
  <!--script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script-->
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDEc6y2PP50c3529HoVRWY5wru5wLE_6hY"></script>
  <!--script src="js/jquery.geocomplete.js"></script-->
  <script src="js/logger.js"></script>
  <script>
   /* $(function(){
        var options = { };
        $("#geocomplete").geocomplete(options);
       // $("#geocomplete").attr("placeholder","");
    });
*/

google.maps.event.addDomListener(window, 'load', function () {
            var places = new google.maps.places.Autocomplete(document.getElementById('geocomplete'));
            google.maps.event.addListener(places, 'place_changed', function () {
                var place = places.getPlace();
                var address = place.formatted_address;
                var latitude = place.geometry.location.lat();
                var longitude = place.geometry.location.lng();
                var mesg = "Address: " + address;
                mesg += "\nLatitude: " + latitude;
                mesg += "\nLongitude: " + longitude;
                document.getElementById('latitude').value=latitude;
                 document.getElementById('longitude').value=longitude;
				 //localStorage.setItem("clati", latitude);
		//localStorage.setItem("clongi", longitude);
            });
        });
  </script>
  <script type="text/javascript" src="js/nicEdit.js"></script>
  <script type="text/javascript">
    bkLib.onDomLoaded(function() {
        new nicEditor({fullPanel : true}).panelInstance('description');
    });
  </script>
  <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
  <script>
    $(document).ready(function(){ 
     $("#add_form").validate({
         errorClass:'cls'
      });
     });
    
        $('#offered_services').bind('cut copy paste', function (e) {
            e.preventDefault(); //disable cut,copy,paste
        });
        $('#offered_services').keypress(function(e) {
           
            var tval = $('#offered_services').val(),
                tlength = tval.length,
                set = 120,
                remain = parseInt(set - tlength);
            //$('p').text(remain);
            if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
                $('#offered_services').val((tval).substring(0, tlength - 1))
            }
        });
    $('#category').change(function(){
    var id= $(this).val();
    $.ajax({
    type:"post",
    url:"ajaxReq.php",
    data:"cid="+id+"&action=fetchexp5",
     success:function(response){
      $('#sub_category').html(response);
    return true;
    }
    });
    });
    
    $('.super').change(function(){
    var cid= $(this).val();
    $.ajax({
    type:"post",
    url:"ajaxReq.php",
    data:"cid="+cid+"&action=fetchexp1",
     success:function(response){
      $('.area').html(response);
    return true;
    }
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
	
    $(function () {
        $("input[name='chkPassPort']").click(function () {
            if ($("#chkYes").is(":checked")) {
                $("#dvPassport").show();
            } else {
                $("#dvPassport").hide();
            }
        });
    });












    $("#txtMobile").keyup(function(){
       var userphone=$("#txtMobile").val();
       if($.isNumeric(userphone) && userphone.length==10){
    	  $.ajax({
    			type:"post",
    			url:"cw_admin/ajaxScripts/catagoryverification.php",
    			data:"qs="+userphone,
                beforeSend: function(){
                 $("#span4").html("<img src='images/loaderRevamp.svg' height='25px' width='25px' /> Loading request...");
                },
    			success:function(response){
    			 //   alert(response);
    			  $("#span4").html('');
    			  //console.log(response);
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
    			url:"cw_admin/ajaxScripts/catagoryverification.php",
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