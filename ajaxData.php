<?php

include('dbConfig.php');

if(isset($_POST["country_id"]) && !empty($_POST["country_id"])){
   
    $query = $db->query("SELECT * FROM subv WHERE sid = ".$_POST['country_id']."");
    
   
    $rowCount = $query->num_rows;
    
    
    if($rowCount > 0){
        echo '<option value="">Select Ad Title</option>';
        while($row = $query->fetch_assoc()){ 
		
		
            echo '<option value="'.$row['guid'].'">'.$row['name'].'</option>';
        }
    }else{
        echo '<option>"'.$row['sid'].'"</option>';
    }
}


?>