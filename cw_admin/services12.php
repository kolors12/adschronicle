<?php ob_start(); 
error_reporting(0);
require "lib/path.php";
require "lib/config.php";
require "lib/title.php";
require "lib/secure.php";
extract($_GET);
extract($_POST);
$date = date('Y-m-d');
if(isset($_POST) && $_POST['submit'] == 'add') {
	stripslashes($_POST);
    //print_r($_POST); exit;
    $desc = str_replace("'","~~",$_POST['description']);
      //Get the temp file path
          $tmpFilePath1 = $_FILES['image1']['tmp_name'];
          if ($tmpFilePath1 != ""){
            $im_name1 = time().$_FILES['image1']['name'];
            $newFilePath1 = "../adminupload/" . $im_name1;
             if(move_uploaded_file($tmpFilePath1, $newFilePath1)) {
             }
          }
          $tmpFilePath21 = $_FILES['image21']['tmp_name'];
          if ($tmpFilePath21 != ""){
            $im_name21 = time().$_FILES['image21']['name'];
            $newFilePath21 = "../adminupload/" . $im_name21;
             if(move_uploaded_file($tmpFilePath21, $newFilePath21)) {
             }
          }
          $tmpFilePath22 = $_FILES['image22']['tmp_name'];
          if ($tmpFilePath22 != ""){
            $im_name22 = time().$_FILES['image22']['name'];
            $newFilePath22 = "../adminupload/" . $im_name22;
             if(move_uploaded_file($tmpFilePath22, $newFilePath22)) {
             }
          }
          $tmpFilePath23 = $_FILES['image23']['tmp_name'];
          if ($tmpFilePath23 != ""){
            $im_name23 = time().$_FILES['image23']['name'];
            $newFilePath23 = "../adminupload/" . $im_name23;
             if(move_uploaded_file($tmpFilePath23, $newFilePath23)) {
             }
          }
          $tmpFilePath24 = $_FILES['image24']['tmp_name'];
          if ($tmpFilePath24 != ""){
            $im_name24 = time().$_FILES['image24']['name'];
            $newFilePath24 = "../adminupload/" . $im_name24;
             if(move_uploaded_file($tmpFilePath24, $newFilePath24)) {
             }
          }
          $tmpFilePath25 = $_FILES['image25']['tmp_name'];
          if ($tmpFilePath25 != ""){
            $im_name25 = time().$_FILES['image25']['name'];
            $newFilePath25 = "../adminupload/" . $im_name25;
             if(move_uploaded_file($tmpFilePath25, $newFilePath25)) {
             }
          }

          $tmpFilePath3 = $_FILES['image3']['tmp_name'];
          if ($tmpFilePath3 != ""){
            $im_name3 = time().$_FILES['image3']['name'];
            $newFilePath3 = "../adminupload/" . $im_name3;
             if(move_uploaded_file($tmpFilePath3, $newFilePath3)) {
             }
          }
          $tmpFilePath4 = $_FILES['image4']['tmp_name'];
          if ($tmpFilePath4 != ""){
            $im_name4 = time().$_FILES['image4']['name'];
            $newFilePath4 = "../adminupload/" . $im_name4;
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
        
        $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $cou = strtoupper(substr($add_title,0,2));
        for ($i = 0; $i < 10; $i++) {
          $cou .= $chars[mt_rand(0, strlen($chars)-1)];     
        }
        $cou; 
        $coupon_code = $cou;

  	    $sth = $db->query ("INSERT INTO `add_services`(`productid`, `pid`, `cid`, `aid`,`category`, `add_title`, `email_id`, `phone_no1`, `phone_no2`, `website`, `contact_person`, `working_hours`, `offered_services`, `description`, `address`, `address_location`, `pincode`, `date`, `images1`, `images21`, `images22`, `images23`, `images24`, `images25`, `images3`, `images4`, `video_link`, `discount_offers`, `deal_title`, `coupon_code`,`agency_code`) VALUES ('$val', '$pid', '$cid', '$aid','$category', '$add_title', '$email_id', '$phone_no1', '$phone_no2', '$website', '$contact_person', '$working_hours', '$offered_services', '$desc', '$address', '$address_location', '$pincode', '$date', '$im_name1', '$im_name21', '$im_name22', '$im_name23', '$im_name24', '$im_name25', '$im_name3', '$im_name4', '$video_link', '$discount_offers', '$deal_title', '$coupon_code', '$agency_code')");
		if($sth > 0) {
			$post_msg = '<h4 style="color: green;">Services added Successfully</h4>';	
			header('location:'.URL.'services.php?post_msg='.$post_msg);
		} else { 
			$post_msg = '<h4 style="color: red;">Please try Again</h4>';	
			header('location:'.URL.'services.php?post_msg='.$post_msg);
 		}
}
else if(isset($_POST) && $_POST['submit'] == 'SaveEdit') {
	//print_r($_POST); exit;
    	$file=$db->query("SELECT * FROM `add_services` WHERE `guid`='$guid'");
    	$files= $file->fetch();
        $desc = str_replace("'","~~",$_POST['description']);
    	stripslashes($_POST);
        $img = '';
        for($i=0; $i < 4; $i++) {
            $j = $i+1;
            if($j!='2'){
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
                  //echo "UPDATE `add_services` SET images.$j = '$im_name' WHERE `guid`='$guid'";
                  $db->query("UPDATE `add_services` SET images$j = '$im_name' WHERE `guid`='$guid'");
                } 
                //$img.= $im_name.",";
              } 
          }
        }
        for($k=0; $k < 5; $k++) {
            $l = $k+21;
              //Get the temp file path
              $tmpFilePath1 = $_FILES['image'.$l]['tmp_name'];
              //Make sure we have a filepath
              if(!empty($tmpFilePath1)){
                //Setup our new file path
                $im_name1 = time().$_FILES['image'.$l]['name'];
                $newFilePath1 = "../adminupload/" . $im_name1;
                //Upload the file into the temp dir
                if(move_uploaded_file($tmpFilePath1, $newFilePath1)) {
                  unlink("../adminupload/".$files['images'.$l]);
                  //Handle other code here
                  //$img.= $im_name.",";
                  //echo "UPDATE `add_services` SET images.$j = '$im_name' WHERE `guid`='$guid'";
                  $db->query("UPDATE `add_services` SET images$l = '$im_name1' WHERE `guid`='$guid'");
                } 
                //$img.= $im_name.",";
              } 
        }        
        //echo $img; exit;
        //exit;
    	$sth = $db->query ("UPDATE `add_services` SET `cid`='$cid', `aid`='$aid', `category`='$category',`add_title`='$add_title',`email_id`='$email_id', `website`='$website',`contact_person`='$contact_person',`working_hours`='$working_hours',`offered_services`='$offered_services',`description`='$desc',`address`='$address',`address_location`='$address_location', `pincode`='$pincode', `video_link`='$video_link', `discount_offers`='$discount_offers', `deal_title`='$deal_title', `agency_code`='$agency_code', `phone_no1`='$phone_no1', `phone_no2`='$phone_no2' WHERE `guid`='$guid'");
    //update variant
	if($sth > 0) {
	$post_msg = '<h4 style="color: green;">Details Successfully Updated</h4>';	
	header('location:'.URL.'services.php?post_msg='.$post_msg);
	} else { 
	$post_msg = '<h4 style="color: red;">Please try Again</h4>';	
	header('location:'.URL.'services.php?post_msg='.$post_msg);
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
              <li class="active"><a href="<?php echo URL; ?>services.php"> View Category Ads</a></li>
            </ul>
            <div class="b-right hidden-xs">
              <ul>
                
                
                <li class="dropdown"><a href="#" title="" data-toggle="dropdown"><i class="fa fa-plus"></i><span> Tasks</span></a>
                  <ul class="dropdown-menu dropdown-primary dropdown-menu-right">
                    <li><a href="<?php echo URL; ?>services.php?action=addNew">Add New Category Ad</a></li>
                    <li><a href="<?php echo URL; ?>services.php">View Post Add's</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <!-- END BREADCRUMB -->
          <div class="page-header title"> 
            <!-- PAGE TITLE ROW -->
            <h1>Admin <span class="sub-title"><a href="<?php echo URL; ?>services.php"> View Category Ads</a></span></h1>
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
		$sth = $db->query ("UPDATE `add_services` SET `status`='$status',`active_date`='".date('Y-m-d')."' WHERE `guid`='$guid'");
                } else { 
		$sth = $db->query ("UPDATE `add_services` SET `status`='$status' WHERE `guid`='$guid'");

                }
		header('location:'.URL.'services.php'); 
	} else if($action == 'addNew') { ?>
      <a href="<?php echo URL; ?>services.php" class="btn btn-info">Back</a>
      <div class="row">
        <div class="col-lg-12">
          <div class="portlet">
            <div class="portlet-heading dark">
              <div class="portlet-title">
                <h4>ADD NEW</h4>
              </div>
              <div class="portlet-widgets"> <a data-toggle="collapse" data-parent="#accordion" href="#f-6"><i class="fa fa-chevron-down"></i></a> </div>
              <div class="clearfix"></div>
            </div>
            <div id="f-6" class="panel-collapse collapse in">
              <div class="portlet-body no-padding table-responsive">
                <div class="well white col-sm-12">
                  <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                    <div class="col-sm-6">
                    <div class="form-group">
                      <label>City</label>
                      <select class="form-control super" name="cid" id="cid" required>
                        <option value="">Select City</option>
                        <?php $sth = $db->query ("SELECT * FROM `cities`");
                              while($row = $sth->fetch()) {
                              echo "<option value='".$row[0]."'>".$row['name']."</option>";
                              } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Areas</label>
                      <select class="form-control area" name="aid" id="aid" required>
                        <option value="">Select Area</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Ads Category</label>
                      <select class="form-control" name="category" id="category" required>
                        <option value="">Select Category</option>
                        <?php $cth = $db->query ("SELECT * FROM `super_category`");
                              while($crow = $cth->fetch()) {
                              echo "<option value='".$crow[0]."'>".$crow['name']."</option>";
                        } ?>
                      </select>
                    </div>
                     <div class="form-group">
                      <label>Title</label>
                      <input type="text" class="form-control" name="add_title" placeholder="Enter Title" required=""/>
                    </div>
                     <div class="form-group">
                      <label>Email Id</label>
                      <input type="text" class="form-control" name="email_id" placeholder="Enter Email ID" required=""/>
                    </div>
                     <div class="form-group">
                      <label>Phone/Mobile 1</label>
                      <input type="text" class="form-control" name="phone_no1" placeholder="Enter Phone/Mobile Number 1" required=""/>
                    </div>
                     <div class="form-group">
                      <label>Phone/Mobile 2</label>
                      <input type="text" class="form-control" name="phone_no2" placeholder="Enter Phone/Mobile Number 2" required=""/>
                    </div>
                     <div class="form-group">
                      <label>Web Site</label>
                      <input type="text" class="form-control" name="website" placeholder="Enter Website Name" required=""/>
                    </div>
                     <div class="form-group">
                      <label>Contact Person</label>
                      <input type="text" class="form-control" name="contact_person" placeholder="Enter Contact Person Name" required=""/>
                    </div>
                     <div class="form-group">
                      <label>Working Hours</label>
                      <input type="text" class="form-control" name="working_hours" placeholder="Enter Working Hours" required=""/>
                    </div>
                      <div class="form-group">
                      <label>Services Offered</label>
                      <textarea class="form-control" name="offered_services" id="offered_services"  placeholder="Enter Services offered (Max: 80 Characters)" required=""></textarea>
                    </div>
                   <div class="form-group">
                      <label>Image for Page2</label>
                      <input type="file" name="image1" class="form-control" required=""/>
                      <label>Upload image JPG/JPEG extension with size of 350x320px </label>
                    </div>
                   <div class="form-group">
                      <label>Image for Page3 (1)</label>
                      <input type="file" name="image21" class="form-control" required=""/>
                      <label>Upload image JPG/JPEG extension with size of 370x350px </label>
                    </div>
                   <div class="form-group">
                      <label>Image for Page3 (2)</label>
                      <input type="file" name="image22" class="form-control" required=""/>
                      <label>Upload image JPG/JPEG extension with size of 370x350px </label>
                    </div>
                   <div class="form-group">
                      <label>Image for Page3 (3)</label>
                      <input type="file" name="image23" class="form-control" required=""/>
                      <label>Upload image JPG/JPEG extension with size of 370x350px </label>
                    </div>
                   <div class="form-group">
                      <label>Image for Page3 (4)</label>
                      <input type="file" name="image24" class="form-control" />
                      <label>Upload image JPG/JPEG extension with size of 370x350px </label>
                    </div>
                   <div class="form-group">
                      <label>Image for Page3 (5)</label>
                      <input type="file" name="image25" class="form-control" />
                      <label>Upload image JPG/JPEG extension with size of 370x350px </label>
                    </div>
                   <div class="form-group">
                      <label>Upload brochure/biodata </label>
                      <input type="file" name="image3" class="form-control" required=""/>
                      <label>Upload docx, pdf, jpg files </label>
                    </div>
                   <div class="form-group">
                      <label>Upload Discount/Promotional Image </label>
                      <input type="file" name="image4" class="form-control" required=""/>
                      <label>Upload image JPG/JPEG extension with size of 350x320px </label>
                    </div>
                  </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="description" class="form-control" id="description" rows="20" cols="80"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Address</label>
                      <textarea name="address" class="form-control" rows="2" cols="80" required=""></textarea>
                    </div>
                    <div class="form-group">
                      <label>Pincode</label>
                      <input name="pincode" class="form-control" required=""/>
                    </div>
                    <div class="form-group">
                      <label>Google Map location Area</label>
                      <input name="address_location" id="geocomplete" class="form-control" required="" />
                    </div>
                    <div class="form-group">
                      <label>Video link </label>
                      <input name="video_link" class="form-control" placeholder="Enter Video link" />
                    </div>
                    <div class="form-group">
                      <label>Discount offers </label>
                      <input name="discount_offers" class="form-control" placeholder="Enter Discount offers" />
                    </div>
                    <div class="form-group">
                      <label>Deal title </label>
                      <input name="deal_title" class="form-control" placeholder="Enter Deal Title"  />
                    </div>
                    <div class="form-group">
                      <label>Agency Code </label>
                      <input name="agency_code" class="form-control" placeholder="Enter Agency Code" required=""  />
                    </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-actions">
                      <button type="submit" class="btn btn-primary submit-button" value="add" name="submit">Submit</button>
                      <button type="reset" class="btn">Reset</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } else if($action == 'editData') { 
	   $guid = $_GET['guid'];  ?>
      <a href="<?php echo URL; ?>services.php" class="btn btn-info">Back</a>
      <div class="row">
        <div class="col-lg-12">
          <div class="portlet">
            <div class="portlet-heading dark">
              <div class="portlet-title">
                <h4>View Product</h4>
              </div>
              <div class="portlet-widgets"> <a data-toggle="collapse" data-parent="#accordion" href="#f-6"><i class="fa fa-chevron-down"></i></a> </div>
              <div class="clearfix"></div>
            </div>
            <div id="f-6" class="panel-collapse collapse in">
              <div class="portlet-body col-sm-12">
                <?php $psth = $db->query ("SELECT * FROM `add_services` WHERE `guid`='$guid'");
				      $row = $psth->fetch();
				  ?>
                <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                    <div class="col-sm-6">
                    <div class="form-group">
                      <label>City</label>
                      <select class="form-control super" name="cid" id="cid" required>
                        <option value="">Select City</option>
                        <?php $ath = $db->query ("SELECT * FROM `cities`");
                              while($arow = $ath->fetch()) {
                              echo "<option value='".$arow[0]."' "; if($row['cid']==$arow[0]){ echo "selected"; } echo " >".$arow['name']."</option>";
                              } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Areas</label>
                      <select class="form-control area" name="aid" id="aid" required>
                        <option value="">Select Area</option>
                        <?php $cth = $db->query ("SELECT * FROM `areas` WHERE `sid`='".$row['cid']."'"); ?>
                        <?php while($crow = $cth->fetch()) {  
                              echo "<option value='".$crow[0]."'"; if($row['aid']==$crow[0]){ echo " selected "; }echo ">".$crow[2]."</option>";
                        	} ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Ads Category</label>
                      <select class="form-control" name="category" id="category" required>
                        <option value="">Select Category</option>
                        <?php $cth = $db->query ("SELECT * FROM `super_category`");
                              while($crow = $cth->fetch()) {
                              echo "<option value='".$crow[0]."' "; if($row['category']==$crow[0]){ echo "selected"; } echo ">".$crow['name']."</option>";
                        } ?>
                      </select>
                    </div>
                     <div class="form-group">
                      <label>Title</label>
                      <input type="text" class="form-control" name="add_title" value="<?php echo $row['add_title']?>" placeholder="Enter Title" required=""/>
                    </div>
                     <div class="form-group">
                      <label>Email Id</label>
                      <input type="text" class="form-control" name="email_id" value="<?php echo $row['email_id']?>" placeholder="Enter Email ID" required=""/>
                    </div>
                     <div class="form-group">
                      <label>Phone/Mobile 1</label>
                      <input type="text" class="form-control" name="phone_no1" value="<?php echo $row['phone_no1']?>" placeholder="Enter Phone/Mobile Number 1" required=""/>
                    </div>
                     <div class="form-group">
                      <label>Phone/Mobile 2</label>
                      <input type="text" class="form-control" name="phone_no2" value="<?php echo $row['phone_no2']?>" placeholder="Enter Phone/Mobile Number 2" required=""/>
                    </div>
                     <div class="form-group">
                      <label>Web Site</label>
                      <input type="text" class="form-control" name="website" value="<?php echo $row['website']?>" placeholder="Enter Website Name" required=""/>
                    </div>
                     <div class="form-group">
                      <label>Contact Person</label>
                      <input type="text" class="form-control" name="contact_person" value="<?php echo $row['contact_person']?>" placeholder="Enter Contact Person Name" required=""/>
                    </div>
                     <div class="form-group">
                      <label>Working Hours</label>
                      <input type="text" class="form-control" name="working_hours" value="<?php echo $row['working_hours']?>" placeholder="Enter Working Hours" required=""/>
                    </div>
                      <div class="form-group">
                      <label>Services Offered</label>
                      <textarea class="form-control" name="offered_services" id="offered_services"  placeholder="Enter Services offered" required=""  ><?php echo $row['offered_services']?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Video link </label>
                      <input name="video_link" class="form-control" value="<?php echo $row['video_link']?>" placeholder="Enter Video link"  />
                    </div>
                    <div class="form-group">
                      <label>Coupon Code </label>
                      <input readonly=""class="form-control" value="<?php echo $row['coupon_code']?>"   />
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                      <label>Description</label>
                      <div class="panel panel-body">
                      <textarea name="description" id="description" class="form-control" rows="20" cols="80"><?php echo str_replace("~~","'",$row['description']); ?></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Address</label>
                      <textarea name="address" class="form-control" rows="2" cols="80"><?php echo $row['address']?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Pincode</label>
                      <input name="pincode" class="form-control" required="" value="<?php echo $row['pincode']?>"/>
                    </div>
                    <div class="form-group">
                      <label>Google Map location Area</label>
                      <input name="address_location" id="geocomplete" value="<?php echo $row['address_location']?>" class="form-control" />
                    </div>
					
					<div class="col-md-12">
			  <label><h5> Are you offering Deals/discounts?  
              
              <label for="chkYes">
    <input type="radio" id="chkYes" name="chkPassPort" />
    Yes
</label>
<label for="chkNo">
    <input type="radio" id="chkNo" name="chkPassPort" />
    No
</label>
              
              </h5></label> 
              
    
               
                <div class="row" id="dvPassport" style="display: none">
                
                  <div class="col-md-12">
                  <div class="form-group">
				   <label>Discount offers </label>
                   <input name="discount_offers" class="form-control" rows="2" value="<?php echo $row['discount_offers']?>" placeholder="Enter Discount offers" />
                </div>
                  </div>
                  <div class="col-md-12">
				   <div class="form-group">
				  <label>Deal title </label>
                    <input name="deal_title" class="form-control" value="<?php echo $row['deal_title']?>" placeholder="Enter Deal Title"  />
                </div>
                </div>
               <div class="form-group col-sm-4">
                          <label>Discount/Promotional Images</label>
                          <input type="file" name="image4"  class="form-control"/>
                           <label>Upload Image with JPG/JPEG extension with size of 350x320px </label>
                          <?php if(!empty($row['images4'])){?>
                          <img src="../adminupload/<?php echo $row['images4'] ?>" alt="" class="img-thumbnail" height="120px" width="120px"/>
                          <?php } ?>
                        </div>
                </div>
              </div>
                    <!--<div class="form-group">
                      <label>Discount offers </label>
                      <input name="discount_offers" class="form-control" value="<?php echo $row['discount_offers']?>" placeholder="Enter Discount offers" />
                    </div>
                    <div class="form-group">
                      <label>Deal title </label>
                      <input name="deal_title" class="form-control" value="<?php echo $row['deal_title']?>" placeholder="Enter Deal Title"  />
                    </div>-->
                    <div class="form-group">
                      <label>Agency Code </label>
                      <input name="agency_code" class="form-control" value="<?php echo $row['agency_code']?>" placeholder="Enter Agency Code" required=""  />
                    </div>
                    </div>
                  <div class="clearfix"></div><br />
                  <div class="col-sm-12">
                        <div class="form-group col-sm-4">
                          <label>Image for Page2</label>
                          <input type="file" name="image1" class="form-control"/>
                           <label>Upload Image with JPG/JPEG extension with size of 350x320px </label>
                          <?php if(!empty($row['images1'])){?>
                          <img src="../adminupload/<?php echo $row['images1'] ?>" alt="" class="img-thumbnail" height="120px" width="120px"/>
                          <?php } ?>
                        </div>
                        <div class="form-group col-sm-4">
                          <label>Image for Page3 (1)</label>
                          <input type="file" name="image21"  class="form-control"/>
                           <label>Upload Image with JPG/JPEG extension with size of 370x350px </label>
                          <?php if(!empty($row['images21'])){?>
                          <img src="../adminupload/<?php echo $row['images21'] ?>" alt="" class="img-thumbnail" height="120px" width="120px"/>
                          <?php } ?>
                        </div>
                        <div class="form-group col-sm-4">
                          <label>Image for Page3 (2)</label>
                          <input type="file" name="image22"  class="form-control"/>
                           <label>Upload Image with JPG/JPEG extension with size of 370x350px </label>
                          <?php if(!empty($row['images22'])){?>
                          <img src="../adminupload/<?php echo $row['images22'] ?>" alt="" class="img-thumbnail" height="120px" width="120px"/>
                          <?php } ?>
                        </div>
                        <div class="form-group col-sm-4">
                          <label>Image for Page3 (3)</label>
                          <input type="file" name="image23"  class="form-control"/>
                           <label>Upload Image with JPG/JPEG extension with size of 370x350px </label>
                          <?php if(!empty($row['images23'])){?>
                          <img src="../adminupload/<?php echo $row['images23'] ?>" alt="" class="img-thumbnail" height="120px" width="120px"/>
                          <?php } ?>
                        </div>
                        <div class="form-group col-sm-4">
                          <label>Image for Page3 (4)</label>
                          <input type="file" name="image24"  class="form-control"/>
                           <label>Upload Image with JPG/JPEG extension with size of 370x350px </label>
                          <?php if(!empty($row['images24'])){?>
                          <img src="../adminupload/<?php echo $row['images24'] ?>" alt="" class="img-thumbnail" height="120px" width="120px"/>
                          <?php } ?>
                        </div>
                        <div class="form-group col-sm-4">
                          <label>Image for Page3 (5)</label>
                          <input type="file" name="image25"  class="form-control"/>
                           <label>Upload Image with JPG/JPEG extension with size of 370x350px </label>
                          <?php if(!empty($row['images25'])){?>
                          <img src="../adminupload/<?php echo $row['images25'] ?>" alt="" class="img-thumbnail" height="120px" width="120px"/>
                          <?php } ?>
                        </div>
                        <div class="form-group col-sm-4">
                          <label>Brochure/Bio Data</label>
                          <input type="file" name="image3"  class="form-control"/>
                           <label>You can Upload pdf, docx, jpg files </label>
                          <?php if(!empty($row['images3'])){?><br />
                          <a href="../adminupload/<?php echo $row['images3'] ?>" target="_blank"> View Brochure/Bio Data </a>
                          <?php } ?>
                        </div>
                        <!--<div class="form-group col-sm-4">
                          <label>Discount/Promotional Images</label>
                          <input type="file" name="image4"  class="form-control"/>
                           <label>Upload Image with JPG/JPEG extension with size of 350x320px </label>
                          <?php if(!empty($row['images4'])){?>
                          <img src="../adminupload/<?php echo $row['images4'] ?>" alt="" class="img-thumbnail" height="120px" width="120px"/>
                          <?php } ?>
                        </div>-->
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
		$rth = $db->query ("SELECT * FROM `add_services` WHERE `guid`='$guid'");
        $rrow= $rth->fetch();
        unlink("../adminupload/".$rrow['images1']);
        unlink("../adminupload/".$rrow['images21']);
        unlink("../adminupload/".$rrow['images22']);
        unlink("../adminupload/".$rrow['images23']);
        unlink("../adminupload/".$rrow['images24']);
        unlink("../adminupload/".$rrow['images25']);
        unlink("../adminupload/".$rrow['images3']);
        unlink("../adminupload/".$rrow['images4']);
		$sth = $db->query ("DELETE FROM `add_services` WHERE `guid`='$guid'");
		//$sth->execute();
		header('location:'.URL.'services.php'); 
	} else { ?>
      <!--<a href="<?php //echo URL; ?>services.php?action=addNew" class="btn btn-success btn-xs">Add New Category Ad</a>-->
      <div class="row">
        <div class="col-lg-12">
          <?php if(!empty($post_msg)) { ?>
          <div class="page-header no-padding-bottom"> <?php echo $post_msg; ?> </div>
          <?php  }
            $sth = $db->query ("SELECT * FROM `add_services` ORDER BY `guid` DESC");
			$count = $sth->rowCount();
								// $count;
								 ?>
          <!-- START YOUR CONTENT HERE -->
          <div class="portlet table-responsive"><!-- /Portlet -->
            <div class="portlet-heading dark">
              <div class="portlet-title">
                <h4>View Category Ads</h4>
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
                        <th data-class="expand" class="center">City/Area</th>
                        <th data-class="expand" class="center">Category</th>
                        <th data-class="expand" class="center">Title</th>
                        <th data-class="expand" class="center">Description</th>
                        <th data-class="expand" class="center">Gallery</th>
						<th data-class="expand" class="center">Ad Agency <br/>Code</th>
						<th data-class="expand" class="center">Date of <br/>Posting</th>
                        <th data-class="expand" class="center">Date of <br/>Activation</th>
                        <th data-class="expand" class="center">Edit/ Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if($count > 0) { 
						$m = 1;
						while($row = $sth->fetch()) {
						$eth = $db->query ("SELECT c.name, d.name, a.name FROM `cities` c, `areas` a, `super_category` d  WHERE c.guid = '".$row['cid']."' AND d.guid='".$row['category']."' AND a.guid='".$row['aid']."'");
                        $mname = $eth->fetch();

					?>
                      <tr>
                        <td class="center"><?php echo $m; ?></td>
                        <td class="center">
                        <div class="form-group">
                        <label><input type="radio" onclick="window.location='<?php echo URL; ?>services.php?action=changeStatus&guid=<?php echo $row[0]; ?>&status=Active'" <?php if($row['status']=='Active'){ echo "checked"; }?> /> Activate</label><br />
                        <label><input type="radio" onclick="window.location='<?php echo URL; ?>services.php?action=changeStatus&guid=<?php echo $row[0]; ?>&status=DeActive'" <?php if($row['status']=='DeActive'){ echo "checked"; }?> /> DeActivate</label><br />
                        </div>
                        </td>
                        <td class="center"><?php echo $mname[0]."/".$mname[2] ?></td>
                        <td class="center"><?php echo $mname[1] ?></td>
                        <td class="center"><?php echo $row['add_title']; ?></td>
                        <td class="center"><div class="panel panel-body"><?php $des =  str_replace("~~","'",$row['description']); echo substr($des,0,200)."..." ?></div></td>
                        <td class="center"><a href="javascript:;" class="btn btn-xs btn-info gallery-button" data-id="<?php echo $row[0] ?>"><i class="fa fa-link"></i> View</a></td>
						<td class="center"><?php echo $row['agency_code']?></td>
						<td class="center"><?php echo $row['date']; ?></td>
                        <td class="center"><?php if($row['active_date']!='' && $row['active_date']!='0000-00-00')echo $row['active_date']; else echo "Not Activated yet" ?></td>
                        <td class="center"><div class="btn-group btn-group-xs"><a href="<?php echo URL; ?>services.php?action=editData&guid=<?php echo $row[0]; ?>"  class="btn btn-inverse"><i class="fa fa-edit icon-only"></i></a> <a href="<?php echo URL; ?>services.php?action=deleteData&guid=<?php echo $row[0]; ?>" class="btn btn-danger" onClick="return delete1();"><i class="fa fa-trash icon-only"></i></a> </div></td>
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
        $('#offered_services').bind('cut copy paste', function (e) {
            e.preventDefault(); //disable cut,copy,paste
        });
        $('#offered_services').keypress(function(e) {
           
            var tval = $('#offered_services').val(),
                tlength = tval.length,
                set = 80,
                remain = parseInt(set - tlength);
            //$('p').text(remain);
            if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
                $('#offered_services').val((tval).substring(0, tlength - 1))
            }
        });
</script> 
<script>
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
 function Update(guid){
			 var ld = ".update-st-"+guid;
			 var vl = ".stchange-"+guid;
			 var value = $(vl).val();
			// alert(value);
		        $.ajax({
					type:"post",
					url:"<?php echo URL; ?>ostatusupdate.php",
					beforeSend: function(){
						$(ld).html('<div id="image" align="center"><img src="assets/images/loader.gif" alt="" height="32" width="32"></div>');
					},					
					data:"guid="+guid+"&status="+value+"&Submit=updatestatus",
					success:function(data){
                                           //alert(data);
					   location.reload();
                                           //$(ld).html(data);
					 }
			  		});
 }
</script> 
<script type="text/javascript">
$('#category').change(function(){
var id= $(this).val();
$.ajax({
		  type:"post",
		  url:"<?php echo URL; ?>ajaxReq.php",
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
		  url:"<?php echo URL; ?>ajaxReq.php",
		  data:"cid="+cid+"&action=fetchexp1",
			  success:function(response){
				  $('.area').html(response);
				return true;
		  }
	   });
});
$('.gallery-button').click(function(){
var id= $(this).data('id');
$.ajax({
		  type:"post",
		  url:"<?php echo URL; ?>ajaxGallery.php",
		  data:"guid="+id+"&action=fetchexp",
			  success:function(response){
				  $('.gallery-body').html(response);
                  $('#gallery-modal').modal("show", {backdrop: 'static'});
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
</script> 
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
<script src="<?php echo URL ?>assets/js/jquery.geocomplete.js"></script>
<script src="<?php echo URL ?>assets/js/logger.js"></script>
<script>
    $(function(){
        var options = { };
        $("#geocomplete").geocomplete(options);
        $("#geocomplete").attr("placeholder","");
    });
</script>
<script type="text/javascript" src="<?php echo URL ?>assets/nicEdit.js"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
    new nicEditor({fullPanel : true}).panelInstance('description');
});

</script>
<script>
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

</body>
</html>
<?php } ?>