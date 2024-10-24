@extends('layouts.layout')

@section('content')
<div class="main-panel">
    @include('partials.messages');
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-6 grid-margin grid-margin-lg-0 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bill Collected</h4>
                        <canvas id="pie-chart-collected"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Zone Based Bill Collection</h4>
                        <p class="card-description">
                            Zone Based <code> Bill</code>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th>Zone</th>
                                        <th>Collected</th>
                                        <th>Due</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Zone 1</td>
                                        <td><label class="badge badge-success">50000</label></td>
                                        <td><label class="badge badge-danger">40000</label></td>
                                        <td><label class="badge badge-info">10000</label></td>
                                    </tr>
                                    <tr>
                                        <td>Zone 2</td>
                                        <td><label class="badge badge-success">21121212</label></td>
                                        <td><label class="badge badge-danger">2211233</label></td>
                                        <td><label class="badge badge-info">234234234</label></td>
                                    </tr>
                                    <tr>
                                        <td>Zone 3</td>
                                        <td><label class="badge badge-success">50000</label></td>
                                        <td><label class="badge badge-danger">40000</label></td>
                                        <td><label class="badge badge-info">10000</label></td>
                                    </tr>
                                    <tr>
                                        <td>Zone 4</td>
                                        <td><label class="badge badge-success">50000</label></td>
                                        <td><label class="badge badge-danger">40000</label></td>
                                        <td><label class="badge badge-info">10000</label></td>
                                    </tr>
                                    <tr>
                                        <td>Zone 5</td>
                                        <td><label class="badge badge-success">50000</label></td>
                                        <td><label class="badge badge-danger">40000</label></td>
                                        <td><label class="badge badge-info">10000</label></td>
                                    </tr>
                                    <tr>
                                        <td>Zone 6</td>
                                        <td><label class="badge badge-success">50000</label></td>
                                        <td><label class="badge badge-danger">40000</label></td>
                                        <td><label class="badge badge-info">10000</label></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-6 grid-margin grid-margin-lg-0 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Collected and Due Together</h4>
                        <canvas id="horizontal-stacked-bar-chart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 grid-margin grid-margin-lg-0 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Due Bill</h4>
                        <canvas id="pie-chart-due"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="{{ asset('assets/js/chart.js') }}"></script>

<script>
    new Chart(document.getElementById("pie-chart-collected"), {
    type: 'pie',
    data: {
      labels: ["Zone 1", "Zone 2", "Zone 3", "Zone 4", "Zone 5", "Zone 6"],
      datasets: [{
        label: "COLLECTED",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#283763"],
        data: [2478,5267,734,784,433,2555]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Bill Collected Based on Zones of Gulshan Socity'
      }
    }
});
</script>

<script>
    new Chart(document.getElementById("pie-chart-due"), {
    type: 'pie',
    data: {
      labels: ["Zone 1 %", "Zone 2 ", "Zone 3", "Zone 4", "Zone 5", "Zone 6"],
      datasets: [{
        label: "COLLECTED",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#283763"],
        data: [2478,5267,734,784,433,2555]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Due Bills Based on Zones of Gulshan Socity'
      }
    }
});
</script>

<script>
    var barOptions_stacked = {
    tooltips: {
        enabled: false
    },
    hover :{
        animationDuration:0
    },
    scales: {
        xAxes: [{
            ticks: {
                beginAtZero:true,
                fontFamily: "'Open Sans Bold', sans-serif",
                fontSize:11
            },
            scaleLabel:{
                display:false
            },
            gridLines: {
            }, 
            stacked: true
        }],
        yAxes: [{
            gridLines: {
                display:false,
                color: "#fff",
                zeroLineColor: "#fff",
                zeroLineWidth: 0
            },
            ticks: {
                fontFamily: "'Open Sans Bold', sans-serif",
                fontSize:11
            },
            stacked: true
        }]
    },
    legend:{
        display:false
    },
    
    animation: {
        onComplete: function () {
            var chartInstance = this.chart;
            var ctx = chartInstance.ctx;
            ctx.textAlign = "left";
            ctx.font = "9px Open Sans";
            ctx.fillStyle = "#fff";

            Chart.helpers.each(this.data.datasets.forEach(function (dataset, i) {
                var meta = chartInstance.controller.getDatasetMeta(i);
                Chart.helpers.each(meta.data.forEach(function (bar, index) {
                    data = dataset.data[index];
                    if(i==0){
                        ctx.fillText(data, 50, bar._model.y+4);
                    } else {
                        ctx.fillText(data, bar._model.x-25, bar._model.y+4);
                    }
                }),this)
            }),this);
        }
    },
    pointLabelFontFamily : "Quadon Extra Bold",
    scaleFontFamily : "Quadon Extra Bold",
};

var ctx = document.getElementById("horizontal-stacked-bar-chart");
var myChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
        labels: ["Zone 1", "Zone 2", "Zone 3", "Zone 4", "Zone 5", "Zone 6"],
        
        datasets: [{
            data: [121727, 131589, 151537, 121543, 131574, 141445],
            backgroundColor: "rgba(0,204,0,1)",
            hoverBackgroundColor: "rgba(50,90,100,1)"
        },{
            data: [22238, 44553, 32746, 23884, 21903, 23865],
            backgroundColor: "rgba(204,0,0,1)",
            hoverBackgroundColor: "rgba(46,185,235,1)"
        }]
    },

    options: barOptions_stacked,
});
</script>
@endpush