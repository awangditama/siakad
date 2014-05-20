<div class="container">
     <?php
$operasi = $this->session->userdata('operation');
if ($operasi != null) {
    if ($operasi == "sukses") {
        echo '<div class="alert alert-success">
                 <a class="close" data-dismiss="alert">×</a>
                 <i class="icon icon-thumbs-up-alt"></i> <b>Selamat</b>' . $this->session->userdata('message') . '</i>
                 </div>';
    } else if ($operasi == "validasi") {
        echo '<div class="alert alert-error">
      <a class="close" data-dismiss="alert">×</a>
      <i class="icon icon-warning-sign"></i> <b>Maaf</b> ' . $this->session->userdata('message') . '</i>
    </div>';
    } else if ($operasi == "duplicate") {
        echo '<div class="alert alert-error">
      <a class="close" data-dismiss="alert">×</a>
      <i class="icon icon-warning-sign"></i> <b>Maaf</b> ' . $this->session->userdata('message') . '</i>
    </div>';
    } else if ($operasi == "gagal") {
        echo '<div class="alert alert-error">
      <a class="close" data-dismiss="alert">×</a>
      <i class="icon icon-warning-sign"></i> <b>Maaf</b> ' . $this->session->userdata('message') . '</i>
    </div>';
    }
}
$this->session->unset_userdata('operation');
$this->session->unset_userdata('message');
$this->session->unset_userdata('message1');
?>
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
                        </blockquote>
                           <table class="table table-bordered" style="color:black;"> 
                    <thead>
                        <tr>
                            <?php foreach ($minggu_ke as $row): ?>
                                <th style="font-weight: bold; font-size:14px;">Minggu <?php echo $row->minggu_ke; ?></th>
                            <?php endforeach; ?>
                            <th style="font-weight: bold; font-size:14px;">Jumlah Nilai</th>
                            <th style="font-weight: bold; font-size:14px;">Tidak Hadir</th>   
                            <th style="font-weight: bold; font-size:14px;">Indeks Disiplin</th>
                            <th style="font-weight: bold; font-size:14px;">Capaian Kolom</th>
                            <th style="font-weight: bold; font-size:14px;">Huruf</th>
                        </tr>
                    </thead>
                    <tbody>
                          <?php $no = 1;
                           if ($cek->nilai == 0) {
                            echo "</tbody></table>";
                        } else {
                          $jumlah_nilai=0;
            $total = $total_minggu->minggu_ke;
            $temp = $total_pertemuan_absensi->pertemuan;
            $indeks=0;
         ?>
                <?php 
                    ?>                
                    <tr>
                    <?php for($x=1;$x<=$total;$x++){?>
                    <td class="align-center"><?php echo $total_nilai[$x][0]['nilai']; ?></td>
                    <?php  $jumlah_nilai += $total_nilai[$x][0]['nilai'];} ?>
                    <td class="align-center"><?php echo $jumlah_nilai;?></td>
                    <td class="align-center"><?php echo $kehadiran; ?> </td>
                    <?php $jumlah_pertemuan = $kehadiran;?>
                    <td class="align-center"><?php if($temp == 0 && $jumlah_pertemuan ==0){ echo "0"; $indeks1=0; }else{echo $indeks = ($temp - $jumlah_pertemuan) / $temp;
                                    //echo(round($indeks, 2));
                                    $indeks1 = ($temp - $jumlah_pertemuan) / $temp;}  ?></td>                      
                    <td class="align-center"><?php $huruf =  $indeks1 * $jumlah_nilai * 1.02; echo (round($huruf, 2)); ?></td>                      
                    <?php if($huruf >= 80 ){
                        echo '<td class="align-center">A</td>';
                    }else if($huruf >= 70 && $huruf < 80){
                        echo '<td class="align-center">B</td>';
                    }else if($huruf >= 60 && $huruf < 70){
                        echo '<td class="align-center">C</td>';
                    }else if($huruf >= 50 && $huruf < 60){
                        echo '<td class="align-center">D</td>';
                    }else{
                        echo '<td class="align-center">E</td>';
                    }
                    ?>
                    </tr>                   
                    
                   <?php
             $no++;                    
                        ?>	
        </tbody> 
                           </table>
                        <?php } ?>  
                    </div>
                </div>
            </div>
    <?php } ?>