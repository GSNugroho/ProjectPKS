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
                  <ul class="users-list clearfix">
                    <li>
                      Tahapan Status 0%
                      <span class="users-list-date">
                        <?php 
                          foreach($st_1 as $row){
                            echo $row->total;
                          }
                        ?>
                      </span>
                    </li>
                    <li>
                      Tahapan Status 25%
                      <span class="users-list-date">
                        <?php
                          foreach($st_2 as $row){
                            echo $row->total;
                          }
                        ?>
                      </span>
                    </li>
                    <li>
                      Tahapan Status 50%
                      <span class="users-list-date">
                        <?php
                          foreach($st_3 as $row){
                            echo $row->total;
                          }
                        ?>
                      </span>
                    </li>
                    <li>
                      Tahapan Status 75%
                      <span class="users-list-date">
                        <?php
                          foreach($st_4 as $row){
                            echo $row->total;
                          }
                        ?>
                      </span>
                    </li>
                    <li>
                      Tahapan Status 100%
                      <span class="users-list-date">
                        <?php
                          foreach($st_5 as $row){
                            echo $row->total;
                          }
                        ?>
                      </span>
                    </li>
                  </ul>
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
                    <canvas id="areaChart" style="height:230px"></canvas>
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
                  <canvas id="areaChart2" style="height:250px"></canvas>
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
$(function () {
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    
    var areaChart       = new Chart(areaChartCanvas)

    var areaChartData = {
      labels  : [<?php foreach($g_t_pks as $row) {switch($row->bulan){ case 1: echo '"Januari",';break; 
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
          data                : [<?php foreach($g_t_pks as $row){echo $row->tgl.',';}?>]
        }
      ]
    }

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions)

  })

  $(function () {
    var areaChartCanvas = $('#areaChart2').get(0).getContext('2d')
    
    var areaChart       = new Chart(areaChartCanvas)

    var areaChartData = {
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

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions)

  })


    </script>
      <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
      </div>
      <strong>Copyright &copy; 2019 <a href="https://adminlte.io"></a>.</strong> All rights
      reserved.
	</div>
   </footer>