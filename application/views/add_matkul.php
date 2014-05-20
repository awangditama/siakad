<div class="container">
    <div class="row-fluid">
        <!-- Forms: Box -->
        <div class="span12">
            <!-- Forms: Top Bar -->
            <div class="top-bar">
                <h3><i class="icon-cog"></i> Data Mata Kuliah Baru</h3>
            </div>
            <div class="well">
                <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                    <p>Input Data Dosen Baru</b></p>
                </blockquote>
                <form name="myForm" action="<?php echo base_url(); ?>index.php/admin/proses_add_matkul"  method="post">     
                    <div class="control-group">
                        <label class="control-label">Kode Mata Kuliah :</label>
                        <div class="controls">
                            <input type="text" class="span4 m-wrap" name="kd_matkul" id="kd_matkul">
                            <span class="help-inline"> </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Nama Mata Kuliah :</label>
                        <div class="controls">
                            <input type="text" class="span4 m-wrap" name="nm_matkul" id="nm_matkul">
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Jumlah SKS :</label>
                        <div class="controls">
                             <input type="text" class="span1 m-wrap" name="jml_sks" id="jml_sks" onKeyUp="return checkInput(this)";/>                                 
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
                    <div class="form-actions" style="float:right;">
                        <button type="submit" class="btn btn-primary" onclick="return validasi();">ADD</button>   
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function validasi()
        {
            if(myForm.kd_matkul.value===""){
                alert("Pilihan KODE MATA KULIAH harus diisi");
                myForm.kd_matkul.focus();
                return false;
            }
            if(myForm.nm_matkul.value===""){
                alert("Pilihan NAMA MATKUL  harus diisi");
                myForm.nm_matkul.focus();
                return false;
            }       
            if(myForm.jml_sks.value===""){
                alert("Pilihan JUMLAH SKS  harus diisi");
                myForm.jml_sks.focus();
                return false;
            }
            if(myForm.semester.value==="0"){
                alert("Pilihan SEMESTER");
                return false;
            }
                else{
                return true;
            }
        }
        
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
    
        
        
        
        
    </script>
