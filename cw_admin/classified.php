<?php ob_start(); error_reporting(0);
require("cw_admin/lib/config.php");
extract($_GET);
extract($_POST);
//print_r($_POST);
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
    $otherParams="";
    $filePath="classified.php";
    $ath = $db->query("SELECT * FROM `cat` ORDER BY `guid` DESC Limit $start, $limit"); 
    $tth = $db->query("SELECT * FROM `cat`"); 
    $total = $tth->rowCount();
    ?>
  <div class="row" style="padding:20px 0px 0px 0px;">
    <p style="font-size:16px; color:#337AB7; font-weight:bold" align="center">CLASSIFIED ADVERTISEMENTS</p>
    <div class="col-md-8">
     <?php if($total > 0){
        
        while($c_row = $ath->fetch()){
			//echo "SELECT * FROM `adds_requests` WHERE `txtC_Category` = '".$c_row['guid']."' AND `txtC_City` = '".$_COOKIE['area']."' AND `status`='Active' ORDER BY `guid` DESC";
            $add = $db->query("SELECT * FROM `adds_requests` WHERE `txtC_Category` = '".$c_row['guid']."' AND `txtC_City` = '".$_COOKIE['area']."' AND `status`='Active' ORDER BY `guid` DESC");
        ?>
      <div class="shadow1" style="background-color:#01ADED; padding:10px; margin-bottom:25px; color:#FFF"> <strong><?php echo $c_row[1]?></strong> </div>
      <?php 
      if($add->rowCount() > 0){
         while($a_row = $add->fetch()){
      ?>
      <div class="shadow1" style="background-color:#eee; padding:10px; margin-bottom:25px">
        <p><strong><?php echo $a_row['txtAdTitle']?></strong></p>
        <p><?php $des = str_replace("^^","'",$a_row['txtContent']); echo $des = str_replace('~~','"',$des); ?></p>
      </div>
      <?php } } else { echo "No Records found"; }?>
     <?php } } else { echo "No Records found"; } ?>
    </div>
    <div class="col-md-4"> 
            <?php 

			 $bth = $db->query ("SELECT * FROM `image_classifieds` WHERE `txtC_City` = '".$_COOKIE['area']."' AND `status`='Active' ORDER BY `guid` DESC");
			 $bcount = $bth->rowCount();
			 if($bcount > 0) {
				 $m= 1;
				 while($brow = $bth->fetch()) { 
                 ?>
              <a href="<?php echo $brow['txtUrl']?>" target="_blank"><img src="adminupload/<?php echo $brow['txtFile']?>" style="width:100%; height:200px; padding-bottom:10px"  alt=""/><p class="text-title"><?php echo $brow['txtAdTitle']?></p>
              
              <div class="clearfix"></div>
              <div style="border-bottom:1px #DD4703 dotted; margin-bottom:10px"></div>
              
               </a>
             <?php $m++; } } ?>
    </div>
    <div class="clearfix"></div>
   <?php if($total > 0){ ?>
    <div class="col-md-12" align="center">
      <nav>
        <ul class="pagination pagination-sm">
          <li><?php make_pages($page,$limit,$total,$filePath,$otherParams); ?></li>
        </ul>
      </nav>
    </div>    
   <?php } ?>
    <div class="clearfix"></div>
  </div>
<?php include("footer.php") ?>
</div>
<script src="js/bootstrap.min.js"></script> 
<!-- Modal -->
</body>
</html>