<?php ob_start();
  error_reporting(0);
  require("cw_admin/lib/config.php");
  extract($_GET);
  extract($_POST);
  if(isset($_POST) && $_POST['search']=='Search'){
          
              if(!empty($_POST['txtMobile'])){
                $mobile =  $_POST['txtMobile'];
              }
              if(!empty($_POST['ref_id'])){
              $ref_id = $_POST['ref_id'];
              }
	
               
   }     

           
  $serth = $db->query("SELECT * FROM  `adds_requests` WHERE  `txtMobile`='$mobile' AND `guid`='$ref_id'");

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
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="panel panel-info" style="margin-top:20px; margin-bottom:25px">
            <div class="panel-heading text-center"><strong>Update Details and Payment Page </strong></div>
            <div class="panel-body">
              <form class="form-horizontal" action="payment_page.php" method="POST">
                

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Service Type</label>
                  <div class="col-md-1" style="padding-top:5px">:</div>
                  <div class="col-sm-7">
                  <select  name="areas" class="SlectBox form-control">
               
                <option value="">Select Service</option>
                <option value="Classified TEXT AD">Classified TEXT AD</option>
                <option value="Matrimonial AD">Matrimonial AD</option>
                <option value="Job Seeker Ad">Job Seeker Ad</option>
         
              </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Phone No</label>
                  <div class="col-md-1" style="padding-top:5px">:</div>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="txtMobile" name="txtMobile" maxlength="10" pattern="^\d{10}$" placeholder="Phone No" required="" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Reference Number</label>
                  <div class="col-md-1" style="padding-top:5px">:</div>
                  <div class="col-sm-7">
                    <input type="text" class="form-control"    minlength="5" maxlength="10" name="ref_id" id="ref_id" placeholder="Reference Number" required="">
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-sm-offset-5 col-sm-7">
                    <button type="submit" name="search" value="Search" class="btn btn-info">Search</button>
                    <button type="reset" class="btn btn-info">Reset</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <table class='table table-bordered table-hover'>
			<tr>
      <?php 
      
      ?>
    			<th width='5%'>Name</th>
    		  <th width='5%'>Mobile Number</th>
          <th width='5%'>Email</th>
          <th width='5%'>Status</th>
          <th width='5%'>Update Profile</th>
       
          <th width='5%'>Payment</th>
          

          
			
    	</tr>
			<?php 
      if($serth->rowCount() > 0){
      $n = 1;
      while($ta_row = $serth->fetch()){
      ?>
			<tr>
			<td><input type='text' class=' table form-control col-3' value="<?php echo $ta_row['txtName'];?>"  placeholder='Enter Name'/></td>
			<td><input type='text' class=' table form-control col-3' value="<?php echo $ta_row['txtMobile'];?>"  placeholder='Email'/></td>
      <td><input type='text' class=' table form-control col-3' value="<?php echo $ta_row['txtEmail'];?>"  placeholder='Email'/></td>
      <td><?php if($ta_row['status']==''){?>
        <span class='btn btn-block btn-sm btn-danger disabled green_btn'>Not Activated yet</span><?php }?>
        <?php if($ta_row['status']=='DeActive'){?>
        <span class='btn btn-block btn-sm btn-danger disabled green_btn'>Subscription plan Completed</span><?php }?>

        <?php if($ta_row['status']=='Active'){?>
        <span class='btn btn-block btn-sm btn-success disabled green_btn'>Active</span><?php }?>
      
      </td>
      <td style="text-align: center">
      <a href="Update_Classified_text_add.php?guid=<?php echo $ta_row['guid']; ?>"><button type="submit"  class="btn btn-info btn-sm">Update</button></a>
      </td>

      <td>
      <?php if(($ta_row['status']=='' || $ta_row['status']=='DeActive' )){?>
        <a href="add-packages.php?typeid=<?php echo $ta_row['guid']; ?>"><button type="submit" name="" value="" class="btn btn-info btn-sm">Pay Now</button></a>
        <?php }?>
        <?php if($ta_row['status']=='Active'){?>
        <span class='btn btn-block btn-sm btn-success disabled green_btn'>Payment Done</span><?php }?>
      </td>

		  </tr>
      <?php $i++;  } } else { ?>
			<tr >
      <td colspan="6" style="text-align: center"> 
      <div class="td-bg-first" style= "color:red"> <b><?php echo "No result Found...!" ?></b></div>
      </td>
      </tr>
      <?php } ?>
			
			</table>
     </div>
    
    <div class="clearfix"></div>

    
  </div>



  <?php include("footer.php") ?>
</div>
<script src="js/bootstrap.min.js"></script> 
<!-- Modal -->

</body>
</html>
