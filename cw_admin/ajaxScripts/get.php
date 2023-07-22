<?php ob_start(); error_reporting(0);
require "../lib/config.php";
extract($_POST);
$qs=stripslashes($_POST['qs']);
$bth = $db->query("SELECT `guid` FROM `user_profile` WHERE `txtEmail`='$qs'");
$count = $bth->rowCount();
echo $count; exit;
?>

