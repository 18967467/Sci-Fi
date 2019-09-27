@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
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
    })


    $("#renderBtn").click(

        <?php
          /*if(isset($_POST['xaxis'])) {
                $xaxis = $_POST['xaxis'];
            }
            if(isset($_POST['yaxis'])) {
                $yaxis = $_POST['yaxis'];
            }

            if(isset($_POST['yearFrom'])) {
                $yearFrom = $_POST['yearFrom'];
            }

            if(isset($_POST['yearTo'])) {
                $yearTo = $_POST['yearTo];
            }

            $servername = "localhost";
            $username = "root";
            $password = "";

            $conn = new mysqli($servername, $username, $password);

            $sql = "SELECT ";
            $result = $conn->query($sql);
            $xaxis = $result;

            $sql = "";
            $result = $conn->query($sql);
            $yaxis = $result;

            $conn->close();
            */

            $xaxis = array("5","3","8","7","9","13","16","21");
            $yaxis = array("1976","1981","1986","1989","1995","1999","2001","2006");

        ?>

        function () {
            let type = document.querySelector('#chart-type');
            type = type.value;
            let xaxis = <?php echo json_encode($xaxis) ?>;
            let yaxis = <?php echo json_encode($yaxis) ?>;

            renderChart(type, xaxis, yaxis);

            function renderChart(type, xaxis, yaxis) {
                let ctx = document.getElementById("myChart").getContext('2d');
                let myChart = new Chart(ctx, {
                    type: type,
                    data: {
                        labels: yaxis,
                        datasets: [{
                            label: "AI",
                            data: xaxis,
                            backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#0afa24","#645097","#1d6022"]
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
        }
    );
</script>

@endsection
