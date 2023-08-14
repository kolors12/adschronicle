<?php ob_start();
  error_reporting(0);
  require("cw_admin/lib/config.php");
//echo "SELECT * FROM  `matrimonial_ads` WHERE `status`='Active' ORDER BY `guid` DESC"; exit;   
$pid=$_GET['profile'];
   	    $row = $db->query("SELECT * FROM  `matrimonial_ads` WHERE `status`='Active' and pid='$pid' ORDER BY `guid` DESC")->fetch();
print_r($row);
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
    <div class="row" style="padding:5px 0px 5px 0px">
      <div class="col-md-3 hidden-xs" align="center"> <a href="index.php"><img src="images/logo.png" class="img-responsive cen" style="padding-bottom:10px; padding-top:5px"  alt=""/></a> </div>
      <div class="col-xs-12 hidden-lg hidden-md hidden-sm" align="center"> <a href="index.php"><img src="images/smalllogo.png" class="img-responsive cen" style="padding-bottom:10px; padding-top:5px"  alt=""/></a> </div>
      <div class="col-md-9 hidden-xs">
        <div class="row">
          <div class="col-md-4 padd5">
            <div class="th">
              <div class="jR3DCarouselGallery"></div>
            </div>
          </div>
          <div class="col-md-4 padd5">
            <div class="th">
              <div class="jR3DCarouselGallery"></div>
            </div>
          </div>
          <div class="col-md-4 padd5">
            <div class="th">
              <div class="jR3DCarouselGallery"></div>
            </div>
          </div>
          <div class="col-md-4 padd5">
            <div class="th">
              <div class="jR3DCarouselGallery"></div>
            </div>
          </div>
          <div class="col-md-4 padd5">
            <div class="th">
              <div class="jR3DCarouselGallery"></div>
            </div>
          </div>
          <div class="col-md-4 padd5">
            <div class="th">
              <div class="jR3DCarouselGallery"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row" style="background-color:#01ADED; padding:5px 0px">
      <div class="col-md-12"> <a class="btn btn-danger" href="brides.php?txtReligion=<?php echo $_GET[txtReligion]; ?>&txtSect=<?php echo $_GET[txtSect]; ?>&txtMstatus=<?php echo $_GET[txtMstatus]; ?>&searchby=<?php echo $_GET[searchby]; ?>&search=<?php echo $_GET[search]; ?>" role="button">Back to Search Page</a>
     </div>
    </div>
  </header>
  <div class="row" style="padding:10px 0px 30px 0px;">
  <div class="col-md-12" style="background-image:url(images/bg-b.jpg); margin-bottom:30px">
          <div style="font-size:16px; color:#fff; font-weight:bold; padding:10px" align="center">Biodata</div>
        </div>
  
  <div class="col-md-12">
  <div id="printableArea">
  <table width="100%" border="0" cellspacing="0" cellpadding="o" style="background-color:#f5f5f5;">
  <tbody>
    <tr>
      <td width="40%">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered" style="margin:10px">
  <tbody>
    <tr>
      <td width="50%">Marital Status</td>
      <td width="50%"><?php echo $row['txtMstatus'] ?></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><?php echo $row['txtName'] ?></td>
    </tr>
    <tr>
      <td>Qualification</td>
      <td><?php echo $row['txtQualification'] ?></td>
    </tr>
    <tr>
      <td>Compexion</td>
      <td><?php echo $row['txtComplexion'] ?></td>
    </tr>
    <tr>
      <td>Hieght</td>
      <td><?php echo $row['txtHeight'] ?></td>
    </tr>
    <tr>
      <td>Age</td>
      <td><?php echo $row['txtAge'] ?></td>
    </tr>
    <tr>
      <td>Occupation</td>
      <td><?php echo $row['txtOccupation'] ?></td>
    </tr>
    <tr>
      <td>Monthly Income (Rs.)</td>
      <td><?php echo $row['txtMonthIncome'] ?></td>
    </tr>
    <tr>
      <td>Place of work</td>
      <td><?php echo $row['txtWorkPlace'] ?></td>
    </tr>
    <tr>
      <td>City of Birth</td>
      <td><?php echo $row['txtBirthCity'] ?></td>
    </tr>
    <tr>
      <td>Languages Known</td>
      <td><?php echo $row['txtLanguages'] ?></td>
    </tr>
    <tr>
      <td>Religion(Sect)</td>
      <td><?php echo $row['txtReligion']?> (<?php echo $row['txtSect']?>)</td>
    </tr>
    <tr>
      <td>Father's Name</td>
      <td><?php echo $row['txtFather'] ?></td>
    </tr>
    <tr>
      <td>Father's Occupation</td>
      <td><?php echo $row['txtFOccupation'] ?></td>
    </tr>
    <tr>
      <td>Grand Father(Paternal)</td>
      <td><?php echo $row['txtGPFather'] ?></td>
    </tr>
    <tr>
      <td>Grand Father(Maternal)</td>
      <td><?php echo $row['txtGMFather'] ?></td>
    </tr>
    <tr>
      <td>About Brothers and Sisters</td>
      <td><?php echo $row['txtSiblingsInformation'] ?></td>
    </tr>
	
	<tr>
      <td>Marital Status</td>
      <td><?php echo $row['txtMstatus'] ?></td>
    </tr>
	
	<?php if($row['txtMstatus']!='UnMarried'){ ?>
<tr>
      <td>Childrens</td>
      <td><?php echo $row['txtChildren'] ?></td>
    </tr>
	<?php } ?>
	
	
    <tr>
      <td>Address</td>
      <td><?php echo $row['txtAddress'] ?></td>
    </tr>
    <tr>
      <td>Contact No.</td>
     
      <td><?php echo $row['txtMobile'] ?></td>
    </tr>
<tr>
      <td>Email ID.</td>
     
      <td><?php echo $row['txtEmail'] ?></td>
    </tr>
    <tr>
      <td>General Description</td>
      <td><?php echo $row['txtAboutFamily'] ?></td>
    </tr>
  </tbody>
</table>

     
      <td width="30%" valign="top" align="center">
      
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="padding:10px 10px 10px 40px">
  <!-- Indicators -->
  

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="adminupload/<?php echo $row['image1']?>" style="width:90%; height:400px" alt="1">
    </div>
    <div class="item">
      <img src="adminupload/<?php if($row['image2']!=''){ echo $row['image2'];}else{ echo $row['image1'];}?>" style="width:90%; height:400px" alt="1">
    </div>
    <div class="item">
      <img src="adminupload/<?php if($row['image3']!=''){ echo $row['image3'];}else{ echo $row['image1'];}?>" style="width:90%; height:400px" alt="1">
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    
  </a>
</div>
      

      </td>
    </tr>
  </tbody>
</table>
</div>
<br>
<p align="center"><strong><a href="#" onclick="printDiv('printableArea')" value="print a div!" target="_blank">Print</a>  <!--<a href="images/resume.docx" download>Download</a> | <a href="#" data-toggle="modal" data-target="#myModal">Email this Biodata</a>--></strong></p>


  </div>
  </div>
  <footer>
    <div class="row" style="background-color:#212121; color:#666; padding:15px 0px 15px 0px; ">
      <div class="col-md-12">
        <div class="col-md-1 padd5" align="center">
          <div class="th1"> <img src="images/jus.jpg" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Advocates</small></div>
        </div>
        <div class="col-md-1 padd5" align="center">
          <div class="th1"> <img src="images/astr.jpg" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Astrology</small></div>
        </div>
        <div class="col-md-1 padd5" align="center">
          <div class="th1"> <img src="images/apparel.jpg" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Apparels</small></div>
        </div>
        <div class="col-md-1 padd5" align="center">
          <div class="th1"> <img src="images/brides.gif" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Brides</small></div>
        </div>
        <div class="col-md-1 padd5" align="center">
          <div class="th1"> <img src="images/taxi.jpg" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Cabs</small></div>
        </div>
        <div class="col-md-1 padd5" align="center">
          <div class="th1"> <img src="images/auto.jpg" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Clubs</small></div>
        </div>
        <div class="col-md-1 padd5" align="center">
          <div class="th1"> <img src="images/mob.jpg" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Mobiles</small></div>
        </div>
        <div class="col-md-1 padd5" align="center">
          <div class="th1"> <img src="images/travel4.jpg" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Travel</small></div>
        </div>
        <div class="col-md-1 padd5" align="center">
          <div class="th1"> <img src="images/security.jpg" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Security</small></div>
        </div>
        <div class="col-md-3 padd5" align="center">
          <div class="th1"> <img src="images/cmore.png" style="width:100%; height:60px"  alt=""/> </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div style="margin-bottom:10px; border-bottom:1px #999 dotted"> </div>
      <div class="col-md-12" align="center">
        <p style="padding-bottom:10px"><a href="index.php">Home</a> | <a href="aboutus.html">About us</a> | <a href="advetise.html">Advetise with us</a> | <a href="terms_conditions.html">Terms & Conditions</a> | <a href="customer_care.html">Customer Care</a> | <a href="suggestions.html">Suggestions/Feedback</a> | <a href="contactus.html">Contact us</a> | <a href="franchisees.html">Franchisees/Resellers Invited</a></p>
        <small style="color:#444">@ 2015 All rights Reserved, <a href="http://adschronicle.com/" style="color:#666">Ads Chronicle</a> is a Registered Trademark. Imitation of design and functionality will attract legal action.</small> </div>
    </div>
  </footer>
</div>
<script src="js/bootstrap.min.js"></script> 
<!-- Modal -->
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Send your resume online</h4>
      </div>
      <div class="modal-body">
       <div class="col-md-12">
       <form>
  <div class="form-group">
    <label for="exampleInputEmail1">To</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email-id">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Subjects</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Subjects">
  </div>
  <button type="submit" class="btn btn-default">Send</button> 
</form>
 </div>
<div class="clearfix"></div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>

</body>
</html>
