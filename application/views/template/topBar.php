<!-- Information Boxes -->
<div class="row-fluid">
    <!-- Information Boxes: Users Registered -->
    <div class="span3 well infobox">
        <i class="icon-6x icon-user"></i>
        <div class="pull-right text-right">
       <?php echo $nama; ?><br>
            <b class="huge"><?php foreach ($type as $row): echo $row->nama;
endforeach ?></b><br>
            <span class="caps muted">Type</span>
        </div>
    </div>
    <!-- / Information Boxes: Users Registered -->

    <!-- Information Boxes: Active Users -->
    <div class="span3 well infobox">
        <i class="icon-6x icon-list-alt"></i>
        <div class="pull-right text-right">
            Status Akademik<br>
            <?php if($this->session->userdata('status') != false) {?><i class="icon-check"></i> <b class="huge">Aktif</b> 
                <?php }else
                {echo '<i class="icon-remove-sign"></i><b class="huge">Tidak Aktif</b>';}?><br>
        </div>
    </div>
    <!-- / Information Boxes: Active Users -->

    <!-- Information Boxes: Images -->
    <div class="span3 well infobox">
        <i class="icon-6x icon-list"></i>
        <div class="pull-right text-right">
            Tahun Pelajaran <br>
            <b class="huge"><?php if($this->session->userdata('status') != false) {?><?php  echo $this->session->userdata('tahun_ajar1')."/".$this->session->userdata('tahun_ajar2'); ?> <?php }else
                { echo '-';}?></b><br>
        </div>
    </div>
    <!-- / Information Boxes: Images -->

    <!-- Information Boxes: Applications -->
    <div class="span3 well infobox">
        <i class="icon-6x icon-calendar"></i>
        <div class="pull-right text-right">
           <?php $a_hari = array(1=>"Senin","Selasa","Rabu","Kamis","Jumat", "Sabtu","Minggu");
                        $hari = $a_hari[date("N")]; echo $hari;?> <br>
            <b class="huge"><?php $tgl = date('d-m-Y');echo $tgl;?></b><br>
            <span class="caps muted"><div id="clock"></div></span>
        </div>
    </div>
    <!-- / Information Boxes: Applications -->

</div>
<!-- / Information Boxes -->
<script type="text/javascript">
<!--
function startTime() {
    var today=new Date(),
        curr_hour=today.getHours(),
        curr_min=today.getMinutes(),
        curr_sec=today.getSeconds();
 curr_hour=checkTime(curr_hour);
    curr_min=checkTime(curr_min);
    curr_sec=checkTime(curr_sec);
    document.getElementById('clock').innerHTML=curr_hour+":"+curr_min+":"+curr_sec;
}
function checkTime(i) {
    if (i<10) {
        i="0" + i;
    }
    return i;
}
setInterval(startTime, 500);
//-->
</script>