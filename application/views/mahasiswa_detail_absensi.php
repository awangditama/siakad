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
                            <p>Jumlah Pertemuan : <b><?php echo $total_pertemuan; ?></b></p>
                            <p>Jumlah Hadir : <b><?php echo $hadir; ?> </b></p>
                            <p>Jumlah Tidak Hadir : <b><?php echo $tdk_hadir; ?> </b></p>
                        </blockquote>
                        <P style="padding-left: 30px; text-align: left; font-size: 14px; font-weight:bold; "> Keterangan detail absensi </P>
                        <table class="table table-bordered" style="color:black;"> 
                            <thead>
                                <tr>
                                   <th style="font-weight: bold; font-size:14px; ">No</th>
                                    <th style="font-weight: bold; font-size:14px; ">Tanggal</th>                
                                    <th style="font-weight: bold; font-size:14px; ">Keterangan</th>
                                </tr>
                            </thead>
                                 <?php
                        $no = 1;
                        foreach ($tabel as $row):
                            ?>
                            <tr class="odd gradeX">
                                <td class="align-center"><?php echo $no; ?></td>
                                <td align="center"><?php echo date('d-F-y', strtotime($row->tanggal)); ?></td>
                                <?php if($row->hadir == 1){?>
                                <td class="align-center">Hadir</td>
                                <?php } else { ?>
                                <td class="align-center">Tidak Hadir</td>
                               <?php } ?>                                                              
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