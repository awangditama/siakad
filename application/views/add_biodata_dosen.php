<div class="container">
    <div class="row-fluid">
        <!-- Forms: Box -->
        <div class="span12">
            <!-- Forms: Top Bar -->
            <div class="top-bar">
                <h3><i class="icon-cog"></i> Data Dosen Baru</h3>
            </div>
            <div class="well">
                <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                    <p>Input Data Dosen Baru</b></p>
                </blockquote>
                <form name="myForm" action="<?php echo base_url(); ?>index.php/admin/proses_add_dosen"  method="post">     
                    <div class="control-group">
                        <label class="control-label">NIP :</label>
                        <div class="controls">
                            <input type="text" class="span4 m-wrap" name="nip" id="nip" onKeyUp="return checkInput(this)">
                            <span class="help-inline"> * wajib di isi</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Nama :</label>
                        <div class="controls">
                            <input type="text" class="span5 m-wrap" name="nama" id="nama">
                            <span class="help-inline"> * wajib di isi</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Jenis Kelamin :</label>
                        <div class="controls">
                            <label class="radio"><span><input type="radio" name="jk" id="jk" value="1"></span> Laki - Laki</label>
                            <label class="radio"><span><input type="radio" name="jk" id="jk" value="2" ></span> Perempuan</label>                                 
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Tanggal Lahir :</label>
                        <div class="controls">
                            <input type="text" id="a" class="span2" name="tanggal"id="tanggal"/>
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Tempat Lahir :</label>
                        <div class="controls">
                            <input type="text" class="span3 m-wrap" name="tempat" id="tempat">
                            <span class="help-inline"> </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Alamat :</label>
                        <div class="controls">
                            <textarea class="span5 m-wrap" rows="3" name="alamat" id="alamat"></textarea>
                            <span class="help-inline"> </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Jabatan :</label>
                        <div class="controls">
                            <input type="text" class="span3 m-wrap" name="jabatan" id="jabatan">
                            <span class="help-inline"> </span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">No Telp :</label>
                        <div class="controls">
                            <input type="text" class="span3 m-wrap" name="telp" onKeyUp="return checkInput(this)" id="telp">
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Password Login :</label>
                        <div class="controls">
                            <input type="password" class="span4 m-wrap" name="password" id="pass">
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Ulangi Password :</label>
                        <div class="controls">
                            <input type="password" class="span4 m-wrap" name="password1" id="cpass">
                            <span class="help-inline" id="pwerror"></span>
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
            if(myForm.nip.value===""){
                alert("Pilihan NIP harus diisi");
                myForm.nip.focus();
                return false;
            }
            if(myForm.nama.value===""){
                alert("Pilihan NAMA  harus diisi");
                myForm.nama.focus();
                return false;
            }
            var radio_val = check_radio(myForm.jk);
            if (radio_val === false){
                alert("Anda belum memilih Jenis Kelamin!");
                return false;
            }
            if(myForm.tanggal.value===""){
                alert("Pilihan TANGGAL LAHIR  harus diisi");
                myForm.tanggal.focus();
                return false;
            }
            if(myForm.tempat.value===""){
                alert("Pilihan TEMPAT LAHIR  harus diisi");
                myForm.tempat.focus();
                return false;
            }
            if(myForm.alamat.value===""){
                alert("Pilihan ALAMAT  harus diisi");
                myForm.alamat.focus();
                return false;
            }
            if(myForm.jabatan.value===""){
                alert("Pilihan JABATAN  harus diisi");
                myForm.jabatan.focus();
                return false;
            }
            if(myForm.telp.value===""){
                alert("Pilihan TELEPON  harus diisi");
                myForm.telp.focus();
                return false;
            }
            if(myForm.password.value===""){
                alert("Pilihan PASSWORD  harus diisi");
                myForm.password.focus();
                return false;
            }
            if(myForm.password1.value===""){
                alert("Pilihan CONFIRM PASSWORD  harus diisi");
                myForm.password1.focus();
                return false;
            }
            if(myForm.password1.value!==myForm.password.value){
                alert("Pilihan  PASSWORD  dan CONFIRM PASSWORD TIDAK SAMA");
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
    
        
        $(document).ready(function() {  
          
            var password1       = $('#pass'); //id untuk password pertama  
            var password2       = $('#cpass'); //id untuk password kedua  
            var passwordsInfo   = $('#pwerror'); //id untuk message info  
            passwordStrengthCheck(password1,password2,passwordsInfo); //call password check function  
     
        });  
  
        function passwordStrengthCheck(password1, password2, passwordsInfo)  
        {  
            //Must contain 5 characters or more  
            var WeakPass = /(?=.{5,}).*/;  
            //Must contain lower case letters and at least one digit.  
            var MediumPass = /^(?=\S*?[a-z])(?=\S*?[0-9])\S{5,}$/;  
            //Must contain at least one upper case letter, one lower case letter and one digit.  
            var StrongPass = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])\S{5,}$/;  
            //Must contain at least one upper case letter, one lower case letter and one digit.  
            var VryStrongPass = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=\S*?[^\w\*])\S{5,}$/;  
     
            $(password1).on('keyup', function(e) {  
                if(VryStrongPass.test(password1.val()))  
                {  
                    passwordsInfo.removeClass().addClass('vrystrongpass').html("Very Strong! (Awesome, please don't forget your pass now!)");  
                }    
                else if(StrongPass.test(password1.val()))  
                {  
                    passwordsInfo.removeClass().addClass('strongpass').html("Strong! (Enter special chars to make even stronger");  
                }    
                else if(MediumPass.test(password1.val()))  
                {  
                    passwordsInfo.removeClass().addClass('goodpass').html("Good! (Enter uppercase letter to make strong)");  
                }  
                else if(WeakPass.test(password1.val()))  
                {  
                    passwordsInfo.removeClass().addClass('stillweakpass').html("Still Weak! (Enter digits to make good password)");  
                }  
                else  
                {  
                    passwordsInfo.removeClass().addClass('weakpass').html("Very Weak! (Must be 5 or more chars)");  
                }  
            });  
     
            $(password2).on('keyup', function(e) {  
         
                if(password1.val() !== password2.val())  
                {  
                    passwordsInfo.removeClass().addClass('weakpass').html("Passwords do not match!");    
                }else{  
                    passwordsInfo.removeClass().addClass('goodpass').html("Passwords match!");   
                }  
             
            });  
        }  
    </script>
