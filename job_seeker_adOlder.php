<?php ob_start();error_reporting(0);
  require_once "cw_admin/lib/config.php";
  extract($_POST);
  $date = date("Y-m-d");
  if(isset($_POST) && $_POST['submit'] == 'submitJobSeeker') {
     //echo print_r($_POST); exit;
            stripslashes($_POST);
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
       // echo "INSERT INTO `jobseeker_ads`( `productid`, `pid`, `txtJobCategory`, `txtJobExp`, `txtJobStatus`, `txtName`, `txtDob`, `txtMStatus`, `txtAddress`,`txtCity`,`txtLocation`, `txtMobile`, `txtAMobile`, `txtEmail`, `txtEducation`, `txtSkills`, `txtExpSalary`, `txtDesiredLocation`, `txtAddinformation`, `status`, `active_date`, `date`, `image1`, `image2`, `image3`,`adtype` ) VALUES ( '$val', '$pid', '$txtJobCategory', '$txtJobExp', '$txtJobStatus', '$txtName', '$txtDob', '$txtMStatus', '$txtAddress','$txtCity', '$txtLocation', '$txtMobile', '$txtAMobile', '$txtEmail', '$txtEducation', '$txtSkills', '$txtExpSalary', '$txtDesiredLocation', '$txtAddinformation', 'DeActive', '', '$date', '$im_name1', '$im_name2', '$im_name3','$adtype' )";exit;
  	    $sth = $db->query ("INSERT INTO `jobseeker_ads`( `productid`, `pid`, `txtJobCategory`, `txtJobExp`, `txtJobStatus`, `txtName`, `txtDob`, `txtMStatus`, `txtAddress`,`txtCity`,`txtLocation`, `txtMobile`, `txtAMobile`, `txtEmail`, `txtEducation`, `txtSkills`, `txtExpSalary`, `txtDesiredLocation`, `txtAddinformation`, `status`, `active_date`, `date`, `image1`, `image2`, `image3`,`adtype` ) VALUES ( '$val', '$pid', '$txtJobCategory', '$txtJobExp', '$txtJobStatus', '$txtName', '$txtDob', '$txtMStatus', '$txtAddress','$txtCity', '$txtLocation', '$txtMobile', '$txtAMobile', '$txtEmail', '$txtEducation', '$txtSkills', '$txtExpSalary', '$txtDesiredLocation', '$txtAddinformation', 'DeActive', '', '$date', '$im_name1', '$im_name2', '$im_name3','$adtype' )");
  		$insid = $db->lastInsertId();
  		
  		if($sth > 0) {
  			//$post_msg = '<h4 style="color: green;">Job Seeker Ad Successfully Submitted</h4>';	
  			header('location:add-packages.php?adid='.$insid);
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
        <div class="col-md-6 col-md-offset-3">
          <form id="add_form" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label  class="col-sm-6 control-label">Job Category</label>
              <div class="col-sm-6">
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
            </div>
            <div class="form-group">
              <label class="col-sm-6 control-label">Total Experience</label>
              <div class="col-sm-6">
                <select class="form-control required" name="txtJobExp">
                  <option value="">Select Experience</option>
                  <?php $eth = $db->query("SELECT * FROM `job_exp` ORDER BY `name` ASC");
                   foreach($eth as $erow){
                    echo '<option value="'.$erow['name'].'">'.$erow['name'].'</option>';
                  }?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-6 control-label">Job Status</label>
              <div class="col-sm-6">
                <select class="form-control required" name="txtJobStatus" >
                  <option value="" >Select Job Status</option>
                  <option>Full Time</option>
                  <option>Part Time</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-6 control-label">Full Name</label>
              <div class="col-sm-6">
                <input type="text" class="form-control required" name="txtName" placeholder="Full Name">
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-6 control-label">Date of Birth</label>
              <div class="col-sm-6">
               <!-- <input type="text" class="form-control required datepicker" name="txtDob" placeholder="Date of Birth">-->
                <input type="text" class="form-control required " name="txtDob" placeholder="DD/MM/YYYY">
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-6 control-label">Marital Status</label>
              <div class="col-sm-6">
                <select class="form-control required" name="txtMStatus" >
                  <option value="">Select</option>
                  <option>Single</option>
                  <option>Married</option>
                  <!--option>Separated</option>
                  <option>Divorced or Widowed</option-->
                </select>
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-6 control-label">Address with Pin</label>
              <div class="col-sm-6">
                <textarea class="form-control required" minlength="10" name="txtAddress" placeholder="Address with Pin" rows="2"></textarea>
              </div>
            </div>
                   <div class="form-group">
                     <label  class="col-sm-6 control-label">City</label>
                      <div class="col-sm-6">
                   <input type="text"  readonly class="form-control required" name="txtCity"  value="<?php echo $_COOKIE['areaname']?>" placeholder="City" />
                      </div>
                    </div>
                    <div class="form-group">
                     <label  class="col-sm-6 control-label">Locality</label>
                     <div class="col-sm-6">
                        <select class="form-control required" name="txtLocation"  >
						 <option value="" selected="">Select locality</option>
                          <?php $rth = $db->query("SELECT * FROM `areas` where sid='".$_COOKIE['area']."'  ORDER by name asc");
                           foreach($rth as $re_row){
                            echo '<option>'.$re_row['name'].'</option>';
                           }
                           ?>
						   </select>
                      </div>
                    </div>
			
            <div class="form-group">
              <label  class="col-sm-6 control-label">Phone No. 1</label>
              <div class="col-sm-6">
                <input type="text" class="form-control number required" minlength="10" maxlength="10"  name="txtMobile" placeholder="Phone No. 1" />
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-6 control-label">Phone No. 2</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" minlength="10" maxlength="10" name="txtAMobile" placeholder="Phone No. 2" />
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-6 control-label">Email-id</label>
              <div class="col-sm-6">
                <input type="email" class="form-control email required" name="txtEmail" placeholder="Email-id" />
              </div>
            </div>
<input type="hidden" name="adtype"  value="JOB SEEKER AD" />
            <div class="form-group">
              <label  class="col-sm-6 control-label">
              Educational Information</label>
              <div class="col-sm-6">
                <input type="text" class="form-control required" name="txtEducation" placeholder="Educational Information" />
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-6 control-label">
              Enter Skills</label>
              <div class="col-sm-6">
			  <textarea class="form-control required" maxlength="100" name="txtSkills" placeholder="Enter Skills" rows="2"></textarea>
               <!-- <input type="text" class="form-control required" name="txtSkills" placeholder="Enter Skills" />-->
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-6 control-label">
              Expected Salary</label>
              <div class="col-sm-6">
                <input type="text" class="form-control required"  name="txtExpSalary" placeholder="Expected Salary" />
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-6 control-label">
              Desired Location</label>
              <div class="col-sm-6">
                <select class="form-control required" name="txtDesiredLocation">
                  <option value="">Select Desired Location</option>
                  <?php $cth1 = $db->query("SELECT * FROM `desired_location` ORDER BY name ASC");
                    foreach($cth1 as $crow1){
                        echo '<option>'.$crow1['name'].'</option>';
                    }
                   ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-6 control-label">
              Upload Recent Photo</label>
              <div class="col-sm-6">
                <input type="file" class="required form-control" name="image1" />
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-6 control-label">
              Additional Information</label>
              <div class="col-sm-6">
                <textarea class="form-control required" name="txtAddinformation" placeholder="Additional Information" rows="2"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-6 control-label">
              Upload Resume</label>
              <div class="col-sm-6">
                <input type="file" class="form-control required" name="image2" />
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-6 control-label">
              Upload Video Resume</label>
              <div class="col-sm-6">
                <input type="file" class="form-control" name="image3" />
                <p class="help-block"><small>(Maximum video length 10MB only)</small></p>
              </div>
            </div>
			<div class="form-group">
              <label  class="col-sm-6 control-label">
              Enter Captcha Code</label>
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
  </script> 
</html>