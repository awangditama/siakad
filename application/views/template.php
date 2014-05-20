<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <title>SINPREN</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <LINK REL="SHORTCUT ICON" HREF="<?php echo base_url(); ?>assets/img/download.png">	
        <link href="<?php echo base_url(); ?>assets/css/chosen.css" rel='stylesheet' tyle="text/css">
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/theme/avocado.css" rel="stylesheet" type="text/css" id="theme-style">
        <link href="<?php echo base_url(); ?>assets/css/prism.css" rel="stylesheet/less" type="text/css">
        <link href='<?php echo base_url(); ?>assets/css/fullcalendar.css' rel='stylesheet' tyle="text/css">
        <link href='<?php echo base_url(); ?>assets/css/slide.css' rel='stylesheet' tyle="text/css">
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
        <script src="<?php echo base_url(); ?>assets/js/jquery.jpanelmenu.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.cookie.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/avocado-custom-predom.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/highcharts.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/modules/exporting.js"></script>
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

        <?php $this->load->view('template/header'); ?>

        <!-- Content Container -->
        <div class="container">

            <?php $this->load->view('template/menu'); ?>

            <!-- Alert -->
            <div class="alert alert-light">
                <a class="close" data-dismiss="alert">&times;</a>
                <i class="icon-comment"></i> Selamat Datang Kembali, <b><?php echo $this->session->userdata('nama'); ?></b>
            </div>
            <!-- / Alert -->

            <?php $this->load->view('template/topBar'); ?>
        </div>
        <?php echo $content; ?>

        <?php $this->load->view('template/footer'); ?>
    </body>

    <!-- Javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src='<?php echo base_url(); ?>assets/js/jquery.hotkeys.js'></script>
    <script src='<?php echo base_url(); ?>assets/js/calendar/fullcalendar.min.js'></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.2.custom.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.pajinate.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.prism.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
   <script src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap-wysiwyg.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap-typeahead.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.easing.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.chosen.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/avocado-custom.js"></script>
     <script src="<?php echo base_url(); ?>assets/js/responsiveslides.min.js"></script>


    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-43253177-1', 'lycheedesigns.com');
        ga('send', 'pageview');

    </script>	

</html>