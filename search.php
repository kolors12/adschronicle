<?php ob_start(); error_reporting(0);
require("cw_admin/lib/config.php");
extract($_POST);
if(!empty($_COOKIE['area'])){
    $crr = "AND a.cid='".$_COOKIE['area']."'";
    $srr = "WHERE `sid`='".$_COOKIE['area']."'";
    
} 

if(isset($_POST) && $_POST['search']=='Search'){
    //print_r($_POST); exit;
    //echo print_r($_POST['areas'][0]); exit;
    $arr = '';
    $arrr = '';
    $asrr ='';
    if(!empty($_POST['search_name'])){
         $category = $_POST['search_name'];
		
         $arr.="(a.add_title LIKE '%".$category."%' OR a.offered_services LIKE '%".$category."%') and ";
         $asrr = "AND (add_title LIKE '%".$category."%' OR offered_services LIKE '%".$category."%')";  
    }
    if(!empty($_POST['areas'])){
            $areas = $_POST['areas'];
            $arr.="(";
            $prr='';
            for($i=0; $i<count($areas); $i++){
                $prr.= "a.aid='".$areas[$i]."' OR ";
            }
            $arr.=substr($prr,0,-4);
            $arr.=") AND ";
     }
    $arr;
    if(!empty($arr)){
        $arrr = "AND ".substr($arr,0,-4);
        $aarr = substr($arr,0,-4);
    } else {
        $arrr = '';
        $aarr = '';
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Ads Chronicle&reg;</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<link rel="stylesheet" href="css/my_style.css">
<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
    $(".save-details").click(function(){
        var pid = $(this).data('id');
        $("#spid").val(pid);
        $("#myModalcontact").modal({
            backdrop: 'static',
            keyboard: false
        });
    });
    $(".send-sms").click(function(){
        var pid = $(this).data('id');
        $("#smpid").val(pid);
        $("#myModalSMS").modal({
            backdrop: 'static',
            keyboard: false
        });
    });

});
</script>

<script src="js/crawler.js" type="text/javascript"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="background-color:#eee">
<div class="container shadow"  style="background-color:#fff">
<header>
<?php include("header.php") ?>
    <div class="row" style="background-color:#01ADED; padding:5px 0px">
      <div class="col-md-12"> <a class="btn btn-danger" href="index.php" role="button">Back to Home Page</a> </div>
    </div>
  </header>
  <div class="row" style="padding:10px 0px 0px 0px;">
    <div class="col-md-12" style="background-image:url(images/bg-b.jpg); margin-bottom:10px">
      <div style="font-size:16px; color:#F30; font-weight:bold; padding:10px" align="center">Search by <?php echo $category?></div>
    </div>
    <?php 
    //echo "SELECT DISTINCT(cid), aid FROM `add_services` WHERE `status`='Active' $arrr $crr"; exit;
    $ath = $db->query("SELECT DISTINCT a.cid, a.aid FROM `add_services` a, `areas` r WHERE r.guid=a.aid AND a.status='Active' $arrr $crr ORDER BY r.name ASC"); 
	//echo "SELECT DISTINCT a.cid, a.aid FROM `add_services` a, `areas` r WHERE r.guid=a.aid AND a.status='Active' $arrr $crr";exit; 
    $tth = $db->query("SELECT DISTINCT a.cid, a.aid FROM `add_services` a, `areas` r WHERE r.guid=a.aid AND a.status='Active' $arrr $crr"); 
    $total = $tth->rowCount();
    if($total > 0){
     while($arow = $ath->fetch()){   
      $city = $db->query("SELECT * FROM `cities` WHERE `guid`='".$arow['cid']."'");
      $city_row = $city->fetch();
      $area = $db->query("SELECT * FROM `areas` WHERE `guid`='".$arow['aid']."'");
      $area_row = $area->fetch();

    ?>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading"><strong><?php echo $city_row['name']?> - <?php echo $area_row['name']?></strong></div>
        <div class="panel-body">
        <?php
//echo "SELECT * FROM `add_services` WHERE `status`='Active' AND `cid`='".$city_row['guid']."' AND `aid`='".$area_row['guid']."' $asrr ORDER BY `guid` DESC"; 

		$add = $db->query("SELECT * FROM `add_services` WHERE `status`='Active' AND `cid`='".$city_row['guid']."' AND `aid`='".$area_row['guid']."' $asrr ORDER BY `guid` DESC");
        
        if($add->rowCount() > 0){
            $m = 1;
            while($add_row = $add->fetch()){
                 $addd = substr($add_row['address_location'],0,25);
       ?>
          <div class="row" style="padding-bottom:15px; border-bottom:1px #DC2C04 dotted;">
            <div class="col-md-3"> <img src="adminupload/<?php echo $add_row['images1']?>" width="100%" height="140px"  alt=""/> </div>
            <div class="col-md-9" > <br/>
              <p style="border-bottom:1px #ccc solid; padding-bottom:5px"><strong style="color:#01ADED"><?php echo $add_row['add_title'] ?></strong> | <?php if(strlen($add_row['address_location']) > 25) echo $addd." ..."; else echo $add_row['address_location']; ?> | <?php echo substr($city_row['name'],0,3) ?>-<?php echo substr($add_row['pincode'],-2) ?> | <strong  style="color:#01ADED">Ph. No:</strong> +91 <?php echo $add_row['phone_no1'] ?> | <a href="<?php echo $add_row['website'] ?>" target="_blank"><?php echo $add_row['website'] ?></a> </p>
              <p><i class="glyphicon glyphicon-tags" style="padding-right:5px; color:#337AB7"></i> 
              <?php $des =  str_replace("~~","'",$add_row['offered_services']); if(strlen($des) > 72) echo substr($des,0,72)."..."; else echo $des; ?><strong  style="color:#01ADED"><a href="c_viewdetails.php?service=<?php echo $add_row['pid'] ?>">View Details</a></strong></p>
              <a class="btn btn-info save-details" href="javascript:;" data-id="<?php echo $add_row['pid'] ?>" >Save this contact details</a> <a class="btn btn-default send-sms" href="javascript:;" data-id="<?php echo $add_row['pid'] ?>" >Send SMS to Business</a> <a class="btn btn-link" href="c_viewdetails.php?service=<?php echo $add_row['pid'] ?>#smap" role="button" style="color:#090"><strong>Get Directions</strong></a> | <a class="btn btn-link" href="javascript:void(0)" role="button" style="color:#F00"><strong>Hot Deal inside!</strong></a> </div>
          </div>
          
         <?php if($m > 1){ echo "<div class='clearfix'></div>"; } $m++; } }?>
        </div>
      </div>
    </div>
    <?php } ?>
    <div class="clearfix"></div>

    <?php } else {?>
    
    <div class="col-sm-12" align="center"><h4 style="color: red;"> No Search Results found</h4></div>
    <?php }?>
    <div class="clearfix"></div>
  </div>
<?php include("footer.php") ?>

</div>
<script src="js/bootstrap.min.js"></script> 
<!-- Modal -->
<div class="modal fade" id="myModalSMS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Send SMS to CMS Computer Institute</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <form method="post" action="categories.php">
              <p>Enter your contact details</p>
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" name="txtName" placeholder="Full Name" class="form-control" required="" />
              </div>
              <br>
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                <input type="text" name="txtMobile" placeholder="Mobile No" class="form-control" required="" />
              </div>
              <br>
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input type="email" name="txtEmail" placeholder="EMail-id" class="form-control" required=""/>
              </div>
              <br>
              <div class="form-group">
                <textarea class="form-control" name="txtRequirements" required rows="3" placeholder="Please enter your specific requirements here"></textarea>
              </div>
        <input type="hidden" name="smpid" value="" id="smpid" />
        <!--<input type="text" name="category" value="<?php echo $category?>" />-->
                <button type="submit" name="submit" value="Send Sms" class="btn btn-info">Submit</button>
            </form>
          </div>
          <div class="col-md-6" align="right"> <img src="images/contact.jpg" style="padding-top:30px" class="img-responsive"  alt=""/> </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="myModalcontact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Save this contact details</h4>
      </div>
      <div class="modal-body">
        <div class="row">
         <form method="post" action="categories.php">
          <div class="col-md-6">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" name="txtName" placeholder="Full Name" class="form-control" required="" />
              </div>
              <br>
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                <input type="text" name="txtMobile" maxlength="15" placeholder="Mobile No" class="form-control" required="" />
              </div>
              <br>
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input type="email" name="txtEmail" placeholder="EMail-id" class="form-control" required="" />
              </div>
              <br>
          <input type="hidden" name="spid" value="" id="spid" />
        <!--input type="text" name="category" value="<?php echo $category?>" /-->
              <button type="submit" name="submit" value="Save Details" class="btn btn-info">Submit</button>
          </div> 
          <div class="col-md-6" align="right"> <img src="images/contact.jpg" class="img-responsive"  alt=""/> </div>
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>