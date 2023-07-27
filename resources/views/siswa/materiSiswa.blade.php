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
              @foreach ($mapel as $std)
              <div class="col-xl-4 col-md-4 mb-4">
                  <a href="/student/materi/{{$std->id}}" class="text-decoration-none text-dark">
                      <div class="card h-100">
                          <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col-6">
                              <i class="fas fa-book fa-2x text-info"></i>
                              </div>
                              <div class="col-auto">
                              <div class="text-xs font-weight-bold text-uppercase mb-1">{{$std->mapel}}</div>
                              {{-- <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$countGuru}}</div> --}}
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