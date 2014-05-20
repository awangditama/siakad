<div class="container">
    <div class="row-fluid">
        <!-- Forms: Box -->
        <div class="span12">
            <!-- Forms: Top Bar -->
            <div class="top-bar">
                <h3><i class="icon-cog"></i> Update Status Kuliah</h3>
            </div>
            <div class="well">
                <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                    <p>Edit Data Status</b></p>
                </blockquote>
                <form name="myForm" action="<?php echo base_url(); ?>index.php/admin/proses_update_status/<?php echo $data_update->kd; ?>" onsubmit="return validasi();" method="post">     
                    <div class="control-group">
                        <label class="control-label">Tahun Ajaran :</label>
                        <div class="controls">
                            <input type="text" class="span3 m-wrap" name="tahun_ajar1" value="<?php echo $data_update->tahun_ajar1; ?>"> /  
                            <input type="text" class="span3 m-wrap" name="tahun_ajar2" value="<?php echo $data_update->tahun_ajar2; ?>">
                            <span class="help-inline"> * isi dengan angka misalnya 2010</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Semester : </label>
                        <div class="controls">
                            <input type="hidden" name="semester" class="err" value="<?php echo $data_update->kd_semester; ?>" />       
                            <select class="span6 m-wrap"  tabindex="1" name="semester1">
                                <option value="0">Pilih Semester</option>
                                <?php foreach ($isi_semester as $row1): if ($row1->kd_semester == $data_update->kd_semester) { ?>
                                        <option value="<?php echo $row1->kd_semester; ?>" selected><?php echo $row1->nama; ?></option>								
                                    <?php } else { ?>
                                        <option value="<?php echo $row1->kd_semester; ?>"><?php echo $row1->nama; ?></option>																
                                    <?php } endforeach; ?>			
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Status : </label>
                        <div class="controls">
                            <?php
                            if ($check_status_aktif == true) {
                                if ($data_update->status == 1) {
                                    ?>
                                    Aktif <input type="checkbox" name="status" value="1" checked />
                                <?php } else { ?>
                                    Data Sudah Aktif, Silahkan Edit status kuliah yang sudah aktif                                                   
                                <?php } ?>

                            <?php } else { ?>
                                Aktif <input type="checkbox" name="status" value="1"  />
<?php } ?> 
                        </div>
                    </div>
                    <div class="form-actions" style="float:right;">
                        <button type="submit" class="btn btn-warning">EDIT</button>   
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
            if(myForm.tahun_ajar1.value==""){
                alert("Tahun Ajar harus di isi");
                myForm.tahun_ajar1.focus();
                return false;
            }
            if(myForm.tahun_ajar2.value==""){
                alert("Tahun Ajar harus di isi");
                myForm.tahun_ajar2.focus();
                return false;
            }
            else{
                return true;
            }   
        }
    </script>
    