<?php $sths = $db->query ("SELECT * FROM `login` WHERE `guid` = '1'");
      $details = $sths-> fetch();?>
<nav class="navbar-side" role="navigation">
  <div class="navbar-collapse sidebar-collapse collapse"> 
    <!-- BEGIN SHORTCUT BUTTONS -->
    <div class="media"> </div>
    <!-- END SHORTCUT BUTTONS --> 
    <!-- BEGIN FIND MENU ITEM INPUT -->
    <div class="media-search">&nbsp; </div>
    <!-- END FIND MENU ITEM INPUT -->
    <ul id="side" class="nav navbar-nav side-nav">
      <!-- BEGIN SIDE NAV MENU --> 
      <!-- Navigation category -->
      <li>
        <h4>Navigation</h4>
      </li>
      <!-- END Navigation category -->
      <li> <a class="active" href="<?php echo URL; ?>home.php"> <i class="fa fa-dashboard"></i> Dashboard </a> </li>
      <li class="panel"> <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#forms1"> <i class="fa fa-cogs"></i> Banner Ads <span class="fa arrow"></span> </a>
        <ul class="collapse nav" id="forms1">
          <li> <a href="<?php echo URL; ?>banners.php"> <i class="fa fa-picture-o"></i> Top Banner Ads </a> </li>
          <li> <a href="<?php echo URL; ?>bottom_adds.php"> <i class="fa fa-picture-o"></i> Bottom Ads </a> </li>
        </ul>
      </li>
      <li class="panel"> <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#forms2"> <i class="fa fa-cogs"></i> Classified Ads <span class="fa arrow"></span> </a>
        <ul class="collapse nav" id="forms2">
      <li> <a href="<?php echo URL; ?>add_requests.php"> <i class="fa fa-dashboard"></i> Text Classified Ads </a> </li>
      <!--li> <a href="<?php echo URL; ?>image_classifieds.php"> <i class="fa fa-picture-o"></i> Image Classified Ads </a> </li--->
        </ul>
      </li>
      <li class="panel"> <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#forms3"> <i class="fa fa-cogs"></i> Categories <span class="fa arrow"></span> </a>
        <ul class="collapse nav" id="forms3">
          <li><a href="<?php echo URL; ?>category.php"><i class="glyphicon glyphicon-th-list"></i> Ads Categories </a></li>
        <!--  <li><a href="<?php echo URL; ?>c_category.php"><i class="glyphicon glyphicon-th-list"></i> Classified Categories </a></li>-->
          <li><a href="<?php echo URL; ?>category1.php"><i class="glyphicon glyphicon-th-list"></i> Classified Categories </a></li>
          <li><a href="<?php echo URL; ?>cities.php"> <i class="fa fa-map-marker"></i> Cities</a> </li>
          <li><a href="<?php echo URL; ?>packages.php"> <i class="fa fa-map-marker"></i> Ad's Package</a> </li>
        </ul>
      </li>
      <!--<li> <a href="<?php // echo URL; ?>classified_adds.php"> <i class="fa fa-picture-o"></i> Classified Category Ads </a> </li>-->
      </li>
      <!-- BEGIN COMPONENTS DROPDOWN -->
      <li><a href="<?php echo URL; ?>agencies.php"><i class="glyphicon glyphicon-th-list"></i> Agencies </a></li>
      <li><a href="<?php echo URL; ?>brides.php"><i class="glyphicon glyphicon-th-list"></i> Brides Search</a></li>
      <li> <a href="<?php echo URL; ?>franchise_requests.php"> <i class="fa fa-dashboard"></i> Reseller/Franchise Requests </a> </li>
      <li><a href="<?php echo URL; ?>services.php"> <i class="fa fa-dashboard"></i> View Category Ads</a> </li>
      <li><a href="<?php echo URL; ?>vochure_requests.php"> <i class="fa fa-dashboard"></i> Discount &amp; Vochures</a> </li>
      <li class="panel"> <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#forms12"> <i class="fa fa-cogs"></i> Matrimonial <span class="fa arrow"></span> </a>
        <ul class="collapse nav" id="forms12">
          <li><a href="<?php echo URL; ?>religions.php"><i class="glyphicon glyphicon-th-list"></i> Religions </a></li>
          <li><a href="<?php echo URL; ?>matrimonial_ads.php"><i class="glyphicon glyphicon-th-list"></i> Matrimonial Ads </a></li>
        </ul>
      </li>
      <li class="panel"> <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#forms123"> <i class="fa fa-cogs"></i> Job Seeker <span class="fa arrow"></span> </a>
        <ul class="collapse nav" id="forms123">
          <li><a href="<?php echo URL; ?>job_category.php"><i class="glyphicon glyphicon-th-list"></i> Job Categories </a></li>
          <li><a href="<?php echo URL; ?>job_exp.php"><i class="glyphicon glyphicon-th-list"></i> Experiences </a></li>
		  <li><a href="<?php echo URL; ?>Disered.php"><i class="glyphicon glyphicon-th-list"></i> Disered Locations</a></li>
           <li><a href="<?php echo URL; ?>jobseeker_ads.php"><i class="glyphicon glyphicon-th-list"></i> Job Seeker Ads </a></li>
           <li><a href="<?php echo URL; ?>qualification.php"><i class="glyphicon glyphicon-th-list"></i> Qualification </a></li>
           <li><a href="<?php echo URL; ?>skills.php"><i class="glyphicon glyphicon-th-list"></i> Skills </a></li>
       </ul>
      </li>
    </ul>
  </div>
  <!-- /.navbar-collapse --> 
</nav>