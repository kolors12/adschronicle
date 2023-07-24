<?php ob_start();error_reporting(0);
  require_once "cw_admin/lib/config.php";
  extract($_POST);
  $date = date("Y-m-d");
  if(isset($_POST) && $_POST['submit'] == 'submitJobSeeker') {
     //print_r ($_POST["txtEducation"]); exit;
            //stripslashes($_POST);
            
            
               $choice=implode(',',$_POST['txtSkills']);
            $tmpFilePath1 = $_FILES['image1']['tmp_name'];
            if ($tmpFilePath1 != ""){
              $im_name1 = time().$_FILES['image1']['name'];
              $newFilePath1 = "adminupload/" . $im_name1;
               if(move_uploaded_file($tmpFilePath1, $newFilePath1)) {
               }
            }
            $tmpFilePath2 = $_FILES['image2']['tmp_name'];
            if ($tmpFilePath2 != ""){
              $im_name2 = time().$_FILES['image2']['name'];
              $newFilePath2 = "adminupload/" . $im_name2;
               if(move_uploaded_file($tmpFilePath2, $newFilePath2)) {
               }
            }
            $tmpFilePath3 = $_FILES['image3']['tmp_name'];
            if ($tmpFilePath3 != ""){
              $im_name3 = time().$_FILES['image3']['name'];
              $newFilePath3 = "adminupload/" . $im_name3;
               if(move_uploaded_file($tmpFilePath3, $newFilePath3)) {
               }
            }
          
      	$res=$db->query("SELECT max(guid) FROM `jobseeker_ads`");
  		$result = $res->fetch();
  		$dt=$result[0];
  		$rest=$db->query("SELECT `productid` FROM `jobseeker_ads` WHERE `guid`='$dt'");
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
  		$val= 'ADJ-'.$res;
        $pid = md5($txtName."/".$txtJobCategory."/".time());
        
      $count = count($_POST["txtEducation"]);
      //Getting post values
      $skill=$_POST["txtEducation"];	
      $skill6=$_POST["specialisation"];	
      $skill7=$_POST["marks"];	
      $skill8=$_POST["university"];	
      $skill9=$_POST["yearpassing"];
        
   
    // echo "$dt";exit;
        for($i=0; $i<$count; $i++)
        {
         

          //echo "INSERT INTO `jobseeker_ads_qualification` (`jbaq_id`,`js_id`,`txtEducation`,`specialisation`,`marks`,`university`,`yearpassing`) VALUES('$pid','$dt','$skill[$i]','$skill6[$i]','$skill7[$i]','$skill8[$i]','$skill9[$i]')";exit;
          $sth = $db->query ("INSERT INTO `jobseeker_ads_qualification` (`jbaq_id`,`js_id`,`txtEducation`,`specialisation`,`marks`,`university`,`yearpassing`) VALUES('$pid','$dt','$skill[$i]','$skill6[$i]','$skill7[$i]','$skill8[$i]','$skill9[$i]')");
	     
         }
  		
  		
         //echo "INSERT INTO `jobseeker_ads`( `productid`, `pid`, `txtJobCategory`, `txtJobExp`, `txtJobStatus`, `txtName`, `txtDob`, `txtMStatus`, `txtAddress`,`txtCity`,`txtLocation`, `txtMobile`, `txtAMobile`, `txtEmail`, `txtSkills`, `txtExpSalary`, `txtDesiredLocation`, `txtAddinformation`, `status`, `active_date`, `date`, `image1`, `image2`, `image3`,`adtype` ) VALUES ( '$val', '$pid', '$txtJobCategory', '$txtJobExp', '$txtJobStatus', '$txtName', '$txtDob', '$txtMStatus', '$txtAddress','$txtCity', '$txtLocation', '$txtMobile', '$txtAMobile', '$txtEmail', '$choice', '$txtExpSalary', '$txtDesiredLocation', '$txtAddinformation', 'DeActive', '', '$date', '$im_name1', '$im_name2', '$im_name3','$adtype' )";exit;
  	    $sth = $db->query ("INSERT INTO jobseeker_ads ( `productid`, `pid`, `txtJobCategory`, `txtJobExp`, `txtJobStatus`, `txtName`, `txtDob`, `txtMStatus`, `txtAddress`,`txtCity`,`txtLocation`, `txtMobile`, `txtAMobile`, `txtEmail`, `txtSkills`, `txtExpSalary`, `txtDesiredLocation`, `txtAddinformation`, `status`, `active_date`, `date`, `image1`, `image2`, `image3`,`adtype` ) VALUES ( '$val', '$pid', '$txtJobCategory', '$txtJobExp', '$txtJobStatus', '$txtName', '$txtDob', '$txtMStatus', '$txtAddress','$txtCity', '$txtLocation', '$txtMobile', '$txtAMobile', '$txtEmail', '$choice', '$txtExpSalary', '$txtDesiredLocation', '$txtAddinformation', 'DeActive', '', '$date', '$im_name1', '$im_name2', '$im_name3','$adtype' )");
  		$insid = $db->lastInsertId();
  		
  		if($sth > 0) {
  			//$post_msg = '<h4 style="color: green;">Job Seeker Ad Successfully Submitted</h4>';	
  			header('location:add-packages.php?adid='.$insid);
  			
  			
  			//////////Send The Message In after Submit the form///////////

      $qs=strip_tags($_POST['txtMobile']);
      $code = $val;
      $to = $qs;
      $amessage = "Dear User, OTP for Franchise Application form is $code. Thank you, AdsChronicle.com";
      //$message="Hi,".$name." Ur Product Details Are".$message.",".$email.",".$phone." .Thank u for sendsms..";
      //$asms=str_replace(" ","%20",$amessage);
      $sms=str_replace(" ","%20","$amessage"); 
      $aphone = $qs;

      $url = "https://49.50.67.32/smsapi/httpapi.jsp?username=adschron&password=54321&from=ADSCHR&to=$aphone&text=$sms&coding=0&pe_id=1001516986856829022&template_id=1007285132694237634";
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
  			
  			
  			
  		} else { 
  			$post_msg = '<h4 style="color: red;">Please try Again</h4>';	
  			header('location:job-seeker_ad.php?post_msg='.$post_msg);
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
    <link rel="stylesheet" href="css/datepicker.css">
    <link rel="stylesheet" href="css/my_style.css">
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
    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="js/crawler.js" type="text/javascript"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
     <script src="jquery.sumoselect.js"></script>
    <link href="sumoselect.css" rel="stylesheet" />
    <script type="text/javascript">
      $(document).ready(function () {
          window.asd = $('.SlectBox').SumoSelect({ selectAll: true });
      });
      $(function () {
      $('[data-toggle="tooltip"]').tooltip()
      })
    </script>
    <style type="text/css">
      p, div, ul, li {
      padding: 0px;
      margin: 0px;
      }
      .cls {
      color: #F60;
      }
    </style>
  </head>
  <body style="background-color:#eee">
    <div class="container shadow"  style="background-color:#fff">
      <header>
        <?php include("header.php") ?>
        <div class="row" style="background-color:#01ADED; padding:5px 0px">
          <div class="col-md-12"> <a class="btn btn-danger" href="index.php" role="button">Back to Home Page</a>
          </div>
        </div>
      </header>
      <div class="row" style="padding:10px 0px 3px 0px;">
        <center><?php if(!empty($_GET['post_msg'])){ echo $_GET['post_msg']; }?></center>
        <div class="col-md-12" style="background-image:url(images/bg-b.jpg); margin-bottom:30px">
          <div style="font-size:16px; color:#F30; font-weight:bold; padding:10px" align="center">Publish Job Seeker Ad form</div>
        </div>
        <div class="col-md-12 col-md-offset-0">
          
           <form id="add_form" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
            <div class="form-group col-sm-12">
              
              <div class="col-sm-3">
              <label  class="control-label">Job Category</label>
                <select class="form-control required" name="txtJobCategory" >
                  <option value="">Select Job Category</option>
                  <?php 
                    $jth = $db->query("SELECT * FROM `job_category` ORDER BY `name` ASC");
                    foreach($jth as $jrow){
                        echo '<option>'.$jrow['name'].'</option>';
                    }
                  ?>
                </select>
              </div>

            
              <div class="col-sm-2">
              <label class="control-label">Total Experience</label>
                <select class="form-control required" name="txtJobExp">
                  <option value="">Select Experience</option>
                  <?php $eth = $db->query("SELECT * FROM `job_exp` ORDER BY `name` ASC");
                   foreach($eth as $erow){
                    echo '<option value="'.$erow['name'].'">'.$erow['name'].'</option>';
                  }?>
                </select>
              </div>
             
              <div class="col-sm-2">
              <label  class=" control-label">Job Status</label>
                <select class="form-control required" name="txtJobStatus" >
                  <option value="" >Job Status</option>
                  <option>Full Time</option>
                  <option>Part Time</option>
                </select>
              </div>
             
              <div class="col-sm-3">
              <label  class="control-label">Full Name</label>
                <input type="text" class="form-control required" name="txtName" placeholder="Full Name">
              </div>
              <div class="col-sm-2">
              <label  class="control-label">Date of Birth</label>
               <input type="text" class="form-control required datepicker" name="txtDob" placeholder="Date of Birth" autocomplete="off">
                <!-- <input type="text" class="form-control required " name="txtDob" placeholder="DD/MM/YYYY"> -->
              </div>
            </div>
           
           
          
            <div class="form-group col-sm-12">
             
             
             
              <div class="col-sm-3">
              <label  class="control-label">Marital Status</label>
                <select class="form-control required" name="txtMStatus" >
                  <option value="">Select</option>
                  <option>Single</option>
                  <option>Married</option>
                  <!--option>Separated</option>
                  <option>Divorced or Widowed</option-->
                </select>
              </div>
             
              <div class="col-sm-3">
              <label  class="control-label">Address with Pin</label>
                <textarea class="form-control required"  maxlength="100" name="txtAddress" placeholder="Address with Pin" rows="1"></textarea>
              </div>
            
              <div class="col-sm-2">
              <label  class="control-label">City</label>
              <input type="text"  readonly class="form-control " name="txtCity"  value="<?php echo $_COOKIE['areaname']?>" placeholder="City" />
              </div>
              <div class="col-sm-2">
              <label  class="control-label">Locality</label>
              <select class="form-control " name="txtLocation"  >
              <option value="" selected="">Select Residence</option>
              <?php $rth = $db->query("SELECT * FROM `areas` where sid='".$_COOKIE['area']."'  ORDER by name asc");
              foreach($rth as $re_row){
              echo '<option>'.$re_row['name'].'</option>';
              }
              ?>
              </select>
              </div>
              <div class="col-sm-2">
              <label  class="control-label">Phone No. 1</label>
                <input type="text" class="form-control number required" minlength="10" maxlength="10"  name="txtMobile" id="txtMobile" autocomplete="off" placeholder="Phone No. 1" />
                <span id="span4"></span>
              </div>
            </div>
         
                  
              <div class="form-group col-sm-12">

            <div class="col-sm-2">
            <label  class="control-label otp-block">Enter OTP</label>
                   <div class="clearfix"><span class="success-text"></span></div>
                    <input type="text" class="form-control number required" name="txtOTP" id="txtOtp" placeholder="Enter OTP Here" maxlength="4" minlength="4" autocomplete="off"/><br /><a href="javascript:;" style="margin-top:-17px;" class="pull-right text-info resend-code">resend?</a>
                    <span id="span3"></span>
                    </div>
              
              <div class="col-sm-2">
              <label  class="control-label">Phone No. 2</label>
                <input type="text" class="form-control" minlength="10" maxlength="10" name="txtAMobile" placeholder="Phone No. 2" />
              </div>
             
        
              <div class="col-sm-3">
              <label  class="control-label">Email-id</label>
                <input type="email" class="form-control email required" name="txtEmail" placeholder="Email-id" autocomplete="off" />
              </div>

             
              <div class="col-sm-2">
              <label  class="control-label">
              Desired Location</label>
                <select class="form-control required" name="txtDesiredLocation">
                  <option value="">Select Desired Location</option>
                  <?php $cth1 = $db->query("SELECT * FROM `desired_location` ORDER BY name ASC");
                    foreach($cth1 as $crow1){
                        echo '<option>'.$crow1['name'].'</option>';
                    }
                   ?>
                </select>
              </div>
             
              <div class="col-sm-3">
              <label  class="control-label">Additional Information</label>
                <textarea class="form-control" name="txtAddinformation" placeholder="Additional Information you wish to provide" rows="1"></textarea>
              </div>
            </div>
              <input type="hidden" name="adtype"  value="JOB SEEKER AD" />
            <!-- <div class="form-group">
              <label  class="col-sm-6 control-label">
              Qualifications separated by ", "</label>
              <div class="col-sm-6">
                <input type="text" class="form-control required" name="txtEducation" placeholder="Educational Information" />
              </div>
            </div> -->
            <div class="form-group col-sm-12">
						<table class="table" id="dynamic_field">
							<tr>
							<div class="col-sm-3">
              <td> 
                <label  class="control-label">Qualification</label>
                  <select class="form-control required super" name="txtEducation[]" id="cid" >
                  <option value="">Select Qualifications</option>
                  <?php $sth = $db->query ("SELECT * FROM `qualification` order by name asc");
                      while($row = $sth->fetch()) {
                      echo "<option value='".$row[0]."'>".$row['name']."</option>";
                      } ?>
                  </select>
                </td>
              </div>
							<div class="col-sm-3">
                <td>
                  <label  class="control-label">Specialisation</label>
                  <select class="form-control required area" name="specialisation[]" id="aid" required>
                    <option value="">Select Specialisation</option>
                  </select>
                </td>
              </div>
							<div class="col-sm-1">
              <td><label  class="control-label">% Marks</label>
              <input type="number" class="form-control required"  name="marks[]" placeholder="% Marks" autocomplete="off"/>
              </td>
              </div>
							<div class="col-sm-2">
              <td> 
              <label  class="control-label">University</label>
              <input type="text" class="form-control required"  name="university[]" placeholder="University Name" autocomplete="off"/>
              </td>
              </div>
							<div class="col-sm-1">
              <td>
              <label  class="control-label">Year of Passing</label>
              <input type="text" class="form-control required" maxlength="4"  name="yearpassing[]" placeholder="Year of Passing" autocomplete="off"/>
              </td>
              </div>
              <div class="col-sm-2">
               <td> 
                <label  class="control-label"><span style="color:white;">d</span></label>
                <button type="button" name="add" id="add" class="btn btn-success"><span>&#43;</span></button>
               </td>
              </div>
							</tr>
						</table>
            </div>
		
            
            <div class="form-group col-sm-12">
             
              <div class="col-sm-3">
              <label  class="control-label">Technical Skills</label>
              <select multiple="multiple" name="txtSkills[]" class="SlectBox form-control required">
                <?php $citt = $db->query("SELECT * FROM `skills` $srr ORDER BY `name` ASC");
                  while($ciroww = $citt->fetch()){ ?>
                <option value="<?php echo $ciroww['name'] ?>" ><?php echo $ciroww['name'] ?></option>
                <?php } ?>
              </select>
			  
              </div>
             
              <div class="col-sm-3">
              <label  class="control-label">Expected Salary</label>
                <input type="text" class="form-control required"  name="txtExpSalary" autocomplete="off" placeholder="Expected Salary" />
              </div>

            
              <div class="col-sm-3">
              <label  class="control-label">Upload Recent Photo</label>
                <input type="file" class="required form-control" name="image1" />
              </div>
              
              <div class="col-sm-3">
              <label  class="control-label">Upload Resume in doc, pdf</label>
                <input type="file" class="form-control" name="image2" />
              </div>
            </div>
           
           
            
            <div class="form-group col-sm-12">
              <label  class="col-sm-3 control-label">Upload Video Resume</label>
              <div class="col-sm-6">
                <input type="file" class="form-control" name="image3" />
                <p class="help-block"><small>(Maximum video size 20MB only)</small></p>
              </div>
            </div>
			<div class="form-group">
              <label  class="col-sm-3 control-label"> Enter Captcha Code</label>
              <div class="col-sm-6">
                 <div class="form-group">
			 
			  <div class="">
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
			
			
            <div class="form-group">
              <div class="col-sm-offset-6 col-sm-6">
                <button type="submit" name="submit" value="submitJobSeeker" class="btn btn-info">Submit</button>
              </div>
            </div>
          </form>
          
          
          
        </div>
        <div class="clearfix"></div>
      </div>
      <?php include("footer.php") ?>
    </div>
    <script src="js/bootstrap.min.js"></script> 
    <!-- Modal -->
   </body>
  <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
  <script>
    $(document).ready(function(){ 
     $(".datepicker").datepicker({format: "dd-mm-yyyy", autoclose: true});
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
    
    
    
    $('#category').change(function(){
    var id= $(this).val();
    $.ajax({
    type:"post",
    url:"ajaxReq2.php",
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
    url:"ajaxReq2.php",
    data:"cid="+cid+"&action=fetchexp1",
     success:function(response){
      $('.area').html(response);
    return true;
    }
    });
    });
    
    
    $("#txtMobile").keyup(function(){
       var userphone=$("#txtMobile").val();
       if($.isNumeric(userphone) && userphone.length==10){
    	  $.ajax({
    			type:"post",
    			url:"cw_admin/ajaxScripts/jobseekarverification.php",
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
    			url:"cw_admin/ajaxScripts/jobseekarverification.php",
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
    
    
    
    $(document).ready(function(){
	var i=1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td> <select class="form-control required quali" name="txtEducation[]" id="cid" ><option value="">Select Qualifications</option><?php $sth = $db->query ("SELECT * FROM `qualification` order by name asc"); while($row = $sth->fetch()) { echo '<option value='.$row[0].'>'.$row['name'].'</option>'; } ?></select></td><td> <select class="form-control required spec" name="specialisation[]" id="aid" required><option value="">Select Specialisation</option></select></td> <td><input type="number" name="marks[]" placeholder="% Marks" class="form-control name_list" /></td><td><input type="text" name="university[]" placeholder="University Name" class="form-control name_list" /></td><td><input type="text" maxlength="4" name="yearpassing[]" placeholder="Year of Passing" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	
	    $('.quali').change(function(){
     // alert('hi');
    var cid= $(this).val();
   //console.log(cid);
    $.ajax({
    type:"post",
    url:"ajaxReq2.php",
    data:"cid="+cid+"&action=fetchexp1",
     success:function(response){
      $('.spec').html(response);
    return true;
    }
    });
    });
	    
	    
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
});

  </script> 
</html>