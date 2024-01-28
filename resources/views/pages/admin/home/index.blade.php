@extends('theme.layout')
@section('title', 'Home')
@section('content')
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/tutorials/timelines/timeline-4/assets/css/timeline-4.css">
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
<div class="row">
    <div class="col-12 mb-3">
        <div class="panel panel-default px-md-3">
          <div class="panel-heading text-center alert alert-danger">
            <i class="fas fa-book me-2"></i> PROSEDUR PENGGUNAAN APLIKASI
          </div>
          <div class="panel-body card alert">
            <ul class="timeline">
              <li>
                <div class="timeline-badge primary"><i class="fa fa-upload"></i></div>
                <div class="timeline-panel ">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Import dataset training</h4>
                  </div>
                  <div class="timeline-body">
                    <ol>
                      <li>Persiapkan data untuk dimasukkan ke dataset training</li>
                      <li>Import dataset training di halaman Dataset/Training (file excel harus disesusaika dengan template yang telah disediakan)</li>
                      <li>Selesai</li>
                    </ol>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-badge primary"><i class="fa fa-upload"></i></div>
                <div class="timeline-panel ">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Import dataset testing</h4>
                  </div>
                  <div class="timeline-body">
                    <ol>
                      <li>Persiapkan data untuk dimasukkan ke dataset testing</li>
                      <li>Import dataset testing di halaman Dataset/Testing (file excel harus disesusaika dengan template yang telah disediakan)</li>
                      <li>Selesai</li>
                    </ol>
                  </div>
                </div>
              </li>
              <li>
                <div class="timeline-badge warning"><i class="fa fa-calculator"></i></div>
                <div class="timeline-panel ">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Hitung probabilitas</h4>
                  </div>
                  <div class="timeline-body">
                    <ol>
                      <li>Data training sudah diinput di halaman dataset / training</li>
                      <li>Klik tombol probabilitas untuk menghitung probabilitas berdasarkan data training</li>
                      <li>Data akan ditampilkan di halaman secara otomatis</li>
                      <li>Selesai</li>
                    </ol>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-badge warning"><i class="fa fa-calculator"></i></div>
                <div class="timeline-panel ">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Hitung klasifikasi</h4>
                  </div>
                  <div class="timeline-body">
                    <ol>
                      <li>Data training, testing, dan probabilitas sudah terhitung sebelumnya</li>
                      <li>Klik tombol klasifikasi untuk menghitung klasifikasi berdasarkan data probabilitas yang telah didapatkan</li>
                      <li>Data akan ditampilkan di halaman secara otomatis</li>
                      <li>Selesai</li>
                    </ol>
                  </div>
                </div>
              </li>
              <li>
                <div class="timeline-badge success"><i class="fa fa-chart-line"></i></div>
                <div class="timeline-panel ">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Uji performa</h4>
                  </div>
                  <div class="timeline-body">
                    <ol>
                      <li>Data klasifikasi sudah dihitung terlebih dahulu</li>
                      <li>Jika data belum diklasifikasi maka akan muncul pesan untuk mengklasifikasikan terlebih dahulu</li>
                      <li>Jika data sudah diklasifikasi, data akan ditampilkan di halaman secara otomatis</li>
                      <li>Selesai</li>
                    </ol>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-badge secondary"><i class="fa fa-users"></i></div>
                <div class="timeline-panel ">
                  <div class="timeline-heading">
                    <h4 class="timeline-title">Pengaturan administrator</h4>
                  </div>
                  <div class="timeline-body">
                    <ol>
                      <li>Data administrator dapat ditambahkan, diedit, dihapus  oleh admin yang sedang login di halaman Manajemen Admin</li>
                      <li>Selesai</li>
                    </ol>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $('#home-menu').addClass('active')
    </script>
@endsection