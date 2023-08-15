<?php ob_start(); error_reporting(0);
require "lib/path.php";
require "lib/config.php";
require "lib/title.php";
require "lib/secure.php";

extract($_GET);
extract($_POST);
if(isset($_POST) && $_POST['Submit'] == 'add') {
	$date = date('Y-m-d');
	//print_r($_POST); exit;
	foreach($name as $names)
	{
	$sth = $db->exec ("INSERT INTO `religions`(`name`) VALUES ('$names')");
	}
	if($sth > 0) {
	$post_msg = '<h4 style="color: green;">Religions Successfully Added</h4>';	
	header('location:'.URL.'religions.php?post_msg='.$post_msg);
	} else { 
	$post_msg = '<h4 style="color: red;">Please try Again</h4>';	
	header('location:'.URL.'religions.php?post_msg='.$post_msg);
	}
}
if(isset($_POST) && $_POST['submit'] == 'SaveEdit') {
	$date = date('Y-m-d');
	//print_r($_POST); exit;
	$name = stripslashes($_POST['Name']);
	$sth = $db->exec ("UPDATE `religions` SET `name`='$name' WHERE `guid`=$guid");
	
	if($sth > 0) {
	$post_msg = '<h4 style="color: green;">Details Successfully Updated</h4>';	
	header('location:'.URL.'religions.php?post_msg='.$post_msg);
	} else { 
	$post_msg = '<h4 style="color: red;">Please try Again</h4>';	
	header('location:'.URL.'religions.php?post_msg='.$post_msg);
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
            <li class="active"><a href="<?php echo URL; ?>brides.php">Brides Serch Details</a></li>
          </ul>
          <div class="b-right hidden-xs">
            <ul>
              <li class="dropdown"><a href="#" title="" data-toggle="dropdown"><i class="fa fa-plus"></i><span> Tasks</span></a>
                <ul class="dropdown-menu dropdown-primary dropdown-menu-right">
                  <li><a href="<?php echo URL; ?>brides.php?action=addNew">Add New </a></li>
                  <li><a href="<?php echo URL; ?>brides.php">View Religions</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
        <!-- END BREADCRUMB -->
        
        <div class="page-header title"> 
          <!-- PAGE TITLE ROW -->
          <h1>Admin <span class="sub-title"><a href="brides.php">Brides Serch Details</a></span></h1>
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
    <div class="row">
      <div class="col-lg-8">
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
                <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                  <table class="datatable table table-hover table-striped table-bordered tc-table">
                    <tbody>
                      <tr>
                        <td colspan="3" align="center">
                          <table id="customFields" class="datatable table table-striped  table-hover table-responsive"  width="100%">
                            <input type="hidden" name="rowfield" id="rowfield" value="1"/>
                            <tr>
                              <td>Religion Name</td>
                              <td><div align="center">:</div></td>
                              <td align="right">
                              <div align="center">
                                  <input type="text" name="name[]" required class="form-control">
                              </div>
                              </td>
                              <td><input value="0" name="chkRemoveAuthor[0]" type="checkbox"  class="form-control"/></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td colspan="3" align="center"><table width="100%">
                            <tr>
                              <td><a href="javascript:void(0);" id="addCF" onclick="chaitu()" class="btn btn-purple">Add New</a></td>
                              <td align="right"><div align="right"><a href="javascript:void(0);"  onclick="deleteRow('customFields')" class="btn btn-red">Delete</a></div></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td colspan="3" align="center"><input type="submit" name="Submit" value="add" class="btn btn-success"></td>
                      </tr>
                    </tbody>
                  </table>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } else if($action == 'editData') { 
	$guid = $_GET['guid'];  ?>
    <div class="row">
      <div class="col-lg-6">
        <div class="portlet">
          <div class="portlet-heading dark">
            <div class="portlet-title">
              <h4>Edit</h4>
            </div>
            <div class="portlet-widgets"> <a data-toggle="collapse" data-parent="#accordion" href="#f-6"><i class="fa fa-chevron-down"></i></a> </div>
            <div class="clearfix"></div>
          </div>
          <div id="f-6" class="panel-collapse collapse in">
            <div class="portlet-body">
              <?php $sth = $db->prepare ("SELECT * FROM `religions` WHERE `guid` = '$guid'");
			      $sth-> execute();
				  $row = $sth-> fetch();
				?>
              <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                  <label>Religion Name</label>
                  <input type="text" class="form-control" name="Name" value="<?php echo $row[1]; ?>">
                </div>
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
		$ath = $db->query ("DELETE FROM `sects` WHERE `sid`='$guid'");
		$sth = $db->query ("DELETE FROM `religions` WHERE `guid`='$guid'");
		//$sth->execute();
		header('location:'.URL.'religions.php'); 
	} else { ?>
    <div class="row">
      <div class="col-lg-8">
        <?php if(!empty($post_msg)) { ?>
        <div class="page-header no-padding-bottom"> <?php echo $post_msg; ?> </div>
        <?php  }
								$sth = $db->query ("SELECT * FROM `mat_persons`");
								$count = $sth->rowCount();
								// $count;
								 ?>
        <!-- START YOUR CONTENT HERE -->
        <div class="portlet table-responsive"><!-- /Portlet -->
          <div class="portlet-heading dark">
            <div class="portlet-title">
              <h4>Religions</h4>
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
                      <th data-class="expand" class="col-medium center">Mobile Number </th>
                      <th data-class="expand" class="col-medium center">Date & Time</th>
                      <!-- <th data-class="expand" class="col-medium center">Edit/ Delete</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php if($count > 0) { 
						$m = 1;
						while($row = $sth->fetch()) {
					?>
                    <tr>
                      <td class="col-medium center"><?php echo $m; ?></td>
                      <td class="col-medium center"><?php echo $row[1]; ?></td>
                      <td class="col-medium center"><?php echo $row[3]; ?></td>
                      <!-- <td class="col-medium center"><div class="btn-group btn-group-sm"> <a href="<?php echo URL; ?>religions.php?action=editData&guid=<?php echo $row[0]; ?>"  class="btn btn-inverse"><i class="fa fa-edit icon-only"></i></a> <a href="<?php echo URL; ?>religions.php?action=deleteData&guid=<?php echo $row[0]; ?>" class="btn btn-danger" onClick="return delete1();"><i class="fa fa-trash icon-only"></i></a> </div></td> -->
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
<script type="text/javascript">
		 function chaitu()
		 {
			 var dfd=document.getElementById('rowfield').value;
    var dd=parseFloat(dfd)+parseFloat(1);//alert(dd);
    document.getElementById('rowfield').value=dd; 
		  }
		 $(document).ready(function(){
			$("#addCF").click(function(){
				var dfds=document.getElementById('rowfield').value;
		$("#customFields").append('<tr><td>Religions Name</td><td align="right"><div align="right">:</div></td><td><div align="center"><input type="text" name="name[]" required  class="form-control"></div></td><td><input value="0" name="chkRemoveAuthor[0]" type="checkbox"   class="form-control"/></td></tr>');
		$("#remCF").on('click',function(){
			$(this).parent().parent().remove();
		});
	});
});

function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            for(var i=0; i<rowCount; i++) {
				
                var row = table.rows[i];
                var chkbox = row.cells[3].childNodes[0];
				
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
				
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
 
 
            }
            }catch(e) {
                alert(e);
            }
        }
</script>
 
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
