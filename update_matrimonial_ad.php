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
        
    		
          $count = count($_POST["txtsibname"]);
          $txttsibname=$_POST["txtsibname"];	
          $txttsibqualification=$_POST["txtsibqualification"];	
          $txttsiboccupation=$_POST["txtsiboccupation"];	
          $txttsibstatus=$_POST["txtsibstatus"];	
          $txttsibplaceofwork=$_POST["txtsibplaceofwork"];
            
    
    
    		
          //echo "INSERT INTO `matrimonial_ads`( `productid`, `pid`, `searchfor`, `txtName`, `txtQualification`, `txtOccupation`, `txtWorkPlace`, `txtMonthIncome`, `txtBirthCity`, `txtAge`, `txtHeight`, `txtComplexion`, `txtLanguages`, `txtReligion`, `txtSect`, `txtMstatus`, `txtChildren`, `txtFather`, `txtFOccupation`, `txtFPlaceWork`, `txtGPFather`, `txtGPOccupation`, `txtGMFather`, `txtGMOccupation`,`txtNumberofbrs`,`txtNumberofsis`, `txtSiblingsInformation`, `txtAboutFamily`, `txtAddress`, `txtCity`, `txtLocality`, `txtMobile`, `txtAMobile`,`txtEmail`, `status`, `active_date`, `date`, `image1`, `image2`, `image3`,`adtype` ) VALUES ( '$val', '$pid', '$gender', '$txtName', '$txtQualification', '$txtOccupation', '$txtWorkPlace', '$txtMonthIncome', '$txtBirthCity', '$txtAge', '$txtHeight', '$txtComplexion', '$txtLanguages', '$txtReligion', '$txtSect', '$txtMstatus', '$txtChildren', '$txtFather', '$txtFOccupation', '$txtFPlaceWork', '$txtGPFather', '$txtGPOccupation', '$txtGMFather', '$txtGMOccupation', '$txtNumberofbrs','$txtNumberofsis','$txtSiblingsInformation', '$txtAboutFamily', '$txtAddress', '$txtCity', '$txtLocality', '$txtMobile', '$txtAMobile','$txtEmail', 'DeActive', '', '$date', '$im_name1', '$im_name2', '$im_name3','$adtype' )";exit;
      	    $sth = $db->query ("INSERT INTO `matrimonial_ads`( `productid`, `pid`, `searchfor`, `txtName`, `txtQualification`, `txtOccupation`, `txtWorkPlace`, `txtMonthIncome`, `txtBirthCity`, `txtAge`, `txtHeight`, `txtComplexion`, `txtLanguages`, `txtReligion`, `txtSect`, `txtMstatus`, `txtChildren`, `txtFather`, `txtFOccupation`, `txtFPlaceWork`, `txtGPFather`, `txtGPOccupation`, `txtGMFather`, `txtGMOccupation`, `txtNumberofbrs`,`txtNumberofsis`,`txtSiblingsInformation`, `txtAboutFamily`, `txtAddress`, `txtCity`, `txtLocality`, `txtMobile`, `txtAMobile`,`txtEmail`, `status`, `active_date`, `date`, `image1`, `image2`, `image3`,`adtype` ) VALUES ( '$val', '$pid', '$gender', '$txtName', '$txtQualification', '$txtOccupation', '$txtWorkPlace', '$txtMonthIncome', '$txtBirthCity', '$txtAge', '$txtHeight', '$txtComplexion', '$txtLanguages', '$txtReligion', '$txtSect', '$txtMstatus', '$txtChildren', '$txtFather', '$txtFOccupation', '$txtFPlaceWork', '$txtGPFather', '$txtGPOccupation', '$txtGMFather', '$txtGMOccupation','$txtNumberofbrs','$txtNumberofsis', '$txtSiblingsInformation', '$txtAboutFamily', '$txtAddress', '$txtCity', '$txtLocality', '$txtMobile', '$txtAMobile','$txtEmail', 'DeActive', '', '$date', '$im_name1', '$im_name2', '$im_name3','$adtype' )");
      	$insid = $db->lastInsertId(); 
    
    
        for($i=0; $i<$count; $i++)
        {
         
          //echo "INSERT INTO `matrimonial_ads_sib_details` (`pid_sib`,`guid_mat_id`,`txtsibname`,`txtsibqualification`,`txtsiboccupation`,`txtsibstatus`,`txtsibplaceofwork`) VALUES('$pid','$insid','$txttsibname[$i]','$txttsibqualification[$i]','$txttsiboccupation[$i]','$txttsibstatus[$i]','$txttsibplaceofwork[$i]')";exit;
          $sth = $db->query ("INSERT INTO `matrimonial_ads_sib_details` (`pid_sib`,`guid_mat_id`,`txtsibname`,`txtsibqualification`,`txtsiboccupation`,`txtsibstatus`,`txtsibplaceofwork`) VALUES('$pid','$insid','$txttsibname[$i]','$txttsibqualification[$i]','$txttsiboccupation[$i]','$txttsibstatus[$i]','$txttsibplaceofwork[$i]')");
       
         }
      	
  		if($sth > 0) {
  			//$post_msg = '<h4 style="color: green;">Matrimonial Ad Successfully Submitted</h4>';	
  			//header('location:matrimonial_ad.php?post_msg='.$post_msg); ?>
      <script>
      alert("Matrimonial Ad Successfully Submitted");
      window.location="add-packages.php?matrimonialid=<?php echo $insid ?>";
    </script>



  		<?php } else { 
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
                

                <?php  
                 $q = $_GET['guid'];

                 $sth = $db->query ('SELECT * FROM `matrimonial_ads` WHERE `guid`="'.$q.'"');
                 $row = $sth->fetch();
                 //print_r($row);
                 ?>

                <div class="col-md-12">
                <p><strong>Looking for</strong></p>
                </div>
               
                  
                    <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                      <select class="form-control required" name="gender">
                          <option value="">Select</option>
                          <option <?php if($row['searchfor']=='BrideGroom'){ echo 'selected=""'; }?>>BrideGroom</option>
                          <option <?php if($row['searchfor']=='Bride'){ echo 'selected=""'; }?>>Bride</option>
                      </select>

                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                
                   <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                     
                      <div id="divText"><input type="text" value="<?php echo $row['txtName']?>" class="form-control required" minlength="3"  placeholder="Bride's/Groom's Full Name"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control required" value="<?php echo $row['txtQualification']?>" name="txtQualification" placeholder="Qualification">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <!--<input type="text" class="form-control required" name="txtOccupation" placeholder="Occupation">-->
						          
                        <select class="form-control required" name="txtOccupation">
                          <option value="">Select</option>
                          <option <?php if($row['txtOccupation']=='Self Employed / Bussiness'){ echo 'selected=""'; }?>>Self Employed / Bussiness</option>
                          <option <?php if($row['txtOccupation']=='Government Job'){ echo 'selected=""'; }?>>Government Job</option>
                          <option <?php if($row['txtOccupation']=='Private Employee'){ echo 'selected=""'; }?>>Private Employee</option>
                          <option <?php if($row['txtOccupation']=='Working Abroad'){ echo 'selected=""'; }?>>Working Abroad</option>
                          <option <?php if($row['txtOccupation']=='Not Working'){ echo 'selected=""'; }?>>Not Working</option>
                          
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-3" id="wp">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control requried" value="<?php echo $row['txtWorkPlace']?>" name="txtWorkPlace" placeholder="Place of work (enter City)">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <!--<input type="text" class="form-control required" name="txtMonthIncome" placeholder="Monthly Income (Rs.)">-->
						              <select class="form-control required" id="txtMonthIncome" name="txtMonthIncome" aria-required="true">
                          <option <?php if($row['txtMonthIncome']=='Upto 10000'){ echo 'selected=""'; }?>>Upto 10000</option>
                          <option <?php if($row['txtMonthIncome']=='10000 to 20000'){ echo 'selected=""'; }?>>10000 to 20000</option>
                          <option <?php if($row['txtMonthIncome']=='20000 to 30000'){ echo 'selected=""'; }?>>20000 to 30000</option>
                          <option <?php if($row['txtMonthIncome']=='30000 to 50000'){ echo 'selected=""'; }?>>30000 to 50000</option>
                          <option <?php if($row['txtMonthIncome']=='50000 to 100000'){ echo 'selected=""'; }?>>50000 to 100000</option>
                          <option <?php if($row['txtMonthIncome']=='Above 100000'){ echo 'selected=""'; }?>>Above 100000</option>
                          <option <?php if($row['txtMonthIncome']=='No Income'){ echo 'selected=""'; }?>>No Income</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control required" value="<?php echo $row['txtBirthCity']?>" name="txtBirthCity" placeholder="City of Birth">
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                      <select class="form-control required" name="txtAge" aria-required="true">
                          <option value="">Select Age</option>
                          <?php for($a = 18; $a <= 60; $a++){?>
                          <option value="<?php echo $a ?>" <?php if($row['txtAge']==$a){ echo 'selected=""'; }?>><?php echo $a ?></option>
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
                          for($i=134; $i<=213; $i++) {
						  	 $inches = round($i/2.54);$feet = floor($inches/12);$inches = ($inches%12);
						     $val = $feet."ft ".$inches."in - ".$i."cm";
						  ?>
                          <option value="<?php echo $i; ?>" <?php if($row['txtHeight']==$i ){ echo 'selected=""'; }?>><?php echo $val; ?></option>
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
                          <option value="Very Fair" <?php if($row['txtComplexion']=='Very Fair'){ echo 'selected=""'; }?>>Very Fair</option>
                          <option value="Fair"  <?php if($row['txtComplexion']=='Fair'){ echo 'selected=""'; }?>>Fair</option>
                          <option value="Wheatish"  <?php if($row['txtComplexion']=='Wheatish'){ echo 'selected=""'; }?>>Wheatish</option>
                          <option value="Wheatish Medium"  <?php if($row['txtComplexion']=='Wheatish Medium'){ echo 'selected=""'; }?>>Wheatish Medium</option>
                          <option value="Wheatish Brown"  <?php if($row['txtComplexion']=='Wheatish Brown'){ echo 'selected=""'; }?>>Wheatish Brown</option>
                          <option value="Dark" <?php if($row['txtComplexion']=='Dark'){ echo 'selected=""'; }?>>Dark</option>
                      
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control required" name="txtLanguages" value="<?php echo $row['txtLanguages']?>" placeholder="Languages known" />
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
                            echo '<option '; if($re_row['name']==$row['txtReligion']){ $rid = $re_row['guid']; echo 'selected=""'; }echo '>'.$re_row['name'].'</option>';
                           }
                           ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <!-- <select class="form-control required" name="txtSect" id="txtSect">
                          <option value="">Select Sect</option>
                        </select> -->
                        <select class="form-control required" name="txtSect" id="txtSect">
                          <?php 
                          $cth = $db->query ("SELECT * FROM `sects` WHERE `sid`='$rid'"); 
                            ?>
                                <option value="">Select Sect</option>
                            	<?php while($crow = $cth->fetch()) {  
                                  echo "<option value='".$crow[2]."'"; if($crow[2]==$row['txtSect']){ echo 'selected=""'; }echo ">".$crow[2]."</option>";
                            	}
                             ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <select class="form-control required" onChange="return validate(this.value);" id="mstatus" name="txtMstatus" aria-required="true">
                          <option value="">Marital Status</option>
                          <option <?php if($row['txtMstatus']=='UnMarried'){ echo 'selected=""'; }?>>UnMarried</option>
                          <option <?php if($row['txtMstatus']=='Widow/Widower'){ echo 'selected=""'; }?>>Widow/Widower</option>
                          <option <?php if($row['txtMstatus']=='Divorcee'){ echo 'selected=""'; }?>>Divorcee</option>
                          <option <?php if($row['txtMstatus']=='Separated'){ echo 'selected=""'; }?>>Separated</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <select class="form-control required" id="txtChildren" name="txtChildren" <?php if($row['txtMstatus']=='UnMarried'){ echo "style='display:none'"; }?>>
                          <option value="">Select Have Children?</option>
                          <option <?php if($row['txtChildren']=='No'){ echo 'selected=""'; }?>>No</option>
                          <option <?php if($row['txtChildren']=='Yes, Living together'){ echo 'selected=""'; }?>>Yes, Living together</option>
                          <option <?php if($row['txtChildren']=='Yes, Not Living together'){ echo 'selected=""'; }?>>Yes, Not Living together</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control required" value="<?php echo $row['txtFather']?>" name="txtFather" placeholder="Father Name" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <!--<input type="text" class="form-control required" name="txtFOccupation" placeholder="Occupation" />-->
						              <select class="form-control required" id="txtOccupation" name="txtFOccupation" aria-required="true">
                          <option value="">Select Occupation</option>
                          <option <?php if($row['txtFOccupation']=='Self Employed / Bussiness'){ echo 'selected=""'; }?>>Self Employed / Bussiness</option>
                          <option <?php if($row['txtFOccupation']=='Government / Private Job'){ echo 'selected=""'; }?>>Government / Private Job</option>
                          <option <?php if($row['txtFOccupation']=='Retired'){ echo 'selected=""'; }?>>Retired</option>
                          <option <?php if($row['txtFOccupation']=='Land Lord'){ echo 'selected=""'; }?>>Land Lord</option>
                          <option <?php if($row['txtFOccupation']=='Other'){ echo 'selected=""'; }?>>Other</option>
                        </select>
                      </div>
                    </div>
                  <!--</div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control required" name="txtFPlaceWork" placeholder="Place of Work" />
                      </div>
                    </div>-->
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="txtGPFather" value="<?php echo $row['txtGPFather']?>" placeholder="Grand Father (Paternal)" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <!--<input type="text" class="form-control" name="txtGPOccupation"  placeholder="Occupation" />-->
						<select class="form-control required" id="txtOccupation" name="txtGPOccupation" aria-required="true">
                          <option value="">Select Occupation</option>
                          <option <?php if($row['txtGPOccupation']=='Self Employed / Bussiness'){ echo 'selected=""'; }?>>Self Employed / Bussiness</option>
                          <option <?php if($row['txtGPOccupation']=='Government / Private Job'){ echo 'selected=""'; }?>>Government / Private Job</option>
                          <option <?php if($row['txtGPOccupation']=='Retired'){ echo 'selected=""'; }?>>Retired</option>
                          <option <?php if($row['txtGPOccupation']=='Land Lord'){ echo 'selected=""'; }?>>Land Lord</option>
                          <option <?php if($row['txtGPOccupation']=='Other'){ echo 'selected=""'; }?>>Other</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" name="txtGMFather" value="<?php echo $row['txtGMFather']?>" class="form-control" placeholder="Grand Father (Maternal)" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <!--<input type="text" class="form-control" name="txtGMOccupation" placeholder="Occupation" />-->
						              <select class="form-control required" id="txtOccupation" name="txtGMOccupation" aria-required="true">
                          <option value="">Select Occupation</option>
                          <option <?php if($row['txtGMOccupation']=='Self Employed / Bussiness'){ echo 'selected=""'; }?>>Self Employed / Bussiness</option>
                          <option <?php if($row['txtGMOccupation']=='Government / Private Job'){ echo 'selected=""'; }?>>Government / Private Job</option>
                          <option <?php if($row['txtGMOccupation']=='Retired'){ echo 'selected=""'; }?>>Retired</option>
                          <option <?php if($row['txtGMOccupation']=='Land Lord'){ echo 'selected=""'; }?>>Land Lord</option>
                          <option <?php if($row['txtGMOccupation']=='Other'){ echo 'selected=""'; }?>>Other</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  
                     <div class="clearfix"></div>
                  
                  
                    <div class="col-md-12">
                    <div class="form-group">
                      <div class="col-md-12">
                        <label ><strong>About Brother and Sisters (Enter here number of brothers and sisters, their Name, Qualifications, occupations,Status and place of work)</strong></label>
                      
                    

                   <div class="">
                      <label  class="col-sm-2  control-label">
                      No.of Brothers : </label>
                      <div class="col-sm-3">
                      <input type="number"  id="Nofbro" name="txtNumberofbrs" class="form-control" placeholder="No.of Brothers" />
                      </div>
                    </div>
                    
                      <label  class="col-sm-2  control-label">
                      No.of Sisters : </label>
                      <div class="col-sm-3">
                      <input type="number"   id="NofSis" name="txtNumberofsis" class="form-control" placeholder="No.of Sisters" />
                      </div>
                    
                     
                      <div class="col-sm-2">
                      <button type="button" value="CREATE" id="btnNoOfRec" class="btn btn-info pull-right">Create</button> 
                      
                      </div><br>
                      <div class="col-sm-2">
                      
                      
                      </div><br>


                      <div id="AddControll"></div> 
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                 
                <div class="clearfix"></div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label for="exampleInputFile"><strong>About you &amp; family and general Description</strong></label>
                        <textarea class="form-control required" minlength="10" name="txtAboutFamily" rows="3" placeholder="About you &amp; family and general Description"><?php echo $row['txtAboutFamily'];?></textarea>
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
                        <textarea class="form-control required" name="txtAddress" value="" rows="1" placeholder="Address"><?php echo $row['txtAddress'];?></textarea>
                      </div>
                    </div>
                  </div>
                 - <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text"  readonly class="form-control required" name="txtCity"  value="<?php echo $row['txtCity'];?>" placeholder="City" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        

                       <select class="form-control required" name="txtLocality" >
                          <option value="" >Locality of Residence</option>
                          <?php $cth = $db->query("SELECT a.name FROM `areas` a, `cities` c WHERE c.name='".$row['txtCity']."' AND a.sid=c.guid ORDER BY name ASC");
                            foreach($cth as $crow){
                            echo '<option '; if($crow['name']==$row['txtLocality']){ echo "selected=''"; }echo ' >'.$crow['name'].'</option>';
                            }
                           ?>
                        </select>    
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control number required" minlength="10" maxlength="10" id="txtMobile"  name="txtMobile" value="<?php echo $row['txtMobile'];?>" onKeyPress="return checkIt();" placeholder="Mobile No. 1" autocomplete="off">
                       
                      </div>
                    </div>
                  </div>

                  
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control" minlength="10" maxlength="10" value="<?php echo $row['txtAMobile'];?>" name="txtAMobile" placeholder="Mobile No. 2">
                      </div>
                    </div>
                  </div>
				   <input type="hidden"  name="guid" value="<?php echo $row['guid'];?>" />
				   <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="email" class="form-control requried"   value="<?php echo $row['txtEmail'];?>"   name="txtEmail" placeholder="Email">
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  
                 
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
	  
		  if(s=='UnMarried')
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
 $('#txtOccupation').change(function(){
    var id= $(this).val();
//alert(id);
    if(id == 'Not Working'){
    	//alert(id);		
document.getElementById("wp").style.display = "none";

          }else{

document.getElementById("wp").style.display = "block";

               }
    });
  </script> 
  
  
  
  
  <script>
  
 
    function changeSelect() {
    if (document.getElementById("dropBox").value == "1") {
        document.getElementById("divText").innerHTML = "<input type='text' class='form-control required' minlength='3'  placeholder='Bride's/Groom's Full Name'>";
    } else if (document.getElementById("dropBox").value == "BrideGroom") {
        document.getElementById("divText").innerHTML = " <input type='text' class='form-control required' minlength='3' name='txtName' placeholder='BrideGroom Full Name'>";
    } else if (document.getElementById("dropBox").value == "Bride") {
        document.getElementById("divText").innerHTML = " <input type='text' class='form-control required' minlength='3' name='txtName' placeholder='Grooms Full Name'>";
    } 
}
 
 
 
 
 
 
  
  
  
  
$(document).ready(function () {
      load();
   });
   
   function load() {
  
   $("#btnNoOfRec").click(function(){
   $("#AddControll").empty();
  
   var NofSis = parseInt( document.getElementById("NofSis").value )
   var Nofbro = parseInt( document.getElementById("Nofbro").value )
   var NoOfRec = NofSis+Nofbro;
 
 
   if(NoOfRec > 0){
     createControll(NoOfRec);
   }
   
   });
 }
   
 function createControll(NoOfRec){ 
  
  // alert(optAry.length);
   var th = "";
   var td = "";
   var tbl = ""; 
   tbl = "<table class='table table-bordered table-hover'>"+
			"<tr>"+
    			"<th width='5%'>Name</th>"+
    			"<th width='5%'>Qualification </th>"+
          "<th width='5%'>Occupation</th>"+
          "<th width='5%'>Status</th>"+
          "<th width='5%'>Plce of Work</th>";
			
    		tbl += th;
    		
			"</tr>"; 
			for(i = 1; i <= NoOfRec; i++){ 
			tbl += "<tr>"+
			"<td>"+ "<input type='text' class=' table form-control col-3' name='txtsibname[]'  placeholder='Enter Name'/>" + "</td>"+
			"<td>"+"<input type='text' class=' table form-control col-3' name='txtsibqualification[]'  placeholder='Enter Qualification'/>"+"</td>"+
      "<td>"+
            '<select  class="form-control" name="txtsiboccupation[]" id="opt-1">'+
            '<option value="">Select Occupation</option>'+
            '<option value="Government Employee">Government Employee</option>'+
            '<option value="Private Employee">Private Employee</option>'+
            '<option value="Self Business">Self Business</option>'+
            '<option value="Student">Student</option>'+
            '</select>'+
			"</td>"+  
      "<td>"+
            '<select  class="form-control" name="txtsibstatus[]" id="opt-1">'+
            '<option value="">Select Status</option>'+
            '<option value="Married">Married</option>'+
            '<option value="Unmarried">Unmarried</option>'+
            '</select>'+
			"</td>"+  
      "<td>"+"<input type='text' class=' table form-control col-3' name='txtsibplaceofwork[]'  placeholder='Enter Place of Work'/>"+"</td>";
			tbl += td;
			
		
			tbl += "</tr>";

			}
			tbl += "</table>";
			 $("#AddControll").append(tbl);
			} 
function removeRow(i) { 
    jQuery('#NoOfRec tr'+i).remove();
}
   

$("#txtMobile").keyup(function(){
       var userphone=$("#txtMobile").val();
       if($.isNumeric(userphone) && userphone.length==10){
    	  $.ajax({
    			type:"post",
    			url:"cw_admin/ajaxScripts/matrimonial_ad_verification.php",
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
                        $(".success-text").html('<i class="fa fa-check-circle-o"></i>');
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
    			url:"cw_admin/ajaxScripts/matrimonial_ad_verification.php",
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
                        $(".success-text").html('<i class="fa fa-check-circle-o"></i>OTP sent to &nbsp'+userphone+'.<br/>');
                        $(".success-text").addClass("text-success");
    					return true;
    				}
    			}
    		 });	  
          }       
        
    });   
    
 
 
</script>
</html>