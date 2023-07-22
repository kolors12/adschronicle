<?php ob_start(); error_reporting(0);
require "cw_admin/lib/config.php";
extract($_POST);
if(isset($_POST) && $_POST['action']=='fetchexp') {
    $cid = stripslashes($_POST['cid']);	
	$cth = $db->query ("SELECT * FROM `cities` WHERE `cid`='$cid' order by name asc"); 
?>
    <option value="">Select City</option>
	<?php while($crow = $cth->fetch()) {  
      echo "<option value='".$crow[2]."'>".$crow[2]."</option>";
	} 
 } 
else if(isset($_POST) && $_POST['action']=='fetchexp1') {
    $cid = stripslashes($_POST['cid']);	
	$cth = $db->query ("SELECT * FROM `areas` WHERE `sid`='$cid' order by name asc"); 
?>
    <option value="">Select Area</option>
	<?php while($crow = $cth->fetch()) {  
      echo "<option value='".$crow[0]."'>".$crow[2]."</option>";
	} 
 } 
else if(isset($_POST) && $_POST['action']=='fetchexp2') {
    $sid = stripslashes($_POST['sid']);	
    $mid = stripslashes($_POST['mid']);	
	$cth = $db->query ("SELECT * FROM `child_category` WHERE `sid`='$sid' AND `mid`='$mid'"); 
?>
    <option value="">Select Child Category</option>
	<?php while($crow = $cth->fetch()) {  
      echo "<option value='".$crow[0]."'>".$crow[3]."</option>";
	} 
 }
 else if(isset($_POST) && $_POST['action']=='fetchexp8') {
    $cid = stripslashes($_POST['cid']);	
    $category = stripslashes($_POST['id']);	
	$cth = $db->query ("SELECT * FROM `add_services` WHERE `cid`='$cid' AND `category`='$category'"); 
?>
    <option value="">Select Advertiser/Title</option>
	<?php while($crow = $cth->fetch()) {  
      echo "<option value='".$crow['pid']."'>".$crow['add_title']."</option>";
	} 
 } else if(isset($_POST) && $_POST['action']=='fetchsect') {
    $cid = stripslashes($_POST['cid']);	
    $mrow = $db->query ("SELECT * FROM `religions` WHERE `name`='$cid'")->fetch();
	$cth = $db->query ("SELECT * FROM `sects` WHERE `sid`='$mrow[0]' order by name asc"); 
?>
    <option value="">Select Sect</option>
    <option value="Null">Any</option>
	<?php while($crow = $cth->fetch()) {  
      echo "<option value='".$crow[2]."'>".$crow[2]."</option>";
	} 
 } 