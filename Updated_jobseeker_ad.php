<?php ob_start();error_reporting(0);
  require_once "cw_admin/lib/config.php";
  extract($_POST);
  $date = date("Y-m-d");
  if(isset($_POST) && $_POST['submit'] == 'updateJobSeeker') {
     //print_r ($_POST["txtEducation"]); exit;
            //stripslashes($_POST);
           
    $txts=implode('&nbsp;|&nbsp;',$_POST['txtSkills']);
    $file=$db->query("SELECT * FROM `jobseeker_ads` WHERE `guid`='$guid'");
    $files= $file->fetch();
    $desc = str_replace("'","~~",$_POST['description']);
    stripslashes($_POST);
    $img = '';
    for($i=0; $i < 3; $i++) {
    $j = $i+1;
    //Get the temp file path
    $tmpFilePath = $_FILES['image'.$j]['tmp_name'];
    //Make sure we have a filepath
    if(!empty($tmpFilePath)){
    //Setup our new file path
    $im_name = time().$_FILES['image'.$j]['name'];
    $newFilePath = "adminupload/" . $im_name;
    //Upload the file into the temp dir
    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
    unlink("adminupload/".$files['images'.$j]);
    //Handle other code here
    //$img.= $im_name.",";
    //echo "UPDATE `jobseeker_ads` SET images.$j = '$im_name' WHERE `guid`='$guid'";
    $db->query("UPDATE `jobseeker_ads` SET image$j = '$im_name' WHERE `guid`='$guid'");
    } 
    //$img.= $im_name.",";
    } 
    }
            
      if($_POST['txtSkills'] == ''){

      $sth = $db->query ("UPDATE `jobseeker_ads` SET `txtJobCategory`='$txtJobCategory',`txtJobExp`='$txtJobExp',`txtJobStatus`='$txtJobStatus',`txtName`='$txtName',`txtDob`='$txtDob',`txtMStatus`='$txtMStatus',`txtAddress`='$txtAddress',`txtCity`='$txtCity',`txtLocation`='$txtLocation',`txtMobile`='$txtMobile',`txtAMobile`='$txtAMobile',`txtEmail`='$txtEmail',`txtEducation`='$txtEducation',`txtExpSalary`='$txtExpSalary',`txtDesiredLocation`='$txtDesiredLocation',`txtAddinformation`='$txtAddinformation' WHERE `guid`='$guid'");
      }else{
      $sth = $db->query ("UPDATE `jobseeker_ads` SET `txtJobCategory`='$txtJobCategory',`txtJobExp`='$txtJobExp',`txtJobStatus`='$txtJobStatus',`txtName`='$txtName',`txtDob`='$txtDob',`txtMStatus`='$txtMStatus',`txtAddress`='$txtAddress',`txtCity`='$txtCity',`txtLocation`='$txtLocation',`txtMobile`='$txtMobile',`txtAMobile`='$txtAMobile',`txtEmail`='$txtEmail',`txtEducation`='$txtEducation',`txtSkills`='$txts',`txtExpSalary`='$txtExpSalary',`txtDesiredLocation`='$txtDesiredLocation',`txtAddinformation`='$txtAddinformation' WHERE `guid`='$guid'");
      }

      if($_POST["txtEducation"]==''){
      $count = count($_POST["marks"]);

      }else{
      $count = count($_POST["txtEducation"]);
      }
      //Getting post values
      $skill=$_POST["txtEducation"];	
      $skill6=$_POST["specialisation"];	
      $skill7=$_POST["marks"];	
      $skill8=$_POST["university"];	
      $skill9=$_POST["yearpassing"];
      $gu_id=$_POST["guu_id"];


      for($i=0; $i<$count; $i++)
      {
      $t = $_POST['guid'];

      $res=$db->query("SELECT max(jbaq_id) FROM `jobseeker_ads_qualification`  WHERE `js_id`= '$t' ");
      $result = $res->fetch();
      $dt=$result[0];
      // print_r($count); exit;  

      if ($skill =='') {
      $sth = $db->query ("UPDATE  `jobseeker_ads_qualification` SET  `marks`='$skill7[$i]',`university`='$skill8[$i]', `yearpassing`='$skill9[$i]'  WHERE `guid`='$gu_id[$i]'");
      } else {
      // echo ("INSERT INTO `jobseeker_ads_qualification` (`jbaq_id`,`js_id`,`txtEducation`,`specialisation`,`marks`,`university`,`yearpassing`) VALUES('$dt','$guid','$skill[$i]','$skill6[$i]','$skill7[$i]','$skill8[$i]','$skill9[$i]')");exit;  
      $sth = $db->query ("INSERT INTO `jobseeker_ads_qualification` (`jbaq_id`,`js_id`,`txtEducation`,`specialisation`,`marks`,`university`,`yearpassing`) VALUES('$dt','$guid','$skill[$i]','$skill6[$i]','$skill7[$i]','$skill8[$i]','$skill9[$i]')");
      }
      }

      if($sth > 0) {?>
      <?php 

      $post_msg = '<h4 style="color: green;">Updated Successfully</h4>';	
      header('location:Updated_jobseeker_ad.php?guid='.$_POST['guid']);
      } else { 
      $post_msg = '<h4 style="color: red;">Please try Again</h4>';	
      header('location:Updated_jobseeker_ad.php?post_msg='.$post_msg);
      } ?>

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
    <link rel="stylesheet" href="css/datepicker.css">
    <link rel="stylesheet" href="css/my_style.css">
    <style>
      .cls { 
      color: #F60; 
      }
      .disablededit {
      cursor: inherit;
      cursor: none;
      pointer-events: none;
      }
    </style>
    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="js/crawler.js" type="text/javascript"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
     <script src="jquery.sumoselect.js"></script>
    <link href="sumoselect.css" rel="stylesheet" />
    <script type="text/javascript">
      $(document).ready(function () {
          window.asd = $('.SlectBox').SumoSelect({ selectAll: true });
      });
      $(function () {
      $('[data-toggle="tooltip"]').tooltip()
      })
    </script>
    <style type="text/css">
      p, div, ul, li {
      padding: 0px;
      margin: 0px;
      }
      .cls {
      color: #F60;
      }
    </style>
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
      <div class="row" style="padding:10px 0px 3px 0px;">
        <center><?php if(!empty($_GET['post_msg'])){ echo $_GET['post_msg']; }?></center>
        <div class="col-md-12" style="background-image:url(images/bg-b.jpg); margin-bottom:30px">
          <div style="font-size:16px; color:#F30; font-weight:bold; padding:10px" align="center">Publish Job Seeker Ad form</div>
        </div>
        <div class="col-md-12 col-md-offset-0">
          
           <form id="add_form" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
            <div class="form-group col-sm-12">
            <?php  
                 $q = $_GET['guid'];

                 $sth = $db->query ('SELECT * FROM `jobseeker_ads` WHERE `guid`="'.$q.'"');
                 $row = $sth->fetch();
                 //print_r($row);
                 ?>
              <div class="col-sm-4">
              <label  class="control-label">Job Category</label>
               
              <select class="form-control required" name="txtJobCategory" >
              <option value="">Select Job Category</option>
              <?php 
              $jth = $db->query("SELECT * FROM `job_category` ORDER BY `name` ASC");
              foreach($jth as $jrow){
              echo '<option '; if($jrow['name']==$row['txtJobCategory']){ echo "selected=''"; }echo '>'.$jrow['name'].'</option>';
              }
              ?>
              </select>
              </div>

            
              <div class="col-sm-4">
              <label class="control-label">Total Experience</label>
                </select>
                <select class="form-control required" name="txtJobExp">
                <option value="">Select Experience</option>
                <?php $eth = $db->query("SELECT * FROM `job_exp` ORDER BY `name` ASC");
                foreach($eth as $erow){
                echo '<option value="'.$erow['name'].'"'; if($erow['name']==$row['txtJobExp']){ echo "selected=''"; }echo ' >'.$erow['name'].'</option>';
                }?>
                </select>
              </div>
             
              <div class="col-sm-4">
              <label  class=" control-label">Job Status</label>
                
              <select class="form-control required" name="txtJobStatus" >
              <option value="" >Select Job Status</option>
              <option <?php if($row['txtJobStatus']=='Full Time'){ echo 'selected'; }?>>Full Time</option>
              <option <?php if($row['txtJobStatus']=='Part Time'){ echo 'selected'; }?>>Part Time</option>
              </select>
              </div>
                </div>
                <div class="form-group col-sm-12">
              <div class="col-sm-4">
              <label  class="control-label">Full Name</label>
                <input type="text" class="form-control required" name="txtName" value="<?php echo $row['txtName']?>" placeholder="Full Name">
              </div>
              <div class="col-sm-4">
              <label  class="control-label">Date of Birth</label>
               <input type="text" class="form-control required datepicker" value="<?php echo $row['txtDob']?>" name="txtDob" placeholder="Date of Birth" autocomplete="off">
                <!-- <input type="text" class="form-control required " name="txtDob" placeholder="DD/MM/YYYY"> -->
              </div>
              <div class="col-sm-4">
              <label  class="control-label">Marital Status</label>
               <select class="form-control required" name="txtMStatus" >
              <option value="">Select</option>
              <option <?php if($row['txtMStatus']=='Single'){ echo 'selected'; }?>>Single</option>
              <option <?php if($row['txtMStatus']=='Married'){ echo 'selected'; }?>>Married</option>
              </select>
              </div>
            </div>
           
           
          
            <div class="form-group col-sm-12">
             <div class="col-sm-4">
              <label  class="control-label">Address with Pin</label>
                <textarea class="form-control required"  maxlength="100" name="txtAddress" placeholder="Address with Pin" rows="1"><?php echo $row['txtAddress']?></textarea>
              </div>
            
              <div class="col-sm-4">
              <label  class="control-label">City</label>
              <input type="text"  readonly class="form-control " name="txtCity"  value="<?php echo $_COOKIE['areaname']?>" placeholder="City" />
              </div>
              <div class="col-sm-4">
              <label  class="control-label">Locality</label>
              
              <select class="form-control required" name="txtLocation" >
              <option value="" >Locality of Residence</option>
              <?php $cth = $db->query("SELECT a.name FROM `areas` a, `cities` c WHERE c.name='".$row['txtCity']."' AND a.sid=c.guid ORDER BY name ASC");
              foreach($cth as $crow){
              echo '<option '; if($crow['name']==$row['txtLocation']){ echo "selected=''"; }echo ' >'.$crow['name'].'</option>';
              }
              ?>
              </select>
              
               </div>
               <div class="form-group col-sm-12">
                </div>
              <div class="col-sm-4">
              <label  class="control-label">Phone No. 1</label>
                <input type="text" class="form-control number required" minlength="10" maxlength="10" value="<?php echo $row['txtMobile'];?>"  name="txtMobile" id="txtMobile" autocomplete="off" placeholder="Phone No. 1" />
                <span id="span4"></span>
              </div>
            
              
              <div class="col-sm-4">
              <label  class="control-label">Phone No. 2</label>
                <input type="text" class="form-control" minlength="10" maxlength="10" name="txtAMobile" value="<?php echo $row['txtAMobile'];?>" placeholder="Phone No. 2" />
              </div>
             
        
              <div class="col-sm-4">
              <label  class="control-label">Email-id</label>
                <input type="email" class="form-control email required" name="txtEmail" value="<?php echo $row['txtEmail'];?>"  placeholder="Email-id" autocomplete="off" />
              </div>

             
             
             
           
            <div class=" col-sm-12">

            <table class="table" id="dynamic_field">
           
			        <tr>
              <?php 
              $m = $db->query("SELECT * FROM  `jobseeker_ads_qualification` WHERE  js_id='$q'"); 
              while($z = $m->fetch()){
              $tth = $db->query ("SELECT * FROM `qualification` WHERE `guid` = $z[3]");
              $trow = $tth-> fetch(); 
              $tthd = $db->query ("SELECT * FROM `specialisation` WHERE `guid` = $z[4]");
              $tsugu = $tthd-> fetch(); 
              //print_r($tsugu);exit;
              ?>
              <div class="col-sm-3">
              <td> 
                <label  class="control-label">Qualification</label>
                  <select class="form-control required super"  id="cid" readonly >
                  <option value="">Select Qualifications</option>
                  <?php $jth = $db->query("SELECT * FROM `qualification` ORDER BY `name` ASC");
                  foreach($jth as $jrow){
                  echo '<option '; if($jrow['guid']==$z[3]){ echo "selected=''"; }echo '>'.$jrow['name'].'</option>';
                  }
                  ?>
                  </select>
                  </td>

              </div>
                <div class="col-sm-3">
                <td>
                  <label  class="control-label">Specialisation</label>
                  <!-- <select class="form-control required area" name="specialisation[]" id="aid" required>
                    <option value="">Select Specialisation</option>
                   
                  </select> -->
                  <input type="text" class="form-control required" readonly  value="<?php echo $tsugu[2];?>" placeholder="Specialisation" autocomplete="off"/>
                </td>
              </div>
							<div class="col-sm-1">
              <td><label  class="control-label">% Marks</label>
              <input type="number" class="form-control required"  name="marks[]" value="<?php echo $z['marks']?>" placeholder="% Marks" autocomplete="off"/>
              </td>
              </div>
							<div class="col-sm-2">
              <td> 
              <label  class="control-label">University</label>
              <input type="text" class="form-control required"  name="university[]" value="<?php echo $z['university']?>" placeholder="University Name" autocomplete="off"/>
              </td>
              </div>
			<div class="col-sm-1">
              <td>
              <label  class="control-label">Year of Passing</label>
              <input type="text" class="form-control required" maxlength="4"  name="yearpassing[]" value="<?php echo $z['yearpassing']?>" placeholder="Year of Passing" autocomplete="off"/>
                 <input type="hidden" class="form-control required"  name="guu_id[]" value="<?php echo $z['guid']?>"/>
              </td>
              </div>
              <div class="col-sm-1">
               <td> 
            
          
               </td>
              </div>
							</tr>
              <?php } ?>
						</table>
						 <button type="button" name="add" id="add" class="btn btn-success"><span>&#43;</span></button>





            
            </div>
		
            
            <div class="form-group col-sm-12">
             
            <div class="col-sm-3">
              <label  class="control-label">Desired Location</label>
               
                <select class="form-control required" name="txtDesiredLocation">
                  <option value="">Select Desired Location</option>
                  <?php $cth1 = $db->query("SELECT * FROM `desired_location` ORDER BY name ASC");
                    foreach($cth1 as $crow1){ ?>
                     <option  <?php if($crow1['name']==$row['txtDesiredLocation']) { echo 'Selected'; }  ?> >  <?=$crow1['name']; ?> </option>

                    <?php  }?>
                    
                </select>
              
            </div>
            

              <div class="col-sm-3">
              <label  class="control-label required">Skills </label>
              <select class="SlectBox form-control" multiple="multiple required" name="txtSkills[]" >
                <?php $citt = $db->query("SELECT * FROM `skills` $srr ORDER BY `name` ASC");
                  while($ciroww = $citt->fetch()){ ?>
                <option value="<?php echo $ciroww['name'] ?>" ><?php echo $ciroww['name'] ?></option>
                <?php } ?>
              </select>
			  
              </div>
              <div class="col-sm-3">
              <label  class="control-label">View Skills </label>
                <input type="text" class="form-control" readonly value="<?php echo $row['txtSkills'];?>"   autocomplete="off" placeholder="Expected Salary" />
                <p style="color:red">Note: Please select all skills including updated once again</p>
              </div>
              <div class="col-sm-3">
              <label  class="control-label">Expected Salary</label>
                <input type="text" class="form-control required" value="<?php echo $row['txtExpSalary'];?>"  name="txtExpSalary" autocomplete="off" placeholder="Expected Salary" />
              </div>
             
            
            </div>
             
              <div class="form-group col-sm-12">

              <div class="col-sm-3">
              <label  class="control-label">Additional Information</label>
                <textarea class="form-control required" name="txtAddinformation" placeholder="Additional Information you wish to provide" rows="1"><?php echo $row['txtAddinformation'];?></textarea>
              </div>
              <div class="col-sm-3">
              <label  class="control-label">Upload Recent Photo</label>
                <input type="file" class="form-control" name="image1" />
                  <?php if(!empty($row['image1'])){?>
                  <img src="adminupload/<?php echo $row['image1'] ?>" alt="" class="img-thumbnail" width="50%"/>
                  <?php } ?>
              </div>
              <div class="col-sm-3">
              <label  class="control-label">Upload Resume in doc, pdf</label>
                <input type="file" class="form-control" name="image2" />
              <?php if(!empty($row['image2'])){?>
              <a href="adminupload/<?php echo $row['image2'] ?>" target="_blank" >View</a>
              <?php } ?>
              </div>
           
           
           
              
              <div class="col-sm-3">
                  <label  class="control-label">Upload Video Resume</label>
                <input type="file" class="form-control" name="image3" />
                <p class="help-block"><small>(Maximum video size 20MB only)</small></p>
                <?php if(!empty($row['image3'])){?>
                <a href="adminupload/<?php echo $row['image3'] ?>" target="_blank" >View</a>
                <?php } ?>
              </div>
               </div>
            </div>
	
			
            <div class="form-group">
              <div class="col-sm-offset-5 col-sm-6">
              <input type="hidden" class="form-control required"  name="guid" value="<?php echo $row['guid']?>" placeholder="Year of Passing" autocomplete="off"/>
                <button type="submit" name="submit" value="updateJobSeeker" class="btn btn-info">Submit</button>
              </div>
            </div>
          </form>
          
          
          
        </div>
        <div class="clearfix"></div>
      </div>
      <?php include("footer.php") ?>
    </div>
    <script src="js/bootstrap.min.js"></script> 
    <!-- Modal -->
   </body>
  <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
  <script>
    $(document).ready(function(){ 
     $(".datepicker").datepicker({format: "dd-mm-yyyy", autoclose: true});
     $("#add_form").validate({
         errorClass:'cls'
      });
     });
    
    function checkIt(evt) {
    evt = (evt) ? evt : window.event
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if(charCode > 31 && (charCode < 46 || charCode > 57)) {
        status = "This field accepts numbers only."
        return false
    } else if(charCode==47) {
        status = "This field accepts numbers only."
        return false
    }
    status = ""
    return true
    }
    
    
    
    $('#category').change(function(){
    var id= $(this).val();
    $.ajax({
    type:"post",
    url:"ajaxReq2.php",
    data:"cid="+id+"&action=fetchexp5",
     success:function(response){
      $('#sub_category').html(response);
    return true;
    }
    });
    });
    
    $('.super').change(function(){
    var cid= $(this).val();
    $.ajax({
    type:"post",
    url:"ajaxReq2.php",
    data:"cid="+cid+"&action=fetchexp1",
     success:function(response){
      $('.area').html(response);
    return true;
    }
    });
    });
    
    
    
    $(document).ready(function(){
	var i=1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td> <select class="form-control required quali" name="txtEducation[]" id="quali_'+i+'" ><option value="">Select Qualifications</option><?php $sth = $db->query ("SELECT * FROM `qualification` order by name asc"); while($row = $sth->fetch()) { echo '<option value='.$row[0].'>'.$row['name'].'</option>'; } ?></select></td><td> <select class="form-control required spec" name="specialisation[]" id="spec_'+i+'" required><option value="">Select Specialisation</option></select></td> <td><input type="number" name="marks[]" placeholder="% Marks" class="form-control name_list" /></td><td><input type="text" name="university[]" placeholder="University Name" class="form-control name_list" /></td><td><input type="text" maxlength="4" name="yearpassing[]" placeholder="Year of Passing" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	
	$('#quali_'+i).change(function(){
     // alert('hi');
    var cid = $(this).val();
   //console.log(cid);
    $.ajax({
    type:"post",
    url:"ajaxReq2.php",
    data:"cid="+cid+"&action=fetchexp1",
     success:function(response){
         //console.log(i);
      $('#spec_'+i).html(response);
    return true;
    }
    });
    });
	    
	    
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
});



  

  </script> 
</html>