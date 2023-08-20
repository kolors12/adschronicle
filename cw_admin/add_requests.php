<?php ob_start(); error_reporting(0);
require "lib/path.php";
require "lib/config.php";
require "lib/title.php";
require "lib/secure.php";
extract($_GET);
extract($_POST);
$date = date('Y-m-d');
if(isset($_POST) && $_POST['submit']=='editdata') {

        $txtContent = str_replace("'","^^",$_POST['txtContent']);
        $txtContent = str_replace('"','~~',$txtContent);
     //echo "UPDATE `adds_requests` SET `txtName`='$txtName',`txtMobile`='$txtMobile', `txtEmail`='$txtEmail',`txtAdTitle`='$txtAdTitle',`txtContent`='$txtContent',`txtC_City`='$txtC_City',`txtC_Category`='$txtC_Category',  `txtMembership_no`='$txtMembership_no' WHERE `guid`='$qid'"; exit;
	$sth = $db->query("UPDATE `adds_requests` SET `txtName`='$txtName',`txtMobile`='$txtMobile', `txtEmail`='$txtEmail',`txtAdTitle`='$txtAdTitle',`txtContent`='$txtContent',`txtC_City`='$txtC_City',`txtC_Category`='$txtC_Category',  `txtMembership_no`='$txtMembership_no' WHERE `guid`='$qid'");
	if($sth == true) { ?>
	<script type="text/javascript">
			alert('Data Successfully Updated');
			window.location="<?php echo URL; ?>add_requests.php";
			</script>
	<?php } else { ?>
	<script type="text/javascript">
			alert('Please try Again');
			window.location="<?php echo URL; ?>add_requests.php";
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
              <li class="active"><a href="<?php echo URL; ?>add_requests.php">Text Classified Ads</a></li>
            </ul>
            <div class="b-right hidden-xs">
              <ul>
                
                
                <li class="dropdown"><a href="#" title="" data-toggle="dropdown"><i class="fa fa-plus"></i><span> Tasks</span></a>
                  <ul class="dropdown-menu dropdown-primary dropdown-menu-right">
                    <li><a href="<?php echo URL; ?>add_requests.php">View All</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <!-- END BREADCRUMB -->
          <div class="page-header title"> 
            <!-- PAGE TITLE ROW -->
            <h1>Admin <span class="sub-title"><a href="<?php echo URL; ?>add_requests.php">Text Classified Ads</a></span></h1>
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
                <span id="#in-container" class="labels"> Inside<b>.container</b></span>
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
		 } if($action == 'changeStatus') {
		$guid = $_GET['guid']; $status = $_GET['status']; 
                if($status=='Active'){
		$sth = $db->query ("UPDATE `adds_requests` SET `status`='$status',`active_date`='".date('Y-m-d')."' WHERE `guid`='$guid'");
                } else { 
		$sth = $db->query ("UPDATE `adds_requests` SET `status`='$status' WHERE `guid`='$guid'");

                }
		header('location:'.URL.'add_requests.php'); 
	} else if(isset($action) && $action=='editData') { 
       $q = $_GET['guid'];
	   $sth = $db->query ('SELECT * FROM `adds_requests` WHERE `guid`="'.$q.'"');
	   $row = $sth->fetch();
   ?>
<a href="<?php echo URL; ?>add_requests.php" class="btn btn-info btn-xs">Back</a>
    <div class="row">
      <div class="col-lg-8"> 
        <!--portlet start--->
        <div class="portlet">
          <div class="portlet-heading dark">
            <div class="portlet-title">
              <h4>Edit Text Classified Ads</h4>
            </div>
            <div class="portlet-widgets"> <a data-toggle="collapse" data-parent="#accordion" href="#f-12" class="" aria-expanded="true"><i class="fa fa-chevron-down"></i></a> </div>
            <div class="clearfix"></div>
          </div>
          <div id="f-12" class="panel-collapse collapse in" aria-expanded="true">
            <div class="portlet-body">
              <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
			   <div class="form-group">
                  <label> Full Name</label>
                    <input class="form-control" name="txtName"  value="<?php echo $row['txtName']?>" required="" />
					
                </div> 
				<div class="form-group">
                  <label> Mobile Number </label>
                    <input class="form-control" type="text" name="txtMobile"  value="<?php echo $row['txtMobile']?>" required="" maxlength="10" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"/>
					
                </div>
				<div class="form-group">
                  <label> Email </label>
                    <input class="form-control" name="txtEmail"  value="<?php echo $row['txtEmail']?>" required="" />
					
                </div>
                <div class="form-group">
                  <label>Ad Category</label>
                    <select class="form-control pid" name="txtC_Category" id="pid" required="">
                        <option value="">Select Category</option>
                        
						  <?php $cit = $db->query("SELECT * FROM `cat` ORDER BY `name` ASC");
                      while($ciroww = $cit->fetch()){ ?>
                    <option value="<?php echo $ciroww['guid'] ?>" <?php if($row['txtC_Category']==$ciroww['guid']){ echo "selected"; } ?>><?php echo $ciroww['name'] ?></option>
                  <?php } ?>
                   </select>
                </div>
                <div class="form-group">
                <label>Ad City</label>
                <select class="form-control required" id="txtC_City" name="txtC_City">
                  <option value="">Select City</option>
                  <?php $citb = $db->query("SELECT * FROM `cities` ORDER BY `name` ASC");
                      while($cirt = $citb->fetch()){ ?>
                    <option value="<?php echo $cirt['guid'] ?>" <?php if($row['txtC_City']==$cirt['guid']){ echo "selected"; } ?>><?php echo $cirt['name'] ?></option>
                  <?php } ?>

              </select>

                </div>
                
				 <div class="form-group">
                  <label>Advertiser/Title</label>
                    <select class="form-control sid" name="txtAdTitle" id="sid" required="">
                        <option value="">Select Title</option>
                       <?php $cits = $db->query("SELECT * FROM `subv` where sid='".$row['txtC_Category']."' ORDER BY `name` ASC");
                      while($cirs = $cits->fetch()){ ?>
                    <option value="<?php echo $cirs['guid'] ?>" <?php if($row['txtAdTitle']==$cirs['guid']){ echo "selected"; } ?>><?php echo $cirs['name'] ?></option>
                  <?php } ?>


                   </select>
                </div>
                <div class="form-group">
                  <label>Description</label>
                    <textarea class="form-control" name="txtContent" required=""><?php $des = str_replace("^^","'",$row['txtContent']); echo $des = str_replace('~~','"',$des); ?></textarea>
                </div>
                <div class="form-group">
                  <label>Ad Membership No</label>
                    <input class="form-control" name="txtMembership_no"  value="<?php echo $row['txtMembership_no']?>" required="" />
                </div>
              <div class="form-actions">
                  <input type="hidden" name="qid" value="<?php echo $q; ?>"/>
                  <button type="submit" class="btn btn-primary" name="submit" value="editdata">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!--portlet end---> 
      </div>
    </div>
    <?php } else if($action == 'deleteData') {
		$guid = $_GET['guid'];
		$cth = $db->query ("SELECT * FROM `adds_requests` WHERE `guid`='$guid'");
        $crow = $cth->fetch();
        unlink("../adminupload/".$crow['txtFile']);
		$sth = $db->query ("DELETE FROM `adds_requests` WHERE `guid`='$guid'");
		//$sth->execute();
		header('location:'.URL.'add_requests.php'); 
	} else { ?>
    <div class="row">
      <div class="col-lg-12">
        <?php if(!empty($post_msg)) { ?>
        <div class="page-header no-padding-bottom"> <?php echo $post_msg; ?> </div>
        <?php  }
            $sth = $db->query ("SELECT * FROM `adds_requests` ORDER BY `guid` DESC");
			$count = $sth->rowCount();
								// $count;
								 ?>
       
        <div class="portlet table-responsive">
          <div class="portlet-heading dark">
            <div class="portlet-title">
              <h4>Text Classified Ads</h4>
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
                       <th data-class="expand" class="center">Ref Number</th>
                      <th data-class="expand" class="center">Details</th>
                      <th data-class="expand" class="center">Ad Details</th>
                      <!-- <th data-class="expand" class="center">Ad Content</th> -->
                      <th data-class="expand" class="center">Ad Content</th>
		                  <th data-class="expand" class="center">Date of Posting</th>
                      <th data-class="expand" class="center">Date of Activation</th>
                      <th data-class="expand" class="center">Edit/Trash</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if($count > 0) { 
						$m = 1;
						while($row = $sth->fetch()) {
						  $lth = $db->query("SELECT * FROM `cities` WHERE `guid`='".$row['txtC_City']."'");
                          $lrow = $lth->fetch(); 
						 
						  $lthh = $db->query("SELECT * FROM `cat` WHERE `guid`='".$row['txtC_Category']."'");
                          $lroo = $lthh->fetch();
						 //echo "SELECT * FROM `subv` WHERE `sid`='".$row['txtAdTitle']."'";exit;

						   $lte = $db->query("SELECT * FROM `subv` WHERE `guid`='".$row['txtAdTitle']."'");

                          $lrr = $lte->fetch();
					?>
					
					
                    <tr>
                      <td class="center"><a href="javascript:;" class="btn btn-xs btn-info payment-button" data-id="<?php echo $row[0] ?>"><i class="fa fa-link"></i><?php echo $m; ?> </a></td>
                      <td class="center">
                        <div class="form-group">
                        <label><input type="radio" onclick="window.location='<?php echo URL; ?>add_requests.php?action=changeStatus&guid=<?php echo $row[0]; ?>&status=Active'" <?php if($row['status']=='Active'){ echo "checked"; }?> /> Activate</label><br />
                        <label><input type="radio" onclick="window.location='<?php echo URL; ?>add_requests.php?action=changeStatus&guid=<?php echo $row[0]; ?>&status=DeActive'" <?php if($row['status']=='DeActive'){ echo "checked"; }?> /> DeActivate</label><br />
                        </div>
                        </td>
                      <td class="center"><small><?php echo 'ADS'.-$row['guid']; ?></small></td>
                      <td class="center"><small><b>Name:</b> <?php echo $row['txtName']; ?><br /><b>Email Id:</b> <?php echo $row['txtEmail']; ?><br /><b>Mobile:</b> <?php echo $row['txtMobile']; ?></small></td>
                      <td class="center"><small><b>City:</b> <?php echo $lrow['name']; ?><br />
                      <b>Ad Category:</b> <?php echo $lroo['name']; ?><br /><b>Ad Title:</b> <?php echo $lrr['name']; ?><br /><b>Ad Membership no:</b> <?php echo $row['txtMembership_no']; ?></small></td>
                      <!-- <td class="center" width="10%"><div class="panel panel-body"><?php// $des = str_replace("^^","'",$row['txtContent']); echo $des = str_replace('~~','"',$des); ?></div></td> -->
                      <td class="center"><a href="javascript:;" class="btn btn-xs btn-info content-button" data-id="<?php echo $row[0] ?>"></i>Contect</a></td>
                      <!--<td class="center"><a href="../adminupload/<?php //echo $row['txtFile']; ?>" target="_blank"><?php //echo $row['txtFile']; ?></a></td>-->
					  <td class="center"><?php echo $row['date']; ?></td>
                      <td class="center"><?php if($row['active_date']!='' && $row['active_date']!='0000-00-00')echo $row['active_date']; else echo "Not Activated yet" ?></td>
                      <td class="center"><div class="btn-group btn-group-xs"><a href="<?php echo URL; ?>add_requests.php?action=editData&guid=<?php echo $row[0]; ?>" class="btn btn-inverse"><i class="fa fa-edit icon-only"></i></a><a href="<?php echo URL; ?>add_requests.php?action=deleteData&guid=<?php echo $row[0]; ?>" class="btn btn-danger" onClick="return delete1();"><i class="fa fa-trash icon-only"></i></a> </div></td>
                    </tr>
                    <?php $m++; } } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    <?php } ?>
   
    <?php require "footer.php"; ?>
    </button>
    <!-- END FOOTER CONTENT --> 
  </div>
  <!-- /#page-wrapper --> 
  <!-- END MAIN PAGE CONTENT --> 
</div>
</div>




<div class="modal fade" id="content-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ad Content</h4>
      </div>
      <div class="modal-body content-body">
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
<script type="text/javascript">

$('.pid').change(function(){

var id= $('#pid').val();

$.ajax({

		  type:"post",

		  url:"<?php echo URL; ?>ajaxReq1.php",

		  data:"pid="+id+"&action=fetchexp",

			  success:function(response){

				  $('.sid').html(response);

				return true;

		  }

	   });

})



$('.content-button').click(function(){
var id= $(this).data('id');
$.ajax({
		  type:"post",
		  url:"<?php echo URL; ?>ajaxpayment2.php",
		  data:"guid="+id+"&action=classifiedad",
			  success:function(response){
				  $('.content-body').html(response);
                  $('#content-modal').modal("show", {backdrop: 'static'});
				return true;
		  }
	   });
});


$('.payment-button').click(function(){
var id= $(this).data('id');
$.ajax({
		  type:"post",
		  url:"<?php echo URL; ?>ajaxpayment.php",
		  data:"guid="+id+"&action=classifiedad",
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