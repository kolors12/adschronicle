<?php
error_reporting(0);
if(isset($_POST) && $_POST['submit']=='submit'){
	
	//echo"hai";
	
    unset($_POST['submit']);


	//$txtTo = $_POST['to_address'];


  $txtFrom = $_POST['tform'];
	$txtSubject = $_POST['interview'];
	$txtMessage = $_POST['message'];;
	$mobile = $_POST['mobile'];;
	
	
    $to =  $_POST['to_address'];

    $subject = $txtSubject;
    $message = "
    Hi,\n
    You have receive Message form AdsChronicle.com job seeker portal \n
    Request Details\n
    
    Message      : $txtMessage\n
    Mobile       : $mobile\n
    ";

    $from = " < ".$txtFrom." > ";
    $headers = "From: ".$from;

    if(mail($to,$subject,$message,$headers)){
  
      ?>
      <script>alert("Thankyou for submit"); window.location="search_seeker.php?txtJobCategory=<?php echo $_POST[txtJobCategory];?>&txtJobExp=<?php echo $_POST[txtJobExp];?>&txtJobStatus=<?php echo $_POST[txtJobStatus];?>&search=Search";</script>
      <?php }
      else
      {
     
      ?>
      <script>alert("Please try again"); window.location="search_seeker.php";</script>
      <?php }
      }
?>


<form class="form-horizontal" action="" method="post" onSubmit="return validate();">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">To</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="to_address" name="to_address" placeholder="elitefocus@yahoo.com">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label">From</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" id="from" name="tform" placeholder="Enter Your Email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label">Subject</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="interview" name="interview" placeholder="Call for Interview">
                </div>
              </div>
           <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label">Mobile No</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="jobMobile" name="mobile" placeholder="Mobile No">
                  <span id="span4"></span>

                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label">Message</label>
                <div class="col-sm-8">
                  <textarea class="form-control" rows="3" name="message" id="message" placeholder="Message"></textarea>
                </div>
              </div>
        <div class="form-group otp-block" style="display: none;">
                  <label class="col-sm-4 control-label">Enter OTP : </label>
                  <div class="col-sm-8">
                   <span class="success-text"></span>
                   <div class="clearfix"></div>
                    <input type="text" class="form-control number required" name="txtOTP" id="txtOtp" placeholder="Enter OTP Here" maxlength="4" minlength="4" /><br /><a href="javascript:;" style="margin-top:-17px;" class="pull-right text-info resend-code">resend?</a>
                    <span id="span3"></span>
                  </div>
                </div>
              <!--div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label">Address</label>
                <div class="col-sm-8">
                  <textarea class="form-control" rows="3" name="address" id="address" placeholder="Address"></textarea>
                </div>
              </div-->
<input type="hidden" name="txtJobCategory" value="<?php echo $_GET['txtJobCategory'];?>">
<input type="hidden" name="txtJobExp" value="<?php echo $_GET['txtJobExp'];?>">
<input type="hidden" name="txtJobStatus" value="<?php echo $_GET['txtJobStatus'];?>">
<input type="hidden" name="txtJobStatus" value="<?php echo $_GET['txtJobStatus'];?>">
<input type="hidden" name="search" value="Search">

              <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                  <button type="submit" name="submit" value="submit" class="btn btn-default submit-button">Send Mail</button> 
                </div>
              </div>
			  
			  
			  <script type ="text/javascript">
      function validate(){
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var numbers = /^[0-9]+$/;  
        var to_address = document.getElementById('to_address').value;
        var from = document.getElementById('from').value;
		var interview = document.getElementById('interview').value;
        var message = document.getElementById('message').value;
        var address = document.getElementById('address').value;
    //alert(message);




      if(to_address == ''){
            alert("Please select atleast one job seeker");
            document.getElementById('to_address').focus();
            
            return false;
        }


        if(to_address == ''){
            alert("Plase enter your email");
            document.getElementById('to_address').focus();
            
            return false;
        }
		 else if(from == ''){
            alert(" Plase enter your Email");
            document.getElementById('from').focus();
            return false;

        } else if(!filter.test(from)){
            
            alert("Enter valid email format");
            document.getElementById('from').focus();
            return false;
        } 
		 else if(interview == ''){
            alert("Plase enter your Subject");
            document.getElementById('interview').focus();
            
            return false;
        }
		else if(message == ''){
            alert("Plase enter your Message");
            document.getElementById('message').focus();
            
            return false;
        }
		
		else if(address == ''){
            alert("Plase enter your Address");
            document.getElementById('address').focus();
            
            return false;
        }
		
		
		
		
		
		
		
		
		
		else if(phone == ''){
            alert(" Plase enter your Phone Number");
            document.getElementById('phone').focus();
            return false;


       } else if(isNaN(phone)){
            
            alert("Enter valid number format");
            document.getElementById('phone').focus();
            return false;
      }
	   else if(phone.length !=10 ){
            
            alert("Enter 10 characters length");
            document.getElementById('phone').focus();
            return false;
        }
        
    else if(message ==''){
           alert("Plase enter your message");
            document.getElementById('message').focus();
            return false;
        } 
   
           
       
      }
    </script>