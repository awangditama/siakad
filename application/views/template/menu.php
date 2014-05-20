<!-- Main Navigation: Box -->
<div class="navbar navbar-inverse" id="nav">

    <!-- Main Navigation: Inner -->
    <div class="navbar-inner">

        <!-- Main Navigation: Nav -->
        <ul class="nav">

            <?php if ($this->session->userdata("type") == 1) { ?>
                <!-- Main Navigation: Dashboard -->
                <li class="active"><a href="<?php echo base_url(); ?>index.php/admin/"><i class="icon-align-justify"></i> Home</a></li>
                <!-- / Main Navigation: Dashboard -->
                <li ><a href="<?php echo base_url(); ?>index.php/admin/data_admin"><i class="icon-edit"></i> Status Perkuliahan</a></li>
                <!-- / Main Navigation: UI Elements -->	
                <li ><a href="<?php echo base_url(); ?>index.php/admin/data_dosen"><i class="icon-edit"></i> Dosen</a></li>
                <li ><a href="<?php echo base_url(); ?>index.php/admin/data_matkul"><i class="icon-edit"></i>  Mata Kuliah</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-magic">
                        </i> Upload File <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>index.php/admin/upload_file_mahasiswa"><i class="icon-check"></i>Data Mahasiswa</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/admin/upload_file_login"><i class="icon-check"></i>User Login</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/admin/upload_file_matkul"><i class="icon-check"></i>Mata Kuliah</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/admin/upload_file"><i class="icon-check"></i>KRS Mahasiswa</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/admin/upload_file_dosen"><i class="icon-check"></i>KRS Dosen</a></li>
                    </ul>
                </li>
                <!-- Main Navigation: UI Elements -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-magic">
                        </i>  IPD Mata Kuliah <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>index.php/admin/data_kuisoner_total_nilai"><i class="icon-check"></i>Total Nilai IPD</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/admin/data_kuisoner"><i class="icon-edit"></i>Evaluasi Matkul</a></li>
                    </ul>
                </li>

            <?php } else if ($this->session->userdata("type") == 2) { ?>
                <!-- Main Navigation: Dashboard -->
                <li class="active"><a href="<?php echo base_url(); ?>index.php/dosen/"><i class="icon-align-justify"></i> Home</a></li>
                <!-- / Main Navigation: Dashboard -->

                <!-- Main Navigation: UI Elements -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-magic">
                        </i>  Data Mahasiswa <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>index.php/dosen/data_dosen"><i class="icon-check"></i>  Presensi</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/dosen/pilih_absensi"><i class="icon-edit"></i>  Absensi</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/dosen/total_data_simultan"><i class="icon-th-large"></i> Total Nilai</a></li>
                    </ul>
                </li>
            <?php } else if ($this->session->userdata("type") == 3) { ?>
                <!-- Main Navigation: Dashboard -->
                <li class="active"><a href="<?php echo base_url(); ?>index.php/mahasiswa/"><i class="icon-align-justify"></i> Home</a></li>
                <!-- / Main Navigation: Dashboard -->

                <!-- Main Navigation: UI Elements -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-magic">
                        </i>  Data Mahasiswa <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>index.php/mahasiswa/lihat_nilai_presensi"><i class="icon-check"></i>  Presensi</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/mahasiswa/lihat_absensi"><i class="icon-edit"></i>  Absensi</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/mahasiswa/view_total_nilai"><i class="icon-th-large"></i> Total Nilai</a></li>
                    </ul>
                </li>

            <?php } ?>
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