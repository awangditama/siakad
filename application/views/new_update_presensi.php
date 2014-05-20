<div class="container">
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
                <form name="myForm" action="<?php echo base_url(); ?>index.php/dosen/update_proses_simultan/<?php echo $id; ?>" onsubmit="return validasi();" method="post">     
                    <label for="name" style="padding-left: 30px; font-size:14px; padding-bottom: 20px;">Kompetensi ke : <b><?php echo $update_pertemuan->minggu_ke; ?></b></label>
                    <input type="hidden" name="minggu_ke" value="<?php echo $update_pertemuan->minggu_ke; ?>"/>
                    <input type="hidden" name="matkul" value="<?php echo $update_pertemuan->kd_matkul; ?>"/>
                    <input type="hidden" name="kelas" value="<?php echo $update_pertemuan->kd_kelas; ?>"/>
                    <label style="padding-left: 30px; font-size:14px; margin-bottom:20px; ">Bobot Nilai :   <input input type="text" class="span1 m-wrap" name="bobot_nilai" onsubmit="return validasi();" value="<?php echo $update_pertemuan->nilai_bobot; ?>"/> % </label>           
                    <table class="table table-bordered" style="color:black;">
                        <thead>
                            <tr>
                                <th style="font-weight: bold; font-size:14px; ">No</th>
                                <th style="font-weight: bold; font-size:14px; ">Nim</th>
                                <th style="font-weight: bold; font-size:14px; ">Nama</th>
                             
                                 <?php foreach ($judul_kolom as $row) { ?>
                                    <th style="font-weight: bold; font-size:14px; "><?php echo $row->keterangan; ?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $jumlah = 0;
                            $no = 1;
                            foreach ($tabel_simultan as $row) {
                                ?>
                            <tbody>
                                <tr>
                                    <td class="align-center"><?php echo $no; ?></td>
                                    <td><?php echo $row['nim']; ?></td>
                                   <td><?php echo $row['nama']; ?></td>
                            <input type="hidden" name="nim<?php echo $no; ?>" value="<?php echo $row['nim']; ?>" />
                            <?php
                            $n1 = array();
                            $n12 = array();
                            $nl[0] = strtok($row['nilai_mhs'], ";");
                            for ($i = 1; $i < $row['total_mhs']; $i++) {
                                $nl[$i] = strtok(";");
                            }
                            $nl2[0] = strtok($row['id_mhs'], ";");
                            for ($i = 1; $i < $row['total_mhs']; $i++) {
                                $nl2[$i] = strtok(";");
                            }
                            for ($i = 0; $i < count($nl2); $i++) {
                                echo "<td> <input type=\"text\" name=\"pilihan" . $no . "[]\" value=\"$nl[$i]\" onKeyUp=\"return checkInput(this);\" style=\"width: 40px;\"/></td>";
                                echo " <input type=\"hidden\" name=\"detail" . $no . "[]\" value=\"$nl2[$i]\" onKeyUp=\"return checkInput(this);\" style=\"width: 40px;\"/>";
                            }
                            $no++;
                        }
                        ?> 
                        </tr>
                        </tbody>
                        <input type="hidden" name="no" value="<?php echo $no; ?>"/>
                    </table>   
                    <div class="form-actions" style="float:right;">
                        <button type="submit" class="btn  btn-warning">EDIT</button>   
                    </div>

            </div>
        </div>
    </div>
<script>
    function checkInput(obj) 
    {
        var pola = "^";
        pola += "[0-9.]*";
        pola += "$";
        rx = new RegExp(pola);

        if (!obj.value.match(rx))
        {
            if (obj.lastMatched)
            {
                obj.value = obj.lastMatched;
            }
            else
            {
                obj.value = "";
            }
        }
        else
        {
            obj.lastMatched = obj.value;
        }
    }
    
    function validasi()
    {
        if(myForm.bobot_nilai.value==""){
            alert("Bobot Mata Kuliah harus diisi");
            myForm.bobot_nilai.focus();
            return false;
        }
        else{
            return true;
        }   
    }
</script>
