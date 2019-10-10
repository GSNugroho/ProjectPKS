<?php
    $this->load->view('pks/pks');
    // echo $rt;
?>
    <script src="<?php echo base_url('assets/bower_components/chart.js/Chart.js')?>"></script>
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
                  <h3 class="box-title">Total PKS</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding" style="height:250px">
                <div class="chart">
                  <canvas id="pieChart" style="height:250px"></canvas>
                </div>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-footer -->
              </div>
              </div>

              <div class="col-md-6">
                <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Grafik Pertumbuhan PKS</h3>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="barChart" style="height:230px"></canvas>
                  </div>
                </div>
                </div>
              </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
             <div class="box-header with-border">
                  <h3 class="box-title">Grafik Respon Waktu PKS</h3>
             </div>
             <div class="box-body">
               <div class="chart">
                  <canvas id="barChart2" style="height:250px"></canvas>
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
  
    var areaChartDatar = {
      labels  : [<?php foreach($tot_respon as $row) {switch($row->bulan){ case 1: echo '"Januari",';break; 
      case 2: echo '"Februari",';break;case 3: echo '"Maret",';break;case 4: echo '"April",';break;case 5: echo '"Mei",';break;
      case 6: echo '"Juni",';break;case 7: echo '"Juli",';break;case 8: echo '"Agustus",';break;case 9: echo '"September",';break;
      case 10: echo '"Oktober",';break;case 11: echo '"November",';break;case 12: echo '"Desember",';break;}}?>],
      datasets: [
        {
          label               : 'Digital Goods',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php foreach($tot_respon as $row){echo $row->rata.',';}?>]
        }
      ]
    }
    var barChartCanvas                   = $('#barChart2').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartDatar
    barChartData.datasets[0].fillColor   = '#0dfff7'
    barChartData.datasets[0].strokeColor = '#0dfff7'
    barChartData.datasets[0].pointColor  = '#0dd7ff'
    
    var barChartOptions                  = {
      scaleBeginAtZero        : true,
      scaleShowGridLines      : true,
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      scaleGridLineWidth      : 1,
      scaleShowHorizontalLines: true,
      scaleShowVerticalLines  : true,
      barShowStroke           : true,
      barStrokeWidth          : 2,
      barValueSpacing         : 5,
      barDatasetSpacing       : 1,
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)


    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      <?php 
        foreach($grafik_persen as $row){
          echo "{value: ".$row->total.", label : '".$row->prsn_pks."'},";
        }
      ?>
    ]
    var pieOptions     = {
      segmentShowStroke    : true,
      segmentStrokeColor   : '#fff',
      segmentStrokeWidth   : 2,
      percentageInnerCutout: 50,
      animationSteps       : 100,
      animationEasing      : 'easeOutBounce',
      animateRotate        : true,
      animateScale         : false,
      responsive           : true,
      maintainAspectRatio  : true,
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }

    pieChart.Doughnut(PieData, pieOptions)
  

  var areaChartData = {
      labels  : [<?php foreach($g_t_pks as $row) {switch($row->bulan){ case 1: echo '"Januari",';break; 
      case 2: echo '"Februari",';break;case 3: echo '"Maret",';break;case 4: echo '"April",';break;case 5: echo '"Mei",';break;
      case 6: echo '"Juni",';break;case 7: echo '"Juli",';break;case 8: echo '"Agustus",';break;case 9: echo '"September",';break;
      case 10: echo '"Oktober",';break;case 11: echo '"November",';break;case 12: echo '"Desember",';break;}}?>],
      datasets: [
        {
          
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php foreach($g_t_pks as $row){echo $row->tgl.',';}?>]
        }
      ]
    }

    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[0].fillColor   = '#80ff00'
    barChartData.datasets[0].strokeColor = '#80ff00'
    barChartData.datasets[0].pointColor  = '#80ff00'

    var barChartOptions                  = {
      scaleBeginAtZero        : true,
      scaleShowGridLines      : true,
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      scaleGridLineWidth      : 1,
      scaleShowHorizontalLines: true,
      scaleShowVerticalLines  : true,
      barShowStroke           : true,
      barStrokeWidth          : 2,
      barValueSpacing         : 5,
      barDatasetSpacing       : 1,
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)

    </script>
      <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
      </div>
      <strong>Copyright &copy; 2019 <a href="https://adminlte.io"></a>.</strong> All rights
      reserved.
	</div>
   </footer>