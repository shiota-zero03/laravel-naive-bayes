@extends('theme.layout')
@section('title', 'Dashboard')
@section('content')

<div class="row">
    <div class="col-12 mb-3">
        <div class="card p-3">
            <h4 class="text-center mb-0">Aplikasi evaluasi kepuasan mahasiswa terhadap layanan Perpustakaan kampus Universitas Dirgantara Marsekal Suryadarma</h4>
        </div>
    </div>
    <div class="col-md-9 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-lg-7 col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Welcome {{ auth()->user()->name }}! 🎉</h5>
                        <p class="mb-4">
                            Ini merupakan website untuk mengolah data menggunakan algoritma Naive Bayes
                        </p>
                        <a href="{{ route('admin.profile.index') }}" class="btn btn-sm btn-outline-primary">View Profiles</a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-4 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-lg-4">
                        <img
                            src="{{ asset('') }}assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 order-1 mb-4">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <i class="fas fa-user alert alert-success"></i>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Total Pengguna</span>
                        <h3 class="card-title mb-md-4 mb-3">{{ $count['user'] }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-5">
    <div class="col-12">
        <div class="card p-3">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div>
                        <h4 class="text-center text-primary"><strong>Responden berdasarkan jenis kelamin</strong></h4>
                        <hr class="my-0">
                        <canvas id="responden-lp-chart" width="400" height="200"></canvas>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div>
                        <h4 class="text-center text-primary"><strong>Responden berdasarkan hasil akhir</strong></h4> 
                        <hr>
                        <canvas id="respondend-ha-chart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-5">
    <div class="col-12">
        <div class="card p-3">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div>
                        <h4 class="text-center text-primary"><strong>Pengunjung Website Dalam 1 Minggu</strong></h4>
                        <hr class="my-0">
                        <canvas id="visitor-chart" width="400" height="200"></canvas>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h4 class="text-center text-primary"><strong>Performa Penggunaan Website</strong></h4> 
                    <hr>
                    <div class="d-md-flex align-items-center">
                        <div class="col-lg-5 col-md-6 col-12 me-md-5">
                            <canvas id="persentase-perform" width="50" height="50"></canvas>
                        </div>
                        <div class="col-md-6 col-12">
                            <h5 class="mb-2">Waktu Eksekusi :</h5>
                            <h6><strong>{{ number_format($executionTime, 3) }} detik</strong></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $('#dashboard-menu').addClass('active')
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js" integrity="sha512-vBmx0N/uQOXznm/Nbkp7h0P1RfLSj0HQrFSzV8m7rOGyj30fYAOKHYvCNez+yM8IrfnW0TCodDEjRqf6fodf/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var ctxVisitor = document.getElementById('visitor-chart').getContext('2d');
        var ctxPerforma = document.getElementById('persentase-perform').getContext('2d');
        var ctxJenisKelamin = document.getElementById('responden-lp-chart').getContext('2d');
        var ctxresult = document.getElementById('respondend-ha-chart').getContext('2d');
        
        $.ajax({
            url: '{{ route('admin.visitor.json') }}',
            method: 'GET',
            success: function(data) {
                var chart = new Chart(ctxVisitor, {
                    type: 'line',
                    data: {
                        labels: data.map(entry => entry.date),
                        datasets: [{
                            label: 'Jumlah Pengunjung',
                            data: data.map(entry => entry.visitor_count),
                            backgroundColor: '#123456',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                    }
                });
            }
        });
        var chart = new Chart(ctxPerforma, {
            type: 'pie',
            data: {
                labels: ['Persentase Performa ({{ number_format(100 - ($executionTime*100), 2) }})%'],
                datasets: [{
                    data: ["{{ number_format(100 - ($executionTime * 100), 2) }}", "{{ number_format(($executionTime * 100), 2) }}"],
                    backgroundColor: '#123456',
                }]
            }
        });

        var jenisKelaminChart = new Chart(ctxJenisKelamin, {
            type: 'bar',
            data: {
                labels: [
                    "Akutansi",
                    "Manajemen",
                    "Manajemen Informatika",
                    "Sistem Informasi",
                    "Teknik Aeronautika",
                    "Teknik Elektro",
                    "Teknik Industri",
                    "Teknik Penerbangan",
                ],
                datasets: [
                {
                    label: "Laki - Laki",
                    data: [
                        {{ $count['jenis_kelamin'][0][0] }},
                        {{ $count['jenis_kelamin'][0][1] }},
                        {{ $count['jenis_kelamin'][0][2] }},
                        {{ $count['jenis_kelamin'][0][3] }},
                        {{ $count['jenis_kelamin'][0][4] }},
                        {{ $count['jenis_kelamin'][0][5] }},
                        {{ $count['jenis_kelamin'][0][6] }},
                        {{ $count['jenis_kelamin'][0][7] }},
                    ],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: "Perempuan",
                    data: [
                        {{ $count['jenis_kelamin'][1][0] }},
                        {{ $count['jenis_kelamin'][1][1] }},
                        {{ $count['jenis_kelamin'][1][2] }},
                        {{ $count['jenis_kelamin'][1][3] }},
                        {{ $count['jenis_kelamin'][1][4] }},
                        {{ $count['jenis_kelamin'][1][5] }},
                        {{ $count['jenis_kelamin'][1][6] }},
                        {{ $count['jenis_kelamin'][1][7] }},
                    ],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1
                },
            ]},
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

        var resultChart = new Chart(ctxresult, {
            type: 'bar',
            data: {
                labels: [
                    "Akutansi",
                    "Manajemen",
                    "Manajemen Informatika",
                    "Sistem Informasi",
                    "Teknik Aeronautika",
                    "Teknik Elektro",
                    "Teknik Industri",
                    "Teknik Penerbangan",
                ],
                datasets: [
                {
                    label: "Tidak Puas",
                    data: [
                        {{ $count['result'][2][0] }},
                        {{ $count['result'][2][1] }},
                        {{ $count['result'][2][2] }},
                        {{ $count['result'][2][3] }},
                        {{ $count['result'][2][4] }},
                        {{ $count['result'][2][5] }},
                        {{ $count['result'][2][6] }},
                        {{ $count['result'][2][7] }},
                    ],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: "Cukup Puas",
                    data: [
                        {{ $count['result'][1][0] }},
                        {{ $count['result'][1][1] }},
                        {{ $count['result'][1][2] }},
                        {{ $count['result'][1][3] }},
                        {{ $count['result'][1][4] }},
                        {{ $count['result'][1][5] }},
                        {{ $count['result'][1][6] }},
                        {{ $count['result'][1][7] }},
                    ],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255,99,132,1)',
                    borderWidth: 1
                },
                {
                    label: "Puas",
                    data: [
                        {{ $count['result'][0][0] }},
                        {{ $count['result'][0][1] }},
                        {{ $count['result'][0][2] }},
                        {{ $count['result'][0][3] }},
                        {{ $count['result'][0][4] }},
                        {{ $count['result'][0][5] }},
                        {{ $count['result'][0][6] }},
                        {{ $count['result'][0][7] }},
                    ],
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                },
            ]},
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
    </script>

@endsection