@extends('layout.master')

@section('content')

<div class="row mb-3">
    <div class="col-xl-12 col-lg-7 mb-4">
        @if ($checkPass == false)
        <x-error-Msg/>
        @endif
      <div class="card p-2">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h5 class="m-0 font-weight-bold text-primary">Informasi Beranda</h5>
        </div>
        <div class="row">
            @foreach ($kelas as $std)
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="/listsiswa/{{$std->id}}" class="text-decoration-none">
                    <div class="card h-100">
                        <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col-3">
                            <i class="fas fa-users fa-2x text-info"></i>
                            </div>
                            <div class="col-auto">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Kelas {{$std->kelas}}</div>
                            </div>
                        </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            
        </div>
        <div class="card-footer"></div>
      </div>
    </div>
  </div>

@endsection

