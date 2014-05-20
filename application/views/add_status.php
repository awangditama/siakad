<div class="container">
    <div class="row-fluid">
        <!-- Forms: Box -->
        <div class="span12">
            <!-- Forms: Top Bar -->
            <div class="top-bar">
                <h3><i class="icon-cog"></i> New Status Kuliah</h3>
            </div>
            <div class="well">
                <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                    <p>Input Data Status Baru</b></p>
                </blockquote>
                <form name="myForm" action="<?php echo base_url(); ?>index.php/admin/input_form_status" onsubmit="return validasi();" method="post">     
                    <div class="control-group">
                        <label class="control-label">Tahun Ajaran :</label>
                        <div class="controls">
                            <input type="text" class="span3 m-wrap" name="tahun_ajar1" onKeyUp="return checkInput(this)">
                             /  <input type="text" class="span3 m-wrap" name="tahun_ajar2" onKeyUp="return checkInput(this)">
                            <span class="help-inline"> * isi dengan angka misalnya 2010</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Semester : </label>
                        <div class="controls">
                            <select class="span4 m-wrap" data-placeholder="Choose a Category" tabindex="1" name="semester">
                                <option value="0">Pilih Semester</option>
                                <?php foreach ($isi_semester as $row1): ?>
                                    <option value="<?php echo $row1->kd_semester; ?>"><?php echo $row1->nama; ?></option>	
                                <?php endforeach; ?>		
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Status : </label>
                        <div class="controls">
                             <?php echo $pilihan; ?>
                              <?php echo $kata; ?>
                        </div>
                    </div>
                     <div class="form-actions" style="float:right;">
                        <button type="submit" class="btn btn-primary">ADD</button>   
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
