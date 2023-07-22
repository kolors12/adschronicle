<?php ob_start(); error_reporting(0);
require "lib/path.php";
require "lib/config.php";
require "lib/title.php";
require "lib/secure.php";
extract($_GET);
extract($_POST);
$date = date('Y-m-d');
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
              <li class="active"><a href="<?php echo URL; ?>vochure_requests.php">Discount &amp; Vochures</a></li>
            </ul>
            <div class="b-right hidden-xs">
              <ul>
                
                
                <li class="dropdown"><a href="#" title="" data-toggle="dropdown"><i class="fa fa-plus"></i><span> Tasks</span></a>
                  <ul class="dropdown-menu dropdown-primary dropdown-menu-right">
                    <li><a href="<?php echo URL; ?>vochure_requests.php">View All</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <!-- END BREADCRUMB -->
          <div class="page-header title"> 
            <!-- PAGE TITLE ROW -->
            <h1>Admin <span class="sub-title"><a href="<?php echo URL; ?>vochure_requests.php">Discount &amp; Vochures</a></span></h1>
          </div>
          <!-- /#ek-layout-button -->
          <div class="qs-layout-menu">
            <div class="btn btn-gray qs-setting-btn" id="qs-setting-btn"> <i class="fa fa-cog bigger-150 icon-only"></i> </div>
            <div class="qs-setting-box" id="qs-setting-box">
              <div class="hidden-xs hidden-sm"> <span class="bigger-120">Layout Options</span>
                <div class="hr hr-dotted hr-8"></div>
                <label>
                <input type="checkbox" class="tc" id="fixed-navbar" />
                <span id="#fixed-navbar" class="labels"> Fixed NavBar</span>
                <label>
                <input type="checkbox" class="tc" id="fixed-sidebar" />
                <span id="#fixed-sidebar" class="labels"> Fixed NavBar+SideBar</span>
                <label>
                <input type="checkbox" class="tc" id="sidebar-toggle" />
                <span id="#sidebar-toggle" class="labels"> Sidebar Toggle</span>
                <label>
                <input type="checkbox" class="tc" id="in-container" />
                <span id="#in-container" class="labels"> Inside<strong>.container</strong></span>
                <div class="space-4"></div>
              </div>
              <span class="bigger-120">Color Options</span>
              <div class="hr hr-dotted hr-8"></div>
              <label>
              <input type="checkbox" class="tc" id="side-bar-color" />
              <span id="#side-bar-color" class="labels"> SideBar (Light)</span>
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
		 }  if($action == 'deleteData') {
		$guid = $_GET['guid'];

		$sth = $db->query ("DELETE FROM `coupon_request` WHERE `guid`='$guid'");
		//$sth->execute();
		header('location:'.URL.'vochure_requests.php'); 
	} else { ?>
    <div class="row">
      <div class="col-lg-12">
        <?php if(!empty($post_msg)) { ?>
        <div class="page-header no-padding-bottom"> <?php echo $post_msg; ?> </div>
        <?php  }
            $sth = $db->query ("SELECT * FROM `coupon_request` ORDER BY `guid` DESC");
			$count = $sth->rowCount();
								// $count;
								 ?>
        <!-- START YOUR CONTENT HERE -->
        <div class="portlet table-responsive"><!-- /Portlet -->
          <div class="portlet-heading dark">
            <div class="portlet-title">
              <h4>Classified Ads Requests</h4>
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
                      <th data-class="expand" class="center">Name</th>
                      <th data-class="expand" class="center">Mobile</th>
                      <th data-class="expand" class="center">Email</th>
                      <th data-class="expand" class="center">Vochure Code</th>
                      <th data-class="expand" class="center">Company Name</th>
                      <th data-class="expand" class="center">Subscribed Date</th>
                      <th data-class="expand" class="center">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if($count > 0) { 
						$m = 1;
						while($row = $sth->fetch()) {
						  $pth = $db->query("SELECT * FROM `add_services` WHERE `pid`='".$row['service_id']."'");
                          $prow = $pth->fetch();
					?>
                    <tr>
                      <td class="center"><?php echo $m; ?></td>
                      <td class="center"><?php echo $row['txtFullname']; ?></td>
                      <td class="center"><?php echo $row['txtMobile']; ?></td>
                      <td class="center"><?php echo $row['txtEmail']; ?></td>
                      <td class="center"><?php echo $row['coupon_code']; ?></td>
                      <td class="center"><?php echo $prow['add_title']; ?></td>
                      <td class="center"><?php echo date("M d, Y",strtotime($row['date'])); ?></td>
                      <td class="center"><div class="btn-group btn-group-sm"><a href="<?php echo URL; ?>vochure_requests.php?action=deleteData&guid=<?php echo $row[0]; ?>" class="btn btn-danger" onClick="return delete1();"><i class="fa fa-trash icon-only"></i></a> </div></td>
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
function delete1() {
  if(window.confirm("Confirm delete")) {
  return true;
 }
 else
   return false;
}
</script>
</body>
</html>