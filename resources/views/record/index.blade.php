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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">EWS Record</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">EWS Record</h6>
        </nav>
        
      </div>
    </nav>
    <!-- End Navbar -->


    <div class="container-fluid py-4">
      {{-- SCHEDULE --}}
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-2">
              
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

              <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                  <h6>Daftar EWS Record</h6>
                </div>
                <div class="col-md-4 col-12 d-flex align-items-end ms-auto">
                  <select name="filter" id="filter" class="form-control d-inline-block ml-3">
                    <option value="" selected disabled>Filter Kategori</option>
                    <option value="all">Semua</option>
                    <option value="hijau">Hijau</option>
                    <option value="kuning">Kuning</option>
                    <option value="orange">Oranye</option>
                    <option value="merah">Merah</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              @if ($ewsRecords->isEmpty())
                <div class="text-center">
                  <i class="ni ni-fat-remove ni-2x text-danger mb-1"></i>
                    <p class="text-sm text-secondary">Belum ada EWS Record.</p>
                </div>
              @else
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0" id="table">
                    <thead>
                      <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama & No. Rekam Medis</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Skor</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pelapor</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pernapasan</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Denyut Jantung</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tekanan Sistolik</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tingkat Kesadaran</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Suhu Tubuh</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                        <th class="text-secondary opacity-7"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($ewsRecords as $ewsRecord)
                      <tr>
                        <td class="align-middle">
                          <div class="d-flex flex-column ms-3">
                            <span class="text-primary text-lg font-weight-bold">{{ $ewsRecord->name }}</span>
                            <h6 class="mb-0 text-sm text-secondary">{{ $ewsRecord->medic_number }}</h6>
                          </div>
                        </td>
                        <td>
                          @php
                            $color_code = '';
                            $target = '';
                            $score_total = abs($ewsRecord->score_1) + abs($ewsRecord->score_2) + abs($ewsRecord->score_3) + abs($ewsRecord->score_4) + abs($ewsRecord->score_5);
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
                          <div class="d-flex px-0 py-1">
                            <div class="d-flex flex-column justify-content-center mx-auto">

                              <button class="btn {{$color_code}} text-white text-lg font-weight-bold" data-bs-toggle="modal" data-bs-target="#{{ $target }}">
                                <strong class="score-total">{{$score_total}}</strong>
                              </button>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle">
                          <div class="d-flex flex-column ms-3">
                            <span class="text-secondary text-sm font-weight-bold">{{ $ewsRecord->user->name }}</span>
                          </div>
                        </td>
                        <td>
                          <div class="d-flex px-0 py-1">
                            <div class="d-flex flex-column justify-content-center mx-auto">
                              <h6 class="mb-0 text-sm">
                                @if($ewsRecord->score_1 == 2)
                                  < 8
                                @elseif($ewsRecord->score_1 == 1)
                                  8
                                @elseif($ewsRecord->score_1 == 0)
                                  9-17
                                @elseif($ewsRecord->score_1 == -1)
                                  18-20
                                @elseif($ewsRecord->score_1 == -2)
                                  21-29
                                @elseif($ewsRecord->score_1 == -3)
                                  >= 30
                                @endif
                              </h6>
                              <h6 class="mb-0 text-sm text-center text-primary">
                                ({{ abs($ewsRecord->score_1 )}})
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="d-flex px-0 py-1">
                            <div class="d-flex flex-column justify-content-center mx-auto">
                              <h6 class="mb-0 text-sm">
                                @if($ewsRecord->score_2 == 2)
                                  < 40
                                @elseif($ewsRecord->score_2 == 1)
                                  40-50
                                @elseif($ewsRecord->score_2 == 0)
                                  51-100
                                @elseif($ewsRecord->score_2 == -1)
                                  101-110
                                @elseif($ewsRecord->score_2 == -2)
                                  111-129
                                @elseif($ewsRecord->score_2 == -3)
                                  >= 130
                                @endif
                              </h6>
                              <h6 class="mb-0 text-sm text-center text-primary">
                                ({{ abs($ewsRecord->score_2 )}})
                              </h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="d-flex px-0 py-1">
                            <div class="d-flex flex-column justify-content-center mx-auto">
                              <h6 class="mb-0 text-sm">
                                @if($ewsRecord->score_3 == 3)
                                  < 70
                                @elseif($ewsRecord->score_3 == 2)
                                  71-80
                                @elseif($ewsRecord->score_3 == 1)
                                  81-100
                                @elseif($ewsRecord->score_3 == 0)
                                  101-159
                                @elseif($ewsRecord->score_3 == -1)
                                  160-199
                                @elseif($ewsRecord->score_3 == -2)
                                  200-220
                                @elseif($ewsRecord->score_3 == -3)
                                  >= 220
                                @endif
                              </h6>
                              <h6 class="mb-0 text-sm text-center text-primary">
                                ({{ abs($ewsRecord->score_3 )}})
                              </h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="d-flex px-0 py-1">
                            <div class="d-flex flex-column justify-content-center mx-auto">
                              <h6 class="mb-0 text-sm">
                                @if($ewsRecord->score_4 == 3)
                                  Tidak ada respon (coma)
                                @elseif($ewsRecord->score_4 == 2)
                                  Respon terhadap rangsang nyeri (Stupor)
                                @elseif($ewsRecord->score_4 == 1)
                                  Respon terhadap suara (Somnolen)
                                @elseif($ewsRecord->score_4 == 0)
                                  Sadar Penuh (Composmentis)
                                @elseif($ewsRecord->score_4 == -1)
                                  Gelisah atau bingung (Apatis)
                                @elseif($ewsRecord->score_4 == -2)
                                  Gelisah atau bingung baru terjadi (Apatis)
                                @endif
                              </h6>
                              <h6 class="mb-0 text-sm text-center text-primary">
                                ({{ abs($ewsRecord->score_4 )}})
                              </h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="d-flex px-0 py-1">
                            <div class="d-flex flex-column justify-content-center mx-auto">
                              <h6 class="mb-0 text-sm">
                                @if($ewsRecord->score_5 == 2)
                                  < 35 C
                                @elseif($ewsRecord->score_5 == 1)
                                  35 C - 36 C
                                @elseif($ewsRecord->score_5 == 0)
                                  36 C - 38 C
                                @elseif($ewsRecord->score_5 == -1)
                                  38 C - 38.5 C
                                @elseif($ewsRecord->score_5 == -2)
                                  >= 38.5 C
                                @endif
                              </h6>
                              <h6 class="mb-0 text-sm text-center text-primary">
                                ({{ abs($ewsRecord->score_5 )}})
                              </h6>
                            </div>
                          </div>
                        </td>
                        

                        <td class="align-middle">
                          <a href="{{ route('record.show', $ewsRecord) }}" class="text-warning font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            Detail
                          </a>

                          <!-- Link-style delete using a tag -->
                          <a href="#" class="text-danger ms-3 font-weight-bold text-xs"
                              onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this schedule?')) { document.getElementById('delete-form{{$ewsRecord->id}}').submit(); }">
                              Hapus
                          </a>

                          <form id="delete-form{{$ewsRecord->id}}" action="{{ route('record.destroy', $ewsRecord) }}" method="POST" style="display: none;">
                              @csrf
                              @method('DELETE')
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>

      {{-- MODAL Tata laksana - HIJAU --}}
      <div class="modal fade" id="hijau" tabindex="-1" role="dialog" aria-labelledby="hijauModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card card-plain">
                <div class="card-header pb-0 text-left">
                    <h5 class="font-weight-bolder text-success">Tata Laksana</h5>
                    <p class="mb-0">Tata Laksana pasien dengan skor total 0-1 <strong class="text-success">(Hijau)</strong></p>
                </div>
                <div class="card-body pb-3">
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
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>

      {{-- MODAL Tata laksana - KUNING --}}
      <div class="modal fade" id="kuning" tabindex="-1" role="dialog" aria-labelledby="kuningModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card card-plain">
                <div class="card-header pb-0 text-left">
                    <h5 class="font-weight-bolder text-yellow">Tata Laksana</h5>
                    <p class="mb-0">Tata Laksana pasien dengan skor total 2-3 <strong class="text-yellow">(Kuning)</strong></p>
                </div>
                <div class="card-body pb-3">
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
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>

      {{-- MODAL Tata laksana - ORANGE --}}
      <div class="modal fade" id="orange" tabindex="-1" role="dialog" aria-labelledby="orangeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card card-plain">
                <div class="card-header pb-0 text-left">
                    <h5 class="font-weight-bolder text-warning">Tata Laksana</h5>
                    <p class="mb-0">Tata Laksana pasien dengan skor total 4-5 <strong class="text-warning">(Oranye)</strong></p>
                </div>
                <div class="card-body pb-3">
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
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>

      {{-- MODAL Tata laksana - MERAH --}}
      <div class="modal fade" id="merah" tabindex="-1" role="dialog" aria-labelledby="merahModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card card-plain">
                <div class="card-header pb-0 text-left">
                    <h5 class="font-weight-bolder text-danger">Tata Laksana</h5>
                    <p class="mb-0">Tata Laksana pasien dengan skor >= 6 <strong class="text-danger">(Merah)</strong></p>
                </div>
                <div class="card-body pb-3">
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
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
      

      {{-- FOOTER --}}
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

  </main>
  
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
      

      // Filter table
      const filter = document.getElementById('filter');
      filter.addEventListener('change', function() {
        const value = filter.value;
        table.querySelectorAll('tbody tr').forEach(tr => {
          const scoreCell = tr.querySelector('.score-total');
          if (!scoreCell) return;
          const score = scoreCell.textContent.trim();

          if (value === 'all') {
            tr.style.display = 'table-row';
          } else if(value === 'hijau') {
            if(score > 0 && score <= 1) {
              tr.style.display = 'table-row';
            } else {
              tr.style.display = 'none';
            }
          } else if(value === 'kuning') {
            if(score > 1 && score <= 3) {
              tr.style.display = 'table-row';
            } else { 
              tr.style.display = 'none';
            }
          } else if(value === 'orange') {
            if(score > 3 && score <= 5) {
              tr.style.display = 'table-row';
            } else {
              tr.style.display = 'none'; 
            }
          } else if(value === 'merah') {
            if(score > 5 ) {
              tr.style.display = 'table-row';
            } else {
              tr.style.display = 'none'; 
            }
          }

          // if(score > 0 && score <= 1) {
          //   tr.style.display = 'table-row';
          // } else if(score > 1 && score <= 3) {
          //   tr.style.display = 'table-row';
          // } else if(score > 3 && score <= 5) {
          //   tr.style.display = 'table-row';
          // } else if(score > 5 ) {
          //   tr.style.display = 'table-row';
          // }
        });
      });
    });
</script>
@endsection