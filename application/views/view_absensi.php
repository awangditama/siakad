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
                <h3><i class="icon-cog"></i> Daftar Hadir Mahasiswa</h3>
            </div>
            <div class="well">
                <div class="pull-right" style="margin:30px 30px 30px 30px;">
                    <img src="<?php echo base_url(); ?>assets/img/nilai2.png" width="80" height="80"/>
                </div>
                <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                    <p>Mata Kuliah :  <b><?php echo $matkul; ?></b></p>                    
                    <p>Kelas : <b><?php echo $kelas; ?></b></p>
                </blockquote>
                <table class="table table-bordered" style="color:black;"> 
                    <thead>
                        <tr>
                            <th style="font-weight: bold; font-size:14px; ">No</th>
                            <th style="font-weight: bold; font-size:14px; ">Kompetensi</th>                        
                            <th style="font-weight: bold; font-size:14px; ">Tanggal Pertemuan</th>
                            <th style="font-weight: bold; font-size:14px; ">Detail Data</th>
                            <th style="font-weight: bold; font-size:14px; ">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($tabel_absensi as $row):
                            ?>
                            <tr class="odd gradeX">
                                <td class="align-center"><?php echo $no; ?></td>
                                 <td class="align-center">K<?php echo $row->minggu_ke; ?></td>      
                                <td align="center"><?php echo date('d-F-y', strtotime($row->tanggal)); ?></td>
                                <td><a href="<?php echo base_url(); ?>index.php/dosen/update_absensi/<?php echo $row->id_pertemuan_absensi ?>" class="icon-archive" title="Detail Data"></a></td>
                                <td><a href="<?php echo base_url(); ?>index.php/dosen/hapus_absensi/<?php echo $row->id_pertemuan_absensi ?>" class="icon-remove-sign" title="Hapus Data" onclick="return confirm('Apakah anda yakin untuk menghapus data ?');"></a></td>
                            </tr>
                            <?php
                            $no++;
                        endforeach;
                        ?>
                    </tbody>
                </table>
                <div style="margin-top:30px;">
                    <form style="float:right" >
                        <button type="submit" class="btn btn-success" onclick="return confirm('Apakah anda yakin untuk menambah data baru?');" formaction="<?php echo base_url(); ?>index.php/dosen/isi_absensi" formmethod="post">Add</button>
                    </form>

                </div>				
            </div>
        </div>
    </div>
