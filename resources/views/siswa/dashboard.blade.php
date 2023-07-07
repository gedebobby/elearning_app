@extends('layout.master')

@section('content')

<div class="row mb-3">
    <!-- Invoice Example -->
    <div class="col-xl-12 col-lg-7 mb-4">
        @if ($checkPass == false)
        <x-error-Msg/>
        @endif
      <div class="card p-2">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          {{-- <h5 class="m-0 font-weight-bold text-primary">Informasi</h5> --}}
        </div>
        <div class="row">
              <!-- Kelas Guru -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="student/materi" class="text-decoration-none text-info">
                    <div class="card h-100">
                        <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Materi</div>
                            {{-- <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$countGuru}}</div> --}}
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
                <a href="/student/tugas" class="text-decoration-none text-warning">
                    <div class="card h-100">
                        <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Tugas</div>
                            {{-- <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$countGuru}}</div> --}}
                            </div>
                            <div class="col-auto">
                            <i class="fas fa-pen fa-2x text-warning"></i>
                            </div>
                        </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="/student/ujian" class="text-decoration-none text-primary">
                    <div class="card h-100">
                        <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Ujian</div>
                            {{-- <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$countGuru}}</div> --}}
                            </div>
                            <div class="col-auto">
                            <i class="fas fa-clipboard fa-2x text-primary"></i>
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

  <!-- Modal Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <p>Are you sure you want to logout?</p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
        <a href="login.html" class="btn btn-primary">Logout</a>
        </div>
    </div>
    </div>
</div>

@endsection