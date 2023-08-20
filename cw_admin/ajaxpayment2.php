<?php ob_start(); error_reporting(0);
require "lib/path.php";
require "lib/config.php";
require "lib/secure.php";
extract($_POST);
if(isset($_POST) && $_POST['action']=='classifiedad') { 
    $id = stripslashes($_POST['guid']);	
	$cth = $db->query ("SELECT * FROM `adds_requests` WHERE `guid`='$id'"); 
    $row = $cth->fetch(); ?>
    <div class="row ">
   <div class="col-sm-12">
       
  
     
        <div class="clearfix"></div>
     
    <div class="col-sm-12">
     <textarea type="text" name="" rows="5" class="form-control"><?php echo $row['txtContent']; ?></textarea>
     </div>  
    </div>  
    </div>
<?php  } ?>