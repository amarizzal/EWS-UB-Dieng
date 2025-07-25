<!--
=========================================================
* Argon Dashboard 3 - v2.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2024 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{asset('img/logo.png')}}">
  <title>
    EWS RSSA FIKES UB - Ruang Bunaken
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('css/argon-dashboard.css?v=2.1.0') }}" rel="stylesheet" />

  <style>
    .bg-opacity-25 {
      background-color: rgba(214, 214, 214, 0.25);
    }
  </style>
</head>

<body class="">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
      <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="{{ route('login')}}">
        EWS RSSA FIKES UB
      </a>
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse mx-auto" id="navigation">
        <div class="mx-auto">
          <ul class="navbar-nav flex-row justify-content-center align-items-center">
            <li class="nav-item">
              <a class="nav-link me-2" href="{{ route('login')}}">
                <i class="fas fa-key opacity-6 me-1"></i>
                Sign In
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="{{ route('about')}}">
                <i class="fa fa-chart-pie opacity-6 me-1"></i>
                About
              </a>
            </li>
          </ul>
        </div>
      </div>
      <ul class="navbar-nav ms-auto d-lg-block d-none">
        <li class="nav-item">
          <a href="{{ route('login') }}" class="btn btn-sm mb-0 me-1 btn-primary bg-gradient-light">Sign in</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- End Navbar -->
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('{{asset('img/bg-primary.jpg')}}'); background-position: bottom;">
      <span class="mask bg-gradient-dark opacity-8"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">EWS RSSA FIKES UB</h1>
            <h4 class="text-white position-relative">"Ruang Bunaken"</h4>
            <p class="text-lead text-white mt-4">Project EWS RSSA FIKES UB dibangun untuk memudahkan pengguna dalam merekam data EWS pasien. Project ini dikembangkan oleh Kelompok 6A dan 6B pada Stase Manajemen Keperawatan Program Studi Profesi Ners 2025 Departemen Keperawatan Fakultas Ilmu Kesehatan Universitas Brawijaya</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n14 mt-md-n12 mt-n12 justify-content-center">
        <div class="row g-4 mt-4 flex-grow-1" style="min-height: 50vh;">

          {{-- Anggota 1 --}}
          <div class="col-md-4 mt-5 pt-5">
            <div class="card card-profile">
              <div class="row justify-content-center">
                <div class="col-12 order-lg-2 mx-auto">
                  <div class="mt-n6 mt-lg-n6 mb-4 mb-lg-0 text-center">
                      <img src="{{ asset('img/profile/1.jpeg') }}" class="rounded-circle border border-2 border-white mx-auto" style="object-fit: cover; object-position:top; width: 180px; height: 180px;">
                  </div>
                </div>
              </div>
              <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
              </div>
              <div class="card-body pt-0">
                <div class="text-center mt-2">
                  <h5 class="text-primary">
                    Muhammad Sahadewo Pintarto
                  </h5>
                  <div>
                    <i class="ni education_hat mr-2"></i>240170100011145
                  </div>
                </div>
              </div>
            </div>
          </div>

          {{-- Anggota 2 --}}
          <div class="col-md-4 mt-5 pt-5">
            <div class="card card-profile" style="height: 100%;">
              <div class="row justify-content-center">
                <div class="col-12 order-lg-2 mx-auto">
                  <div class="mt-n6 mt-lg-n6 mb-4 mb-lg-0 text-center">
                      <img src="{{ asset('img/profile/2.jpeg') }}" class="rounded-circle border border-2 border-white mx-auto" style="object-fit: cover; object-position:top; width: 180px; height: 180px;">
                  </div>
                </div>
              </div>
              <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
              </div>
              <div class="card-body pt-0">
                <div class="text-center mt-2">
                  <h5 class="text-primary">
                    Latifatul Hasanah
                  </h5>
                  <div>
                    <i class="ni education_hat mr-2"></i>240170100011175

                  </div>
                </div>
              </div>
            </div>
          </div>

          {{-- Anggota 1 --}}
          <div class="col-md-4 mt-5 pt-5">
            <div class="card card-profile" style="height: 100%;">
              <div class="row justify-content-center">
                <div class="col-12 order-lg-2 mx-auto">
                  <div class="mt-n6 mt-lg-n6 mb-4 mb-lg-0 text-center">
                      <img src="{{ asset('img/profile/3.jpeg') }}" class="rounded-circle border border-2 border-white mx-auto" style="object-fit: cover; object-position:top; width: 180px; height: 180px;">
                  </div>
                </div>
              </div>
              <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
              </div>
              <div class="card-body pt-0">
                <div class="text-center mt-2">
                  <h5 class="text-primary">
                    Dian Putri Devitasari
                  </h5>
                  <div>
                    <i class="ni education_hat mr-2"></i>240170100011103
                  </div>
                </div>
              </div>
            </div>
          </div>

          {{-- Anggota 1 --}}
          <div class="col-md-4 mt-5 pt-5">
            <div class="card card-profile" style="height: 100%;">
              <div class="row justify-content-center">
                <div class="col-12 order-lg-2 mx-auto">
                  <div class="mt-n6 mt-lg-n6 mb-4 mb-lg-0 text-center">
                      <img src="{{ asset('img/profile/4.jpeg') }}" class="rounded-circle border border-2 border-white mx-auto" style="object-fit: cover; object-position:top; width: 180px; height: 180px;">
                  </div>
                </div>
              </div>
              <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
              </div>
              <div class="card-body pt-0">
                <div class="text-center mt-2">
                  <h5 class="text-primary">
                    Halimin
                  </h5>
                  <div>
                    <i class="ni education_hat mr-2"></i>240170100011157
                  </div>
                </div>
              </div>
            </div>
          </div>

          {{-- Anggota 1 --}}
          <div class="col-md-4 mt-5 pt-5">
            <div class="card card-profile" style="height: 100%;">
              <div class="row justify-content-center">
                <div class="col-12 order-lg-2 mx-auto">
                  <div class="mt-n6 mt-lg-n6 mb-4 mb-lg-0 text-center">
                      <img src="{{ asset('img/profile/5.jpeg') }}" class="rounded-circle border border-2 border-white mx-auto" style="object-fit: cover; object-position:top; width: 180px; height: 180px;">
                  </div>
                </div>
              </div>
              <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
              </div>
              <div class="card-body pt-0">
                <div class="text-center mt-2">
                  <h5 class="text-primary">
                    Hadijah
                  </h5>
                  <div>
                    <i class="ni education_hat mr-2"></i>240170100011192
                  </div>
                </div>
              </div>
            </div>
          </div>

          {{-- Anggota 6 --}}
          <div class="col-md-4 mt-5 pt-5">
            <div class="card card-profile" style="height: 100%;">
              <div class="row justify-content-center">
                <div class="col-12 order-lg-2 mx-auto">
                  <div class="mt-n6 mt-lg-n6 mb-4 mb-lg-0 text-center">
                      <img src="{{ asset('img/profile/6.jpeg') }}" class="rounded-circle border border-2 border-white mx-auto" style="object-fit: cover; object-position:top; width: 180px; height: 180px;">
                  </div>
                </div>
              </div>
              <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
              </div>
              <div class="card-body pt-0">
                <div class="text-center mt-2">
                  <h5 class="text-primary">
                    Niken Ayu Lestari
                  </h5>
                  <div>
                    <i class="ni education_hat mr-2"></i>240170100011120
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer mt-3 py-5">
    <div class="container">
      <div class="row">
        <div class="col-8 mx-auto text-center mt-3">
          <div class="mt-3">
            <img src="{{ asset('img/logofikes.png') }}" alt="Logo 1" style="height:40px; margin-right:10px;">
            <img src="{{ asset('img/logo.webp') }}" alt="Logo 2" style="height:40px;">
          </div>
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script> 
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="{{ asset('js/core/popper.min.js')}}"></script>
  <script src="{{ asset('js/core/bootstrap.min.js')}}"></script>
  <script src="{{ asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{ asset('js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.1.0"></script>
</body>

</html>