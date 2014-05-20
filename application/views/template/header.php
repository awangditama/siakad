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
                        <span class="hidden-phone"><?php  echo $this->session->userdata('nama'); ?></span>
                    </a>
                    <!-- / User Navigation: User Link -->

                    <!-- User Navigation: User Dropdown -->
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="icon-user"></i> Profile</a></li>
                        <li><a href="#settings" data-toggle="modal"><i class="icon-cog"></i> Settings</a></li>
                        <li><a href="#messages" data-toggle="modal"><i class="icon-envelope"></i> Messages</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url();?>index.php/halaman/logut"><i class="icon-off"></i>Logut</a></li>
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
               </ul>
            <!-- / Top Fixed Bar: Breadcrumb Location -->

            <!-- Top Fixed Bar: Breadcrumb Right Navigation -->
            <ul class="pull-right">

                <!-- Top Fixed Bar: Breadcrumb Theme -->
                <li><a href="<?php echo base_url();?>index.php/halaman/logout"><i class="icon-off"></i> Logout</a></li>
            </ul>
            <!-- / Top Fixed Bar: Breadcrumb Right Navigation -->

        </div>
        <!-- / Top Fixed Bar: Breadcrumb Container -->

    </div>
    <!-- / Top Fixed Bar: Breadcrumb -->

</div>
<!-- / Top Fixed Bar -->
