<?php
    $this->load->view('pks/pks');
    // echo $rt;
?>
    <script src="<?php echo base_url('assets/bower_components/chart.js/Chart.js')?>"></script>
    <script src="<?php echo base_url('assets/bower_components/highchart/highcharts.js')?>"></script>
    <div class="container">
    <section class="content-header">
      <h1>
        Beranda
      </h1>
    </section>
        <!-- Main content -->
        <section class="content">
      <!-- Info boxes -->

      <!-- Main row -->
      <div class="row">

            <div class="col-md-6">
              <!-- USERS LIST -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Total Proyek PKS</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding" style="height:250px">
                <div class="chart">
                  <!-- <canvas id="pieChart" style="height:250px"></canvas> -->
                  <div id="pieChart" style="min-width: 310px; height: 420px; max-width: 600px; margin: 0 auto"></div>
                </div>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-footer -->
              </div>
              </div>

              <div class="col-md-6">
                <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Grafik Pertumbuhan Proyek PKS</h3>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <!-- <canvas id="barChart" style="height:230px"></canvas> -->
                    <div id="barChart" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                  </div>
                </div>
                </div>
              </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
             <div class="box-header with-border">
                  <h3 class="box-title">Grafik Respon Waktu Proyek PKS</h3>
             </div>
             <div class="box-body">
               <div class="chart">
                  <!-- <canvas id="barChart2" style="height:250px"></canvas> -->
                  <div id="barChart2" style="min-width: 310px; height: 400px; max-width: auto; margin: 0 auto"></div>
                </div>
              </div>
           </div>
          </div>
      </div>

        <!-- /.col -->
      
      <!-- /.row -->
    </section>
    </div>
    </div>
    <script>

    Highcharts.chart('barChart2', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    credits: {
        enabled: false
    },
    xAxis: {
        categories: [
          <?php foreach($tot_respon as $row) {switch($row->bulan){ case 1: echo '"Januari",';break; 
          case 2: echo '"Februari",';break;case 3: echo '"Maret",';break;case 4: echo '"April",';break;case 5: echo '"Mei",';break;
          case 6: echo '"Juni",';break;case 7: echo '"Juli",';break;case 8: echo '"Agustus",';break;case 9: echo '"September",';break;
          case 10: echo '"Oktober",';break;case 11: echo '"November",';break;case 12: echo '"Desember",';break;}}?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Waktu Respon Proyek PKS (hari)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y} hari</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Respon',
        data: [<?php foreach($tot_respon as $row){echo $row->rata.',';}?>]
    }]
});


    Highcharts.chart('pieChart', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: ''
    },
    credits: {
        enabled: false
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y}</b>'
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
    legend: {
                enabled: true,
                align: 'left',
                width: '100%',
                verticalAlign: 'bottom',
                // useHTML: true,
                labelFormatter: function() {
                    return ' ' + this.name + ' : ' + this.y + ' PKS';
				        }
    },
    series: [{
        name: 'Jumlah Proyek PKS',
        colorByPoint: true,
        data: [
          <?php 
        foreach($grafik_persen as $row){
          echo "{name: '".$row->prsn_pks."%', y: ".$row->total."},";
        }
      ?>
        ]
    }]
});

    Highcharts.chart('barChart', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    credits: {
        enabled: false
    },
    xAxis: {
        categories: [
          <?php foreach($g_t_pks as $row) {switch($row->bulan){ case 1: echo '"Januari",';break; 
          case 2: echo '"Februari",';break;case 3: echo '"Maret",';break;case 4: echo '"April",';break;case 5: echo '"Mei",';break;
          case 6: echo '"Juni",';break;case 7: echo '"Juli",';break;case 8: echo '"Agustus",';break;case 9: echo '"September",';break;
          case 10: echo '"Oktober",';break;case 11: echo '"November",';break;case 12: echo '"Desember",';break;}}?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Total Proyek PKS'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Proyek PKS',
        data: [<?php foreach($g_t_pks as $row){echo $row->tgl.',';}?>]
    }]
});

    </script>
      <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
      </div>
      <strong>Copyright &copy; 2019 <a href="https://adminlte.io"></a>.</strong> All rights
      reserved.
	</div>
   </footer>