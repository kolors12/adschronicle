<?php ob_start(); error_reporting(0);

require "lib/path.php";

require "lib/config.php";

require "lib/secure.php";

extract($_POST);

if(isset($_POST) && $_POST['action']=='fetchexp') {

   $pid = stripslashes($_POST['pid']);	

	$cth = $db->query ("SELECT * FROM `subv` WHERE `sid`='$pid' "); ?>

   

    <select class="form-control" name="sid">

    <option value="">Select Title</option>

	<?php while($crow = $cth->fetch()) {  

      echo "<option value='".$crow[1]."'>".$crow[2]."</option>";

	} ?>

    </select>

<?php } exit;

 