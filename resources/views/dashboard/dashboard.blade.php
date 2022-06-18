 @extends('layout.master')


 @section('konten')
 <div class="page-header">

     <h3 class="page-title">
         <span class="page-title-icon bg-gradient-primary text-white me-2">
             <i class="mdi mdi-home"></i>
         </span>
         Dashboard
     </h3>
     <nav aria-label="breadcrumb">
         <ul class="breadcrumb">
             <li class="breadcrumb-item active" aria-current="page">
                 <span></span>Overview
                 <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
             </li>
         </ul>
     </nav>
 </div>
 <div class="row">
     <div class="col-md-4 stretch-card grid-margin">
         <div class="card bg-gradient-danger card-img-holder text-white">
             <div class="card-body">
                 <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                 <h4 class="font-weight-normal mb-3">
                     Akun Pengguna
                     <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                 </h4>
                 <h2 class="mb-5">{{$jumlah_user}}</h2>
                 <h6 class="card-text">
                     Jumlah akun pengguna
                 </h6>
             </div>
         </div>
     </div>
     <div class="col-md-4 stretch-card grid-margin">
         <div class="card bg-gradient-info card-img-holder text-white">
             <div class="card-body">
                 <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                 <h4 class="font-weight-normal mb-3">
                     Responden Kuesioner
                     <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                 </h4>
                 <h2 class="mb-5">{{$jumlah_reponden_total}}</h2>
                 <h6 class="card-text">
                     Total Responden Kuesioner
                 </h6>
             </div>
         </div>
     </div>
     <div class="col-md-4 stretch-card grid-margin">
         <div class="card bg-gradient-success card-img-holder text-white">
             <div class="card-body">
                 <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                 <h4 class="font-weight-normal mb-3">
                     Complaint
                     <i class="mdi mdi-diamond mdi-24px float-right"></i>
                 </h4>
                 <h2 class="mb-5">{{$jumlah_complaint}}</h2>
                 <h6 class="card-text">
                     Jumlah complaint pengguna
                 </h6>
             </div>
         </div>
     </div>
 </div>
 <div class="row">
     <div class="col-md-7 grid-margin stretch-card">
         <div class="card">
             <div class="card-body">
                 <div class="clearfix">
                     <h4 class="card-title float-left">
                         Grafik Statistik Persentase Tingkat Kepuasan
                     </h4>
                     <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                 </div>
                 <canvas id="visit-sale-chart" class="mt-4"></canvas>
             </div>

         </div>


     </div>
     <div class="col-md-5 grid-margin stretch-card">
         <div class="card">
             <div class="card-body">
                 <h4 class="card-title">
                     Grafik Persentase Keseluruhan
                 </h4>
                 
                 <canvas id="traffic-chart"></canvas>
                 <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>

             </div>
         </div>
     </div>
 </div>
 <div class="row">
     <div class="col-md-7 grid-margin stretch-card">
         <div class="card">
             <div class="card-body">
                 <h4 class="card-title">
                     Grafik Detail Kuesioner
                 </h4>
                 <div class="form-group">
                                 <select class="form-control text-dark" aria-label="Default select example" name="pilih_kuesioner" id="pilih_kuesioner">
                                    <option value="">Pilih Kuesioner</option>
                                    <option value="produk">Produk</option>
                                    <option value="Kepuasan Pelanggan">Kepuasan Pelanggan</option>
                                    <option value="Pelayanan">Pelayanan</option>
                                </select>
                                </div>
                 <canvas id="kuesioner_chart"></canvas>
                 <div id="kuesioner_chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
             </div>

         </div>


     </div>
 </div>
 
 <script>
            if ($("#visit-sale-chart").length) {
                    Chart.defaults.global.legend.labels.usePointStyle = true;
                    var ctx = document.getElementById('visit-sale-chart').getContext("2d");

                    var gradientStrokeViolet = ctx.createLinearGradient(0, 0, 0, 181);
                    gradientStrokeViolet.addColorStop(0, 'rgba(218, 140, 255, 1)');
                    gradientStrokeViolet.addColorStop(1, 'rgba(154, 85, 255, 1)');
                    var gradientLegendViolet = 'linear-gradient(to right, rgba(218, 140, 255, 1), rgba(154, 85, 255, 1))';
                    
                    var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 360);
                    gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
                    gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
                    var gradientLegendBlue = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))';

                    var gradientStrokeRed = ctx.createLinearGradient(0, 0, 0, 300);
                    gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
                    gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
                    var gradientLegendRed = 'linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))';

                        var gradientStrokeGreen = ctx.createLinearGradient(0, 0, 0, 300);
                    gradientStrokeGreen.addColorStop(0, 'rgba(6, 185, 157, 1)');
                    gradientStrokeGreen.addColorStop(1, 'rgba(132, 217, 210, 1)');
                    var gradientLegendGreen = 'linear-gradient(to right, rgba(6, 185, 157, 1), rgba(132, 217, 210, 1))';      

                            var gradientStrokeA = ctx.createLinearGradient(0, 0, 0, 300);
                    gradientStrokeA.addColorStop(0, 'rgba(6, 85, 57, 1)');
                    gradientStrokeA.addColorStop(1, 'rgba(32, 17, 10, 1)');
                    var gradientLegendA = 'linear-gradient(to right, rgba(6, 85, 57, 1), rgba(32, 17, 10, 1))';      

                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                        
                            labels: [
                                '2020', '2021', '2022'
                            ],
                            datasets: [
                            {
                                label: "Sangat Setuju",
                                borderColor: gradientStrokeViolet,
                                backgroundColor: gradientStrokeViolet,
                                hoverBackgroundColor: gradientStrokeViolet,
                                legendColor: gradientLegendViolet,
                                pointRadius: 0,
                                fill: false,
                                borderWidth: 1,
                                fill: 'origin',
                                data: [{{$ss_2020}}, {{$ss_2021}}, {{$ss_2022}}]
                            },
                            {
                                label: "Setuju",
                                borderColor: gradientStrokeRed,
                                backgroundColor: gradientStrokeRed,
                                hoverBackgroundColor: gradientStrokeRed,
                                legendColor: gradientLegendRed,
                                pointRadius: 0,
                                fill: false,
                                borderWidth: 1,
                                fill: 'origin',
                                data: [{{$s_2020}}, {{$s_2021}}, {{$s_2022}}]
                            },
                            {
                                label: "Normal",
                                borderColor: gradientStrokeBlue,
                                backgroundColor: gradientStrokeBlue,
                                hoverBackgroundColor: gradientStrokeBlue,
                                legendColor: gradientLegendBlue,
                                pointRadius: 0,
                                fill: false,
                                borderWidth: 1,
                                fill: 'origin',
                                data: [{{$n_2020}}, {{$n_2021}}, {{$n_2022}}]
                            },
                            {
                                label: "Tidak Setuju",
                                borderColor: gradientStrokeGreen,
                                backgroundColor: gradientStrokeGreen,
                                hoverBackgroundColor: gradientStrokeGreen,
                                legendColor: gradientLegendGreen,
                                pointRadius: 0,
                                fill: false,
                                borderWidth: 1,
                                fill: 'origin',
                                data: [{{$ts_2020}}, {{$ts_2021}}, {{$ts_2022}}]
                            },
                            {
                                label: "Sangat Tidak Setuju",
                                borderColor: gradientStrokeA,
                                backgroundColor: gradientStrokeA,
                                hoverBackgroundColor: gradientStrokeA,
                                legendColor: gradientLegendA,
                                pointRadius: 0,
                                fill: false,
                                borderWidth: 1,
                                fill: 'origin',
                                data: [{{$sts_2020}}, {{$sts_2021}}, {{$sts_2022}}]
                            }
                        ]
                        },
                        options: {
                        responsive: true,
                        legend: false,
                        legendCallback: function(chart) {
                            var text = []; 
                            text.push('<ul>'); 
                            for (var i = 0; i < chart.data.datasets.length; i++) { 
                                text.push('<li><span class="legend-dots" style="background:' + 
                                        chart.data.datasets[i].legendColor + 
                                        '"></span>'); 
                                if (chart.data.datasets[i].label) { 
                                    text.push(chart.data.datasets[i].label); 
                                } 
                                text.push('</li>'); 
                            } 
                            text.push('</ul>'); 
                            return text.join('');
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    display: true,
                                    min: 0,
                                    stepSize: 25,
                                    max: 100
                                },
                                gridLines: {
                                    drawBorder: false,
                                    color: 'rgba(235,237,242,1)',
                                    zeroLineColor: 'rgba(235,237,242,1)'
                                }
                            }],
                            xAxes: [{
                                gridLines: {
                                    display:false,
                                    drawBorder: false,
                                    color: 'rgba(0,0,0,1)',
                                    zeroLineColor: 'rgba(235,237,242,1)'
                                },
                                ticks: {
                                    padding: 20,
                                    fontColor: "#9c9fa6",
                                    autoSkip: true,
                                },
                                categoryPercentage: 0.8,
                                barPercentage: 0.8
                            }]
                            }
                        },
                        elements: {
                            point: {
                            radius: 0
                            }
                        }
                    })
                    $("#visit-sale-chart-legend").html(myChart.generateLegend());
    }

     if ($("#traffic-chart").length) {

                            var gradientStrokeViolet = ctx.createLinearGradient(0, 0, 0, 181);
                    gradientStrokeViolet.addColorStop(0, 'rgba(218, 140, 255, 1)');
                    gradientStrokeViolet.addColorStop(1, 'rgba(154, 85, 255, 1)');
                    var gradientLegendViolet = 'linear-gradient(to right, rgba(218, 140, 255, 1), rgba(154, 85, 255, 1))';

      var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 181);
      gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
      gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
      var gradientLegendBlue = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))';

      var gradientStrokeRed = ctx.createLinearGradient(0, 0, 0, 50);
      gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
      gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
      var gradientLegendRed = 'linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))';

      var gradientStrokeGreen = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStrokeGreen.addColorStop(0, 'rgba(6, 185, 157, 1)');
      gradientStrokeGreen.addColorStop(1, 'rgba(132, 217, 210, 1)');
      var gradientLegendGreen = 'linear-gradient(to right, rgba(6, 185, 157, 1), rgba(132, 217, 210, 1))';      

         var gradientStrokeA = ctx.createLinearGradient(0, 0, 0, 300);
                    gradientStrokeA.addColorStop(0, 'rgba(6, 85, 57, 1)');
                    gradientStrokeA.addColorStop(1, 'rgba(32, 17, 10, 1)');
                    var gradientLegendA = 'linear-gradient(to right, rgba(6, 85, 57, 1), rgba(32, 17, 10, 1))';      

        

      var trafficChartData = {
        datasets: [{
          data: [{{$puas}}, {{$tidak_puas}}],
          backgroundColor: [
            gradientStrokeBlue,
            gradientStrokeGreen
                      ],
          hoverBackgroundColor: [
            gradientStrokeBlue,
            gradientStrokeGreen,
          ],
          borderColor: [
            gradientStrokeBlue,
            gradientStrokeGreen,
            
          ],
          legendColor: [
            gradientLegendBlue,
            gradientLegendGreen,
          ]
        }],
    
        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
          'Puas ',
          'Tidak Puas '
                  ]
      };
      var trafficChartOptions = {
        responsive: true,
        animation: {
          animateScale: true,
          animateRotate: true
        },
        legend: false,
        legendCallback: function(chart) {
          var text = []; 
          text.push('<ul>'); 
          for (var i = 0; i < trafficChartData.datasets[0].data.length; i++) { 
              text.push('<li><span class="legend-dots" style="background:' + 
              trafficChartData.datasets[0].legendColor[i] + 
                          '"></span>'); 
              if (trafficChartData.labels[i]) { 
                  text.push(trafficChartData.labels[i]); 
              }
              text.push('<span class="float-right">'+trafficChartData.datasets[0].data[i]+'</span>')
              text.push('</li>'); 
          } 
          text.push('</ul>'); 
          return text.join('');
        }
      };

      var trafficChartCanvas = $("#traffic-chart").get(0).getContext("2d");
      var trafficChart = new Chart(trafficChartCanvas, {
        type: 'doughnut',
        data: trafficChartData,
        options: trafficChartOptions
      });
      $("#traffic-chart-legend").html(trafficChart.generateLegend());      
    }

         $('#pilih_kuesioner').on('change',function () {
            let pilih_kuesioner = $('#pilih_kuesioner').val();
            
            if (pilih_kuesioner == "produk") {
                if ($("#kuesioner_chart").length) {
                    var gradientStrokeViolet = ctx.createLinearGradient(0, 0, 0, 181);
                    gradientStrokeViolet.addColorStop(0, 'rgba(218, 140, 255, 1)');
                    gradientStrokeViolet.addColorStop(1, 'rgba(154, 85, 255, 1)');
                    var gradientLegendViolet = 'linear-gradient(to right, rgba(218, 140, 255, 1), rgba(154, 85, 255, 1))';

                    var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 181);
                    gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
                    gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
                    var gradientLegendBlue = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))';

                    var gradientStrokeRed = ctx.createLinearGradient(0, 0, 0, 50);
                    gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
                    gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
                    var gradientLegendRed = 'linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))';

                    var gradientStrokeGreen = ctx.createLinearGradient(0, 0, 0, 300);
                    gradientStrokeGreen.addColorStop(0, 'rgba(6, 185, 157, 1)');
                    gradientStrokeGreen.addColorStop(1, 'rgba(132, 217, 210, 1)');
                    var gradientLegendGreen = 'linear-gradient(to right, rgba(6, 185, 157, 1), rgba(132, 217, 210, 1))';      

                    var gradientStrokeA = ctx.createLinearGradient(0, 0, 0, 300);
                    gradientStrokeA.addColorStop(0, 'rgba(6, 85, 57, 1)');
                    gradientStrokeA.addColorStop(1, 'rgba(32, 17, 10, 1)');
                    var gradientLegendA = 'linear-gradient(to right, rgba(6, 85, 57, 1), rgba(32, 17, 10, 1))';      

        

                    var trafficChartData = {
                        datasets: [{
                        data: [{{$produk_ss}}, {{$produk_s}}, {{$produk_n}},{{$produk_ts}},{{$produk_sts}}],
                        backgroundColor: [
                            gradientStrokeBlue,
                            gradientStrokeGreen,
                            gradientStrokeRed,
                            gradientStrokeA,
                            gradientStrokeViolet
                        ],
                        hoverBackgroundColor: [
                            gradientStrokeBlue,
                            gradientStrokeGreen,
                            gradientStrokeRed,
                            gradientStrokeA,
                            gradientStrokeViolet
                        ],
                        borderColor: [
                            gradientStrokeBlue,
                            gradientStrokeGreen,
                            gradientStrokeRed,
                            gradientStrokeA,
                            gradientStrokeViolet
                            
                        ],
                        legendColor: [
                            gradientLegendBlue,
                            gradientLegendGreen,
                            gradientLegendRed,
                            gradientLegendA,
                            gradientLegendViolet
                        ]
                        }],
                    
                        // These labels appear in the legend and in the tooltips when hovering different arcs
                        labels: [
                        'Sangat Setuju ',
                        'Setuju ',
                        'Normal ',
                        'Tidak Setuju ',
                        'Sangat Tidak Setuju ',
                        ]
                    };
                    var trafficChartOptions = {
                        responsive: true,
                        animation: {
                        animateScale: true,
                        animateRotate: true
                        },
                        legend: false,
                        legendCallback: function(chart) {
                        var text = []; 
                        text.push('<ul>'); 
                        for (var i = 0; i < trafficChartData.datasets[0].data.length; i++) { 
                            text.push('<li><span class="legend-dots" style="background:' + 
                            trafficChartData.datasets[0].legendColor[i] + 
                                        '"></span>'); 
                            if (trafficChartData.labels[i]) { 
                                text.push(trafficChartData.labels[i]); 
                            }
                            text.push('<span class="float-right">'+trafficChartData.datasets[0].data[i]+'</span>')
                            text.push('</li>'); 
                        } 
                        text.push('</ul>'); 
                        return text.join('');
                        }
                    };
                    var trafficChartCanvas = $("#kuesioner_chart").get(0).getContext("2d");
                    var trafficChart = new Chart(trafficChartCanvas, {
                        type: 'doughnut',
                        data: trafficChartData,
                        options: trafficChartOptions
                    });

                    $("#kuesioner_chart-legend").html(trafficChart.generateLegend());      
                    }
                }
            else if(pilih_kuesioner == "Kepuasan Pelanggan"){
                 if ($("#kuesioner_chart").length) {
                    var gradientStrokeViolet = ctx.createLinearGradient(0, 0, 0, 181);
                    gradientStrokeViolet.addColorStop(0, 'rgba(218, 140, 255, 1)');
                    gradientStrokeViolet.addColorStop(1, 'rgba(154, 85, 255, 1)');
                    var gradientLegendViolet = 'linear-gradient(to right, rgba(218, 140, 255, 1), rgba(154, 85, 255, 1))';

                    var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 181);
                    gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
                    gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
                    var gradientLegendBlue = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))';

                    var gradientStrokeRed = ctx.createLinearGradient(0, 0, 0, 50);
                    gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
                    gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
                    var gradientLegendRed = 'linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))';

                    var gradientStrokeGreen = ctx.createLinearGradient(0, 0, 0, 300);
                    gradientStrokeGreen.addColorStop(0, 'rgba(6, 185, 157, 1)');
                    gradientStrokeGreen.addColorStop(1, 'rgba(132, 217, 210, 1)');
                    var gradientLegendGreen = 'linear-gradient(to right, rgba(6, 185, 157, 1), rgba(132, 217, 210, 1))';      

                   var gradientStrokeA = ctx.createLinearGradient(0, 0, 0, 300);
                    gradientStrokeA.addColorStop(0, 'rgba(6, 85, 57, 1)');
                    gradientStrokeA.addColorStop(1, 'rgba(32, 17, 10, 1)');
                    var gradientLegendA = 'linear-gradient(to right, rgba(6, 85, 57, 1), rgba(32, 17, 10, 1))';      

        

                    var trafficChartData = {
                        datasets: [{
                        data: [{{$kepuasan_pelanggan_ss}}, {{$kepuasan_pelanggan_s}}, {{$kepuasan_pelanggan_n}},{{$kepuasan_pelanggan_ts}},{{$kepuasan_pelanggan_sts}}],
                        backgroundColor: [
                            gradientStrokeBlue,
                            gradientStrokeGreen,
                            gradientStrokeRed,
                            gradientStrokeA,
                            gradientStrokeViolet
                        ],
                        hoverBackgroundColor: [
                            gradientStrokeBlue,
                            gradientStrokeGreen,
                            gradientStrokeRed,
                            gradientStrokeA,
                            gradientStrokeViolet
                        ],
                        borderColor: [
                            gradientStrokeBlue,
                            gradientStrokeGreen,
                            gradientStrokeRed,
                            gradientStrokeA,
                            gradientStrokeViolet
                            
                        ],
                        legendColor: [
                            gradientLegendBlue,
                            gradientLegendGreen,
                            gradientLegendRed,
                            gradientLegendA,
                            gradientLegendViolet
                        ]
                        }],
                    
                        // These labels appear in the legend and in the tooltips when hovering different arcs
                        labels: [
                        'Sangat Setuju ',
                        'Setuju ',
                        'Normal ',
                        'Tidak Setuju ',
                        'Sangat Tidak Setuju ',
                        ]
                    };
                    var trafficChartOptions = {
                        responsive: true,
                        animation: {
                        animateScale: true,
                        animateRotate: true
                        },
                        legend: false,
                        legendCallback: function(chart) {
                        var text = []; 
                        text.push('<ul>'); 
                        for (var i = 0; i < trafficChartData.datasets[0].data.length; i++) { 
                            text.push('<li><span class="legend-dots" style="background:' + 
                            trafficChartData.datasets[0].legendColor[i] + 
                                        '"></span>'); 
                            if (trafficChartData.labels[i]) { 
                                text.push(trafficChartData.labels[i]); 
                            }
                            text.push('<span class="float-right">'+trafficChartData.datasets[0].data[i]+'</span>')
                            text.push('</li>'); 
                        } 
                        text.push('</ul>'); 
                        return text.join('');
                        }
                    };
                    var trafficChartCanvas = $("#kuesioner_chart").get(0).getContext("2d");
                    var trafficChart = new Chart(trafficChartCanvas, {
                        type: 'doughnut',
                        data: trafficChartData,
                        options: trafficChartOptions
                    });
                    $("#kuesioner_chart-legend").html(trafficChart.generateLegend());      
                    }
                }
            else if(pilih_kuesioner == "Pelayanan"){
                 if ($("#kuesioner_chart").length) {
                    var gradientStrokeViolet = ctx.createLinearGradient(0, 0, 0, 181);
                    gradientStrokeViolet.addColorStop(0, 'rgba(218, 140, 255, 1)');
                    gradientStrokeViolet.addColorStop(1, 'rgba(154, 85, 255, 1)');
                    var gradientLegendViolet = 'linear-gradient(to right, rgba(218, 140, 255, 1), rgba(154, 85, 255, 1))';

                    var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 181);
                    gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
                    gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
                    var gradientLegendBlue = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))';

                    var gradientStrokeRed = ctx.createLinearGradient(0, 0, 0, 50);
                    gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
                    gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
                    var gradientLegendRed = 'linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))';

                    var gradientStrokeGreen = ctx.createLinearGradient(0, 0, 0, 300);
                    gradientStrokeGreen.addColorStop(0, 'rgba(6, 185, 157, 1)');
                    gradientStrokeGreen.addColorStop(1, 'rgba(132, 217, 210, 1)');
                    var gradientLegendGreen = 'linear-gradient(to right, rgba(6, 185, 157, 1), rgba(132, 217, 210, 1))';      

                   var gradientStrokeA = ctx.createLinearGradient(0, 0, 0, 300);
                    gradientStrokeA.addColorStop(0, 'rgba(6, 85, 57, 1)');
                    gradientStrokeA.addColorStop(1, 'rgba(32, 17, 10, 1)');
                    var gradientLegendA = 'linear-gradient(to right, rgba(6, 85, 57, 1), rgba(32, 17, 10, 1))';      

        

                    var trafficChartData = {
                        datasets: [{
                        data: [{{$pelayanan_ss}}, {{$pelayanan_s}}, {{$pelayanan_n}},{{$pelayanan_ts}},{{$pelayanan_sts}}],
                        backgroundColor: [
                            gradientStrokeBlue,
                            gradientStrokeGreen,
                            gradientStrokeRed,
                            gradientStrokeA,
                            gradientStrokeViolet
                        ],
                        hoverBackgroundColor: [
                            gradientStrokeBlue,
                            gradientStrokeGreen,
                            gradientStrokeRed,
                            gradientStrokeA,
                            gradientStrokeViolet
                        ],
                        borderColor: [
                            gradientStrokeBlue,
                            gradientStrokeGreen,
                            gradientStrokeRed,
                            gradientStrokeA,
                            gradientStrokeViolet
                            
                        ],
                        legendColor: [
                            gradientLegendBlue,
                            gradientLegendGreen,
                            gradientLegendRed,
                            gradientLegendA,
                            gradientLegendViolet
                        ]
                        }],
                    
                        // These labels appear in the legend and in the tooltips when hovering different arcs
                        labels: [
                        'Sangat Setuju ',
                        'Setuju ',
                        'Normal ',
                        'Tidak Setuju ',
                        'Sangat Tidak Setuju ',
                        ]
                    };
                    var trafficChartOptions = {
                        responsive: true,
                        animation: {
                        animateScale: true,
                        animateRotate: true
                        },
                        legend: false,
                        legendCallback: function(chart) {
                        var text = []; 
                        text.push('<ul>'); 
                        for (var i = 0; i < trafficChartData.datasets[0].data.length; i++) { 
                            text.push('<li><span class="legend-dots" style="background:' + 
                            trafficChartData.datasets[0].legendColor[i] + 
                                        '"></span>'); 
                            if (trafficChartData.labels[i]) { 
                                text.push(trafficChartData.labels[i]); 
                            }
                            text.push('<span class="float-right">'+trafficChartData.datasets[0].data[i]+'</span>')
                            text.push('</li>'); 
                        } 
                        text.push('</ul>'); 
                        return text.join('');
                        }
                    };
                    var trafficChartCanvas = $("#kuesioner_chart").get(0).getContext("2d");
                    var trafficChart = new Chart(trafficChartCanvas, {
                        type: 'doughnut',
                        data: trafficChartData,
                        options: trafficChartOptions
                    });
                    $("#kuesioner_chart-legend").html(trafficChart.generateLegend());      
                    }
                }                
        })
                              

    
           </script>
                        @endsection
