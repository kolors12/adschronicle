<?php ob_start(); error_reporting(0);
  require("cw_admin/lib/config.php");
  extract($_POST);
  $date = date("Y-m-d");
  $crr = '';
  $srr = '';
  if(!empty($_COOKIE['area'])){
      $crr = "AND `cid`='".$_COOKIE['area']."'";
      $srr = "WHERE `sid`='".$_COOKIE['area']."'";
  } 
  if(empty($_COOKIE['area'])){
  //echo $_COOKIE['area']; exit;
   $lth = $db->query("SELECT * FROM `cities` WHERE `name` LIKE '%hyderabad%'");
   if($lth->rowCount() > 0){ 
      $lrow = $lth->fetch();
      $date_of_expiry = time() + 60 * 60 * 1  ;
      setcookie( "area", $lrow['guid'], $date_of_expiry, "/" );
      setcookie( "areaname", $lrow['name'], $date_of_expiry, "/" );
      $crr = "AND `cid`='".$_COOKIE['area']."'";
      $srr = "WHERE `sid`='".$_COOKIE['area']."'";
      header('Location: '.$_SERVER['PHP_SELF']);
   } 
  }
  $clsth = $db->query ("SELECT * FROM `c_category` LIMIT 0,3");
  //$cl_row = $clsth->fetch();
  if(isset($_POST) && $_POST['submit'] == 'Submit'){
      //print_r($_POST); exit;
      //$filename = stripcslashes($_FILES['txtFile']['name']);
      if(!empty($_POST['txtName']) && !empty($_POST['txtMobile']) && !empty($_POST['txtEmail'])){
      	/*if(!empty($filename)) {
      		$image = time()."_".$filename;
      		$img_path="adminupload/".$image;
      		move_uploaded_file($_FILES['txtFile']['tmp_name'], $img_path);
      	} else {
      		$image='';	
      	} */
          $txtContent = str_replace("'","^^",$_POST['txtContent']);

          $txtContent = str_replace('"','~~',$txtContent);

		 //echo ("INSERT INTO `adds_requests`(`txtName`, `txtMobile`, `txtEmail`, `txtAdTitle`, `txtContent`,`txtC_Category`, `txtC_City`,  `txtMembership_no`,`adtype`, `date`) VALUES ('$txtName', '$txtMobile', '$txtEmail', '$txtAdTitle', '$txtContent', '$txtC_Category', '$txtC_City', '$txtMembership_no','$adtype', '$date')"; exit;
		  
		  
		  
          $sth = $db->query("INSERT INTO `adds_requests`(`txtName`, `txtMobile`, `txtEmail`, `txtAdTitle`, `txtContent`,`txtC_Category`, `txtC_City`,  `txtMembership_no`,`adtype`, `date`) VALUES ('$txtName', '$txtMobile', '$txtEmail', '$txtAdTitle', '$txtContent', '$txtC_Category', '$txtC_City', '$txtMembership_no','$adtype', '$date')");
        $insid = $db->lastInsertId(); 
          if($sth > 0){ ?>
		  
		  
		  
<script>alert("Thankyou for submitting your request"); window.location="add-packages.php?typeid=<?php echo $insid ?>";</script>
<?php }
  } else {?>
<script>alert("Please fill up all details"); window.location="index.php";</script>
<?php }
  }
  if(isset($_POST) && $_POST['submit_imageadd'] == 'Submit'){
      //print_r($_POST); exit;
      $filename = stripcslashes($_FILES['txtFile']['name']);
      if(!empty($_POST['txtName']) && !empty($_POST['txtMobile']) && !empty($_POST['txtEmail'])){
      	if(!empty($filename)) {
      		$image = time()."_".$filename;
      		$img_path="adminupload/".$image;
      		move_uploaded_file($_FILES['txtFile']['tmp_name'], $img_path);
      	} else {
      		$image='';	
      	} 
		
          $sth = $db->query("INSERT INTO `image_classifieds`(`txtName`, `txtMobile`, `txtEmail`, `txtAdTitle`, `txtFile`, `txtC_City`, `txtUrl`, `txtMembership_no`, `date`) VALUES ('$txtName', '$txtMobile', '$txtEmail', '$txtAdTitle', '$image', '$txtC_City', '$txtUrl', '$txtMembership_no','$date')");
          if($sth > 0){ ?>
<script>alert("Thankyou for submitting your request"); window.location="index.php";</script>
<?php }
  } else {?>
<script>alert("Please fill up all details"); window.location="index.php";</script>
<?php }
  }  /*$hth = $db->query("SELECT * FROM `banner`");
  $ba = '';
  while($hrow = $hth->fetch()){
      $ba.= "{src: "."adminupload/".$hrow['image']."}, ";
  }
  $ba;
  $baa = substr($ba,0,-1); */
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Ads Chronicle&reg;</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/my_style.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="js/crawler.js" type="text/javascript"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="jquery.sumoselect.js"></script>
    <link href="sumoselect.css" rel="stylesheet" />
    <script type="text/javascript">
      $(document).ready(function () {
          window.asd = $('.SlectBox').SumoSelect({ selectAll: true });
      });
      $(function () {
      $('[data-toggle="tooltip"]').tooltip()
      })
    </script>
    <style type="text/css">
      p, div, ul, li {
      padding: 0px;
      margin: 0px;
      }
      .cls {
      color: #F60;
      }
    </style>



<script type="text/javascript" src="https://cdn.ywxi.net/js/1.js" async></script>
  </head>
  <body style="background-color:#eee">
    <div class="container shadow"  style="background-color:#fff">
      <header>
        <?php include("header.php") ?>
        <div class="row" style="background-color:#01ADED; padding:5px 0px">
          <div class="col-md-1">
            <!-- Single button -->
            <div class="btn-group">
              <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:#01ADED; color:#fff; padding-left:0px"> <i class="glyphicon glyphicon-menu-hamburger"></i> <span class="caret"></span> </button>
              <ul class="dropdown-menu">
                <?php $ct = $db->query("SELECT * FROM `super_category` ORDER BY `name` ASC");
                  while($crow = $ct->fetch()){ ?>
                <li><a href="categories.php?category=<?php echo $crow['guid'] ?>"><?php echo $crow['name'] ?></a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <div class="col-md-2 padd0">
            <select class="form-control area">
              <option value="">Select City</option>
              <?php $cit = $db->query("SELECT * FROM `cities` ORDER BY `name` ASC");
                while($cirow = $cit->fetch()){ ?>
              <option value="<?php echo $cirow['guid'] ?>" <?php if(isset($_COOKIE) && $_COOKIE['area']==$cirow['guid']){ echo "selected"; } ?>><?php echo $cirow['name'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="col-md-3">
            <div style="padding-top:7px; color:#FFF">
              <?php if(isset($_COOKIE) && !empty($_COOKIE['areaname'])){ echo "Businesses in ".$_COOKIE['areaname']; } ?>
            </div>
          </div>
          <form method="post" action="search.php">
            <div class="col-md-2 p10x padd0">
              <input type="text" class="form-control" name="search_name" id="exampleInputEmail2"  placeholder="I am Looking for..." />
            </div>
            <div class="col-md-4">
              <select multiple="multiple" name="areas[]" class="SlectBox form-control">
                <?php $citt = $db->query("SELECT * FROM `areas` $srr ORDER BY `name` ASC");
                  while($ciroww = $citt->fetch()){ ?>
                <option value="<?php echo $ciroww['guid'] ?>" ><?php echo $ciroww['name'] ?></option>
                <?php } ?>
              </select>
              <div class="pull-right">
                <button type="submit" name="search" value="Search" style="width:100%" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> search</button>
              </div>
            </div>
          </form>
        </div>
      </header>
      <div class="row" style="padding:20px 0px 0px 0px;">
        <div class="col-md-3 ">
          <div style="padding:3px; border-radius:4px">
            <div align="center">
              <div data-toggle="tooltip" data-placement="right" title="These Ads are displayed under Classified advertisements" style="line-height:2.3">
                  
                <a href="#" data-toggle="modal" data-target="#myModalAD" data-backdrop="static" class="col-xs-12" style="background-color:#ED7601; text-transform:uppercase; text-decoration:none; color:#fff;"><small>Publish Classified TEXT AD</small></a> 
                <div class="clearfix"></div>
                <!--a href="#" data-toggle="modal" data-target="#myModalAD1" data-backdrop="static" class="col-xs-12" style="background-color:#03CF14; text-transform:uppercase; text-decoration:none; color:#fff;"><small>Publish Classified IMAGE AD</small></a> 
                <div class="clearfix"></div-->
                </div>
                <div data-toggle="tooltip" data-placement="right" title="These Ads are displayed under Category advertisements" style="line-height:2.3">
                <a href="catagory_ads_form.php"  class="col-xs-12" style="background-color:#DB0483;text-transform:uppercase; text-decoration:none; color:#fff;"><small> Publish Category Ad</small></a>
                <div class="clearfix"></div>
                </div>
                <div data-toggle="tooltip" data-placement="right" title="These Ads are displayed under Brides / Bride Grooms category" style="line-height:2.3">
                <a href="matrimonial_ad.php"  class="col-xs-12" style="background-color:#156ADF;text-transform:uppercase; text-decoration:none; color:#fff;"><small>Publish Matrimonial Ad</small></a>
                <div class="clearfix"></div>
                </div>
                <div data-toggle="tooltip" data-placement="right" title="These Ads are displayed under Job Seekers category" style="line-height:2.3">
<a href="job_seeker_ad.php"  class="col-xs-12" style="background-color:#0AD397; text-transform:uppercase; text-decoration:none; color:#fff;"><small>Publish Job Seeker Ad</small></a>
<div class="clearfix"></div>
              </div>
            </div>
          </div>
          <!--<a class="btn btn-info" style="margin-top:5px; margin-bottom:10px;" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Menu
            </a>
            <div class="collapse" id="collapseExample" style="margin-top:10px; z-index:99999999999">
            <div class="well">
              Categories Names
            </div>
            </div>--> 
        </div>
        <div class="col-md-6" >
          <div class="shadow1" style="padding:3px; border-radius:4px; background-color:#f5f5f5">
            <div align="center" style="line-height:1.8">
              <h4 style="font-size:16px"><a href="classified.php"><strong>CLASSIFIED ADVERTISEMENTS</strong></a></h4>
              <p>
                <?php $cls = ''; while($cl_row = $clsth->fetch()){ $cls.=$cl_row[1]." | "; } echo substr($cls,0,-3); ?>
              </p>
            </div>
          </div>
          <div class="clearfix"></div>
          <div style="padding-top:20px" align="center">
           <h5><strong style="color:#F37F03">S E A R C H</strong></h5>
          <a href="search_seeker.php" class="btn btn-info">Job Seekers</a> <a href="brides.php?searchby=bride" class="btn btn-success">Brides</a> <a href="brides.php?searchby=bridegroom" class="btn btn-primary">Bride Grooms</a>
          </div>
          
        </div>
        <div class="col-md-3"  >
          <div  style="padding:0px; border-radius:4px">
            <div style="line-height:1.5" align="center">
              <small><a href="franchise.php" style="padding-bottom:5px" class="change_coloraa" target="_blank">Resellers / Franchisees Invited</a></small><br>
              <div data-toggle="tooltip" data-placement="right" >
                
                <p style="padding:5px; font-size:12px; text-align:left; border:2px #C911BD solid">Make your AD Unique by adding Photos, Videos, Location Map, address, contacts, all other details, link to your website, deal of the day, offers...<br><br>

<strong>Job Seekers can upload their video Resumes</strong></p>
               
                
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12" style="padding-top:5px">
          <div class="col-md-12">
            <h5><strong style="color:#F37F03">HOT CATEGORIES</strong></h5>
          </div>
          <div class="col-md-12">
            <div class="row">
              <?php $ht = $db->query("SELECT * FROM `super_category` WHERE `hot`='YES' ORDER BY `name` ASC");
                while($hrow = $ht->fetch()){
                   $ath = $db->query("SELECT * FROM `add_services` WHERE `status`='Active' AND `category`='".$hrow['guid']."' $crr");
                   $acount = $ath->rowCount();
                ?>
              <div class="col-md-3 padd5">
                <div class="thumbnail padd5t">
                  <a style="text-decoration:none;" href="categories.php?category=<?php echo $hrow['guid'] ?>">
				  <?php if($hrow['icon']!=''){?>
                    <img src="adminupload/<?php echo $hrow['icon'] ?>" style="float:left; width:45px; height:45px; margin-right:15px;" class="" alt=""/>
				  <?php }?>
                    <p style="padding:15px 0px;"><?php echo $hrow['name']?> <span style="color:#eee">(<?php echo $acount ?>)</span></p>
                  </a>
                  <div class="clearfix"></div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12">
          <div class="col-md-12">
            <h5><strong style="color:#F37F03">FEATURED CATEGORIES</strong></h5>
          </div>
          <div class="col-md-12">
            <div class="row">
              <?php $ft = $db->query("SELECT * FROM `super_category` WHERE `featured`='YES' ORDER BY `name` ASC");
                while($frow = $ft->fetch()){
                   $fth = $db->query("SELECT * FROM `add_services` WHERE `status`='Active' AND `category`='".$frow['guid']."' $crr");
                   $fcount = $fth->rowCount();
                ?>
              <div class="col-md-3 padd5">
                <div class="thumbnail padd5t">
                  <a style="text-decoration:none;" href="categories.php?category=<?php echo $frow['guid'] ?>">
				  <?php if($frow['icon']!=''){?>
                    <img src="adminupload/<?php echo $frow['icon'] ?>" style="float:left; width:45px; height:45px; margin-right:15px;" class="" alt=""/>
				<?php }?>
                    <p style="padding-top:15px" class="textin"><?php echo $frow['name']?> <span style="color:#eee">(<?php echo $fcount ?>)</span></p>
                  </a>
                  <div class="clearfix"></div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12" style="padding-top:10px">
          <div id="scroller" class="thumbnail" style="padding:15px;">
            <script type="text/javascript">
              marqueeInit({
                  uniqueid: 'mycrawler',
                  style: {
                      'padding': '5px',
                      'width': '1170px'
                  },
                  inc: 8, //speed - pixel increment for each iteration of this marquee's movement
                  mouse: 'cursor driven', //mouseover behavior ('pause' 'cursor driven' or false)
                  moveatleast: 1,
                  neutral: 150,
                  savedirection: true
              });
            </script>
            <div class="col-md-12">
            <div class="marquee" id="mycrawler">
              <?php 
                $bth = $db->query ("SELECT * FROM bottom_adds WHERE cid='".$_COOKIE['area']."' ORDER BY guid DESC");
                $bcount = $bth->rowCount();
                if($bcount > 0) {
                 $m= 1;
                 while($brow = $bth->fetch()) { 
                    $bath = $db->query("SELECT add_title FROM add_services WHERE pid='".$brow['adv_id']."'");
                                $baarow = $bath->fetch(); 
                             ?>
              <a href="c_viewdetails.php?service=<?php echo $brow['adv_id']?>"><img src="adminupload/<?php echo $brow['image']?>" style="width:250px;height:150px !important;margin-right:5px; border:1px #5bc0de solid" alt=""/></a>
              <?php $m++; } }  else { echo "<label class='label label-danger ' style='width400px;'>No Ads found</label>";}?>
            </div>
            </div>

      <!--div class="col-md-12">
      <div class="marquee" id="mycrawler2">
              <?php 
                //$bth = $db->query ("SELECT * FROM add_services WHERE cid='".$_COOKIE['area']."' ORDER BY guid DESC");
                //$bcount = $bth->rowCount();
                //if($bcount > 0) {
                 //$m= 1;
                 //while($brow = $bth->fetch()) { 
                    $bath = $db->query("SELECT * FROM bottom_adds WHERE cid='".$_COOKIE['area']."' ORDER BY guid DESC");
                     
                    while($baarow = $bath->fetch()){ 
                             ?>
              
<img src="adminupload/<?php echo $baarow['image']?>"  style="width:200px;height:200px !important; border:1px #5bc0de solid" alt=""/>

<?php } ?>
            
            </div>
            </div--->
      <div class="clearfix"></div>
            <script type="text/javascript">
              marqueeInit({
                  uniqueid: 'mycrawler2',
                  style: {
                      'padding': '2px',
                      'width': '1170px',
                      'height': '180px'
                  },
                  inc: 5, //speed - pixel increment for each iteration of this marquee's movement
                  mouse: 'cursor driven', //mouseover behavior ('pause' 'cursor driven' or false)
                  moveatleast: 2,
                  neutral: 150,
                  savedirection: true,
                  random: true
              });
            </script> 
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      <?php include("footer.php") ?>
    </div>
    <script src="js/bootstrap.min.js"></script> 
    <!-- Modal -->
    <div class="modal fade" id="myModalAD" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="post" id="frm1" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel" style="color:#D10306">Publish your Classified TEXT AD</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-8 col-md-offset-2 im">
                  <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" placeholder="Full Name" class="form-control required" name="txtName"  />
                  </div>
                  <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                    <input type="text" placeholder="Mobile No" class="form-control number required" name="txtMobile" minlength="10" maxlength="16" />
                  </div>
                  <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input type="email" placeholder="EMail-id" class="form-control email required" name="txtEmail" />
                  </div>
                  <input type="hidden"  name="adtype" value="CLASSIFIED TEXT AD" />
                  
				  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                    <select class="form-control required" name="txtC_City">
                      <option value="">Select City</option>
                      <?php $citt = $db->query("SELECT * FROM `cities` ORDER BY `name` ASC");
                        while($ciroww = $citt->fetch()){ ?>
                      <option value="<?php echo $ciroww['guid'] ?>" <?php if(isset($_COOKIE) && $_COOKIE['area']==$ciroww['guid']){ echo "selected"; } ?>><?php echo $ciroww['name'] ?></option>
                      <?php } ?>
                    </select>
                    </div>
                   <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                   
					<select name="txtC_Category" id="country" class="form-control required">
                    <option value="">Select Classified Category</option>
                    <?php $cittt = $db->query("SELECT * FROM `cat` ORDER BY `name` ASC");
                        while($cltt = $cittt->fetch()){
                          echo '<option value="'.$cltt['guid'].'">'.$cltt['name'].'</option>';
                        }?>
                   </select>
                  </div>
                  
                  <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                   <select name="txtAdTitle" id="state" class="form-control required">
                  <option value="">Select Ad Title</option>
                  </select>
                    
                  </div>
                  <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                    <textarea class="form-control text required" id="txtContent" rows="5" name="txtContent" minlength="30" maxlength="400"  placeholder="Enter Ad Content" rows="2"></textarea>
                  </div>
                  <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                    <input type="text" placeholder="Enter Ad Agency's membership no" class="form-control required" name="txtMembership_no" />
                  </div>
                  <p class="help-block" style="top:-20px">If you are not an Agency enter SELF</p>
				   <div class="input-group">
              <div class="row">
              <div class="col-md-6">
                <div style="height: 34px; background: #F2F2F2;padding-top: 6px;" align="center">
				<?php session_start();$_SESSION['vcode']=rand(999,9999);echo $_SESSION['vcode'];?>
				<input type="hidden" name="captcha" id="captcha" value="<?php echo $_SESSION['vcode']; ?>">
				</div> 
              </div>
              <div class="col-md-6">
              <input type="text" name="textcaptcha" equalTo="#captcha" minlength="4" maxlength="4" placeholder="Captcha" class="form-control number required" />
              </div> 
              </div>
              </div>
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="submit" value="Submit" class="btn btn-info">Submit</button>
              <button type="reset" class="btn btn-default">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="myModalAD1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="post" id="frm2" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel" style="color:#045CC4">Publish your Classified IMAGE AD</h4>
          </div>
          <div class="modal-body">
          <div class="row">
          <div class="col-md-8 col-md-offset-2 im">
		   <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
          <select class="form-control required" name="txtC_City">
          <option value="">Select City</option>
          <?php $citt = $db->query("SELECT * FROM `cities` ORDER BY `name` ASC");
            while($ciroww = $citt->fetch()){ ?>
          <option value="<?php echo $ciroww['guid'] ?>" <?php if(isset($_COOKIE) && $_COOKIE['area']==$ciroww['guid']){ echo "selected"; } ?>><?php echo $ciroww['name'] ?></option>
          <?php } ?>
          </select>
          </div>
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input type="text" placeholder="Full Name" class="form-control required" name="txtName"  />
          </div>
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
          <input type="text" placeholder="Mobile No" class="form-control number required" name="txtMobile" minlength="10" maxlength="16" />
          </div>
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
          <input type="email" placeholder="EMail-id" class="form-control email required" name="txtEmail" />
          </div>
         
          <div class="form-group">
          <label for="txtFile">File Upload:</label>
          <input type="file" name="txtFile" class="form-control required" id="txtFile" />
          </div>
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
          <input type="text" placeholder="Enter Ad Title" class="form-control " name="txtAdTitle" />
          </div>
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
          <input type="text" placeholder="Enter web URL" class="form-control url " name="txtUrl" />
          </div>
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
          <input type="text" placeholder="Enter Ad Agency's membership no" class="form-control required" name="txtMembership_no" />
          </div>
          <p class="help-block" style="top:-20px">If you are not an Agency enter SELF</p>
          
          
             <div class="input-group">
              <div class="row">
              <div class="col-md-6">
                <div style="height: 34px; background: #F2F2F2;padding-top: 6px;" align="center">
				<?php session_start();$_SESSION['vcode']=rand(999,9999);echo $_SESSION['vcode'];?>
				<input type="hidden" name="captchaa" id="captchaa" value="<?php echo $_SESSION['vcode']; ?>">
				</div> 
              </div>
              <div class="col-md-6">
              <input type="text" name="textcaptchaa" equalTo="#captchaa" minlength="4" maxlength="4" placeholder="Captcha" class="form-control number required" />
              </div> 
              </div>
              </div>
          
          </div>
          </div>
          <div class="clearfix"></div>
          </div>
          <div class="modal-footer">
          <button type="submit" name="submit_imageadd" value="Submit" class="btn btn-info">Submit</button>
          <button type="reset" class="btn btn-default">Reset</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </body>
  <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
  
  <script>
    $(document).ready(function(){ 
     $("#frm1").validate({
         errorClass:'cls'
      });
    });    
    $(document).ready(function(){ 
     $("#frm2").validate({
         errorClass:'cls'
      });
    });    
    $(".area").change(function(){
        //alert("hai");
        var cid = $(this).val();
        if(cid!=''){
         window.location = "location.php?cid="+cid;
        }
    });
     $('#txtContent').on('keyup', function() {
        var maxWords = 50;
        var words = $(this).val().split(/\b[\s,\.-:;]*/);
        if (words.length > maxWords) {
            words.splice(maxWords);
            $(this).val(words.join(""));
            alert("You've reached the maximum allowed words. Extra words removed.");
        }
    });
  </script>

  <script type="text/javascript">
$(document).ready(function(){
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select Ad Title</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select Ad Title</option>');
            $('#city').html('<option value="">Select Ad Title</option>'); 
        }
    });
    
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select Ad Title</option>'); 
        }
    });
});
</script>
</html>