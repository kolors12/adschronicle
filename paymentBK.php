<?php ob_start(); error_reporting(0);
require("cw_admin/lib/config.php");
extract($_GET);
extract($_POST);
/*
if($_POST[adtype]==''){ 

 $row = $db->query("SELECT * FROM `adds_requests` WHERE `guid`='".$_POST[guid]."' ")->fetch();  
}

else if($_POST[adtype]==''){ 
    $row = $db->query("SELECT * FROM `add_services` WHERE `guid`='".$_POST[guid]."' ")->fetch();  
}


else if($_POST[adtype]==''){ 
    $row = $db->query("SELECT * FROM `matrimonial_ads` WHERE `guid`='".$_POST[guid]."' ")->fetch();  
}




else if($_POST[adtype]==''){ 
    $row = $db->query("SELECT * FROM `jobseeker_ads` WHERE `guid`='".$_POST[guid]."' ")->fetch();  
}

*/

?>
<html>
<head>
<title>Proceeding Order</title>
  </head>
  <body onLoad="document.ccavenue.submit()">
  Please wait.....
<form id="ccavenue"  name="ccavenue" method="post" action="ccavRequestHandler.php">
	<input type="hidden" name="tid" id="tid" value="<?php echo $_POST['tid'];?>" readonly />
						<input type="hidden" name="merchant_id" value="200719"/>
						<input type="hidden" name="order_id" value="<?php echo $_POST['guid'];?>"/>
						<input type="hidden" name="adtype" value="<?php echo $_POST['adtype']; ?>">

						<input type="hidden" name="amount" value="<?php echo $_POST['amount'];?>"/>
						<input type="hidden" name="currency" value="INR"/>
						<input type="hidden" name="redirect_url" value="https://adschronicle.com/thankyou.php?addtype=<?php echo $_POST['adtype']; ?>"/>
						<input type="hidden" name="cancel_url" value="https://adschronicle.com/thankyou.php?addtype=<?php echo $_POST['adtype']; ?>"/>
						<input type="hidden" name="language" value="EN"/>
<input type="hidden" name="billing_cust_name" value="name of user">
<input type="hidden" name="billing_cust_address" value="address of user">
<input type="hidden" name="billing_cust_country" value="user country">
<input type="hidden" name="billing_cust_state" value="state of user">
<input type="hidden" name="billing_cust_city" value="city">
<input type="hidden" name="billing_zip" value="zip/pin code">
<input type="hidden" name="billing_cust_tel" value="telphone no">
<input type="hidden" name="billing_cust_email" value="emailid">
<input type="hidden" name="delivery_cust_name" value="user name">
<input type="hidden" name="delivery_cust_address" value="delivering address">
<input type="hidden" name="delivery_cust_country" value="delivering country">
<input type="hidden" name="delivery_cust_state" value="delivering state">
<input type="hidden" name="delivery_cust_tel" value="telphone no">
<input type="hidden" name="delivery_cust_notes" value="Ad Packages">
<input type="hidden" name="Merchant_Param" value="">
<input type="hidden" name="billing_zip_code" value="zip/pin">
<input type="hidden" name="delivery_cust_city" value="city">

 </form>
  </body>
</html>