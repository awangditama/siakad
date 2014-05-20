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
    } else if ($operasi == "pilihan") {
        echo '<div class="alert alert-error">
      <a class="close" data-dismiss="alert">×</a>
      <i class="icon icon-warning-sign"></i> <b>Maaf</b> ' . $this->session->userdata('message') . '</i>
    </div>';
    }
    else if ($operasi == "gagal") {
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
            <div class="well">
                <div class="pull-right" style="margin:30px 30px 30px 30px;">
                    <img src="<?php echo base_url(); ?>assets/img/nilai_absensi.png" width="80" height="80"/>
                </div>
                <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                    <p>Mata Kuliah :  <b><?php echo $matkul_tampil; ?></b></p>                    
                    <p>Kelas : <b><?php echo $kelas_tampil; ?></b></p>
                </blockquote>
                <table class="table table-bordered" style="color:black;"> 
                    <thead>
                        <tr>
                            <th style="font-weight: bold; font-size:14px; text-align:center; ">Kompetensi</th>
                            <th style="font-weight: bold; font-size:14px; ">Bobot Nilai</th>
                            <th style="font-weight: bold; font-size:14px; ">Detail Data</th>
                            <th style="font-weight: bold; font-size:14px; ">Cetak Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($tabel_pertemuan_ku as $row):
                            ?>
                            <tr class="odd gradeX">
                               <td  style="text-align:center;"><?php echo $row->minggu_ke; ?> </td>
                                <td class="align-center"><?php echo $row->nilai_bobot; ?> %</td>
                                <td  class="align-center"><a href="<?php echo base_url(); ?>index.php/dosen/update_presensi/<?php echo $row->id ?>" class="icon-edit-sign" title="Detail Data"></a></td>
                                <td  class="align-center"><a href="<?php echo base_url(); ?>index.php/dosen/print_simultan/<?php echo $row->id ?>" class="icon-print" title="Print Data"></a></td>
                            </tr>
                            <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
                <div style="margin-top:30px;">
                    <form style="float:right" >
                        <button type="submit" class="btn btn-success" onclick="return confirm('Apakah anda yakin untuk menambah data baru?');" formaction="<?php echo base_url(); ?>index.php/dosen/add_pertemuan" formmethod="post">Add</button>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus data yang terakhir?');" formaction="<?php echo base_url(); ?>index.php/dosen/hapus_pertemuan" formmethod="post">Remove</button>
                    </form>
                </div>				
            </div>
        </div>
    </div>
