  <footer>
    <div class="row" style="background-color:#212121; color:#666; padding:15px 0px 15px 0px; ">
    
    <div class="col-md-12 hidden-lg hidden-md hidden-sm hidden-xs">
    <div class="row">
    <?php for($i=0; $i<6; $i++){
      $j = $i+1;    
    ?>
      <div class="col-md-4 padd5">
        <div id="myCarousel<?php echo $j ?>" class="carousel slide" data-ride="carousel"> <!-- Indicators --> <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
           <?php $tath = $db->query("SELECT * FROM `banner` WHERE `cid`='".$_COOKIE['area']."'");
             if($tath->rowCount() > 0){
                $n = 1;
                while($ta_row = $tath->fetch()){
            ?>
            <div class="item <?php if($n==1){ echo "active"; }?>" > <img src="adminupload/<?php echo $ta_row['image']?>" style="width:100%; height:60px" alt="1"/></div>
           <?php $n++; }
           } else {?> <div class="item active" style="border: 1px solid #000;"> <img src="images/no-add.jpg" style="width:100%; height:60px" alt="1"/></div> <?php }?> 
          </div>
          <?php if($tath->rowCount() > 0){?>
          <!-- Left and right controls --> <a class="left carousel-control" href="#myCarousel<?php echo $j ?>" role="button" data-slide="prev"> </a> <a class="right carousel-control" href="#myCarousel<?php echo $j ?>" role="button" data-slide="next"> </a> 
          <?php } ?>
          </div>
      </div>
    <?php } ?>
      
    </div>
  </div>
    
    
      <div class="col-md-12  hidden-xs">
        <div class="col-md-1 col-xs-6 padd5" align="center">
          <div class="th1"> <img src="images/jus.jpg" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Advocates</small></div>
        </div>
        <div class="col-md-1 col-xs-6 padd5" align="center">
          <div class="th1"> <img src="images/astr.jpg" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Astrology</small></div>
        </div>
        <div class="col-md-1 col-xs-6 padd5" align="center">
          <div class="th1"> <img src="images/apparel.jpg" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Apparels</small></div>
        </div>
        <div class="col-md-1 col-xs-6 padd5" align="center">
          <div class="th1"> <img src="images/brides.gif" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Brides</small></div>
        </div>
        <div class="col-md-1 col-xs-6 padd5" align="center">
          <div class="th1"> <img src="images/taxi.jpg" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Cabs</small></div>
        </div>
        <div class="col-md-1 col-xs-6 padd5" align="center">
          <div class="th1"> <img src="images/auto.jpg" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Clubs</small></div>
        </div>
        <div class="col-md-1 col-xs-6 padd5" align="center">
          <div class="th1"> <img src="images/mob.jpg" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Mobiles</small></div>
        </div>
        <div class="col-md-1 col-xs-6 padd5" align="center">
          <div class="th1"> <img src="images/travel4.jpg" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Travel</small></div>
        </div>
        <div class="col-md-1 col-xs-6 padd5" align="center">
          <div class="th1"> <img src="images/security.jpg" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Security</small></div>
        </div>
        <div class="col-md-1 col-xs-6 padd5" align="center">
          <div class="th1"> <img src="images/cons.jpg" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Consultants</small></div>
        </div>
        <div class="col-md-1 col-xs-6 padd5" align="center">
          <div class="th1"> <img src="images/pack3.jpg" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Packaging</small></div>
        </div>
        <div class="col-md-1 col-xs-6 padd5" align="center">
          <div class="th1"> <img src="images/restau.gif" style="width:100%; height:50px"  alt=""/> </div>
          <div><small>Restaurants</small></div>
        </div>
      </div>
      <div class="clearfix"></div>
     
      </div>
      <div class="row" style="background-color:#CCC; color:#666; padding:15px 0px 15px 0px; ">
      
      <div class="col-md-12" align="center">
        <p style="padding-bottom:10px"><a href="index.php">Home</a> | <a href="aboutus.html">About us</a> | <a href="advetise.html">Advetise with us</a> | <a href="terms_conditions.html">Terms & Conditions</a> | <a href="customer_care.html">Customer Care</a> | <a href="payment_page.php">Payment</a> | <a href="contactus.html">Contact us</a> | <a href="franchise.php">Franchisees/Resellers Invited</a></p>
        <small style="color:#444">@ 2015 All rights Reserved, <a href="http://adschronicle.com/" style="color:#666">Ads Chronicle</a> is a Registered Trademark. Imitation of design and functionality will attract legal action.</small> </div>
    </div>
  </footer>