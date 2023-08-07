<?php ob_start();
  error_reporting(0);
  require("cw_admin/lib/config.php");
  extract($_GET);
  
  if(isset($_GET) && $_GET['search']=='Search'){
              //unset($_POST['search']);
              //print_r($_POST);exit;
  			      $srr='';
              $ser.="search=Search&";

              if(!empty($_GET['txtMobile'])){
                  $srr.= "txtMobile LIKE '%".$_GET['txtMobile']."%' AND ";
              
              }
              if(!empty($_GET['ref_id'])){
                  $srr.= "guid LIKE '%".$_GET['ref_id']."%' AND ";
                  
              }


              // if(!empty($_GET['txtJobStatus'])){
              //     $srr.= "txtJobStatus LIKE '%".$_GET['txtJobStatus']."%' AND ";
              //     $ser.="txtJobStatus=".$_GET['txtJobStatus']."&";
              // }
               $srr;
        
              if(!empty($srr)){
                  $srr = "AND ".substr($srr,0,-4);
              }
              if(!empty($ser)){
                  $ser = substr($ser,0,-1);
              }
  			$srr;
  		  $ser;
               
   }     
          //echo "SELECT * FROM  `adds_requests` WHERE `bank_ref`=''   $srr ORDER BY `guid` DESC"; exit;   
   	    $serth = $db->query("SELECT * FROM  `adds_requests` WHERE `bank_ref`=''  $srr");
        $resu = $serth->fetch();
        //print_r($resu);
  
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
  <!-- <div class="row" style="padding:10px 0px 0px 0px;">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-12">
          <div class="" style="background-color:#01ADED; padding:10px; margin-bottom:25px; color:#FFF" align="center"> <strong>Maximise your profit. Advertise with Adschronicle.com</strong> </div>
        </div>
        <div class="col-md-6"> <img src="images/incresa.jpg" class="img-responsive"  alt=""/> <br>
          <p style="font-size:16px"> <strong>Grow your Business with AdsChronicle.com </strong>
            </h4>
          
          <h4>
          <strong>To advertise, call 040 6661 6544</strong>
          </p>
        </div>
        <div class="col-md-6">
          <p style="font-size:16px"><strong>Call 040 6661 6544 or fill this form</strong></p>
          <div class="panel panel-info" style="margin-top:20px; margin-bottom:25px">
            <div class="panel-heading text-center"><strong>Multiply your Business</strong></div>
            <div class="panel-body">
            <form class="form-horizontal" action="sug.php" method="post">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Full Name</label>
                  <div class="col-md-1" style="padding-top:5px">:</div>
                  <div class="col-sm-7">
                    <input type="text" class="form-control"  pattern="[A-Za-z\s]+"  minlength="3" maxlength="22" name="fname" id="exampleInputEmail1" placeholder="Full Name" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Phone No</label>
                  <div class="col-md-1" style="padding-top:5px">:</div>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="exampleInputEmail1" name="phone" maxlength="10" pattern="^\d{10}$" placeholder="Phone No" required="" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Email-id</label>
                  <div class="col-md-1" style="padding-top:5px">:</div>
                  <div class="col-sm-7">
                    <input type="email" class="form-control" id="exampleInputEmail1"  name="email" placeholder="Email-id" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-md-4 control-label">Enquiry</label>
                  <div class="col-md-1" style="padding-top:5px">:</div>
                  <div class="col-md-7">
                    <textarea class="form-control" placeholder="Enquiry"  name="msg"  rows="2"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-5 col-sm-7">
                    <button type="submit" value="submit" name="submit" class="btn btn-info">Submit</button>
                    <button type="reset" class="btn btn-info">Reset</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </div> -->


  <div class="row" style="padding:10px 0px 0px 0px;">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="panel panel-info" style="margin-top:20px; margin-bottom:25px">
            <div class="panel-heading text-center"><strong>Payment Page</strong></div>
            <div class="panel-body">
              <form class="form-horizontal" action="payment_page.php" method="get">
                

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
    			<th width='5%'>Name</th>
    		  <th width='5%'>Mobile Number</th>
          <th width='5%'>Email</th>
          <th width='5%'>Status</th>
          <th width='5%'>Payment</th>
			
    	</tr>
			
			<tr>
			<td><input type='text' class=' table form-control col-3' value="<?php echo $resu['txtName'];?>"  placeholder='Enter Name'/></td>
			<td><input type='text' class=' table form-control col-3' value="<?php echo $resu['txtEmail'];?>"  placeholder='Email'/></td>
      <td><input type='text' class=' table form-control col-3' value="<?php echo $resu['txtName'];?>"  placeholder='Email'/></td>
      <td><input type='text' class=' table form-control col-3' value="Not Paid"  placeholder='Email'/></td>
      <td> <button type="submit" name="" value="" class="btn btn-info">Pay Now</button></td>
		  </tr>

			
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
