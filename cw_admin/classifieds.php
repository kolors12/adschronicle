<?php ob_start(); error_reporting(0);
require "lib/path.php";
require "lib/config.php";
require "lib/title.php";
require "lib/secure.php";
extract($_POST);
if(isset($_POST) && $_POST['submit']=='adddata') {
	$filename = stripslashes($_FILES['images1']['name']);
	if(!empty($filename)) {
		$image = time()."_".$filename;
		$img_path="../adminupload/".$image;
		move_uploaded_file($_FILES['images1']['tmp_name'], $img_path);
	} else {
		$image='';	
	}
	$name = $_POST['titlename'];
	$sth = $db->query("INSERT INTO `classifieds`(`title`, `web_url`, `image`) VALUES ('$c_title', '$web_url', '$image')");
	if($sth == true) { ?>
	<script type="text/javascript">
			alert('Data Successfully Inserted');
			window.location="<?php echo URL; ?>classifieds.php";
			</script>
	<?php } else { ?>
	<script type="text/javascript">
			alert('Please try Again');
			window.location="<?php echo URL; ?>classifieds.php";
			</script>
	<?php } 
}
if(isset($_POST) && $_POST['submit']=='editdata')
{
	$filename = stripslashes($_FILES['images1']['name']);
	if(!empty($filename)) {
		$filepath ="../adminupload/".$imagefile;
		if(file_exists($filepath)) {
			unlink($filepath);
		}
		$image = time()."_".$filename;
		$img_path="../adminupload/".$image;
		move_uploaded_file($_FILES['images1']['tmp_name'], $img_path);
		$ith = $db->query("UPDATE `classifieds` SET `image`='$image' WHERE `guid`='$qid'");
	} 
    
	$sth = $db->query("UPDATE `classifieds` SET `title`='$c_title', `position`='$position', `web_url`='$web_url' WHERE `guid`='$qid'");
	if($sth == true) { ?>
	<script type="text/javascript">
			alert('Data Successfully Updated');
			window.location="<?php echo URL; ?>classifieds.php";
			</script>
	<?php } else { ?>
	<script type="text/javascript">
			alert('Please try Again');
			window.location="<?php echo URL; ?>classifieds.php";
			</script>
	<?php } 
}
if(isset($_POST) && $_POST['action']=='delete') {
	//print_r($_POST); exit;
	 $d = $_POST['id'];
		    $del = $db->query("SELECT `image` FROM `classifieds` WHERE `guid`='".$d."'");
			$row = $del->fetch();
			$filepath = "../adminupload/".$row['image'];
			if(file_exists($filepath)) {
				unlink($filepath);
			}
			$sth = $db->query("DELETE FROM `classifieds` WHERE `guid`='".$d."'");
			if($sth == true) {
			  echo "1111";	 exit;
			} 
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Admin Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="<?php echo URL; ?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo URL; ?>assets/css/fonts.css">
<link rel="stylesheet" href="<?php echo URL; ?>assets/font-awesome/css/font-awesome.min.css">
<!-- PAGE LEVEL PLUGINS STYLES -->
<link rel="stylesheet" href="<?php echo URL; ?>assets/css/plugins/colorBox/colorbox.css">
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
              <li class="active"><a href="<?php echo URL; ?>classifieds.php">Classified Ads</a></li>
            </ul>
            <div class="b-right hidden-xs">
              <ul>
                
                
                <li class="dropdown"><a href="#" title="" data-toggle="dropdown"><i class="fa fa-plus"></i><span> Tasks</span></a>
                  <ul class="dropdown-menu dropdown-primary dropdown-menu-right">
                    <?php // if($count < 10) {?>
                    <li><a href="<?php echo URL; ?>classifieds.php?action=add">Add New Adds</a></li>
                    <?php //} ?>
                    <li><a href="<?php echo URL; ?>classifieds.php">View Classified Ads</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        <!-- END BREADCRUMB -->
        
        <div class="page-header title"> 
          <!-- PAGE TITLE ROW -->
          <h1>Classified Ads <!--<span class="sub-title">responsive photo gallery using colorbox</span>--></h1>
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
<a href="<?php echo URL; ?>classifieds.php" class="btn btn-info">Back</a>
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
                  <label>Title</label>
                  <input type="text" class="form-control" name="c_title" required="" placeholder="Enter title"/>
                </div>
                <div class="form-group">
                  <label>Image</label>
                  <input type="file" class="form-control" required="" name="images1"/><br />
                  <label>Please upload JPG/JPEG files with size of 250x80</label>

                </div>
                <div class="form-group">
                  <label>Url</label>
                  <input type="text" class="form-control" name="web_url" required="" placeholder="Enter web URL "/>
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
       else if(isset($action) && $action=='edit') { 
	   $sth = $db->query ('SELECT * FROM `classifieds` WHERE `guid`="'.$q.'"');
	   $row = $sth->fetch();
   ?>
<a href="<?php echo URL; ?>classifieds.php" class="btn btn-info">Back</a>
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
                  <label>Title</label>
                  <input type="text" class="form-control" name="c_title" value="<?php echo $row['c_title']; ?>" required="" placeholder="Enter title"/>
                </div>
                <div class="form-group">
                  <label>Image</label>
                  <input type="file" class="form-control"  name="images1" />
                  <input type="image" class="img-responsive" src="<?php if(empty($row['image'])) { echo URL.'assets/images/gallery/img1.jpg'; } else { echo URL.'../adminupload/'.$row['image']; } ?>" width="250px" height="80px"/><br />
                  <label>Please upload JPG/JPEG files with size of 250x80</label>
                  
                </div>
                <div class="form-group">
                  <label>Url</label>
                  <input type="text" class="form-control" name="web_url" value="<?php echo $row['web_url']?>" required=""/>
                </div>
                <div class="form-actions">
                  <input type="hidden" name="qid" value="<?php echo $q; ?>">
                  <input type="hidden" name="imagefile" value="<?php echo $row['image']; ?>">
                  <button type="submit" class="btn btn-primary" name="submit" value="editdata">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!--portlet end---> 
      </div>
    </div>
    <?php } else { ?>
<a href="<?php echo URL; ?>classifieds.php?action=add" class="btn btn-info">Add New</a>
    <div class="row">
      <div class="col-lg-12">
        <div class="portlet">
          <div class="portlet-heading dark">
            <div class="portlet-title">
              <h4>Classified Ads</h4>
            </div>
            <div class="portlet-widgets"> <a data-toggle="collapse" data-parent="#accordion" href="#f-1" class="" aria-expanded="true"><i class="fa fa-chevron-down"></i></a> </div>
            <div class="clearfix"></div>
          </div>
          <div class="padding-25 panel-collapse collapse in" id="f-1" aria-expanded="true"> 
            <!-- Gallery Style 2-->
            <ul class="tc-gallery-2 clearfix">
              <?php 
			 $sth = $db->query ('SELECT * FROM `classifieds`');
			 $count = $sth->rowCount();
			 if($count > 0) {
				 $m= 1;
				 while($row = $sth->fetch()) { ?>
              <li class="thumbnail thumbnail-box-<?php echo $row[0]; ?>">
                <div class="thumb-preview">
                  <div class="thumb-image"><img src="<?php if(empty($row['image'])) { echo URL.'assets/images/gallery/img1.jpg'; } else { echo URL.'../adminupload/'.$row['image']; } ?>" alt="" style="width:160px; height: 120px;"> </div>
                  <div class="gl-thumb-options"> <a class="gl-zoom" href="<?php if(empty($row['image'])) { echo URL.'assets/images/gallery/img1.jpg'; } else { echo URL.'../adminupload/'.$row['image']; } ?>" data-rel="colorbox" title="<?php echo $row[1]; ?>"> <i class="fa fa-search"></i> </a>
                    <div class="gl-toolbar"> 
                      <div class="gl-group pull-right"> <a href="<?php echo URL; ?>classifieds.php?action=edit&q=<?php echo $row[0]; ?>">Edit</a>
                        <button class="dropdown-toggle gl-toggle" type="button" data-toggle="dropdown"> <i class="fa fa-caret-up"></i> </button>
                        <ul class="dropdown-menu dropdown-caret dropdown-menu-right" role="">
                          <!-- <li><a href="#"><i class="fa fa-download"></i> Download</a></li>-->
                          <li><a href="javascript:void(0);" id="deleteme-<?php echo $row[0]; ?>" onClick="deleteme(<?php echo $row[0]; ?>)" data-id="<?php echo $row[0]; ?>"><i class="fa fa-trash-o"></i> Delete</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <h5 class="gl-title">img1<small>.jpg</small></h5>-->
                <div class="gl-description"><small class="pull-left"><a href="javascript:;" rel="nofollow"><?php echo $row['title']; ?></a></small></div>
              </li>
              <?php $m++; } } else {?>
                <div><h4>No Adds Records found</h4></div>
              <?php } ?>
            </ul>
          </div>
        </div>
        <!-- END YOUR CONTENT HERE --> 
        
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

<!-- core JavaScript --> 
<script src="<?php echo URL; ?>assets/js/jquery.min.js"></script> 
<script src="<?php echo URL; ?>assets/js/bootstrap.min.js"></script> 
<script src="<?php echo URL; ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script> 
<script src="<?php echo URL; ?>assets/js/plugins/pace/pace.min.js"></script> 

<!-- PAGE LEVEL PLUGINS JS --> 

<!-- Themes Core Scripts --> 
<script src="<?php echo URL; ?>assets/js/main.js"></script> 

<!-- REQUIRE FOR SPEECH COMMANDS --> 
<script src="<?php echo URL; ?>assets/js/speech-commands.js"></script> 
<script src="<?php echo URL; ?>assets/js/plugins/gritter/jquery.gritter.min.js"></script> 
<script src="<?php echo URL; ?>assets/js/plugins/colorBox/jquery.colorbox-min.js"></script> 
<!-- initial page level scripts for examples --> 
<script src="<?php echo URL; ?>assets/js/plugins/footable/footable.init.js"></script> 
<script src="<?php echo URL; ?>assets/js/plugins/slimscroll/jquery.slimscroll.init.js"></script> 
<script type="text/javascript">	
		
		//colorbox function
		jQuery(function($) {
			var $overflow = '';
			var colorbox_params = {
			rel: 'colorbox',
			reposition:true,
			scalePhotos:true,
			scrolling:false,
			previous:'<i class="fa fa-arrow-left text-gray"></i>',
			next:'<i class="fa fa-arrow-right text-gray"></i>',
			close:'<i class="fa fa-times text-primary"></i>',
			current:'{current} of {total}',
			maxWidth:'100%',
			maxHeight:'100%',
			onOpen:function(){
				$overflow = document.body.style.overflow;
				document.body.style.overflow = 'hidden';
			},
			onClosed:function(){
				document.body.style.overflow = $overflow;
			},
			onComplete:function(){
				$.colorbox.resize();
			}
		};

			$('.tc-gallery [data-rel="colorbox"]').colorbox(colorbox_params); // for enable colorbox gallery style 1 
			$('.thumbnail [data-rel="colorbox"]').colorbox(colorbox_params); // for enable gallery style 2
		
			$("#cboxLoadingGraphic").append("<i class='fa fa-spinner fa-spin'></i>");//let's add a custom loading icon for colorbox

		})
		
		//dropdown for gallery style 2
		$('.thumbnail .gl-toggle').parent()
			.on('show.bs.dropdown', function( ev ) {
				$(this).closest('.gl-thumb-options').css('overflow', 'visible');
			})
			.on('hidden.bs.dropdown', function( ev ) {
				$(this).closest('.gl-thumb-options').css('overflow', '');
			});

		$('.thumbnail').on('mouseenter', function() {
			var toggle = $(this).find('.gl-toggle');
				if ( toggle.parent().hasClass('open') ) {
					toggle.dropdown('toggle');
			}
		});
	</script>
    <script type="text/javascript">
	function deleteme(s){
		var deid = '#deleteme-'+s;
		var id = $(deid).data('id');
		var did = $.trim(id);
		var query = "id="+did+"&action=delete";
		$.ajax({
				  type:"post",
				  dataType:"text",
				  data:query,
				  url:"<?php echo URL; ?>classifieds.php",// url of php page where you are writing the query
				  success:function(data) {
					var res = $.trim(data);
					if(res==1111) {
						var delbox ='.thumbnail-box-'+did;
						$(delbox).remove();
					  }
				  }
		  });
	}
	</script>
</body>
</html>