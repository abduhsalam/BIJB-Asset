<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>BIJB</title>
		
	<meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
	<link rel="icon" href="<?php echo base_url() ?>assets/images/bijb.jpg">
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui-1.10.3.custom.min.css" />	
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.gritter.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chosen.css" />

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font1.css" />  
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-responsive.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ace-skins.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datepicker.css" /> 
	
	
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/accounting.min.js"></script> 
	<script src="<?php echo base_url(); ?>assets/js/ace-elements.min.js"></script>  
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>
<div class="navbar">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a href="<?php echo base_url()?>#" class="brand">
				<small>
					<i class="icon-credit-card"></i>
					BIJB Information System
				</small>
			</a><!--/.brand-->

			<ul class="nav ace-nav pull-right">
				<li class="purple">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<i class="icon-bell-alt icon-animated-bell"></i>
						<span class="badge badge-important notif" id="notif_counter"></span>

					</a>
					<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-closer" id="notifArea">
						<li class="nav-header">
							<i class="icon-warning-sign"></i>
							Notifications
						</li>
						<li id="notif_text">
							<a href="#">
								<div class="clearfix">
									<span class="pull-left">
										<i class="btn btn-mini no-hover btn-info icon-fighter-jet"></i>
										<span>Nama Notif</span>
									</span>
									<span class="pull-right badge badge-info">+0</span>
								</div>
							</a>
						</li>
					</ul>
				</li>
				<li class="light-blue">
					<a data-toggle="dropdown" href="<?php echo base_url()?>#" class="dropdown-toggle">
						
						<span class="user-info">
							<small>Welcome,</small>
							<?php echo $this->session->userdata("user_login")?>
						</span>

						<i class="icon-caret-down"></i>
					</a>

					<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
	

						<li>
							<a href="<?php echo base_url()?>index.php/user/profile">
								<i class="icon-user"></i>
								Profile
							</a>
						</li>

						<li class="divider"></li>

						<li>
							<a href="<?php echo base_url()?>index.php/login/logout">
								<i class="icon-off"></i>
								Logout
							</a>
						</li>
					</ul>
				</li>
			</ul><!--/.ace-nav-->
		</div><!--/.container-fluid-->
	</div><!--/.navbar-inner-->
</div>