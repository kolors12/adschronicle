<?php ob_start();
  error_reporting(0);
  require("cw_admin/lib/config.php");
  extract($_GET);
  if(isset($_GET) && $_GET['search']=='Search'){
              //unset($_GET['search']);
  			$srr='';
              $ser.="search=Search&";
              if(!empty($_GET['txtJobCategory'])){
                  $srr.= "txtJobCategory LIKE '%".$_GET['txtJobCategory']."%' AND ";
                  $ser.="txtJobCategory=".$_GET['txtJobCategory']."&";
              }
              if(!empty($_GET['txtJobExp'])){
                  $srr.= "txtJobExp LIKE '%".$_GET['txtJobExp']."%' AND ";
                  $ser.="txtJobExp=".$_GET['txtJobExp']."&";
              }
              if(!empty($_GET['txtJobStatus'])){
                  $srr.= "txtJobStatus LIKE '%".$_GET['txtJobStatus']."%' AND ";
                  $ser.="txtJobStatus=".$_GET['txtJobStatus']."&";
              }
               $srr;
              $ser;
              if(!empty($srr)){
                  $srr = "AND ".substr($srr,0,-4);
              }
              if(!empty($ser)){
                  $ser = substr($ser,0,-1);
              }
  			$srr;
  		  $ser;
               
   }     
  //echo "SELECT DISTINCT(txtJobCategory) FROM  `jobseeker_ads` WHERE `status`='Active' AND `txtCity` LIKE '%".$_COOKIE['areaname']."%' $srr ORDER BY `guid` DESC"; exit;   
   	    $serth = $db->query("SELECT DISTINCT(txtJobCategory) FROM  `jobseeker_ads` WHERE `status`='Active' AND `txtCity` LIKE '%".$_COOKIE['areaname']."%' $srr ORDER BY `guid` DESC");
  
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
          <div class="col-md-12"> <a class="btn btn-danger" href="index.php" role="button">Back to Home Page</a>
          </div>
        </div>
      </header>
      <div class="row" style="padding:10px 0px 30px 0px;">
        <div class="col-md-12" style="background-image:url(images/bg-b.jpg); margin-bottom:30px">
          <div style="font-size:16px; color:#F30; font-weight:bold; padding:10px" align="center"><?php echo ucfirst($_GET['searchby']) ?></div>
        </div>
        <form method="get" action="search_seeker.php">
          <div class="col-md-3">
            <select class="form-control required" name="txtJobCategory" >
              <option value="">Select Job Category</option>
              <?php 
                $jth = $db->query("SELECT * FROM `job_category` ORDER BY `name` ASC");
                foreach($jth as $jrow){
                    echo '<option '; if($txtJobCategory==$jrow['name']){ echo " selected "; } echo '>'.$jrow['name'].'</option>';
                }
                ?>
            </select>
          </div>
          <div class="col-md-3">
            <select class="form-control required" name="txtJobExp">
              <option value="">Select Experience</option>
              <?php $eth = $db->query("SELECT * FROM `job_exp` ORDER BY `name` ASC");
                foreach($eth as $erow){
                 echo '<option value="'.$erow['name'].'" '; if($txtJobExp==$erow['name']){ echo " selected "; } echo '>'.$erow['name'].'</option>';
                }?>
            </select>
          </div>
          <div class="col-md-3">
            <select class="form-control" name="txtJobStatus">
              <option value="0">Select</option>
              <option <?php if($txtJobStatus=="Full Time"){ echo " selected "; } ?>>Full Time</option>
              <option <?php if($txtJobStatus=="Part Time"){ echo " selected "; } ?>>Part Time</option>
            </select>
          </div>
          <div class="col-md-3">
            <!--input type="hidden" name="searchby" value="<?php echo $_GET['searchby'] ?>" /-->
            <button type="submit" name="search" value="Search" class="btn btn-info col-xs-12">Search</button>
          </div>
        </form>
        <div class="clearfix"></div>
        <div class="col-md-12" style="margin-top:20px">
          <?php //if(($serth->rowCount() > 0) && ($_GET['search']=='Search') ){
             if ($_GET['search']=='Search') {
             if($serth->rowCount() > 0) {
            foreach($serth as $lrow){
            $mth = $db->query("SELECT * FROM  `jobseeker_ads` WHERE `status`='Active' AND `txtCity` LIKE '%".$_COOKIE['areaname']."%' AND `txtJobCategory` = '".$lrow[0]."'  $srr ORDER BY `guid` DESC");
            if($mth->rowCount() > 0){


            
            
            ?>
          <div class="panel panel-default">
            <div class="panel-heading"><?php echo ucfirst($lrow[0])?></div>
            <div class="panel-body" id="ads_serct">
              <?php foreach($mth as $row){ 
                
                
              $de= $row['pid'];
              $rest=$db->query("SELECT *  FROM `jobseeker_ads_qualification` WHERE `jbaq_id`='$de'");
              $resu = $rest->fetch();
              $ty= $resu['txtEducation'];
              $tth = $db->query ("SELECT * FROM `qualification` WHERE `guid` = '$ty'");
              $trow = $tth-> fetch(); 
                //print_r($trow['name']);exit;
                ?>
              <div class="row" style="border:1px #eee solid; margin:5px">
                <div class="col-md-2" align="center">
                  <img src="adminupload/<?php echo $row['image1']?>" style="height:170px; width:100%; padding:3px" alt=""/> 
                  <p><strong><?php echo $row['productid']?></strong></p>
                </div>
               
                <div class="col-md-9">
                  <div style="padding-top:30px">
                    <p class="pull-left"><?php echo $row['txtName']?> | <?php echo $trow['name'];?>  | Exp: <?php echo $row['txtJobExp']?> | <?php echo $row['txtSkills']?> </p>
                    
                    <div class="clearfix"></div>
                    <div style="border-bottom:1px #ddd solid;  margin-bottom:5px"></div>
                    <div class="clearfix"></div>
                    <p class="pull-left">DoB: <?php echo $row['txtDob']?> | Res: <?php echo $row['txtLocation']?> | <?php echo $row['txtMobile']?>  |  <?php echo $row['txtEmail']?> </p>
					<p class="pull-right"><a href="details_resume.php?profile=<?php echo $row['pid'];?>&txtJobCategory=<?php echo $txtJobCategory;?>&txtJobExp=<?php echo $txtJobExp;?>&txtJobStatus=<?php echo $txtJobStatus;?>&search=Search">Detail Resume</a> | <a href="<?php if($row['image3']!=''){ ?>adminupload/<?php echo $row['image3'];?><?php }else{ echo "#";} ?>" target="_blank">Video Resume</a></p> <div class="clearfix"></div>
                  </div>
                </div>
                <div class="col-md-1" align="center">
                  <div >
                    <div class="checkbox">
                      <label>
                      <input type="checkbox" class="mpfilters" name="jobseekeremail[]" value="<?php echo $row['txtEmail']?>" required="">
                      </label>
                    </div>
                  </div>
                </div>
              </div>
                <?php } ?>
            </div>
          </div>
          <div class="col-md-12" align="right"> 
            <input type="button"  class="btn btn-info send-message" value="Send message to selected jobseeker">
          </div>
          <?php } } } else { echo "Currently No Job seekers matching your requirement, Please Try Later";} } ?> 
         

          
          <?php // }else{ echo "Currently No Job seekers matching your requirement, Please Try Later"; } ?>
        </div>
        <div class="clearfix"></div>
      </div>
      <?php include("footer.php") ?>
    </div>
    <script src="js/bootstrap.min.js"></script> 
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="myModal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Send message to selected jobseeker</h4>
          </div>
          <div class="modal-body">
            <?php include"popup.php"?>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="myModal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
    <script>
	
	
	

	
	
	 
	
	
      $('.send-message').click(function(){
		  
		  
		  if($('#ads_serct').find('input[type=checkbox]:checked').length >0)
		  {
			//alert("Checkbox is checked." );
			 $(':input[type="button"]').prop('disabled', true);
			 
		}
		else if($('#ads_serct').find('input[type=checkbox]:checked').length == 0){
		
			alert("Please Select atleast one Job seeker" );
			 $(':input[type="button"]').prop('disabled', false);
			 return false;
		}
		
		
           
		   
		  var r='';
		 
         $("input.mpfilters[type=checkbox]:checked").each(function() {
           r+= $(this).val()+',';
         }); 
         var purl = r.slice(0,-1);
         $("#to_address").val(purl);
         $("#myModal").modal({backdrop:'static'});

      }); 


 $("#jobMobile").keyup(function(){
       var userphone=$("#jobMobile").val();
       if($.isNumeric(userphone) && userphone.length==10){
    	  $.ajax({
    			type:"post",
    			url:"cw_admin/ajaxScripts/jobverification.php",
    			data:"qs="+userphone,
                beforeSend: function(){
                 $("#span4").html("<img src='images/loaderRevamp.svg' height='25px' width='25px' /> Loading request...");
                },
    			success:function(response){
    			  $("#span4").html('');
    				var data = $.trim(response);
                   	if(data == 'sent'){
                   	    $("#txtEmail").focus();
                   	    $(".otp-block").show();
                        $(".submit-button").addClass("disablededit");
                   	    $("#txtOtp").val('');
                        //"$("#remail").prop('readonly', true);
                        $("#span4").html('<i class="fa fa-check-circle-o"></i> OTP sent to &nbsp'+userphone+'.<br/>');
                        $("#span4").addClass("text-success");
                        $(".success-text").html('<i class="fa fa-check-circle-o"></i> OTP sent to &nbsp'+userphone+'.<br/>');
                        $(".success-text").addClass("text-success");
    					return true;   
    				}
    				else{
                        $("#span4").html('Sorry!. Please try Again');
                        $("#span4").addClass("text-danger");

    					return false;
    				}
    			}
    		 });
        
       }
        
     });

     $('body').delegate("#txtOtp","keyup", function(){
        var otp = $("#txtOtp").val();
        if(otp.length==4){
                     $.ajax({
                    			type:"post",
                    			url:"franchise.php",
                    			data:"vendorotp="+otp+"&action=VerifyOTP",
                                beforeSend: function(){
                                 $("#span3").html("<img src='images/loaderRevamp.svg' height='25px' width='25px' /> Validating...");
                                },
                    			success:function(response){
                    			  $("#span3").html('');
                                  var res = response;
                                  //alert(res);
                                  if(res==='1111'){
                                        $(".resend-code").hide();
                                        //alert("Your Registration Successfully");
                                        $(".success-text").html('<i class="fa fa-check-circle-o"></i> OTP Verified. <br/>');
                                        $(".success-text").removeClass("text-danger");
                                        $(".success-text").addClass("text-success");
                                        $(".submit-button").removeClass("disablededit");
                                    } else if(res==='0101') {
                                        $(".resend-code").show();
                                        $(".success-text").html('Invalid OTP <br/>');
                                        $(".success-text").addClass("text-danger");
                                        $(".submit-button").addClass("disablededit");
                                    } 
                  			    }
                    });
 
        }

    });
    $(".resend-code").click(function(){
        var userphone=$("#jobMobile").val();
       if($.isNumeric(userphone) && userphone.length==10){
    	  $.ajax({
    			type:"post",
    			url:"cw_admin/ajaxScripts/jobverification.php",
    			data:"qs="+userphone,
                beforeSend: function(){
                 $("#span3").html("<img src='images/loaderRevamp.svg' height='25px' width='25px' /> Loading request...");
                },
    			success:function(response){
    			
    			  $("#span3").html('');
    				var data = $.trim(response);
                   	if(data == 'sent'){
                        $(".submit-button").addClass("disablededit");
                   	    $("#txtOtp").val('');
                        $(".success-text").html('<i class="fa fa-check-circle-o"></i> OTP sent to &nbsp'+userphone+'.<br/>');
                        $(".success-text").addClass("text-success");
    					return true;
    				}
    			}
    		 });	  
          }       
        
    });            
    </script>
  </body>
</html>