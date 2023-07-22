<?php ob_start(); error_reporting(0);
require "../lib/config.php";
extract($_POST);
if(isset($_POST) && $_POST['action']=='request'){
 $cid = $_POST['cid']; 
 ?>
                 <option value=""> Select City </option>
                 <?php $cta = $db->query("SELECT * FROM `cities` WHERE `cid`='".$cid."'");
                   while($ctrow = $cta->fetch()){ ?>
                    <option><?php echo $ctrow['name'] ?></option>
                 <?php } 
 exit;
} 

?>

