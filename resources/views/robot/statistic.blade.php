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
                                <label class="col-sm-5 control-label" for="xaxis">X Axis</label>
                                <div class="col-sm-5">
                                    <select id="xaxis">
                                        <option value="bar">Bar</option>
                                        <option value="line">Line</option>
                                        <option value="scatter">Scatter</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-5 control-label" for="yaxis">Y Axis</label>
                                <div class="col-sm-5">
                                    <select id="yaxis">
                                        <option value="column">Column</option>
                                        <option value="line">Line</option>
                                        <option value="bar">Bar</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group" align="center">
                                <a id="renderBtn" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span>Render</a>
                            </div>
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

    $("#renderBtn").click(
        function () {
            let type = document.querySelector('#chart-type');
            type = type.value;
            let xaxis = document.querySelector('#xaxis');
                xaxis = xaxis.value;
            let  labels =  ["sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday"];
            renderChart(type, xaxis, labels);

            function renderChart(type, xaxis, labels) {
                let ctx = document.getElementById("myChart").getContext('2d');
                let myChart = new Chart(ctx, {
                    type: type,
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'This week',
                            data: xaxis,
                        }]
                    },
                });
            }
        }
    );
</script>

@endsection
