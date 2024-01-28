<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('') }}assets/" data-template="vertical-menu-template-free" >
  <head>
    <title>Naive Bayes - Logine</title>

    @include('theme.admin-panel.style')

    <style type="text/css">
      h1.title-landing{
        font-size: 4rem;
      }
      .apart-picture{
        filter: brightness(80%);
        transition: .5s ease;
      }
      .apart-picture:hover{
        filter: brightness(50%);
        transition: .5s ease;
      }
      @media screen and (min-width: 768px){
        .group-1{
          margin-left: -10%;
        }
        .about-us-text{
          margin-right: 20%;
        }
        .text-visi-misi{
          font-size: 1.3rem
        }
        .visi-misi{
          background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.5)), url({{ asset('')  }}assets/img/landing/background-2.jpg);
          background-size: 100% auto;
          background-position: center;
          background-repeat: no-repeat;
        }
      }
      @media screen and (max-width: 767px){
        h1.title-landing{
          font-size: 2rem;
        }
        .text-visi-misi{

        }
        .visi-misi{
          background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.5)), url({{ asset('')  }}assets/img/landing/background-2.jpg);
          background-size: auto 100%;
          background-repeat: no-repeat;
        }
      }
    </style>
  </head>

  <body class="bg-white">
    <div>
      <nav class="bg-white w-100">
        <div class="container py-3 d-flex">
          <div class="me-auto d-md-none d-block">
            <img src="{{ asset('') }}assets/img/landing/logo.png" width="150">
          </div>
          <div class="text-center d-md-block d-none w-100">
            <img src="{{ asset('') }}assets/img/landing/logo.png" width="150">
          </div>
          <div class="ms-auto d-md-none">
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
          </div>
        </div>
      </nav>
      <section class="position-relative">
        <img src="{{ asset('') }}assets/img/landing/background.jpg" class="w-100" style="filter: brightness(50%);">
        <div class="position-absolute top-0 w-100 d-flex align-items-center justify-content-center" style="height: 100%">
          <div class="text-center">
            <h1 class="title-landing text-white"><strong>Welcome to My Apartment</strong></h1>
            <h2 class="d-md-block d-none text-white">Your home away from home</h2>
            <div class="d-md-block d-none">
              <a href="{{ route('login') }}" class="btn btn-primary">Booking Now</a>
            </div>
          </div>
        </div>
      </section>
      <section class="my-4 my-md-5">
        <div class="container d-md-flex justify-content-center">
          <div class="col-md-3 group-1 d-md-none my-2">
            <div class="my-md-5">
              <img src="{{ asset('') }}assets/img/landing/group.png" class="w-100 rounded">
            </div>
          </div>
          <div class="col-md-6 col-12 bg-primary rounded text-white d-flex align-items-center justify-content-center">
            <div class="p-md-5 p-3 about-us-text" style="text-align: justify;">
              <h3 class="text-white">Tentang Kami</h3>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
          </div>
          <div class="col-md-3 group-1 d-md-block d-none">
            <div class="my-md-5">
              <img src="{{ asset('') }}assets/img/landing/group.png" class="w-100 rounded">
            </div>
          </div>
        </div>
      </section>
      <section 
        class="mt-4 mt-md-5 py-3 py-md-5 visi-misi" 
        style="
          
        ">
        <div class="container">
          <div class="mx-md-5 px-md-5">
            <div class="text-center">
              <h2 class="text-white"><strong>VISI</strong></h2>
            </div>
            <ol class="text-white text-visi-misi">
              <li>Menjadi website yang selalu memberikan manfaat bagi masyarakat</li>
              <li>Menjadi ruang pertemuan yang terpercaya antara pemilik dan calon penyewa apartemen</li>
              <li>Menjadi usaha terbaik dalam penyedia apartemen dengan mengutamakan pelayanan, kenyamanan, dan kepuasan bagi penyewa apartemen</li>
            </ol>
            <br>
            <div class="text-center">
              <h2 class="text-white"><strong>MISI</strong></h2>
            </div>
            <ol class="text-white text-visi-misi">
              <li>Memberi kemudahan dalam mencari apartemen untuk pendatang atau masyarakat</li>
              <li>Menjadi solusi yang tepat, cepat, dan terpercaya dalam menyediakan dan menyewa apartemen</li>
              <li>Mampu berkembang dengan baik, inovatif, dan efektif</li>
            </ol>
          </div>
        </div>
      </section>
      @if( $apartment->count() > 1 )
        <section class="my-4 my-md-5">
          <div class="container">
            <h2 class="text-center"><strong>Beberapa Apartemen Terbaru Kami</strong></h2>
            <br>
            <div class="d-md-flex justify-content-center">
              <div class="col-md-">
                <div class="d-md-flex justify-content-center">
                  @foreach( $apartment as $apart )
                    <div class="col-md-4 col-12">
                      <div class="mx-md-3 mx-2 my-md-0 my-4">
                        <div class="bg-white shadow-lg rounded p-md-3 position-relative">
                          <img src="{{ $apart->apartment_picture }}" class="w-100 rounded apart-picture">
                          <h3 class="position-absolute text-white" style="bottom: 25px; left: 25px">
                            {{ $apart->apartment_name }}
                          </h3>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
            <br class="d-md-block d-none">
            <div class="text-center">
              <h4><a href="{{ route('login') }}">Login</a> untuk melihat apartemen lainnya</h4>
            </div>
          </div>
        </section>
      @endif
      <section class="bg-primary py-3 py-md-5 position-relative">
        <div class="container">
          <h3 class="text-white text-center"><strong>Kata mereka tentang <em>My Apartment</em></strong></h3>
          <br>
          <div class="mx-md-5 px-md-5">
            <div id="carouselExample" class="carousel slide">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="text-center text-white mx-md-5 px-md-5 px-3 mx-3">
                    <div class="border rounded py-md-5 py-3 px-3">
                      <img src="{{ asset('') }}assets/img/landing/popular-06.jpg" width="180" class="rounded">
                      <br>
                      <h3 class="mt-3">Andi Cahyadi</h3>
                      <q>Pengalaman menyewa apartemen melalui layanan ini sangat menyenangkan! Apartemennya bersih, nyaman, dan fasilitasnya lengkap. Pelayanan dari tim juga ramah dan responsif. Sangat direkomendasikan!</q>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="text-center text-white mx-md-5 px-md-5 px-3 mx-3">
                    <div class="border rounded py-md-5 py-3 px-3">
                      <img src="{{ asset('') }}assets/img/landing/popular-07.jpg" width="180" class="rounded">
                      <br>
                      <h3 class="mt-3">Maria Dewi</h3>
                      <q>Saya sangat puas dengan pengalaman booking apartemen di sini. Prosesnya cepat, transparan, dan apartemennya sesuai dengan yang dijanjikan. Lokasinya strategis, dekat dengan transportasi umum dan tempat hiburan. Akan kembali lagi!</q>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="text-center text-white mx-md-5 px-md-5 px-3 mx-3">
                    <div class="border rounded py-md-5 py-3 px-3">
                      <img src="{{ asset('') }}assets/img/landing/popular-08.jpg" width="180" class="rounded">
                      <br>
                      <h3 class="mt-3">Bambang Susanto</h3>
                      <q>Layanan penyewaan apartemen mereka sangat profesional. Apartemen yang disediakan sangat bersih, terawat dengan baik, dan dilengkapi dengan fasilitas yang memadai. Saya merasa sangat nyaman selama menginap. Terima kasih</q>
                    </div>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
      </section>
      <footer>
        <div class="container my-md-5 my-4">
          <div class="row">
            <div class="col-md-4 col-12 my-2">
              <h3><strong>Kontak Kami</strong></h3>
              <h5 class="my-1"><em>My Apartment</em></h5>
              <h5 class="my-1">Karawang, Jawa Barat</h5>
            </div>
            <div class="col-md-4 col-12 my-2">
              <h5 class="my-2">Telp : 08123456789</h5>
              <h5 class="my-2">Email : info@myapartment.my.id</h5>
              <h5>
                <i class="fab fa-facebook text-primary me-2"></i>
                <i class="fab fa-instagram text-primary me-2"></i>
                <i class="fab fa-youtube text-primary me-2"></i>
              </h5>
            </div>
            <div class="col-md-4 col-12 my-2">
              <h5 class="my-2">Subscribe to my newsletter</h5>
              <div class="d-flex">
                <div class="col-10">
                  <input type="text" name="email" class="form-control" placeholder="Enter your email here">
                </div>
                <div class="col-2">
                  <input type="text" name="email" class="form-control bg-primary text-white ms-1" value="Join">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center py-2 border-top border-2 border-primary">
          copyright &copy; 2023, My Apartment
        </div>
      </footer>


      @include('theme.admin-panel.script')
      @yield('script')

      @if(Session::has('success'))
        <script>
          iziToast.success({
            title: "{{ Session::get('success') }}",
            position: 'topCenter'
          });
        </script>
        @endif
    </div>
  </body>
</html>
