<?php ob_start();
  error_reporting(0);
  require("cw_admin/lib/config.php");
  extract($_GET);

//echo "SELECT * FROM  `jobseeker_ads` WHERE `status`='Active' ORDER BY `guid` DESC"; exit;   
$pid=$_GET['profile'];
   	    $row = $db->query("SELECT * FROM  `jobseeker_ads` WHERE `status`='Active' and pid='$pid' ORDER BY `guid` DESC")->fetch();
       // $rowr = $db->query("SELECT * FROM  `jobseeker_ads_qualification` WHERE  jbaq_id='$pid' ")->fetch();
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
<link rel="stylesheet" href="css/my_style.css">
<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->

<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="js/crawler.js" type="text/javascript"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<script
src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
</script>
<script>
var myCenter=new google.maps.LatLng(17.441553, 78.501037);
var marker;

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:16,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

marker=new google.maps.Marker({
  position:myCenter,
  animation:google.maps.Animation.BOUNCE
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>

</head>

<body style="background-color:#eee">
<div class="container shadow"  style="background-color:#fff">
  <header>
   <?php include("header.php") ?>
    <div class="row" style="background-color:#01ADED; padding:5px 0px">
      <div class="col-md-12"> <a class="btn btn-danger" href="search_seeker.php?txtJobCategory=<?php echo $txtJobCategory;?>&txtJobExp=<?php echo $txtJobExp;?>&txtJobStatus=<?php echo $txtJobStatus;?>&search=Search" role="button">Back to Search Results</a>
     </div>
    </div>
  </header>
  <br>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td align="center" style="background-color:#efe3af;  padding:5px 20px; height:45px"><strong style="color:#027FB3">RESUME</strong></td>
    </tr>
  </tbody>
</table>
<div id="printableArea">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td style="background-color:#fbe7b2; padding:5px 20px; border-bottom:1px #ccc solid; height:45px"><strong>Job Category:</strong> <?php  echo $row['txtJobCategory']?></td>
    </tr>
    <tr>
      <td style="background-color:#fbe7b2; padding:5px 20px">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td width="80%">
      <table width="100%" border="0" height="130px" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td><strong>Name</strong></td>
      <td><strong>:</strong></td>
      <td><?php echo $row['txtName']?></td>
    </tr>
    <tr>
      <td><strong>Date of Birth</strong></td>
      <td><strong>:</strong></td>
      <td><?php echo $row['txtDob']?></td>
    </tr>
    <tr>
      <td><strong>Gender</strong></td>
      <td><strong>:</strong></td>
      <td>Male</td>
    </tr>
    <tr>
      <td><strong>Martial Status</strong></td>
      <td><strong>:</strong></td>
      <td><?php echo $row['txtMStatus']?></td>
    </tr>
  </tbody>
</table>
      </td>
    
      <td width="20%" align="center">
        <img src="adminupload/<?php echo $row ['image1'] ?>" style="height:150px; width:150px" alt=""/></td>
    </tr>
  </tbody>
</table>


      
      </td>
    </tr>
    <tr>
      <td style="background-color:#fbe7b2; padding:5px 20px">
      <p><strong style="color:#027FB3">Contact Information:</strong></p>
      <table width="100%" border="1" cellspacing="0" cellpadding="0" class="table table-bordered" style="margin-bottom:0px">
  <tbody>
    <tr>
      <td><strong>Address</strong></td>
     
      <td><strong>Phone No. 1</strong></td>
      <td><strong>Phone No. 2</strong></td>
      <td><strong>Email-id</strong></td>
    </tr>
    <tr>
      <td><p><?php echo $row['txtAddress']?>.</p></td>
      
      <td>
      <p><?php echo $row['txtMobile']?><br></p>
      
      </td>
	  <td>
      <p><?php echo $row['txtAMobile']?><br></p>
      
      </td>
      <td>
      <p><?php echo $row['txtEmail']?></p>
      </td>
    </tr>
  </tbody>
</table>

      
      </td>
    </tr>
    

                      
<tr>
      <td style="background-color:#fbe7b2; padding:5px 20px">
      <p><strong style="color:#027FB3">Educational Information::</strong></p>
      <table width="100%" border="1" cellspacing="0" cellpadding="0" class="table table-bordered" style="margin-bottom:0px">
  <tbody>
    <tr>
      <td><strong>Degree</strong></td>
     
      <td><strong>Specialization</strong></td>
      <td><strong>% Marks</strong></td>
      <td><strong>University</strong></td> 
      <td><strong>Year of Passing</strong></td>
    </tr>
   <?php //foreach ($arr as $rowr) { ?>


    <?php //$id = $_GET['id'];
			 $m = $db->query("SELECT * FROM  `jobseeker_ads_qualification` WHERE  jbaq_id='$pid'"); 
			  while($z = $m->fetch()){

          $tth = $db->query ("SELECT * FROM `qualification` WHERE `guid` = $z[2]");
          $trow = $tth-> fetch(); 
          $tthd = $db->query ("SELECT * FROM `specialisation` WHERE `guid` = $z[3]");
          $tsugu = $tthd-> fetch(); 

// print_r($tsugu['name']);exit;
			?>
    <tr>
   <?php  
 ?>
      <td><p><?php echo $trow['name'];?></p></td>
      
      <td>
      <p><?php echo $tsugu['name'];?><br></p>
      
      </td>
	  <td>
      <p><?php echo $z['marks']?><br></p>
      
      </td>
      <td>
      <p><?php echo $z['university']?></p>
      </td>
      <td>
      <p><?php echo $z['yearpassing']?></p>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</td>
</tr>






    <tr>
      <td style="background-color:#fbe7b2; padding:5px 20px">
      <p><strong style="color:#027FB3">Experience Information:</strong></p>
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered" style="margin-bottom:0px">
  <tbody>
    <tr>
      <td><?php echo $row['txtJobExp']?></td>
    </tr>
  </tbody>
</table>

      </td>
    </tr>
    <tr>
      <td style="background-color:#fbe7b2; padding:5px 20px">
      <p><strong style="color:#027FB3">Skill Set Information:</strong></p>
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered" style="margin-bottom:0px">
  <tbody>
    <tr>
      <td><?php echo $row['txtSkills']?></td>
    </tr>
  </tbody>
</table>

      </td>
    </tr>
    <tr>
      <td style="background-color:#fbe7b2; padding:5px 20px">
      <table width="100%" border="0" height="120px" cellspacing="0" cellpadding="0" >
  <tbody>
    <tr>
      <td align="right" width="45%"><strong>Job Status</strong></td>
      <td align="center" width="10%"><strong>:</strong></td>
      <td width="45%"><?php echo $row['txtJobStatus']?></td>
    </tr>
    <tr>
      <td align="right"><strong>Minimum Salary Expected</strong></td>
      <td align="center"><strong>:</strong></td>
      <td><?php echo $row['txtExpSalary']?></td>
    </tr>
    <tr>
      <td align="right"><strong>Desired Location</strong></td>
      <td align="center"><strong>:</strong></td>
      <td><?php echo $row['txtDesiredLocation']?></td>
    </tr>
  </tbody>
</table>

      </td>
    </tr>
    <tr>
      <td style="background-color:#fbe7b2; padding:5px 20px">
      <p><strong style="color:#027FB3">Additional Information:</strong></p>
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered" height="150px" style="margin-bottom:0px">
  <tbody>
    <tr>
      <td><?php echo $row['txtAddinformation']?></td>
    </tr>
  </tbody>
</table>

      
      </td>
    </tr>
    <tr>
       <td  style="background-color:#fbe7b2; padding:5px 20px" align="right">
	   <a  class="btn btn-default" href="<?php if($row['image3']!=''){ ?>adminupload/<?php echo $row['image3'];?><?php }else{ echo "#";} ?>" target="_blank">Video Resume</a>
      <!-- <button type="button" >Video Resume</button>-->
      </td>
    </tr>
  </tbody>
</table>
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td  style="background-color:#efe3af; padding:5px 20px">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered" style="margin-bottom:0px">
  <tbody>
    <tr>
      <td width="25%" align="center"><strong><a href="search_seeker.php?txtJobCategory=<?php echo $txtJobCategory;?>&txtJobExp=<?php echo $txtJobExp;?>&txtJobStatus=<?php echo $txtJobStatus;?>&search=Search">Back to Ad list</a></strong></td>
      <td width="25%" align="center"><strong><a href="#" onclick="printDiv('printableArea')" value="print a div!" >Print Resume</a></strong></td>
      <!--<td width="25%" align="center"><strong><a href="#" data-toggle="modal" data-target="#myModal">Share this resume</a></strong></td>-->
      <td width="25%" align="center"><strong><a href="adminupload/<?php echo $row['image2']?>" download>Download doc resume</a></strong></td>
    </tr>
  </tbody>
</table>

      </td>
    </tr>
  </tbody>
</table>


<br>
  
  <?php include("footer.php") ?>
</div>
<script src="js/bootstrap.min.js"></script> 
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Send message to this jobseeker</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">To</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="inputEmail3" placeholder="elitefocus@yahoo.com">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">From</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputPassword3" placeholder="elitefocus@gmail.com">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Subject</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputPassword3" placeholder="Call for Interview">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Message</label>
    <div class="col-sm-8">
      <textarea class="form-control" rows="3" placeholder="Message"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Address</label>
    <div class="col-sm-8">
      <textarea class="form-control" rows="3" placeholder="Address"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
      <button type="submit" class="btn btn-default">Send Mail</button> <button type="submit" class="btn btn-default">Back to Job List</button>
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
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

</body>
</html>
