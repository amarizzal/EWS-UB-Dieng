
@extends('layouts.layout')

@section('styles')
<style>
  .text-success {
    color: #28a745 !important;
  }
  .text-yellow {
    color: #ffc107 !important;
  }
  .text-warning {
    color: #ff9800 !important;
  }
  .text-danger {
    color: #f44336 !important;
  }

  .bg-success {
    background-color: #28a745 !important;
  }
  .bg-yellow {
    background-color: #ffc107 !important;
  }
  .bg-warning {
    background-color: #ff9800 !important;
  }
  .bg-danger {
    background-color: #f44336 !important;
  }
</style>
@endsection

@section('content')

  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Halaman</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item d-xl-none">
              <a href="{{ route('logout') }}" class="nav-link text-white p-0">
                <i class="ni ni-button-power"></i>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
        
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          @if(session('success'))
            <div class="alert alert-success text-white" role="alert">
              <strong>Success!</strong> {{ session('success') }}
            </div>
          @endif
          @if (session('error') )
              <div class="alert alert-danger">
                  <ul>
                    <strong>Error!</strong> {{ session('error') }}
                  </ul>
              </div>
          @endif
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Input Data Pasien</h6>
            </div>
            <div class="card-body pt-0 pb-2 ">
              <form method="POST" action="{{ route('dashboard.store') }}">
                @csrf 
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="name">Nama</label>
                    <input type="text" name="name" class="form-control" value="@if(session('ews')){{ session('ews')->name }}@endif" id="name" placeholder="nama pasien" required @if(session('ews')) readonly @endif>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="medic_number">No. Rekam Medis</label>
                    <input type="number" name="medic_number" class="form-control" value="@if(session('ews')){{ session('ews')->medic_number }}@endif" id="medic_number" placeholder="no. rekam medis" required @if(session('ews')) readonly @endif>
                  </div>

                  <div class="form-group col-md-4 border-end">
                    <label for="score_1">Pernapasan</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_1" id="score_1_1" value="2" @if(session('ews')) {{ session('ews')->score_1 == 2 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_1_1">< 8</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_1" id="score_1_2" value="1" @if(session('ews')) {{ session('ews')->score_1 == 1 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_1_2">8</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_1" id="score_1_3" value="0" @if(session('ews')) {{ session('ews')->score_1 == 0 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_1_3">9 - 17</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_1" id="score_1_4" value="-1" @if(session('ews')) {{ session('ews')->score_1 == -1 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_1_4">18 - 20</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_1" id="score_1_5" value="-2" @if(session('ews')) {{ session('ews')->score_1 == -2 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_1_5">21 - 29</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_1" id="score_1_6" value="-3" @if(session('ews')) {{ session('ews')->score_1 == -3 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_1_6">>= 30</label>
                    </div>
                  </div>

                  <div class="form-group col-md-4 border-end">
                    <label for="score_1">Denyut Jantung</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_2" id="score_2_1" value="2" @if(session('ews')) {{ session('ews')->score_2 == 2 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_2_1">< 40</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_2" id="score_2_2" value="1" @if(session('ews')) {{ session('ews')->score_2 == 1 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_2_2">40 - 50</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_2" id="score_2_3" value="0" @if(session('ews')) {{ session('ews')->score_2 == 0 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_2_3">51 - 100</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_2" id="score_2_4" value="-1" @if(session('ews')) {{ session('ews')->score_2 == -1 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_2_4">101 - 110</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_2" id="score_2_5" value="-2" @if(session('ews')) {{ session('ews')->score_2 == -2 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_2_5">111 - 129</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_2" id="score_2_6" value="-3" @if(session('ews')) {{ session('ews')->score_2 == -3 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_2_6">>= 130</label>
                    </div>

                  </div>

                  <div class="form-group col-md-4 border-end">
                    <label for="score_1">Tekanan Sistolik</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_3" id="score_3_1" value="3" @if(session('ews')) {{ session('ews')->score_3 == 3 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_3_1"><= 70</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_3" id="score_3_2" value="2" @if(session('ews')) {{ session('ews')->score_3 == 2 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_3_2">71 - 80</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_3" id="score_3_3" value="1" @if(session('ews')) {{ session('ews')->score_3 == 1 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_3_3">81 - 100</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_3" id="score_3_4" value="0" @if(session('ews')) {{ session('ews')->score_3 == 0 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_3_4">101 - 159</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_3" id="score_3_5" value="1" @if(session('ews')) {{ session('ews')->score_3 == 1 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_3_5">160 - 199</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_3" id="score_3_6" value="-2" @if(session('ews')) {{ session('ews')->score_3 == -2 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_3_6">200 - 220</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_3" id="score_3_7" value="-3" @if(session('ews')) {{ session('ews')->score_3 == -3 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_3_7">>= 220</label>
                    </div>
                  </div>

                  <div class="form-group col-md-4 border-end">
                    <label for="score_1">Tingkat Kesadaran (AVPU)</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_4" id="score_4_1" value="3" @if(session('ews')) {{ session('ews')->score_4 == 3 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_4_1">Tidak ada respon (coma)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_4" id="score_4_2" value="2" @if(session('ews')) {{ session('ews')->score_4 == 2 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_4_2">Respon terhadap rangsang nyeri (Stupor)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_4" id="score_4_3" value="1" @if(session('ews')) {{ session('ews')->score_4 == 1 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_4_3">Respon terhadap suara (Somnolen)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="score_4" id="score_4_4" value="0" @if(session('ews')) {{ session('ews')->score_4 == 0 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_4_4">Sadar Penuh (Composmentis)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_4" id="score_4_5" value="-1" @if(session('ews')) {{ session('ews')->score_4 == -1 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_4_5">Gelisah atau bingung (Apatis)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_4" id="score_4_6" value="-2" @if(session('ews')) {{ session('ews')->score_4 == -2 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_4_6">Gelisah atau bingung baru terjadi (Apatis)</label>
                    </div>
                  </div>

                  <div class="form-group col-md-4 border-end">
                    <label for="score_1">Suhu Tubuh</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_5" id="score_5_2" value="2" @if(session('ews')) {{ session('ews')->score_5 == 2 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_5_2">< 35 C</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_5" id="score_5_3" value="1" @if(session('ews')) {{ session('ews')->score_5 == 1 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_5_3">35 C - 36 C</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_5" id="score_5_4" value="0" @if(session('ews')) {{ session('ews')->score_5 == 0 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_5_4">36 C - 38 C</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_5" id="score_5_5" value="-1" @if(session('ews')) {{ session('ews')->score_5 == -1 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_5_5">38 C - 38.5 C</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="score_5" id="score_5_6" value="-2" @if(session('ews')) {{ session('ews')->score_5 == -2 ? 'checked' : '' }} @endif>
                      <label class="custom-control-label" for="score_5_6">>= 38.5 C</label>
                    </div>
                  </div>
                </div>

                @if(session('ews'))
                @php
                  $color_code = '';
                  $target = '';
                  $score_total = abs(session('ews')->score_1) + abs(session('ews')->score_2) + abs(session('ews')->score_3) + abs(session('ews')->score_4) + abs(session('ews')->score_5);
                  if($score_total > 0 && $score_total <= 1) {
                    $color_code = 'bg-success';
                    $target = 'hijau';
                  } else if($score_total > 1 && $score_total <= 3) {
                    $color_code = 'bg-yellow';
                    $target = 'kuning';
                  } else if($score_total > 3 && $score_total <= 5) {
                    $color_code = 'bg-warning';
                    $target = 'orange';
                  } else if($score_total > 5 ) {
                    $color_code = 'bg-danger';
                    $target = 'merah';
                  }
                @endphp
                <div class="row">
                  <div class="form-group col-md-12">
                    <h5 class="font-weight-bolder">Skor Total</h5>
                    <button class="btn {{$color_code}} text-white text-lg font-weight-bold">
                      <strong class="score-total">{{$score_total}}</strong>
                    </button> <br>
                  </div>
                </div>
                @if($target == 'hijau')
                <div class="row">
                  <div class="form-group col-md-12">
                    <h5 class="font-weight-bolder text-success">Tata Laksana</h5>
                    <p class="mb-0">Tata Laksana pasien dengan skor total 0-1 <strong class="text-success">(Hijau)</strong></p>
                    <div class="row">
                      <div class="col-12">
                        <ul>
                          <li>
                            <p class="mb-0">Pasien dalam kondisi stabil</p>
                          </li>
                          <li>
                            <p class="mb-0">Pemantauan tanda vital setiap 6 jam</p>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                @elseif($target == 'kuning')
                <div class="row">
                  <div class="form-group col-md-12">
                    <h5 class="font-weight-bolder text-yellow">Tata Laksana</h5>
                    <p class="mb-0">Tata Laksana pasien dengan skor total 2-3 <strong class="text-yellow">(Kuning)</strong></p>
                    <div class="row">
                      <div class="col-12">
                        <ul>
                          <li>
                            <p class="mb-0">Pemantauan tanda vital setiap 2 jam</p>
                          </li>
                          <li>
                            <p class="mb-0">Perawat melapor ke dokter jaga</p>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                @elseif($target == 'orange')
                <div class="row">
                  <div class="form-group col-md-12">
                    <h5 class="font-weight-bolder text-orange">Tata Laksana</h5>
                    <p class="mb-0">Tata Laksana pasien dengan skor total 4-5 <strong class="text-orange">(Oranye)</strong></p>
                    <div class="row">
                      <div class="col-12">
                        <ul>
                          <li>
                            <p class="mb-0">Pantau TTV setiap 1 jam</p>
                          </li>
                          <li>
                            <p class="mb-0">Perawat melapor ke dokter jaga</p>
                          </li>
                          <li>
                            <p class="mb-0">Dokter jaga lapor ke DPJP</p>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                @elseif($target == 'merah')
                <div class="row">
                  <div class="form-group col-md-12">
                    <h5 class="font-weight-bolder text-danger">Tata Laksana</h5>
                    <p class="mb-0">Tata Laksana pasien dengan skor total >= 6 <strong class="text-danger">(Merah)</strong></p>
                    <div class="row">
                      <div class="col-12">
                        <ul>
                          <li>
                            <p class="mb-0">Pantau TTV setiap 1/2 jam</p>
                          </li>
                          <li>
                            <p class="mb-0">Perawat melapor ke dokter jaga</p>
                          </li>
                          <li>
                            <p class="mb-0">Dokter jaga lapor ke DPJP</p>
                          </li>
                          <li>
                            <p class="mb-0">Dokter jaga atau DPJP konsul intensivist</p>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                @endif

                @endif

                @if(!session('ews'))
                <button type="submit" class="btn bg-gradient-primary mt-3" >Submit</button>
                @endif
                @if(session('ews'))
                  <a href="{{ route('dashboard') }}" class="btn bg-secondary text-white mt-3">Reset</a>
                @endif
              </form>
            </div>
          </div>
        </div>
      </div>

      
      


      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>
              </div>
            </div>
            
          </div>
        </div>
      </footer>
    </div>
  </main>

@endsection

@section('scripts')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $('document').ready(function() {

    });
  </script>
@endsection
