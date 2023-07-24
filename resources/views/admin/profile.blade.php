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
    @elseif(session('failed'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h6><i class="fas fa-check"></i><b> Failed!</b></h6>
        {{session('failed')}}
      </div> 
    @endif
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <a href="#" onclick="history.go(-1)" class="btn btn-danger text-white" type="button"><i class="fas fa-fw fa-arrow-left"></i><span>Back</span></a>
        </div>
          <div class="card p-3 col-lg-6">
            <form action="/changePassword" method="POST">
              @csrf
                <input type="hidden" name="iduser" value="{{$user->id}}">
                @if (Session('role')=='siswa')
                <div class="form-group">
                  <label for="exampleFormControlReadonly">Nama</label>
                  <input class="form-control" type="text" placeholder="{{$siswa->nama_siswa}}" id="exampleFormControlReadonly" readonly="">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlReadonly">Kelas</label>
                  <input class="form-control" type="text" placeholder="{{$siswa->kelas->kelas}}" id="exampleFormControlReadonly" readonly="">
                </div>
                @endif
                {{-- - --}}
                @if (Session('role')=='guru'|| Session('role')=='wali')
                <div class="form-group">
                  <label for="exampleFormControlReadonly">Nama</label>
                  <input class="form-control" type="text" placeholder="{{$guru->nama_guru}}" id="exampleFormControlReadonly" readonly="">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect2">Mata Pelajaran</label>
                  <select multiple="" class="form-control" id="exampleFormControlSelect2" disabled>
                    @foreach ($guru->tb_mapel_guru as $std)
                        <option value="">{{$std->mapel}}</option>
                    @endforeach
                  </select>
                </div>
                @endif
                <x-form.input-form type="password" action="update" key="oldPassword" label="Password Lama" :data="$user" />
                <x-form.input-form type="password" action="update" key="newPassword" label="Password Baru" :data="$user" />
                <x-btn-submit title="Update" />
                <hr>
          </form>
          </div>
        
    </div>
</div>

@endsection