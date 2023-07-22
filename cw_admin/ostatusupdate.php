<?php ob_start(); error_reporting(0);
require "lib/path.php";
require "lib/config.php";
require "lib/title.php";
require "lib/secure.php";
extract($_GET);
extract($_POST);
$date = date('Y-m-d');
if(isset($_POST) && $_POST['Submit']=="updatestatus") {
	$sth = $db->query("UPDATE `products` SET `status`='$status' WHERE `guid`='$guid'");
} else if(isset($_POST) && $_POST['Submit']=="updatereview") {
	$sth = $db->query("UPDATE `service_reviews` SET `status`='$status' WHERE `guid`='$guid'");
} else if(isset($_POST) && $_POST['Submit']=="updateorderstatus") {
	$sth = $db->query("UPDATE `orders` SET `status`='$status' WHERE `guid`='$guid'");
} 