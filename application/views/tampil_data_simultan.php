<div class="container">
    <div class="row-fluid">
        <!-- Forms: Box -->
        <div class="span12">
            <!-- Forms: Top Bar -->
            <div class="top-bar">
                <h3><i class="icon-cog"></i> Total Nilai Presensi Mahasiswa</h3>
            </div>
            <div class="well">
                <div class="pull-right" style="margin:30px 30px 30px 30px;">
                    <img src="<?php echo base_url(); ?>assets/img/nilai3.png" width="80" height="80"/>
                </div>
                <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                    <p>Mata Kuliah :  <b><?php echo $tampil_matkul; ?></b></p>                    
                    <p>Kelas : <b><?php echo $tampil_kelas; ?></b></p>
                </blockquote>
                <table class="table table-bordered" style="color:black;"> 
                    <thead>
                        <tr>

                            <th style="font-weight: bold; font-size:14px;">No</th>
                            <th style="font-weight: bold; font-size:14px;">Nim</th>
                            <th style="font-weight: bold; font-size:14px;">Nama</th>
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

                        <?php
                        $no = 1;
                        if ($cek->nilai == 0) {
                            echo "</tbody></table>";
                        } else {
                            $total = $total_minggu->minggu_ke;
                            $total_mhs = $total_mahasiswa->total_mahasiswa;
                            $temp = $total_pertemuan_absensi->pertemuan;
                            $indeks = 0;
                            ?>
                            <?php
                            for ($i = 0; $i < $total_mhs; $i++) {
                                $jumlah_nilai = 0;
                                $jumlah_pertemuan = 0;
                                ?>                
                                <tr>
                                    <td class="align-center"><?php echo $no; ?></td>
                                    <td><?php echo $nim_mhs[$i] ?></td>
                                    <td><?php echo $nama_mhs[$i] ?></td>

                                    <?php for ($x = 1; $x <= $total; $x++) { ?>
                                        <td class="align-center"><?php echo $total_nilai[$x][$i]['nilai']; ?></td>
                                        <?php $jumlah_nilai += $total_nilai[$x][$i]['nilai'];
                                    } ?>
                                    <td class="align-center"><?php echo $jumlah_nilai; ?></td>
                                    <td class="align-center"><?php echo $kehadiran[$i]; ?> </td>
                                        <?php $jumlah_pertemuan = $kehadiran[$i]; ?>
                                    <td class="align-center"><?php if($temp == 0 && $jumlah_pertemuan ==0){ echo "0"; $indeks1=1; }else{echo $indeks = ($temp - $jumlah_pertemuan) / $temp;
                                    //echo(round($indeks, 2));
                                    $indeks1 = ($temp - $jumlah_pertemuan) / $temp;}
                                            ?></td>                      
                                        <td class="align-center"><?php $huruf = $indeks1 * $jumlah_nilai * 1.02;
                                     echo (round($huruf, 2)); ?></td>                      
                                    <?php
                                    if ($huruf >= 80) {
                                        echo '<td class="align-center">A</td>';
                                    } else if ($huruf >= 70 && $huruf < 80) {
                                        echo '<td class="align-center">B</td>';
                                    } else if ($huruf >= 60 && $huruf < 70) {
                                        echo '<td class="align-center">C</td>';
                                    } else if ($huruf >= 50 && $huruf < 60) {
                                        echo '<td class="align-center">D</td>';
                                    } else {
                                        echo '<td class="align-center">E</td>';
                                    }
                                    ?>
                                </tr>                   

        <?php
        $no++;
    }
}
?>	
                    </tbody>   			
                </table>

            </div>
        </div>
    </div>

