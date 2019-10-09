@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Statistics') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">

                            <form name="form" method="post">
                                <div class="form-group row">
                                    <label class="col-sm-5 control-label" for="chart-type">Type</label>
                                    <div class="col-sm-5">
                                        <select id="chart-type">
                                            <option value="bar">Bar</option>
                                            <option value="line">Line</option>
                                            <option value="radar">Radar</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="button" class="btn btn-sm btn-info" data-toggle="collapse" data-target="#options">More Options</button>
                                            <div id="options" class="collapse">

                                                <br>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 control-label" for="xaxis">Property</label>
                                                    <div class="col-sm-5">
                                                        <select name="xaxis" id="xaxis">
                                                            <option value="bar">Bar</option>
                                                            <option value="line">Line</option>
                                                            <option value="scatter">Scatter</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div id="check" class="form-group row" style="display:none">
                                                    <label class="col-sm-5 control-label">Options</label>
                                                    <div class="col-sm-5">
                                                        <input type="checkbox" name="Option 1" value=""> Option 1<br>
                                                        <input type="checkbox" name="Option 2" value=""> Option 2<br>
                                                        <input type="checkbox" name="Option 3" value=""> Option 3<br>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-5 control-label" for="yearFrom">Year From</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" name="yearFrom">
                                                        <br>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-5 control-label" for="yearTo">Year From</label>
                                                    <div class="col-sm-5">
                                                        <input type="text" name="yearFrom">
                                                        <br>
                                                    </div>
                                                </div>

                                            </div>
                                    </div>
                                </div>

                                <!--
                                <div class="form-group row">
                                    <label class="col-sm-5 control-label" for="yaxis">Y Axis</label>
                                    <div class="col-sm-5">
                                        <select name="yaxis" id="yaxis">
                                            <option value="column">Column</option>
                                            <option value="line">Line</option>
                                            <option value="bar">Bar</option>
                                        </select>
                                    </div>
                                </div>
                                -->

                                <div class="form-group" >
                                    <a id="renderBtn" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span>Render</a>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-8">
                            <div class="container">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<script>
    $("#xaxis").blur(function() {
        <?php
        /*
            if(isset($_POST['xaxis'])) {
                $xaxis = $_POST['xaxis'];
            }
        */
        ?>
        $("#check").show();
    });



    function renderChart(type, xaxis, yaxis) {
        let ctx = document.getElementById("myChart").getContext('2d');
        let myChart = new Chart(ctx, {
            type: type,
            data: {
                labels: yaxis,
                datasets: [{
                    label: "AI",
                    data: xaxis
                }]
            },
            options: {
                responsive: true,
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "Number of AI by Year"
                },
                scales: {
                    xAxes: [{
                        offset: true,
                        scaleLabel: {
                            labelString: 'Year',
                            display: true
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        },
                        scaleLabel: {
                            labelString: 'Number of AI',
                            display: true
                        }
                    }],
                }
            }
        });
    }


    $("#renderBtn").click(
        function () {
            let type = document.querySelector('#chart-type');
            type = type.value;
            let data = [];
            let xaxis = [];
            let yaxis = [];

            //Get statistic data
            $.get("statisticData", {
                yearFrom: 2000,
                yearTo: 2019
            }, function(data) {
                for (let i in data) {
                    xaxis.push(data[i].rcount);
                    yaxis.push(data[i].option);
                }
                console.log(yaxis);
                renderChart(type, xaxis, yaxis);
            }, "json");
        }
    );
</script>

@endsection
