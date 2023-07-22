<?php ob_start(); error_reporting(0);
session_start();
require "../lib/config.php";
extract($_POST);
$qs=stripslashes($_POST['qs']);
$bth = $db->query("SELECT `guid` FROM `user_profile` WHERE `txtPhoneno`='$qs' AND `user_id`!='".$_SESSION['authUserId']."'");
$count = $bth->rowCount();
echo $count; exit;
?>

