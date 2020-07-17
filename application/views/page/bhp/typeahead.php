<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>#</title>
		
	<meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
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
	
	<style>
	.typeahead { z-index: 1051 !important; }
	</style>
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
					#
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
<div class="main-container container-fluid">
	<a class="menu-toggler" id="menu-toggler" href="#">
		<span class="menu-text"></span>
	</a>
	<div class="sidebar" id="sidebar">
	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<button class="btn btn-small btn-success">
				<i class="icon-signal"></i>
			</button>

			<button class="btn btn-small btn-info">
				<i class="icon-pencil"></i>
			</button>

			<button class="btn btn-small btn-warning">
				<i class="icon-group"></i>
			</button>

			<button class="btn btn-small btn-danger">
				<i class="icon-cogs"></i>
			</button>
		</div>

		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span>

			<span class="btn btn-info"></span>

			<span class="btn btn-warning"></span>

			<span class="btn btn-danger"></span>
		</div>
	</div>
	<!--#sidebar-shortcuts-->
	<?php // $menu = explode("-",$data['activeMenu']); $mainMenu = $menu[0]; $subMenu=$menu[1]; ?>
	<ul class="nav nav-list"> 
		<li class="open">
			<a class="dropdown-toggle" href="#">
				<i class="icon-desktop"></i>
				<span class="menu-text"> # </span>
				<b class="arrow icon-angle-down"></b>
			</a>
			<ul class="submenu" style="display: block;">
				<li>
					<a href="<?= base_url(); ?>Asset/pengajuan">
						<i class="icon-double-angle-right"></i>
						#
					</a>
				</li>
			 
			</ul>
		</li>
		 
	</ul><!--/.nav-list-->

	<div class="sidebar-collapse" id="sidebar-collapse">
		<i class="icon-double-angle-left"></i>
	</div>
</div>

	
	<div class="main-content">
		<div class="breadcrumbs" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home home-icon"></i>
					<a href="#">Home</a>

					<span class="divider">
						<i class="icon-angle-right arrow-icon"></i>
					</span>
				</li>
				<li class="active">Tables</li>
			</ul><!--.breadcrumb-->

		</div>

		<div class="page-content">	 
			<div class="page-header position-relative">
				<h1>
					#
					<small>
						<i class="icon-double-angle-right"></i>
						#
					</small>
				</h1>
			</div><!--/.page-header-->
			<div class="row-fluid">
				<div class="span12">
					<input type="text" id="typeahead">
					<input type="text" id="idtypehead">
				</div>
			</div>
		</div><!--/.page-content--> 
	</div><!--/.main-content-->
</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>   
		
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?php echo base_url(); ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.3.custom.min.js"></script>  
		<script src="<?php echo base_url(); ?>assets/js/jquery.gritter.min.js"></script> 
		<script src="<?php echo base_url(); ?>assets/js/ace-elements.min.js"></script> 

		<!--page specific plugin scripts-->

		<script src="<?php echo base_url(); ?>assets/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/chosen.jquery.min.js"></script>		 
		<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/additional-methods.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.price_format.2.0.min.js"></script> 
		<script src="<?php echo base_url(); ?>assets/js/typeahead/bootstrap3-typeahead.js"></script> 
		 		
		<script type="text/javascript">
			$(document).ready(function () {  
				var $input = $("#typeahead");
				$input.typeahead({
				 
				  source: function( request, response ) {
						$.ajax({
							url: "<?php echo base_url(); ?>Bhp/get_user",
							type: "post",
							dataType: "json",
							data: {"request":request},
							success: function(data){ 
								response(data); 
							}
						});
					},
				  autoSelect: true,
				  minLength: 2,
				  updater:function (item) {
					console.log(item.id);
					//item = selected item
					//do your stuff.

					//dont forget to return the item to reflect them into input
					// return item;
					}
				}); 
				
				
				$('.date-picker').datepicker(
					'update', new Date()).on('changeDate', function(ev){
						$(this).datepicker('hide');
					}
				).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
				$('.chzn-select').chosen(); 
				$('.uppercase').keyup(function(){
					this.value = this.value.toUpperCase();
				});
				$('.number').priceFormat({prefix: '',centsLimit: '',thousandsSeparator: ''});
				$('.price').priceFormat({prefix: '',centsLimit: '',thousandsSeparator: ','});  
			});
			
			function validateNumber(event) {
			var key = window.event ? event.keyCode : event.which;

				if (event.keyCode == 8 || event.keyCode == 46
				 || event.keyCode == 37 || event.keyCode == 39 || key == 46) {
					return true;
				}
				else if ( key < 48 || key > 57 ) {
					return false;
				}
				else return true;
			};
		</script>
	 
	</body>
</html>