<?php ob_start(); error_reporting(0);
  session_start();
  require("cw_admin/lib/config.php");
  extract($_GET);
  extract($_POST);
  $date = date("Y-m-d");
  if(isset($_POST) && $_POST['submit'] == 'Save') {
  	//stripslashes($_POST);
      $r = $_POST['guid'];
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
          
      	
  		
       ////echo  "INSERT INTO `add_services`(`productid`, `pid`, `cid`, `aid`,`category`, `add_title`, `email_id`, `phone_no1`, `phone_no2`, `website`, `contact_person`, `working_hours`, `offered_services`, `description`, `address`, `address_location`, `pincode`, `date`, `images1`, `images21`, `images22`, `images23`, `images24`, `images25`, `images3`, `images4`, `video_link`, `discount_offers`, `deal_title`, `coupon_code`,`agency_code`,`discount_offer`,`latitude`,`longitude`,`adtype`,`txtOTP`) VALUES ('$val', '$pid', '$cid', '$aid','$category', '$add_title', '$email_id', '$phone_no1', '$phone_no2', '$website', '$contact_person', '$working_hours', '$offered_services', '$desc', '$address', '$address_location', '$pincode', '$date', '$im_name1', '$im_name21', '$im_name22', '$im_name23', '$im_name24', '$im_name25', '$im_name3', '$im_name4', '$video_link', '$discount_offers', '$deal_title', '$coupon_code', '$agency_code','$chkPassPort','$latitude','$longitude','$adtype','$txtOTP')";exit;
  	
  	   // $sth = $db->query ( "INSERT INTO `add_services`(`productid`, `pid`, `cid`, `aid`,`category`, `add_title`, `email_id`, `phone_no1`, `phone_no2`, `website`, `contact_person`, `working_hours`, `offered_services`, `description`, `address`, `address_location`, `pincode`, `date`, `images1`, `images21`, `images22`, `images23`, `images24`, `images25`, `images3`, `images4`, `video_link`, `discount_offers`, `deal_title`, `coupon_code`,`agency_code`,`discount_offer`,`latitude`,`longitude`,`adtype`,`txtOTP`) VALUES ('$val', '$pid', '$cid', '$aid','$category', '$add_title', '$email_id', '$txtMobile', '$phone_no2', '$website', '$contact_person', '$working_hours', '$offered_services', '$desc', '$address', '$address_location', '$pincode', '$date', '$im_name1', '$im_name21', '$im_name22', '$im_name23', '$im_name24', '$im_name25', '$im_name3', '$im_name4', '$video_link', '$discount_offers', '$deal_title', '$coupon_code', '$agency_code','$chkPassPort','$latitude','$longitude','$adtype','$txtOTP')");
  		

       $sth = $db->query ("UPDATE `add_services` SET `add_title`='$add_title',`category`='$category',`cid`='$cid',`aid`='$aid',`offered_services`='$offered_services',`pincode`='$pincode',`description`='$description',`address`='$address',`phone_no1`='$phone_no1',`phone_no2`='$phone_no2',`contact_person`='$contact_person',`email_id`='$email_id',`address_location`='$address_location',`video_link`='$video_link',`website`='$website',`working_hours`='$working_hours',`discount_offer`='$chkPassPort',`discount_offers`='$discount_offers',`agency_code`='$agency_code' WHERE `guid`='$guid'");

       if($sth > 0) {?>

        <script>alert("successfully updated"); window.location="Update_business_ads.php?guid=.$guid;"</script>
      <?php 
        } else { ?>
      <script>alert("Please try Again"); window.location"Update_business_ads.php?guid=.$guid;"</script>
        <?php }?>
  <?php }?>
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
            <?php $q = $_GET['guid'];

            $sth = $db->query ('SELECT * FROM `add_services` WHERE `guid`="'.$q.'"');
            $row = $sth->fetch();?>
            <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control required" name="add_title" value="<?php echo $row['add_title'];?>" autocomplete="off" placeholder="Company / Institution / Business name"/>
                </div>
              </div>  
              
             
              <div class="col-md-6">
                <div class="form-group">
                  
                  <select class="form-control" name="category" id="category" required>
                        <option value="">Select Category</option>
                        <?php $cth = $db->query ("SELECT * FROM `super_category`");
                              while($crow = $cth->fetch()) {
                              echo "<option value='".$crow[0]."' "; if($row['category']==$crow[0]){ echo "selected"; } echo ">".$crow['name']."</option>";
                        } ?>
                      </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                   <select class="form-control super" name="cid" id="cid" required>
                        <option value="">Select City</option>
                        <?php $ath = $db->query ("SELECT * FROM `cities`");
                              while($arow = $ath->fetch()) {
                              echo "<option value='".$arow[0]."' "; if($row['cid']==$arow[0]){ echo "selected"; } echo " >".$arow['name']."</option>";
                              } ?>
                      </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <!-- <select class="form-control required area" name="aid" id="aid" required>
                    <option value="">Select Area</option>
                  </select> -->
                    <select class="form-control area" name="aid" id="aid" required>
                        <option value="">Select Area</option>
                        <?php $cth = $db->query ("SELECT * FROM `areas` WHERE `sid`='".$row['cid']."'"); ?>
                        <?php while($crow = $cth->fetch()) {  
                              echo "<option value='".$crow[0]."'"; if($row['aid']==$crow[0]){ echo " selected "; }echo ">".$crow[2]."</option>";
                        	} ?>
                      </select>
                </div>
              </div>
             
              
              
              <div class="clearfix"></div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea class="form-control required" maxlength="120" name="offered_services"  placeholder="Enter Services offered separated by comma and space Ex: Scar removal, Baldness treatment, Weight loss  (Max: 120 Characters)">  <?php echo $row['offered_services'];?></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input name="pincode" class="form-control required" minlength="6" maxlength="6" value="<?php echo $row['pincode'];?>" placeholder="PinCode"/>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea name="description" class="form-control" maxlength="3000" id="description" rows="2" placeholder="" ><?php echo $row['description'];?></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea name="address" class="form-control required" rows="4" maxlength="80" placeholder="Enter  Address Here and Cityname and PinCode... (Max: 80 Characters)"><?php echo $row['address'];?></textarea>
                </div>
                <div class="form-group">
                 <input name="address_location" id="geocomplete" class="form-control required" value="<?php echo $row['address_location'];?>" placeholder="Google Map Location Area" />
                                 <input id="latitude" name="latitude" type="hidden">
					<input id="longitude" name="longitude" type="hidden">
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-md-3">
                <div class="form-group">
                <span id="span4"></span>
                  <input type="text" class="form-control number required" maxlength="10" value="<?php echo $row['phone_no1'];?>" name="phone_no1" id="phone_no1" autocomplete="off" placeholder="Enter Phone/Mobile Number 1"/>
                 
                </div>
                
              </div>
              
              
           
              <div class="col-md-3">
                <div class="form-group">
                  <input type="text" class="form-control required" maxlength="10" value="<?php echo $row['phone_no2'];?>"  autocomplete="off" name="phone_no2" placeholder="Enter Phone/Mobile Number 2"/>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control required" name="contact_person"  value="<?php echo $row['contact_person'];?>" placeholder="Enter Contact Person Name"/>
                </div>
              </div>
              
              
              <div class="clearfix"></div>
              <div class="col-md-6">
                <div class="form-group">
                 <input type="text" class="form-control email required" name="email_id" value="<?php echo $row['email_id'];?>" placeholder="Enter Email ID"/>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control " name="website"  value="<?php echo $row['website'];?>" placeholder="Enter Website Name (Not Mandatory)"/>
                </div>
              </div>
              
              <div class="clearfix"></div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control " name="working_hours"  value="<?php echo $row['working_hours'];?>" placeholder="Enter Working Hours"/>
                </div>
              </div>
                <input type="hidden"  name="guid" value="<?php echo $row['guid'];?>" />
              
              <div class="col-md-6">
                <div class="form-group">
                  <input name="video_link" class="form-control" value="<?php echo $row['video_link'];?>"  placeholder="Enter Video Link (Not Mandatory)" />
                </div>
              </div>
              <div class="clearfix"></div>
              
              <div class="col-md-12">
			 

          <label><h5> Are you offering Deals/discounts?  
          <label for="chkYes">
          <input type="radio" id="chkYes" name="chkPassPort" value="Yes" <?php if($row['discount_offer']=="Yes"){echo "checked";}?>/>
          Yes
          </label>
          <label for="chkNo">
          <input type="radio" id="chkNo" name="chkPassPort" value="No" <?php if($row['discount_offer']=="No"){echo "checked";}?>/>
          No
          </label>
          </h5></label>
              
            
              
    
               
                 <div class="row" id="dvPassport" <?php if($row['discount_offer']=="No"){ ?> style="display: none" <?php } ?>>
                 
                  <div class="col-md-6">
				              <label for="exampleInputFile">Enter Deal Details</label>
                      <div class="form-group">
                      <input type="text" id="txtPassportNumber" name="discount_offers" value="<?php echo $row['discount_offers'];?>" class="form-control" maxlength="150" placeholder="Enter Deal Details">
                      </div>
                  </div>
                <div class="col-md-6">
                  
                    <div class="form-group">
                      <label for="exampleInputFile">Upload Discount/Promotional</label>
                      <input id="txtPassportNumber" type="file" name="image4" class="form-control">
                      <label>Upload image .jpg/.jpeg extension with size of 350x320px &lt; 100KB </label>
                    </div>
                     <div class="clearfix"></div>
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
                  <input type="text" class="form-control required" name="agency_code" value="<?php echo $row['agency_code'];?>" placeholder="Enter Agency Code" />
                  <p class="help-block">If you are not an Agency, Enter SELF</p>
                </div>
              </div>
			   <!--div class="clearfix"></div-->
			   
           
            </div>
            <div style="text-align: center;">
            <button type="submit" value="Save" name="submit" class="btn btn-info">Update</button> 

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


  </script> 





</html>