@extends('layout.master')

@section('content')

<div class="row mb-3">
    <div class="col-xl-12 col-lg-7 mb-4">
        @if ($checkPass == false)
        <x-error-Msg/>
        @endif
      <div class="card p-2">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h5 class="m-0 font-weight-bold text-primary">Informasi</h5>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
            <a href="/listsiswa/1" class="text-decoration-none">
                <div class="card h-100">
                    <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Siswa Kelas 6 A</div>
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$siswa6A}}</div>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-users fa-2x text-info"></i>
                        </div>
                    </div>
                    </div>
                </div>
            </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
            <a href="/listsiswa/2" class="text-decoration-none">
                <div class="card h-100">
                    <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Siswa Kelas 6 B</div>
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$siswa6B}}</div>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-users fa-2x text-info"></i>
                        </div>
                    </div>
                    </div>
                </div>
            </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
            <a href="/listsiswa/2" class="text-decoration-none">
                <div class="card h-100">
                    <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Siswa Kelas 6 C</div>
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$siswa6C}}</div>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-users fa-2x text-info"></i>
                        </div>
                    </div>
                    </div>
                </div>
            </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
            <a href="/tugas" class="text-decoration-none">
                <div class="card h-100">
                    <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Tugas</div>
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$countTugas}}</div>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-book fa-2x text-info"></i>
                        </div>
                    </div>
                    </div>
                </div>
            </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
            <a href="/tugas" class="text-decoration-none">
                <div class="card h-100">
                    <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Ujian</div>
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$countUjian}}</div>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-book fa-2x text-info"></i>
                        </div>
                    </div>
                    </div>
                </div>
            </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
            <a href="/tugas" class="text-decoration-none">
                <div class="card h-100">
                    <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Materi</div>
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$countMateri}}</div>
                        </div>
                        <div class="col-auto">
                        <i class="fas fa-book fa-2x text-info"></i>
                        </div>
                    </div>
                    </div>
                </div>
            </a>
            </div>
        </div>
        <div class="card-footer"></div>
      </div>
    </div>
  </div>

@endsection