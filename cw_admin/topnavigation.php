<nav class="navbar-top" role="navigation">
					<!-- BEGIN BRAND HEADING -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".top-collapse">
							<i class="fa fa-bars"></i>
						</button>
						<div class="navbar-brand" style="padding:0px 0px 0px 0px !important; ">
							<a href="<?php echo URL; ?>home.php">
								<img src="<?php echo URL; ?>assets/images/logo.png" alt="logo" class="img-responsive"/>
							</a>
						</div>
					</div>
					<!-- END BRAND HEADING -->
					<div class="nav-top">
						<!-- BEGIN RIGHT SIDE DROPDOWN BUTTONS -->
							<ul class="nav navbar-right">
								<li class="dropdown">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
										<i class="fa fa-bars"></i>
									</button>
								</li>
								<li class="dropdown user-box">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<!--<img class="img-rectangle" src="<?php //echo URL; ?>assets/images/admin-logo.png" alt="">--> <span class="user-info"><?php if($_SESSION['adc_loginRole']=='superadmin') { echo "AdsChronicle" ; } else { echo $_SESSION['adc_loginRole'];  }?> </span> <b class="caret"></b>
									</a>
										<ul class="dropdown-menu dropdown-user">
											<li>
												<a href="changepassword.php">
													<i class="fa fa-lock"></i> Change Password
												</a>
											</li>
											<li>
												<a href="changeemail.php">
													<i class="fa fa-envelope"></i> Change Email
												</a>
											</li>
											<li>
												<a href="<?php echo URL; ?>logout.php">
													<i class="fa fa-power-off"></i> Logout
												</a>
											</li>
										</ul>
								</li>
							</ul>
						<!-- END TOP MENU -->
						
					</div><!-- /.nav-top -->
				</nav>