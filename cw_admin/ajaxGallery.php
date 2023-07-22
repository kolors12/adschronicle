<?php ob_start(); error_reporting(0);
require "lib/path.php";
require "lib/config.php";
require "lib/secure.php";
extract($_POST);
if(isset($_POST) && $_POST['action']=='fetchexp') {
    $id = stripslashes($_POST['guid']);	
	$cth = $db->query ("SELECT * FROM `add_services` WHERE `guid`='$id'"); 
    $row = $cth->fetch();
    echo '<div class="row">';
    for($i=0;$i<4;$i++){
        $j = $i+1;
        if($j!=2){
            if(!empty($row['images'.$j])){
                if($j==3){
                  echo '<div class="col-sm-3"><a href="../adminupload/'.$row['images'.$j].'" target="_blank">Download Brochure/Bio data</a></div>';
                } else {
                  echo '<div class="col-sm-3"><img src="../adminupload/'.$row['images'.$j].'" class="img-thumbnail" alt=""/></div>';
                }
            } else {
             echo '<div class="col-sm-3"><h4 style="color:red">No Preview Avialble</h4></div>';
                
            }
        }
    }
    for($k=0;$k<5;$k++){
        $l = $k+21;
            if(!empty($row['images'.$l])){
                  echo '<div class="col-sm-3"><img src="../adminupload/'.$row['images'.$l].'" class="img-thumbnail" alt=""/></div>';
            } else {
             echo '<div class="col-sm-3"><h4 style="color:red">No Preview Avialble</h4></div>';
                
            }
     }
    echo '</div>';
 } else if(isset($_POST) && $_POST['action']=='fetchexpm') {
    $id = stripslashes($_POST['guid']);	
	$cth = $db->query ("SELECT * FROM `matrimonial_ads` WHERE `guid`='$id'"); 
    $row = $cth->fetch();
    echo '<div class="row">';
    for($i=0;$i<3;$i++){
        $j = $i+1;
            if(!empty($row['image'.$j])){
                  echo '<div class="col-sm-3"><img src="../adminupload/'.$row['image'.$j].'" class="img-thumbnail" alt=""/></div>';
            } else {
             echo '<div class="col-sm-3"><h4 style="color:red">No Preview Avialble</h4></div>';
                
            }
    }
    
    echo '</div>';
 } 
