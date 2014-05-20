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
                    <p> Berikut adalah gambar grafik kuisoner yang dipilih mahasiswa berdasarkan permasalaha kesulitan dala pembelajaran</p>
                    <p>Mata Kuliah :  <b><?php echo $matkul; ?> (<?php echo $nm_matkul; ?>)</b></p>                    
                </blockquote>
               <?php  if($cek_grafik){ ?>
                <div id="grafik" style="min-width: 310px; height: 400px; margin: 0 auto">
                  
                </div>
                <?php }else{ ?>
                <p style="padding:20px 10px 20px 300px; color:#FF067E; margin:30px 30px 30px 30px; font-size:large;">--Belum ada Mahasiswa yang mengisi kuisoner--</p>
                <?php } ?>
            </div>
        </div>
    </div>
    <script>
    $(function () {
    $('#grafik').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Evaluasi Mata Perkuliahan berdasarkan masalah yang ada'
        },
        tooltip: {
    	    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                 allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
        },
        series: [{
            type: 'pie',
            name: 'Kuisoner',          
            data: 
                [
                <?php foreach($grafik as $row){ ?>
              <?php echo " ['Q".$row->pilihan."',".$row->total."],"; ?>
                <?php } ?>
            ]
        }]
    });
});


    </script>