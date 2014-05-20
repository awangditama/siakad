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
                    </blockquote><?php echo "</div></div></div></div>"; ?>
                <?php } else { ?>     
                    <div class="well padding">
                        <div class="pull-right" style="margin:30px 30px 30px 30px;">
                            <img src="<?php echo base_url(); ?>assets/img/nilai2.png" width="80" height="80"/>
                        </div>
                        <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                            <p>Mata Kuliah :  <b><?php echo $kd_matkul; ?></b></p>                    
                            <p>Kelas : <b><?php echo $kd_kelas; ?></b></p>
                            <p>Kompetensi : <b><?php echo $pertemuan->minggu_ke; ?></b></p>
                            <p>Bobot nilai : <b><?php echo $pertemuan->nilai_bobot; ?> %</b></p>
                        </blockquote>
                        <P style="padding-left: 30px; text-align: left; font-size: 14px; font-weight:bold; "> Penilian berdasarkan angka </P>
                        <table class="table table-bordered" style="color:black;"> 
                            <thead>
                                <tr>
                                    <?php foreach ($judul_kolom as $row) { ?>
                                        <th style="font-weight: bold; font-size:14px; "><?php echo $row->keterangan; ?></th>
                                    <?php } ?>  </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                               <?PHP  foreach($nilai as $row){
                                   $total_nilai = $row->total_nilai;  
                                   $string = $row->nilai_mhs;
                                    $token = strtok($string, ";");
                                    for ($a = 1 ; $a <= $total_nilai ; $a++)
                                    {
                                          $temp1 = $token * 0.100 ;  
                                          echo "<td>".$temp1."</td>";
                                          $token = strtok(";");                                    
                                    } 
                                   }?>
                                </tr>
                            </tbody>
                        </table>                         
                    </div>
                </div>
            </div>
    <?php } ?>