<div class="container">
    <div class="row-fluid">
        <!-- Forms: Box -->
        <div class="span12">
            <!-- Forms: Top Bar -->
            <div class="top-bar">
                <h3><i class="icon-cog"></i> Add Absensi Mahasiswa</h3>
            </div>
            <div class="well">
                <div class="pull-right" style="margin:30px 30px 30px 30px;">
                    <img src="<?php echo base_url(); ?>assets/img/nilai2.png" width="80" height="80"/>
                </div>

                <form name="myForm" action="<?php echo base_url(); ?>index.php/dosen/input_proses_simultan_absensi" onsubmit="return validasi();" method="post">     
                    <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                        Tanggal : <input type="text" id="a" class="span2" name="tanggal"/>
                    </blockquote> 
                     <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                        Kompetensi : <select name="kompetensi" width="120px;"/>
                                    <?php foreach($opsi_id_pertemuan as $row){?>
                                        <option value="<?php echo $row->id;?>"><?php echo $row->minggu_ke;?> 
                                    <?php } ?>
                        </select>
                    </blockquote> 
                    <table class="table table-bordered" style="color:black;">
                        <thead>
                            <tr>
                                <th style="font-weight: bold; font-size:14px; ">No</th>
                                <th style="font-weight: bold; font-size:14px; ">Nim</th>
                                <th style="font-weight: bold; font-size:14px; ">Nama Mahasiswa</th>
                                <th style="font-weight: bold; font-size:14px; ">Kehadiran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $jumlah = 0;
                            $no = 1;
                            foreach ($tabel_absensi as $row):
                                ?>
                            <tbody>
                                <tr>
                                    <td class="align-center"><?php echo $no; ?></td>
                                    <td><?php echo $row->nim; ?></td>
                            <input type="hidden" name="nim<?php echo $no; ?>" value="<?php echo $row->nim; ?>" />
                            <td width="200px"><?php echo $row->nama; ?></td>
                            <td class="align-center">
                                <input type="checkbox" name="hadir<?php echo $no; ?>" value="1"   checked/></td>
                            </tr>
                            </tbody>
                            <?php
                            $no++;
                        endforeach;
                        ?> 
                        </tbody>
                    </table>
                    <input type="hidden" name="no" value="<?php echo $no; ?>"/>
                    <div class="form-actions" style="float:right;">
                        <button type="submit" class="btn btn-primary">ADD</button>   
                    </div>
                </form>
            </div>
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
