<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<title>SINPREN</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	  <link href="<?php echo base_url(); ?>assets/css/chosen.css" rel='stylesheet' tyle="text/css">
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/theme/avocado.css" rel="stylesheet" type="text/css" id="theme-style">
	<link href="<?php echo base_url(); ?>assets/css/prism.css" rel="stylesheet/less" type="text/css">
	<link href='<?php echo base_url(); ?>assets/css/fullcalendar.css' rel='stylesheet' tyle="text/css">
  	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,600,300' rel='stylesheet' type='text/css'> 
	<style type="text/css">
		body { padding-top: 102px; }
	</style>
	<link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.css" rel="stylesheet">
	
	<!-- JavaScript/jQuery, Pre-DOM -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.0/jquery-1.9.0.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.0/ui/jquery.ui.core.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.0/ui/jquery.ui.widget.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.0/ui/jquery.ui.datepicker.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.0/themes/base/jquery.ui.all.css">
	<script src="<?php echo base_url(); ?>assets/js/charts/excanvas.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/charts/jquery.flot.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.jpanelmenu.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.cookie.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/avocado-custom-predom.js"></script>
	<script>
	$(function() {
		 $( "#a" ).datepicker();
	});
	</script>

	<!-- HTML5, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>

<body>

	<!-- Top Fixed Bar -->
	<div class="navbar navbar-inverse navbar-fixed-top">

		<!-- Top Fixed Bar: Navbar Inner -->
		<div class="navbar-inner">

			<!-- Top Fixed Bar: Container -->
			<div class="container">

				<!-- Mobile Menu Button -->
			  <a href="#">
			  <button type="button" class="btn btn-navbar mobile-menu">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
				  </button>
			  </a>
				<!-- / Mobile Menu Button -->

				<!-- / Logo / Brand Name -->
				<a class="brand" href="#"><img src="<?php echo base_url(); ?>assets/img/download.png" width="60" height="60"></a><a class="brand" href="#"><B><font style="font-size:24px; color:#CCC;">SINPREN</font><br>
 Fakultas Teknologi Pertanian<br>
 Universitas Jember
</B></a>
				<!-- / Logo / Brand Name -->

				<!-- User Navigation -->
				<ul class="nav pull-right">
					
					<!-- User Navigation: Notifications -->
					
					<!-- User Navigation: User -->
					<li class="dropdown">

						<!-- User Navigation: User Link -->
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user icon-white"></i> 
							<span class="hidden-phone">Bayu Taruna W.</span>
						</a>
						<!-- / User Navigation: User Link -->

						<!-- User Navigation: User Dropdown -->
						<ul class="dropdown-menu">
							<li><a href="#"><i class="icon-user"></i> Profile</a></li>
							<li><a href="#settings" data-toggle="modal"><i class="icon-cog"></i> Settings</a></li>
							<li><a href="#messages" data-toggle="modal"><i class="icon-envelope"></i> Messages</a></li>
							<li class="divider"></li>
							<li><a href="#"><i class="icon-off"></i> Logout</a></li>
						</ul>
						<!-- / User Navigation: User Dropdown -->

					</li>
					<!-- / User Navigation: User -->

				</ul>
				<!-- / User Navigation -->

			</div>
			<!-- / Top Fixed Bar: Container -->

		</div>
		<!-- / Top Fixed Bar: Navbar Inner -->

		<!-- Top Fixed Bar: Breadcrumb -->
		<div class="breadcrumb clearfix">

			<!-- Top Fixed Bar: Breadcrumb Container -->
			<div class="container">

				<!-- Top Fixed Bar: Breadcrumb Location -->
				<ul class="pull-left">
					<li><a href="#"><i class="icon-home"></i> Home</a> <span class="divider">/</span></li>
					<li class="active"><a href="#"><i class="icon-align-justify"></i> Dosen</a></li>
				</ul>
				<!-- / Top Fixed Bar: Breadcrumb Location -->

				<!-- Top Fixed Bar: Breadcrumb Right Navigation -->
				<ul class="pull-right">

					<!-- Top Fixed Bar: Breadcrumb Theme -->
					<li><a href="login.html"><i class="icon-off"></i> Logout</a></li>
				</ul>
				<!-- / Top Fixed Bar: Breadcrumb Right Navigation -->

			</div>
			<!-- / Top Fixed Bar: Breadcrumb Container -->

		</div>
		<!-- / Top Fixed Bar: Breadcrumb -->

	</div>
	<!-- / Top Fixed Bar -->

	<!-- Content Container -->
	<div class="container">

		<!-- Main Navigation: Box -->
		<div class="navbar navbar-inverse" id="nav">

			<!-- Main Navigation: Inner -->
			<div class="navbar-inner">

				<!-- Main Navigation: Nav -->
				<ul class="nav">

					<!-- Main Navigation: Dashboard -->
					<li class="active"><a href="index-2.html"><i class="icon-align-justify"></i> Home</a></li>
					<!-- / Main Navigation: Dashboard -->

					<!-- Main Navigation: UI Elements -->
					<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-magic">
								</i>  Data Mahasiswa <b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="forms.html"><i class="icon-check"></i>  Presensi</a></li>
								<li><a href="wysiwyg.html"><i class="icon-edit"></i>  Absensi</a></li>
								<li><a href="tabs.html"><i class="icon-th-large"></i> Total Nilai</a></li>
							</ul>
					</li>
					<!-- / Main Navigation: UI Elements -->					

				</ul>
				<!-- / Main Navigation: Nav -->
			
				<!-- Main Navigation: Search -->
				<form class="navbar-search pull-right">
					<input type="text" class="search-query typeahead" placeholder="Search">
				</form>
				<!-- / Main Navigation: Search -->

			</div>
			<!-- / Main Navigation: Inner -->

		</div>
		<!-- / Main Navigation: Box -->

		<!-- Alert -->
		<div class="alert alert-light">
			<a class="close" data-dismiss="alert">&times;</a>
			<i class="icon-comment"></i> Selamat Datang Kembali, <b>Bayu Taruna</b>
		</div>
		<!-- / Alert -->

		<!-- Information Boxes -->
		<div class="row-fluid">

			<!-- Information Boxes: Users Registered -->
			<div class="span3 well infobox">
				<i class="icon-6x icon-user"></i>
				<div class="pull-right text-right">
					112410101064<br>
					<b class="huge">DOSEN</b><br>
					<span class="caps muted">Type</span>
				</div>
			</div>
			<!-- / Information Boxes: Users Registered -->

			<!-- Information Boxes: Active Users -->
			<div class="span3 well infobox">
				<i class="icon-6x icon-list-alt"></i>
				<div class="pull-right text-right">
					 Status Akademik<br>
					<b class="huge">Aktif</b><br>
					
				</div>
			</div>
			<!-- / Information Boxes: Active Users -->

			<!-- Information Boxes: Images -->
			<div class="span3 well infobox">
				<i class="icon-6x icon-list"></i>
				<div class="pull-right text-right">
					Tahun Pelajaran <br>
					<b class="huge">2010/2011</b><br>
				</div>
			</div>
			<!-- / Information Boxes: Images -->
			
			<!-- Information Boxes: Applications -->
			<div class="span3 well infobox">
				<i class="icon-6x icon-calendar"></i>
				<div class="pull-right text-right">
					Senin<br>
					<b class="huge">21-02-1992</b><br>
					<span class="caps muted">08.30</span>
				</div>
			</div>
			<!-- / Information Boxes: Applications -->

		</div>
		<!-- / Information Boxes -->
   <div class="container">
<div class="row-fluid">

     <div class="span12">

        <div class="top-bar">

           <h3><i class="icon-home"></i>Sistem Informasi Presensi</h3>

        </div>

        <div class="well">  
       <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <img src="<?php echo base_url(); ?>assets/img/slide2.gif" alt="First slide">
        </div>
        <div class="item">
          <img src="<?php echo base_url(); ?>assets/img/slide3.jpg" alt="Second slide">
        </div>
      </div>
      <a class="left carousel-control" href="" data-slide="prev"><span class="glyphicon glyphicon-arrow-left"></span></a>
      <a class="right carousel-control" href="" data-slide="next"><span class="glyphicon glyphicon-arrow-right"></span></a>
    </div><!-- /.carousel -->
           
        </div>

      </div>

    </div>

    
		
	</div> 
	<!-- / Content Container -->

	<!-- Footer -->
	<footer class="footer">

			<!-- Footer Container -->
      <div class="container">

				<!-- Footer Container: Content -->
        <p>Copyrighted <a href="ftp.unej.ac.id">Fakultas Teknologi Pertanian</a> 2013. All rights resserved.</p>

        <p><a href="unej.ac.id">UNIVERSITAS JEMBER</a></p>


        <!-- / Footer Container: Content -->

      </div>
      <!-- / Footer Container -->

	</footer>
	<!-- / Footer -->

</body>

	<!-- Javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src='assets/js/jquery.hotkeys.js'></script>
	<script src='assets/js/calendar/fullcalendar.min.js'></script>
	<script src="assets/js/jquery-ui-1.10.2.custom.min.js"></script>
	<script src="assets/js/jquery.pajinate.js"></script>
	<script src="assets/js/jquery.prism.min.js"></script>
	<script src="assets/js/jquery.dataTables.min.js"></script>
	<script src="assets/js/charts/jquery.flot.time.js"></script>
	<script src="assets/js/charts/jquery.flot.pie.js"></script>
	<script src="assets/js/charts/jquery.flot.resize.js"></script>
	<script src="assets/js/bootstrap/bootstrap.min.js"></script>
	<script src="assets/js/bootstrap/bootstrap-wysiwyg.js"></script>
	<script src="assets/js/bootstrap/bootstrap-typeahead.js"></script>
	<script src="assets/js/jquery.easing.min.js"></script>
	<script src="assets/js/jquery.chosen.min.js"></script>
	<script src="assets/js/avocado-custom.js"></script>

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-43253177-1', 'lycheedesigns.com');
	  ga('send', 'pageview');

	</script>	
		
</html>