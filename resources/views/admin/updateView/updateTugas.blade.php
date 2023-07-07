@extends('layout.master')

@section('content')

<div class="col-lg-12">
    @if (session('success'))
  <x-success-Msg/>
  @endif
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <a href="/tugas" class="btn btn-danger text-white" type="button"><i class="fas fa-fw fa-arrow-left"></i><span>Back</span></a>
        </div>
          <div class="card p-3 col-lg-6">
            <form action="/tugas/{{$tugas->id}}" method="POST">
                @csrf
                @method('PUT')
                <x-form.input-form type="text" value="{{$tugas->nama_tugas}}" key="nama_tugas" action="add" label="Nama Tugas" />
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="mapel">Mata Pelajaran</label>
                            <select class="form-control custom-select @error('id_mapel') is-invalid @enderror" name='id_mapel' id="mapel">
                                <option value="">Pilih Mapel</option>
                              @foreach ($mapel as $std)
                                <option {{ $tugas->id_mapel == $std->id ? "selected" : "" }} value="{{ $std->id }}" >{{$std->mapel}}</option>
                              @endforeach
                            </select>
                            <x-error-validation input="id_mapel" />
                          </div> 
                    </div>
                    <input type="hidden" value="1" name="id_guru">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <select class="form-control custom-select @error('id_kelas') is-invalid @enderror" name='id_kelas' id="kelas">
                                <option value="">Pilih Kelas</option>
                              @foreach ($kelas as $std)
                                  <option {{ $tugas->id_kelas == $std->id ? "selected" : "" }}  value="{{$std->id}}">{{$std->kelas}}</option>
                              @endforeach
                            </select>
                            <x-error-validation input="id_kelas" />
                          </div>
                    </div>
                </div>
                  <div class="row">
                      <div class="col-lg-6">
                          <div class="form-group">
                            <label for="tanggal">Batas Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" value="{{$tugas->batas_tgl}}" id="tanggal" name='tanggal'>
                            <x-error-validation input="tanggal" />
                          </div> 
                      </div>
                      <div class="col-lg-6">
                          <div class="form-group">
                            <label for="waktu">Batas Waktu</label>
                              <input type="time" class="form-control @error('waktu') is-invalid @enderror" value="{{$tugas->batas_waktu}}" id="waktu" name='waktu'>
                              <x-error-validation input="waktu" />
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control ckeditor @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="3">{{$tugas->keterangan}}</textarea>
                    <x-error-validation input="keterangan" />
                  </div>
                  <x-btn-submit title="Update"/>
                  <hr>
              </form>
          </div>
        
    </div>
</div>

@endsection