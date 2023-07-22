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
       
   <div class="col-sm-4 form-group"><label>Payment Status</label>
     <input type="text"  class="form-control" name="" readonly value="<?php echo $row['order_status'];?>">
    
    </div>
       <div class="col-sm-4 form-group"><label>Tracking Id</label>
     <input type="text"  class="form-control" name="" readonly value="<?php echo $row['trackingid'];?>">
    
    </div>   
     <div class="col-sm-4"><label>Bank Reference</label>
     <input type="text" name="" class="form-control" readonly value="<?php echo $row['bank_ref'];?>">
    
    </div>
        <div class="clearfix"></div>
     
    <div class="col-sm-12"><label>Status Message</label>
     <input type="text" name="" class="form-control" readonly value="<?php echo $row['statusmsg'];?>">
    
    </div>  </div>  
    </div>
<?php  } else if(isset($_POST) && $_POST['action']=='matrimonialad') {
    $id = stripslashes($_POST['guid']);	
	$cth = $db->query ("SELECT * FROM `matrimonial_ads` WHERE `guid`='$id'"); 
    $row = $cth->fetch(); ?>
    <div class="row ">
   <div class="col-sm-12">
       
   <div class="col-sm-4 form-group"><label>Payment Status</label>
     <input type="text"  class="form-control" name="" readonly value="<?php echo $row['order_status'];?>">
    
    </div>
       <div class="col-sm-4 form-group"><label>Tracking Id</label>
     <input type="text"  class="form-control" name="" readonly value="<?php echo $row['trackingid'];?>">
    
    </div>   
     <div class="col-sm-4"><label>Bank Reference</label>
     <input type="text" name="" class="form-control" readonly value="<?php echo $row['bank_ref'];?>">
    
    </div>
        <div class="clearfix"></div>
     
    <div class="col-sm-12"><label>Status Message</label>
     <input type="text" name="" class="form-control" readonly value="<?php echo $row['statusmsg'];?>">
    
    </div>  </div>  
    </div>
 <?php } else if(isset($_POST) && $_POST['action']=='categoryad') {
    $id = stripslashes($_POST['guid']);	
	$cth = $db->query ("SELECT * FROM `add_services` WHERE `guid`='$id'"); 
    $row = $cth->fetch(); ?>
    <div class="row ">
   <div class="col-sm-12">
       
   <div class="col-sm-4 form-group"><label>Payment Status</label>
     <input type="text"  class="form-control" name="" readonly value="<?php echo $row['order_status'];?>">
    
    </div>
       <div class="col-sm-4 form-group"><label>Tracking Id</label>
     <input type="text"  class="form-control" name="" readonly value="<?php echo $row['trackingid'];?>">
    
    </div>   
     <div class="col-sm-4"><label>Bank Reference</label>
     <input type="text" name="" class="form-control" readonly value="<?php echo $row['bank_ref'];?>">
    
    </div>
        <div class="clearfix"></div>
     
    <div class="col-sm-12"><label>Status Message</label>
     <input type="text" name="" class="form-control" readonly value="<?php echo $row['statusmsg'];?>">
    
    </div>  </div>  
    </div>
 <?php } else if(isset($_POST) && $_POST['action']=='jobseekerad') {
    $id = stripslashes($_POST['guid']);	
	$cth = $db->query ("SELECT * FROM `jobseeker_ads` WHERE `guid`='$id'"); 
    $row = $cth->fetch(); ?>
    <div class="row ">
   <div class="col-sm-12">
       
   <div class="col-sm-4 form-group"><label>Payment Status</label>
     <input type="text"  class="form-control" name="" readonly value="<?php echo $row['order_status'];?>">
    
    </div>
       <div class="col-sm-4 form-group"><label>Tracking Id</label>
     <input type="text"  class="form-control" name="" readonly value="<?php echo $row['trackingid'];?>">
    
    </div>   
     <div class="col-sm-4"><label>Bank Reference</label>
     <input type="text" name="" class="form-control" readonly value="<?php echo $row['bank_ref'];?>">
    
    </div>
        <div class="clearfix"></div>
     
    <div class="col-sm-12"><label>Status Message</label>
     <input type="text" name="" class="form-control" readonly value="<?php echo $row['statusmsg'];?>">
    
    </div>  </div>  
    </div>
    <?php } ?>