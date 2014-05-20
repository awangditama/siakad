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
                <form name="myForm" action="<?php echo base_url(); ?>index.php/dosen/input_proses_opsi" onsubmit="return validasi();" method="post">     
                    <label for="name" style="padding-left: 30px; font-size:14px; padding-bottom: 20px;">Kompetensi ke : <b><?php echo $minggu_ke; ?></b></label>
                    <input type="hidden" name="minggu_ke" value="<?php echo $minggu_ke; ?>"/>
                    <input type="hidden" name="matkul" value="<?php echo $matkul_tampil; ?>"/>
                    <input type="hidden" name="kelas" value="<?php echo $kelas_tampil; ?>"/>
                    <label style="padding-left: 30px; font-size:14px; margin-bottom:20px; ">Bobot Nilai :   <input input type="text" class="span1 m-wrap" name="bobot_nilai" onsubmit="return validasi();"/> % </label>                
                    <label for="name" style="padding-left: 30px; font-size:14px; padding-bottom: 5px;">Kreteria Nilai : 
                        <?php $no = 1;
                        foreach ($opsi as $row): ?> 
                            <input type="checkbox" name="pilihan<?php echo $no; ?>" id="c<?php echo $no; ?>"value="<?php echo $row->id_opsi; ?>" style="margin:10px; "/><?php echo $row->keterangan;
                        $no++;
                    endforeach;
                    echo '<br><input type="hidden" name="no" value="' . $no . '" id="no" onsubmit="return validasi();"/>';
                        ?></br>  </label>                   
                    <div class="form-actions" style="float:right;">
                        <button type="submit" class="btn btn-primary">ADD</button>   
                    </div>
                    <?php
                    $no2 = 1;
                    foreach ($tabel_simultan as $row):
                        ?>
                        <input type="hidden" name="nim<?php echo $no2; ?>" value="<?php echo $row->nim; ?>" />
    <?php
    $no2++;
endforeach;
?> 
                    <input type="hidden" name="no2" value="<?php echo $no2; ?>"/>
                </form>
            </div>
        </div>
    </div>
<script>
    function checkInput(obj) 
    {
        var pola = "^";
        pola += "[0-9]*";
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
//        alert(document.myForm.c1.checked);
//        alert(document.myForm.c2.checked);
//        alert(document.myForm.c3.checked);
//        alert(document.myForm.c4.checked);
//        alert(document.myForm.c5.checked);
    
      
//     var pilihan = myForm.no.value;
//       var  a;
//       var  b=0;
//       for(a=1;a<pilihan;a++){
//           alert(document.myForm.c+String(a).checked);
//       }
    
       if(myForm.bobot_nilai.value==""){
            //alert(myFrom.no.value);
            alert("Bobot Mata Kuliah harus diisi");
            myForm.bobot_nilai.focus();
            return false;
        }
        else{
            return true;
        }  
       
    }
</script>
