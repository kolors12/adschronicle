<?php ob_start(); //error_reporting(0);
require("cw_admin/lib/config.php");
$crr = '';
if(!empty($_COOKIE['area'])){
    $crr = "AND a.cid='".$_COOKIE['area']."'";
}
$crr; 
extract($_GET);
extract($_POST);
//print_r($_POST);
function get_data($url) {
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}
if(isset($_POST) && $_POST['submit']=='Save Details'){
    $sth = $db->query("SELECT * FROM `add_services` WHERE `pid`='".$_POST['spid']."'");
    $srow = $sth->fetch();
    //  print_r($_POST);exit;
    $to = $srow['email_id'];
    $subject = "Saved Contact Details from AdsChronicle.com";
    $message = "
    Name: $txtName\n
    Email: $txtEmail\n
    Mobile: $txtMobile\n
    Post Add Details: ".$srow['add_title']."\n
    Post Add Location: ".$srow['address']."\n
    ";
    $from = $txtEmail;
    $headers = "From: ".$from;
    
    $to1 = $txtEmail;
    $subject1 = "Details of company saved from AdsChronicle.com";
    $message1 = "
    Hi, $txtName\n
   
    Name: ".$srow['add_title']."\n
    Location: ".$srow['address']."\n
    Mobile: $txtMobile\n
    Thank you\n
    ";
    $headers1 = "From: no-reply<no-reply@adschronicle.com>";
     
    
    
 $message_sms = "Saved Contact Details from AdsChronicle.com.\n Name: $txtName, Email: $txtEmail, Mobile: $txtMobile, Post Add Details: ".$srow['add_title'].", Post Add Location: ".$srow['address']."";
 $sms=str_replace(" ","%20","$message_sms");
// echo $sms;exit;
 
 $url = "http://api.smscountry.com/SMSCwebservice_bulk.aspx?User=adschronicle&passwd=62480249&mobilenumber=".$srow['phone_no1']."&message=$sms&sid=smscntry&mtype=N&DR=Y"; 


get_data($url);

$message_sms1 = "Details of company saved from AdsChronicle.com.\nHi, $txtName, Name: ".$srow['add_title'].", Location: ".$srow['address'].", Mobile: $txtMobile, Thank you\n";
 $sms1=str_replace(" ","%20","$message_sms1"); 
 
 $url1 = "http://api.smscountry.com/SMSCwebservice_bulk.aspx?User=adschronicle&passwd=62480249&mobilenumber=$txtMobile&message=$sms1&sid=smscntry&mtype=N&DR=Y"; 
//echo $url1;exit;
get_data($url1);

    
    $mail1 = mail($to,$subject,$message,$headers);
    $mail2 = mail($to1,$subject1,$message1,$headers1);
    if($mail1 == TRUE && $mail2 == TRUE){
    ?>
    <script type="text/javascript">alert("Your Details successfully saved"); window.location="categories.php?category=<?php echo $srow[category] ?>";</script>
    <?php } else { ?>
    <script type="text/javascript">alert("Please try again!"); window.location="categories.php?category=<?php echo $srow[category] ?>";</script>
    <?php }
    
} else if(isset($_POST) && $_POST['submit']=='Send Sms'){
    $sth = $db->query("SELECT * FROM `add_services` WHERE `pid`='".$_POST['smpid']."'");
    $srow = $sth->fetch();
     
    $to = $srow['email_id'];
    $subject = "You have received an enquiry from AdsChronicle.com";
    $message = "
    Name: $txtName\n
    Email: $txtEmail\n
    Mobile: $txtMobile\n
    Requirements: $txtRequirements\n
    Company name: ".$srow['add_title']."\n
    Location: ".$srow['address']."\n
    ";
    $from = $txtEmail;
    $headers = "From: ".$from;
    
     $message_sms = "You have received an enquiry from AdsChronicle.com.\n  Name: $txtName, Email: $txtEmail, Mobile: $txtMobile, Requirements: $txtRequirements, Company name: ".$srow['add_title'].", Location: ".$srow['address']."";
 $sms=str_replace(" ","%20","$message_sms");
 
 $url = "http://api.smscountry.com/SMSCwebservice_bulk.aspx?User=adschronicle&passwd=62480249&mobilenumber=".$srow['phone_no1']."&message=$sms&sid=smscntry&mtype=N&DR=Y"; 

get_data($url);
    
    
    $mail1 = mail($to,$subject,$message,$headers);
    if($mail1 == TRUE){
    ?>
    <script type="text/javascript">alert("Your Details successfully Submitted"); window.location="categories.php?category=<?php echo $srow[category] ?>";</script>
    <?php } else { ?>
    <script type="text/javascript">alert("Please try again!"); window.location="categories.php?category=<?php echo $srow[category]; ?>";</script>
    <?php }
    
}
else if(isset($_GET) && !empty($_GET['category'])){
    $category = $_GET['category'];
    $cat = $db->query("SELECT `guid`,`name` FROM `super_category` WHERE `guid`='$category'");
    $ccount = $cat->rowCount();
    $crow = $cat->fetch();
    //echo $crow[0]; exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Advertisements improves Buisenesses</title>
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
      <div class="col-md-12"> <a class="btn btn-primary" href="index.php" role="button">Back to Home Page</a> </div>
    </div>
  </header>
  <div class="row" style="padding:10px 0px 0px 0px;">
    <div class="col-md-12" style="background-image:url(images/bg-b.jpg); margin-bottom:10px">
      <div style="font-size:16px; color:#fff; font-weight:bold; padding:10px" align="center"><?php echo $crow['name']?> / <span style="text-transform:uppercase">HYDERABAD</span></div>
    </div>
    <?php 
    require "pageing.php";
    $limit = 6;
    $page = $_REQUEST['page'];								
    if($page) 
    $start = ($page - 1) * $limit; 			
    else{
    $start = 0;		
    $page=1;
    }
    $otherParams="category=".$_GET['category'];
    $filePath="categories.php";

    $ath = $db->query("SELECT DISTINCT a.cid, a.aid FROM `add_services` a, `areas` r WHERE a.category='".$crow[0]."' AND r.guid=a.aid AND a.status='Active' $crr ORDER BY r.name ASC Limit $start, $limit"); 
    $tth = $db->query("SELECT DISTINCT a.cid, a.aid FROM `add_services` a, `areas` r WHERE a.category='".$crow[0]."' AND r.guid=a.aid AND a.status='Active' $crr"); 
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
        <div class="panel-heading"><strong><?php echo $city_row['name']?> - <?php echo $area_row['name']?> </strong></div>
        <div class="panel-body">
        <?php $add = $db->query("SELECT * FROM `add_services` WHERE `status`='Active' AND `cid`='".$city_row['guid']."' AND `aid`='".$area_row['guid']."' AND `category`='".$crow[0]."' ORDER BY `guid` DESC");
        
        if($add->rowCount() > 0){
            $m = 1;
            while($add_row = $add->fetch()){
                // $img = explode(",",$add_row['images']);
                $addd = substr($add_row['address'],0,25);
        ?>
          <div class="row">
            <div class="col-md-3"> <img src="adminupload/<?php echo $add_row['images1']?>" style="width:100%; height:100px; margin-top:5px"  alt=""/> </div>
            <div class="col-md-9" > <br>
              <p style="border-bottom:1px #ccc solid; padding-bottom:5px"><strong style="color:#01ADED"><?php echo $add_row['add_title'] ?> </strong> | <?php if(strlen($add_row['address']) > 25) echo $addd." ..."; else echo $add_row['address']; ?>  | <strong  style="color:#01ADED">Ph. No:</strong> +91 <?php echo $add_row['phone_no1'] ?> | <a style="color:#5BC0DE" href="<?php echo $add_row['website'] ?>" target="_blank"><?php echo $add_row['website'] ?></a> </p>
              <p><i class="glyphicon glyphicon-tags" style="padding-right:5px; color:#337AB7"></i> 
              <?php $des =  str_replace("~~","'",$add_row['offered_services']); if(strlen($des) > 90) echo substr($des,0,90)."..."; else echo $des; ?><strong  style="color:#01ADED"><a style="float:right; color:#5BC0DE" href="c_viewdetails.php?service=<?php echo $add_row['pid'] ?>"> View Details</a></strong></p>
              <a class="btn btn-info save-details" href="javascript:;" style="margin-left:100px" data-id="<?php echo $add_row['pid'] ?>" >Save this contact details</a> <a class="btn btn-default send-sms" href="javascript:;" data-id="<?php echo $add_row['pid'] ?>" >Send Email to this Business</a> <a class="btn btn-link" href="javascript:void(0)" role="button" style="color:#F00"><strong>Hot Deal inside!</strong></a> </div>
              <div class="clearfix"></div>
             <div  style="border-bottom:1px #DD4E04 dotted; padding-bottom:15px; margin-bottom:10px"></div>
          </div>
          <?php if($m > 1){ echo ""; } $m++; } }?>
         
        </div>
      </div>
    </div>
    <?php } ?>
    <div class="clearfix"></div>
    <div class="col-md-12" align="center">
      <nav>
        <ul class="pagination pagination-sm">
          <li><?php make_pages($page,$limit,$total,$filePath,$otherParams); ?></li>
        </ul>
      </nav>
    </div>
    <?php } else {?>
    
    <div class="col-sm-12" align="center"><h4 style="color: red;"> No Results found</h4></div>
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
        <h4 class="modal-title" id="myModalLabel">Send Email</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <form method="post" action="categories.php">
              <p>Enter your contact details</p>
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" name="txtName" placeholder="Full Name" class="form-control" required />
              </div>
              <br>
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                <input type="text" name="txtMobile" placeholder="Mobile No" class="form-control" required />
              </div>
              <br>
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input type="email" name="txtEmail" placeholder="EMail-id" class="form-control" required/>
              </div>
              <br>
              <div class="form-group">
                <textarea class="form-control" name="txtRequirements" required rows="3" placeholder="Please enter your specific requirements here"></textarea>
              </div>
              
              <div class="input-group">
              <div class="row">
              <div class="col-md-6">
                <img src="images/captch.png" width="100" height="34"  alt=""/> </div>
              <div class="col-md-6">
              <input type="text" placeholder="Captch" class="form-control" >
              </div>
              </div>
              </div>
              <br>
        <input type="hidden" name="smpid" value="" id="smpid" />
        <input type="hidden" name="category" value="<?php echo $category?>" />
                <button type="submit" name="submit" value="Send Sms" class="btn btn-info">Submit</button>
            </form>
          </div>
          
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
      <div class="modal-header" style="background-color:#45b7d9; color:#fff">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Enter your details to save this Company in your email</h4>
      </div>
      <div class="modal-body">
        <div class="row">
         <form method="post" action="categories.php">
          <div class="col-md-6">
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" name="txtName" placeholder="Full Name" class="form-control" required />
              </div>
              <br>
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                <input type="text" name="txtMobile" maxlength="15" placeholder="Mobile No" class="form-control" required />
              </div>
              <br>
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input type="email" name="txtEmail" placeholder="EMail-id" class="form-control" required />
              </div>
              <br>
              <div class="input-group">
              <div class="row">
              <div class="col-md-6">
                <img src="images/captch.png" width="100" height="34"  alt=""/> </div>
              <div class="col-md-6">
              <input type="text" placeholder="Captch" class="form-control" >
              </div>
              </div>
              </div>
              <br>
            <input type="hidden" name="spid" value="" id="spid" />
            <input type="hidden" name="category" value="<?php echo $category?>" />
              <button type="submit" name="submit" value="Save Details" class="btn btn-info">Submit</button>
          </div> 
		  
          <div class="col-md-6"> 
		  <?php $add = $db->query("SELECT * FROM `add_services` WHERE `status`='Active' AND `cid`='".$city_row['guid']."' AND `aid`='".$area_row['guid']."' AND `category`='".$crow[0]."' ORDER BY `guid` DESC");
        
        if($add->rowCount() > 0){
            $m = 1;
            while($add_row = $add->fetch()){
                // $img = explode(",",$add_row['images']);
                //$addd = substr($add_row['address'],0,25);
        ?>
          <p><strong><?php echo $add_row['add_title']?></strong></p>
		   <?php  } }?>
          <img src="images/contact.jpg" style="width:100%; height:100px"  alt=""/>
          
         
           </div>
		             
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