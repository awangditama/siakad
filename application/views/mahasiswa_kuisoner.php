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
                        <form name="myForm" class="form-horizontal" action="<?php echo base_url(); ?>index.php/mahasiswa/proses_kuisoner" onsubmit="return periksaForm();" method="post" >
                            <P style="padding-left: 30px; text-align: center; font-size: 16px; font-weight:bold; "> KUISONER AKHIR PERKULIAHAN </P>
                            <div class="control-group" style="padding: 25px 30px;">
                                <label class="control-label" style="font-size:13px; width:300px;">1. Seberapa jelas rencana mata kuliah ini ?</label>
                                <div class="controls" style="margin-left:320px;">
                                    <label class="radio">
                                        <input type="radio" name="pilihan1" id="pilihan1" value="1">
                                        (1) Tidak Jelas <b>( Tidak pernah dijelaskan rencananya ).</b>
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan1" id="pilihan1" value="2">
                                        (2) Kurang Jelas <b>( Diterangkan secara lisan ).</b>
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan1" id="pilihan1" value="3">
                                        (3) Jelas <b>( Diterangkan, ditulis di papan atau transparansi ).</b>
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan1" id="pilihan1" value="4">
                                        (4) Sangat Jelas <b>( Diterangkan, dicetak dan dibagikan).</b>
                                    </label>
                                </div>
                            </div>
                              <div class="control-group" style="padding: 25px 30px;">
                                <label class="control-label" style="font-size:13px; width:300px;">2. Apakah rencana pembelajaran tersebut terlaksana dengan baik ?</label>
                                <div class="controls" style="margin-left:320px;">
                                    <label class="radio">
                                        <input type="radio" name="pilihan2" id="pilihan2" value="1">
                                        (1) Sangat Sedikit <b>yang terlaksana dengan baik (<25%>.</b>
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan2" id="pilihan2" value="2">
                                        (2) Sedikit <b>yang terlaksana dengan baik (>25% - 50%).</b>
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan2" id="pilihan2" value="3">
                                        (3) Banyak <b>yang terlaksana dengan baik (>50% - 75%).</b>
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan2" id="pilihan2" value="4">
                                        (4) Hampir Semua <b>yang terlaksana dengan baik (>75%).</b>
                                    </label>
                                </div>
                            </div>
                            <div class="control-group" style="padding: 25px 30px;">
                                <label class="control-label" style="font-size:13px; width:300px;">3. Rata - rata berapa lama diskusi /tanya jawab/ presentasi , berlangsung pada setiap tatap muka.</label>
                                <div class="controls" style="margin-left:320px;">
                                    <label class="radio">
                                        <input type="radio" name="pilihan3" id="pilihan3" value="1">
                                        (1) Sangat Sedikit <b>(kurang dari 10%).</b>
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan3" id="pilihan3" value="2">
                                        (2) Sedikit <b>(10% -20%).</b>
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan3" id="pilihan3" value="3">
                                        (3) Banyak <b>(lebih dari 20% - 40%).</b>
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan3" id="pilihan3" value="4">
                                        (4) Sangat Banyak<b>(lebih dari 40%).</b>
                                    </label>
                                </div>
                            </div>
                            <div class="control-group" style="padding: 25px 30px;">
                                <label class="control-label" style="font-size:13px; width:300px;">4. Seberapa banyak materi yang bisa anda serap dengan jelas?</label>
                                <div class="controls" style="margin-left:320px;">
                                    <label class="radio">
                                        <input type="radio" name="pilihan4" id="pilihan4" value="1">
                                        (1) Sangat Sedikit <b>(kurang dari 20%).</b>
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan4" id="pilihan4" value="2">
                                        (2) Sedikit <b>(kurang lebih 20% - 40%).</b>
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan4" id="pilihan4" value="3">
                                        (3) Banyak <b>(>40% sampai 60%).</b>
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan4" id="pilihan4" value="4">
                                        (4) Hampir seluruhnya<b>(diatas 60%).</b>
                                    </label>
                                </div>
                            </div>
                             <div class="control-group" style="padding: 25px 30px;">
                                <label class="control-label" style="font-size:13px; width:300px;">5. Seberapa besar manfaat dari tugas yang diberikan dosen ?</label>
                                <div class="controls" style="margin-left:320px;">
                                    <label class="radio">
                                        <input type="radio" name="pilihan5" id="pilihan5" value="1">
                                        (1) Tidak Banyak <b> bermanfaat/menambah beban saja</b>
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan5" id="pilihan5" value="2">
                                        (2) Sedikit <b>menambah kemampuan</b>
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan5" id="pilihan5" value="3">
                                        (3) Banyak <b>menambah kemampuan</b>
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan5" id="pilihan5" value="4">
                                        (4) Sangat Banyak <b>menambah kemampuan</b>
                                    </label>
                                </div>
                            </div>
                            <div class="control-group" style="padding: 25px 30px;">
                                <label class="control-label" style="font-size:13px; width:300px;">6. Apakah tugas /tes/UTS mendapat evaluasi dan koreksi yang memadai ?</label>
                                <div class="controls" style="margin-left:320px;">
                                    <label class="radio">
                                        <input type="radio" name="pilihan6" id="pilihan6" value="1">
                                        (1) Tidak pernah dibahas dan tidak pernah dikembalikan
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan6" id="pilihan5" value="2">
                                        (2) Dibahas secara umum, berkas tidak dikembalikan
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan6" id="pilihan6" value="3">
                                        (3) Dibahas secara rinci, berkas tidak dikembalikan
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan6" id="pilihan6" value="4">
                                        (4) Dibahas secara rinci , berkas dikoreksi dan dibagikan
                                    </label>
                                </div>
                            </div>
                            <div class="control-group" style="padding: 25px 30px;">
                                <label class="control-label" style="font-size:13px; width:300px;">7. Seberapa banyak anda mendapat materi yang up to date ? (Journal, informasi baru, konteks nyata saat ini)</label>
                                <div class="controls" style="margin-left:320px;">
                                    <label class="radio">
                                        <input type="radio" name="pilihan7" id="pilihan7" value="1">
                                        (1) Kurang sekali
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan7" id="pilihan7" value="2">
                                        (2) Kurang
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan7" id="pilihan7" value="3">
                                        (3) Banyak 
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan7" id="pilihan7" value="4">
                                        (4) Sangat Banyak
                                    </label>
                                </div>
                            </div>
                            <div class="control-group" style="padding: 25px 30px;">
                                <label class="control-label" style="font-size:13px; width:300px;">8. Seberapa sering perkuliahan ini berlangsung tepat waktu baik awal maupun akhirnya?</label>
                                <div class="controls" style="margin-left:320px;">
                                    <label class="radio">
                                        <input type="radio" name="pilihan8" id="pilihan8" value="1">
                                        (1) Tidak pernah tepat waktu
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan8" id="pilihan8" value="2">
                                        (2) Jarang tepat waktu
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan8" id="pilihan8" value="3">
                                        (3) Sering tepat waktu
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan8" id="pilihan8" value="4">
                                        (4) Selalu tepat waktu
                                    </label>
                                </div>
                            </div>
                            <div class="control-group" style="padding: 25px 30px;">
                                <label class="control-label" style="font-size:13px; width:300px;">9. Bentuk pembelajaran yang dijalankan, seberapa besar dapat meningkatkan minat dan semangat saudara?</label>
                                <div class="controls" style="margin-left:320px;">
                                    <label class="radio">
                                        <input type="radio" name="pilihan9" id="pilihan9" value="1">
                                        (1) Menjadi sangat tidak bermanfaat
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan9" id="pilihan9" value="2">
                                        (2) Kurang berminat
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan9" id="pilihan9" value="3">
                                        (3) Berminat dan bersemangat
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan9" id="pilihan9" value="4">
                                        (4) Sangat Bergairah dan bersemangat
                                    </label>
                                </div>
                            </div>
                            <div class="control-group" style="padding: 25px 30px;">
                                <label class="control-label" style="font-size:13px; width:300px;">10. Apakah proses evaluasi/peniliaian belajar mahasiswa jelas dan akademis?</label>
                                <div class="controls" style="margin-left:320px;">
                                    <label class="radio">
                                        <input type="radio" name="pilihan10" id="pilihan10" value="1">
                                        (1) Tidak jelas / dan tidak akademis
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan10" id="pilihan10" value="2">
                                        (2) Kurang jelas / kurang akademis
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan10" id="pilihan10" value="3">
                                        (3) Sebagian jelas dan akademis
                                    </label>
                                     <label class="radio">
                                        <input type="radio" name="pilihan10" id="pilihan10" value="4">
                                        (4) Hampir semua jelas dan akademis
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
                var radio_val7 = check_radio(form.pilihan7);
                var radio_val8 = check_radio(form.pilihan8);
                var radio_val9  = check_radio(form.pilihan9);
                var radio_val10 = check_radio(form.pilihan10);
                   
             
               if (radio_val1 === false)
                {
                    alert("Pilihan nomor 1 masih belum di isi!!!");
                    return false;
                }
                if (radio_val2 === false)
                {
                    alert("Pilihan nomor 2 masih belum di isi!!!");
                    return false;
                }
                if (radio_val3 === false)
                {
                    alert("Pilihan nomor 3 masih belum di isi!!!");
                    return false;
                }
                if (radio_val4 === false)
                {
                    alert("Pilihan nomor 4 masih belum di isi!!!");
                    return false;
                }
                if (radio_val5 === false)
                {
                    alert("Pilihan nomor 5 masih belum di isi!!!");
                    return false;
                }
                if (radio_val6 === false)
                {
                    alert("Pilihan nomor 6 masih belum di isi!!!");
                    return false;
                }
                if (radio_val7 === false)
                {
                    alert("Pilihan nomor 7 masih belum di isi!!!");
                    return false;
                }
                if (radio_val8 === false)
                {
                    alert("Pilihan nomor 8 masih belum di isi!!!");
                    return false;
                }
                if (radio_val9 === false)
                {
                    alert("Pilihan nomor 9 masih belum di isi!!!");
                    return false;
                }
                if (radio_val10 === false)
                {
                    alert("Pilihan nomor 10 masih belum di isi!!!");
                    return false;
                }             
                return (true);        
            }
</script>
