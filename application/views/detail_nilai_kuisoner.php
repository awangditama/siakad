<div class="container">
    <div class="row-fluid">
        <!-- Forms: Box -->
        <div class="span12">
            <!-- Forms: Top Bar -->
            <div class="top-bar">
                <h3><i class="icon-cog"></i> Nilai IPD Mata Kuliah</h3>
            </div>
            <div class="well">
                <div class="pull-right" style="margin:30px 30px 30px 30px;">
                    <img src="<?php echo base_url(); ?>assets/img/nilai3.png" width="80" height="80"/>
                </div>
                <blockquote style="padding:20px 10px 20px 10px; color:#333; margin:30px 30px 30px 30px;" >
                    <p>Mata Kuliah :  <b><?php echo $matkul; ?> (<?php echo $nm_matkul;?>)</b></p>                    
                    </blockquote>   <table class="table table-bordered" style="color:black;"> 
                        <table class="table table-bordered" style="color:black;">
                        <thead>
                        <tr>

                            <th style="font-weight: bold; font-size:14px;">No</th>
                            <th style="font-weight: bold; font-size:14px;">Nim</th>
                            <?php for($no=1; $no<=10; $no++) {?>
                            <th style="font-weight: bold; font-size:14px;">Q <?php echo $no; ?></th>                            
                            <?php } ?>
                              <th style="font-weight: bold; font-size:14px;">Total</th>
                        <tbody>
                            <?php $no=1;  $temp = array_fill(0, 10, ""); $total=0; foreach($tabel_kuisoner as $row){ ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row->nim; ?></td>
                                <?php 
                                $total_nilai = $row->total;  
                                $string = $row->nilai_mhs;
                                $token = strtok($string, ";");
                                for ($a = 1 ; $a <= $total_nilai ; $a++)
                                    {
                                    echo "<td>".$token."</td>";
                                    $araay[$no][] = $token;
                                    $token = strtok(";");
                                }?> 
                                 <td><?php $total += $row->nilai; echo $row->nilai; ?></td>   
                            </tr>
                             <?php $no++; } ?>
                            <tr>
                                <td colspan="2" style="text-align:center "><b>Jumlah</b></td>
                                <?php for($a=1;$a<=count($araay);$a++){
                                      for($b=0;$b<count($araay[$a]);$b++){ 
                                           $temp[$b] += $araay[$a][$b];  ?>                                          
                                    <?php }}?>
                                    <?php $t=count($araay);  for($b=0;$b<count($araay[$t]);$b++){ ?>
                                     <td> <?php echo $temp[$b]; ?></td>
                                      <?php } ?>
                                  <td><?php echo $total;?></td>                                  
                            </tr>                  
                        </tbody>              
                    </thead>		
                </table>
                         <div class="pull-right" style="margin:30px 30px 30px 30px;">
                             <button class="btn btn-bookmark-empty" type="button" disabled="true"><h2>  Nilai IPD : <?php $nilai_ipd_matkul = ($total*10)/(count($araay)*100); echo round($nilai_ipd_matkul,2);?></h2></button>                           
                         </div>
                
                   <p  style="padding:20px 10px 20px 10px;  margin:30px 30px 0px 0px; color: #000;">Kriteria Penilian :  </p> 
                   <ol style="padding:0px 10px 20px 10px;  color: #000;">
                       <li>Nilai kriteria <font style="color:blue; background-color: #47b5e5;  font-weight:bold;">SANGAT BAIK</font> dengan nilai : <?php $nilai_ipd= (40*count($araay)*10)/(count($araay)*100); echo $nilai_ipd;?></li>                             
                       <li>Nilai kriteria <font style="color:greenyellow; background-color: #005702; font-weight:bold;">BAIK</font> dengan nilai : <?php $nilai_ipd= (30*count($araay)*10)/(count($araay)*100); echo $nilai_ipd;?></li>
                       <li>Nilai kriteria <font style="color:yellow; background-color: #FF9C08; font-weight:bold;">CUKUP</font> dengan nilai : <?php $nilai_ipd= (20*count($araay)*10)/(count($araay)*100); echo $nilai_ipd;?></li>
                       <li>Nilai kriteria <font style="color:red; background-color: tomato; font-weight:bold;">JELEK</font> dengan nilai : <?php $nilai_ipd= (10*count($araay)*10)/(count($araay)*100); echo $nilai_ipd;?></li>
                   </ol>          
            </div>
        </div>
    </div>


