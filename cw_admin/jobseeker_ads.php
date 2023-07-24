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
  $choice=implode(',',$_POST['txtSkills']);
    	$file=$db->query("SELECT * FROM `jobseeker_ads` WHERE `guid`='$guid'");
    	$files= $file->fetch();
        $desc = str_replace("'","~~",$_POST['description']);
    	stripslashes($_POST);
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
                  //echo "UPDATE `jobseeker_ads` SET images.$j = '$im_name' WHERE `guid`='$guid'";
                  $db->query("UPDATE `jobseeker_ads` SET image$j = '$im_name' WHERE `guid`='$guid'");
                } 
                //$img.= $im_name.",";
              } 
        }
       echo " UPDATE `jobseeker_ads` SET `txtJobCategory`='$txtJobCategory',`txtJobExp`='$txtJobExp',`txtJobStatus`='$txtJobStatus',`txtName`='$txtName',`txtDob`='$txtDob',`txtMStatus`='$txtMStatus',`txtAddress`='$txtAddress',`txtCity`='$txtCity',`txtLocation`='$txtLocation',`txtMobile`='$txtMobile',`txtAMobile`='$txtAMobile',`txtEmail`='$txtEmail',`txtEducation`='$txtEducation',`txtSkills`='$choice',`txtExpSalary`='$txtExpSalary',`txtDesiredLocation`='$txtDesiredLocation',`txtAddinformation`='$txtAddinformation' WHERE `guid`='$guid'"; exit;
    	$sth = $db->query ("UPDATE `jobseeker_ads` SET `txtJobCategory`='$txtJobCategory',`txtJobExp`='$txtJobExp',`txtJobStatus`='$txtJobStatus',`txtName`='$txtName',`txtDob`='$txtDob',`txtMStatus`='$txtMStatus',`txtAddress`='$txtAddress',`txtCity`='$txtCity',`txtLocation`='$txtLocation',`txtMobile`='$txtMobile',`txtAMobile`='$txtAMobile',`txtEmail`='$txtEmail',`txtEducation`='$txtEducation',`txtSkills`='$choice',`txtExpSalary`='$txtExpSalary',`txtDesiredLocation`='$txtDesiredLocation',`txtAddinformation`='$txtAddinformation' WHERE `guid`='$guid'");
    //update variant
	if($sth > 0) {
	$post_msg = '<h4 style="color: green;">Details Successfully Updated</h4>';	
	header('location:'.URL.'jobseeker_ads.php?post_msg='.$post_msg);
	} else { 
	$post_msg = '<h4 style="color: red;">Please try Again</h4>';	
	header('location:'.URL.'jobseeker_ads.php?post_msg='.$post_msg);
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
              <li class="active"><a href="<?php echo URL; ?>jobseeker_ads.php"> View Jobseeker Ads</a></li>
            </ul>
            <div class="b-right hidden-xs">
              <ul>
                
                
                <li class="dropdown"><a href="#" title="" data-toggle="dropdown"><i class="fa fa-plus"></i><span> Tasks</span></a>
                  <ul class="dropdown-menu dropdown-primary dropdown-menu-right">
                    <li><a href="<?php echo URL; ?>jobseeker_ads.php?action=addNew">Add New</a></li>
                    <li><a href="<?php echo URL; ?>jobseeker_ads.php">View Post Add's</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <!-- END BREADCRUMB -->
          <div class="page-header title"> 
            <!-- PAGE TITLE ROW -->
            <h1>Admin <span class="sub-title"><a href="<?php echo URL; ?>jobseeker_ads.php"> View Jobseeker Ads</a></span></h1>
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
                  <button class="btn" style="background-color:#d15050;" onclick="swapStyle('<?php echo URL; ?>assets/css/themes/style.css')"></button>
                </li>
                <li>
                  <button class="btn" style="background-color:#86618f;" onclick="swapStyle('<?php echo URL; ?>assets/css/themes/style-1.css')"></button>
                </li>
                <li>
                  <button class="btn" style="background-color:#ba5d32;" onclick="swapStyle('<?php echo URL; ?>assets/css/themes/style-2.css')"></button>
                </li>
                <li>
                  <button class="btn" style="background-color:#488075;" onclick="swapStyle('<?php echo URL; ?>assets/css/themes/style-3.css')"></button>
                </li>
                <li>
                  <button class="btn" style="background-color:#4e72c2;" onclick="swapStyle('<?php echo URL; ?>assets/css/themes/style-4.css')"></button>
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
		 $sth = $db->query ("UPDATE `jobseeker_ads` SET `status`='$status', `active_date`='".date('Y-m-d')."' WHERE `guid`='$guid'");
        } else {
		 $sth = $db->query ("UPDATE `jobseeker_ads` SET `status`='$status' WHERE `guid`='$guid'");
        }
		header('location:'.URL.'jobseeker_ads.php'); 
	} else if($action == 'editData') { 
	   $guid = $_GET['guid'];  ?>
      <a href="<?php echo URL; ?>jobseeker_ads.php" class="btn btn-info">Back</a>
      <div class="row">
        <div class="col-lg-12">
          <div class="portlet">
            <div class="portlet-heading dark">
              <div class="portlet-title">
                <h4>View JobSeeker Ad</h4>
              </div>
              <div class="portlet-widgets"> <a data-toggle="collapse" data-parent="#accordion" href="#f-6"><i class="fa fa-chevron-down"></i></a> </div>
              <div class="clearfix"></div>
            </div>
            <div id="f-6" class="panel-collapse collapse in">
              <div class="portlet-body col-sm-12">
                <?php $psth = $db->query ("SELECT * FROM `jobseeker_ads` WHERE `guid`='$guid'");
				      $row = $psth->fetch();
             // print_r($row);exit;
				  ?>
                <form role="form" method="post" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                    <div class="form-group">
                      <label  class="col-sm-4  control-label">Job Category</label>
                      <div class="col-sm-6">
                        <select class="form-control required" name="txtJobCategory" >
                          <option value="">Select Job Category</option>
                          <?php 
                            $jth = $db->query("SELECT * FROM `job_category` ORDER BY `name` ASC");
                            foreach($jth as $jrow){
                                echo '<option '; if($jrow['name']==$row['txtJobCategory']){ echo "selected=''"; }echo '>'.$jrow['name'].'</option>';
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4  control-label">Total Experience</label>
                      <div class="col-sm-6">
                        <select class="form-control required" name="txtJobExp">
                          <option value="">Select Experience</option>
                          <?php $eth = $db->query("SELECT * FROM `job_exp` ORDER BY `name` ASC");
                           foreach($eth as $erow){
                            echo '<option value="'.$erow['name'].'"'; if($erow['name']==$row['txtJobExp']){ echo "selected=''"; }echo ' >'.$erow['name'].'</option>';
                          }?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label  class="col-sm-4  control-label">Job Status</label>
                      <div class="col-sm-6">
                        <select class="form-control required" name="txtJobStatus" >
                          <option value="" >Select Job Status</option>
                          <option <?php if($row['txtJobStatus']=='Full Time'){ echo 'selected'; }?>>Full Time</option>
                          <option <?php if($row['txtJobStatus']=='Part Time'){ echo 'selected'; }?>>Part Time</option>
                          <!--<option <?php if($row['txtJobStatus']=='Contract Basic'){ echo 'selected'; }?>>Contract Basic</option>-->
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label  class="col-sm-4  control-label">Full Name</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control required" value="<?php echo $row['txtName']?>" name="txtName" placeholder="Full Name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label  class="col-sm-4  control-label">Date of Birth</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control required " value="<?php echo $row['txtDob']?>" name="txtDob" placeholder="DD/MM/YYYY">
                      </div>
                    </div>
                    <div class="form-group">
                      <label  class="col-sm-4  control-label">Marital Status</label>
                      <div class="col-sm-6">
                        <select class="form-control required" name="txtMStatus" >
                          <option value="">Select</option>
                          <option <?php if($row['txtMStatus']=='Single'){ echo 'selected'; }?>>Single</option>
                          <option <?php if($row['txtMStatus']=='Married'){ echo 'selected'; }?>>Married</option>
                          <!--option <?php if($row['txtMStatus']=='Separated'){ echo 'selected'; }?>>Separated</option>
                          <option <?php if($row['txtMStatus']=='Divorced or Widowed'){ echo 'selected'; }?>>Divorced or Widowed</option-->
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label  class="col-sm-4  control-label">Address with Pin</label>
                      <div class="col-sm-6">
                        <textarea class="form-control required" minlength="10" name="txtAddress" placeholder="Address with Pin" rows="2"><?php echo $row['txtAddress']?></textarea>
                      </div>
                    </div>
					<div class="form-group">
                      <label  class="col-sm-4  control-label">City</label>
                      <div class="col-sm-6">
                        <input class="form-control required" name="txtCity" placeholder="City"  value="<?php echo $row['txtCity']?>"/>
                      </div>
                    </div>
					
                    <div class="form-group">
                      <label  class="col-sm-4  control-label">Select Locality</label>
                      <div class="col-sm-6">
                        <select class="form-control required" name="txtLocation" >
                          <option value="" >Locality of Residence</option>
                          <?php $cth = $db->query("SELECT a.name FROM `areas` a, `cities` c WHERE c.name='".$row['txtCity']."' AND a.sid=c.guid ORDER BY name ASC");
                            foreach($cth as $crow){
                            echo '<option '; if($crow['name']==$row['txtLocation']){ echo "selected=''"; }echo ' >'.$crow['name'].'</option>';
                            }
                           ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label  class="col-sm-4  control-label">Phone No. 1</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control number required" minlength="10" maxlength="10" value="<?php echo $row['txtMobile']?>"  name="txtMobile" placeholder="Phone No. 1" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label  class="col-sm-4  control-label">Phone No. 2</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control" minlength="10" maxlength="10" value="<?php echo $row['txtAMobile']?>" name="txtAMobile" placeholder="Phone No. 2" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label  class="col-sm-4  control-label">Email-id</label>
                      <div class="col-sm-6">
                        <input type="email" class="form-control email required" name="txtEmail" value="<?php echo $row['txtEmail']?>" placeholder="Email-id" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label  class="col-sm-4  control-label">
                      Educational Information</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control required" name="txtEducation" value="<?php echo $row['txtEducation']?>" placeholder="Educational Information" />
                      </div>
                    </div>

                    <div class="form-group">
                      <label  class="col-sm-4  control-label">
                      Enter Skills </label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control required"  readonly value="<?php echo $row['txtSkills']?>" placeholder="Educational Information" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label  class="col-sm-4  control-label">
                      Enter Skills Updated</label>
                      <div class="col-sm-6">
                      <select multiple="multiple" name="txtSkills[]" class="SlectBox form-control required">
                <?php $citt = $db->query("SELECT * FROM `skills` $srr ORDER BY `name` ASC");
                  while($ciroww = $citt->fetch()){ ?>
                <option value="<?php echo $ciroww['name'] ?>" ><?php echo $ciroww['name'] ?></option>
                <?php } ?>
              </select>
                  </div>
                    </div>

                   

                    
                    <div class="form-group">
                      <label  class="col-sm-4  control-label">
                      Expected Salary</label>
                      <div class="col-sm-6">
                        <input type="text" class="form-control required" name="txtExpSalary" value="<?php echo $row['txtExpSalary']?>" placeholder="Expected Salary" />
                      </div>
                    </div>
                    <div class="form-group">
                      <label  class="col-sm-4  control-label">
                      Desired Location</label>
                      <div class="col-sm-6">
                         <select class="form-control required" name="txtDesiredLocation">
                  <option value="">Select Desired Location</option>
                  <?php $cth1 = $db->query("SELECT * FROM `desired_location` ORDER BY name ASC");
                    foreach($cth1 as $crow1){ ?>
                     <option  <?php if($crow1['name']==$row['txtDesiredLocation']) { echo 'Selected'; }  ?> >  <?=$crow1['name']; ?> </option>
                    <?php  }
                   ?>
                </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label  class="col-sm-4  control-label">
                      Additional Information</label>
                      <div class="col-sm-6">
                        <textarea class="form-control required" name="txtAddinformation" placeholder="Additional Information" rows="2"><?php echo $row['txtAddinformation']?></textarea>
                      </div>
                    </div>

                    
                   
                    <div class="col-sm-12">

                      
                         
                              
                                    <div class="col-md-2">
                                        <div class="form-group mb-2">
                                            <label for="">Qualification</label>
                                          <select class="form-control required super" name="txtEducation[]" id="cid" >
                                          <option value="">Select Qualifications</option>
                                          <?php $sth = $db->query ("SELECT * FROM `qualification` order by name asc");
                                          while($row = $sth->fetch()) {
                                          echo "<option value='".$row[0]."'>".$row['name']."</option>";
                                          } ?>
                                          </select>
                                          
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-2">
                                            <label for="">Specialisation</label>
                                            <select class="form-control required area" name="specialisation[]" id="aid" required>
                    <option value="">Select Specialisation</option>
                  </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-2">
                                            <label for="">% Marks</label>
                                            <input type="text" name="Marks[]" class="form-control" required placeholder="Enter Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-2">
                                            <label for="">University</label>
                                            <input type="text" name="University[]" class="form-control" required placeholder="University">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group mb-2">
                                            <label for="">Year of Passing</label>
                                            <input type="text" name="YearofPassing[]" class="form-control" required placeholder="Year of Passing">   <br>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                               <label for="">dfdffffffffsd</label>
                                        <a href="javascript:void(0)" class="add-more-form float-end btn btn-success"><span>&#43;</span></a>
                                        </div>
                                    </div>
                              
                           

                            <div class="paste-new-forms"></div>

                        

                    </div>
                



                  <div class="clearfix"></div><br />
                  <div class="col-sm-12">
                        <div class="form-group col-sm-4">
                          <label>Upload Photo</label>
                          <input type="file" name="image1" class="form-control"/>
                          <?php if(!empty($row['image1'])){?>
                          <img src="../adminupload/<?php echo $row['image1'] ?>" alt="" class="img-thumbnail" width="50%"/>
                          <?php } ?>
                        </div>
                        <div class="form-group col-sm-4">
                          <label>Upload Resume</label>
                          <input type="file" name="image2"  class="form-control"/>
                          <?php if(!empty($row['image2'])){?>
                          <a href="../adminupload/<?php echo $row['image2'] ?>" target="_blank" >View</a>
                          <?php } ?>
                        </div>
                        <div class="form-group col-sm-4">
                          <label>Image for Page3 (2)</label>
                          <input type="file" name="image3"  class="form-control"/>
                          <?php if(!empty($row['image3'])){?>
                          <a href="../adminupload/<?php echo $row['image3'] ?>" target="_blank" >View</a>
                          <?php } ?>
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
		$rth = $db->query ("SELECT * FROM `jobseeker_ads` WHERE `guid`='$guid'");
        $rrow= $rth->fetch();
        unlink("../adminupload/".$rrow['images1']);
        unlink("../adminupload/".$rrow['images2']);
        unlink("../adminupload/".$rrow['images3']);
		$sth = $db->query ("DELETE FROM `jobseeker_ads` WHERE `guid`='$guid'");
		//$sth->execute();
		header('location:'.URL.'jobseeker_ads.php'); 
	} else { ?>
      <!--<a href="<?php //echo URL; ?>jobseeker_ads.php?action=addNew" class="btn btn-success btn-xs">Add New Category Ad</a>-->
      <div class="row">
        <div class="col-lg-12">
          <?php if(!empty($post_msg)) { ?>
          <div class="page-header no-padding-bottom"> <?php echo $post_msg; ?> </div>
          <?php  }
            $sth = $db->query ("SELECT * FROM `jobseeker_ads` ORDER BY `guid` DESC");
			$count = $sth->rowCount();
								// $count;
								 ?>
          <!-- START YOUR CONTENT HERE -->
          <div class="portlet table-responsive"><!-- /Portlet -->
            <div class="portlet-heading dark">
              <div class="portlet-title">
                <h4>View Jobseeker Ads</h4>
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
                        <th data-class="expand" class="center">ID</th>
                        <th data-class="expand" class="center">Job Category</th>
                        <th data-class="expand" class="center">Photo</th>
                        <th data-class="expand" class="center">Video Resume</th>
                        <th data-class="expand" class="center">View Resume</th>
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
<td class="center"><a href="javascript:;" class="btn btn-xs btn-info payment-button" data-id="<?php echo $row[0] ?>"><i class="fa fa-link"></i><?php echo $m; ?> </a></td>                        <td class="center">
                        <div class="form-group">
                        <label><input type="radio" onclick="window.location='<?php echo URL; ?>jobseeker_ads.php?action=changeStatus&guid=<?php echo $row[0]; ?>&status=Active'" <?php if($row['status']=='Active'){ echo "checked"; }?> /> Activate</label><br />
                        <label><input type="radio" onclick="window.location='<?php echo URL; ?>jobseeker_ads.php?action=changeStatus&guid=<?php echo $row[0]; ?>&status=DeActive'" <?php if($row['status']=='DeActive'){ echo "checked"; }?> /> DeActivate</label><br />
                        </div>
                        </td>
                        <td class="center"><?php echo $row['txtName'] ?></td>
                        <td class="center"><?php echo $row['productid'] ?></td>
                        <td class="center"><?php echo $row['txtJobCategory']; ?></td>
                        <td class="center" style="width: 10%;"><img src="<?php if(file_exists("../adminupload/".$row['image1'])) echo "../adminupload/".$row['image1']; ?>" width="100%" /></td>
                        <td class="center"><?php if(file_exists("../adminupload/".$row['image3'])){?><a href="<?php echo "../adminupload/".$row['image3']; ?>" target="_blank" >View</a> <?php }  ?></td>
                         <td class="center"><?php if(file_exists("../adminupload/".$row['image2'])){?><a href="<?php echo "../adminupload/".$row['image2']; ?>" target="_blank" >View</a> <?php }  ?></td>
                        <td class="center"><?php echo $row['date'] ?></td>
                        <td class="center"><?php if($row['active_date']!='' && $row['active_date']!='0000-00-00')echo $row['active_date']; else echo "Not Activated yet" ?></td>
                        <td class="center"><div class="btn-group btn-group-xs"><a href="<?php echo URL; ?>jobseeker_ads.php?action=editData&guid=<?php echo $row[0]; ?>"  class="btn btn-inverse"><i class="fa fa-edit icon-only"></i></a> <a href="<?php echo URL; ?>jobseeker_ads.php?action=deleteData&guid=<?php echo $row[0]; ?>" class="btn btn-danger" onClick="return delete1();"><i class="fa fa-trash icon-only"></i></a> </div></td>
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
	<script> 

    
    $('.super').change(function(){
      
    var cid= $(this).val();
    console.log(cid);
    $.ajax({
    type:"post",
    url:"http://localhost/adschronicle//ajaxReq2.php",
    data:"cid="+cid+"&action=fetchexp1",
     success:function(response){
      $('.area').html(response);
    return true;
    }
    });
    });
    </script> 
    <script>
        $(document).ready(function () {

            $(document).on('click', '.remove-btn', function () {
                $(this).closest('.main-form').remove();
            });
            
            $(document).on('click', '.add-more-form', function () {
                $('.paste-new-forms').append('<div class="main-form mt-3 col-sm-12 border-bottom">\
                                 <div class="col-md-2">\
                                        <div class="form-group mb-2">\
                                         <select class="form-control required super" name="txtEducation[]" id="cid" >\
                                          <option value="">Select Qualifications</option>\
                                          <?php  $sth = $db->query ('SELECT * FROM `qualification` order by name asc');
                                          while($row = $sth->fetch()) {
                                          echo '<option  value='.$row[0]. '>'.$row['name'].'</option>';
                                          }?>
                                          </select>\
                                        </div>\
                                    </div>\
                                    <div class="col-md-2">\
                                        <div class="form-group mb-2">\
                                            <select class="form-control required area" name="specialisation[]" id="aid" required>\
                                             <option value="">Select Specialisation</option>\
                                            </select>\
                                        </div>\
                                    </div>\
                                    <div class="col-md-2">\
                                        <div class="form-group mb-2">\
                                            <input type="text" name=Marks[]" class="form-control" required placeholder="% Marks">\
                                        </div>\
                                    </div>\
                                    <div class="col-md-2">\
                                        <div class="form-group mb-2">\
                                           <input type="text" name="University[]" class="form-control" required placeholder="Enter University">\
                                        </div>\
                                    </div>\
                                    <div class="col-md-2">\
                                        <div class="form-group mb-2">\
                                            <input type="text" name="YearofPassing[]" class="form-control" required placeholder="Enter Year of Passing">\
                                        </div>\
                                    </div>\
                                    <div class="col-md-2">\
                                        <div class="form-group mb-2">\
                                           <button type="button" class="remove-btn btn btn-danger"><span>&#45;</span></button>\
                                        </div>\
                                    </div>\
                                    </div>');
            });

        });
    </script>






<script src="https://adschronicle.com/jquery.sumoselect.js"></script>
<link href="https://adschronicle.com/sumoselect.css" rel="stylesheet" />
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
<script type="text/javascript">
function delete1(){
  if(window.confirm("Confirm delete"))  {
   return true;
  } else
   return false;
}
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

$('.payment-button').click(function(){
var id= $(this).data('id');
$.ajax({
		  type:"post",
		  url:"<?php echo URL; ?>ajaxpayment.php",
		  data:"guid="+id+"&action=jobseekerad",
			  success:function(response){
				  $('.payment-body').html(response);
                  $('#payment-modal').modal("show", {backdrop: 'static'});
				return true;
		  }
	   });
});
</script> 
</body>
</html>
<?php } ?>