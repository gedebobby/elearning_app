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
            <form action="/guru/{{$guru->id}}" method="POST">
              @csrf
              @method('PUT')
                <x-form.input-form type="text" action="update" key="nama_guru" label="Nama Guru" :data="$guru" />
                <x-form.input-form type="text" action="update" key="nip" label="NIP" :data="$guru" />
                <div class="form-group">
                  <select class="form-control custom-select @error('role_guru') is-invalid @enderror" name='role_guru' id="kelas">
                    <option value="">Pilih Role Guru</option>
                        <option {{$guru->role_guru == 'wali' ? 'selected' : ''}} value="wali">Wali</option>
                        <option {{$guru->role_guru == 'guru' ? 'selected' : ''}} value="guru">Guru</option>
                  </select>
                  <x-error-validation input="role_guru" />
                </div>
                <x-btn-submit title="Update" />
                <hr>
          </form>
          </div>
        
    </div>
</div>

@endsection