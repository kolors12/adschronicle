<?php ob_start(); error_reporting(0);
require "lib/path.php";
require "lib/config.php";
require "lib/title.php";
require "lib/secure.php";
extract($_GET);
extract($_POST);
$date = date(Y-m-d);
if(isset($_POST) && $_POST['Submit'] == 'add') {
	$date = date('Y-m-d');
    strip_tags($_POST);
	//print_r($_POST); exit;
	//$des = str_replace("'","^^", $_POST['pack_des']);
	//$des1 = str_replace('"',"~~", $des);''
//echo "INSERT INTO `packages`(`add_type`,`pack_name`, `pack_price`, `pack_des`,`date`) VALUES ('$add_type','$pack_name','$pack_price','$pack_des','$date')";exit;
	$sth = $db->query ("INSERT INTO `packages`(`add_type`,`pack_name`, `pack_price`, `pack_des`,`date`) VALUES ('$add_type','$pack_name','$pack_price','$pack_des','$date')");
	if($sth > 0) {
	$post_msg = '<h4 style="color: green;">Packages Successfully Added</h4>';	
	header('location:'.URL.'packages.php?post_msg='.$post_msg);
	} else { 
	$post_msg = '<h4 style="color: red;">Please try Again</h4>';	
	header('location:'.URL.'packages.php?post_msg='.$post_msg);
	}
}
if(isset($_POST) && $_POST['submit'] == 'SaveEdit') {
	$date = date('Y-m-d');
    strip_tags($_POST);
	//print_r($_POST); exit;
	//$des = str_replace("'","^^", $_POST['pack_des']);
	//$des1 = str_replace('"',"~~", $des);
	$sth = $db->exec ("UPDATE `packages` SET `add_type`='$add_type',`pack_name`='$pack_name', `pack_price`='$pack_price', `pack_des`='$pack_des' WHERE `guid`=$guid");
	
	if($sth > 0) {
	$post_msg = '<h4 style="color: green;">Package Successfully Updated</h4>';	
	header('location:'.URL.'packages.php?post_msg='.$post_msg);
	} else { 
	$post_msg = '<h4 style="color: red;">Please try Again</h4>';	
	header('location:'.URL.'packages.php?post_msg='.$post_msg);
	}
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
            <li class="active"><a href="<?php echo URL; ?>packages.php">Ad's Packages</a></li>
          </ul>
          <div class="b-right hidden-xs">
            <ul>
              
              
              <li class="dropdown"><a href="#" title="" data-toggle="dropdown"><i class="fa fa-plus"></i><span> Tasks</span></a>
                <ul class="dropdown-menu dropdown-primary dropdown-menu-right">
                  <li><a href="<?php echo URL; ?>packages.php?action=addNew">Add New</a></li>
                  <li><a href="<?php echo URL; ?>packages.php">View Ad's Packages</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        <!-- END BREADCRUMB -->
        
        <div class="page-header title"> 
          <!-- PAGE TITLE ROW -->
          <h1>Admin <span class="sub-title"><a href="packages.php">Ad's Packages</a></span></h1>
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
    <?php 	if(isset($_GET['action'])) {
			  $action =  $_GET['action']; 
			} if($action == 'addNew') { 
	?>
<a href="<?php echo URL; ?>packages.php" class="btn btn-info btn-xs">Back</a>
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
              <div class="well white">
                <form role="form"  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="col-sm-3">
                    <div class="form-group">
                  <label>Type Of Ad's</label>
                  <select name="add_type" required="">
                <option value="CLASSIFIED TEXT AD">CLASSIFIED TEXT AD</option>
              <option value="CATEGORY AD">CATEGORY AD</option>
                <option value="MATRIMONIAL AD ">MATRIMONIAL AD </option>
                        <option value="JOB SEEKER AD ">JOB SEEKER AD </option>
                          </select>
                  <!--input type="text" class="form-control" name="add_type" required=""/-->
                </div>
                </div>
                 <div class="col-sm-3">
                <div class="form-group">
                  <label>Package Name</label>
                  <input type="text" class="form-control" name="pack_name" required=""/>
                </div>
                </div>
                 <div class="col-sm-3">
                <div class="form-group">
                  <label>Package Price($)</label>
                  <input type="text" class="form-control" name="pack_price" required="" onkeyup="this.value=this.value.replace(/[^0-9]/g, '')" />
                </div>
                </div>
                 <div class="col-sm-3">
                <div class="form-group">
                  <label>Duration</label>
                   <input type="text" class="form-control" name="pack_des" required=""/>
                  <!--textarea class="form-control" name="pack_des" id="description" rows="10"></textarea-->
                </div>
                </div>
                
                
               
                </div-->
                <div class="clearfix"></div>
                <div class="form-actions">
                  
                  <button type="submit" class="btn btn-primary" value="add" name="Submit">Add</button>
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
<a href="<?php echo URL; ?>packages.php" class="btn btn-info btn-xs">Back</a>
    <div class="row">
      <div class="col-lg-12">
        <div class="portlet">
          <div class="portlet-heading dark">
            <div class="portlet-title">
              <h4>Edit Ad's Package</h4>
            </div>
            <div class="portlet-widgets"> <a data-toggle="collapse" data-parent="#accordion" href="#f-6"><i class="fa fa-chevron-down"></i></a> </div>
            <div class="clearfix"></div>
          </div>
          <div id="f-6" class="panel-collapse collapse in">
            <div class="portlet-body">
              <?php $sth = $db->query("SELECT * FROM `packages` WHERE `guid` = '$guid'");
				    $row = $sth-> fetch();
						  //$des = str_replace("'","^^", $row['pack_des']);
	                     // $des1 = str_replace('"',"~~", $des);
				?>
              <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                
                <div class="col-sm-3">
                    <div class="form-group">
                  <label>Type Of Ad's</label>
                   <select name="add_type" required="">
                       <option value="CLASSIFIED TEXT AD" <?php if($row['ad_type']=='CLASSIFIED TEXT AD'){ echo "selected";}?>>CLASSIFIED TEXT AD</option>
               
              <option value="CATEGORY AD" <?php if($row['ad_type']=='CATEGORY AD'){ echo "selected";}?>>CATEGORY AD</option>
                <option value="MATRIMONIAL AD"<?php if($row['ad_type']=='MATRIMONIAL AD'){ echo "selected";}?>>MATRIMONIAL AD </option>
                        <option value="JOB SEEKER AD"<?php if($row['ad_type']=='JOB SEEKER AD'){ echo "selected";}?>>JOB SEEKER AD </option>
                          </select>
                </div>
                </div>
                
                <div class="col-sm-3">
                <div class="form-group">
                  <label>Package Name</label>
                  <input type="text" class="form-control" name="pack_name" value="<?php echo $row['pack_name'];?>" required=""/>
                </div>
                </div>
                <div class="col-sm-3">
                <div class="form-group">
                  <label>Package Price($)</label>
                  <input type="text" class="form-control" name="pack_price" value="<?php echo $row['pack_price'];?>" required="" onkeyup="this.value=this.value.replace(/[^0-9]/g, '')" />
                </div>
                </div>
                <div class="col-sm-3">  
                <div class="form-group">
                  <label>Package Duration</label>
                  <input type="text" class="form-control" name="pack_des" value="<?php echo $row['pack_des'];?>" required=""/>
                  <!--textarea class="form-control" name="pack_des" id="description" rows="10"><?php echo $des1 ?></textarea-->
                </div>
                </div>
              
                <!--div class="col-sm-6">
                </div-->
                <div class="clearfix"></div>
                <div class="form-actions">
                  <input type="hidden" name="guid" value="<?php echo $guid; ?>">
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
		$sth = $db->query ("DELETE FROM `packages` WHERE `guid`='$guid'");
		//$sth->execute();
		header('location:'.URL.'packages.php'); 
	} else { ?>
<a href="<?php echo URL; ?>packages.php?action=addNew" class="btn btn-info btn-sm">Add New</a>
    <div class="row">
      <div class="col-lg-12">
        <?php if(!empty($post_msg)) { ?>
        <div class="page-header no-padding-bottom"> <?php echo $post_msg; ?> </div>
        <?php }
			$sth = $db->query ("SELECT * FROM `packages`");
			$count = $sth->rowCount();
								// $count;
		?>
        <!-- START YOUR CONTENT HERE -->
        <div class="portlet table-responsive"><!-- /Portlet -->
          <div class="portlet-heading dark">
            <div class="portlet-title">
              <h4>Ad's Packages</h4>
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
                      <th data-class="expand" class="col-medium center">S.No</th>
                      <th data-class="expand" class="col-medium center">Type of Ad's</th>
                      <th data-class="expand" class="col-medium center">Package Name</th>
                      <th data-class="expand" class="col-medium center">Package Price ($)</th>
                      <th data-class="expand" class="col-medium center">Package Duration</th>
                       <th data-class="expand" class="col-medium center">Current Date</th>
                      <th data-class="expand" class="col-medium center">Edit/ Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if($count > 0) { 
						$m = 1;
						while($row = $sth->fetch()) {
						  //$des = str_replace("'","^^", $row['pack_des']);
	                      //$des1 = str_replace('"',"~~", $des);
					?>
                    <tr>
                      <td class="col-medium center"><?php echo $m; ?></td>
                      <td class="col-medium center"><?php echo $row['add_type']; ?></td>
                      <td class="col-medium center"><?php echo $row['pack_name']; ?></td>
                      <td class="col-medium center"><?php echo $row['pack_price']; ?></td>
                      <td class="col-medium center"><?php echo $row['pack_des']; ?></td>
                      <td class="col-medium center"><?php echo $row['date']; ?></td>
                      <!--div class="panel panel-body"></div-->
                      <td class="col-medium center"><div class="btn-group btn-group-sm"> <a href="<?php echo URL; ?>packages.php?action=editData&guid=<?php echo $row[0]; ?>"  class="btn btn-inverse"><i class="fa fa-edit icon-only"></i></a> <a href="<?php echo URL; ?>packages.php?action=deleteData&guid=<?php echo $row[0]; ?>" class="btn btn-danger" onClick="return delete1();"><i class="fa fa-trash icon-only"></i></a> </div></td>
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

<!-- core JavaScript --> 

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
<script type="text/javascript" src="assets/nicEdit.js"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {

new nicEditor({fullPanel : true}).panelInstance('description');
});
</script>
</body>
</html>
