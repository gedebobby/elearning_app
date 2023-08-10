@extends('layout.master')

@section('content')

<div class="row mb-3">
    <!-- Invoice Example -->
    <div class="col-xl-12 col-lg-7 mb-4">
      <div class="card p-2">
        <div class="my-1 mb-3 d-flex flex-row align-items-center justify-content-between">
          {{-- <h5 class="m-0 font-weight-bold text-primary">MATERI</h5> --}}
          <a href="/student" class="btn btn-danger text-white" type="button"><i class="fas fa-fw fa-arrow-left"></i><span>Back</span></a>
        </div>
        <div class="row">
          @if ($tugas->count() == 0)
            <h2 class="p-3">Belum ada tugas</h2>
          @endif
              @foreach ($tugas as $std)
              <div class="col-xl-6 col-md-12 mb-4">
                      <div class="card h-100">
                        <div class="card-header bg-primary text-center">
                            <p class="text-lg font-weight-bold text-white text-capitalize mb-1">{{$std->nama_tugas}}</p>
                            {{-- <i class="fas fa-clipboard fa-2x text-info"></i> --}}
                        </div>
                          <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                              <div class="text-lg font-weight-bold text-capitalize mb-1">{{$std->mapel->mapel}}</div>
                              {{-- <div class="text-md text-capitalize mb-1">Pengajar : {{$std->guru->nama_guru}}</div> --}}
                              @php
                                    $cek = App\Http\Controllers\Siswa\DashboardController::cekAssignment($std->id, Session('id_siswa'));
                              @endphp
                              <div class="text-md text-capitalize mb-1">Status Pengumpulan : @if ($cek >= 1) <span class="badge badge-success">Sudah Mengumpulkan</span> @else <span class="badge badge-danger">Belum Mengumpulkan</span> @endif</div>
                              <hr>
                              <div class="text-md text-capitalize mb-1">Status : @if ($std->status == 1) <span class="badge badge-warning">Waktu Belum Habis</span> @else <span class="badge badge-danger">Waktu Sudah Habis</span> @endif</div>
                              <div class="text-md text-capitalize mb-1">
                                @php
                                    $nilai = App\Http\Controllers\Siswa\DashboardController::getNilai($std->id, Session('id_siswa'))
                                @endphp
                                Nilai : 
                                  @if (!$nilai)
                                  <span class="badge badge-danger">0<i class="fas fa-star text-white"></i></span>
                                  @elseif($nilai)
                                    @if($nilai->nilai <= 49 && $nilai->nilai >= 0 )
                                      <span class="badge badge-danger">{{$nilai->nilai}} <i class="fas fa-star text-white"></i></span> 
                                      @elseif($nilai->nilai <= 79 && $nilai->nilai >= 50)                                   
                                      <span class="badge badge-warning">{{$nilai->nilai}} <i class="fas fa-star text-white"></i></span>
                                      @elseif($nilai->nilai <= 100 && $nilai->nilai >= 80)
                                      <span class="badge badge-success">{{$nilai->nilai}} <i class="fas fa-star text-white"></i></span>
                                    @endif
                                  @endif
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <a href="/student/tugas/{{$std->id}}" class="btn btn-md btn-primary @if($std->status == 0) disabled @endif">Kerjakan</a>
                        <div class="deadline">
                          <span class="badge @if($std->status == 1) badge-success @else badge-danger @endif"><i class="fas fa-calendar text-white"></i> {{$std->batas_tgl}}</span>
                          <span class="badge @if($std->status == 1) badge-success @else badge-danger @endif"><i class="fas fa-clock text-white"></i> {{$std->batas_waktu}}</span>
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