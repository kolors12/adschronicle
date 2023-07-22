<?php ob_start(); error_reporting(0);
session_start();
require "lib/path.php";
require "lib/config.php";
require "lib/title.php";
extract($_POST); 
extract($_GET);
if(isset($_POST) && $_POST['submit'] == 'Login')
{  
		//print_r($_POST); exit;
		$lusername = stripslashes($username);
		$lpassword = stripslashes($password);
		
                //echo "SELECT * FROM `login` WHERE `username` = '$lusername' AND `status` = 'Active'";
		$sth = $db->prepare("SELECT * FROM `login` WHERE BINARY `username` = '$lusername' AND `status` = 'Active'");
		$sth->execute();
		$row = $sth->fetch(PDO::FETCH_ASSOC);
		if(!empty($row['guid'])){
		   //print($row[username]); exit;
        //$encpassword = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($row['securitykey']), $lpassword, MCRYPT_MODE_CBC, md5(md5($row['securitykey']))));
		//echo $encpassword; exit;
		$bth = $db->prepare("SELECT * FROM login WHERE BINARY username = :username AND password = :password AND status = 'Active'");
            
		$bth->execute(array(':username' => $lusername, ':password' => $lpassword)); 

		$count = $bth->rowCount();

			if($count > 0 ) {
				//$data = $sth->fetchAll();
				//print_r($row); exit;
				session_start();
				$_SESSION['adc_authenticate'] = true;
				$_SESSION['adc_logInUser'] = $row['guid'];
				$_SESSION['adc_loginRole'] = $row['role'];
				header('location: '.URL.'home.php');
				}  else { 
				session_start();
				unset($_SESSION['adc_authenticate']);
				unset($_SESSION['adc_logInUser']);
				unset($_SESSION['adc_loginRole']);
				$post_msg= 'Username / password Mismatch';
				header('location: '.URL.'login.php?post_msg='.$post_msg);
				
			}
			 
		}  else { 
				session_start();
				unset($_SESSION['adc_authenticate']);
				unset($_SESSION['adc_logInUser']);
				unset($_SESSION['adc_loginRole']);
				$post_msg= 'Username / password Mismatch';
				header('location: '.URL.'login.php?post_msg='.$post_msg);
		
	}
}
if(isset($_POST) && $_POST['submit'] == 'Submit')
{
		//print_r($_POST); exit;
		$sth = $db->prepare("SELECT * FROM login WHERE BINARY username = '".$_POST['username']."' AND BINARY email = '$email'");
		$sth->execute();
		$row = $sth->fetch(PDO::FETCH_ASSOC);
		//print_r($row); exit;
		//$count = $sth->rowCount();
		if(!empty($row[guid])){
			//print($row[username]); exit;
  $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($row['securitykey']), base64_decode($row['password']), MCRYPT_MODE_CBC, md5(md5($row['securitykey']))), "\0");
  			$to=$row['email'];
			$subject=" Forgot Password Details from adschronicle.com";
			$message="Your Login Details\n
			Username  :  $row[username] \n
			Password  :  $decrypted 
			";

                  //echo $message;exit;


			$from = "no-reply@ adschronicle.com";
			$headers = "From:" . $from;
			mail($to,$subject,$message,$headers);
	$post_msg = 'Password Sent Successfully To Mail ID';	
	header('location:'.URL.'login.php?post_msg='.$post_msg);
		}else{
				$post_msg= 'Username / Email ID Mismatch';
				header('location: '.URL.'login.php?post_msg='.$post_msg);
		
	}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo TITLE; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo URL; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>assets/css/fonts.css">
	<link rel="stylesheet" href="<?php echo URL; ?>assets/font-awesome/css/font-awesome.min.css">
	
	<!-- PAGE LEVEL PLUGINS STYLES -->
	<!-- REQUIRE FOR SPEECH COMMANDS -->
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>assets/css/plugins/gritter/jquery.gritter.css" />	

    <!-- Tc core CSS -->
	<link id="qstyle" rel="stylesheet" href="<?php echo URL; ?>assets/css/themes/style.css">
	
	
    <!-- Add custom CSS here -->

	<!-- End custom CSS here -->
	
    <!--[if lt IE 9]>
    <script src="<?php echo URL; ?>assets/js/html5shiv.js"></script>
    <script src="<?php echo URL; ?>assets/js/respond.min.js"></script>
    <![endif]-->
	
  </head>

  <body class="login">
	<div id="wrapper">
			<!-- BEGIN MAIN PAGE CONTENT -->
			
			<div class="login-container" align="center">
				<h2>
					<a href="<?php echo URL; ?>login.php"><img src="<?php echo URL; ?>assets/images/logo.png" alt="logo" class="img-responsive"></a><!-- can use your logo-->
				</h2>
				<!-- BEGIN LOGIN BOX -->
				<div id="login-box" class="login-box visible">					
					
                    <?php if(!empty($post_msg)) { ?>
         <p class="bigger-110"> <font color="#FF0000"><?php echo $post_msg; ?></font> </p>
        <?php 
								}
								
								
								// $count;
								 ?>
                    <p class="bigger-110">
						<i class="fa fa-key"></i> Please Enter Your Information
					</p>
					
					<div class="hr hr-8 hr-double dotted"></div>
					
					<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<div class="form-group">
							<div class="input-icon right">
								<span class="fa fa-key text-gray"></span>
								<input type="text" class="form-control" name="username" placeholder="Username">
							</div>
						</div>
						<div class="form-group">
							<div class="input-icon right">
								<span class="fa fa-lock text-gray"></span>
								<input type="password" name="password" class="form-control"  placeholder="your password">
							</div>
						</div>
						<div class="tcb">
							<!--<label>
								<input type="checkbox" class="tc">
								<span class="labels"> Remember me</span>
							</label> -->
							<input type="submit" class="pull-right btn btn-primary" name="submit" value="Login"/>
							<div class="clearfix"></div>
						</div>				
						
					<!--	<div class="social-or-login">
							<span class="text-primary">Or Login Using</span>
						</div>
							
						<div class="space-4"></div>
						
						<div class="text-center">
							<a href="#" class="btn btn-twitter btn-sm btn-circle"><i class="fa fa-twitter icon-only bigger-130"></i></a>
							<a href="#" class="btn btn-googleplus btn-sm btn-circle"><i class="fa fa-google-plus icon-only bigger-130"></i></a>
							<a href="#" class="btn btn-facebook btn-sm btn-circle"><i class="fa fa-facebook icon-only bigger-130"></i></a>
						</div> -->

						<div class="footer-wrap">
							<span class="pull-left">
								<a href="#" onclick="show_box('forgot-box'); return false;"><i class="fa fa-angle-double-left"></i> Forgot password?</a>
							</span>
							
						<!--	<span class="pull-right">
								<a href="#" onclick="show_box('registration-box'); return false;">Register here <i class="fa fa-angle-double-right"></i></a>
							</span> -->
							
							<div class="clearfix"></div>
						</div>							
					</form>
				</div>
				<!-- END LOGIN BOX -->
				
				<!-- BEGIN FORGOT BOX -->
				<div id="forgot-box" class="login-box">				
					<p class="bigger-110">
						<i class="fa fa-key"></i> Retrieve Password
					</p>
					
					<div class="hr hr-8 hr-double dotted"></div>
					
					<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<div class="form-group">
							<div class="input-icon right">
								<span class="fa fa-envelope text-gray"></span>
                                <div class="form-group">
								<input type="text" class="form-control" name="username" required placeholder="User Name">
                                </div>
                                <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email ID" required>
                                </div>
								<span class="help-block">Enter your email and User Id to receive instructions</span>
							</div>
						</div>
						<input type="submit" name="submit" value="Submit" class="pull-right btn btn-danger">
						
						<div class="clearfix"></div>
						
						<div class="footer-wrap">
								<a href="#" onclick="show_box('login-box'); return false;">Back to login <i class="fa fa-angle-double-right"></i></a>
						</div>							
					</form>					
				
	 
    <!-- core JavaScript -->
    <script src="<?php echo URL; ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo URL; ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo URL; ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo URL; ?>assets/js/plugins/pace/pace.min.js"></script>
	
	<!-- PAGE LEVEL PLUGINS JS -->
	
    <!-- Themes Core Scripts -->	
	<script src="<?php echo URL; ?>assets/js/main.js"></script>

	<!-- REQUIRE FOR SPEECH COMMANDS -->
	<script src="<?php echo URL; ?>assets/js/speech-commands.js"></script>
	<script src="<?php echo URL; ?>assets/js/plugins/gritter/jquery.gritter.min.js"></script>	
	
	<!-- initial page level scripts for examples -->	
	<script type="text/javascript">
		function show_box(id) {
			jQuery('.login-box.visible').removeClass('visible');
			jQuery('#'+id).addClass('visible');
		}
	</script>
  </body>
</html>