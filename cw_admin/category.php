<?php ob_start(); error_reporting(0);
require "lib/path.php";
require "lib/config.php";
require "lib/title.php";
require "lib/secure.php";
extract($_GET);
extract($_POST);
$sth = $db->query ("SELECT * FROM `super_category`");
$count = $sth->rowCount();
if(isset($_POST) && $_POST['action'] == 'updateStatus1') {
  $sth = $db->query ("UPDATE `super_category` SET `featured`='$featured' WHERE `guid`=$guid");

} else if(isset($_POST) && $_POST['action'] == 'updateStatus2') {
  $sth = $db->query ("UPDATE `super_category` SET `hot`='$hot' WHERE `guid`=$guid");

}

else if(isset($_POST) && $_POST['Submit'] == 'add') {
	$date = date('Y-m-d');
	//print_r($_POST); exit;
	$filename = stripslashes($_FILES['file']['name']);
	if(!empty($filename)) {
		$image = time()."_".$filename;
		$img_path="../adminupload/".$image;
		move_uploaded_file($_FILES['file']['tmp_name'], $img_path);
	} else {
		$image='';	
	}
	$sth = $db->query ("INSERT INTO `super_category`(`name`,`icon`) VALUES ('$name','$image')");
	if($sth > 0) {
	$post_msg = '<h4 style="color: green;">Categories Successfully Updated</h4>';	
	header('location:'.URL.'category.php?post_msg='.$post_msg);
	} else { 
	$post_msg = '<h4 style="color: red;">Please try Again</h4>';	
	header('location:'.URL.'category.php?post_msg='.$post_msg);
	 }

}
if(isset($_POST) && $_POST['submit'] == 'SaveEdit') {
	$date = date('Y-m-d');
	//print_r($_POST); exit;
	$name = stripslashes($_POST['Name']);
	$filename = stripslashes($_FILES['file']['name']);
	if(!empty($filename)) {
		$filepath ="../adminupload/".$imagefile;
		if(file_exists($filepath)) {
			unlink($filepath);
		}
		$image = time()."_".$filename;
		$img_path="../adminupload/".$image;
		move_uploaded_file($_FILES['file']['tmp_name'], $img_path);
		$ith = $db->query("UPDATE `super_category` SET `icon`='$image' WHERE `guid`='$guid'");
	} 
    
	$sth = $db->query ("UPDATE `super_category` SET `name`='$name' WHERE `guid`=$guid");
	if($sth > 0) {
	$post_msg = '<h4 style="color: green;">Details Successfully Updated</h4>';	
	header('location:'.URL.'category.php?post_msg='.$post_msg);
	} else { 
	$post_msg = '<h4 style="color: red;">Please try Again</h4>';	
	header('location:'.URL.'category.php?post_msg='.$post_msg);
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
              <li class="active"><a href="<?php echo URL; ?>category.php">Adds Category</a></li>
            </ul>
            <div class="b-right hidden-xs">
              <ul>
                
                
                <li class="dropdown"><a href="#" title="" data-toggle="dropdown"><i class="fa fa-plus"></i><span> Tasks</span></a>
                  <ul class="dropdown-menu dropdown-primary dropdown-menu-right">
                    <?php if($count < 10) {?>
                    <li><a href="<?php echo URL; ?>category.php?action=addNew">Add New Category</a></li>
                    <?php } ?>
                    <li><a href="<?php echo URL; ?>category.php">View Categories</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <!-- END BREADCRUMB -->
          <div class="page-header title"> 
            <!-- PAGE TITLE ROW -->
            <h1>Admin <span class="sub-title"><a href="category.php">Adds Category</a></span></h1>
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
                <h4>ADD NEW Category</h4>
              </div>
              <div class="portlet-widgets"> <a data-toggle="collapse" data-parent="#accordion" href="#f-6"><i class="fa fa-chevron-down"></i></a> </div>
              <div class="clearfix"></div>
            </div>
            <div id="f-6" class="panel-collapse collapse in">
              <div class="portlet-body no-padding table-responsive">
                <div class="well white">
                  <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" class="form-control" name="name" required=""/>
                    
                  </div>
                  <div class="form-group">
                    <label>Category Icon</label>
                    <input type="file" class="form-control" name="file" />
                    <label>Please upload image with 232x217 Pixels size</label>
                  </div>
                  <div class="form-actions">
                   <input type="submit" name="Submit" value="add" class="btn btn-success"/>
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
      <div class="row">
        <div class="col-lg-6">
          <div class="portlet">
            <div class="portlet-heading dark">
              <div class="portlet-title">
                <h4>Edit Category</h4>
              </div>
              <div class="portlet-widgets"> <a data-toggle="collapse" data-parent="#accordion" href="#f-6"><i class="fa fa-chevron-down"></i></a> </div>
              <div class="clearfix"></div>
            </div>
            <div id="f-6" class="panel-collapse collapse in">
              <div class="portlet-body">
                <?php $sth = $db->prepare ("SELECT * FROM `super_category` WHERE `guid` = '$guid'");
			      $sth-> execute();
				  $row = $sth-> fetch();
				?>
                <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" class="form-control" name="Name" value="<?php echo $row[1]; ?>" required="" />
                  </div>
                  <div class="form-group">
                    <label>Category Icon</label>
                    <input type="file" class="form-control" name="file"/>
                    <img src="../adminupload/<?php echo $row['icon'] ?>" height="50px" width="50px"/>
                    <label>Please upload image with 232x217 Pixels size</label>
                  </div>
                  <div class="form-actions">
                    <input type="hidden" name="guid" value="<?php echo $guid; ?>" />
                  <input type="hidden" name="imagefile" value="<?php echo $row['icon']; ?>">
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
		    $del = $db->query("SELECT `icon` FROM `super_category` WHERE `guid`='".$guid."'");
			$row = $del->fetch();
			$filepath = "../adminupload/".$row['icon'];
			if(file_exists($filepath)) {
				unlink($filepath);
			}
		$sth = $db->query ("DELETE FROM `super_category` WHERE `guid`='$guid'");
		//$sth = $db->query ("DELETE FROM `sub_category` WHERE `sid`='$guid'");
	     //$sth = $db->query ("DELETE FROM `mini_category` WHERE `cid`='$guid'");
		//$sth->execute();
		header('location:'.URL.'category.php'); 
	} else { ?>
     <a href="<?php echo URL; ?>category.php?action=addNew" class="btn btn-info">Add New Category</a>
      <div class="row">
        <div class="col-lg-12">
          <?php if(!empty($post_msg)) { ?>
          <div class="page-header no-padding-bottom"> <?php echo $post_msg; ?> </div>
          <?php 
								}
								// $count;
								 ?>
          <!-- START YOUR CONTENT HERE -->
          <div class="portlet table-responsive"><!-- /Portlet -->
            <div class="portlet-heading dark">
              <div class="portlet-title">
                <h4>Categories</h4>
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
                        <th data-class="expand" class="col-medium center">Hot Category</th>
                        <th data-class="expand" class="col-medium center">Featured Category</th>
                        <th data-class="expand" class="col-medium center">Category Name</th>
                        <th data-class="expand" class="col-medium center">Category Icon</th>
                        <th data-class="expand" class="col-medium center">Modify/Trash</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if($count > 0) { 
						$m = 1;
						while($row = $sth->fetch()) {
					?>
                      <tr>
                        <td class="col-medium center"><?php echo $m; ?></td>
                        <td class="col-medium center"> <div class="form-group tcb"><label class="tcb-inline status-line" ><input type="radio" class="hot"  <?php if($row['hot']=='YES'){ echo "checked=''";  }?> value="YES" data-id="<?php echo $row[0]; ?>" /> YES </label>&nbsp;/&nbsp;<label class="tcb-inline status-line" ><input type="radio" class="hot" <?php if($row['hot']=='NO'){ echo "checked=''";  }?> value="NO" data-id="<?php echo $row[0]; ?>"/> NO </label></div></td>
                        <td class="col-medium center"> <div class="form-group tcb"><label class="tcb-inline status-line" ><input type="radio" class="featured"  <?php if($row['featured']=='YES'){ echo "checked=''";  }?> value="YES" data-id="<?php echo $row[0]; ?>" /> YES </label>&nbsp;/&nbsp;<label class="tcb-inline status-line" ><input type="radio" class="featured" <?php if($row['featured']=='NO'){ echo "checked=''";  }?> value="NO" data-id="<?php echo $row[0]; ?>"/> NO </label></div></td>
                        <td class="col-medium center"><?php echo $row[1]; ?></td>
                        <td class="col-medium center"><div><img class="img-circle" height="50px" width="50px" src="../adminupload/<?php echo $row['icon']?>" /></div></td>
                        <td class="col-medium center"><div class="btn-group btn-group-sm"> <a href="<?php echo URL; ?>category.php?action=editData&guid=<?php echo $row[0]; ?>" class="btn btn-inverse"><i class="fa fa-edit icon-only"></i></a> <a href="<?php echo URL; ?>category.php?action=deleteData&guid=<?php echo $row[0]; ?>" class="btn btn-danger" onClick="return delete1();"><i class="fa fa-trash icon-only"></i></a></div></td>
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
<script type="text/javascript">
$('.featured').change(function(){
var status= $(this).val();
var id= $(this).data('id');
$.ajax({
		  type:"post",
		  url:"<?php echo URL; ?>category.php",
		  data:"guid="+id+"&featured="+status+"&action=updateStatus1",
			  success:function(response){
				  location.reload();
		  }
	   });
});
$('.hot').change(function(){
var status= $(this).val();
var id= $(this).data('id');
$.ajax({
		  type:"post",
		  url:"<?php echo URL; ?>category.php",
		  data:"guid="+id+"&hot="+status+"&action=updateStatus2",
			  success:function(response){
				  location.reload();
		  }
	   });
});
</script>
</body>
</html>