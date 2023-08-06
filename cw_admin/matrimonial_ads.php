<?php ob_start(); 
error_reporting(0);
require "lib/path.php";
require "lib/config.php";
require "lib/title.php";
require "lib/secure.php";
extract($_GET);
extract($_POST);
$date = date('Y-m-d');
if(isset($_POST) && $_POST['submit'] == 'SaveEdit') {
	//print_r($_POST); exit;
    	$file=$db->query("SELECT * FROM `matrimonial_ads` WHERE `guid`='$guid'");
    	$files= $file->fetch();
        $desc = str_replace("'","~~",$_POST['description']);
    	//stripslashes($_POST);
        $img = '';
        for($i=0; $i < 3; $i++) {
            $j = $i+1;
              //Get the temp file path
              $tmpFilePath = $_FILES['image'.$j]['tmp_name'];
              //Make sure we have a filepath
              if(!empty($tmpFilePath)){
                //Setup our new file path
                $im_name = time().$_FILES['image'.$j]['name'];
                $newFilePath = "../adminupload/" . $im_name;
                //Upload the file into the temp dir
                if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                  unlink("../adminupload/".$files['images'.$j]);
                  //Handle other code here
                  //$img.= $im_name.",";
                  //echo "UPDATE `matrimonial_ads` SET images.$j = '$im_name' WHERE `guid`='$guid'";
                  $db->query("UPDATE `matrimonial_ads` SET image$j = '$im_name' WHERE `guid`='$guid'");
                } 
                //$img.= $im_name.",";
              } 
        }
    	$sth = $db->query ("UPDATE `matrimonial_ads` SET `searchfor`='$gender',`txtName`='$txtName',`txtQualification`='$txtQualification',`txtOccupation`='$txtOccupation',`txtWorkPlace`='$txtWorkPlace',`txtMonthIncome`='$txtMonthIncome',`txtBirthCity`='$txtBirthCity',`txtAge`='$txtAge',`txtHeight`='$txtHeight',`txtComplexion`='$txtComplexion',`txtLanguages`='$txtLanguages',`txtReligion`='$txtReligion',`txtSect`='$txtSect',`txtMstatus`='$txtMstatus',`txtChildren`='$txtChildren',`txtFather`='$txtFather',`txtFOccupation`='$txtFOccupation',`txtFPlaceWork`='$txtFPlaceWork',`txtGPFather`='$txtGPFather',`txtGPOccupation`='$txtGPOccupation',`txtGMFather`='$txtGMFather',`txtGMOccupation`='$txtGMOccupation',`txtNumberofbrs`='$txtNumberofbrs',`txtNumberofsis`='$txtNumberofsis',`txtSiblingsInformation`='$txtSiblingsInformation',`txtAboutFamily`='$txtAboutFamily',`txtAddress`='$txtAddress',`txtCity`='$txtCity',`txtLocality`='$txtLocality',`txtMobile`='$txtMobile',`txtAMobile`='$txtAMobile' WHERE `guid`='$guid'");
    //update variant



     if($_POST["gu_id"]==''){
      $count = count($_POST["txtsibname"]);
     
     }else{
      $count = count($_POST["txtsibqualification"]);
     }

 //Getting post values
    //$count = count($_POST["txtsibname"]);
    $txtsibname=$_POST["txtsibname"];	
    $txtsibqualification=$_POST["txtsibqualification"];	
    $txtsiboccupation=$_POST["txtsiboccupation"];	
    $txtssibstatus=$_POST["txtsibstatus"];	
    $txtsibplaceofwork=$_POST["txtsibplaceofwork"];
    $gu_id=$_POST["guu_id"];
   
        $sth = $db->query ("DELETE FROM `matrimonial_ads_sib_details` WHERE `guid_mat_id`='$guid'");
   for($i=0; $i<$count; $i++)
   {
     $t = $_POST['guid'];

    $res=$db->query("SELECT max(pid) FROM `matrimonial_ads`  WHERE `guid`= '$t' ");
    $result = $res->fetch();
    $dt=$result[0];
    //print_r($count); exit;  

       //echo ("INSERT INTO `matrimonial_ads_sib_details` (`pid_sib`,`guid_mat_id`,`txtsibname`,`txtsibqualification`,`txtsiboccupation`,`txtsibstatus`,`txtsibplaceofwork`) VALUES('$dt','$guid','$txtsibname[$i]','$txtsibqualification[$i]','$txtsiboccupation[$i]','$txtssibstatus[$i]','$txtsibplaceofwork[$i]')");exit;  
           
       $sth = $db->query ("INSERT INTO `matrimonial_ads_sib_details` (`pid_sib`,`guid_mat_id`,`txtsibname`,`txtsibqualification`,`txtsiboccupation`,`txtsibstatus`,`txtsibplaceofwork`) VALUES('$dt','$guid','$txtsibname[$i]','$txtsibqualification[$i]','$txtsiboccupation[$i]','$txtssibstatus[$i]','$txtsibplaceofwork[$i]')");
    
    }

	if($sth > 0) {
	$post_msg = '<h4 style="color: green;">Details Successfully Updated</h4>';	
	header('location:'.URL.'matrimonial_ads.php?post_msg='.$post_msg);
	} else { 
	$post_msg = '<h4 style="color: red;">Please try Again</h4>';	
	header('location:'.URL.'matrimonial_ads.php?post_msg='.$post_msg);
	}
} else { ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo TITLE; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="<?php echo URL; ?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo URL; ?>assets/css/fonts.css">
<link rel="stylesheet" href="<?php echo URL; ?>assets/font-awesome/css/font-awesome.min.css">
<!-- PAGE LEVEL PLUGINS STYLES -->
<link rel="stylesheet" href="<?php echo URL; ?>assets/css/plugins/footable/footable.min.css">
<!-- REQUIRE FOR SPEECH COMMANDS -->
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>assets/css/plugins/gritter/jquery.gritter.css" />
<!-- Tc core CSS -->
<link id="qstyle" rel="stylesheet" href="<?php echo URL; ?>assets/css/themes/style.css">
<link rel="stylesheet" href="<?php echo URL; ?>assets/css/plugins/bootstrap-datepicker/datepicker.css">
<!-- Add custom CSS here -->
<!-- End custom CSS here -->
<!--[if lt IE 9]>
    <script src="<?php echo URL; ?>assets/js/html5shiv.js"></script>
    <script src="<?php echo URL; ?>assets/js/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div id="wrapper">
  <div id="main-container"> 
    <!-- BEGIN TOP NAVIGATION -->
    <?php require "topnavigation.php"; ?>
    <!-- /.navbar-top --> 
    <!-- END TOP NAVIGATION --> 
    <!-- BEGIN SIDE NAVIGATION -->
    <?php require "sidenavigation.php"; ?>
    <!-- /.navbar-side --> 
    <!-- END SIDE NAVIGATION --> 
    <!-- BEGIN MAIN PAGE CONTENT -->
    <div id="page-wrapper"> 
      <!-- BEGIN PAGE HEADING ROW -->
      <div class="row">
        <div class="col-lg-12"> 
          <!-- BEGIN BREADCRUMB -->
          <div class="breadcrumbs">
            <ul class="breadcrumb">
              <li> <a href="<?php echo URL; ?>home.php">Home</a> </li>
              <li class="active"><a href="<?php echo URL; ?>matrimonial_ads.php"> View Matrimony Ads</a></li>
            </ul>
            <div class="b-right hidden-xs">
              <ul>
                
                
                <li class="dropdown"><a href="#" title="" data-toggle="dropdown"><i class="fa fa-plus"></i><span> Tasks</span></a>
                  <ul class="dropdown-menu dropdown-primary dropdown-menu-right">
                    <li><a href="<?php echo URL; ?>matrimonial_ads.php?action=addNew">Add New</a></li>
                    <li><a href="<?php echo URL; ?>matrimonial_ads.php">View Post Add's</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <!-- END BREADCRUMB -->
          <div class="page-header title"> 
            <!-- PAGE TITLE ROW -->
            <h1>Admin <span class="sub-title"><a href="<?php echo URL; ?>matrimonial_ads.php"> View Matrimony Ads</a></span></h1>
          </div>
          <!-- /#ek-layout-button -->
          <div class="qs-layout-menu">
            <div class="btn btn-gray qs-setting-btn" id="qs-setting-btn"> <i class="fa fa-cog bigger-150 icon-only"></i> </div>
            <div class="qs-setting-box" id="qs-setting-box">
              <div class="hidden-xs hidden-sm"> <span class="bigger-120">Layout Options</span>
                <div class="hr hr-dotted hr-8"></div>
                <label>
                  <input type="checkbox" class="tc" id="fixed-navbar" />
                  <span id="#fixed-navbar" class="labels"> Fixed NavBar</span> </label>
                <label>
                  <input type="checkbox" class="tc" id="fixed-sidebar" />
                  <span id="#fixed-sidebar" class="labels"> Fixed NavBar+SideBar</span> </label>
                <label>
                  <input type="checkbox" class="tc" id="sidebar-toggle" />
                  <span id="#sidebar-toggle" class="labels"> Sidebar Toggle</span> </label>
                <label>
                  <input type="checkbox" class="tc" id="in-container" />
                  <span id="#in-container" class="labels"> Inside<strong>.container</strong></span> </label>
                <div class="space-4"></div>
              </div>
              <span class="bigger-120">Color Options</span>
              <div class="hr hr-dotted hr-8"></div>
              <label>
                <input type="checkbox" class="tc" id="side-bar-color" />
                <span id="#side-bar-color" class="labels"> SideBar (Light)</span> </label>
              <ul>
                <li>
                  <button class="btn" style="background-color:#d15050;" onClick="swapStyle('<?php echo URL; ?>assets/css/themes/style.css')"></button>
                </li>
                <li>
                  <button class="btn" style="background-color:#86618f;" onClick="swapStyle('<?php echo URL; ?>assets/css/themes/style-1.css')"></button>
                </li>
                <li>
                  <button class="btn" style="background-color:#ba5d32;" onClick="swapStyle('<?php echo URL; ?>assets/css/themes/style-2.css')"></button>
                </li>
                <li>
                  <button class="btn" style="background-color:#488075;" onClick="swapStyle('<?php echo URL; ?>assets/css/themes/style-3.css')"></button>
                </li>
                <li>
                  <button class="btn" style="background-color:#4e72c2;" onClick="swapStyle('<?php echo URL; ?>assets/css/themes/style-4.css')"></button>
                </li>
              </ul>
            </div>
          </div>
          <!-- /#ek-layout-button --> 
        </div>
        <!-- /.col-lg-12 --> 
      </div>
      <!-- /.row --> 
      <!-- END PAGE HEADING ROW -->
      <?php if(isset($_GET['action'])) {
		  $action =  $_GET['action']; 
		 } if($action == 'changeStatus') {
		$guid = $_GET['guid']; $status = $_GET['status']; 
        if($status=='Active'){
		 $sth = $db->query ("UPDATE `matrimonial_ads` SET `status`='$status', `active_date`='".date('Y-m-d')."' WHERE `guid`='$guid'");
        } else {
		 $sth = $db->query ("UPDATE `matrimonial_ads` SET `status`='$status' WHERE `guid`='$guid'");
        }
		header('location:'.URL.'matrimonial_ads.php'); 
	} else if($action == 'editData') { 
	   $guid = $_GET['guid'];  ?>
      <a href="<?php echo URL; ?>matrimonial_ads.php" class="btn btn-info">Back</a>
      <div class="row">
        <div class="col-lg-12">
          <div class="portlet">
            <div class="portlet-heading dark">
              <div class="portlet-title">
                <h4>View Matrimony Ads</h4>
              </div>
              <div class="portlet-widgets"> <a data-toggle="collapse" data-parent="#accordion" href="#f-6"><i class="fa fa-chevron-down"></i></a> </div>
              <div class="clearfix"></div>
            </div>
            <div id="f-6" class="panel-collapse collapse in">
              <div class="portlet-body col-sm-12">
                <?php $psth = $db->query ("SELECT * FROM `matrimonial_ads` WHERE `guid`='$guid'");
				      $row = $psth->fetch();
				  ?>
                <form role="form" class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label for="exampleInputFile"><strong>Searching for</strong></label>
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
                        <input type="text" class="form-control required" value="<?php echo $row['txtName']?>" minlength="3" name="txtName" placeholder="Full Name">
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
                        <input type="text" class="form-control required" value="<?php echo $row['txtOccupation']?>" name="txtOccupation" placeholder="Occupation">
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control requried" value="<?php echo $row['txtWorkPlace']?>" name="txtWorkPlace" placeholder="Place of work">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control required" value="<?php echo $row['txtMonthIncome']?>" name="txtMonthIncome" placeholder="Monthly Income (Rs.)">
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
                        <input type="text" class="form-control required" value="<?php echo $row['txtLanguages']?>" name="txtLanguages" placeholder="Languages known" />
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
                        <select class="form-control required" id="mstatus"  onChange="return validate(this.value);"  name="txtMstatus" aria-required="true">
                          <option value="">Select Marital Status</option>
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
                        <select class="form-control required"   id="txtChildren" name="txtChildren" <?php if($row['txtMstatus']=='UnMarried'){ echo "style='display:none'"; }?>   >
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
                        <input type="text" class="form-control required" name="txtFather" value="<?php echo $row['txtFather']?>" placeholder="Father Name" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control required" name="txtFOccupation" value="<?php echo $row['txtFOccupation']?>" placeholder="Occupation" />
                      </div>
                    </div>
                  </div>
                  <!--div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control required" name="txtFPlaceWork" value="<?php echo $row['txtFPlaceWork']?>" placeholder="Place of Work" />
                      </div>
                    </div>
                  </div-->
                  <div class="clearfix"></div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="txtGPFather" value="<?php echo $row['txtGPFather']?>" placeholder="Grand Father(Paternal)" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="txtGPOccupation" value="<?php echo $row['txtGPOccupation']?>"  placeholder="Occupation" />
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="txtGMFather" value="<?php echo $row['txtGMFather']?>" class="form-control" placeholder="Grand Father(Maternal)" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="txtGMOccupation" value="<?php echo $row['txtGMOccupation']?>" placeholder="Occupation" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                     
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="txtNumberofbrs" value="<?php echo $row['txtNumberofbrs']?>" placeholder="No.of Brothers" />
                        <label style="font-size:10px;color:red;">No.of Brothers</lable>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control" name="txtNumberofsis" value="<?php echo $row['txtNumberofsis']?>" placeholder="No.of Sisters" />
                        <label style="font-size:10px;color:red;">No.of Sisters</lable>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="col-md-12">
                        <label ><strong>About Brother and Sisters</strong></label>
                        <textarea class="form-control required" name="txtSiblingsInformation" placeholder="Enter here number of brother and sisters, their qualifications, occupations and place of work" rows="3"><?php echo $row['txtSiblingsInformation']?></textarea>
                      </div>
                    </div>
                  </div>




                  <div class="form-group col-md-12">
           
						<table class="table" id="dynamic_field">
           
		      	<tr>
            <?php 
			      $m = $db->query("SELECT * FROM  `matrimonial_ads_sib_details` WHERE  guid_mat_id='$guid'"); 
            //print_r($m);exit;
            while($z = $m->fetch()){
              
          ?>


							<div class="col-sm-3">
              <td> 
              <label  class="control-label">Name</label>
              <input type="text" class="form-control required"   name="txtsibname[]" value="<?php echo $z['txtsibname']?>" placeholder="Enter Name" autocomplete="off"/>
              </td>

              </div>
                <div class="col-sm-3">
                <td>
                  <label  class="control-label">Qualifications</label>
                  <!-- <select class="form-control required area" name="specialisation[]" id="aid" required>
                    <option value="">Select Specialisation</option>
                   
                  </select> -->
                  <input type="text" class="form-control required"  name="txtsibqualification[]"  value="<?php echo $z['txtsibqualification'];?>" placeholder="Qualifications" autocomplete="off"/>
                </td>
              </div>
							<div class="col-sm-1">
              <td><label  class="control-label">Occupations</label>
              <select class="form-control required" id="txtsibqualification"  onChange="return validate(this.value);"  name="txtsiboccupation[]" aria-required="true">
              <option value="">Select Occupations</option>
              <option <?php if($z['txtsiboccupation']=='Government Employee'){ echo 'selected=""'; }?>>Government Employee</option>
              <option <?php if($z['txtsiboccupation']=='Private Employee'){ echo 'selected=""'; }?>>Private Employee</option>
              <option <?php if($z['txtsiboccupation']=='Self Business'){ echo 'selected=""'; }?>>Self Business</option>
              <option <?php if($z['txtsiboccupation']=='Student'){ echo 'selected=""'; }?>>Student</option>
              </select>
              </td>
              </div>
							<div class="col-sm-2">
              <td> 
              <label  class="control-label">Status</label>
              <select class="form-control required" id="mstatus"  onChange="return validate(this.value);"  name="txtsibstatus" aria-required="true">
              <option value="">Select Status</option>
              <option <?php if($z['txtsibstatus']=='Married'){ echo 'selected=""'; }?>>Married</option>
              <option <?php if($z['txtsibstatus']=='Unmarried'){ echo 'selected=""'; }?>>UnMarried</option>
              </select>
              </td>
              </div>
			        <div class="col-sm-1">
              <td>
              <label  class="control-label">Place of work</label>
              <input type="text" class="form-control required"   name="txtsibplaceofwork[]" value="<?php echo $z['txtsibplaceofwork']?>" placeholder="Place of Work" autocomplete="off"/>
              <input type="hidden" class="form-control required"  name="guu_id[]" value="<?php echo $z['guid']?>"/>
              </td>
              </div>
              <div class="col-sm-1">
               <td> 
            
          
               </td>
              </div>
							</tr>
              <?php } ?>
						</table>
						 <button type="button" name="add" id="add" class="btn btn-success"><span>&#43;</span></button>
            </div>










                  <div class="clearfix"></div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label for="exampleInputFile"><strong>About you &amp; family and general Description</strong></label>
                        <textarea class="form-control required" minlength="10" name="txtAboutFamily" rows="3" placeholder="About you &amp; family and general Description"><?php echo $row['txtAboutFamily']?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <textarea class="form-control required" name="txtAddress" rows="1" placeholder="Address"><?php echo $row['txtAddress']?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control required" value="<?php echo $row['txtCity']?>" name="txtCity" placeholder="City" />
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
                        </select>                     </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control number required" value="<?php echo $row['txtMobile']?>" minlength="10" maxlength="10" name="txtMobile" onKeyPress="return checkIt();" placeholder="Mobile No. 1">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="text" class="form-control" value="<?php echo $row['txtAMobile']?>" minlength="10" maxlength="10" name="txtAMobile" placeholder="Mobile No. 2">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <input type="email" class="form-control requried" value="<?php echo $row['txtEmail']?>"  name="txtEmail" placeholder="Email">
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div><br />
                  <div class="col-sm-12">
                        <div class="form-group col-sm-4">
                          <label>Upload Photo1</label>
                          <input type="file" name="image1" class="form-control"/>
                          <?php if(!empty($row['image1'])){?>
                          <img src="../adminupload/<?php echo $row['image1'] ?>" alt="" class="img-thumbnail" height="120px" width="120px"/>
                          <?php } ?>
                        </div>
                        <div class="form-group col-sm-4">
                          <label>Upload Photo2</label>
                          <input type="file" name="image2"  class="form-control"/>
                          <?php if(!empty($row['image2'])){?>
                          <img src="../adminupload/<?php echo $row['image2'] ?>" alt="" class="img-thumbnail" height="120px" width="120px"/>
                          <?php } ?>
                        </div>
                        <div class="form-group col-sm-4">
                          <label>Upload Photo3</label>
                          <input type="file" name="image3"  class="form-control"/>
                          <?php if(!empty($row['image3'])){?>
                          <img src="../adminupload/<?php echo $row['image3'] ?>" alt="" class="img-thumbnail" height="120px" width="120px"/>
                          <?php } ?>
                        </div>
                        </div>
                  </div>
                 <div class="clearfix"></div>
                  <div class="form-actions">
                    <input type="hidden" name="guid" value="<?php echo $guid; ?>"/>
                    <input type="hidden" name="itemid" value="<?php echo $row['productid']; ?>"/>
                    <button type="submit" class="btn btn-primary" value="SaveEdit" name="submit">Submit</button>
                    <button type="reset" class="btn">Reset</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } 
	else if($action == 'deleteData') {
		$guid = $_GET['guid'];
		$rth = $db->query ("SELECT * FROM `matrimonial_ads` WHERE `guid`='$guid'");
        $rrow= $rth->fetch();
        unlink("../adminupload/".$rrow['images1']);
        unlink("../adminupload/".$rrow['images2']);
        unlink("../adminupload/".$rrow['images3']);
		$sth = $db->query ("DELETE FROM `matrimonial_ads` WHERE `guid`='$guid'");
		//$sth->execute();
		header('location:'.URL.'matrimonial_ads.php'); 
	} else { ?>
      <!--<a href="<?php //echo URL; ?>matrimonial_ads.php?action=addNew" class="btn btn-success btn-xs">Add New Category Ad</a>-->
      <div class="row">
        <div class="col-lg-12">
          <?php if(!empty($post_msg)) { ?>
          <div class="page-header no-padding-bottom"> <?php echo $post_msg; ?> </div>
          <?php  }
            $sth = $db->query ("SELECT * FROM `matrimonial_ads` ORDER BY `guid` DESC");
			$count = $sth->rowCount();
								// $count;
								 ?>
          <!-- START YOUR CONTENT HERE -->
          <div class="portlet table-responsive"><!-- /Portlet -->
            <div class="portlet-heading dark">
              <div class="portlet-title">
                <h4>View Matrimony Ads</h4>
              </div>
              <div class="portlet-widgets"><a data-toggle="collapse" data-parent="#accordion" href="#basic"><i class="fa fa-chevron-down"></i></a> <span class="divider"></span> <a href="#" class="box-close"><i class="fa fa-times"></i></a> </div>
              <div class="clearfix"></div>
            </div>
            <div id="basic" class="panel-collapse collapse in">
              <div class="portlet-body no-padding table-responsive">
                <div class="well white">
                  <table id="SampleDT" class="datatable table table-hover table-striped table-bordered tc-table ">
                    <thead>
                      <tr>
                        <th data-class="expand" class="center">S.No</th>
                        <th data-class="expand" class="center">Activate/<br/>DeActivate</th>
                        <th data-class="expand" class="center">Name</th>
                        <th data-class="expand" class="center">Reference Id</th>
                        <th data-class="expand" class="center">Photo Gallery</th>
                        <th data-class="expand" class="center">View Profile</th>
                        <th data-class="expand" class="center">Searching for</th>
                        <th data-class="expand" class="center">Date of Posting</th>
                        <th data-class="expand" class="center">Date of Activation</th>
                        <th data-class="expand" class="center">Edit/ Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if($count > 0) { 
						$m = 1;
						while($row = $sth->fetch()) {

					?>
                      <tr>
                       <td class="center"><a href="javascript:;" class="btn btn-xs btn-info payment-button" data-id="<?php echo $row[0] ?>"><i class="fa fa-link"></i><?php echo $m; ?> </a></td>
                        <td class="center">
                        <div class="form-group">
                        <label><input type="radio" onClick="window.location='<?php echo URL; ?>matrimonial_ads.php?action=changeStatus&guid=<?php echo $row[0]; ?>&status=Active'" <?php if($row['status']=='Active'){ echo "checked"; }?> /> Activate</label><br />
                        <label><input type="radio" onClick="window.location='<?php echo URL; ?>matrimonial_ads.php?action=changeStatus&guid=<?php echo $row[0]; ?>&status=DeActive'" <?php if($row['status']=='DeActive'){ echo "checked"; }?> /> DeActivate</label><br />
                        </div>
                        </td>
                        <td class="center"><?php echo $row['txtName'] ?></td>
                        <td class="center"><?php echo $row['productid'] ?></td>
                        <td class="center"><a href="javascript:;" class="btn btn-xs btn-info gallery-button" data-id="<?php echo $row[0] ?>"><i class="fa fa-link"></i> View</a></td>
                        <td class="center"><a href="<?php echo URL; ?>matrimonial_ads.php?action=editData&guid=<?php echo $row[0]; ?>" class="btn btn-xs btn-info" ><i class="fa fa-link"></i> View</a></td>
                        <td class="center"><?php echo $row['searchfor']; ?></td>
                        <td class="center"><?php echo $row['date']; ?></td>
                        <td class="center"><?php if($row['active_date']!='' && $row['active_date']!='0000-00-00')echo $row['active_date']; else echo "Not Activated yet" ?></td>
                        <td class="center"><div class="btn-group btn-group-xs"><a href="<?php echo URL; ?>matrimonial_ads.php?action=editData&guid=<?php echo $row[0]; ?>"  class="btn btn-inverse"><i class="fa fa-edit icon-only"></i></a> <a href="<?php echo URL; ?>matrimonial_ads.php?action=deleteData&guid=<?php echo $row[0]; ?>" class="btn btn-danger" onClick="return delete1();"><i class="fa fa-trash icon-only"></i></a> </div></td>
                      </tr>
                      <?php $m++; } } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- /Portlet --> 
        </div>
      </div>
      <?php } ?>
      <!-- BEGIN FOOTER CONTENT -->
      <?php require "footer.php"; ?>
      </button>
      <!-- END FOOTER CONTENT --> 
    </div>
    <!-- /#page-wrapper --> 
    <!-- END MAIN PAGE CONTENT --> 
  </div>
</div>
<div class="modal fade" id="gallery-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Service Gallery</h4>
      </div>
      <div class="modal-body gallery-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="payment-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Payment Details</h4>
      </div>
      <div class="modal-body payment-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- core JavaScript --> 
<script src="<?php echo URL; ?>assets/js/jquery.min.js"></script> 
<script src="<?php echo URL; ?>assets/js/bootstrap.min.js"></script> 
<script src="<?php echo URL; ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script> 
<script src="<?php echo URL; ?>assets/js/plugins/pace/pace.min.js"></script> 
<!-- PAGE LEVEL PLUGINS JS --> 
<script src="<?php echo URL; ?>assets/js/plugins/footable/footable.min.js"></script> 
<script src="<?php echo URL; ?>assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script> 
<script src="<?php echo URL; ?>assets/js/plugins/datatables/jquery.dataTables.min.js"></script> 
<script src="<?php echo URL; ?>assets/js/plugins/datatables/datatables.js"></script> 
<script src="<?php echo URL; ?>assets/js/plugins/datatables/datatables.responsive.js"></script> 
<!-- Themes Core Scripts --> 
<script src="<?php echo URL; ?>assets/js/main.js"></script> 
<!-- REQUIRE FOR SPEECH COMMANDS --> 
<script src="<?php echo URL; ?>assets/js/speech-commands.js"></script> 
<script src="<?php echo URL; ?>assets/js/plugins/gritter/jquery.gritter.min.js"></script> 
<!-- initial page level scripts for examples --> 
<script src="<?php echo URL; ?>assets/js/plugins/slimscroll/jquery.slimscroll.init.js"></script> 
<script src="<?php echo URL; ?>assets/js/plugins/footable/footable.init.js"></script> 
<script src="<?php echo URL; ?>assets/js/plugins/datatables/datatables.init.js"></script> 

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
</script> 


<script type="text/javascript">
	$(document).ready(function() {
	 $('.datepicker').datepicker( {autoclose: true, todayHighlight: true, format: 'yyyy-mm-dd'} );
	});
	//for tables checkbox demo
		jQuery(function($) {
			$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
				});
			});
	</script> 
<script type="text/javascript">
function delete1(){
  if(window.confirm("Confirm delete"))  {
   return true;
  } else
   return false;
}
</script> 
<script type="text/javascript">
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

$('.gallery-button').click(function(){
var id= $(this).data('id');
$.ajax({
		  type:"post",
		  url:"<?php echo URL; ?>ajaxGallery.php",
		  data:"guid="+id+"&action=fetchexpm",
			  success:function(response){
				  $('.gallery-body').html(response);
                  $('#gallery-modal').modal("show", {backdrop: 'static'});
				return true;
		  }
	   });
});



$('.payment-button').click(function(){
var id= $(this).data('id');
$.ajax({
		  type:"post",
		  url:"<?php echo URL; ?>ajaxpayment.php",
		  data:"guid="+id+"&action=matrimonialad",
			  success:function(response){
				  $('.payment-body').html(response);
                  $('#payment-modal').modal("show", {backdrop: 'static'});
				return true;
		  }
	   });
});
</script> 
<script type="text/javascript">
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






$(document).ready(function(){
	var i=1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text"  name="txtsibname[]" placeholder="Enter Name" class="form-control name_list" /> </td><td><input type="text"  name="txtsibqualification[]" placeholder="Qualification" class="form-control name_list" /> </td> <td><select class="form-control required spec" name="txtsiboccupation[]" id="spec_'+i+'" required><option value="">Select Occupation</option><option value="Government Employee">Government Employee</option><option value="Private Employee">Private Employee</option><option value="Self Business">Self Business</option><option value="Student">Student</option></select></td><td><select class="form-control required spec" name="txtsibstatus[]" id="spec_'+i+'" required><option value="">Select Status</option><option value="Married">Married</option><option value="Unmarried">Unmarried</option></select></td><td><input type="text"  name="txtsibplaceofwork[]" placeholder="Please of Work" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	

    


    
	    $('#quali_'+i).change(function(){
      //alert('hi');
    var cid= $(this).val();
   console.log(cid);
    $.ajax({
    type:"post",
    //url:"https://adschronicle.com//ajaxReq2.php",
    url:"http://localhost/adschronicle/ajaxReq2.php",
    data:"cid="+cid+"&action=fetchexp1",
     success:function(response){
      $('#spec_'+i).html(response);
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
</body>
</html>
<?php } ?>