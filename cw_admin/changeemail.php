<?php ob_start(); error_reporting(0);
require "lib/path.php";
require "lib/config.php";
require "lib/title.php";
require "lib/secure.php";$date=date('d-m-Y');extract($_GET);extract($_POST);
if(isset($_POST) && $_POST['SaveEdit'] == 'Update') {
	//$date = date('Y-m-d');
	$uth = $db->exec ("UPDATE `login` SET `email`='$email'  WHERE `guid`='".$_SESSION['adc_logInUser']."'");
	if($uth) {
	$post_msg = '<h4 style="color: green;">Email Successfully Updated</h4>';	
	header('location:'.URL.'changeemail.php?post_msg='.$post_msg);
	} else { 
	$post_msg = '<h4 style="color: red;">Sorry Please try Again</h4>';	
	header('location:'.URL.'changeemail.php?post_msg='.$post_msg);
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
	<link href="<?php echo URL; ?>assets/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
	<link href="<?php echo URL; ?>assets/css/plugins/morris/morris.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo URL; ?>assets/css/plugins/bootstrap-datepicker/datepicker.css">
	<!-- REQUIRE FOR SPEECH COMMANDS -->
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>assets/css/plugins/gritter/jquery.gritter.css" />

    <!-- Tc core CSS -->
	<link id="qstyle" rel="stylesheet" href="<?php echo URL; ?>assets/css/themes/style.css">
	
	
    <!-- Add custom CSS here -->
	<link rel="stylesheet" href="<?php echo URL; ?>assets/css/only-for-demos.css">

	<!-- End custom CSS here -->
	
    <!--[if lt IE 9]>
    <script src="<?php echo URL; ?>assets/js/html5shiv.js"></script>
    <script src="<?php echo URL; ?>assets/js/respond.min.js"></script>
    <![endif]-->
	
	<!--[if lte IE 8]>
	<script src="<?php echo URL; ?>assets/js/plugins/easypiechart/easypiechart.ie-fix.js"></script>
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
										<li>
											<a href="home.php">Home</a>
										</li>
										<li class="active">Change Email ID</li>
									</ul>
									
								<!--	<div class="b-right hidden-xs">
										<ul>
											
											
											<li class="dropdown"><a href="#" title="" data-toggle="dropdown"><i class="fa fa-plus"></i><span> Tasks</span></a>
												<ul class="dropdown-menu dropdown-primary dropdown-menu-right">
													<li><a href="#">Add new task</a></li>
													<li><a href="#">Statement</a></li>
													<li><a href="#">Settings</a></li>
												</ul>
											</li>
										</ul>
									</div> -->
								</div>
								<!-- END BREADCRUMB -->	
								
								<div class="page-header title">
								<!-- PAGE TITLE ROW -->
									<h1>Change Email ID</h1>									
								</div>
								
								<!-- /#ek-layout-button -->	
								<div class="qs-layout-menu">
									<div class="btn btn-gray qs-setting-btn" id="qs-setting-btn">
										<i class="fa fa-cog bigger-150 icon-only"></i>
									</div>
									<div class="qs-setting-box" id="qs-setting-box">
									
										<div class="hidden-xs hidden-sm">
											<span class="bigger-120">Layout Options</span>
											
											<div class="hr hr-dotted hr-8"></div>
											<label>
												<input type="checkbox" class="tc" id="fixed-navbar" />
													<span id="#fixed-navbar" class="labels"> Fixed NavBar</span>
											</label>
											<label>
												<input type="checkbox" class="tc" id="fixed-sidebar" />
													<span id="#fixed-sidebar" class="labels"> Fixed NavBar+SideBar</span>
											</label>
											<label>
												<input type="checkbox" class="tc" id="sidebar-toggle" />
													<span id="#sidebar-toggle" class="labels"> Sidebar Toggle</span>
											</label>
											<label>
												<input type="checkbox" class="tc" id="in-container" />
													<span id="#in-container" class="labels"> Inside<strong>.container</strong></span>
											</label>
										
											<div class="space-4"></div>
										</div>
										
										<span class="bigger-120">Color Options</span>
										
										<div class="hr hr-dotted hr-8"></div>
										
										<label>
											<input type="checkbox" class="tc" id="side-bar-color" />
											<span id="#side-bar-color" class="labels"> SideBar (Light)</span>
										</label>
										
										<ul>									
											<li><button class="btn" style="background-color:#d15050;" onclick="swapStyle('<?php echo URL; ?>assets/css/themes/style.css')"></button></li>
											<li><button class="btn" style="background-color:#86618f;" onclick="swapStyle('<?php echo URL; ?>assets/css/themes/style-1.css')"></button></li> 
											<li><button class="btn" style="background-color:#ba5d32;" onclick="swapStyle('<?php echo URL; ?>assets/css/themes/style-2.css')"></button></li>
											<li><button class="btn" style="background-color:#488075;" onclick="swapStyle('<?php echo URL; ?>assets/css/themes/style-3.css')"></button></li>
											<li><button class="btn" style="background-color:#4e72c2;" onclick="swapStyle('<?php echo URL; ?>assets/css/themes/style-4.css')"></button></li>
										</ul>
										
									</div>
								</div>
								<!-- /#ek-layout-button -->		
								
							</div><!-- /.col-lg-12 -->
						</div><!-- /.row -->
					<!-- END PAGE HEADING ROW -->					
						<div class="row">
							<div class="col-lg-12">
							
								<!-- START YOUR CONTENT HERE -->
								<div class="row">
                                <?php if(!empty($post_msg)) { ?>
        <div class="page-header no-padding-bottom"> <?php echo $post_msg; ?> </div>
        <?php 
								}
								
								
								// $count;
								 ?>
      <div class="col-lg-6">
        <div class="portlet">
          <div class="portlet-heading dark">
            <div class="portlet-title">
              <h4>Change Email ID</h4>
            </div>
            <div class="portlet-widgets"> <a data-toggle="collapse" data-parent="#accordion" href="#f-6"><i class="fa fa-chevron-down"></i></a> </div>
            <div class="clearfix"></div>
          </div>
          <div id="f-6" class="panel-collapse collapse in">
            <div class="portlet-body">
            <?php
											  $gth = $db->query("SELECT * FROM `login` WHERE `guid`='".$_SESSION['adc_logInUser']."'");
											  $grow = $gth->fetch();
											   ?>
              <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onSubmit="return valid()" name="form1">
                <div class="form-group">
                  <label>Email ID</label>
                  <input type="email" class="form-control" placeholder="Email Id" name="email" value="<?php  echo $grow['email'];?>" required>
                </div>
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary" value="Update" name="SaveEdit">Update</button>
                  <button type="reset" class="btn">Reset</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>			
								<!-- END YOUR CONTENT HERE -->
					
							</div>
						</div>
						
					<!-- BEGIN FOOTER CONTENT -->
                    <?php require "footer.php"; ?>		
					<!-- END FOOTER CONTENT -->
						
				</div><!-- /#page-wrapper -->	  
			<!-- END MAIN PAGE CONTENT -->
		</div>  
	</div>

	 <!-- end live-chat -->	
	 
    <!-- core JavaScript -->
    
    <script src="<?php echo URL; ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo URL; ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo URL; ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo URL; ?>assets/js/plugins/pace/pace.min.js"></script>
	
	<!-- PAGE LEVEL PLUGINS JS 
	<script src="<?php echo URL; ?>assets/js/plugins/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="<?php echo URL; ?>assets/js/plugins/jqueryui/jquery.ui.touch-punch.min.js"></script>	
    <script src="<?php echo URL; ?>assets/js/plugins/daterangepicker/moment.js"></script>
    <script src="<?php echo URL; ?>assets/js/plugins/daterangepicker/daterangepicker.js"></script>	
    <script src="<?php echo URL; ?>assets/js/plugins/morris/raphael-min.js"></script>
    <script src="<?php echo URL; ?>assets/js/plugins/morris/morris.min.js"></script>
	<script src="<?php echo URL; ?>assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
	<script src="<?php echo URL; ?>assets/js/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
	<script src="<?php echo URL; ?>assets/js/plugins/easypiechart/jquery.easypiechart.min.js"></script>
	<script src="<?php echo URL; ?>assets/js/plugins/easypiechart/excanvas.compiled.js"></script>	
	<script src="<?php echo URL; ?>assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="<?php echo URL; ?>assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- Themes Core Scripts -->	
	<script src="<?php echo URL; ?>assets/js/main.js"></script>
	
	<!-- REQUIRE FOR SPEECH COMMANDS -->
	<script src="<?php echo URL; ?>assets/js/plugins/slimscroll/jquery.slimscroll.init.js"></script>
	<script src="<?php echo URL; ?>assets/js/home-page.init.js"></script>
	<script src="<?php echo URL; ?>assets/js/plugins/jquery-sparkline/jquery.sparkline.init.js"></script>
	<script src="<?php echo URL; ?>assets/js/plugins/easypiechart/jquery.easypiechart.init.js"></script>
	
  </body>
</html>