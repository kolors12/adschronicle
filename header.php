
<div class="row" style="padding:5px 0px 5px 0px">
  <div class="col-md-3 hidden-xs" align="center"> <a href="index.php"><img src="images/logo.png" class="img-responsive cen" style="padding-bottom:10px; padding-top:5px"  alt=""/></a> </div>
  <div class="col-xs-12 hidden-lg hidden-md hidden-sm" align="center"> <a href="index.php"><img src="images/adssmallogo.jpg" class="img-responsive cen" style="padding-bottom:10px; padding-top:5px"  alt=""/></a> </div>
  <div class="col-md-9 hidden-xs">
    <div class="row">
    <?php for($i=0; $i<6; $i++){
      $j = $i+1;    
    ?>
      <div class="col-md-4 padd5">
        <div id="myCarousel<?php echo $j ?>" class="carousel slide" data-ride="carousel"> <!-- Indicators --> <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
           <?php $tath = $db->query("SELECT * FROM `banner` WHERE `cid`='".$_COOKIE['area']."' AND `position`='$j'");
             if($tath->rowCount() > 0){
                $n = 1;
                while($ta_row = $tath->fetch()){
            ?>
            <div class="item <?php if($n==1){ echo "active"; }?>" > <a href="//<?php echo $ta_row['web_url']?>" target="_blank"><img src="adminupload/<?php echo $ta_row['image']?>" style="width:100%; height:60px" alt="1"/></a></div>
           <?php $n++; }
           } else {?> <div class="item active" style="border: 1px solid #000;"> <a href="#" target="_blank"><img src="images/no-add.jpg" style="width:100%; height:60px" alt="1"/></a></div> <?php }?> 
          </div>
          <?php if($tath->rowCount() > 0){?>
          <!-- Left and right controls --> <a class="left carousel-control" href="#myCarousel<?php echo $j ?>" role="button" data-slide="prev"> </a> <a class="right carousel-control" href="#myCarousel<?php echo $j ?>" role="button" data-slide="next"> </a> 
          <?php } ?>
          </div>
      </div>
    <?php } ?>
      
    </div>
  </div>
</div>
 