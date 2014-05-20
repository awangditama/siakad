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
                <h3><i class="icon-cog"></i>Upload File KRS Mahasiswa</h3>
            </div>
              <?php if ($aktif != "") { ?>
                <div class="well no-padding">
                    <div class="pull-right" style="margin:30px 30px 30px 30px;">
                        <p><h4>[KRS MAHASISWA]</h4></p> 
                 </div>
                    <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                        <p><font style="color:red; font-weight:bold;"><?php echo $aktif; ?></font></p>
                    </blockquote><?php echo "</div></div></div></div>"; ?>
                <?php } else { ?>     
                
            <div class="well">
                <div class="pull-right" style="margin:30px 30px 30px 30px;">
                    <p><h4>[KRS MAHASISWA]</h4></p> 
                </div>
                <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                    <p>Silahkan upload file krs mahasiswa, file yang digunakan harus sesuai dengan format yang sudah diberikan</p>
                </blockquote>
             <?php echo form_open_multipart('admin/proses_upload_krs_mahasiswa');?>
                         <label  style="margin:10px; padding-left:130px; font-size: 14px; ">Pilih File :                
                <input type="file" class="span4 m-wrap"  id="file_upload" name="userfile" size="20" /></label>
                 <div class="form-actions" style="padding-left:150px; ">
                        <button type="submit" class="btn btn-primary">Upload</button>   
                    </div>
                </form>
            </div>
        </div>
</div>
        <?php } ?>