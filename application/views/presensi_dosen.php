<div class="container">
    <div class="row-fluid">
        <!-- Forms: Box -->
        <div class="span12">
            <!-- Forms: Top Bar -->
            <div class="top-bar">
                <h3><i class="icon-cog"></i> Nilai Presensi Mahasiswa</h3>
            </div>
            <?php if ($aktif != "") { ?>
                <div class="well no-padding">
                    <div class="pull-right" style="margin:30px 30px 30px 30px;">
                        <img src="<?php echo base_url(); ?>assets/img/nilai_absensi.png" width="80" height="80"/>
                    </div>
                    <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                        <p><font style="color:red; font-weight:bold;"><?php echo $aktif; ?></font></p>
                    </blockquote><?php echo "</div></div></div>"; ?>
                <?php } else { ?>     
                    <!-- / Forms: Top Bar -->
                    <!-- Forms: Content -->
                    <div class="well padding">
                        <div class="pull-right" style="margin:30px 30px 30px 30px;">
                            <img src="<?php echo base_url(); ?>assets/img/nilai_absensi.png" width="80" height="80"/>
                        </div>
                        <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                            <p>Menu ini berisi inputan nilai dan kategori berdasarkan Mata Kuliah dan Kelas yang dipilih.</p>
                            <small>Pengelolaan Nilai</small>
                        </blockquote>
                         <table class="table table-bordered" style="color:black;"> 
                    <thead>
                        <tr>
                            <th style="font-weight: bold; font-size:14px; ">No</th>
                            <th style="font-weight: bold; font-size:14px; ">Kode Matkul</th>
                            <th style="font-weight: bold; font-size:14px; ">Mata Kuliah</th>
                            <th style="font-weight: bold; font-size:14px; ">Kelas</th>
                            <th style="font-weight: bold; font-size:14px; ">Detail Data</th>                
                         </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($krs_dosen as $row):
                            ?>
                            <tr class="odd gradeX">
                                <td class="align-center"><?php echo $no; ?></td>
                                <td class="align-center"><?php echo $row->kd_matkul?> </td>
                                <td class="align-center"><?php echo $row->nm_matkul; ?> </td>
                                <td class="align-center"><?php echo $row->nm_kls; ?> </td>
                                <td  class="align-center"><a href="tampil_data_pertemuan/?matkul=<?php echo $row->kd_matkul;?>&kelas=<?php echo $row->kd_kls; ?>" class="icon-edit-sign" title="Detail Data"></a></td>           
                            </tr>
                            <?php
                            $no++;
                        endforeach;
                        ?>
                    </tbody>
                </table>
                    </div>
                </div>
            </div>
    <?php } ?>