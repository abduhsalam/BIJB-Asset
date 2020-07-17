<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Login Page - Ace Admin</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" /> 
		<link rel="stylesheet" href="<?php echo base_url()?>assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url()?>assets/font/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="<?php echo base_url()?>assets/js/html5shiv.min.js"></script>
		<script src="<?php echo base_url()?>assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-desktop blue"></i>
									<span class="red">BIJB</span>
									<span class="white" id="id-text2">Application</span>
								</h1>
								<br><br>
								
								<style type="text/css">

.numbers {

    border-style: ridge;    /* options are none, dotted, dashed, solid, double, groove, ridge, inset, outset */

    border-width: 0px;



    padding: 0px 0px;

    width: 95px;

    text-align: center;

    font-family: Arial;

    font-size: 58px;

    font-weight: bold;    /* options are normal, bold, bolder, lighter */

    font-style: normal;   /* options are normal or italic */

    color: #ee4d00;       /* change color using the hexadecimal color codes for HTML */

}

.title {    /* the styles below will affect the title under the numbers, i.e., “Days”, “Hours”, etc. */

    border: none;   

    padding: 10px 0px 10px 0px;

    width: 	10px;

    text-align: left;

    font-family: Arial;

    font-size: 15px;

    font-weight: normal;  /* options are normal, bold, bolder, lighter */

    color: #666666;       /* change color using the hexadecimal color codes for HTML */

    background: transparent;    /* change the background color using the hexadecimal color codes for HTML */

}

#table {

    width: 400px;

    border: none;    /* options are none, dotted, dashed, solid, double, groove, ridge, inset, outset */

    margin: 0px auto;

    position: relative;    /* leave as "relative" to keep timer centered on your page, or change to "absolute" then change the values of the "top" and "left" properties to position the timer */

    top: 0px;        /* change to position the timer */

    left: 0px;       /* change to position the timer; delete this property and it's value to keep timer centered on page */

}

</style>


<script type="text/javascript">


/*

Count down until any date script-

By JavaScript Kit (www.javascriptkit.com)

Over 200+ free scripts here!

Modified by Robert M. Kuhnhenn, D.O.

on 5/30/2006 to count down to a specific date AND time,

on 10/20/2007 to a new format, and 1/10/2010 to include

time zone offset.

*/


var current="Winter is here!";    //-->enter what you want the script to display when the target date and time are reached, limit to 20 characters

var year=2018;    //-->Enter the count down target date YEAR

var month=01;      //-->Enter the count down target date MONTH

var day=01;       //-->Enter the count down target date DAY

var hour=00;      //-->Enter the count down target date HOUR (24 hour clock)

var minute=00;    //-->Enter the count down target date MINUTE

var tz=-5;        //-->Offset for your timezone in hours from UTC (see http://wwp.greenwichmeantime.com/index.htm to find the timezone offset for your location)


//    DO NOT CHANGE THE CODE BELOW!

var montharray=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec")


function countdown(yr,m,d,hr,min){

    theyear=yr;themonth=m;theday=d;thehour=hr;theminute=min;

    var today=new Date();

    var todayy=today.getYear();

    if (todayy < 1000) {todayy+=1900;}

    var todaym=today.getMonth();

    var todayd=today.getDate();

    var todayh=today.getHours();

    var todaymin=today.getMinutes();

    var todaysec=today.getSeconds();

    var todaystring1=montharray[todaym]+" "+todayd+", "+todayy+" "+todayh+":"+todaymin+":"+todaysec;

    var todaystring=Date.parse(todaystring1)+(tz*1000*60*60);

    var futurestring1=(montharray[m-1]+" "+d+", "+yr+" "+hr+":"+min);

    var futurestring=Date.parse(futurestring1)-(today.getTimezoneOffset()*(1000*60));

    var dd=futurestring-todaystring;

    var dday=Math.floor(dd/(60*60*1000*24)*1);

    var dhour=Math.floor((dd%(60*60*1000*24))/(60*60*1000)*1);

    var dmin=Math.floor(((dd%(60*60*1000*24))%(60*60*1000))/(60*1000)*1);

    var dsec=Math.floor((((dd%(60*60*1000*24))%(60*60*1000))%(60*1000))/1000*1);

    if(dday<=0&&dhour<=0&&dmin<=0&&dsec<=0){

        document.getElementById('count2').innerHTML=current;

        document.getElementById('count2').style.display="block";

        document.getElementById('count2').style.width="390px";

        document.getElementById('dday').style.display="none";

        document.getElementById('dhour').style.display="none";

        document.getElementById('dmin').style.display="none";

        document.getElementById('dsec').style.display="none";

        document.getElementById('days').style.display="none";

        document.getElementById('hours').style.display="none";

        document.getElementById('minutes').style.display="none";

        document.getElementById('seconds').style.display="none";

        document.getElementById('spacer1').style.display="none";

        document.getElementById('spacer2').style.display="none";

        return;

    }

    else {

        document.getElementById('count2').style.display="none";

        document.getElementById('dday').innerHTML=dday;

        document.getElementById('dhour').innerHTML=dhour;

        document.getElementById('dmin').innerHTML=dmin;

        document.getElementById('dsec').innerHTML=dsec;

        setTimeout("countdown(theyear,themonth,theday,thehour,theminute)",1000);

    }

}

</script>


</head>


<body onload="countdown(year,month,day,hour,minute)">

<table id="table" border="0">

    <tr>

        <td align="center" colspan="6"><div class="numbers" id="count2" style="padding: 20px; "></div></td>

    </tr>


    <tr id="spacer1">

        <td align="center" ><div class="title" ></div></td>

        <td align="center" ><div class="numbers" id="dday"></div></td>

        <td align="center" ><div class="numbers" id="dhour"></div></td>

        <td align="center" ><div class="numbers" id="dmin"></div></td>

        <td align="center" ><div class="numbers" id="dsec"></div></td>

        <td align="center" ><div class="title" ></div></td>

    </tr>

    <tr id="spacer2">

        <td align="center" ><div class="title" ></div></td>

        <td align="center" ><div class="title" id="days">Days</div></td>

        <td align="center" ><div class="title" id="hours">Hours</div></td>

        <td align="center" ><div class="title" id="minutes">Minutes</div></td>

        <td align="center" ><div class="title" id="seconds">Seconds</div></td>

        <td align="center" ><div class="title" ></div></td>

    </tr>

</table>


</body>
<font color="#a20c89"><h1>To First Flight</h1></font>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<!--<div class="widget-body"> -->
										<!-- <div class="widget-main"> -->
											<h4 class="header blue lighter bigger">
												
												
											</h4>
											
											<?php echo $this->session->flashdata('err')?>
											<div class="space-6"></div>
											<form action="<?php echo base_url()?>index.php/login/action" method="POST"> 
												<fieldset>
													<label class="block clearfix">
														
															<input class="form-control" name="username" placeholder="Username" type="text">
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														
															<input type="password" name="password" class="form-control" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														
														
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

											
										<!-- /.widget-main -->

									<!--	<div class="toolbar clearfix"> -->
											
									<!--	</div> -->
									<!-- </div> --><!-- /.widget-body -->
								</div><!-- /.login-box -->

								
							</div><!-- /.position-relative -->

							
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="<?php echo base_url()?>assets/js/jquery.2.1.1.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="<?php echo base_url()?>assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url()?>assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='<?php echo base_url()?>assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url()?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>
	</body>
</html>
