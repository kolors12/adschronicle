<?php ob_start(); error_reporting(0);
require "lib/path.php";
require "lib/config.php";
require "lib/title.php";
require "lib/secure.php";
extract($_GET);
extract($_POST);
        $date = date('d-m-Y');
        if(!empty($startDate)) {
         	$from = $startDate;
        } else {
         	$from = $date;
        }
        if(!empty($endDate)) {
         	$to = $endDate;
        } else {
        	$to = $date;
        }
          include "pageing.php";
          $limit =10; 								
          if($page) 
          $start = ($page - 1) * $limit; 			
          else{
          $start = 0;		
          $page=3;
          }					
          $filePath="register.php"; 
          $srr='';
          $ser = '';
          if(isset($_GET) && $_GET['submit']=='Search'){
            unset($_GET['submit']);
            $ser.="submit=Search&";
			   if(!empty($_GET['startDate']) && !empty($_GET['endDate'])){
                $srr.="(date BETWEEN '{$startDate}' AND '{$endDate}') AND ";
                $ser.="startDate=".$_GET['startDate']."&";
                $ser.="endDate=".$_GET['endDate']."&";
            } 
            if(!empty($_GET['name'])){
                $srr.= "name= '".$_GET['name']."' AND ";
                $ser.="name=".$_GET['name']."&";
				//echo $ser;
            }
            if(!empty($_GET['email'])){
                $srr.= "email= '".$_GET['email']."' AND ";
                $ser.="email=".$_GET['email']."&";
            }
          /*  if(!empty($_GET['qual'])){
                $srr.= "(Name LIKE '%".$_GET['qual']."%' OR UG_Qualification LIKE '%".$_GET['qual']."%') AND ";
                $ser.="qual=".$_GET['qual']."&";
            }*/
            
            
            if(!empty($srr)){
             $srr = "WHERE ".substr($srr,0,-4);
			
            }
            if(!empty($ser)){
                $ser = substr($ser,0,-1);
				$ser;
            }
            
          } else {
            $srr='';
            $ser='';
          }
         // echo "SELECT * FROM `resume` $srr ORDER BY `id` DESC LIMIT $start,$limit";exit;
          $sth = $db->query ("SELECT * FROM `register` $srr ORDER BY `id` DESC LIMIT $start,$limit");
		  //echo $srr;
          $tth = $db->query ("SELECT * FROM `register` $srr");
          $total = $tth->rowCount();
          $ptotal = $sth->rowCount();
          $otherParams=$ser;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo TITLE; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="<?php echo URL ?>assets/images/favicon.png" />
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
              <li class="active"><a href="<?php echo URL; ?>register.php">Registration Persons</a></li>
            </ul>
            <div class="b-right hidden-xs">
              <ul>
               
                
                <li class="dropdown"><a href="#" title="" data-toggle="dropdown"><i class="fa fa-plus"></i><span> Tasks</span></a>
                  <ul class="dropdown-menu dropdown-primary dropdown-menu-right">
                    <li><a href="<?php echo URL; ?>register.php">View all</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <!-- END BREADCRUMB -->
          <div class="page-header title"> 
            <!-- PAGE TITLE ROW -->
            <h1>Admin <span class="sub-title"><a href="<?php echo URL; ?>regestation.php">Registration Persons</a></span></h1>
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
       <?php  if($action == 'deleteData') {
		$guid = $_GET['guid'];
 		$deth = $db->query ("DELETE FROM `register` WHERE `id`='".$guid."'");
		
		//$sth->execute();
		header('location:'.URL.'reg.php'); 
	} else { ?>
      <div class="row">
        <div class="col-lg-12">
          <?php if(!empty($post_msg)) { ?>
          <div class="page-header no-padding-bottom"> <?php echo $post_msg; ?> </div>
          <?php  }  ?>
          <!-- START YOUR CONTENT HERE -->
          <div class="portlet table-responsive"><!-- /Portlet -->
            <div class="portlet-heading dark">
              <div class="portlet-title">
                <h4>Registration Persons(<?php echo $total; ?>)</h4>
              </div>
              <div class="portlet-widgets"><a data-toggle="collapse" data-parent="#accordion" href="#basic"><i class="fa fa-chevron-down"></i></a> <span class="divider"></span> <a href="#" class="box-close"><i class="fa fa-times"></i></a> </div>
              <div class="clearfix"></div>
            </div>
            <div id="basic" class="panel-collapse collapse in">
             <div class="portlet-body row">
               <div class="col-sm-12 row">
                 <form method="get" action="<?php echo $_SERVER['PHP_SELF']?>">
                      <input type="text" id="name" name="name" placeholder="name"/> 
					  <input type="text" id="email" name="email" placeholder="email"/> 
                    <!--  <input type="text" id="qual" value="<?php if(!empty($_GET['qual'])) echo $_GET['qual'] ?>" placeholder="Qualification" name="qual"/> -->
                  <!--  <div class="col-sm-3">
                      <input type="text" class="form-control datepicker" name="startDate"  placeholder="Start Date" readonly="" />
                    </div>
                    <div class="col-sm-3">
                      <input type="text" class="form-control datepicker" name="endDate"  placeholder="End Date" readonly="" />
                    </div>-->
                    
                   
                    <div class="col-sm-2">
                      <input type="submit" class="btn btn-primary" name="submit" value="Search" />
                      <input type="button" onclick="window.location='reg.php'" value="Reset" class="btn btn-default"/>
                    </div>
                 </form>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="portlet-body no-padding table-responsive">
                <div class="well white">
                  <table class="datatable table table-hover table-striped table-bordered tc-table ">
                    <thead>
                      <tr>
					  <th style ="display:none;"></th>
                      <th>Sno</th>
                      <th>Name</th>
                      <th>Mobile Number</th>
                      <th>Email</th>
                      <th>Employe Name</th>
					  <th>Date</th>
					  <th>Delete</th>
                      </tr>
                      </thead>
                    <tbody>
                      <?php if($total > 0) { 
						$m = 1;
						while($row = $sth->fetch()) {
         					$tith=$db->query("SELECT * FROM register");
        					$t_row=$tith->fetch();
					?>
                      <tr>
                        <td style="display:none">&nbsp;</td>
                        <td class="center"><?php echo $row['id']; ?></td>
						<td class="center"><?php echo $row['name']; ?></td>
                        <td class="center"><?php echo $row['phone']; ?></td>
                        <td class="center"><?php echo $row['email']; ?></td>
                        <td class="center"><?php echo $row['empname']; ?></td>
                        <td><?php echo date('M j Y g:i A', strtotime($row['dateandtime'])) ?></td>
                        <td class="center"><div class="btn-group btn-group-xs"><a href="<?php echo URL; ?>reg.php?action=deleteData&guid=<?php echo $row[0]; ?>" class="btn btn-danger" onClick="return delete1();"><i class="fa fa-trash icon-only"></i></a> </div></td>
                      </tr>
                      <?php $m++; } ?>
                      <tr>
                      <td colspan="12" style="padding:0 !important">
                      <div class="pull-left">
                       <?php if($ptotal >0){?>
                        <div class="dataTables_info"><br/>Showing <?php if($start!=0)echo $start; else echo 1; ?> to <?php echo $ptotal ?> of <?php echo $total ?> entries</div>
                        <?php } ?>
                      </div>
                     <!-- <div style="pull-right">
                          <ul class="pull-right pagination pagination-sm ">
                            <li>
                              <?php make_pages($page,$limit,$total,$filePath,$otherParams); ?>
                            </li>
                          </ul>
                      </div>-->
                      <div class="clearfix"></div>
                      </td>
                      
                      </tr>
                      <?php } else {?>
                      <tr><td colspan="10" align="center"><font color="red">No Results found</font></td></tr>
                      
                      <?php }?>    
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