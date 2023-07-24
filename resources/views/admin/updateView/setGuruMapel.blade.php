@extends('layout.master')

@section('content')

<div class="col-lg-12">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h6><i class="fas fa-check"></i><b> Success!</b></h6>
        {{session('success')}}
      </div> 
    @endif
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <a href="/guru" class="btn btn-danger text-white" type="button"><i class="fas fa-fw fa-arrow-left"></i><span>Back</span></a>
        </div>
          <div class="card p-3 col-lg-6">
            <form action="/guru/set-mapel-guru" method="POST">
              @csrf
              {{-- @method('PUT') --}}
                {{-- <x-form.input-form type="text" action="update" key="nama_guru" label="Nama Guru" :data="$guru" /> --}}
                {{-- <x-form.input-form type="text" action="update" key="nip" label="NIP" :data="$guru" /> --}}
                <div class="form-group">
                    <label>Mata Pelajaran</label>
                    <input type="hidden" name="id_guru" value="{{$guru->id}}">
                    @foreach ($mapel as $std)
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" value="{{$std->id}}" name="id_mapel[]" id="customCheck2[{{$std->id}}]"
                          @foreach ($mapel_selected as $s)
                          {{$s->id_mapel == $std->id ? 'checked' : ''}}
                          @endforeach                        
                        >
                        <label class="custom-control-label" for="customCheck2[{{$std->id}}]">{{$std->mapel}}</label>
                      </div>
                    @endforeach
                  </div>
                <x-btn-submit title="Update" />
                <hr>
          </form>
          </div>
        
    </div>
</div>

@endsection