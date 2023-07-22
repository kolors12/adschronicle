<?php ob_start();
 require_once("cw_admin/lib/config.php");
 $lth = $db->query("SELECT * FROM `cities` WHERE `guid`='".$_GET['cid']."'");
 if($lth->rowCount() > 0){
    $lrow = $lth->fetch();
    $date_of_expiry = time() + 60 * 60 * 1  ;
    setcookie( "area", $_GET['cid'], $date_of_expiry, "/" );
    setcookie( "areaname", $lrow['name'], $date_of_expiry, "/" );
    header("location:index.php");
 }   else {
    $date_of_expiry = time() + 60 * 60 * 1  ;
    setcookie( "area", "", $date_of_expiry, "/" );
    setcookie( "areaname","", $date_of_expiry, "/" );
    header("location:index.php");
   
}

?>