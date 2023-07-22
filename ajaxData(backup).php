<?php

include('dbConfig.php');

if(isset($_POST["country_id"]) && !empty($_POST["country_id"])){
   
    $query = $db->query("SELECT * FROM subv WHERE sid = ".$_POST['country_id']."");
    
   
    $rowCount = $query->num_rows;
    
    
    if($rowCount > 0){
        echo '<option >Select Ad Title</option>';
        while($row = $query->fetch_assoc()){ 
		
		
            echo '<option value="'.$row['guid'].'">'.$row['name'].'</option>';
        }
    }else{
        echo '<option>"'.$row['guid'].'"</option>';
    }
}

if(isset($_POST["state_id"]) && !empty($_POST["state_id"])){
    
    $query = $db->query("SELECT * FROM cat WHERE state_id = ".$_POST['state_id']." AND status = 1 ORDER BY city_name ASC");
    
  
    $rowCount = $query->num_rows;
    
 
    if($rowCount > 0){
        echo '<option >Select Ad Title</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
        }
    }else{
        echo '<option >Ad Title not available</option>';
    }
}
?>