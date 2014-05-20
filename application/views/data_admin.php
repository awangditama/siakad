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
        <div class="span12">
            <div class="top-bar">
                <h3><i class="icon-home"></i>Data Status Kuliah</h3>
            </div>

            <div class="well padding">
                <div class="pull-right" style="margin:30px 30px 30px 30px;">
                    <img src="<?php echo base_url(); ?>assets/img/nilai_absensi.png" width="80" height="80"/>
                </div>
                <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                    <p>Data status kuliah berisi dengan Tahun Akademik,semester, dan status perkuliahan.</p>
                    <small>Status Perkuliahan</small>
                </blockquote>
                <table class="table table-bordered" style="color:black;"> 
                    <thead>
                        <tr>
                            <th style="font-weight: bold; font-size:14px; ">No</th>
                            <th style="font-weight: bold; font-size:14px; ">Tahun Ajaran</th>
                            <th style="font-weight: bold; font-size:14px; ">Semester</th>
                            <th style="font-weight: bold; font-size:14px; ">Status</th>
                            <th style="font-weight: bold; font-size:14px; ">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = $tot + 1;
                        foreach ($tabel as $row):
                            ?>
                            <tr>
                                <td class="align-center"><?php echo $no; ?></td>
                                <td class="align-center"><?php echo $row->tahun_ajar1 . "/" . $row->tahun_ajar2; ?></td>
                                <td class="align-center"><?php echo $row->nama; ?></td>
                                <td class="align-center"><?php
                        $temp = $row->status;
                        if ($temp == 1) {
                            echo "Aktif";
                        } else {
                            echo "Tidak aktif";
                        }
                            ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>index.php/admin/update_status/<?php echo $row->kd; ?>" class="icon-edit" title="Edit" onclick="return confirm('Apakah anda yakin untuk mengupdate data ?');"></a> ||
                                    <a href="<?php echo base_url(); ?>index.php/admin/hapus_status/<?php echo $row->kd; ?>"class="icon-remove-sign" title="Delete" onclick="return confirm('Apakah anda yakin untuk menghapus data ?');"></a>
                                </td>
                            </tr>
                            <?php
                            $no++;
                        endforeach;
                        ?>
                    </tbody>   			
                </table>
                <div style="float:left; margin:30px 30px 30px 30px;">
                    <?php echo $paginator; ?>
                </div>
                <div style="margin-top:30px; padding-right:20px; ">
                    <form style="float:right" >
                        <button type="submit" class="btn btn-success" onclick="return confirm('Apakah anda yakin untuk menambah data baru?');" formaction="isi_status" formmethod="post">Add</button>
                    </form>
                </div>		
            </div>
        </div>
    </div>

