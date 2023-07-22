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
              <li class="active"><a href="<?php echo URL; ?>orders.php"> Orders</a></li>
            </ul>
            <div class="b-right hidden-xs">
              <ul>
                
                
                <li class="dropdown"><a href="#" title="" data-toggle="dropdown"><i class="fa fa-plus"></i><span> Tasks</span></a>
                  <ul class="dropdown-menu dropdown-primary dropdown-menu-right">
                    <li><a href="<?php echo URL; ?>orders.php">View Orders</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <!-- END BREADCRUMB -->
          <div class="page-header title"> 
            <!-- PAGE TITLE ROW -->
            <h1>Admin <span class="sub-title"><a href="<?php echo URL; ?>orders.php"> Orders</a></span></h1>
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
		 } if($action=='Updatestatus') { 		 	
		 	$sth = $db->query ("SELECT * FROM `orders` WHERE `guid`='$guid'");
			$row = $sth->fetch();
			?>
      <div class="row">
        <div class="col-lg-6">
          <div class="portlet">
            <div class="portlet-heading dark">
              <div class="portlet-title">
                <h4>Update Status</h4>
              </div>
              <div class="portlet-widgets"> <a data-toggle="collapse" data-parent="#accordion" href="#f-6"><i class="fa fa-chevron-down"></i></a> </div>
              <div class="clearfix"></div>
            </div>
            <div id="f-6" class="panel-collapse collapse in">
              <div class="portlet-body no-padding table-responsive">
                <div class="well white">
                  <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                    <div class="form-group">
                      <label>Order Status</label>
                      <select name="status" class="form-control"  required>
                        <option value="">Select Status</option>
                        <option <?php if($row['status']=='Cancelled') {?> selected<?php } ?>>Cancelled</option>
                        <option <?php if($row['status']=='Pending') {?> selected<?php } ?>>Pending</option>
                        <option <?php if($row['status']=='Processing') {?> selected<?php } ?>>Processing</option>
                        <option <?php if($row['status']=='OutforDelivery') {?> selected<?php } ?>>Out for Delivery</option>
                        <option <?php if($row['status']=='Delivered') {?> selected<?php } ?>>Delivered</option>
                        <option <?php if($row['status']=='Blocked') {?> selected<?php } ?>>Blocked</option>
                      </select>
                    </div>
                    <div class="form-actions">
                      <input type="hidden" name="guid" value="<?php echo $guid; ?>"/>
                      <input type="submit" name="Submit" value="updatestatus" class="btn btn-success">
                      <button type="reset" class="btn">Reset</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } else if($action=='viewDetails') { 								
		 	$sth = $db->query ("SELECT * FROM `orders` WHERE `guid`='$guid'");
			$row = $sth->fetch();
		 	$oth = $db->query ("SELECT * FROM `order_details` WHERE `orderid`='".$row['order_id']."'");
			$orow = $oth->fetch();
		    $ssth = $db->query ("SELECT * FROM `user_profile` WHERE `user_id`='".$row['service_subscriber']."'");
			$rrow = $ssth->fetch();
		    $seth = $db->query ("SELECT * FROM `user_profile` WHERE `user_id`='".$row['service_provider']."'");
			$rerow = $seth->fetch();
		 ?>
      <div class="row">
        <div class="col-lg-12">
          <div class="portlet">
            <div class="portlet-heading dark">
              <div class="portlet-title">
                <h4>More Order Details</h4>
              </div>
              <div class="portlet-widgets"> <a data-toggle="collapse" data-parent="#accordion" href="#f-6"><i class="fa fa-chevron-down"></i></a> </div>
              <div class="clearfix"></div>
            </div>
            <div id="f-6" class="panel-collapse collapse in">
              <div class="portlet-body no-padding table-responsive">
                <div class="well no-padding no-border-bottom no-margin-bottom">
                  <ul class="lists">
                    <li>Order Id: <strong>#<?php echo $row['order_id']; ?></strong></li>
                  </ul>
                  <div class="col-sm-6">
                     <div class="portlet-body">
                      <h4>Customer Details</h4>
                      <address>
						<strong><i class="fa fa-user"></i> <?php echo $rrow['txtName']; ?></strong>
						<br/><i class="fa fa-map-marker"></i> <?php echo $rrow['txtAddress']; ?>

                        <br/><i class="fa fa-envelope"></i> <?php echo $rrow['txtEmail']; ?>
						<br/><i class="fa fa-phone-square"></i> (91) <?php echo $rrow['txtMobile']; ?>
					  </address>
                      <h4>Seller Details</h4>
                      <address>
						<strong><i class="fa fa-user"></i> <?php echo $rerow['txtName']; ?></strong>
						<br/><i class="fa fa-map-marker"></i> <?php echo $rerow['txtAddress']; ?>

                        <br/><i class="fa fa-envelope"></i> <?php echo $rerow['txtEmail']; ?>
						<br/><i class="fa fa-phone-square"></i> (91) <?php echo $rerow['txtMobile']; ?>
					  </address>
                      </div>
                      <!-- List Group Style 1-->
                      
                    <!-- List Group Style 1--> 
                  </div>
                  <div class="col-sm-6">
                      <div class="portlet-body">
                      <address>
                      <!-- List Group Style 1-->
                     
                      <p>Final Amount: <strong>Rs <?php echo $row['service_cost']; ?></strong></p>
                      <!--<p>Discount Amount:</p>-->
                      <p>Order Status: <strong><?php echo $row['status']; ?></strong></p>
                       <h4>Customer Shipping Details</h4>
                      <address>
						<strong><i class="fa fa-user"></i> <?php echo $orow['name']; ?></strong>
						<br/><i class="fa fa-map-marker"></i> <?php echo $orow['address2']; ?>, <?php echo $orow['address1']; ?>
						<br/><i class="fa fa-map-marker"></i> Pincode: <?php echo $orow['pincode']; ?>
						<br/><i class="fa fa-map-marker"></i> City: <?php echo $orow['deliverycity']; ?>
						<br/><i class="fa fa-map-marker"></i> State, Country: <?php echo $orow['state'].", ".$orow['country']; ?>

                        <br/><i class="fa fa-envelope"></i> <?php echo $orow['email']; ?>
						<br/><i class="fa fa-phone-square"></i> (91) <?php echo $orow['mobile']; ?>
					  </address>
					  </address>
                      </div>
                    <!-- List Group Style 1--> 
                  </div>
                  <div class="col-sm-12" style="overflow:hidden; overflow-y:scroll ">
                    <table class="datatable table table-hover table-striped table-bordered tc-table ">
                      <thead>
                        <tr>
                          <th>Service Name</th>
                          <th>Service Price</th>
                       </tr>
                      </thead>
                      <tbody>
                        <?php 
						 $or=$db->query("SELECT * FROM `orders` WHERE `guid`='$guid'");
						 $or_row=$or->fetch();
						 ?>
                        <tr>
                          <td><?php echo $or_row['service_name']; ?></td>
                          <td>Rs <?php echo sprintf("%.2f",$or_row['service_cost']); ?></td>
                        </tr>
                        <?php  ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } else if($action == 'deleteData') {
		$guid = $_GET['guid'];
        $sth = $db->query ("SELECT * FROM `orders` WHERE `guid`='$guid'");
		$de = $sth->fetch();
		$deth = $db->query ("DELETE FROM `order_items` WHERE `orderid`='".$de['order_id']."'");
		$dth = $db->query ("DELETE FROM `orders` WHERE `guid`='$guid'");
		//$sth->execute();
		header('location:'.URL.'orders.php'); 
	} else { ?>
      <div class="row">
        <div class="col-lg-12">
          <?php if(!empty($post_msg)) { ?>
          <div class="page-header no-padding-bottom"> <?php echo $post_msg; ?> </div>
          <?php  } $sth = $db->query ("SELECT * FROM `orders` ORDER BY `guid` DESC");
                $count = $sth->rowCount();
								// $count;
								 ?>
          <!-- START YOUR CONTENT HERE -->
          <div class="portlet table-responsive"><!-- /Portlet -->
            <div class="portlet-heading dark">
              <div class="portlet-title">
                <h4>Orders (<?php echo $count; ?>)</h4>
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
                        <th data-class="expand" style="display:none"></th>
                        <th data-class="expand" class="col-medium center">S.No</th>
                        <th data-class="expand" class="col-medium center">Order Id</th>
                        <th data-class="expand" class="col-medium center">Service Name</th>
                        <th data-class="expand" class="col-medium center">Service Cost</th>
                        <th data-class="expand" class="col-medium center">Status</th>
                        <th data-class="expand" class="col-medium center">More Details</th>
                        <th data-class="expand" class="col-medium center">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if($count > 0) { 
						$m = 1;
						while($row = $sth->fetch()) {
                      
					//$uth=$db->query("SELECT `rname` FROM `register` WHERE `user_id`='".$row['user_id']."'");
					//$u_row=$uth->fetch();
					?>
                      <tr>
                        <td style="display:none">&nbsp;</td>
                        <td class="col-medium center"><?php echo $m; ?></td>
                        <td class="col-medium center">#<?php echo $row['order_id']; ?></td>
                        <td class="col-medium center"><?php echo $row['service_name']; ?></td>
                        <td class="col-medium center"><?php echo $row['service_cost']; ?></td>
                        <td class="col-medium center update-st-<?php echo $row[0]; ?>"><select name="st_update" class="stchange-<?php echo $row[0]; ?>" style="background:none" onChange="return Update(<?php echo $row[0]; ?>);">
                            <option <?php if($row['status']=='Cancelled') {?> selected<?php } ?> value="Cancelled">Cancelled</option>
                            <option <?php if($row['status']=='Pending') {?> selected<?php } ?> value="Pending">Pending</option>
                            <option <?php if($row['status']=='Processing') {?> selected<?php } ?> value="Processing">Processing</option>
                            
                            <option <?php if($row['status']=='Completed') {?> selected<?php } ?> value="Completed">Completed</option>
                          </select></td>
                        <td class="col-medium center"><div class="btn-group btn-group-sm"><a href="<?php echo URL; ?>orders.php?action=viewDetails&guid=<?php echo $row[0]; ?>"  class="btn btn-inverse"><i class="fa fa-link icon-only"></i></a></div></td>
                        <td class="col-medium center"><div class="btn-group btn-group-xs"><a href="<?php echo URL; ?>orders.php?action=deleteData&guid=<?php echo $row[0]; ?>" class="btn btn-danger" onClick="return delete1();"><i class="fa fa-trash icon-only"></i></a> </div></td>
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
		// status update	
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
					data:"guid="+guid+"&status="+value+"&Submit=updateorderstatus",
					success:function(data){
                                           //alert(data);
					   location.reload();
                                           //$(ld).html(data);
					 }
			  		});
			}
	</script> 
<script type="text/javascript">
function delete1()
{
  if(window.confirm("Confirm delete"))
  {
  return true;
   }
 else
   return false;
}
</script>
</body>
</html>