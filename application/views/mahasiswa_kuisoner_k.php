<div class="container">
    <div class="row-fluid">
        <!-- Forms: Box -->
        <div class="span12">
            <!-- Forms: Top Bar -->
            <div class="top-bar">
                <h3><i class="icon-cog"></i> Nilai Presensi Mahasiswa</h3>
            </div>
            <?php if ($aktif != "") { ?>
                <div class="well no-padding">
                    <div class="pull-right" style="margin:30px 30px 30px 30px;">
                        <img src="<?php echo base_url(); ?>assets/img/nilai_absensi.png" width="80" height="80"/>
                    </div>
                    <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                        <p><font style="color:red; font-weight:bold;"><?php echo $aktif; ?></font></p>
                    </blockquote><?php echo "</div></div></div></div>"; ?>
                <?php } else { ?>     
                    <div class="well no-padding">
                        <div class="pull-right" style="margin:30px 30px 30px 30px;">
                            <img src="<?php echo base_url(); ?>assets/img/nilai2.png" width="80" height="80"/>
                        </div>
                        <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                            <p>Sebelum menggunakan sistem ini, Mahasiswa wajib mengisi kuisoner untuk dosen</p>
                            <small>Kuisioner Dosen</small>
                        </blockquote>
                        <form name="myForm" class="form-horizontal" action="<?php echo base_url(); ?>index.php/mahasiswa/proses_kusioner_k" onsubmit="return periksaForm();" method="post" >
                            <P style="padding-left: 30px; text-align: center; font-size: 16px; font-weight:bold; "> KUISONER PERTEMUAN KOMPETENSI  </P>
                            <P style="padding-left: 30px; text-align: left; font-size: 14px; font-weight:bold; "> Bila anda mempunyai kesulitan belajar mata kuliah ini, menurut pendapat anda, apa aspek penyebabnya ? (pilih yang dominan) </P>
                            <div class="control-group" style="padding: 25px 30px;">
                                <label  class="control-label"  style="font-size:13px; width:300px; position: inherit;">1. Materi yang diajarkan ?</label>
                                <div class="controls" style="margin-left:300px;">
                                    <label class="radio">
                                        <input type="hidden" name="pilihan1" id="pilihan1" value="0"/>
                                        <input type="hidden" name="soal1" id="pilihan1" value="1"/>                                
                                        <input type="radio" name="pilihan1" id="pilihan1" value="1">
                                        (1) Sukar 
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="pilihan1" id="pilihan1" value="2" >
                                        (2) Terlalu banyak
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="pilihan1" id="pilihan1" value="3" >
                                        (3) Tidak Relevan
                                    </label>
                                </div>
                            </div>
                            <div class="control-group" style="padding: 25px 30px;">
                                <label class="control-label" style="font-size:13px; width:300px; position:inherit ">2. Buku Acuaannya ?</label>
                                <div class="controls" style="margin-left:300px;">
                                    <label class="radio">
                                        <input type="hidden" name="pilihan2" id="pilihan1" value="0"/>
                                        <input type="hidden" name="soal2" id="pilihan1" value="2"/>                                
                                        <input type="radio" name="pilihan2" id="pilihan2" value="1">
                                        (1) Sukar didapat 
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="pilihan2" id="pilihan2" value="2">
                                        (2) Terlalu banyak
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="pilihan2" id="pilihan2" value="3">
                                        (3) Berbahasa Inggris
                                    </label>
                                </div>
                            </div>
                            <div class="control-group" style="padding: 25px 30px;">
                                <label class="control-label" style="font-size:13px; width:300px; position: inherit;">3. Media / Alat yang digunnakan ? </label>
                                <div class="controls" style="margin-left:300px;">
                                    <label class="radio">
                                        <input type="hidden" name="pilihan3" id="pilihan1" value="0"/>
                                        <input type="hidden" name="soal3" id="pilihan1" value="3"/>                                                                      
                                        <input type="radio" name="pilihan3" id="pilihan3" value="1">
                                        (1) Kurang Komunikatif
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="pilihan3" id="pilihan3" value="2">
                                        (2) Kurang lengkap
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="pilihan3" id="pilihan3" value="3">
                                        (3) Alatnya kuno
                                    </label>
                                </div>
                            </div>
                            <div class="control-group" style="padding: 25px 30px;">
                                <label class="control-label" style="font-size:13px; width:300px; position: inherit;">4. Suasana Kelas yang  ?</label>
                                <div class="controls" style="margin-left:300px;">
                                    <label class="radio">
                                        <input type="hidden" name="pilihan4" id="pilihan1" value="0"/>
                                        <input type="hidden" name="soal4" id="pilihan1" value="4"/>                                
                                        <input type="radio" name="pilihan4" id="pilihan4" value="1">
                                        (1) Kotor
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="pilihan4" id="pilihan4" value="2">
                                        (2) Panas
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="pilihan4" id="pilihan4" value="3">
                                        (3) Terlalu padat
                                    </label>
                                </div>
                            </div>
                            <div class="control-group" style="padding: 25px 30px;">
                                <label class="control-label" style="font-size:13px; width:300px; position: inherit;">5. Dosen dalam mengajar ?</label>
                                <div class="controls" style="margin-left:300px;">
                                    <label class="radio">
                                        <input type="hidden" name="pilihan5" id="pilihan1" value="0"/>
                                        <input type="hidden" name="soal5" id="pilihan1" value="5"/>                                                                    
                                        <input type="radio" name="pilihan5" id="pilihan5" value="1">
                                        (1) Suara tidak jelas
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="pilihan5" id="pilihan5" value="2">
                                        (2) Tampilan kurang menarik
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="pilihan5" id="pilihan5" value="3">
                                        (3) Pemarah
                                    </label>
                                </div>
                            </div>
                            <div class="control-group" style="padding: 25px 30px;">
                                <label class="control-label" style="font-size:13px; width:300px; position: inherit;">6. Alasan pribadi ?</label>
                                <div class="controls" style="margin-left:300px;">
                                    <label class="radio">
                                        <input type="hidden" name="pilihan6" id="pilihan1" value="0"/>
                                        <input type="hidden" name="soal6" id="pilihan1" value="6"/>                                                                      
                                        <input type="radio" name="pilihan6" id="pilihan6" value="1">
                                        (1) Biaya
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="pilihan6" id="pilihan6" value="2">
                                        (2) Keluarga
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="pilihan6" id="pilihan6" value="3">
                                        (3) Kemampuan saya yang terbatas
                                    </label>
                                </div>
                            </div>


                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="button" class="btn">Cancel</button>     
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
        <script>
            
            function periksaForm(){
                
                var form  = document.myForm;
                function check_radio(radio)
                {
                    // memeriksa apakah radio button sudah ada yang dipilih
                    for (i = 0; i < radio.length; i++)
                    {
                        if (radio[i].checked === true)
                        {
                            return radio[i].value;
                        }
                    }
                    return false;
                }                
                var radio_val1 = check_radio(form.pilihan1);
                var radio_val2 = check_radio(form.pilihan2);
                var radio_val3 = check_radio(form.pilihan3);
                var radio_val4 = check_radio(form.pilihan4);
                var radio_val5 = check_radio(form.pilihan5);
                var radio_val6 = check_radio(form.pilihan6);
              
                //soal 1
                if(radio_val1 === false && radio_val2 === false && radio_val3  === false && radio_val4 === false && radio_val5  === false && radio_val6  === false){
                    alert('Pilihlah satu kuisoner saja, tidak boleh memilih lebih dari satu kuisoner');
                    return false;
                }else{
                    if(radio_val1 > 0 && radio_val2 === false && radio_val3  === false && radio_val4 === false && radio_val5  === false && radio_val6  === false){
                        return true;
                    }else if(radio_val1 === false && radio_val2 > 0 && radio_val3  === false && radio_val4 === false && radio_val5  === false && radio_val6  === false){
                        return true;
                    }else if(radio_val1 === false && radio_val2 === false && radio_val3  > 0  && radio_val4 === false && radio_val5  === false && radio_val6  === false){
                        return true;
                    }else if(radio_val1 === false && radio_val2 === false && radio_val3  === false  && radio_val4 > 0 && radio_val5  === false && radio_val6  === false){
                        return true;
                    }else if(radio_val1 === false && radio_val2 === false && radio_val3  === false  && radio_val4 === false && radio_val5  > 0 && radio_val6  === false){
                        return true;
                    }else if(radio_val1 === false && radio_val2 === false && radio_val3  === false  && radio_val4 === false && radio_val5  === false && radio_val6  > 0){
                        return true;
                    }
                    alert('Pilihlah satu kuisoner saja, tidak boleh memilih lebih dari satu kuisoner');
                    return false;
                }
              
            }
               
        </script>