<?php ob_start(); error_reporting(0);

require "lib/path.php";

require "lib/config.php";

require "lib/title.php";

require "lib/secure.php";

extract($_GET);

extract($_POST);

$date = date('Y-m-d');

if(isset($_POST) && $_POST['submit'] == 'add') {
	    stripslashes($_POST);
         $filename = $_FILES['image']['name'];
		 if(!empty($filename)) {
			$images1 = time().$filename;
			move_uploaded_file($_FILES['image']['tmp_name'],"../adminupload/".$images1); 
		 }
		 $dess = str_replace("'","^^",$des);		 
		 //echo $descc; exit;
		 $vth = $db->query("INSERT INTO `projects`(`title`,`property`,`description`, `image`, `date`) VALUES ('$title','$state', '$dess','$images1','$date')");
        // adding variants
		if($vth > 0) {
			$post_msg = '<h4 style="color: green;">Details added Successfully</h4>';	
			header('location:'.URL.'projects.php?post_msg='.$post_msg);
		} else { 
			$post_msg = '<h4 style="color: red;">Please try Again</h4>';	
			header('location:'.URL.'projects.php?post_msg='.$post_msg);
 		}
}

else if(isset($_POST) && $_POST['submit'] == 'SaveEdit') {

	//print_r($_POST); exit;
	stripslashes($_POST);
    //update variant
         $filename = $_FILES['image']['name'];
		 if(!empty($filename)) {
			$images1 = time().$filename;
			move_uploaded_file($_FILES['image']['tmp_name'],"../adminupload/".$images1); 
	        $ath = $db->query("UPDATE `projects` SET `image`= '$images1' WHERE `guid`='$guid'");
		 }
		 $dess = str_replace("'","^^",$des);		 
	$vth = $db->query("UPDATE `projects` SET `title`= '$title',`property`='$state', `description` = '$dess', `date`='$date' WHERE `guid`='$guid'");
	
	if($vth > 0) {

	$post_msg = '<h4 style="color: green;">Details Successfully Updated</h4>';	

	header('location:'.URL.'projects.php?post_msg='.$post_msg);

	} else { 

	$post_msg = '<h4 style="color: red;">Please try Again</h4>';	

	header('location:'.URL.'projects.php?post_msg='.$post_msg);

	}



}  else {



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
              <li class="active"><a href="<?php echo URL; ?>projects.php"> Projects</a></li>
            </ul>
            <div class="b-right hidden-xs">
              <ul>
                
                
                <li class="dropdown"><a href="#" title="" data-toggle="dropdown"><i class="fa fa-plus"></i><span> Tasks</span></a>
                  <ul class="dropdown-menu dropdown-primary dropdown-menu-right">
                    <li><a href="<?php echo URL; ?>projects.php?action=addNew">Add New</a></li>
                    <li><a href="<?php echo URL; ?>projects.php">View All</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          
          <!-- END BREADCRUMB -->
          
          <div class="page-header title"> 
            
            <!-- PAGE TITLE ROW -->
            
            <h1>Admin <span class="sub-title"><a href="<?php echo URL; ?>projects.php"> Projects</a></span></h1>
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

		 } if($action == 'addNew') { ?>
      <a href="<?php echo URL; ?>projects.php" class="btn btn-info">Back</a>
      <div class="row">
        <div class="col-lg-10">
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
                    <div class="clearfix"></div>
                    <div class="form-group col-sm-12">
                      <label>Tite</label>
                      <input type="text" class="form-control" name="title" placeholder="Enter Title" required>
                    </div>
                    <div class="form-group col-sm-12">
                      <label>Project Category</label>
                      <select name="state" required class="form-control state">
                        <option value=""> Select Category </option>
                        <?php $sth = $db->query ("SELECT * FROM `property`");
					    while($l_row = $sth->fetch()){
						   echo "<option value='".$l_row[0]."'>". $l_row[1] ."</option>";	
						 }
						?>
                      </select>
                    </div>
                    <div class="form-group col-sm-12">
                      <label>Image</label>
                      <input type="file" class="form-control" name="image" required>
                    </div>
                    <div class="form-group col-sm-11">
                      <label>Description</label>
                      <textarea class="form-control" name="des" id="description" placeholder="Enter Description"></textarea>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-actions">
                      <button type="submit" class="btn btn-primary" value="add" name="submit">Submit</button>
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
      <a href="<?php echo URL; ?>projects.php" class="btn btn-info">Back</a>
      <div class="row">
        <div class="col-lg-10">
          <div class="portlet">
            <div class="portlet-heading dark">
              <div class="portlet-title">
                <h4>Edit</h4>
              </div>
              <div class="portlet-widgets"> <a data-toggle="collapse" data-parent="#accordion" href="#f-6"><i class="fa fa-chevron-down"></i></a> </div>
              <div class="clearfix"></div>
            </div>
            <div id="f-6" class="panel-collapse collapse in">
              <div class="portlet-body col-sm-12">
                <?php $psth = $db->query ("SELECT * FROM `projects` WHERE `guid`='$guid'");  $prow = $psth->fetch(); ?>
                <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                  <div class="clearfix"></div>
                  <div class="form-group col-sm-12">
                    <label>Tite</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $prow['title']; ?>" required>
                  </div>
                  <div class="form-group col-sm-12">
                    <label>Project Category</label>
                    <select name="state" required class="form-control state">
                      <option value=""> Select Category </option>
                      <?php $sth = $db->query ("SELECT * FROM `property`");
					    while($l_row = $sth->fetch()){
						   echo "<option value='".$l_row[0]."'";
						    if($l_row[0]==$prow['property']) { echo "selected"; }
						   echo  ">". $l_row[1] ."</option>";	
						 }
						?>
                    </select>
                  </div>
                  <?php $des = str_replace("^^","'",$prow['description']);  ?>
                  <div class="form-group col-sm-12">
                    <label>Description</label>
                    <textarea class="form-control" name="des" id="description"><?php echo $des ?></textarea>
                  </div>
                  <div class="form-group col-sm-12">
                    <label>Image</label>
                    <input type="file" class="form-control" name="image">
                    <br>
                    <img src="../adminupload/<?php echo $prow['image']; ?>" height="120" width="120"/> </div>
                  <div class="clearfix"></div>
                  <div class="form-actions">
                    <input type="hidden" name="guid" value="<?php echo $guid; ?>"/>
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

		$vth = $db->query ("DELETE FROM `projects` WHERE `guid`='$guid'");
			$del = $db->query("SELECT `image` FROM `pr_gallery` WHERE `aid`='".$d."'");
			while($row = $del->fetch()){
				$filepath = "../adminupload/".$row['image'];
				if(file_exists($filepath)) {
					unlink($filepath);
				}
			}
		$vth = $db->query ("DELETE FROM `pr_gallery` WHERE `aid`='$guid'");
		//$sth->execute();

		header('location:'.URL.'projects.php'); 

	} else { ?>
      <a href="<?php echo URL; ?>projects.php?action=addNew" class="btn btn-success">Add New</a>
      <div class="row">
        <div class="col-lg-12">
          <?php if(!empty($post_msg)) { ?>
          <div class="page-header no-padding-bottom"> <?php echo $post_msg; ?> </div>
          <?php  }
            $sth = $db->query ("SELECT * FROM `projects` ORDER BY `guid` DESC");
			$count = $sth->rowCount(); ?>
          
          <!-- START YOUR CONTENT HERE -->
          
          <div class="portlet table-responsive"><!-- /Portlet -->
            
            <div class="portlet-heading dark">
              <div class="portlet-title">
                <h4>Projects</h4>
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
                        <th data-class="expand" class="center">Project Category</th>
                        <th data-class="expand" class="center">Tite</th>
                        <th data-class="expand" class="center">Image </th>
                        <th data-class="expand" class="center">Description</th>
                        <th data-class="expand" class="center">Gallery</th>
                        <th data-class="expand" class="center">Edit / Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if($count > 0) { 

						$m = 1;

						while($row = $sth->fetch()) {
                        $st = $db->query ("SELECT * FROM `property` WHERE `guid`='".$row['property']."'");
						$state = $st->fetch();
					    ?>
                      <tr>
                        <td class="center"><?php echo $m; ?></td>
                        <td class="center"><?php echo $state[1]; ?></td>
                        <td class="center"><?php echo $row['title']; ?></td>
                        <td class="center"><img src="../adminupload/<?php echo $row['image']; ?>" alt="" height="120" width="120"/></td>
                        <td class="center"><?php echo str_replace("^^","'",$row['description']); ?></td>
                        <td class="center"><div class="btn btn-sm btn-group"><a href="<?php echo URL; ?>projects_gallery.php?album=<?php echo $row[0]; ?>"  class="btn btn-inverse"><i class="fa fa-link icon-only"></i> Add</a></div></td>
                        <td class="center"><div class="btn btn-xs btn-group-xs"><a href="<?php echo URL; ?>projects.php?action=editData&guid=<?php echo $row[0]; ?>"  class="btn btn-inverse"><i class="fa fa-edit icon-only"></i></a> <a href="<?php echo URL; ?>projects.php?action=deleteData&guid=<?php echo $row[0]; ?>" class="btn btn-danger" onClick="return delete1();"><i class="fa fa-trash icon-only"></i></a> </div></td>
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
<script type="text/javascript" src="assets/nicEdit.js"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
new nicEditor({fullPanel : true}).panelInstance('description');
});
</script>
script>

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
<script type="text/javascript">
$('.course').change(function(){
var id= $('#mid').val();
$.ajax({

		  type:"post",

		  url:"<?php echo URL; ?>ajaxReq.php",

		  data:"cid="+id+"&action=fetchexp",

			  success:function(response){

				  $('.showexp').html(response);

				return true;

		  }

	   });

})

</script> 
<script>

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
<script type="text/javascript">

	$(document).ready(function() {

	 $('.datepicker').datepicker( {autoclose: true, todayHighlight: true, format: 'dd/mm/yyyy'} );

	});
$(document).on('change','.state', function(){
	
	var re = $(this).val();
	$.ajax({
             type:"post",
             url:"getstate.php",
             data:"re="+re,
             success:function(response){
				 var data = $.trim(response);
				 $('.district').html(data);
			 }
	});
	
});
</script>
</body>
</html>
<?php } ?>