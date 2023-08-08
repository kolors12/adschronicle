<?php ob_start(); 
error_reporting(0);
require("cw_admin/lib/config.php");
extract($_GET);
extract($_POST);
$date = date('Y-m-d');
if(isset($_POST) && $_POST['submit'] == 'SaveEdit') {
    //print_r($_POST);exit;

//echo ("UPDATE `adds_requests` SET `txtName`='$txtName',`txtMobile`='$txtMobile',`txtEmail`='$txtEmail',`adtype`='$adtype',`txtC_City`='$txtC_City',`txtC_Category`='$txtC_Category',`txtAdTitle`='$txtAdTitle',`txtContent`='$txtContent',`txtMembership_no`='$txtMembership_no' WHERE `guid`='$guid'");exit;

$sth = $db->query ("UPDATE `adds_requests` SET `txtName`='$txtName',`txtMobile`='$txtMobile',`txtEmail`='$txtEmail',`adtype`='$adtype',`txtC_City`='$txtC_City',`txtC_Category`='$txtC_Category',`txtAdTitle`='$txtAdTitle',`txtContent`='$txtContent',`txtMembership_no`='$txtMembership_no' WHERE `guid`='$guid'");
   //print_r($sth); exit;  
if($sth > 0) {?>

  <script>alert("successfully updated"); window.location='Update_Classified_text_add.php?guid='.$_POST['guid'];</script>
<?php 
	} else { ?>
<script>alert("Please try Again"); window.location='Update_Classified_text_add.php?guid='.$_POST['guid'];</script>
	<?php }?>
<?php }  ?>
  
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
</head>

<body style="background-color:#eee">
<div class="container shadow"  style="background-color:#fff">
  <header>
    <?php include("header.php") ?>
    <div class="row" style="background-color:#01ADED; padding:5px 0px">
      <div class="col-md-12"> <a class="btn btn-danger" href="index.php" role="button">Back to Home Page</a> </div>
    </div>
  </header>


  
 

  

      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="post" id="frm1" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
            <div class="modal-header">
             
              <h4 class="modal-title" id="myModalLabel" style="color:#D10306">Update your Classified TEXT AD</h4>
            </div>
         
            <div class="modal-body">
              <div class="row">
              <?php  
                 $q = $_GET['guid'];

                 $sth = $db->query ('SELECT * FROM `adds_requests` WHERE `guid`="'.$q.'"');
                 $row = $sth->fetch();
                 //print_r($row);
                 ?>
                <div class="col-md-8 col-md-offset-2 im">
                  <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" placeholder="Full Name" class="form-control required" value="<?php echo $row['txtName'];?>" name="txtName" autocomplete="off" />
                  </div>
                  <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                    <input type="text" placeholder="Mobile No" class="form-control number required" name="txtMobile" id="txtMobile" value="<?php echo $row['txtMobile'];?>" minlength="10" maxlength="10" autocomplete="off" autocomplete="off" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"/>
                     <span id="span4"></span>
                  </div>
                  <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input type="email" placeholder="EMail-id" class="form-control email required" name="txtEmail" value="<?php echo $row['txtEmail'];?>" autocomplete="off" />
                  </div>
                  <input type="hidden"  name="adtype" value="CLASSIFIED TEXT AD" />
                  
				           <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                    <select class="form-control required" id="txtC_City" name="txtC_City">
                  <option value="">Select City</option>
                  <?php $citb = $db->query("SELECT * FROM `cities` ORDER BY `name` ASC");
                      while($cirt = $citb->fetch()){ ?>
                    <option value="<?php echo $cirt['guid'] ?>" <?php if($row['txtC_City']==$cirt['guid']){ echo "selected"; } ?>><?php echo $cirt['name'] ?></option>
                  <?php } ?>

                    </select>
                    </div>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                   
					         

                    <select class="form-control pid" name="txtC_Category" id="pid" required="">
                    <option value="">Select Classified Category</option>
                    <?php $cit = $db->query("SELECT * FROM `cat` ORDER BY `name` ASC");
                    while($ciroww = $cit->fetch()){ ?>
                    <option value="<?php echo $ciroww['guid'] ?>" <?php if($row['txtC_Category']==$ciroww['guid']){ echo "selected"; } ?>><?php echo $ciroww['name'] ?></option>
                    <?php } ?>
                    </select>
                  </div>
                  
                  <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                 
                  <select class="form-control sid" name="txtAdTitle" id="sid" required="">
                        <option value="">Select Title</option>
                       <?php $cits = $db->query("SELECT * FROM `subv` where sid='".$row['txtC_Category']."' ORDER BY `name` ASC");
                      while($cirs = $cits->fetch()){ ?>
                    <option value="<?php echo $cirs['guid'] ?>" <?php if($row['txtAdTitle']==$cirs['guid']){ echo "selected"; } ?>><?php echo $cirs['name'] ?></option>
                  <?php } ?>
                  </select>
                    
                  </div>
                  <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                    <textarea class="form-control text required" id="txtContent" rows="5" name="txtContent" minlength="30"   maxlength="400"  placeholder="Enter Ad Content" rows="2"><?php echo $row['txtContent'];?></textarea>
                  </div>
                  <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                    <input type="text" placeholder="Enter Ad Agency's membership no" class="form-control required" name="txtMembership_no"  value="<?php echo $row['txtMembership_no'];?>" autocomplete="off" />
                  </div>
                  
                  
                    <input type="hidden" placeholder="Enter Ad Agency's membership no" class="form-control required" name="guid"  value="<?php echo $row['guid'];?>" autocomplete="off" />
                 
                
				     
                </div>
              </div>
            
            </div>
            <div class="modal-footer">
              <button type="submit" name="submit" value="SaveEdit" class="btn btn-info">Update</button>
              <button type="reset" class="btn btn-default">Reset</button>
            </div>
          </form>
        </div>
      </div>
  


  <?php include("footer.php") ?>
</div>
<script src="js/bootstrap.min.js"></script> 
<!-- Modal -->
<script>
  $('.pid').change(function(){

var id= $('#pid').val();
//alert(id);
$.ajax({

		  type:"post",

		  url:"http://localhost/adschronicle/cw_admin/ajaxReq1.php",

		  data:"pid="+id+"&action=fetchexp",

			  success:function(response){

				  $('.sid').html(response);

				return true;

		  }

	   });

})
  </script>
</body>
</html>
