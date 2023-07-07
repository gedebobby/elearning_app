@extends('layout.master')

@section('content')

<div class="col-lg-12">
  @if (session('success'))
  <x-success-Msg/>
  @endif
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <a href="/siswa" class="btn btn-danger text-white" type="button"><i class="fas fa-fw fa-arrow-left"></i><span>Back</span></a>
        </div>
          <div class="card p-3 col-lg-6">
            <form action="/siswa/{{$siswa->id}}" method="POST">
              @csrf
              @method('PUT')
                <x-form.input-form type="text" action="update" key="nama_siswa" label="Nama Siswa" :data="$siswa" />
                <x-form.input-form type="text" action="update" key="nis" label="NIS" :data="$siswa" />
                <div class="form-group">
                  <label for="kelas">Kelas</label>
                  <select class="form-control custom-select @error('id_kelas') is-invalid @enderror" name='id_kelas' id="kelas">
                      <option value="">Pilih Kelas</option>
                    @foreach ($kelas as $std)
                      <option {{ $siswa->id_kelas == $std->id ? "selected" : "" }}  value="{{$std->id}}">{{$std->kelas}}</option>
                    @endforeach
                  </select>
                  <x-error-validation input="id_kelas" />
                </div>
                <x-btn-submit title="Update" />
                <hr>
          </form>
          </div>
    </div>
</div>

@endsection