<div class="container">
    <div class="row-fluid">
        <div class="span12">
            <div class="top-bar">
                <h3><i class="icon-home"></i>Daftar Mata Kuliah Kuisoner IPD</h3>
            </div>
            <div class="well padding">
                <div class="pull-right" style="margin:30px 30px 30px 30px;">
                    <img src="<?php echo base_url(); ?>assets/img/nilai_absensi.png" width="80" height="80"/>
                </div>
                <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                    <p>Pilihlah data Mata Kuliah yang tersedia untuk mengetahui IPD .</p>
                    <small>Kuisoner</small>
                </blockquote>
                <table class="table table-bordered" style="color:black;"> 
                    <thead>
                        <tr>
                            <th style="font-weight: bold; font-size:14px; ">No</th>
                            <th style="font-weight: bold; font-size:14px; ">Kode_MK</th>
                            <th style="font-weight: bold; font-size:14px; ">Nama_MK</th>
                            <th style="font-weight: bold; font-size:14px; ">Lihat IPD</th>                               
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = $tot + 1;
                        foreach ($tabel as $row):
                            ?>
                            <tr>
                                <td class="align-center"><?php echo $no; ?></td>
                                <td class="align-center"><?php echo $row->matkul ?></td>
                                <td class="align-center"><?php echo $row->nm_matkul; ?></td>
                                <td>
                                    <form style="padding:0; margin:0;">
                                        <input type="hidden" name="matkul" value="<?php echo $row->kd_matkul; ?>"/>
                                        <input type="hidden" name="nm_matkul" value="<?php echo $row->nm_matkul; ?>"/>
                                        <button type="submit" class="btn btn-success" onclick="return confirm('Apakah anda yakin untuk melihat nilai?');" formaction="<?php echo base_url(); ?>index.php/admin/lihat_nilai_ipd" formmethod="post"><i class="icon-envelope"></i> Detail Data</button>
                                    </form>
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
            </div>
        </div>
    </div>

