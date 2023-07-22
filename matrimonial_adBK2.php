<?php ob_start(); error_reporting(0);
  session_start();
  require("cw_admin/lib/config.php");
  extract($_GET);
  extract($_POST);
  $date = date("Y-m-d");
  if(isset($_POST) && $_POST['submit'] == 'SubmitMatrimonal') {
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
          
      	$res=$db->query("SELECT max(guid) FROM `matrimonial_ads`");
  		$result = $res->fetch();
  		$dt=$result[0];
  		$rest=$db->query("SELECT `productid` FROM `matrimonial_ads` WHERE `guid`='$dt'");
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
  		$val= 'ADM-'.$res;
        $pid = md5($txtName."/".$gender."/".time());
        
		
	//echo "INSERT INTO `matrimonial_ads`( `productid`, `pid`, `searchfor`, `txtName`, `txtQualification`, `txtOccupation`, `txtWorkPlace`, `txtMonthIncome`, `txtBirthCity`, `txtAge`, `txtHeight`, `txtComplexion`, `txtLanguages`, `txtReligion`, `txtSect`, `txtMstatus`, `txtChildren`, `txtFather`, `txtFOccupation`, `txtFPlaceWork`, `txtGPFather`, `txtGPOccupation`, `txtGMFather`, `txtGMOccupation`, `txtSiblingsInformation`, `txtAboutFamily`, `txtAddress`, `txtCity`, `txtLocality`, `txtMobile`, `txtAMobile`,`txtEmail`, `status`, `active_date`, `date`, `image1`, `image2`, `image3` ) VALUES ( '$val', '$pid', '$gender', '$txtName', '$txtQualification', '$txtOccupation', '$txtWorkPlace', '$txtMonthIncome', '$txtBirthCity', '$txtAge', '$txtHeight', '$txtComplexion', '$txtLanguages', '$txtReligion', '$txtSect', '$txtMstatus', '$txtChildren', '$txtFather', '$txtFOccupation', '$txtFPlaceWork', '$txtGPFather', '$txtGPOccupation', '$txtGMFather', '$txtGMOccupation', '$txtSiblingsInformation', '$txtAboutFamily', '$txtAddress', '$txtCity', '$txtLocality', '$txtMobile', '$txtAMobile','$txtEmail', 'DeActive', '', '$date', '$im_name1', '$im_name2', '$im_name3' )"; exit;
		
  	    $sth = $db->query ("INSERT INTO `matrimonial_ads`( `productid`, `pid`, `searchfor`, `txtName`, `txtQualification`, `txtOccupation`, `txtWorkPlace`, `txtMonthIncome`, `txtBirthCity`, `txtAge`, `txtHeight`, `txtComplexion`, `txtLanguages`, `txtReligion`, `txtSect`, `txtMstatus`, `txtChildren`, `txtFather`, `txtFOccupation`, `txtFPlaceWork`, `txtGPFather`, `txtGPOccupation`, `txtGMFather`, `txtGMOccupation`, `txtSiblingsInformation`, `txtAboutFamily`, `txtAddress`, `txtCity`, `txtLocality`, `txtMobile`, `txtAMobile`,`txtEmail`, `status`, `active_date`, `date`, `image1`, `image2`, `image3` ) VALUES ( '$val', '$pid', '$gender', '$txtName', '$txtQualification', '$txtOccupation', '$txtWorkPlace', '$txtMonthIncome', '$txtBirthCity', '$txtAge', '$txtHeight', '$txtComplexion', '$txtLanguages', '$txtReligion', '$txtSect', '$txtMstatus', '$txtChildren', '$txtFather', '$txtFOccupation', '$txtFPlaceWork', '$txtGPFather', '$txtGPOccupation', '$txtGMFather', '$txtGMOccupation', '$txtSiblingsInformation', '$txtAboutFamily', '$txtAddress', '$txtCity', '$txtLocality', '$txtMobile', '$txtAMobile','$txtEmail', 'DeActive', '', '$date', '$im_name1', '$im_name2', '$im_name3' )");
  		if($sth > 0) {
  			$post_msg = '<h4 style="color: green;">Matrimonial Ad Successfully Submitted</h4>';	
  			header('location:matrimonial_ad.php?post_msg='.$post_msg);
  		} else { 
  			$post_msg = '<h4 style="color: red;">Please try Again</h4>';	
  			header('location:matrimonial_ad.php?post_msg='.$post_msg);
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
         <center><?php if(!empty($_GET['post_msg'])){ echo $_GET['post_msg']; }?></center>
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12" style="background-image:url(images/bg-b.jpg); margin-bottom:10px">
              <div style="font-size:16px; color:#fff; font-weight:bold; padding:10px" align="center">Matrimonial Advertisement Form</div>
            </div>
            <div class="col-md-12">
              <div class="row" style="padding-top:20px; padding-bottom:20px">
                <form id="add_form" class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                
                <div class="col-md-12">
                <p><strong>Looking for</strong></p>
                </div>
                <!--<div class="col-md-6">
                <button type="button" class="btn btn-info pull-right">Save</button>
                </div>-->
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <select class="form-control required" name="gender">
                          <option value="">Select</option>
                          <option value="BrideGroom">BrideGroom</option>
                          <option value="Bride">Bride</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control required" minlength="3" name="txtName" placeholder="Full Name">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control required" name="txtQualification" placeholder="Qualification">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <!--<input type="text" class="form-control required" name="txtOccupation" placeholder="Occupation">-->
						<select class="form-control required" id="txtOccupation" name="txtOccupation" aria-required="true">
                          <option value="">Select Occupation</option>
                          <option>Self Employed / Bussiness</option>
                          <option>Job Holder</option>
                          <option>Not Working</option>
                          <option>Land Lord</option>
                          <option>Other</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control requried" name="txtWorkPlace" placeholder="City">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <!--<input type="text" class="form-control required" name="txtMonthIncome" placeholder="Monthly Income (Rs.)">-->
						<select class="form-control required" id="txtMonthIncome" name="txtMonthIncome" aria-required="true">
                          <option value="">Select Monthly Income (Rs.)</option>
                          <option value="20000">  Less Than 20000</option>
                          <option value="20000 to 30000">20000 to 30000</option>
                          <option value="30000 to 50000">30000 to 50000</option>
                          <option value="50000 to 1000000">50000 to 100000</option>
                          <option value="100000"> Above 100000</option>
                         
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control required" name="txtBirthCity" placeholder="City of Birth">
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <select class="form-control required" name="txtAge" aria-required="true">
                          <option value="">Select Age</option>
                          <?php for($i = 18; $i <= 60; $i++){?>
                          <option value="<?php echo $i ?>"><?php echo $i ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <select class="form-control required" id="height" name="txtHeight" aria-required="true">
                          <option value="">Select Height</option>
                          <?php 
                          for($i=139; $i<=213; $i++) {
						  	 $inches = round($i/2.54);$feet = floor($inches/12);$inches = ($inches%12);
						     $val = $feet."ft ".$inches."in - ".$i."cm";
						  ?>
                          <option value="<?php echo $i; ?>" ><?php echo $val; ?></option>
                         <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <select class="form-control required" id="complexion" name="txtComplexion" aria-required="true">
                          <option value="">Select Complexion</option>
                          <option value="Very Fair">Very Fair</option>
                          <option value="Fair">Fair</option>
                          <option value="Wheatish">Wheatish</option>
                          <option value="Wheatish Medium">Wheatish Medium</option>
                          <option value="Wheatish Brown">Wheatish Brown</option>
                          <option value="Dark">Dark</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control required" name="txtLanguages" placeholder="Languages known" />
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <select class="form-control required" name="txtReligion" id="txtReligion">
                          <option value="" selected="">Select Religion</option>
                          <?php $rth = $db->query("SELECT * FROM `religions` ORDER BY `name` ASC");
                           foreach($rth as $re_row){
                            echo '<option>'.$re_row['name'].'</option>';
                           }
                           ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <select class="form-control required" name="txtSect" id="txtSect">
                          <option value="">Select Sect</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <select class="form-control required" onchange="return validate(this.value);" id="mstatus" name="txtMstatus" aria-required="true">
                          <option value="">Select Marital Status</option>
                          <option>Unmarried</option>
                          <option>Widow/Widower</option>
                          <option>Divorced</option>
                          <option>Separated</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <select class="form-control required" id="txtChildren" name="txtChildren">
                          <option value="">Select Have Children?</option>
                          <option>No</option>
                          <option>Yes, Living together</option>
                          <option>Yes, Not Living together</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control required" name="txtFather" placeholder="Father Name" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <!--<input type="text" class="form-control required" name="txtFOccupation" placeholder="Occupation" />-->
						<select class="form-control required" id="txtOccupation" name="txtFOccupation" aria-required="true">
                          <option value="">Select Occupation</option>
                          <option>Self Employed / Bussiness</option>
                          <option>Job Holder</option>
                          <option>Not Working</option>
						  <option>Land Lord</option>
                          <option>Other</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control required" name="txtFPlaceWork" placeholder="Place of Work" />
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="txtGPFather" placeholder="Grand Father(Paternal)" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <!--<input type="text" class="form-control" name="txtGPOccupation"  placeholder="Occupation" />-->
						<select class="form-control required" id="txtOccupation" name="txtGPOccupation" aria-required="true">
                          <option value="">Select Occupation</option>
                          <option>Self Employed / Bussiness</option>
                          <option>Job Holder</option>
                          <option>Not Working</option>
						  <option>Land Lord</option>
                          <option>Other</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" name="txtGMFather" class="form-control" placeholder="Grand Father(Maternal)" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <!--<input type="text" class="form-control" name="txtGMOccupation" placeholder="Occupation" />-->
						<select class="form-control required" id="txtOccupation" name="txtGMOccupation" aria-required="true">
                          <option value="">Select Occupation</option>
                          <option>Self Employed / Bussiness</option>
                          <option>Job Holder</option>
                          <option>Not Working</option>
						  <option>Land Lord</option>
                          <option>Other</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="col-md-12">
                        <label ><strong>About Brother and Sisters</strong></label>
                        <textarea class="form-control required" name="txtSiblingsInformation" maxlength="500"  placeholder="Enter here number of brother and sisters, their qualifications, occupations and place of work" rows="3"></textarea>
                      </div>
                    </div>
                  </div>
                <div class="clearfix"></div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label for="exampleInputFile"><strong>About you &amp; family and general Description</strong></label>
                        <textarea class="form-control required" minlength="10" name="txtAboutFamily" rows="3" placeholder="About you &amp; family and general Description"></textarea>
                      </div>
                    </div>
                  </div>
				  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label for="exampleInputFile"><strong>Upload Photo 1</strong></label>
						<input type="file" name="image1" class="required" />
						<p class="help-block">100 KB below</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label for="exampleInputFile"><strong>Upload Photo 2</strong></label>
                        <input type="file" name="image2" />
						<p class="help-block">100 KB below</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label for="exampleInputFile"><strong>Upload Photo 3</strong></label>
                        <input type="file" name="image3" />
						<p class="help-block">100 KB below</p>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <textarea class="form-control required" name="txtAddress" rows="1" placeholder="Address"></textarea>
                      </div>
                    </div>
                  </div>
                 - <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text"  readonly class="form-control required" name="txtCity"  value=<?php echo $_COOKIE['areaname']?> placeholder="City" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <select class="form-control required" name="txtLocality"  >
						 <option value="" selected="">Select locality</option>
                          <?php $rth = $db->query("SELECT * FROM `areas` where sid='".$_COOKIE['area']."'  ORDER by name asc");
                           foreach($rth as $re_row){
                            echo '<option>'.$re_row['name'].'</option>';
                           }
                           ?>
						   </select>
                      </div>
                    </div>
                  </div>-
                  <div class="clearfix"></div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control number required" minlength="10" maxlength="10" name="txtMobile" onkeypress="return checkIt();" placeholder="Mobile No. 1">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control" minlength="10" maxlength="10" name="txtAMobile" placeholder="Mobile No. 2">
                      </div>
                    </div>
                  </div>
				  
				   <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="email" class="form-control requried"   name="txtEmail" placeholder="Email">
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  
                  <div class="col-md-6">
                  <div class="">
              <div class="form-group">
               <div class="col-md-6">
                <div style="height: 34px; background: #F2F2F2;padding-top: 6px;" align="center">
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
                   <div class="clearfix"></div>
                  
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <button type="submit" name="submit" value="SubmitMatrimonal" class="btn btn-info">Submit</button> <button type="reset" class="btn btn-info">Reset</button>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include("footer.php") ?>
    </div>
    <script src="js/bootstrap.min.js"></script> 
  </body>
  <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
  <script>
  function validate(s){
	  
		  if(s=='Unmarried')
		  {
			  
    
	document.getElementById('txtChildren').style.display="none";
		  
	  }
	  else{
		  
		  document.getElementById('txtChildren').style.display="";
	  }
	  
	 
  }
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
</html>