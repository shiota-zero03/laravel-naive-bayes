@extends('theme.layout')
@section('title', 'Performa')
@section('content')
<style>
    table th, table td {
        font-size: 10px
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="border py-3 px-md-5 px-2 mb-4">
            <h5 class="m-0">Menu / Performa</h5>
        </div>
    </div>
    <div class="col-12 order-1 order-lg-2 mb-4 mb-lg-0">
        <div class="card py-4 px-md-5 px-1">
            <div class="text-center text-uppercase">
                <h4 class="mb-0"><strong>PENGUJIAN PERFORMA</strong></h4>
            </div>
            <hr>
            @if($status == true)
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="p-md-3 shadow-lg rounded">
                            <div class="d-md-flex justify-content-between align-items-center">
                                <div class="col-md-6 mb-3">
                                    <div class=" table-responsive px-2">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th class="bg-dark" style="font-size: 10px;"></th>
                                                <th class="bg-dark text-white" style="font-size: 10px;" colspan="3">Prediksi</th>
                                            </tr>
                                            <tr>
                                                <th class="bg-dark text-white" style="font-size: 10px;">Aktual</th>
                                                <th class="bg-primary text-white" style="font-size: 10px;">Cukup Puas</th>
                                                <th class="bg-primary text-white" style="font-size: 10px;">Puas</th>
                                                <th class="bg-primary text-white" style="font-size: 10px;">Tidak Puas</th>
                                            </tr>
                                            <tr>
                                                <th class="bg-primary text-white" style="font-size: 10px;">Cukup Puas</th>
                                                <th style="font-size: 10px;">{{ $prediksi['cpcp'] }}</th>
                                                <th style="font-size: 10px;">{{ $prediksi['pcp'] }}</th>
                                                <th style="font-size: 10px;">{{ $prediksi['tpcp'] }}</th>
                                            </tr>
                                            <tr>
                                                <th class="bg-primary text-white" style="font-size: 10px;">Puas</th>
                                                <th style="font-size: 10px;">{{ $prediksi['cpp'] }}</th>
                                                <th style="font-size: 10px;">{{ $prediksi['pp'] }}</th>
                                                <th style="font-size: 10px;">{{ $prediksi['tpp'] }}</th>
                                            </tr>
                                            <tr>
                                                <th class="bg-primary text-white" style="font-size: 10px;">Tidak Puas</th>
                                                <th style="font-size: 10px;">{{ $prediksi['cptp'] }}</th>
                                                <th style="font-size: 10px;">{{ $prediksi['ptp'] }}</th>
                                                <th style="font-size: 10px;">{{ $prediksi['tptp'] }}</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="table-responsive p-2 border rounded">
                                        <canvas id="chart1"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="p-md-3 shadow-lg rounded">
                            <div class="d-md-flex justify-content-between align-items-center">
                                <div class="col-md-6 mb-3">
                                    <div class="table-responsive px-2">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th class="bg-dark text-white" style="font-size: 10px;"></th>
                                                <th class="bg-primary text-white" style="font-size: 10px;">Cukup Puas</th>
                                                <th class="bg-primary text-white" style="font-size: 10px;">Puas</th>
                                                <th class="bg-primary text-white" style="font-size: 10px;">Tidak Puas</th>
                                            </tr>
                                            <tr>
                                                <th class="bg-primary text-white" style="font-size: 10px;">TP</th>
                                                <th style="font-size: 10px;">{{ $secondPrediction['cptp'] }}</th>
                                                <th style="font-size: 10px;">{{ $secondPrediction['ptp'] }}</th>
                                                <th style="font-size: 10px;">{{ $secondPrediction['tptp'] }}</th>
                                            </tr>
                                            <tr>
                                                <th class="bg-primary text-white" style="font-size: 10px;">FP</th>
                                                <th style="font-size: 10px;">{{ $secondPrediction['cpfp'] }}</th>
                                                <th style="font-size: 10px;">{{ $secondPrediction['pfp'] }}</th>
                                                <th style="font-size: 10px;">{{ $secondPrediction['tpfp'] }}</th>
                                            </tr>
                                            <tr>
                                                <th class="bg-primary text-white" style="font-size: 10px;">FN</th>
                                                <th style="font-size: 10px;">{{ $secondPrediction['cpfn'] }}</th>
                                                <th style="font-size: 10px;">{{ $secondPrediction['pfn'] }}</th>
                                                <th style="font-size: 10px;">{{ $secondPrediction['tpfn'] }}</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="table-responsive p-2 border rounded">
                                        <canvas id="chart2"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="p-md-3 shadow-lg rounded">
                            <div class="px-2 table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th class="bg-dark" style="font-size: 10px;"></th>
                                        <th class="bg-dark text-white" style="font-size: 10px;" colspan="5">Performance Vector</th>
                                    </tr>
                                    <tr>
                                        <th class="bg-dark text-white" style="font-size: 10px;">Rumus</th>
                                        <th class="bg-dark" style="font-size: 10px;"></th>
                                        <th class="bg-primary text-white">CUKUP PUAS</th>
                                        <th class="bg-primary text-white">PUAS</th>
                                        <th class="bg-primary text-white">TIDAK PUAS</th>
                                        <th class="bg-primary text-white">HASIL AKHIR</th>
                                    </tr>
                                    <tr>
                                        <th class="bg-secondary text-white" style="font-size: 10px;">TP / Jumlah Data</th>
                                        <th class="bg-primary text-white" style="font-size: 10px;">Accuracy</th>
                                        <th colspan="3"></th>
                                        <th>{{ number_format($perform['a_hasil_akhir'], 2, '.', '') }} %</th>
                                    </tr>
                                    <tr>
                                        <th class="bg-secondary text-white" style="font-size: 10px;">TP / (TP + FP )</th>
                                        <th class="bg-primary text-white" style="font-size: 10px;">Precision</th>
                                        <th>{{ number_format($perform['pcp'], 2, '.', '') }}</th>
                                        <th>{{ number_format($perform['pp'], 2, '.', '') }}</th>
                                        <th>{{ number_format($perform['ptp'], 2, '.', '') }}</th>
                                        <th>{{ number_format(100*(($perform['pcp'] + $perform['pp'] + $perform['ptp'])/3), 2, '.', '') }} %</th>
                                    </tr>
                                    <tr>
                                        <th class="bg-secondary text-white" style="font-size: 10px;">TP / (TP + FN)</th>
                                        <th class="bg-primary text-white" style="font-size: 10px;">Recall</th>
                                        <th>{{ number_format($perform['rcp'], 2, '.', '') }}</th>
                                        <th>{{ number_format($perform['rp'], 2, '.', '') }}</th>
                                        <th>{{ number_format($perform['rtp'], 2, '.', '') }}</th>
                                        <th>{{ number_format(100*(($perform['rcp'] + $perform['rp'] + $perform['rtp'])/3), 2, '.', '') }} %</th>
                                    </tr>
                                </table>
                            </div>
                            <br>
                            <div class="d-md-flex justify-content-between align-items-center">
                                <div class="col-md-6 mb-3">
                                    <div class="table-responsive p-2 mx-1 border rounded">
                                        Performance Vector
                                        <canvas id="chart3"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="table-responsive p-2 mx-1 border rounded">
                                        Hasil Akhir Performa
                                        <canvas id="chart4"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="d-flex align-items-center w-100 justify-content-center" style="min-height: 40vh">
                    <h3><em>Tidak ada data yang bisa diuji</em></h3>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js" integrity="sha512-vBmx0N/uQOXznm/Nbkp7h0P1RfLSj0HQrFSzV8m7rOGyj30fYAOKHYvCNez+yM8IrfnW0TCodDEjRqf6fodf/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('#perform-menu').addClass('active')
    </script>
    @if($status == true)
        <script>
            var ctx = document.getElementById("chart1").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["CP (Aktual)", "P (Aktual)", "TP (Aktual)"],
                    datasets: [{
                        label: 'CP (Prediksi)',
                        data: [
                            {{ $prediksi['cpcp'] }},
                            {{ $prediksi['cpp'] }},
                            {{ $prediksi['cptp'] }}
                        ],
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255,99,132,1)',
                        borderWidth: 1
                    }, {
                        label: 'P (Prediksi)',
                        data: [
                            {{ $prediksi['pcp'] }},
                            {{ $prediksi['pp'] }},
                            {{ $prediksi['ptp'] }}
                        ],
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }, {
                        label: 'TP (Prediksi)',
                        data: [
                            {{ $prediksi['tpcp'] }},
                            {{ $prediksi['tpp'] }},
                            {{ $prediksi['tptp'] }}
                        ],
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

            var ctx2 = document.getElementById("chart2").getContext('2d');
            var myChart2 = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: ["TP", "FP", "FN"],
                    datasets: [{
                        label: 'Cukup Puas',
                        data: [
                            {{ $secondPrediction['cptp'] }},
                            {{ $secondPrediction['cpfp'] }},
                            {{ $secondPrediction['cpfn'] }}
                        ],
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255,99,132,1)',
                        borderWidth: 1
                    }, {
                        label: 'Puas',
                        data: [
                            {{ $secondPrediction['ptp'] }},
                            {{ $secondPrediction['pfp'] }},
                            {{ $secondPrediction['pfn'] }}
                        ],
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Tidak Puas',
                        data: [
                            {{ $secondPrediction['tptp'] }},
                            {{ $secondPrediction['tpfp'] }},
                            {{ $secondPrediction['tpfn'] }}
                        ],
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

            var ctx3 = document.getElementById("chart3").getContext('2d');
            var myChart3 = new Chart(ctx3, {
                type: 'bar',
                data: {
                    labels: ["Accuracy", "Precision", "Recall"],
                    datasets: [{
                        label: 'Cukup Puas',
                        data: [
                            {{ number_format($perform['acp'], 2, '.', '') }},
                            {{ number_format($perform['pcp'], 2, '.', '') }},
                            {{ number_format($perform['rcp'], 2, '.', '') }}
                        ],
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255,99,132,1)',
                        borderWidth: 1
                    }, {
                        label: 'Puas',
                        data: [
                            {{ number_format($perform['ap'], 2, '.', '') }},
                            {{ number_format($perform['pp'], 2, '.', '') }},
                            {{ number_format($perform['rp'], 2, '.', '') }}
                        ],
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Tidak Puas',
                        data: [
                            {{ number_format($perform['atp'], 2, '.', '') }},
                            {{ number_format($perform['ptp'], 2, '.', '') }},
                            {{ number_format($perform['rtp'], 2, '.', '') }}
                        ],
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

            var ctx4 = document.getElementById("chart4").getContext('2d');
            var myChart4 = new Chart(ctx4, {
                type: 'doughnut',
                data: {
                    labels: ["Accuracy", "Precision", "Recall"],
                    datasets: [{
                        data: [
                            {{ number_format(100*(($perform['acp'] + $perform['ap'] + $perform['atp'])/3), 2, '.', '') }},
                            {{ number_format(100*(($perform['pcp'] + $perform['pp'] + $perform['ptp'])/3), 2, '.', '') }},
                            {{ number_format(100*(($perform['rcp'] + $perform['rp'] + $perform['rtp'])/3), 2, '.', '') }}
                        ],
                        backgroundColor: ["rgba(255, 99, 132, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(255, 206, 86, 0.2)"],
                        borderColor: ["rgba(255,99,132,1)", "rgba(54, 162, 235, 1)", "rgba(255, 206, 86, 1)"],
                        borderWidth: 1
                    }]
                },
            });


        </script>
    @endif
@endsection