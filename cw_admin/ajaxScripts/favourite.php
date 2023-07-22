<?php ob_start(); error_reporting(0);
extract($_POST);
require "../lib/config.php";
require "../lib/path.php";

if($exp==2) {
	
	$uth = $db->exec ("UPDATE `viewprofiles` SET `interest`='1',interest_detail='$detail' WHERE `guid`='".$_POST['gid']."'");
    
	$irow = $db->query("SELECT * FROM `viewprofiles` WHERE `guid`='".$_POST['gid']."'");
    
	$iirow = $irow->fetch();
	$rxpr = $db->query("SELECT * FROM `user_profile` WHERE `user_id`='".$iirow['userid']."'");
    
	$rpro = $rxpr->fetch();
	$expr = $db->query("SELECT * FROM `user_profile` WHERE `user_id`='".$iirow['refid']."'");
    
	$epro = $expr->fetch();
	$exr = $db->query("SELECT `userid` FROM `viewprofiles` WHERE `refid`='".$iirow['refid']."' AND `interest`='1'");
	include "../interest_receivedemail.php";
	include "../interest_expressedemail.php";
    echo "Expressed As Interest"; exit;

	
}


