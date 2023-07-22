<?php ob_start();
extract($_POST);
extract($_GET);
require "../lib/config.php";
?>
<h5>State</h5>
<option value="">Select State</option>
<?php 
$sth = $db->query ("SELECT s.name FROM `states` s, `locations` l WHERE l.name = '".$_GET['cid']."' AND l.guid=s.cid");
while($row = $sth->fetch()) { ?>
<option><?php echo $row[0]; ?></option>
<?php } ?>
