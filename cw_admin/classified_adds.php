<?php ob_start(); error_reporting(0);
require "lib/path.php";
require "lib/config.php";
require "lib/title.php";
require "lib/secure.php";
extract($_POST);
$sth = $db->query ("SELECT * FROM `classified_adds`");
$count = $sth->rowCount();
$date = date("Y-m-d");
if(isset($_POST) && $_POST['submit']=='adddata') {
    $adv_des = str_replace("'","~~",$_POST['adv_des']);
	$sth = $db->query("INSERT INTO `classified_adds`( `category`, `adv_title`, `adv_des`, `status`, `date`) VALUES ('$category', '$adv_title', '$adv_des', 'DeActive', '$date')");
	if($sth == true) { ?>
	<script type="text/javascript">
			alert('Data Successfully Inserted');
			window.location="<?php echo URL; ?>classified_adds.php";
			</script>
	<?php } else { ?>
	<script type="text/javascript">
			alert('Please try Again');
			window.location="<?php echo URL; ?>classified_adds.php";
			</script>
	<?php } 
}
if(isset($_POST) && $_POST['submit']=='editdata') {

   $adv_des = str_replace("'","~~",$_POST['adv_des']);
    
	$sth = $db->query("UPDATE `classified_adds` SET `category`='$category', `adv_title`='$adv_title', `adv_des`='$adv_des' WHERE `guid`='$qid'");
	if($sth == true) { ?>
	<script type="text/javascript">
			alert('Data Successfully Updated');
			window.location="<?php echo URL; ?>classified_adds.php";
			</script>
	<?php } else { ?>
	<script type="text/javascript">
			alert('Please try Again');
			window.location="<?php echo URL; ?>classified_adds.php";
			</script>
	<?php } 
}

?>
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
              <li class="active"><a href="<?php echo URL; ?>classified_adds.php">Classified Category Ads</a></li>
            </ul>
            <div class="b-right hidden-xs">
              <ul>
                
                
                <li class="dropdown"><a href="#" title="" data-toggle="dropdown"><i class="fa fa-plus"></i><span> Tasks</span></a>
                  <ul class="dropdown-menu dropdown-primary dropdown-menu-right">
                    <?php // if($count < 10) {?>
                    <li><a href="<?php echo URL; ?>classified_adds.php?action=add">Add New Ads</a></li>
                    <?php //} ?>
                    <li><a href="<?php echo URL; ?>classified_adds.php">View Classified Category Ads</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        <!-- END BREADCRUMB -->
        
        <div class="page-header title"> 
          <!-- PAGE TITLE ROW -->
          <h1>Classified Category Ads <!--<span class="sub-title">responsive photo gallery using colorbox</span>--></h1>
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
    <?php 
		extract($_GET);
		if(isset($_GET['action'])) {
		$action=$_GET['action'];
		}
		//echo $url; exit;
		?>
    <!-- START YOUR CONTENT HERE --> 
    
    <!-- <div class="page-header no-padding-bottom">
          <h3>Adds</h3>
        </div>-->
    <?php if(isset($action) && $action=='add') { ?>
<a href="<?php echo URL; ?>classified_adds.php" class="btn btn-info">Back</a>
    <div class="row">
      <div class="col-lg-8"> 
        <!--portlet start--->
        <div class="portlet">
          <div class="portlet-heading dark">
            <div class="portlet-title">
              <h4>Add Ads</h4>
            </div>
            <div class="portlet-widgets"> <a data-toggle="collapse" data-parent="#accordion" href="#f-12" class="" aria-expanded="true"><i class="fa fa-chevron-down"></i></a> </div>
            <div class="clearfix"></div>
          </div>
          <div id="f-12" class="panel-collapse collapse in" aria-expanded="true">
            <div class="portlet-body">
              <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Category</label>
                    <select class="form-control" name="category" id="category" required="">
                        <option value="">Select Category</option>
                        <?php $cth = $db->query ("SELECT * FROM `c_category`");
                              while($crow = $cth->fetch()) {
                              echo "<option value='".$crow[0]."'>".$crow['name']."</option>";
                        } ?>
                   </select>
                </div>
                <div class="form-group">
                  <label>Advertiser/Title</label>
                    <input class="form-control" name="adv_title" id="adv_title" required="" />
                </div>
                <div class="form-group">
                  <label>Description</label>
                    <textarea class="form-control" name="adv_des" required=""></textarea>
                </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary" name="submit" value="adddata">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!--portlet end---> 
      </div>
    </div>
    <?php } 
       else if(isset($action) && $action=='editData') { 
       $q = $_GET['guid'];
	   $sth = $db->query ('SELECT * FROM `classified_adds` WHERE `guid`="'.$q.'"');
	   $row = $sth->fetch();
   ?>
<a href="<?php echo URL; ?>classified_adds.php" class="btn btn-info">Back</a>
    <div class="row">
      <div class="col-lg-8"> 
        <!--portlet start--->
        <div class="portlet">
          <div class="portlet-heading dark">
            <div class="portlet-title">
              <h4>Edit Ads</h4>
            </div>
            <div class="portlet-widgets"> <a data-toggle="collapse" data-parent="#accordion" href="#f-12" class="" aria-expanded="true"><i class="fa fa-chevron-down"></i></a> </div>
            <div class="clearfix"></div>
          </div>
          <div id="f-12" class="panel-collapse collapse in" aria-expanded="true">
            <div class="portlet-body">
              <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Category</label>
                    <select class="form-control" name="category" id="category" required="">
                        <option value="">Select Category</option>
                        <?php $cath = $db->query ("SELECT * FROM `c_category`");
                              while($carow = $cath->fetch()) {
                              echo "<option value='".$carow[0]."'"; if($row['category']==$carow[0]){ echo " selected "; } echo ">".$carow['name']."</option>";
                        } ?>
                   </select>
                </div>
                <div class="form-group">
                  <label>Advertiser/Title</label>
                    <input class="form-control" name="adv_title"  value="<?php echo $row['adv_title']?>" required="" />
                </div>
                <div class="form-group">
                  <label>Description</label>
                    <textarea class="form-control" name="adv_des" required=""><?php echo str_replace("~~","'",$row['adv_des'])?></textarea>
                </div>
               <div class="form-actions">
                  <input type="hidden" name="qid" value="<?php echo $q; ?>">
                  <button type="submit" class="btn btn-primary" name="submit" value="editdata">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!--portlet end---> 
      </div>
    </div>
    <?php } else if($action == 'changeStatus') {
		$guid = $_GET['guid']; $status = $_GET['status']; 
		$sth = $db->query ("UPDATE `classified_adds` SET `status`='$status' WHERE `guid`='$guid'");
		header('location:'.URL.'classified_adds.php'); 
	} else if($action == 'deleteData') {
		$guid = $_GET['guid']; 
		$sth = $db->query ("DELETE FROM `classified_adds` WHERE `guid`='$guid'");
		header('location:'.URL.'classified_adds.php'); 
	} else { ?>
   <a href="<?php echo URL; ?>classified_adds.php?action=add" class="btn btn-info">Add New</a>
      <div class="row">
        <div class="col-lg-12">
          <?php if(!empty($post_msg)) { ?>
          <div class="page-header no-padding-bottom"> <?php echo $post_msg; ?> </div>
          <?php  }  ?>
          <!-- START YOUR CONTENT HERE -->
          <div class="portlet table-responsive"><!-- /Portlet -->
            <div class="portlet-heading dark">
              <div class="portlet-title">
                <h4>Classified Category Ads</h4>
              </div>
              <div class="portlet-widgets"> <a data-toggle="collapse" data-parent="#accordion" href="#basic"><i class="fa fa-chevron-down"></i></a> <span class="divider"></span> <a href="#" class="box-close"><i class="fa fa-times"></i></a> </div>
              <div class="clearfix"></div>
            </div>
            <div id="basic" class="panel-collapse collapse in">
              <div class="portlet-body no-padding table-responsive">
                <div class="well white">
                  <table id="SampleDT" class="datatable table table-hover table-striped table-bordered tc-table ">
                    <thead>
                      <tr>
                        <th data-class="expand" style="width: 2% !important" class="center">S.No</th>
                        <th data-class="expand" class="center"> Delete/<br />DeActivate</th>
                        <th data-class="expand" class="center">Ad Category</th>
                        <th data-class="expand" class="center">Date of Posting</th>
                        <th data-class="expand" style="width: 40% !important;" class="center">Matter of Classified Ad</th>
                        <th data-class="expand" class="center">Modify</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if($count > 0) { 
						$m = 1;
						while($row = $sth->fetch()) {
						 $cth = $db->query ("SELECT * FROM `c_category` WHERE `guid` = '$row[1]'");
 				         $crow = $cth-> fetch(); 
				     	?>
                      <tr>
                        <td class="center"><?php echo $m; ?></td>
                        <td class="center">
                        <div class="form-group">
                        <label><input type="radio" onclick="return delete1(),window.location='<?php echo URL; ?>classified_adds.php?action=deleteData&guid=<?php echo $row[0]; ?>'" class=""  /> Delete</label><br />
                        <label><input type="radio" onclick="window.location='<?php echo URL; ?>classified_adds.php?action=changeStatus&guid=<?php echo $row[0]; ?>&status=Active'" <?php if($row['status']=='Active'){ echo "checked"; }?> /> Activate</label><br />
                        <label><input type="radio" onclick="window.location='<?php echo URL; ?>classified_adds.php?action=changeStatus&guid=<?php echo $row[0]; ?>&status=DeActive'" <?php if($row['status']=='DeActive'){ echo "checked"; }?> /> DeActivate</label><br />
                        </div>
                        </td>
                        <td class="center"><?php echo $crow[1]; ?></td>
                        <td class="center"><?php echo date("M d, Y",strtotime($row['date'])); ?></td>
                        <td class="center"><div class="panel panel-body"><?php echo str_replace("~~","'",$row['adv_des'])?></div></td>
                        <td class="center"><div class="btn-group btn-group-xs"> <a href="<?php echo URL; ?>classified_adds.php?action=editData&guid=<?php echo $row[0]; ?>" class="btn btn-inverse"><i class="fa fa-edit icon-only"></i></a> <!--<a href="<?php echo URL; ?>classified_adds.php?action=deleteData&guid=<?php echo $row[0]; ?>" class="btn btn-danger" onClick="return delete1();"><i class="fa fa-trash icon-only"></i></a>--></div></td>
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
    <!-- END FOOTER CONTENT --> 
    
  </div>
  <!-- /#page-wrapper --> 
  <!-- END MAIN PAGE CONTENT --> 
</div>
</div>

<script src="<?php echo URL; ?>assets/js/jquery.min.js"></script> 

<script src="<?php echo URL; ?>assets/js/bootstrap.min.js"></script> 
<script src="<?php echo URL; ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script> 
<script src="<?php echo URL; ?>assets/js/plugins/pace/pace.min.js"></script> 
<!-- PAGE LEVEL PLUGINS JS --> 
<script src="<?php echo URL; ?>assets/js/plugins/footable/footable.min.js"></script> 
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
function delete1() {
  if(window.confirm("Confirm delete")) {
	  return true;
   } else
   return false;
}
</script>

</body>
</html>