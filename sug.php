<?php 

extract($_POST);
$stremail = "admin@adschronicle.com,elitefocus@gmail.com";						  
$to = $stremail;    
$subject = "Suggestions form details";    
$message = " 
<html> 
<body>
   <table style='border: 2px solid #06F;padding:10px;border-radius:10px;'>
	  <tr>
		  <td width='500'>
			  <div class='maindiv'>
				 
				 <p>Hi, your requested details are,</p>
				 <p>Name          : ".ucfirst($fname)."</p>
				 <p>Email         : $email </p>
				 <p>Phone No. 	  : $phone </p>
				 <p>Enquiry      : $msg </p>
				 
			  </div>
		  </td>
	  </tr>
  </table>
</body>
</html>";

$headers .= "From: adschronicle.com<no-reply@adschronicle.com>\r\n"; 			
$headers .= "Content-type: text/html\r\n";	
//echo $message;exit;		
if(mail($to, $subject, $message, $headers)){
	
	echo "<script>alert('Thank you, Our incharge will contact you soon');window.location='contactus.php';</script>";

	} else {
	
	echo "<script>alert('Sorry...please try again');window.location='contactus.php';</script>";
}	
				

?>