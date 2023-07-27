@extends('layout.master')

@section('content')

<div class="row mb-3">
  
    <!-- Invoice Example -->
    <div class="col-xl-12 col-lg-7 mb-4">
      @if (session('msg'))
      <div class='alert alert-success alert-dismissible' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>×</span>
        </button>
        <h6><i class='fas fa-check'></i><b> Success!</b></h6>
        Ujian Telah Dikerjakan
      </div>
      @endif
      <div class="card p-2">
        <div class="my-1 mb-3 d-flex flex-row align-items-center justify-content-between">
          {{-- <h5 class="m-0 font-weight-bold text-primary">MATERI</h5> --}}
          <a href="/student" class="btn btn-danger text-white" type="button"><i class="fas fa-fw fa-arrow-left"></i><span>Back</span></a>
        </div>
        @if ($ujian->count() == 0)
            <h2 class="p-3">Belum ada Ujian</h2>
        @endif
        <div class="row">
              @foreach ($ujian as $std)
              <div class="col-xl-6 col-md-12 mb-4">
                <div class="card h-100">
                <div class="card-header bg-primary text-center">
                    <p class="text-lg font-weight-bold text-white text-capitalize mb-1">{{$std->nama_ujian}}</p>
                </div>
                    <div class="card-body">
                      @php
                          $statusUjian = App\Http\Controllers\Siswa\DashboardController::cekStatusUjian($std->id);
                      @endphp 
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <div class="text-lg font-weight-bold text-capitalize mb-1">Mata Pelajaran : {{$std->mapel->mapel}}</div>
                        <div class="text-lg font-weight-bold text-capitalize mb-1">Kelas : {{$std->kelas->kelas}}</div>
                        <div class="text-lg font-weight-bold text-capitalize mb-1">Tanggal : {{$std->tgl_mulai}}</div>
                        <div class="text-lg font-weight-bold text-capitalize mb-1">Waktu : {{$std->waktu}} Menit</div>
                        <div class="text-lg font-weight-bold text-capitalize mb-1">Status : 
                          @if ($statusUjian == 'submited')
                            {{-- <div class="text-lg font-weight-bold text-capitalize mb-1 bg-dark"> --}}
                              <span class="badge badge-success"> Ujian Sudah Dikerjakan <i class="fas fa-check text-white"></i></span>
                            {{-- </div> --}}
                          @else
                            @switch($statusUjian)
                                @case('ujian-belum-mulai')
                                  <span class="badge badge-warning"> Ujian Belum Dimulai <i class="fas fa-hourglass-start text-white"></i></span>
                                  @break
                                @case('ujian-dibuka')
                                  <span class="badge badge-success"> Ujian Dibuka <i class="fas fa-check text-white"></i></span>
                                    @break
                                @case('ujian-selesai')
                                  <span class="badge badge-danger"> Ujian Selesai <i class="fas fa-times text-white"></i></span>
                                    @break
                                @case('submited')
                                  <span class="badge badge-danger"> Ujian Selesai <i class="fas fa-times text-white"></i></span>
                                    @break
                                @default
                                    <p>test</p>
                            @endswitch
                          @endif
                        <hr>
                        </div>
                        
                        <div class="card-footer d-flex justify-content-center align-items-center">
                        <a href="/student/ujian/{{$std->id}}" class="btn btn-md btn-primary @if($statusUjian == 'ujian-belum-mulai' || $statusUjian == 'ujian-selesai' || $statusUjian == 'submited') disabled @endif">Kerjakan</a>
                        </div>
                    </div>
                </div>
                </div>
                </div>
              </div>
              @endforeach
        </div>
        <div class="card-footer"></div>
      </div>
    </div>
    
  </div>

@endsection